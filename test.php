<?php


try{

require_once 'datium.php';

var_dump( Datium::now()->add('1 year')->get() );


} catch (Exception $e ) {

  var_dump( $e );

}


?>
