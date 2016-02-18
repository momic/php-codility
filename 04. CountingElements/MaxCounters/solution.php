function solution($N, $A) {
    // write your code in PHP5.5
    $counters = array_fill(0, $N, 0);
    $M = count($A);
    $offset = $maxValue = 0;
    for($i=0;$i<$M;$i++) {
        if ($A[$i] >= $N+1) {
            // $counters = array_fill(0, $N, max($counters));
            $offset = $maxValue;
        }
        elseif ($A[$i] >= 1) {
            if ($counters[$A[$i] - 1] < $offset)
                $counters[$A[$i] - 1] = $offset;
            
            $counters[$A[$i] - 1]++;
            $maxValue = max($maxValue, $counters[$A[$i] - 1]);
        }
        else {};
    }
    
    for($i=0;$i<$N;$i++)
        if ($counters[$i] < $offset)
	    // This element has never been used after previous $N + 1 command
            $counters[$i] = $offset;
    
    return $counters;
}