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
var_dump( Datium\Datium::now()->toGregorian()->dayOf()->year() );
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
echo "Change date form gregorian to shamsi with method: ";
var_dump( Datium\Datium::create( 1989, 10, 28)->toShamsi()->get( 'l jS F Y h:i:s A' ) );
echo "<br>";
var_dump( Datium\Datium::now()->toGhamari()->get( 'l jS F Y h:i:s A') );
echo "<br>";
echo "Change date form shamsi to gregorian with method: ";
var_dump( Datium\Datium::create( 1357, 11, 22 )->toGregorian('ir')->get( 'l jS F Y h:i:s A' ) );
echo "<br>";
echo "Change date form ghamari to gregorian with method: ";
var_dump( Datium\Datium::create( 1437, 1, 1 )->toGregorian('gh')->get( 'l jS F Y h:i:s A' ) );



// echo "is persian holiday? ";
// var_dump( Datium\Datium::now()->events()->local( 'united-states' )->local( 'iran' )->get() );

} catch (Exception $e ) {

  var_dump( $e );

}

?>
