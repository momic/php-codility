/**
 * If all these nails are after the preResult's
 * position, return the first nail's position in
 * the original nails' array.
 * Else, return the preResult as the result.
 */
function findFirstNail($beg, $end, $nails, $nailKeys, $M, $preResult) {
    $result = -1;
    $resultPos = -1;
    
    $nailLower = 0;
    $nailUpper = $M - 1;
    $nailMid = 0;
    
    // Find the first nail, whose postion >= plankBegin and
    // position <= plankEnd, with binary search algorithm
    while ($nailLower <= $nailUpper) {
        $nailMid = (int) (($nailLower + $nailUpper) / 2);
        $nailPosMid = $nails[$nailKeys[$nailMid]];
        if ($nailPosMid < $beg)
            $nailLower = $nailMid + 1;
        elseif ($nailPosMid > $end)
            $nailUpper = $nailMid - 1;
        else {
            $nailUpper = $nailMid - 1;
            $result = $nailKeys[$nailMid];
            $resultPos = $nailMid;
        }
    }
    
    if ($result == -1)
        return -1;
        
    // Linear search all the quanlified nails, and find
    // out the one with the earliest position.
    $resultPos += 1;
    while ($resultPos < $M) {
        if ($nails[$nailKeys[$resultPos]] > $end)
            break;
        $result = min($result, $nailKeys[$resultPos]);
        $resultPos += 1;

        // If we find a position before the preResult. We could
        // terminate our search and return.
        // With a position before the preResult, the result for
        // this round must <= preResult. And globally, the final
        // result is the maximum of ALL the results in each rounds.
        // So the result of this round actually does not affect
        // the final result.
        if ($preResult >= $result)
            return $preResult;
    }
    
    return max($result, $preResult);
}

function solution($A, $B, $C) {
    // write your code in PHP5.5
    $N = count($A);
    $M = count($C);
    
    // [[4] => 2, [0] => 4, [1] => 6, [2] => 7, [3] => 10]
    asort($C);
    // [[0] => 4, [1] => 0, [2] => 1, [3] => 2, [4] => 3]
    $keysC = array_keys($C);
    
    $result = -1;
    
    for ($i=0;$i<$N;$i++) {
        $result = findFirstNail($A[$i], $B[$i], $C, $keysC, $M, $result);
        if ($result == -1)
            return -1;
    }
    
    return $result + 1;
}