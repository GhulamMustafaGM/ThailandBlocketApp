<?php

/**
 * AdvertismentImage form base class.
 *
 * @method AdvertismentImage getObject() Returns the current form's model object
 *
 * @package    blocket
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseAdvertismentImageForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'               => new sfWidgetFormInputHidden(),
      'image_path'       => new sfWidgetFormInputText(),
      'advertisement_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Advertisement'), 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'               => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'image_path'       => new sfValidatorString(array('max_length' => 255)),
      'advertisement_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Advertisement'))),
    ));

    $this->widgetSchema->setNameFormat('advertisment_image[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'AdvertismentImage';
  }

}
