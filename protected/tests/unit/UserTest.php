<?php

class UserTest extends CDbTestCase
{

    public $fixtures=array(
        'users'=>'User',
    );

    public function testInsert() {
       $obj = new User();
       $this->assertEquals(get_class($obj), 'User');
       
       $obj->name = 'User 1';
	   $obj->password = 'user1';
       $this->assertTrue($obj->save());
    }


    public function testFind() {
       $obj = User::model()->findByPk(1);
       $this->assertEquals($obj->name, 'User 1'); //From Fixtures
    }
    
    public function testModify() {
       $obj = User::model()->findByPk(1);
       $obj->name = 'User 111'; //From Fixtures
	   $obj->password = 'user111'; //From Fixtures
       $this->assertTrue($obj->save());
    }

   public function testDelete() {
       $obj = User::model()->findByPk(1);
       $this->assertTrue($obj->delete());
    }

}
