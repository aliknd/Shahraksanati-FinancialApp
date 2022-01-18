<?php

echo "Hello World! <br>";

$input = array(100, 50, 20);
$inputLength=count($input);
$high=max($input);
$low=min($input);
$sum=array_sum($input);
$average = $sum/$inputLength;
$diff = $input[0] - $input[$inputLength - 1];


echo "low: ".$low.","."high: ".$high.","."average: ".$average.","."diff: ".$diff.".";

?>