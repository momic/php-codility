function solution($A) {
    // write your code in PHP5.5
    $N = count($A);
    $nextPeak = array_fill(0,$N,-1);
    $peaksCount = 0;
    $firstPeak = -1;
    
    // Input:  [  1, 5, 3, 4, 3, 4,  1,  2,  3,  4,  6,  2]
    // Output: [ -1, 1, 3, 3, 5, 5, 10, 10, 10, 10, 10, -1]
    for ($i=$N-2;$i>0;$i--)
        if ($A[$i]>max($A[$i-1],$A[$i+1])) {
            $nextPeak[$i] = $firstPeak = $i;
            $peaksCount++;
        }
        else
            $nextPeak[$i] = $nextPeak[$i+1];
    
    if ($peaksCount < 2)
        return $peaksCount; // 0 or 1
        
    $maxFlags = 1;
    // We can have max sqrt($N)+1 same distances for sqrt($N) number of flags, for some number N
    // We could use $peaksCount also, but it is not optimal
    for ($minDistance=(int)sqrt($N)+1;$minDistance>1;$minDistance--) {
        $flagsUsed = 1; // First flag set
        $pos = $firstPeak; // Set position to first peak
        while ($minDistance - $flagsUsed > 0) {
            if ($pos + $minDistance >= $N-1)
                // Reach or beyond end of array
                break;
            $pos = $nextPeak[$pos + $minDistance];
            if ($pos == -1)
                // No peak available afterward
                break;
            $flagsUsed++;
        }
        $maxFlags = max($maxFlags, $flagsUsed);
    }
    
    return $maxFlags;
}