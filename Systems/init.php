<?php 

// Kode autoload untuk menangkap satu folder dengan format file sama agar ditampilkan [Sintaks Autoload ERROR!]

// spl_autoload_register( function( $class ) {
// 	$class = explode('\\', $class);
// 	$class = end( $class );
// 	require_once __DIR__ . '/saluran/' . $class . '.php';
// } );

// Autoload masih belum bisa dioperasikan

// Cara manual selain autoload
require_once 'saluran/Link.php';
require_once 'saluran/Sambungan.php';
require_once 'saluran/URLink.php';