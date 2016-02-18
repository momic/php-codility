function solution($A) {
    // write your code in PHP5.5
    
    $N = count($A);
    sort($A);
    
    $result = 0;
    for ($x=0;$x<$N;$x++) {
        $z = $x + 2;
        for ($y=$x+1;$y<$N;$y++) {
            while ($z < $N && $A[$x] + $A[$y] > $A[$z])
                $z++;
            $result += $z - $y - 1;
        }
    }
    
    return $result;
}