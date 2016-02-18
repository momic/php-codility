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
    
    $R = array_fill(0, 2*$N+1, 0);
    for ($i=0;$i<$N;$i++)
        $R[$A[$i]]++;
    
    $result = [];
    for ($i=0;$i<$N;$i++) {
        $F = $R;
        $x = $A[$i];
        $factors = [];
        if ($x != 1) {
            while ($P[$x] > 0) {
                $F[$P[$x]] = $F[$x] = 0;
                $x /= $P[$x];
            }
            $F[$x] = 0;
        }
        $F[1] = 0;
        
        $result[] = array_sum($F);
    }
    
    return $result;
}