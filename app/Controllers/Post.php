<?php namespace App\Controllers;

use App\Controllers\Data;
class Post extends BaseController
{
	public function index($username, $slug)
	{
        $sql1 = "SELECT * FROM users WHERE username='$username'";
        $data1 = Data::RunningSQL($sql1);
        $data1 = $data1->getFirstRow();
        $sql2 = "SELECT * FROM blog WHERE user_id = '$data1->id' AND slug='$slug'";
        $data2 = Data::RunningSQL($sql2);
        $data2 = $data2->getFirstRow();
        $data = [
            'title'     => $data2->judul,
            'username'  => Data::u('username'),
            'user'      => $data1,
            'post'      => $data2
        ];
        if ($data1 == null && $data2 == null) {
            return redirect()->to('beranda');
        }else {
            return view('/page/post',$data);
        }
    }
}