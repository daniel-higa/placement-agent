<?php

class GpTest extends CDbTestCase
{

    public $fixtures=array(
        'gps'=>'Gp',
    );

    public function testInsert() {
       $obj = new Gp();
       $this->assertEquals(get_class($obj), 'Gp');
       
       $obj->name = 'Gp 1';
	   $obj->description = 'Gp 1 description';
	   $obj->website = 'www.gp1.com';
	   $obj->rank = 'A';
	   $obj->firm_id = '1';
	   
       $this->assertTrue($obj->save());
    }


    public function testFind() {
       $obj = Gp::model()->findByPk(1);
       $this->assertEquals($obj->name, 'Gp 1'); //From Fixtures
    }
    
    public function testModify() {
       $obj = Gp::model()->findByPk(1);
       $obj->name = 'Gp 111'; //From Fixtures
       $this->assertTrue($obj->save());
    }

   public function testDelete() {
       $obj = Gp::model()->findByPk(1);
       $this->assertTrue($obj->delete());
    }

}
