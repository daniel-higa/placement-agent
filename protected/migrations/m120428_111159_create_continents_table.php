<?php

class m120428_111159_create_continents_table extends CDbMigration
{
	public function up()
	{
	    $this->createTable('continent', array(
		'id' => 'pk',
		'name' => 'varchar(50) NOT NULL'
		)
	    );
		
		$this->createTable('country', array(
		'id' => 'pk',
		'name' => 'varchar(50) NOT NULL'
		)
	    );
		
		$this->createTable('employees', array(
		'id' => 'pk',
		'first_name' => 'varchar(50) NOT NULL',
		'last_name' => 'varchar(50) NOT NULL',
		'email' => 'varchar(100) NOT NULL',
		'phone_office' => 'varchar(50) DEFAULT NULL',
		'phone_office_ext' => 'varchar(20) DEFAULT NULL',
		'phone_home' => 'varchar(50) DEFAULT NULL',
		'phone_mobile' => 'varchar(50) DEFAULT NULL',
		'fax' => 'varchar(50) DEFAULT NULL',
		'position' => 'varchar(100) DEFAULT NULL',
		'current_position' => 'tinyint(1) NOT NULL',
		'archived_position' => 'tinyint(1) NOT NULL',
		'skype' => 'varchar(50) DEFAULT NULL',
		'personal_note' => 'text',
		'office_id' => 'int(10) unsigned NOT NULL'
		)
	    );
		$this->createIndex('emp_office_id', 'employees', 'office_id', false);
		
		$this->createTable('employeescontinent', array(
		'id' => 'pk',
		'employees_id' => 'int(10) unsigned NOT NULL',
		'continent_id' => 'int(10) unsigned NOT NULL'
		)
	    );
		$this->createIndex('ec_employees_id', 'employeescontinent', 'employees_id', false);
		$this->createIndex('ec_continent_id', 'employeescontinent', 'continent_id', false);
		
		$this->createTable('employeesregion', array(
		'id' => 'pk',
		'employees_id' => 'int(10) unsigned NOT NULL',
		'region_id' => 'int(10) unsigned NOT NULL'
		)
	    );
		$this->createIndex('er_employees_id', 'employeesregion', 'employees_id', false);
		$this->createIndex('er_region_id', 'employeesregion', 'region_id', false);
		
		
		$this->createTable('employeessector', array(
		'id' => 'pk',
		'employees_id' => 'int(10) unsigned NOT NULL',
		'sector_id' => 'int(10) unsigned NOT NULL'
		)
	    );
		$this->createIndex('es_employees_id', 'employeessector', 'employees_id', false);
		$this->createIndex('es_sector_id', 'employeessector', 'sector_id', false);
		
		
		$this->createTable('firm', array(
		'id' => 'pk',
		'name' => 'varchar(50) NOT NULL',
		'user_id' => 'int(10) unsigned NOT NULL',
		'firmtype_id' => 'int(10) unsigned NOT NULL',
		'description' => 'text',
		'website' => 'varchar(100) NOT NULL',
		'rank' => 'varchar(1) NOT NULL'
		)
	    );
		$this->createIndex('firm_user_id', 'firm', 'user_id', false);
		$this->createIndex('firm_firmtype_id', 'firm', 'firmtype_id', false);
		
		
		$this->createTable('firmcontinent', array(
		'id' => 'pk',
		'firm_id' => 'int(10) unsigned NOT NULL',
		'continent_id' => 'int(10) unsigned NOT NULL'
		)
	    );
		$this->createIndex('fc_firm_id', 'firmcontinent', 'firm_id', false);
		$this->createIndex('fc_continent_id', 'firmcontinent', 'continent_id', false);
		
		$this->createTable('firmdocument', array(
		'id' => 'pk',
		'firm_id' => 'int(10) unsigned NOT NULL',
		'file' => 'varchar(30) NOT NULL'
		)
	    );
		$this->createIndex('fd_firm_id', 'firmdocument', 'firm_id', false);
		
		$this->createTable('firmregion', array(
		'id' => 'pk',
		'firm_id' => 'int(10) unsigned NOT NULL',
		'region_id' => 'int(10) unsigned NOT NULL'
		)
	    );
		$this->createIndex('fr_firm_id', 'firmregion', 'firm_id', false);
		$this->createIndex('fr_region_id', 'firmregion', 'region_id', false);

		$this->createTable('firmtype', array(
		'id' => 'pk',
		'name' => 'varchar(50) NOT NULL'
		)
	    );
		
		$this->createTable('gp', array(
		'id' => 'pk',
		'name' => 'varchar(50) NOT NULL',
		'description' => 'text',
		'website' => 'varchar(100) NOT NULL',
		'rank' => 'varchar(1) NOT NULL',
		'firm_id' => 'int(10) unsigned NOT NULL'
		)
	    );
		$this->createIndex('gp_firm_id', 'gp', 'firm_id', false);
		
		$this->createTable('gpcontinent', array(
		'id' => 'pk',
		'gp_id' => 'int(10) unsigned NOT NULL',
		'continent_id' => 'int(10) unsigned NOT NULL'
		)
	    );
		$this->createIndex('gc_gp_id', 'gpcontinent', 'gp_id', false);
		$this->createIndex('gc_continent_id', 'gpcontinent', 'continent_id', false);
		
		
		$this->createTable('gpdocument', array(
		'id' => 'pk',
		'gp_id' => 'int(10) unsigned NOT NULL',
		'file' => 'varchar(30) NOT NULL'
		)
	    );
		$this->createIndex('gd_gp_id', 'gpdocument', 'gp_id', false);
		
		$this->createTable('gpregion', array(
		'id' => 'pk',
		'gp_id' => 'int(10) unsigned NOT NULL',
		'region_id' => 'int(10) unsigned NOT NULL'
		)
	    );
		$this->createIndex('gr_gp_id', 'gpregion', 'gp_id', false);
		$this->createIndex('gr_region_id', 'gpregion', 'region_id', false);
		
		$this->createTable('gpsector', array(
		'id' => 'pk',
		'gp_id' => 'int(10) unsigned NOT NULL',
		'sector_id' => 'int(10) unsigned NOT NULL'
		)
	    );
		$this->createIndex('gs_gp_id', 'gpsector', 'gp_id', false);
		$this->createIndex('gs_sector_id', 'gpsector', 'sector_id', false);
		
		
		$this->createTable('lp', array(
		'id' => 'pk',
		'name' => 'varchar(50) NULL',
        'assets_in_euro' => 'bigint',
        'assets_original' => 'varchar (50)',
		'description' => 'text',
		'website' => 'varchar(100) NULL',
		'rank' => 'varchar(1) NOT NULL',
		'firm_id' => 'int(10) unsigned NOT NULL',
		'assets_umgmt' => 'float NOT NULL',
		'assets_umgmt_ori' => 'varchar(100) NOT NULL',
		'top_interests' => 'tinyint(1) NOT NULL'
		)
	    );
		$this->createIndex('lp_firm_id', 'lp', 'firm_id', false);
		
		$this->createTable('lpcontinent', array(
		'id' => 'pk',
		'lp_id' => 'int(10) unsigned NOT NULL',
		'continent_id' => 'int(10) unsigned NOT NULL'
		)
	    );
		$this->createIndex('lc_lp_id', 'lpcontinent', 'lp_id', false);
		$this->createIndex('lc_continent_id', 'lpcontinent', 'continent_id', false);
		
		$this->createTable('lpdocument', array(
		'id' => 'pk',
		'lp_id' => 'int(10) unsigned NOT NULL',
		'file' => 'varchar(30) NOT NULL'
		)
	    );
		$this->createIndex('ld_lp_id', 'lpdocument', 'lp_id', false);
		
		$this->createTable('lpregion', array(
		'id' => 'pk',
		'lp_id' => 'int(10) unsigned NOT NULL',
		'region_id' => 'int(10) unsigned NOT NULL'
		)
	    );
		$this->createIndex('lr_lp_id', 'lpregion', 'lp_id', false);
		$this->createIndex('lr_region_id', 'lpregion', 'region_id', false);
		
		$this->createTable('lpsector', array(
		'id' => 'pk',
		'lp_id' => 'int(10) unsigned NOT NULL',
		'sector_id' => 'int(10) unsigned NOT NULL'
		)
	    );
		$this->createIndex('ls_lp_id', 'lpsector', 'lp_id', false);
		$this->createIndex('ls_sector_id', 'lpsector', 'sector_id', false);
		
		$this->createTable('lptarget', array(
		'id' => 'pk',
		'lp_id' => 'int(10) unsigned NOT NULL',
		'target_id' => 'int(10) unsigned NOT NULL'
		)
	    );
		$this->createIndex('lt_lp_id', 'lptarget', 'lp_id', false);
		$this->createIndex('lt_target_id', 'lptarget', 'target_id', false);
		
		$this->createTable('office', array(
		'id' => 'pk',
		'name' => 'varchar(50) NOT NULL',		
		'country_id' => 'int(10) unsigned NOT NULL',
		'main_office' => 'tinyint(1) NOT NULL',
		'phone' => 'varchar(50) NOT NULL',
		'address' => 'varchar(100) NOT NULL',
		'city' => 'varchar(100) NOT NULL',
		'state' => 'varchar(100) NOT NULL',
		'description' => 'text',
		'sync_gmaps' => 'tinyint(1) NOT NULL',
		'firm_id' => 'int(10) unsigned NOT NULL'
		)
	    );
		$this->createIndex('office_firm_id', 'office', 'firm_id', false);
		$this->createIndex('office_country_id', 'office', 'country_id', false);
		
		$this->createTable('officecontinent', array(
		'id' => 'pk',
		'office_id' => 'int(10) unsigned NOT NULL',
		'continent_id' => 'int(10) unsigned NOT NULL'
		)
	    );
		$this->createIndex('oc_office_id', 'officecontinent', 'office_id', false);
		$this->createIndex('oc_continent_id', 'officecontinent', 'continent_id', false);
		
		$this->createTable('officeregion', array(
		'id' => 'pk',
		'office_id' => 'int(10) unsigned NOT NULL',
		'region_id' => 'int(10) unsigned NOT NULL'
		)
	    );
		$this->createIndex('or_office_id', 'officeregion', 'office_id', false);
		$this->createIndex('or_region_id', 'officeregion', 'region_id', false);
		
		$this->createTable('region', array(
		'id' => 'pk',
		'name' => 'varchar(50) NOT NULL'
		)
	    );
		
		$this->createTable('sector', array(
		'id' => 'pk',
		'name' => 'varchar(50) NOT NULL'
		)
	    );
		
		$this->createTable('target', array(
		'id' => 'pk',
		'name' => 'varchar(50) NOT NULL'
		)
	    );
		
		$this->createTable('user', array(
		'id' => 'pk',
		'name' => 'varchar(50) NOT NULL',
		'password' => 'varchar(20) NOT NULL'
		)
	    );
	
	}

	public function down()
	{
	    $this->dropTable('continent');
		$this->dropTable('country');
		$this->dropTable('employees');
		$this->dropTable('employeescontinent');
		$this->dropTable('employeesregion');
		$this->dropTable('employeessector');
		$this->dropTable('firm');
		$this->dropTable('firmcontinent');
		$this->dropTable('firmdocument');
		$this->dropTable('firmregion');
		$this->dropTable('firmtype');
		$this->dropTable('gp');
		$this->dropTable('gpcontinent');
		$this->dropTable('gpdocument');
		$this->dropTable('gpregion');
		$this->dropTable('gpsector');
		$this->dropTable('lp');
		$this->dropTable('lpcontinent');
		$this->dropTable('lpdocument');
		$this->dropTable('lpregion');
		$this->dropTable('lpsector');
		$this->dropTable('lptarget');
		$this->dropTable('office');
		$this->dropTable('officecontinent');
		$this->dropTable('officeregion');
		$this->dropTable('region');
		$this->dropTable('sector');
		$this->dropTable('target');
		$this->dropTable('user');
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
