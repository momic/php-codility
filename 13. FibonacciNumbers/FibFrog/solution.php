function solution($A) {
    // start and end
    array_unshift($A, 1);
    $A[] = 1;
    $N = count($A);
    
    // jumps
    $F=[1, 1];
    $i=2;
    while($F[$i-1] + $F[$i-2] < $N) {
        $maxF = $F[] = $F[$i-1] + $F[$i-2];
        $i++;
    }
    
    // can we jump to the end from start pos?
    if ($maxF == $N - 1)
        return 1;
        
    // jumps count to get to position $pos
    // set all to maximum of $N jumps required
    $JC = array_fill(0, $N, $N);
    $JC[0] = 0; // we are already there
    
    for ($pos=1;$pos<$N;$pos++) {
        // find minimal jumps count for current pos
        $minJC = $N;
        foreach ($F as $jump) {
            // serch all available jumps and try to find min jump count
            $prevLeafPos = $pos - $jump;
            if ($prevLeafPos >= 0) {
                // set min jump count only if there is a leaf
                if (($A[$prevLeafPos] == 1) && ($JC[$prevLeafPos] + 1 < $minJC))
                    $minJC = $JC[$prevLeafPos] + 1;
            }
            else
                // go for next position if jumps are broken starting pos
                break;
        }
        // update position with minimum jumps count
        $JC[$pos] = $minJC;
    }
    
    // minimum jumps count of end position is $JC[$N-1]
    // if still equals to $N return -1
    return ($JC[$N - 1] == $N) ? -1 : $JC[$N-1];
}