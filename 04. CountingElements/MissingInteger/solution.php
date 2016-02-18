function solution($A) {
    // write your code in PHP5.5
    $N = count($A);
    $count = array_fill(1, $N, 0);

    // mark positive numbers less then $N ($A[$i] <= $N)
    for($i=0; $i<$N; $i++)
        if ($A[$i] > 0 && $A[$i] <= $N && $count[$A[$i]] == 0)
          $count[$A[$i]] = 1;
    
    for($i=1; $i<=$N; $i++)
        if ($count[$i] == 0)
            break;
    
    return $i;    
}