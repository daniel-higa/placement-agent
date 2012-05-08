<?php

class LpTest extends CDbTestCase
{

    public $fixtures=array(
        'lps'=>'Lp',
    );

    public function testInsert() {
       $obj = new Lp();
       $this->assertEquals(get_class($obj), 'Lp');
       
       $obj->name = 'Lp 1';
	   $obj->description = 'Lp 1 description';
	   $obj->website = 'www.lp1.com';
	   $obj->rank = 'A';
	   $obj->firm_id = '1';
	   $obj->assets_umgmt = '1';
	   $obj->assets_umgmt_ori = '1';
	   $obj->top_interests  = '1';
	   
       $this->assertTrue($obj->save());
    }


    public function testFind() {
       $obj = Lp::model()->findByPk(1);
       $this->assertEquals($obj->name, 'Lp 1'); //From Fixtures
    }
    
    public function testModify() {
       $obj = Lp::model()->findByPk(1);
       $obj->name = 'Lp 111'; //From Fixtures
       $this->assertTrue($obj->save());
    }

   public function testDelete() {
       $obj = Lp::model()->findByPk(1);
       $this->assertTrue($obj->delete());
    }

}
