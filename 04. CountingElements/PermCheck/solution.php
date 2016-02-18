function solution($A) {
    // write your code in PHP5.5
    $N = count($A);
    
    $counter = array_fill(1, $N, 0);
    
    foreach($A as $a)
        if ($a < 0 || $a > $N)
            return 0;
        elseif ($counter[$a] > 0)
            return 0;
        elseif ($counter[$a] == 0)
            $counter[$a]++;
        
    return 1;
}