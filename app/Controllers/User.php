<?php namespace App\Controllers;

use App\Controllers\Data;
class User extends BaseController
{
	public function index()
	{
		if (!logged_in()) {
			redirect()->to('/');
		}
		$data = [
			'title' => "Beranda",
			'username' => Data::dt('username')
		];
		return view('page/user', $data);
	}
    public function mypost($page = 1)
    {
		if (!logged_in()) {
			redirect()->to('/');
		}
		$page = ($page-1) * 5;
		$sql = "SELECT * FROM blog WHERE user_id =".user_id()." AND tipe = 'post' ORDER BY `updated_at` DESC LIMIT ".$page.",5";
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
		if (!logged_in()) {
			redirect()->to('/');
		}
		$page = ($page-1) * 5;
		$sql = "SELECT * FROM blog WHERE user_id =".user_id()." AND tipe = 'halaman' ORDER BY `updated_at` DESC LIMIT ".$page.",5";
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
	public function adds()
	{
		$user_id 	= user_id();
		$judul 		= $this->request->getVar('judul');
		$slug 		= url_title($this->request->getVar('judul'))."-".idate("s");
		$penulis	= Data::u('nama');
		$deskripsi 	= $this->request->getVar('deskripsi');
		$status		= $this->request->getVar('status');
		$tipe		= $this->request->getVar('tipe');
		$created_at = date('Y-m-d H:i:s');
		$updated_at = date('Y-m-d H:i:s');
		$sql = "INSERT INTO `blog` (`user_id`, `judul`, `slug`, `penulis`, `deskripsi`, `status`, `tipe`, `created_at`, `updated_at`) VALUES
		('$user_id', '$judul', '$slug', '$penulis', '$deskripsi', '$status', '$tipe', '$created_at', '$updated_at');";
		Data::RunningSQL($sql);
		if ($tipe =='post') {
			return redirect()->to('/user/mypost');
		}else {
			return redirect()->to('/user/mypage');
		}
	}
}