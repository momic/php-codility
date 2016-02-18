function solution($A) {
    // write your code in PHP5.5
    $N = count($A);
    $result = [];
    for ($i=0;$i<$N;$i++) {
        $count = 0;
        for ($j=0;$j<$N;$j++)
            if ($i!=$j && $A[$i]%$A[$j]!=0)
                $count++;
        $result[] = $count;
    }
    
    return $result;
}   