<?php

class SectorTest extends CDbTestCase
{

    public $fixtures=array(
        'sectors'=>'Sector',
    );

    public function testInsert() {
       $obj = new Sector();
       $this->assertEquals(get_class($obj), 'Sector');
       
       $obj->name = 'Sector 1';
       $this->assertTrue($obj->save());
    }


    public function testFind() {
       $obj = Sector::model()->findByPk(1);
       $this->assertEquals($obj->name, 'Sector 1'); //From Fixtures
    }
    
    public function testModify() {
       $obj = Sector::model()->findByPk(1);
       $obj->name = 'Sector 111'; //From Fixtures
       $this->assertTrue($obj->save());
    }

   public function testDelete() {
       $obj = Sector::model()->findByPk(1);
       $this->assertTrue($obj->delete());
    }

}
