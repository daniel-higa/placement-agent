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
        $this->addColumn('lp', 'average_ticket', 'int');
        $this->addColumn('lp', 'average_inv', 'bigint');
        $this->createTable('segment', array(
            'id' => 'pk',
            'name' => 'string NOT NULL',
        ));
        $this->addColumn('lp', 'segment_id', 'int');
        $this->createTable('lpsegment', array(
            'id' => 'pk',
            'segment_id' => 'int',
            'lp_id' => 'int',
        ));
        $this->createIndex('lp_segment', 'lpsegment', 'lp_id, segment_id', true);
        

	}

	public function down()
	{
        $this->dropIndex('lp_segment', 'lpsegment', 'lp_id, segment_id');
        $this->dropTable('lpsegment');
        $this->dropColumn('lp', 'segment_id');
        $this->dropTable('segment');
        $this->dropColumn('lp', 'average_inv', 'int');
        $this->dropColumn('lp', 'average_ticket');
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
