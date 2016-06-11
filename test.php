<?php
use OpenCafe\Datium as Datium;
use OpenCafe\Tools\Convert as Covnert;

try {
    include_once 'vendor/autoload.php';
    var_dump("-----------------------[ Test Start ]-------------------------<br/>");
    // echo '<br>this year:<br>';
    // var_dump( Datium::create( 2016, 1, 25, 12, 0, 0 )->to( 'hijri' )->lang( 'ar' )->get('l jS F Y h:i:s A'), "\n\r" );
    // var_dump( Datium::now()->to( 'jalali' )->get('l jS F Y h:i:s A'), "\n\r"  );
    // echo "Create new DateTime: ";
    // var_dump( Datium::create(2000, 1, 1, 0, 0, 0)->get(), "\n\r"  );
    // echo 'Is next year leap? ';
    // var_dump( Datium::now()->add('1 year')->leap()->get(), "\n\r"  );
    echo "Day of Year in gregorian:";
    var_dump(Datium::now()->dayOf()->year(), "<br/>");
    // echo "Day of Year in jalali:";
    // var_dump( Datium::now()->to('jalali')->dayOf()->year(), "\n\r"  );
    // echo "Day of Year in hijri:";
    // var_dump( Datium::now()->to( 'hijri' )->dayOf()->year(), "\n\r"  );
    // echo "Day of Week : gregorian";
    // var_dump( Datium::now()->dayOf()->week(), "\n\r"  );
    // echo "Day of Week in Date(2015, 1, 1)";
    // var_dump( Datium::create( 2015, 1, 1 )->dayOf()->week(), "\n\r"  );
    // echo "Day of Week : jalali";
    // var_dump( Datium::now()->to('jalali')->dayOf()->week(), "\n\r"  );
    // echo "Day of Week in Date(2015, 1, 1)";
    // var_dump( Datium::create( 2015, 1, 1 )->to('jalali')->dayOf()->week(), "\n\r"  );
    // echo "Change date form gregorian to jalali with method: ";
    // var_dump( Datium::create( 1989, 10, 27 )->to( 'jalali' )->get( 'l jS F Y h:i:s A' ), "\n\r"  );
    // var_dump( Datium::now()->to( 'hijri' )->get( 'l jS F Y h:i:s A' ), "\n\r"  );
    // var_dump( Datium::now()->to( 'hijri' )->lang( 'ar' )->get( 'h:i:s Y jS l F' ), "\n\r"  );
    // echo "is persian holiday? ";
    // var_dump(  Datium::between( Datium::now()->object() , Datium::now()->add( '3 month' )->object() )->events()->local( 'us' )->local( 'ir' )->get() );
    // echo 'return international days';
    // var_dump(  Datium::between( Datium::now()->object() , Datium::now()->add('4 month')->object() )->events()->international()->get() );
    // echo 'Convert gregorian to perisan';
    // echo 'Today\'s events:';
    // var_dump( Datium::now()->events()->local( 'ir' )->get() );
    // echo 'Persian calendar:';
    // var_dump( Datium::now()->lang('fa')->get( 'l jS F Y h:i:s A' ) );
    var_dump("-----------------------[ Test End ]-------------------------<br/>");
} catch (Exception $e) {
    var_dump($e);
}
