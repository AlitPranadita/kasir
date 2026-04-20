<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class LaporanController extends Controller
{
    public function indexl(){
    	// mengambil data dari table transaksi
    	$transaksi = DB::table('tb_transaksi')->get();
 
    	// mengirim data transaksi ke view indexlaporan
    	return view('indexlaporan',['tb_transaksi' => $transaksi]);
 
    }

//Edit Data
	// method untuk edit data transaksi
	public function editl($id)
	{
		// mengambil data transaksi berdasarkan id yang dipilih
		$transaksi = DB::table('tb_transaksi')->where('id_transaksi',$id)->get();
		// passing data transaksi yang didapat ke view edit.blade.php
		return view('lpedit',['tb_transaksi' => $transaksi]);
	
	}

	//Update data transaksi
	public function updatel(Request $request)
	{
		// update data transaksi
		DB::table('tb_transaksi')->where('id_transaksi',$request->id)->update([
			'tanggal' => $request->tanggal,
			'nama_brg' => $request->nama_brg,
			'jumlah' => $request->jumlah,
			'total_harga' => $request->total_harga
		]);
		// alihkan halaman ke halaman home
		return redirect('/home/laporan');
	}

//Hapus Data
	// method untuk hapus data transaksi
	public function deletel($id)
	{
		// menghapus data transaksi berdasarkan id yang dipilih
		DB::table('tb_transaksi')->where('id_transaksi',$id)->delete();
			
		// alihkan halaman ke halaman home
		return redirect('/home/laporan');
	}

    public function downloadpdf(){
		$transaksi = DB::table('tb_transaksi')->get();
		$pdf = Pdf::loadView('pdf.cetak', ['tb_transaksi' => $transaksi] );
		return $pdf->download('laporan-penjualan.pdf');
	}
}
