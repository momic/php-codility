function getFactors($value) {
    $factors = [];
    
    $i = 2;
    $maxValue = $value;
    while($i * $i <= $maxValue) {
        if ($value % $i == 0) {
            $factors[] = $i;
            while ($value % $i == 0 && $value>$i)
                $value /= $i;
        }
        elseif ($value<$i)
            break;
        $i++;
    }

    $factors[] = $value;
    
    return array_flip($factors);
}

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
            
        $a /= $b;
        
        $aFactors = getFactors($a);
        $bFactors = getFactors($b);
        if (array_diff_key($aFactors, $bFactors))
            continue;
        
        $result++;
    }
    
    return $result;
}