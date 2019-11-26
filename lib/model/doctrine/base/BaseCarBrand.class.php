<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('CarBrand', 'doctrine');

/**
 * BaseCarBrand
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $name
 * @property Doctrine_Collection $CarModel
 * 
 * @method integer             getId()       Returns the current record's "id" value
 * @method string              getName()     Returns the current record's "name" value
 * @method Doctrine_Collection getCarModel() Returns the current record's "CarModel" collection
 * @method CarBrand            setId()       Sets the current record's "id" value
 * @method CarBrand            setName()     Sets the current record's "name" value
 * @method CarBrand            setCarModel() Sets the current record's "CarModel" collection
 * 
 * @package    blocket
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseCarBrand extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('car_brand');
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
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('CarModel', array(
             'local' => 'id',
             'foreign' => 'car_brand_id'));
    }
}