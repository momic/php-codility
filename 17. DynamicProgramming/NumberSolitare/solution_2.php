function solution($A) {
    // write your code in PHP5.5
    $N = count($A);
    $maxSoFar = array_fill(0, $N + 6, $A[0]);
    
    for ($i=1;$i<$N;$i++) {
        $max = $maxSoFar[$i];
        for($j=$i;$j<$i+6;$j++)
            $max = max($max, $maxSoFar[$j]);
            
        $maxSoFar[$i+6] = $max + $A[$i];
    }
    
    return $maxSoFar[$N + 5];
}