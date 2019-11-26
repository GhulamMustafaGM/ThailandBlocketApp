<?php

/**
 * AdvertismentImage filter form base class.
 *
 * @package    blocket
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseAdvertismentImageFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'image_path'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'advertisement_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Advertisement'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'image_path'       => new sfValidatorPass(array('required' => false)),
      'advertisement_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Advertisement'), 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('advertisment_image_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'AdvertismentImage';
  }

  public function getFields()
  {
    return array(
      'id'               => 'Number',
      'image_path'       => 'Text',
      'advertisement_id' => 'ForeignKey',
    );
  }
}
