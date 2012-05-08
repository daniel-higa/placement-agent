<?php

class FirmTest extends CDbTestCase
{

    public $fixtures=array(
        'firms'=>'Firm',
    );

    public function testInsert() {
       $obj = new Firm();
       $this->assertEquals(get_class($obj), 'Firm');
       
       $obj->name = 'Firm 1';
	   $obj->user_id = '1';
	   $obj->firmtype_id = '1';
	   $obj->description = 'Firm 1 description';
	   $obj->website = 'www.firm1.com';
	   $obj->rank = 'A';
	   
       $this->assertTrue($obj->save());
    }


    public function testFind() {
       $obj = Firm::model()->findByPk(1);
       $this->assertEquals($obj->name, 'Firm 1'); //From Fixtures
    }
    
    public function testModify() {
       $obj = Firm::model()->findByPk(1);
       $obj->name = 'Firm 111'; //From Fixtures
       $this->assertTrue($obj->save());
    }

   public function testDelete() {
       $obj = Firm::model()->findByPk(1);
       $this->assertTrue($obj->delete());
    }

}
