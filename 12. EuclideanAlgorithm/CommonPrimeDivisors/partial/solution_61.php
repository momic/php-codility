function primality($n) {
    $i = 2;
    while($i * $i <= $n) {
        if ($n % $i == 0)
            return false;
        $i++;
    }
        
    return true;
}

function getFactors($n) {
    $factors = [];
    $i = 1;
    while($i * $i < $n) {
        if ($n % $i == 0) {
            if (primality($i))
                $factors[] = $i;
            
            if (primality($n / $i))
                $factors[] = $n / $i;
        }
        $i++;
    }
    if ($i * $i == $n && primality($n / $i))
        $factors[] = $n / $i;
    
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
    	$dFactors = getFactors($d);
        $a /= $d;
    	$b /= $d;
            
    	$aFactors = ($a>1) ? array_diff_key(getFactors($a), $dFactors) : [];
    	$bFactors = ($b>1) ? array_diff_key(getFactors($b), $dFactors) : [];
        if ($aFactors || $bFactors)
            continue;
        
        $result++;
    }
    
    return $result;
}