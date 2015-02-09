<?php

namespace Fuel\Migrations;

class Add_name_to_name
{
	public function up()
	{
		\DBUtil::add_fields('name', array(
			'name' => array('constraint' => 255, 'type' => 'varchar'),

		));
	}

	public function down()
	{
		\DBUtil::drop_fields('name', array(
			'name'

		));
	}
}
