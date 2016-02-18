function check($A, $B, $C, $mid, $N, $M) {
    $nail = $maxNails = 0;
    $i = 0;
    while($i<$N && $nail<$M)  {
        if ($A[$i] <= $C[$nail] && $B[$i] >= $C[$nail]) {
            $maxNails = max($nail, $maxNails);
            $i++;
            $nail = 0;
        }
        else
            $nail++;
    }
    
    return ($i<$N) ? -1 : $maxNails;
}

function solution($A, $B, $C) {
    // write your code in PHP5.5
    $M = count($C);
    $N = count($A);
    $beg = 1;
    $end = $M;
    $result = -1;
    
    while ($beg <= $end) {
        $mid = (int) (($beg + $end)/2);
        $maxNails = check($A, $B, $C, $mid, $N, $M);
        if ($maxNails < 0 || $maxNails >= $M) {
            $result = -1;
            break;
        }
            
        if ($maxNails + 1 <= $mid) {
            $end = $mid - 1;
            $result = $mid;
        }
        else
            $beg = $mid + 1;
    }
    
    return $result;
}