function solution($N, $A) {
    // write your code in PHP5.5
    $counters = array_fill(0, $N, 0);
    $maxValue = $offset = 0;
    $B = [];
    
    $countValues = array_count_values($A);
    $maxCounterOpCount = ($countValues[$N + 1]) ?: 0;
    foreach($A as $op) {
        if ($maxCounterOpCount) {
            if ($op >= ($N + 1)) {
                $subCountValues = array_count_values($B);
                $subOffset = max($subCountValues);
                if ($subOffset)
                    $offset += $subOffset;
                $maxCounterOpCount--;
                $B = [];
            }
            elseif ($op >= 1) {
                $B[] = $op;
            }
            else {};
        }
        else {
            $counters[$op - 1]++;
        }
    }
    
    if ($offset)
        foreach ($counters as &$c)
            $c += $offset;
            
    return $counters;
}