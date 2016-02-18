function solution($A) {
    // write your code in PHP5.5
    $N = count($A);
    if ($N == 0)
        return -1;
    
    $leftSum = 0;
    $rightSum = array_sum($A);
    for($i=0;$i<$N;$i++) {
        $rightSum -= $A[$i];
        if ($leftSum == $rightSum)
            return $i;
        $leftSum += $A[$i];
    }
    
    return -1;
}