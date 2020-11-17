<?php namespace App\Controllers;

class Beranda extends BaseController
{
	public function index()
	{
		$sql = "SELECT * from users WHERE id=".user_id();
		$hasil = $this->DB->query($sql);
		dd($hasil->getResult());
		$data = [
			'title' => "Beranda",
		];
		return view('temp/template', $data);
	}

}
