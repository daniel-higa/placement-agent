<?php

class m120602_214633_add_fields_to_lp extends CDbMigration
{
	public function up()
	{
        $this->addColumn('lp', 'fund_size', 'int null');
        $this->addColumn('lp', 'pe_allocation', 'boolean null');
        $this->addColumn('lp', 'commited_pe', 'boolean null');
        $this->addColumn('lp', 'actively', 'boolean null');
        $this->addColumn('lp', 'appetite', 'int null');
        $this->addColumn('lp', 'created', 'datetime null');
        $this->addColumn('lp', 'modified', 'datetime null');
        
    }

	public function down()
	{
        $this->dropColumn('lp', 'commited_pe');
        $this->dropColumn('lp', 'pe_allocation');
        $this->dropColumn('lp', 'fund_size');
        $this->dropColumn('lp', 'appetite');
        $this->dropColumn('lp', 'actively');
        $this->dropColumn('lp', 'modified');
        $this->dropColumn('lp', 'created');
        
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
