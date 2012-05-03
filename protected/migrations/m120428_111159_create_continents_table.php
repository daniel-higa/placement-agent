<?php

class m120428_111159_create_continents_table extends CDbMigration
{
	public function up()
	{
	    $this->createTable('continent', array(
		'id' => 'pk',
		'name' => 'string NOT NULL'
		)
	    );
	}

	public function down()
	{
	    $this->dropTable('continent');
	}

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}