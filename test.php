<?php

try{

require_once( 'bootstrap.php' );

echo 'this year: <br>';
var_dump( Datium\Datium::now()->toShamsi()->get( 'l jS F Y h:i:s A' ) );
echo "<br>";
var_dump( Datium\Datium::now()->toShamsi()->sub('3 year')->get() );
echo "<br>";
var_dump( Datium\Datium::now()->toShamsi()->add('3 year')->get() );
echo "<br>";
var_dump( Datium\Datium::now()->toGregorian()->get( 'l jS F Y h:i:s A' ) );
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
var_dump( Datium\Datium::now()->dayOf()->year('gr') );
echo "<br>";
echo "Day of Year in shamsi:";
echo "<br>";
var_dump( Datium\Datium::now()->toShamsi()->dayOf()->year('ir') );
echo "<br>";
echo "Day of Year in ghamari:";
echo "<br>";
var_dump( Datium\Datium::now()->toGhamari()->dayOf()->year('gh') );
echo "<br>";
echo "Day of Week";
echo "<br>";
var_dump( Datium\Datium::now()->dayOf()->week('gh') );
echo "<br>";
echo "Change date form gregorian to shamsi with method: ";
var_dump( Datium\Datium::create( 1989, 10, 28)->toShamsi()->get( 'l jS F Y h:i:s A' ) );
echo "<br>";
var_dump( Datium\Datium::now()->toGhamari()->get( 'l jS F Y h:i:s A') );
echo "<br>is persian holiday? ";
var_dump( Datium\Datium::create(2015, 3, 29)->events()->iran()->validate() );

} catch (Exception $e ) {

  var_dump( $e );

}

?>
