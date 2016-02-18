function solution($N, $P, $Q) {
    // write your code in PHP5.5
    
    $M = count($P);
    $SP = array_fill(0, $N+1, 0);
    
    $i=2;
    while ($i*$i<=$N) {
        if ($SP[$i] == 0) {
            $k = $i * $i;
            while ($k<=$N) {
                if ($SP[$k] == 0)
                    $SP[$k] = $i;
                $k+=$i;
            }
        }
        $i++;
    }
    
    $PS = array_fill(0, $N+1, 0);
    for ($i=1;$i<$N+2;$i++) {
        $isSemiPrime = (($SP[$i-1] > 0) && ($SP[($i-1) / $SP[$i-1]] == 0)) ? 1 : 0;
        $PS[$i] = $PS[$i-1] + $isSemiPrime;
    }        
    
    $result = [];
    for ($k=0;$k<$M;$k++)
        $result[] = $PS[$Q[$k]+1] - $PS[$P[$k]];
        
    return $result;
}