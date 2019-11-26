<?php

/**
 * AdvertismentDetails filter form base class.
 *
 * @package    blocket
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseAdvertismentDetailsFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'key_name'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'key_value'        => new sfWidgetFormFilterInput(),
      'advertisement_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Advertisement'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'key_name'         => new sfValidatorPass(array('required' => false)),
      'key_value'        => new sfValidatorPass(array('required' => false)),
      'advertisement_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Advertisement'), 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('advertisment_details_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'AdvertismentDetails';
  }

  public function getFields()
  {
    return array(
      'id'               => 'Number',
      'key_name'         => 'Text',
      'key_value'        => 'Text',
      'advertisement_id' => 'ForeignKey',
    );
  }
}
