<?php

/**
 * Home actions.
 *
 * @package    blocket
 * @subpackage Home
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class HomeActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
  	// get list of advertisments, that needs to be approved
  	$q = Doctrine_Query::create()
  		->select("a.*")
  		->from("Advertisement a")
  		->where("a.status = 0");
  	$this->adds = $q->execute(array(), Doctrine_Core::HYDRATE_ARRAY); 	
    
  }
  
  public function executeApproveAdd(sfWebRequest $request)
  {
  	$id = $request->getParameter('id');
  	$q = Doctrine_Query::create()
  			->update("Advertisement")
  			->set("status", "1")
  			->where("id=".$id);
  	$q->execute();
  	$this->redirect("Home/index");		
  	
  }
  
  
}
