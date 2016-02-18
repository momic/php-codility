function prefix_sums($A) {
    $length = count($A);
    $P = array_fill(0, $length+1, 0);
    for ($i=1; $i<$length+1; $i++)
        $P[$i] = $P[$i-1] + $A[$i-1];
        
    return $P;
}

function calculate_average($P, $X, $Y) {
    return ($P[$Y+1] - $P[$X]) / ($Y - $X + 1);
}

function solution($A) {
    // write your code in PHP5.5
    $length = count($A);
    $P = prefix_sums($A);
    
    $minAverage = $fullAverage = calculate_average($P, 0, $length-1);
    $minAverageIndex = 0;
    
    for ($i=0; $i<$length-1; $i++) {
        $curTwoAverage = calculate_average($P, $i, $i+1);
        $curThreeAverage = ($i < $length-2) ? calculate_average($P, $i, $i+2) : $curTwoAverage;
        
        $curAverage = ($curTwoAverage < $curThreeAverage) ? $curTwoAverage : $curThreeAverage;
        $curAverageIndex = $i;
        if ($minAverage > $curAverage) {
            $minAverage = $curAverage;
            $minAverageIndex = $curAverageIndex;
        }
    }
    
    return $minAverageIndex;
}