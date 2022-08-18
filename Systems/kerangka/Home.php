<?php 

// File Home ini adalah kerangka dari tampilan Home Page
class Home extends Sambungan

{
	public function index()

	{
		$data[ 'judul' ] = 'Home Page';

		$this->menampilkan( 'templat/Head' , $data );
		$this->menampilkan( 'beranda/index' );
		$this->menampilkan( 'templat/Foot' );
	}
}