<?php

class m120516_010549_add extends CDbMigration
{
	public function up()
	{
        /*$this->addColumn('lpcontinent', 'top', 'boolean NULL');
        $this->addColumn('lpregion', 'top', 'boolean NULL');
        $this->addColumn('lpsector', 'top', 'boolean NULL');*/
	}

	public function down()
	{
		$this->dropColumn('lpsector', 'top');
		$this->dropColumn('lpregion', 'top');
        $this->dropColumn('lpcontinent', 'top');
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
