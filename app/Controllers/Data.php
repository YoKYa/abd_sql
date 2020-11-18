<?php namespace App\Controllers;

class Data extends BaseController
{
    public static function u($var)
	{
		$DB = \Config\Database::connect();
		$sql = "SELECT * from users WHERE id=".user_id();
		$hasil = $DB->query($sql)->getResultArray();
		return $hasil[0][$var];
	}
	public static function RunningSQL($sql)
	{
		$DB = \Config\Database::connect();
		return $DB->query($sql);
	}
}
