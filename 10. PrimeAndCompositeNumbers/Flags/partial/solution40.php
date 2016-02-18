function solution($A) {
    // write your code in PHP5.5
    $N = count($A);
    $peaks = [];
    $peaksCount = 0;
    $lastPeak = 0;
    
    $P = [];
    for($i=1;$i<$N-1;$i++)
        if ($A[$i-1] < $A[$i] && $A[$i] > $A[$i+1]) {
            if ($peaksCount > 0)
                $P[$peaksCount] = $i - $lastPeak;
            $lastPeak = $i;                
            $peaksCount++;
        }
        
    $flags = $peaksCount;
    $peakSum = 0;
    for ($i=1;$i<$peaksCount;$i++) {
        $peakSum += $P[$i];
        if ($peakSum >= $flags)
            $peakSum = 0;
        else
            $flags--;
    }
    
    return $flags;
}