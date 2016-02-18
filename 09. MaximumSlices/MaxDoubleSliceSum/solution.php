function solution($A) {
    // write your code in PHP5.5
    $N = count($A);
    
    // idea = find such Y that $max_endings + $max_beginigs whould be maximal
    $max_slice = $max_endings = $max_beginigs = 0;
    $endings = $beginigs = array_fill(0, $N, 0);
    for($i=1;$i<$N-1;$i++) {
        $max_endings = max(0, $max_endings + $A[$i]);
        $endings[$i] = $max_endings;
        
        $max_beginigs = max(0, $max_beginigs + $A[$N-1-$i]);
        $beginigs[$N-1-$i] = $max_beginigs;
    }
    
    $result = 0;
    for($y=1;$y<$N-1;$y++) {
        $result = max($result, $endings[$y-1]+$beginigs[$y+1]);
    }
    return $result;
}
