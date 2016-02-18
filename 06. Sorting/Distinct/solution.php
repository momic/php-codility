function solution($A) {
    // write your code in PHP5.5
    $N = count($A);
    if ($N==0)
        return 0;
        
    $counting = 1;
    sort($A);
    for ($i=1;$i<$N;$i++)
        if ($A[$i] != $A[$i-1])
            $counting++;
        
    return $counting;
}