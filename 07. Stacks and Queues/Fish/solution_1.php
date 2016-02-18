function solution($A, $B) {
    // write your code in PHP5.5
    $N = count($A);
    
    $stack = [];
    $size = 0;
    
    for($i=0;$i<$N;$i++) {
        // eat as much fish from stack as you can
        while ($size>0 && $A[end($stack)] < $A[$i] && $B[end($stack)] > $B[$i]) {
            array_pop($stack);
            $size--;
        }

        // check if last one has eaten you
        $fishHasBeenEaten = ($size>0) ? $A[end($stack)] > $A[$i] && $B[end($stack)] > $B[$i] : false;
        if (!$fishHasBeenEaten)
            $size = array_push($stack, $i);
    }
    
    return $size;
}