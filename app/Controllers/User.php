<?php namespace App\Controllers;

use App\Controllers\Data;
class User extends BaseController
{
	public function index()
	{
		if (!logged_in()) {
			return redirect()->to('/');
		}
		$data = [
			'title' => "Beranda",
			'username' => Data::u('username')
		];
		return view('page/user', $data);
	}
    public function mypost($page = 1)
    {
		if (!logged_in()) {
			return redirect()->to('/');
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
			return redirect()->to('/');
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
	public function editp($username,$slug)
	{
		if (Data::u('username') == $username) {
			$sql2 = "SELECT * FROM blog WHERE slug = '$slug'";
			$data2 = Data::RunningSQL($sql2);
			$data2 = $data2->getFirstRow();
		}else{
			return redirect()->to('/');
		}
		$data = [
			'title' 	=> $data2->judul." || edit ",
			'username' 	=> Data::u('username'),
			'post'		=> $data2
		];
		return view('/page/edit',$data);
	}
	public function editps($username , $slug)
	{
		$sql2 = "SELECT * FROM blog WHERE slug ='$slug'";
		$data2 = Data::RunningSQL($sql2);
		$data2 = $data2->getFirstRow();
		$judul 		= $this->request->getVar('judul');
		$deskripsi 	= $this->request->getVar('deskripsi');
		$status		= $this->request->getVar('status');
		$tipe		= $this->request->getVar('tipe');
		$updated_at = date('Y-m-d H:i:s');
		if (Data::u('username') == $username) {
			$sql1 = "UPDATE blog SET judul = '$judul', deskripsi = '$deskripsi', status = '$status', tipe='$tipe' , updated_at = '$updated_at' WHERE id ='$data2->id'";
			Data::RunningSQL($sql1);
		}else{
			return redirect()->to('/');
		}
		return redirect()->to('/p/'.Data::u('username').'/'.$data2->slug);
	}
	public function postdel($id)
	{
		$sql = "DELETE FROM blog WHERE id='$id'";
		Data::RunningSQL($sql);
		return redirect()->to('/user/mypost');
	}
}