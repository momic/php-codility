function solution($A) {
    // write your code in PHP5.5
    $N = count($A);
    
    $peaks = [];
    $peaksCount = 0;
    for($i=1;$i<$N-1;$i++)
        if ($A[$i-1] < $A[$i] && $A[$i] > $A[$i+1]) {
            $peaks[] = $i;
            $peaksCount++;
        }
        
    if ($peaksCount < 2)
        return $peaksCount;

    for ($i=$peaksCount;$i>1;$i--) {
        if ($N % $i == 0) {
            $elementsPerBlock = $N / $i;
            
            $peakBlockIndex =  (int) ($peaks[0] / $elementsPerBlock);
            $filledBlocks = 1;
            for ($j=1;$j<$peaksCount;$j++) {
                $newPeakBlockIndex = (int) ($peaks[$j] / $elementsPerBlock);
                if ($peakBlockIndex != $newPeakBlockIndex) {
                    $filledBlocks++;
                    $peakBlockIndex = $newPeakBlockIndex;
                }
            }
            
            if ($filledBlocks == $i)
                return $i;
        }
    }
    
    return 1;
}
