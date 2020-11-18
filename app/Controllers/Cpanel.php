<?php namespace App\Controllers;

use App\Controllers\Data;
class Cpanel extends BaseController
{
	public function index()
	{
        $DATA = new Data(user_id());
        dd($DATA->user);
		$data = [
			'title' => "Beranda",
			'username' => $this->username
		];
		return view('', $data);
	}
}
