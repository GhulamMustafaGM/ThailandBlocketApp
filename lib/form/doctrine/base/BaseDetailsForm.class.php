<?php

/**
 * Details form base class.
 *
 * @method Details getObject() Returns the current form's model object
 *
 * @package    blocket
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseDetailsForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'               => new sfWidgetFormInputHidden(),
      'car_brand'        => new sfWidgetFormInputText(),
      'milage'           => new sfWidgetFormInputText(),
      'power'            => new sfWidgetFormInputText(),
      'item_category_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ItemCategory'), 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'               => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'car_brand'        => new sfValidatorInteger(array('required' => false)),
      'milage'           => new sfValidatorInteger(array('required' => false)),
      'power'            => new sfValidatorInteger(array('required' => false)),
      'item_category_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('ItemCategory'))),
    ));

    $this->widgetSchema->setNameFormat('details[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Details';
  }

}
