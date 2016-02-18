function solution($A, $B) {
    // write your code in PHP5.5
    $Z = count($A);
    $result = 0;
    for($k=0;$k<$Z;$k++) {
        $a = ($A[$k] > $B[$k]) ? $A[$k] : $B[$k];
        $b = ($A[$k] > $B[$k]) ? $B[$k] : $A[$k];

        if ($a == $b) {
            $result++;
            continue;
        }
            
        if (($a % $b != 0) || ($b==1))
            continue;
            
        while($a % $b == 0)
            $a /= $b;
        
        if ($b % $a == 0)
            $result++;
    }
    
    return $result;
}