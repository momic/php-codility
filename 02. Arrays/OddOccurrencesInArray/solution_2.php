function solution($A) {
    // write your code in PHP5.5
    $N = count($A);
    
    $sumA = $A[0];
    for($i=1; $i<$N; $i++)
        $sumA = $sumA ^ $A[$i];
        
    return $sumA;    
}