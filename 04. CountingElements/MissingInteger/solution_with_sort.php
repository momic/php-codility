function solution($A) {
    // write your code in PHP5.5
    sort($A);
    $lastValue = -1;
    foreach($A as $value) {
        if ($value > 0) {
            if ($lastValue < 0) {
                $lastValue = $value;
                if ($value != 1)
                    return 1;
            }
            elseif (($value - $lastValue) <= 1) {
                $lastValue = $value;
            }
            else
                return ($lastValue + 1);
        }
    }

    return ($lastValue < 0) ? 1 : ($lastValue + 1);
}