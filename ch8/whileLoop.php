<?php
//avg 100 random numbers
$total = 0;
$count = 0;
while($count < 100){
    $number = mt_rand(0, 100); //get random num from 0 to 100
    $total += $number;
    $count++;
}

$average = $total / $count;
echo 'The average is: ' . $average;

//-----------------------------------------------
echo "<br>----------------------------------------------------</br>";

//a while loop that counts dice rolls until six is rolled
$rolls = 1;
while(mt_rand(1,6) != 6) {
    $rolls++;
}
echo 'Number of times to roll a six: ' . $rolls;

echo "<br>----------------------------------------------------</br>";


//nested while loops that get the average and max rolls for a six
$total2 = 0;
$count2 = 0;
$max2 = -INF;

while($count2 < 10000){
    $rolls = 1;
    while(mt_rand(1, 6) != 6){  //get rand num from 1 to 6
        $rolls++;
    }

    $total2 += $rolls;
    $count2++;
    $max2 = max($rolls, $max2); //get the value of the larger amount
}
$average2 = $total2 / $count2;
echo 'Average: ' . $average2 . ' Max: ' . $max2;


?>



















