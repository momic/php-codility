function gcd($a, $b) {
    return ($a%$b) ? gcd($b, $a%$b) : $b;
}

function checkForSamePrimes($x, $D) {
    $xd = gcd($x, $D);
    while ($xd > 1) {
        $x /= $xd;
        $xd = gcd($x, $D);
    }
    
    return ($x == 1);
}

function solution($A, $B) {
    // write your code in PHP5.5
    $N = count($A);
    $count = 0;
    for ($i=0;$i<$N;$i++) {        
        $D = gcd($A[$i], $B[$i]);
        $A[$i] /= $D;
        $B[$i] /= $D;
        
        if (checkForSamePrimes($A[$i], $D) && 
	    checkForSamePrimes($B[$i], $D))
            $count++;
    }
    
    return $count;
}