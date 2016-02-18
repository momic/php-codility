function solution($N) {
    // write your code in PHP5.5
    $i=1;
    $count = 0;
    while($i*$i<$N) {
        if ($N % $i == 0)
            $count+=2;
        $i++;
    }
        
    if ($i*$i==$N)
        $count++;
    
    return $count;
}