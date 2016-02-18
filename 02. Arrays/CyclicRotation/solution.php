function solution($A, $K) {
    // write your code in PHP5.5
    $result = [];
    $N = count($A);
    
    if ($N == 0)
        return $result;

    $K %= $N;
    if ($K == 0)
        return $A;
        
    for($i = $N - $K; $i < $N; $i++)
        $result[] = $A[$i];
    
    
    for($i = 0; $i < $N - $K; $i++)
        $result[] = $A[$i];
        
    return $result;
}