function solution($A) {
    // write your code in PHP5.5
    $N = count($A);
    $peaks = [];
    $peaksCount = 0;
    $lastPeakIndex = -1;
    
    $B = []; $j = 0;
    for ($i=1;$i<$N-1;$i++)
        if ($A[$i-1] < $A[$i] && $A[$i] > $A[$i+1]) {
            $peaks[] = $lastPeakIndex = $i;
            $peaksCount++;
            
            while($j <= $i) {
                $B[] = $i;
                $j++;
            }
        }
    
    if ($peaksCount < 2)
        return $peaksCount;
        
    $flagSet = 1;
    for ($i=2;$i<=$peaksCount;$i++) { // flags
        $flagIndex = $peaks[0];
        $flagsCounter = 1;
        while ($flagIndex + $i <= $lastPeakIndex && $flagsCounter<$i) {
            $flagIndex = $B[$flagIndex + $i];
            $flagsCounter++;
        }
        if ($flagsCounter >= $i)
            $flagSet = $i;
    }
    
    return $flagSet;
}
