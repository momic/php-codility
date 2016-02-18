function solution($A) {
    // write your code in PHP5.5
    $N = count($A);
    $maxA = max($A);
    
    // Count elements
    $counts = array_count_values($A);
    
    // Compute divisors
    $divisors = [];
    foreach($A as $element)
	    // Every nature number has a divisor 1
        $divisors[$element] = [1];
    
    // Find divisors less then sqrt($maxA)
    for($divisor=2;$divisor<=(int)sqrt($maxA)+1;$divisor++) {
        $multiple = $divisor;
        while ($multiple <= $maxA) {
            if (in_array($multiple, array_keys($divisors)) && !in_array($divisor, $divisors[$multiple]))
                $divisors[$multiple][] = $divisor;
            $multiple += $divisor;
        }
    }
    
    // Find divisors greater then sqrt($maxA)    
    foreach($divisors as $element => &$divs) {
        $temp = [];
        foreach($divs as $div)
            $temp[] = $element / $div;
            
        // Filter out duplicates        
        foreach($temp as $item)
            if (!in_array($item, $divs))
		        $divs[] = $item;        
    }
    
    // result for each element = $N - number of occurances of its divisors
    $result = [];
    foreach($A as $element) {
    	$divisorsCount = 0;
    	foreach($divisors[$element] as $div)
    		$divisorsCount += ($counts[$div]) ?: 0;
        $result[] = ($N - $divisorsCount);
    }
    
    return $result;
}