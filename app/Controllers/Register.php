<?php namespace App\Controllers;

class Register extends BaseController
{
	public function index()
	{
		if (user() == null) {
			$data = [
				'title' => "Register Control Panel"
			];
			return view('login/regis',$data);
		}else {
			return redirect()->to('/beranda');
		}
	}
}
