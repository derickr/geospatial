--TEST--
WGS84 to OSGB36 for Greenwich Observertory
--FILE--
<?php

$lat = dms_to_decimal(51, 28.675, 0, 'N');
$long = dms_to_decimal(0, 0.089, 0, 'W');

$from = array('type' => 'Point', 'coordinates' => array( $long, $lat ) );

$polar = transform_datum($from, GEO_WGS84, GEO_AIRY_1830);

$diferenceWGS84 = haversine(
	$from,
	array('type' => 'Point', 'coordinates' => array( 0, $lat ) )
);

$diferenceAiry = haversine(
	$polar,
	array('type' => 'Point', 'coordinates' => array( 0, $polar['coordinates'][1] ) )
);
//lat long of merdian in Airy 1830 ideally long of 0
var_dump($polar);
//distance in m of difference from lat long and meridian
echo round($diferenceWGS84 * 1000, 8),PHP_EOL;
echo round($diferenceAiry * 1000, 8),PHP_EOL;
?>
--EXPECT--
array(2) {
  ["type"]=>
  string(5) "Point"
  ["coordinates"]=>
  array(2) {
    [0]=>
    float(0.00013627354767069)
    [1]=>
    float(51.477400823311)
  }
}
102.84185171
9.44816796
