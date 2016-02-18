function solution($N, $A) {
    // write your code in PHP5.5
    $counters = array_fill(0, $N, 0);
    $maxValue = 0;
    
    foreach ($A as $op) {
        if ($op >= $N + 1) {
            $counters = array_fill(0, $N, $maxValue);
        }
        elseif ($op >= 1) {
            $incValue = ++$counters[$op - 1];
            $maxValue = ($maxValue < $incValue) ? $incValue : $maxValue;
        }
        else {};
    }
    
    return $counters;
}