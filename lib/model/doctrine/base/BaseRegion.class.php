<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Region', 'doctrine');

/**
 * BaseRegion
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $name
 * @property Doctrine_Collection $City
 * 
 * @method integer             getId()   Returns the current record's "id" value
 * @method string              getName() Returns the current record's "name" value
 * @method Doctrine_Collection getCity() Returns the current record's "City" collection
 * @method Region              setId()   Sets the current record's "id" value
 * @method Region              setName() Sets the current record's "name" value
 * @method Region              setCity() Sets the current record's "City" collection
 * 
 * @package    blocket
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseRegion extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('region');
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
        $this->hasMany('City', array(
             'local' => 'id',
             'foreign' => 'region_id'));
    }
}