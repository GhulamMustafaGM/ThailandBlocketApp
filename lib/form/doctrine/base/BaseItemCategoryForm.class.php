<?php

/**
 * ItemCategory form base class.
 *
 * @method ItemCategory getObject() Returns the current form's model object
 *
 * @package    blocket
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseItemCategoryForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                => new sfWidgetFormInputHidden(),
      'category_group_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CategoryGroup'), 'add_empty' => false)),
      'name'              => new sfWidgetFormInputText(),
      'associated_form'   => new sfWidgetFormInputText(),
      'created_at'        => new sfWidgetFormDateTime(),
      'updated_at'        => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'category_group_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('CategoryGroup'))),
      'name'              => new sfValidatorString(array('max_length' => 255)),
      'associated_form'   => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'created_at'        => new sfValidatorDateTime(array('required' => false)),
      'updated_at'        => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('item_category[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ItemCategory';
  }

}
