<?php
foreach (range(1, 100) as $start_number) {
    if ($start_number % 3 == 0 && $start_number % 5 == 0) {
        echo "FizzBuzz";
    } elseif ($start_number % 3 == 0) {
        echo "Fizz";
    } elseif ($start_number % 5 == 0) {
        echo "Buzz";
    } else {
        echo $start_number;
    }
}
