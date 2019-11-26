<?php

/**
 * AdvertismentDetails form base class.
 *
 * @method AdvertismentDetails getObject() Returns the current form's model object
 *
 * @package    blocket
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseAdvertismentDetailsForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'               => new sfWidgetFormInputHidden(),
      'key_name'         => new sfWidgetFormInputText(),
      'key_value'        => new sfWidgetFormInputText(),
      'advertisement_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Advertisement'), 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'               => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'key_name'         => new sfValidatorString(array('max_length' => 255)),
      'key_value'        => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'advertisement_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Advertisement'))),
    ));

    $this->widgetSchema->setNameFormat('advertisment_details[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'AdvertismentDetails';
  }

}
