<?php

class OfficeTest extends CDbTestCase
{

    public $fixtures=array(
        'offices'=>'Office',
    );

    public function testInsert() {
       $obj = new Office();
       $this->assertEquals(get_class($obj), 'Office');
       
       $obj->name = 'Office 1';
	   $obj->country_id = '1';
	   $obj->main_office = '1';
	   $obj->phone = '1111-1111';
	   $obj->address = 'Street 1';
	   $obj->city = 'City 1';
	   $obj->state = 'State 1';
	   $obj->description = 'Office 1 description';
	   $obj->sync_gmaps = '1';
	   $obj->firm_id = '1';
	   
       $this->assertTrue($obj->save());
    }


    public function testFind() {
       $obj = Office::model()->findByPk(1);
       $this->assertEquals($obj->name, 'Office 1'); //From Fixtures
    }
    
    public function testModify() {
       $obj = Office::model()->findByPk(1);
       $obj->name = 'Office 111'; //From Fixtures
       $this->assertTrue($obj->save());
    }

   public function testDelete() {
       $obj = Office::model()->findByPk(1);
       $this->assertTrue($obj->delete());
    }

}
