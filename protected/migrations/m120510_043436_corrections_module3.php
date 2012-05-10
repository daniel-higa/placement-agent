<?php

class m120510_043436_corrections_module3 extends CDbMigration
{
	public function up()
	{
        $this->addColumn('communication', 'date', 'timestamp');
        $this->addColumn('communication', 'communication_type_id', 'int');
        $this->dropColumn('communication', 'name');
        $this->createTable('communication_type', array(
            'id' => 'pk',
            'name' => 'string NOT NULL',
        ));
        $this->createIndex('comm_type', 'communication', 'communication_type_id');
	}

	public function down()
	{
        $this->dropIndex('comm_type', 'communication');
		$this->dropColumn('communication', 'date');
        $this->addColumn('communication', 'name', 'string');
        $this->dropTable('communication_type');
        $this->dropColumn('communication', 'communication_type_id');
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
