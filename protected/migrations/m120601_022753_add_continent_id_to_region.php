<?php

class m120601_022753_add_continent_id_to_region extends CDbMigration
{
	public function up()
	{
        $this->addColumn('region', 'continent_id', 'int null');
	}

	public function down()
	{
		$this->dropColumn('region', 'continent_id');
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
