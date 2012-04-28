<?php

class ContinentTest extends CDbTestCase
{

    public $fixtures=array(
        'continents'=>'Continent',
    );

    public function testInsert() {
       $continent = new Continent();
       $this->assertEquals(get_class($continent), 'Continent');
       
       $continent->name = 'Africa';
       $this->assertTrue($continent->save());
    }


    public function testFind() {
       $continent = Continent::model()->findByPk(1);
       $this->assertEquals($continent->name, 'America'); //From Fixtures
    }
    
    public function testModify() {
       $continent = Continent::model()->findByPk(1);
       $continent->name = 'Asia'; //From Fixtures
       $this->assertTrue($continent->save());
    }

   public function testDelete() {
       $continent = Continent::model()->findByPk(1);
       $this->assertTrue($continent->delete());
    }
    
    public function testNameGreatThan50() {
       $continent = new Continent();
       $continent->name = 'a12345678901234567890123456789012345678901234567890';
       $this->assertFalse($continent->save());
    }

}
