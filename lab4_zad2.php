<?php
function fibbRec($n)
{
    $startRecTime = microtime(true);
    if ($n == 0) return 0;
    if ($n == 1) return 1;
    if ($n > 1) {
        $endRecTime = microtime(true);
        $timeRec = ($endRecTime - $startRecTime) * 1000;
        echo '  Czas funkcji rekurencyjnej  ' . $timeRec;
        return fibbRec($n - 1) + fibbRec($n - 2);
    }
}
function fibbNonRec($n)
{
    $startNonRecTime = microtime(true);
   $fib = array();
   $fib[0] = 0;
   $fib[1] = 1;
    if($n>1)
    {
        for ($i=2; $i<=$n; $i++)
        {
            $fib[$i] = $fib[$i-1] + $fib[$i-2];
        }
    }
    $endNonRecTime = microtime(true);
    $timeNonRec = ($endNonRecTime - $startNonRecTime) * 1000;
    echo "  Czas funkcji nierekurencyjnej: " . $timeNonRec;
    return $fib[$n];
}
$n = 5;
fibbNonRec($n);
fibbRec($n);
?>
