function solution($X, $A) {
    // write your code in PHP5.5
    
    $N = count($A);
    $retVal = -1;
    
    $leafes = array_fill(1, $X, 0);
    
    foreach(range(0,$N-1) as $k) {
        if ($leafes[$A[$k]] == 0) {
            $leafes[$A[$k]] = 1;
            $retVal = $k;
        }
    }
    
    if (array_key_exists(0, array_flip($leafes)))
        return -1;
    
    return $retVal;
}