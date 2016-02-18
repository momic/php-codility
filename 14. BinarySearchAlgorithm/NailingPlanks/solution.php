function check($A,$N,$B,$M,$C,$maxNails) {
    // counter array with size 2 * $M + 1
    $nailsCounter = array_fill(0, 2 * $M + 1, 0);
    for ($i=0;$i<$maxNails;$i++)
        $nailsCounter[$C[$i]] = 1;
    
    // make every position aware how are much nails so far
    $counter = 0;
    foreach($nailsCounter as &$v) {
        $counter += $v;
        $v = $counter;
    }

    // is there a change of nails from start to end of plank
    for ($i=0;$i<$N;$i++)
        if ($nailsCounter[$A[$i] - 1] == $nailsCounter[$B[$i]])
	    // no change, this plunk was not nailed
            return false;
            
    return true;
}

function solution($A, $B, $C) {
    // write your code in PHP5.5
    $N = count($A);
    $M = count($C);
    
    $beg = 1;
    $end = $M;
    $result = -1;
    
    if (!check($A,$N,$B,$M,$C,$end))
        return -1;
    
    while ($beg <= $end) {
        $mid = (int) (($beg + $end) / 2);
        if (check($A,$N,$B,$M,$C,$mid)) {
            $result = $mid;
            $end = $mid - 1;
        }
        else
            $beg = $mid + 1;
    }
    
    return $result;
}