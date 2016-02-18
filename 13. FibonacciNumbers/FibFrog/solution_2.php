
function solution($A) {
    // write your code in PHP5.5
    $A[] = 1;
    array_unshift($A, 1);
    $N = count($A);
    
    $jumps= [1, 1];
    $i=2;
    while($jumps[$i-1] + $jumps[$i-2] < $N) {
        $jumps[$i] = $jumps[$i-1] + $jumps[$i-2];
        $i++;
    }

    $positions = array_fill(0, $N, 0);
    for($i=1;$i<$N;$i++) {
        if ($A[$i] > 0) {
            $notPossibleToGetHere = true;
            $minJumpCount = $N;
            foreach($jumps as $jump) {
                if ($i-$jump < 0)
                    break;
                if ($A[$i-$jump] > 0 && $minJumpCount > ($positions[$i-$jump] + 1)) {
                    $minJumpCount = $positions[$i-$jump] + 1;
                    $notPossibleToGetHere = false;
                }
            }
            if ($notPossibleToGetHere) {
                $A[$i] = -1;
            }
            else
                $positions[$i] = $minJumpCount;
        }
    }
    
    return ($positions[$N-1]) ?: -1;
}
