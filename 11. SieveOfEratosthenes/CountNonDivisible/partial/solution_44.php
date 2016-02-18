function solution($A) {
    // write your code in PHP5.5
    $N = count($A);
    
    $P = array_fill(0, 2*$N+1, 0);
    $i=2;
    while ($i*$i<=2*$N) {
        if ($P[$i] == 0) {
            $k=$i*$i;
            while ($k<=2*$N) {
                if ($P[$k] == 0)
                    $P[$k] = $i;
                $k+=$i;
            }   
        }
        
        $i++;
    }
    
    $result = [];
    for ($i=0;$i<$N;$i++) {
        $x = $A[$i];
        $factors = [];
        if ($x != 1) {
            while ($P[$x] > 0) {
                $factors[] = $P[$x];
                $factors[] = $x;
                $x /= $P[$x];
            }
            $factors[] = $x;
        }
        $factors[] = 1;
        
        $uniqueFactors = array_keys(array_flip($factors));
        $result[] = count(array_diff($A, $uniqueFactors));
    }
    
    return $result;
}