<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
 
 
class BarangController extends Controller
{

//Menampilkan Data
    public function indexbrg(){
    	// mengambil data dari table barang
    	$transaksi = DB::table('tb_barang')->get();
 
    	// mengirim data barang ke view dataproduk.blade.php
    	return view('dataproduk',['tb_barang' => $transaksi]);
 
    }

//Input Data
	public function tambahbrg(){
		//mengambil view tambah
		return view('tambah');
	}

	// method untuk insert data ke table barang
	public function storebrg(Request $request){
		// insert data ke table barang
		DB::table('tb_barang')->insert([
			'nama_brg' => $request->nama_brg,
			'harga' => $request->harga,
			'stok' => $request->stok
		]);
		// alihkan halaman ke halaman kelola data produk
		return redirect('/home/brg');
	}

//Edit Data
	// method untuk edit data barang
	public function editbrg($id)
	{
		// mengambil data barang berdasarkan id yang dipilih
		$barang = DB::table('tb_barang')->where('id_brg',$id)->get();
		// passing data barang yang didapat ke view edit.blade.php
		return view('edit',['tb_barang' => $barang]);
	
	}

	//Update data barang
	public function updatebrg(Request $request)
	{
		// update data barang
		DB::table('tb_barang')->where('id_brg',$request->id)->update([
			'nama_brg' => $request->nama_brg,
			'harga' => $request->harga,
			'stok' => $request->stok
		]);
		// alihkan halaman ke halaman home
		return redirect('/home/brg');
	}

//Hapus Data
	// method untuk hapus data barang
	public function deletebrg($id)
	{
		// menghapus data barang berdasarkan id yang dipilih
		DB::table('tb_barang')->where('id_brg',$id)->delete();
			
		// alihkan halaman ke halaman home
		return redirect('/home/brg');
	}
	
}
