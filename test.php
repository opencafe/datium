<?php

use Datium\Datium as Datium;
use Datium\Tools\Convert as Covnert;

try{

require_once( 'vendor/autoload.php' );
var_dump( Datium::create( 1394, 9, 24 )->from( 'jalali' )->get() );
var_dump( Datium::create( 2020, 07, 11 )->to( 'jalali' )->get() );
var_dump( Datium::create( 2020, 07, 11 )->to( 'hijri' )->get() );
echo '<br>this year:<br>';
var_dump( Datium::create( 2016, 6, 25, 12, 0, 0 )->to( 'hijri' )->lang( 'ar' )->get('l jS F Y h:i:s A') );
echo "<br>";
var_dump( Datium::now()->to( 'jalali' )->get('l jS F Y h:i:s A') );
echo "<br>";
var_dump( Datium::now()->to( 'jalali' )->sub('3 year')->get() );
echo "<br>";
var_dump( Datium::now()->to( 'jalali' )->add('3 year')->get() );
echo "<br>";
var_dump( Datium::now()->get( 'l jS F Y h:i:s A' ) );
echo "<br>Leap year ";
var_dump( Datium::now()->leap()->get() );
echo "<br>Create new DateTime: ";
var_dump( Datium::create(2000, 1, 1, 0, 0, 0)->get() );
echo "<br>";
echo 'Is next year leap? ';
var_dump( Datium::now()->add('1 year')->leap()->get() );
echo "<br>";
echo "Day of Year in gregorian:";
echo "<br>";
var_dump( Datium::now()->dayOf()->year() );
echo "<br>";
echo "Day of Year in jalali:";
echo "<br>";
var_dump( Datium::now()->to('jalali')->dayOf()->year() );
echo "<br>";
echo "Day of Year in hijri:";
echo "<br>";
var_dump( Datium::now()->to( 'hijri' )->dayOf()->year() );
echo "<br>";
echo "Day of Week : gregorian";
echo "<br>";
var_dump( Datium::now()->dayOf()->week() );
echo "<br>";
echo "Day of Week in Date(2015, 1, 1)";
echo "<br>";
var_dump( Datium::create( 2015, 1, 1 )->dayOf()->week() );
echo "<br>";
echo "Day of Week : jalali";
echo "<br>";
var_dump( Datium::now()->to('jalali')->dayOf()->week() );
echo "<br>";
echo "Day of Week in Date(2015, 1, 1)";
echo "<br>";
var_dump( Datium::create( 2015, 1, 1 )->to('jalali')->dayOf()->week() );
echo "<br>";
echo "Change date form gregorian to jalali with method: ";
var_dump( Datium::create( 1989, 10, 27 )->to( 'jalali' )->get( 'l jS F Y h:i:s A' ) );
echo "<br>";
var_dump( Datium::now()->to( 'hijri' )->get( 'l jS F Y h:i:s A' ) );
echo "<br>";
var_dump( Datium::now()->to( 'hijri' )->lang( 'ar' )->get( 'h:i:s Y jS l F' ) );
echo "<br>";
echo "<br>is persian holiday? ";
// var_dump(  Datium::between( Datium::now()->object() , Datium::now()->add( '3 month' )->object() )->events()->local( 'us' )->local( 'ir' )->get() );
echo 'return international days';
// var_dump(  Datium::between( Datium::now()->object() , Datium::now()->add('4 month')->object() )->events()->international()->get() );
echo 'Convert gregorian to perisan';
var_dump( Datium::now()->to('jalali')->get() );
echo 'Today\'s events:';
// var_dump( Datium::now()->events()->local( 'ir' )->get() );
echo 'Date diff';
$diff = Datium::diff( Datium::now()->object(), Datium::now()->add('5 day')->object() );
var_dump( $diff->days );
var_dump( Datium::create( 2015, 11, 9 )->to( 'hijri' )->get() );


} catch (Exception $e ) {

  var_dump( $e );

}
