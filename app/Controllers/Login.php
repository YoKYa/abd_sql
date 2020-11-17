<?php namespace App\Controllers;

class Login extends BaseController
{
	public function index()
	{
		if (logged_in()) {
			$data = [
				'title' => "Login MiniBlog"
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
