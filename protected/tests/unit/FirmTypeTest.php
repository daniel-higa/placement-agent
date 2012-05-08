<?php

class FirmTypeTest extends CDbTestCase
{

    public $fixtures=array(
        'firmtypes'=>'Firmtype',
    );

    public function testInsert() {
       $obj = new Firmtype();
       $this->assertEquals(get_class($obj), 'Firmtype');
       
       $obj->name = 'Type 1';
       $this->assertTrue($obj->save());
    }


    public function testFind() {
       $obj = Firmtype::model()->findByPk(1);
       $this->assertEquals($obj->name, 'Type 1'); //From Fixtures
    }
    
    public function testModify() {
       $obj = Firmtype::model()->findByPk(1);
       $obj->name = 'Type 111'; //From Fixtures
       $this->assertTrue($obj->save());
    }

   public function testDelete() {
       $obj = Firmtype::model()->findByPk(1);
       $this->assertTrue($obj->delete());
    }

}
