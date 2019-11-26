<?php

/**
 * ItemCategory actions.
 *
 * @package    blocket
 * @subpackage ItemCategory
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ItemCategoryActions extends sfActions
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
  	
  	// first get list of parent categories
  	$q = Doctrine_Query::CREATE()
  			->select("cg.*")
  			->from("CategoryGroup cg");
  	$this->category_groups = $q->execute(array(), Doctrine_Core::HYDRATE_ARRAY);
  	
  	if($request->isMethod('POST'))
  	{
  		$item_category = new ItemCategory();
  		$item_category->category_group_id = $request->getParameter('category_group');
  		$item_category->name = $request->getParameter('title');
  		$item_category->associated_form = $request->getParameter('associated_form');  // todo: create this form file in templates forlder automatically
  		$item_category->save();
  		$this->redirect("ItemCategory/List");
  		
  	}
  	
  }
  
  
  public function executeList(sfWebRequest $request)
  {
  	$id = $request->getParameter('id');
  	$q = Doctrine_Query::CREATE()
  			->select("ic.*")
  			->from("ItemCategory ic")
  			->where("ic.category_group_id = $id");
  	$this->item_categories = $q->execute(array(), Doctrine_Core::HYDRATE_ARRAY);
  	
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
