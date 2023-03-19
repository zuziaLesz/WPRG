<?php
$rok = $_POST['rok'];
if($rok<=1582)
{
    $x=15;
    $y=6;
}
elseif($rok<=1699)
{
    $x=22;
    $y=2;
}
elseif($rok<=1799)
{
    $x=23;
    $y=3;
}
elseif($rok<=1899)
{
    $x=23;
    $y=4;
}
elseif($rok<=2099)
{
    $x=24;
    $y=5;
}
elseif($rok<=2199)
{
    $x=24;
    $y=6;
}
$a = $rok % 19;
$b = $rok % 4;
$c = $rok % 7;
$d = (19*$a + $x) % 30;
$f = (2*$b + 4*$c + 6*$d +$y) % 7;
if($f==6 && $d==29)
{
    $dzien = 26;
    $miesiac = 'kwiecien';
}
elseif($f==6 && $d==28 && (11*$x+11)%30<19)
{
    $dzien = 18;
    $miesiac = 'kwiecien';
}
elseif (($d+$f)<10)
{
    $dzien = 20 + $d + $f;
    $miesiac = 'marzec';
}
else
{
    $dzien = $d + $f - 9;
    $miesiac = 'kwiecien';
}
echo "Wielkanoc:\n";
echo $dzien;
echo $miesiac;
?>