<?php

class m120610_023857_changes_to_lp extends CDbMigration
{
	public function up()
	{
        $this->alterColumn('lp', 'pe_allocation', 'bigint null');
        $this->alterColumn('lp', 'commited_pe', 'bigint null');
        
        $this->createTable('lpfundsize', array(
            'id' => 'pk',
            'lp_id' => 'int',
            'fundsize_id' => 'int',
        ));
        
        $this->createTable('fundsize', array(
            'id' => 'pk',
            'name' => 'string',
        ));
        
        $this->insert('fundsize', array('name' => '0-100'));
        $this->insert('fundsize', array('name' => '100-250'));
        $this->insert('fundsize', array('name' => '250-500'));
        $this->insert('fundsize', array('name' => '500-1 billion'));
        $this->insert('fundsize', array('name' => '1 billion and more'));
        
	}

	public function down()
	{
        $this->dropTable('fundsize');
        $this->dropTable('lpfundsize');
        $this->alterColumn('lp', 'pe_allocation', 'boolean null');
        $this->alterColumn('lp', 'commited_pe', 'boolean null');
        
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
