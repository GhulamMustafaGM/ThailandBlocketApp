<?php

/**
 * Power actions.
 *
 * @package    blocket
 * @subpackage Power
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class PowerActions extends sfActions
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
  
public function executeList(sfWebRequest $request)
  {
  	$q = Doctrine_Query::CREATE()
  			->select("cg.*")
  			->from("Power cg");
  	$this->category_groups = $q->execute(array(), Doctrine_Core::HYDRATE_ARRAY);
  	
  	
  }
  
  
public function executeAdd(sfWebRequest $request)
  {
  	$this->status_flag = FALSE;
  	if($request->isMethod('POST'))
  	{
  		$category_group = new Power();
  		$category_group->name = $request->getParameter('title');
  		$category_group->save();
  		$this->status_flag = TRUE;
  		$this->redirect("Power/List");
  		
  	}
  	
  }
  
public function executeEdit(sfWebRequest $request)
  {
  	$id = $request->getParameter('id');
  	$this->id = $id;
  	
  	$q = Doctrine_Query::create()
  			->select("cg.*")
  			->from("Power cg")
  			->where("cg.id=$id");
  			
  	$this->category_group = $q->execute(array(), Doctrine_Core::HYDRATE_ARRAY);	

  	if($request->isMethod('POST'))
  	{
  		$name = $request->getParameter("title");
  		$q = Doctrine_Query::create()
    			->update("Power cg")
    			->set("cg.name", "'$name'")
    			->where("cg.id = $id");
    	$q->execute();
    	$this->redirect("Power/List");		
  	}
  }
  
}
