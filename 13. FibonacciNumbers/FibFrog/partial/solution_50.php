function solution($A) {
    // write your code in PHP5.5
    $N = count($A);        
    $F = [];
    $F[0] = 0;
    $F[1] = 1;
    
    $i=2;
    while($F[$i-1] + $F[$i-2] <= $N+1) {
        $maxF = $F[$i] = $F[$i-1] + $F[$i-2];
        $i++;
    }
    
    if ($maxF == $N+1)
        return 1;
        
    $F = array_flip($F);
        
    $minResult = -1;
    for($i=0;$i<$N;$i++) {
        $pos = -1;
        // find first leaf to jump
        if ($A[$i] > 0 && isset($F[$i - $pos])) {
            $result = 1;
            $pos = $i;
            
            if (isset($F[$N - $pos])) {
                $result++;
                $pos = $N;
            }
            else {
                $j = $i + 1;
                while ($j < $N) {
                    if ($A[$j] > 0 && isset($F[$j - $pos])) {
                        $pos = $j;
                        $result++;
                        if (isset($F[$N - $pos])) {
                            $result++;
                            $pos = $N;
                            break;
                        }                        
                    }
                    $j++;
                }
            }
            
            if ($pos == $N)
                $minResult = ($minResult == -1) ? $result : min($minResult, $result);            
        }
    }
        
    return $minResult;
}