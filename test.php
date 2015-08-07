<?php


try{

require_once 'datium.php';

var_dump( Datium::now()->get() );


} catch (Exception $e ) {

  var_dump( $e );

}


?>
