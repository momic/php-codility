function planksNailed($A, $B, $C, $N, $M, $mid) {
    $PS = $nails = array_fill(0, 2*$M+2, 0);
    for($j=0;$j<$mid;$j++)
        $nails[$C[$j]] = 1;
    
    for($i=1;$i<2*$M+2;$i++)
        $PS[$i] = $PS[$i-1] + $nails[$i-1];
    
    $result = true;
    for($i=0;$i<$N;$i++) {
        $result &= (($PS[$B[$i] + 1] - $PS[$A[$i]]) > 0);
    }
    
    return $result;
}

function solution($A, $B, $C) {
    // write your code in PHP5.5
    $N = count($B); // planks count
    $M = count($C); // nails count
    
    // plank is nailed
    // A[k] <= C[i] <= B[k]
    
    $beg = 1;
    $end = $M;
    $result = -1;
    
    while($beg <= $end) {
        $mid = (int) (($beg + $end) / 2);
        if (planksNailed($A, $B, $C, $N, $M, $mid)) {
            $result = $mid;
            $end = $mid - 1;
        }
        else
            $beg = $mid + 1;
    }
    
    return $result;
}
