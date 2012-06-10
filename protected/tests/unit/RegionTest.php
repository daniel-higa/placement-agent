<?php

class RegionTest extends CDbTestCase
{

    public $fixtures=array(
        'regions'=>'Region',
    );

    public function testInsert() {
       $obj = new Region();
       $this->assertEquals(get_class($obj), 'Region');
       
       $obj->name = 'Region 1';
       $obj->continent_id = 1;
       $this->assertTrue($obj->save());
    }


    public function testFind() {
       $obj = Region::model()->findByPk(1);
       $this->assertEquals($obj->name, 'Region 1'); //From Fixtures
    }
    
    public function testModify() {
       $obj = Region::model()->findByPk(1);
       $obj->name = 'Region 111'; //From Fixtures
       $this->assertTrue($obj->save());
    }

   public function testDelete() {
       $obj = Region::model()->findByPk(1);
       $this->assertTrue($obj->delete());
    }

}
