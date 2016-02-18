function solution($A, $B) {
    // write your code in PHP5.5
    $N = count($A);
    $stack = [];
    $size = array_push($stack, 0);
    
    for($i=1;$i<$N;$i++) {
        // no meetup
        if ($B[end($stack)] - $B[$i] != 1) {
            $size = array_push($stack, $i);
            continue;
        }
    
        // two fish meet
        $newFishSurvived = true;
        while ($size > 0 && ($B[end($stack)] - $B[$i] == 1) && $newFishSurvived) {
            if ($A[$i] > $A[end($stack)]) {
                array_pop($stack);
                $size--;
            }
            else
                $newFishSurvived = false;
        }

        // new fish has survived
        if ($newFishSurvived)
            $size = array_push($stack, $i);
    }
            
    return $size;
}