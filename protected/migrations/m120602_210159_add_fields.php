<?php

class m120602_210159_add_fields extends CDbMigration
{
	public function up()
	{
        $this->createTable('lptype', array(
            'id' => 'pk',
            'name' => 'string'
        ));
        $this->addColumn('lp', 'lptype_id', 'int null');
	}

	public function down()
	{
        $this->dropColumn('lp', 'lptype_id');
        $this->dropTable('lptype');
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
