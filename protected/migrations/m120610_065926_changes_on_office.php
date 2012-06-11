<?php

class m120610_065926_changes_on_office extends CDbMigration
{
	public function up()
	{
        $this->renameColumn('office', 'address', 'streetname');
        $this->alterColumn('office', 'state', 'string null');
        $this->addColumn('office', 'streetnumber', 'string');
        $this->addColumn('office', 'floor', 'string');
        $this->addColumn('office', 'building', 'string');
        $this->dropColumn('office', 'name');
        
        $this->alterColumn('employees', 'email', 'string null');
        $this->addColumn('employees', 'biography', 'text null');
        
        $this->createTable('employeesfundsize', array(
            'id' => 'pk',
            'employees_id' => 'int',
            'fundsize_id' => 'int'
        ));
	}

	public function down()
	{
        $this->dropTable('employeesfundsize');
        
        $this->dropColumn('employees', 'biography');
        $this->alterColumn('employees', 'email', 'string');
        
        $this->addColumn('office', 'name', 'string');
        $this->dropColumn('office', 'building');
        $this->dropColumn('office', 'floor');
        $this->dropColumn('office', 'streetnumber');
        $this->alterColumn('office', 'state', 'string');
        $this->renameColumn('office', 'streetname', 'address');
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
