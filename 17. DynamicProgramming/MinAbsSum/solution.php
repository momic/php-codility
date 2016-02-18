function solution($A) {
    // write your code in PHP5.5
    foreach($A as &$a)
        $a = abs($a);
        
    unset($a);
    $sumA = array_sum($A);
    $numbers = array_count_values($A);
    
    $possible = array_fill(0, (int) ($sumA / 2) + 1, -1);
    $possible[0] = 0;
    
    foreach($numbers as $number => $count) {
        for($i=0;$i<(int) ($sumA / 2) + 1;$i++)
            if ($possible[$i] >= 0)
                $possible[$i] = $numbers[$number];
            elseif ($i >= $number && $possible[$i-$number] > 0)
                $possible[$i] = $possible[$i-$number] - 1;
    }
    
    for($halfSum=(int) ($sumA/2); $halfSum>=0; $halfSum--)
        if ($possible[$halfSum] >= 0)
            return $sumA - $halfSum - $halfSum;
    
    return 0;
}