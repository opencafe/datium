<?php

try{

require_once( 'bootstrap.php' );

echo 'this year:';
var_dump( Datium::now()->get() );
var_dump( Datium::now()->sub('3 year')->get() );
var_dump( Datium::now()->add('3 year')->get() );
var_dump( Datium::now()->get() );
var_dump( Datium::now()->leap()->get() );

echo 'Is next year leap?';
var_dump( Datium::now()->add('1 year')->leap()->get() );

var_dump( Datium::now()->dayOf()->year() );

var_dump( Datium::now()->get('l jS F Y h:i:s A') );

} catch (Exception $e ) {

  var_dump( $e );

}


?>
