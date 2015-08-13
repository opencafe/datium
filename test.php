<?php


try{

require_once 'datium.php';

echo( Datium::now()->add('1 year')->per_date()->get() );
echo "<br>";
echo( Datium::now()->sub('1 year')->per_date()->get() );
echo "<br>";
echo( Datium::now()->per_date()->get() );
echo "<br>";



} catch (Exception $e ) {

  var_dump( $e );

}


?>
