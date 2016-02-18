function solution($A) {
    // write your code in PHP5.5
    $N = count($A);
    $maxA = max($A);
    if ($maxA < 0)
        return $maxA;
        
    $max_slice = $maxA;
    $max_endings = 0;
    for($i=0;$i<$N;$i++) {
        $max_endings = max(0, $max_endings + $A[$i]);
        $max_slice = max($max_slice, $max_endings);
    }
        
    return $max_slice;
}
