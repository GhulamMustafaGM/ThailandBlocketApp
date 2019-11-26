<?php

/**
 * Advertisement form base class.
 *
 * @method Advertisement getObject() Returns the current form's model object
 *
 * @package    blocket
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseAdvertisementForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'               => new sfWidgetFormInputHidden(),
      'add_title'        => new sfWidgetFormInputText(),
      'item_category_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ItemCategory'), 'add_empty' => false)),
      'user_name'        => new sfWidgetFormInputText(),
      'user_email'       => new sfWidgetFormInputText(),
      'user_password'    => new sfWidgetFormInputText(),
      'contact_phone'    => new sfWidgetFormInputText(),
      'created_at'       => new sfWidgetFormDateTime(),
      'updated_at'       => new sfWidgetFormDateTime(),
      'city_id'          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('City'), 'add_empty' => false)),
      'description'      => new sfWidgetFormTextarea(),
      'price'            => new sfWidgetFormInputText(),
      'status'           => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'               => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'add_title'        => new sfValidatorString(array('max_length' => 255)),
      'item_category_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('ItemCategory'))),
      'user_name'        => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'user_email'       => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'user_password'    => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'contact_phone'    => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'created_at'       => new sfValidatorDateTime(array('required' => false)),
      'updated_at'       => new sfValidatorDateTime(array('required' => false)),
      'city_id'          => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('City'))),
      'description'      => new sfValidatorString(array('required' => false)),
      'price'            => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'status'           => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('advertisement[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Advertisement';
  }

}
