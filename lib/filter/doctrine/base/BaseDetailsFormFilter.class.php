<?php

/**
 * Details filter form base class.
 *
 * @package    blocket
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseDetailsFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'car_brand'        => new sfWidgetFormFilterInput(),
      'milage'           => new sfWidgetFormFilterInput(),
      'power'            => new sfWidgetFormFilterInput(),
      'item_category_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ItemCategory'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'car_brand'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'milage'           => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'power'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'item_category_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('ItemCategory'), 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('details_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Details';
  }

  public function getFields()
  {
    return array(
      'id'               => 'Number',
      'car_brand'        => 'Number',
      'milage'           => 'Number',
      'power'            => 'Number',
      'item_category_id' => 'ForeignKey',
    );
  }
}
