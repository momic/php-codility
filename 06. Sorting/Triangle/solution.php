function solution($A) {
    // write your code in PHP5.5
    $N = count($A);
    if ($N < 3)
        return 0;
        
    sort($A);
    for($i=0;$i<$N-2;$i++)
        if ($A[$i] > 0 && $A[$i]+$A[$i+1]>$A[$i+2])
            return 1;
            
    return 0;
}