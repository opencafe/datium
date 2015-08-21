<?php

try{

require_once( 'bootstrap.php' );

var_dump( Datium::now()->add('1 year')->get('ir') );
echo "<br>";
var_dump( Datium::now()->sub('1 year')->get('ir') );
echo "<br>";
var_dump( Datium::now()->get('ir') );
echo "<br>";
var_dump( Datium::now()->leap()->now() );
var_dump( Datium::now()->add('7 year')->leap()->now() );

} catch (Exception $e ) {

  var_dump( $e );

}


?>
