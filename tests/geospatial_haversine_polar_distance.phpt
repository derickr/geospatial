--TEST--
Check the haversine function returns the correct distance between the North and South poles, using a custom radius.
--SKIPIF--
<?php if (!extension_loaded("geospatial")) print "skip"; ?>
--INI--
precision=14
--FILE--
<?php 
$from = array(
	'type' => 'Point',
	'coordinates' => array( 0, -90 )
);
$to = array(
	'type' => 'Point',
	'coordinates' => array( 0, 90 )
);
echo haversine($from, $to, 6356.7523);
/*
	Test the haversine distance between the North and South poles.

	Accept defined (equatorial) Earth Radius in km (which is based on WGS-84):
	- 6,378,1370m (at the equator).
	- 6,356,7523m (around the poles).
*/
?>
--EXPECT--
19970.32632637
