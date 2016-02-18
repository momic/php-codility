function solution($A) {
    // write your code in PHP5.5
    $result = 0;
    foreach($A as $a)
        $result ^= $a;
    
    return $result;
}