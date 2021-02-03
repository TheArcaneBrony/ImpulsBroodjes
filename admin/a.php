<?php
/**
 * This code will benchmark your server to determine how high of a cost you can
 * afford. You want to set the highest cost that you can without slowing down
 * you server too much. 8-10 is a good baseline, and more is good if your servers
 * are fast enough. The code below aims for ≤ 50 milliseconds stretching time,
 * which is a good baseline for systems handling interactive logins.
 */
$timeTarget = 0.25; // 50 milliseconds 

for ($i=0; $i < 10; $i++) { 
    $cost = 5;
do {
    $cost++;
    $start = microtime(true);
    password_hash("test", PASSWORD_BCRYPT, ["cost" => $cost]);
    $end = microtime(true);
    echo "Cost: " . $cost. " | Time spent: " . $end - $start."<br>";
} while (($end - $start) < $timeTarget);

echo "Appropriate Cost Found: " . $cost."<br><br>";
}

?>