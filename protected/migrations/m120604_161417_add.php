<?php

class m120604_161417_add extends CDbMigration
{
	public function up()
	{
        $this->addColumn('firm', 'created', 'datetime null');
        $this->addColumn('firm', 'modified', 'datetime null');
	}

	public function down()
	{
        $this->dropColumn('firm', 'modified', 'datetime null');
        $this->dropColumn('firm', 'created', 'datetime null');
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
