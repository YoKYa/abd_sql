<?php namespace App\Controllers;

use App\Controllers\Data;
class Beranda extends BaseController
{
	public function index()
	{
		$data = [
			'title' => "Beranda",
			'username' => Data::u('username')
		];
		return view('page/beranda', $data);
	}

}
