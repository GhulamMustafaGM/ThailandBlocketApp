<?php

/**
 * Advertisement filter form base class.
 *
 * @package    blocket
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseAdvertisementFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'add_title'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'item_category_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ItemCategory'), 'add_empty' => true)),
      'user_name'        => new sfWidgetFormFilterInput(),
      'user_email'       => new sfWidgetFormFilterInput(),
      'user_password'    => new sfWidgetFormFilterInput(),
      'contact_phone'    => new sfWidgetFormFilterInput(),
      'created_at'       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'updated_at'       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'city_id'          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('City'), 'add_empty' => true)),
      'description'      => new sfWidgetFormFilterInput(),
      'price'            => new sfWidgetFormFilterInput(),
      'status'           => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'add_title'        => new sfValidatorPass(array('required' => false)),
      'item_category_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('ItemCategory'), 'column' => 'id')),
      'user_name'        => new sfValidatorPass(array('required' => false)),
      'user_email'       => new sfValidatorPass(array('required' => false)),
      'user_password'    => new sfValidatorPass(array('required' => false)),
      'contact_phone'    => new sfValidatorPass(array('required' => false)),
      'created_at'       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'city_id'          => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('City'), 'column' => 'id')),
      'description'      => new sfValidatorPass(array('required' => false)),
      'price'            => new sfValidatorPass(array('required' => false)),
      'status'           => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('advertisement_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Advertisement';
  }

  public function getFields()
  {
    return array(
      'id'               => 'Number',
      'add_title'        => 'Text',
      'item_category_id' => 'ForeignKey',
      'user_name'        => 'Text',
      'user_email'       => 'Text',
      'user_password'    => 'Text',
      'contact_phone'    => 'Text',
      'created_at'       => 'Date',
      'updated_at'       => 'Date',
      'city_id'          => 'ForeignKey',
      'description'      => 'Text',
      'price'            => 'Text',
      'status'           => 'Number',
    );
  }
}
