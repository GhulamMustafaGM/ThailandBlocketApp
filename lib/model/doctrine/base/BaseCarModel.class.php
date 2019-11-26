<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('CarModel', 'doctrine');

/**
 * BaseCarModel
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $name
 * @property integer $car_brand_id
 * @property CarBrand $CarBrand
 * 
 * @method integer  getId()           Returns the current record's "id" value
 * @method string   getName()         Returns the current record's "name" value
 * @method integer  getCarBrandId()   Returns the current record's "car_brand_id" value
 * @method CarBrand getCarBrand()     Returns the current record's "CarBrand" value
 * @method CarModel setId()           Sets the current record's "id" value
 * @method CarModel setName()         Sets the current record's "name" value
 * @method CarModel setCarBrandId()   Sets the current record's "car_brand_id" value
 * @method CarModel setCarBrand()     Sets the current record's "CarBrand" value
 * 
 * @package    blocket
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseCarModel extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('car_model');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('name', 'string', 45, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 45,
             ));
        $this->hasColumn('car_brand_id', 'integer', 4, array(
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
        $this->hasOne('CarBrand', array(
             'local' => 'car_brand_id',
             'foreign' => 'id'));
    }
}