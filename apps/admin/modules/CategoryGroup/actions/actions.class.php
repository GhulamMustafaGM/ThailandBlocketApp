<?php

/**
 * CategoryGroup actions.
 *
 * @package    blocket
 * @subpackage CategoryGroup
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class CategoryGroupActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    //$this->forward('default', 'module');
  }
  
  public function executeAdd(sfWebRequest $request)
  {
  	$this->status_flag = FALSE;
  	if($request->isMethod('POST'))
  	{
  		$category_group = new CategoryGroup();
  		$category_group->name = $request->getParameter('title');
  		$category_group->save();
  		$this->status_flag = TRUE;
  		
  	}
  	
  }
  
  
  public function executeList(sfWebRequest $request)
  {
  	$q = Doctrine_Query::CREATE()
  			->select("cg.*")
  			->from("CategoryGroup cg");
  	$this->category_groups = $q->execute(array(), Doctrine_Core::HYDRATE_ARRAY);
  	
  }
  
  
  public function executeEdit(sfWebRequest $request)
  {
  	$id = $request->getParameter('id');
  	$this->id = $id;
  	
  	$q = Doctrine_Query::create()
  			->select("cg.*")
  			->from("CategoryGroup cg")
  			->where("cg.id=$id");
  			
  	$this->category_group = $q->execute(array(), Doctrine_Core::HYDRATE_ARRAY);	

  	if($request->isMethod('POST'))
  	{
  		$name = $request->getParameter("title");
  		$q = Doctrine_Query::create()
    			->update("CategoryGroup cg")
    			->set("cg.name", "'$name'")
    			->where("cg.id = $id");
    	$q->execute();
    	$this->redirect("CategoryGroup/List");		
  	}
  }
  
  public function executeDelete(sfWebRequest $request)
  {
  	
  }
  
}
