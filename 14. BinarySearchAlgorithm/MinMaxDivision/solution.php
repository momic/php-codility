function check($A, $N, $mid) {
    $blocks = 1;
    $blockSum = $A[0];
    for ($i=1;$i<$N;$i++) {
        if ($blockSum + $A[$i] > $mid) {
            $blocks++;
            $blockSum = $A[$i];
        }
        else
            $blockSum += $A[$i];
    }
            
    return $blocks;
}

function solution($K, $M, $A) {
    $N = count($A);

    // binary search of sum of block of array
    $beg = max($A);
    $end = array_sum($A);

    // maximal large sum
    $result = $end;
    
    // one block
    if ($K == 1) return $end;
    // equal or more blocks then elements
    if ($K >= $N) return $beg;
    
    while ($beg <= $end) {
        $mid = (int) (($beg + $end) / 2);
        if (check($A, $N, $mid) <= $K) {
            $end = $mid - 1;
            $result = $mid;
        }
        else
            $beg = $mid + 1;
    }
    
    return $result;
}