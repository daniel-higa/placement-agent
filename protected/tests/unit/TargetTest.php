<?php

class TargetTest extends CDbTestCase
{

    public $fixtures=array(
        'targets'=>'Target',
    );

    public function testInsert() {
       $obj = new Target();
       $this->assertEquals(get_class($obj), 'Target');
       
       $obj->name = 'Target 1';
       $this->assertTrue($obj->save());
    }


    public function testFind() {
       $obj = Target::model()->findByPk(1);
       $this->assertEquals($obj->name, 'Target 1'); //From Fixtures
    }
    
    public function testModify() {
       $obj = Target::model()->findByPk(1);
       $obj->name = 'Target 111'; //From Fixtures
       $this->assertTrue($obj->save());
    }

   public function testDelete() {
       $obj = Target::model()->findByPk(1);
       $this->assertTrue($obj->delete());
    }

}
