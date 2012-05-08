<?php

class EmployeesTest extends CDbTestCase
{

    public $fixtures=array(
        'employees'=>'Employees',
    );

    public function testInsert() {
       $obj = new Employees();
       $this->assertEquals(get_class($obj), 'Employees');
	   
		$obj->first_name = 'Test 1';
		$obj->last_name = 'Test';
		$obj->email = 'test1@test.com';
		$obj->phone_office = '1111-1111';
		$obj->phone_office_ext = '1111';
		$obj->phone_home = '1111-1111';
		$obj->phone_mobile = '1111-1111';
		$obj->fax = '1111-1111';
		$obj->position = 'Position1';
		$obj->current_position = '1';
		$obj->archived_position = '1';
		$obj->skype = 'test1';
		$obj->personal_note = 'test1test1';
		$obj->office_id = '1';
	   
       $this->assertTrue($obj->save());
    }


    public function testFind() {
       $obj = Employees::model()->findByPk(1);
       $this->assertEquals($obj->first_name, 'Test 1'); //From Fixtures
    }
    
    public function testModify() {
       $obj = Employees::model()->findByPk(1);
       $obj->first_name = 'Test 111'; //From Fixtures
       $this->assertTrue($obj->save());
    }

   public function testDelete() {
       $obj = Employees::model()->findByPk(1);
       $this->assertTrue($obj->delete());
    }

}
