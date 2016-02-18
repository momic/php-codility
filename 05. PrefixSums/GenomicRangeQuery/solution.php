function prefix_sums($S) {
    $MAP = ['A' => 1, 'C' => 2, 'G' => 3, 'T' => 4];
    $N = strlen($S);
    
    $PS = array_fill(0, $N + 1, [1 => 0, 2 => 0, 3 => 0, 4 => 0]);    
    for ($i=1;$i<$N+1;$i++) {
        $PS[$i] = $PS[$i-1];
        $PS[$i][$MAP[$S[$i-1]]]++;
    }
    
    return $PS;
}

function calculate_min($PS, $X, $Y) {
    for($i=1;$i<=4;$i++)
        if ($PS[$Y+1][$i] - $PS[$X][$i] > 0)
            return $i;
}

function solution($S, $P, $Q) {
    // write your code in PHP5.5
    $M = count($P);    
    $PS = prefix_sums($S);
    
    $retVal = [];
    for ($i=0;$i<$M;$i++)
        $retVal[] = calculate_min($PS, $P[$i], $Q[$i]);
    
    return $retVal;
}