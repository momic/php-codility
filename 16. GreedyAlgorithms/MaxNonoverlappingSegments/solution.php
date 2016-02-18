function solution($A, $B) {
    // write your code in PHP5.5
    $N = count($A);
    if ($N == 0)
        return 0;
    
    $count = 1;
    $end = $B[0];
    
    $i = 1;
    while ($i<$N) {
        while ($i<$N && $A[$i] <= $end)
            $i++;
        
        if ($i == $N)
            break;
            
        $count++;
        $end = $B[$i];
    }
    
    return $count;
}