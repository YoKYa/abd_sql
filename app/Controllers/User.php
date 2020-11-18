<?php namespace App\Controllers;

use App\Controllers\Data;
class User extends BaseController
{
	public function index()
	{
		$data = [
			'title' => "Beranda",
			'username' => Data::dt('username')
		];
		return view('page/user', $data);
	}
    public function mypost($page = 1)
    {
		$page = ($page-1) * 5;
		$sql = "SELECT * FROM blog WHERE user_id =".user_id()." AND tipe = 'post' LIMIT ".$page.",5";
		$sql2 = "SELECT * FROM blog WHERE user_id =".user_id()." AND tipe = 'post'";
		$hasil = Data::RunningSQL($sql);
		$hasil2 = Data::RunningSQL($sql2);

		$post = $hasil->getResult();
		$num = ceil(count($hasil2->getResult())/5);
        $data = [
			'title' => "Postingan Saya",
			'username' => Data::u('username'),
			'posts'	   => $post,
			'no'	=> $page,
			'num'	=> $num
		];
		return view('page/mypost', $data);
	}
	public function mypage($page = 1)
    {
		$page = ($page-1) * 5;
		$sql = "SELECT * FROM blog WHERE user_id =".user_id()." AND tipe = 'halaman' LIMIT ".$page.",5";
		$sql2 = "SELECT * FROM blog WHERE user_id =".user_id()." AND tipe = 'halaman'";
		$hasil = Data::RunningSQL($sql);
		$hasil2 = Data::RunningSQL($sql2);

		$post = $hasil->getResult();
		$num = ceil(count($hasil2->getResult())/5);
        $data = [
			'title' => "Halaman Saya",
			'username' => Data::u('username'),
			'posts'	   => $post,
			'no'	=> $page,
			'num'	=> $num
		];
		return view('page/mypost', $data);
	}
	public function add()
	{
		$data = [
			'title' => "Tambah Post/Halamaan",
			'username' => Data::u('username'),
		];
		return view('page/add',$data);
	}
}