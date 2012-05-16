<?php

class m120516_033217_add_revenue_to_clientmandate extends CDbMigration
{
	public function up()
	{
        $this->addColumn('client_mandate', 'revenue', 'bigint null');
	}

	public function down()
	{
		$this->dropColumn('client_mandate', 'revenue');
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
