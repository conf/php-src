--TEST--
gmp_powm() basic tests
--FILE--
<?php

var_dump(gmp_strval(gmp_powm(0,1,10)));
var_dump(gmp_strval(gmp_powm(5,1,10)));
var_dump(gmp_strval(gmp_powm(-5,1,-10)));
var_dump(gmp_strval(gmp_powm(-5,1,10)));
var_dump(gmp_strval(gmp_powm(-5,11,10)));
var_dump(gmp_strval(gmp_powm("77",3,1000)));

$n = gmp_init(11);
var_dump(gmp_strval(gmp_powm($n,3,1000)));
$e = gmp_init(7);
var_dump(gmp_strval(gmp_powm($n,$e,1000)));
$m = gmp_init(900);
var_dump(gmp_strval(gmp_powm($n,$e,$m)));

var_dump(gmp_powm(array(),$e,$m));
var_dump(gmp_powm($n,array(),$m));
var_dump(gmp_powm($n,$e,array()));
var_dump(gmp_powm(array(),array(),array()));
var_dump(gmp_powm(array(),array()));
var_dump(gmp_powm(array()));
var_dump(gmp_powm());

echo "Done\n";
?>
--EXPECTF--	
string(1) "0"
string(1) "5"
string(1) "5"
string(1) "5"
string(1) "5"
string(3) "533"
string(3) "331"
string(3) "171"
string(3) "371"

Warning: gmp_powm(): Unable to convert variable to GMP - wrong type in %s on line %d
bool(false)

Warning: gmp_powm(): Unable to convert variable to GMP - wrong type in %s on line %d
bool(false)

Warning: gmp_powm(): Unable to convert variable to GMP - wrong type in %s on line %d
bool(false)

Warning: gmp_powm(): Unable to convert variable to GMP - wrong type in %s on line %d
bool(false)

Warning: Wrong parameter count for gmp_powm() in %s on line %d
NULL

Warning: Wrong parameter count for gmp_powm() in %s on line %d
NULL

Warning: Wrong parameter count for gmp_powm() in %s on line %d
NULL
Done
