<?php

try{

require_once( 'bootstrap.php' );

echo 'this year: ';
var_dump( Datium\Datium::now()->get() );
echo "<br>";
var_dump( Datium\Datium::now()->sub('3 year')->get() );
echo "<br>";
var_dump( Datium\Datium::now()->add('3 year')->get() );
echo "<br>";
var_dump( Datium\Datium::now()->get() );
echo "<br>Leap year ";
var_dump( Datium\Datium::now()->leap()->get() );
echo "<br>Create new DateTime: ";
var_dump( Datium\Datium::create(2000, 1, 1, 0, 0, 0)->get() );
echo "<br>";
echo 'Is next year leap? ';
var_dump( Datium\Datium::now()->add('1 year')->leap()->get() );
echo "<br>";
echo "Day of Year in gregorian:";
echo "<br>";
var_dump( Datium\Datium::now()->dayOf()->year() );
echo "<br>";
echo "Day of Year in shamsi:";
echo "<br>";
var_dump( Datium\Datium::now()->toShamsi()->dayOf()->year() );
echo "<br>";
echo "Day of Year in ghamari:";
echo "<br>";
var_dump( Datium\Datium::now()->toGhamari()->dayOf()->year() );
echo "<br>";
echo "Day of Week";
echo "<br>";
var_dump( Datium\Datium::now()->dayOf()->week() );
echo "<br>";
echo "Change date form gregorian to shamsi with to method:";
var_dump( Datium\Datium::create( 1989, 10, 28)->toShamsi()->get( 'l jS F Y h:i:s A' ) );
echo "<br>";
var_dump( Datium\Datium::now()->toGhamari()->get( 'l jS F Y h:i:s A') );
echo "<br>is persian holiday? ";
var_dump( Datium\Datium::create(2015, 3, 29)->events()->iran()->validate() );

} catch (Exception $e ) {

  var_dump( $e );

}

?>
