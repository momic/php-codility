function getFactors($A) {
    $n = max($A);
    $factors = [];
    
    $i = 2;
    while($i <= $n) {
        $change = false;
        foreach($A as &$a)
            if ($a % $i == 0 && $a >= $i) {
                $factors[] = $i;
                while ($a % $i == 0)
                    $a /= $i;
                $change = true;
            }

        if ($change)
            $n = max($A);
        
        if ($n < $i)
            break;
        
        $i++;
    }
    
    return array_flip($factors);
}

function gcd($a, $b) {
    return ($a%$b) ? gcd($b, $a%$b) : $b;
}

function solution($A, $B) {
    // write your code in PHP5.5
    $Z = count($A);
    $result = 0;
    
    for($k=0;$k<$Z;$k++) {
        $a = $A[$k];
        $b = $B[$k];

        if ($a == $b) {
            $result++;
            continue;  
        }

        $d = gcd($a, $b);
        $a /= $d;
    	$b /= $d;
            
    	$abFactors = array_diff_key(getFactors([$a, $b]), getFactors([$d]));
        if ($abFactors)
            continue;
        
        $result++;
    }
    
    return $result;
}