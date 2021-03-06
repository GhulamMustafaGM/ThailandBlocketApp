<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Details', 'doctrine');

/**
 * BaseDetails
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $car_brand
 * @property integer $milage
 * @property integer $power
 * @property integer $item_category_id
 * @property ItemCategory $ItemCategory
 * 
 * @method integer      getId()               Returns the current record's "id" value
 * @method integer      getCarBrand()         Returns the current record's "car_brand" value
 * @method integer      getMilage()           Returns the current record's "milage" value
 * @method integer      getPower()            Returns the current record's "power" value
 * @method integer      getItemCategoryId()   Returns the current record's "item_category_id" value
 * @method ItemCategory getItemCategory()     Returns the current record's "ItemCategory" value
 * @method Details      setId()               Sets the current record's "id" value
 * @method Details      setCarBrand()         Sets the current record's "car_brand" value
 * @method Details      setMilage()           Sets the current record's "milage" value
 * @method Details      setPower()            Sets the current record's "power" value
 * @method Details      setItemCategoryId()   Sets the current record's "item_category_id" value
 * @method Details      setItemCategory()     Sets the current record's "ItemCategory" value
 * 
 * @package    blocket
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseDetails extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('details');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('car_brand', 'integer', 1, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => '0',
             'notnull' => false,
             'autoincrement' => false,
             'length' => 1,
             ));
        $this->hasColumn('milage', 'integer', 1, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => '0',
             'notnull' => false,
             'autoincrement' => false,
             'length' => 1,
             ));
        $this->hasColumn('power', 'integer', 1, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => '0',
             'notnull' => false,
             'autoincrement' => false,
             'length' => 1,
             ));
        $this->hasColumn('item_category_id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('ItemCategory', array(
             'local' => 'item_category_id',
             'foreign' => 'id'));
    }
}