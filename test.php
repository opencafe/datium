<?php

try{

require_once( 'bootstrap.php' );

var_dump( Datium::now()->add('1 year')->get('ir') );
var_dump( Datium::now()->sub('1 year')->get('ir') );
var_dump( Datium::now()->get('ir') );
var_dump( Datium::now()->leap()->get() );

echo 'Is next year leap?';
var_dump( Datium::now()->add('1 year')->leap()->get() );
} catch (Exception $e ) {

  var_dump( $e );

}


?>
