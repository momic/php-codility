function solution($A, $B) {
    // write your code in PHP5.5
    
    $N = count($B);
    
    $stack = []; // downstram fish stack
    $size = 0;
    $upstreamFishes = 0;
    for($i=0;$i<$N;$i++) {
        if ($B[$i] == 1) {
            $size = array_push($stack, $i);
        }
        else {
            if ($size > 0) {
                // eat downstream fishes from end of stack
                while ($size > 0 && $A[$i] > $A[end($stack)]) {
                    array_pop($stack);
                    $size--;
                }
                
                if ($size == 0)
                    $upstreamFishes++; // upstram fish survived
            }
            else
                $upstreamFishes++;
        }
    }
    
    return $size + $upstreamFishes;
}