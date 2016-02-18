function solution($K, $A) {
    // write your code in PHP5.5
    $count = $sum = 0;
    foreach($A as $a) {
        $sum += $a;
        if ($sum >= $K) {
            $count++;
            $sum = 0;
        }            
    }
    
    return $count;
}