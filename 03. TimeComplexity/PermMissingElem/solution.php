function solution($A) {
    // write your code in PHP5.5
    $N = count($A);
    $sum = 0;
    for ($i=0; $i<$N; $i++) {
        $sum ^= $A[$i] ^ ($i + 1);
    }
    
    return $sum ^ ($N + 1);
}