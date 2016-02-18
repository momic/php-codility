function prefix_sums($A) {
    $length = count($A);
    $P = [];
    $P[0] = 0;
    for ($i=1;$i<$length+1;$i++)
        $P[$i] = $P[$i-1] + $A[$i-1];
        
    return ($P);
}

function count_totals($P, $X, $Y) {
    return ($P[$Y + 1] - $P[$X]);
}

function solution($A) {
    // write your code in PHP5.5
    $length = count($A);
    $pairs = 0;
    
    $P = prefix_sums($A);
    
    for ($i=0;$i<$length;$i++)
        if ($A[$i] == 0) {
            $pairs += count_totals($P, $i, $length - 1);
	        if ($pairs > 1000000000)
		        return -1;
	    }
        
    return $pairs;
}