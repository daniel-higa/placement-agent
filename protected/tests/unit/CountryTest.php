<?php

class CountryTest extends CDbTestCase
{

    public $fixtures=array(
        'countries'=>'Country',
    );

    public function testInsert() {
       $obj = new Country();
       $this->assertEquals(get_class($obj), 'Country');
       
       $obj->name = 'Argentina';
       $this->assertTrue($obj->save());
    }


    public function testFind() {
       $obj = Country::model()->findByPk(1);
       $this->assertEquals($obj->name, 'Argentina'); //From Fixtures
    }
    
    public function testModify() {
       $obj = Country::model()->findByPk(1);
       $obj->name = 'Uruguay'; //From Fixtures
       $this->assertTrue($obj->save());
    }

   public function testDelete() {
       $obj = Country::model()->findByPk(1);
       $this->assertTrue($obj->delete());
    }

}
