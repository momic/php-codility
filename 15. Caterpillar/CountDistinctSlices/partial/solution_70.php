function solution($M, $A) {
    // write your code in PHP5.5
    $N = count($A);
    $count = $N;
    $numberOccurances = array_fill(0,$M+1,0);
    // echo "-----------\n";
    // echo $count . "\n";
    
    for($lowerBound=0;$lowerBound<$N-1;$lowerBound++) {            
        if ($numberOccurances[$A[$lowerBound]] == 0)
            $numberOccurances[$A[$lowerBound]]++;
        
        $upperBound = $lowerBound + 1;
        while ($upperBound < $N && $numberOccurances[$A[$upperBound]] == 0) {
          $numberOccurances[$A[$upperBound]]++;
          $upperBound++;
        }
        $count += $upperBound - $lowerBound - 1;
	if $count >= 1000000000:   return 1000000000
        // echo $lowerBound . "-" . $upperBound . "=" . $count . "\n";
        
        for ($i=$lowerBound;$i<$upperBound;$i++)
            $numberOccurances[$A[$i]] = 0;
    }
    
    return $count;
}