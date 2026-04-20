<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{

//Menampilkan data user
    public function indexuser(){
    	// mengambil data dari table user
    	$user = DB::table('tb_user')->get();
 
    	// mengirim data user ke view index
    	return view('user',['tb_user' => $user]);
 
    }

//Input Data user
	public function tambahuser(){
		//mengambil view tambah
		return view('usertambah');
	}

	// method untuk insert data ke table user
	public function storeuser(Request $request){
		// insert data ke table user
		DB::table('tb_user')->insert([
			'nama' => $request->nama,
			'alamat' => $request->alamat,
			'email' => $request->email,
            'username' => $request->username,
            'password' => $request->password
		]);
		// alihkan halaman ke halaman home
		return redirect('/home/user');
	}

//Edit Data user
	// method untuk edit data user
	public function edituser($id)
	{
		// mengambil data user berdasarkan id yang dipilih
		$user = DB::table('tb_user')->where('id_user',$id)->get();
		// passing data user yang didapat ke view edit.blade.php
		return view('useredit',['tb_user' => $user]);
	
	}

	// update data user
	public function updateuser(Request $request)
	{
		// update data user
		DB::table('tb_user')->where('id_user',$request->id)->update([
			'nama' => $request->nama,
			'alamat' => $request->alamat,
			'email' => $request->email,
            'username' => $request->username,
            'password' => $request->password
		]);
		// alihkan halaman ke halaman home
		return redirect('/home/user');
	}

//Hapus Data user
	// method untuk hapus data user
	public function deleteuser($id)
	{
		// menghapus data user berdasarkan id yang dipilih
		DB::table('tb_user')->where('id_user',$id)->delete();
			
		// alihkan halaman ke halaman home
		return redirect('/home/user');
	}
}
