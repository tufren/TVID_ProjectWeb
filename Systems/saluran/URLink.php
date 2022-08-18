<?php 

// File URLink untuk menampilkan halaman web
class URLink

{
	// Peng-indeks-an fariabel untuk antarmuka web saat diproses pertama kali
	protected $halaman = 'Home';
	protected $pilihan = 'index';
	protected $urutan = [];

	public function __construct()

	{
		// Menautkan fungsi pisahURL() yang ada dibawah
		$url = $this->pisahURL();

		// Pengkondisian kalau URL kosong, diisi dengan halaman antarmuka web awal
		if ( $url == NULL ) {
			 $url = [ $this->halaman ];
		}

		// Pengkondisian kalau halaman yang dituju tidak ada atau kosong
		if ( file_exists( '../Systems/kerangka/' . $url[ 0 ] . '.php' ) ) {
			 $this->halaman = $url[ 0 ];
			 unset( $url[ 0 ] );
		}

		// Masukan respon halaman awal
		include '../Systems/kerangka/' . $this->halaman . '.php';

		// Timpa dengan halaman awal
		$this->halaman = new $this->halaman;

		// Pengkondisian kalau halaman yang dituju ada
		if ( isset( $url[ 1 ] ) ) {
			 if ( method_exists( $this->halaman , $url[ 1 ] ) ) {
			 	 $this->pilihan = $url[ 1 ];

			 	 unset( $url[ 1 ] );
			 }
		}

		// Pengkondisian kalau halaman tidak kosong dan ada filenya
		if ( !empty( $url ) ) {
			 $this->urutan = array_values( $url );
		}

		// Panggil halaman yang dituju
		call_user_func_array( [$this->halaman , $this->pilihan] , $this->urutan );
	}

	// Fungsi untuk merapikan URL web
	public function pisahURL()

	{
		// Pengkondisian untuk menangkap URL
		if ( isset( $_GET['url'] ) ) {

			 // Menangkap URL dengan tanda Slash
			 $url = rtrim( $_GET[ 'url' ] , '/' );

			 //Membersihkan format file halaman pada URL 
			 $url = filter_var( $url , FILTER_SANITIZE_URL );

			 // Memisahkan tanda Slash dengan URL
			 $url = explode( '/' , $url );

			 // Tampilkan URL yang sudah dirapikan
			 return $url;
		}
	}
}