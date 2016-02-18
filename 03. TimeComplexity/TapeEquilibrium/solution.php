function solution($A) {
    // write your code in PHP5.5
    $length = count($A);
    $leftSum = $A[0];
    $rightSum = array_sum($A) - $leftSum;
    $minValue = abs($leftSum - $rightSum);
    
    for($i=1; $i<$length-1; $i++) {
        $leftSum += $A[$i];
        $rightSum -= $A[$i];
        $diffValue = abs($leftSum - $rightSum);
        if ($diffValue < $minValue) 
	    $minValue = $diffValue;
    }
    
    return $minValue;
}