<?php

try{

require_once( 'bootstrap.php' );

  var_dump( Datium::now()->add('1 year')->get('ir') );
  echo "<br>";
  var_dump( Datium::now()->sub('1 year')->get('ir') );
  echo "<br>";
  var_dump( Datium::now()->get('ir') );
  echo "<br>";

} catch (Exception $e ) {

  var_dump( $e );

}


?>
