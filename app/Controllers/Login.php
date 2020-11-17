<?php namespace App\Controllers;

class Login extends BaseController
{
	public function index()
	{
		if (user() == null) {
			$data = [
				'title' => "Login Control Panel"
			];
			return view('login/log',$data);
		}else {
			return redirect()->to('/beranda');
		}
	}
	public function forgot()
	{
		echo "halaman ini tidak berfungsi";
	}
}
