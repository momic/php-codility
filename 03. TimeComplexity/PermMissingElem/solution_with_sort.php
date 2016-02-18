function solution($A) {
    // write your code in PHP5.5
    $length = count($A);
    
    if ($length > 1)
        sort($A);
        
    for($i=0;$i<$length;$i++) {
        if ($A[$i] == ($i + 1))
            continue;
        else
            return ($i + 1);
    }
    
    return $length + 1;
}