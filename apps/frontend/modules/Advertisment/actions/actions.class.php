<?php

/**
 * Advertisment actions.
 *
 * @package    blocket
 * @subpackage Advertisment
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class AdvertismentActions extends sfActions
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
  
  public function executeListCities()
  {
  	// get list of cities
  		$q = Doctrine_Query::CREATE()
  				->select("c.*, a.id, COUNT(a.id)")
  				->from("City c")
  				->leftJoin("c.Advertisement a")
  				->where("a.status=1")
  				->groupBy("c.id");
  				
  		$this->cities = $q->execute(array(), Doctrine_Core::HYDRATE_ARRAY);	
  		
  		
  }
  
  public function executeListAdvertisments(sfWebRequest $request)
  {
  	$city_id = $request->getParameter('id');
  	// get all adds posted in this city
  	$q = Doctrine_Query::CREATE()
  			->select('a.*, ad.*, a_i.*')
  			->from("Advertisement a")
  			->leftJoin("a.AdvertismentDetails ad")
  			->leftJoin("a.AdvertismentImage a_i")
  			->where("a.city_id = $city_id")
  			->andWhere("a.status=1");
  			
  	$this->adds = $q->execute(array(), Doctrine_Core::HYDRATE_ARRAY);		
  }
  
  public function executeCreateAdvertisment(sfWebRequest $request)
  {
  	
  		// get list of Regions
  		$q = Doctrine_Query::CREATE()
  				->select("r.*")
  				->from("Region r");
  		$this->regions = $q->execute(array(), Doctrine_Core::HYDRATE_ARRAY);		
  		
  	
  		
  		
  		
  		// make an array of main category and sub categories
  		$categories = array();
  		
  		$q = Doctrine_Query::create()
  				->select("c_g.*, i_c.*")
  				->from("CategoryGroup c_g")
  				->leftJoin("c_g.ItemCategory i_c");
  				//echo $q->getSqlQuery();exit();
  		$this->category_group = $q->execute(array(), Doctrine_Core::HYDRATE_ARRAY);
	
  		$this->status_flag = FALSE;
  		if($request->isMethod('POST'))
  		{
  			
  			
  			
  			
  			//first get general fields and save them into database
  			$advertisment = new Advertisement();
  			$advertisment->user_name = $request->getParameter('user_name');
  			$advertisment->user_email = $request->getParameter('user_email');
  			$advertisment->contact_phone = $request->getParameter('contact_phone');
  			$advertisment->add_title = $request->getParameter('add_title');
  			$advertisment->city_id = $request->getParameter('city');
  			$advertisment->item_category_id = $request->getParameter('item_category_id');
  			
  			$advertisment->description = $request->getParameter('description');
  			$advertisment->price = $request->getParameter('price');
  			
  			$advertisment->save();
  			$advertisement_id = $advertisment->getId();
  			$this->status_flag = TRUE;
  			
  			
  			// now get what was the category 
  			if($request->hasParameter('extra_fields'))
  			{
  				$extra_fields = $request->getParameter('extra_fields');
  				
  				foreach($extra_fields AS $key => $value)
  				{
  					
  					$advertisment_details = new AdvertismentDetails();
  					$advertisment_details->advertisement_id = $advertisement_id;
  					$advertisment_details->key_name = $key;
  					$advertisment_details->key_value = $value;  					
  					$advertisment_details->save();  	
  				}  				
  			}
  			
  			// now also upload images
  			$images = $_FILES['advertisment_image'];
  			
  			$image_count = count($images['name']);
  			
  			$i = 0;
  			
  			for($i; $i<$image_count; $i++)
  			{
  				// todo need to create image thumbnails
  				$file_name = $advertisement_id ."-". $images['name'][$i];
  				$tmp_name =  $images['tmp_name'][$i]; 
  				move_uploaded_file($tmp_name, sfConfig::get('sf_upload_dir')."/".$file_name);
  				// image_tag('/'.sfConfig::get('sf_upload_dir_name').'/'.$sf_params->get('filename')) 
  				// insert this file entry in database
  				
  				$ad_img = new AdvertismentImage();
  				$ad_img->advertisement_id = $advertisement_id;
  				$ad_img->image_path = $file_name;
  				$ad_img->save();

  				
  			}
  			
  			$this->redirect("Advertisment/AddvertismentDetails?id=".$advertisement_id);
  			
  		
  			
  		}
 
  	
  }
  
  
  public function executeAddvertismentDetails(sfWebRequest $request)
  {
  	$add_id = $request->getParameter('id');
  	$q = Doctrine_Query::CREATE()
  			->select('a.*, ad.*, a_i.*')
  			->from("Advertisement a")
  			->leftJoin("a.AdvertismentDetails ad")
  			->leftJoin("a.AdvertismentImage a_i")
  			->where("a.id = $add_id");
  			
  	$this->add_details = $q->execute(array(), Doctrine_Core::HYDRATE_ARRAY);		
  }
  
  public function executeLoadAjaxForm(sfWebRequest $request)
  {
	  if ($request->isXmlHttpRequest())
	  {
	  	
	  	$id = $request->getParameter('id');
	  	$q = Doctrine_Query::create()
	  			->select("i_c.*")
	  			->from("ItemCategory i_c")
	  			->where("i_c.id = $id");
	  	$result = $q->execute(array(), Doctrine_Core::HYDRATE_ARRAY);
	  	
	  	$partial = "";
	  	if(count($result) > 0)
	  	{
	  		$partial = "Advertisment/".$result[0]['associated_form'];
	  		
	  		// now get specific fields for selected category
	  		$q = Doctrine_Query::CREATE()
	  				->select("d.*")
	  				->from("Details d")
	  				->where("d.item_category_id=$id");
	  		$fields  = $q->execute(array(), Doctrine_Core::HYDRATE_ARRAY);		
	  		if(count($fields) > 0)
	  		{
	  			$partial_data = array();
	  			$fields = $fields[0];
	  			foreach ($fields as $key => $value) {
	  				
	  				if($value)
	  				{
	  					$pos = strpos($key,"id");

						if($pos === false)
						{
	  						$model_name =  str_replace(" ","",ucwords(str_replace("_"," ", $key)));
	  						$q = Doctrine_Query::CREATE()
			  					->select("model.*")
			  					->from("$model_name model");
			  				$partial_data[$key] = $q->execute(array(), Doctrine_Core::HYDRATE_ARRAY);	
			  				
						}
	  				}
	  			}	  			
	  			return $this->renderPartial($partial,array('data'=>$partial_data));
	  		}
	  		
	    	
	  	}
	  	
	  }
	  
  }

  
  public function executeLoadCarModels(sfWebRequest $request)
  {
  	if ($request->isXmlHttpRequest())
	  {
	  	$id = $request->getParameter('brand_name');
	  	//get list of car models under selected car brand
	  	$q = Doctrine_Query::create()
	  			->select("c_m.*")
	  			->from("CarModel c_m")
	  			->leftJoin("c_m.CarBrand c_b")
	  			->where("c_b.name='$id'");
	  	$this->car_models = $q->execute(array(), Doctrine_Core::HYDRATE_ARRAY);		
	  	
	  	
	  }
  }
  
  public function executeLoadCities(sfWebRequest $request)
  {
  	// get list of cities
  	if ($request->isXmlHttpRequest())
	  {
	  	$id = $request->getParameter('id');
  		$q = Doctrine_Query::CREATE()
  				->select("c.*")
  				->from("City c")
  				->where("c.region_id=$id");
  		$this->cities = $q->execute(array(), Doctrine_Core::HYDRATE_ARRAY);		
	  }
  }
}
