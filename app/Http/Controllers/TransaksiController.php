<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class TransaksiController extends Controller
{
    //Menampilkan Data
    public function index(){
    	// mengambil data dari table transaksi
    	$transaksi = DB::table('tb_transaksi')->get();
 
    	// mengirim data transaksi ke view index
    	return view('index',['tb_transaksi' => $transaksi]);
 
    }

    //Input Data
	public function tambah(){
		//mengambil view tambah
		return view('trtambah');
	}

	// method untuk insert data ke table transaksi
	public function store(Request $request){
		// insert data ke table transaksi
		DB::table('tb_transaksi')->insert([
			'tanggal' => $request->tanggal,
			'nama_brg' => $request->nama_brg,
			'jumlah' => $request->jumlah,
            'total_harga' => $request->total_harga
		]);
		// alihkan halaman ke halaman home
		return redirect('/home');
	}

	//Edit Data
	// method untuk edit data transaksi
	public function edit($id)
	{
		// mengambil data transaksi berdasarkan id yang dipilih
		$transaksi = DB::table('tb_transaksi')->where('id_transaksi',$id)->get();
		// passing data transaksi yang didapat ke view edit.blade.php
		return view('tredit',['tb_transaksi' => $transaksi]);
	
	}

	//Update data transaksi
	public function update(Request $request)
	{
		// update data transaksi
		DB::table('tb_transaksi')->where('id_transaksi',$request->id)->update([
			'tanggal' => $request->tanggal,
			'nama_brg' => $request->nama_brg,
			'jumlah' => $request->jumlah,
			'total_harga' => $request->total_harga
		]);
		// alihkan halaman ke halaman home
		return redirect('/home');
	}

//Hapus Data
	// method untuk hapus data transaksi
	public function delete($id)
	{
		// menghapus data transaksi berdasarkan id yang dipilih
		DB::table('tb_transaksi')->where('id_transaksi',$id)->delete();
			
		// alihkan halaman ke halaman home
		return redirect('/home');
	}

	//fungsi download pdf
	public function downloadpdf(){
		$transaksi = DB::table('tb_transaksi')->get();
		$pdf = Pdf::loadView('pdf.cetak', ['tb_transaksi' => $transaksi] );
		return $pdf->download('laporan-penjualan.pdf');
	}
	
}
