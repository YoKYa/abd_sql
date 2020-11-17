<?php namespace App\Controllers;

class Register extends BaseController
{
	public function index()
	{
		if (logged_in()) {
			$data = [
				'title' => "Register Miniblog"
			];
			return view('login/regis',$data);
		}else {
			return redirect()->to('/beranda');
		}
	}
}
