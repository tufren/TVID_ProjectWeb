<?php 

// File Sambungan untuk menampilkan tampilan halaman web
class Sambungan

{
	// Peng-indeks-an, untuk mengindikasi tampilan yang akan ditampilkan
	public function menampilkan( $file_tampilan , $data = [] )

	{
		// Memanggil file halaman yang akan ditampilkan
		include_once '../Systems/tampilan/' . $file_tampilan . '.php';
	}

	// Belum sampai ke bagian ini. Sintaks ini untuk mengindikasi data dari database
	public function meta( $file_database )

	{
		include_once '../Systems/dbs/' . $file_database . '.php';

		return new $file_database;
	}
}