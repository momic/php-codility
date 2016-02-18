function solution($A) {
    // write your code in PHP5.5
    $N = count($A);
    $peaks = [];
    $peaksCount = 0;
    for ($i=1;$i<$N-1;$i++)
        if ($A[$i-1]<$A[$i] && $A[$i]>$A[$i+1]) {
            $peaks[] = $i;
	    $peaksCount++;
	}
        
    for ($i=$peaksCount;$i>0;$i--) {
        if ($N % $i == 0) {
            $candidate = true;
            $peakPointer = 0;
            $blockSize = ($N / $i);
            for($block=0;$block<$i;$block++) {
                $isValidBlock = $peakPointer < $peaksCount && 
                                $block * $blockSize <= $peaks[$peakPointer] && 
                                $peaks[$peakPointer] < ($block + 1) * $blockSize;
                if (!$isValidBlock) {
                    $candidate = false;
                    break;
                }
                else
                    while ($isValidBlock) {
                        $peakPointer++;
                        $isValidBlock = $peakPointer < $peaksCount && 
                                        $block * $blockSize <= $peaks[$peakPointer] && 
                                        $peaks[$peakPointer] < ($block + 1) * $blockSize;
                    }
                        
            }
            
            if ($candidate)
                return $i;
        }
    }

    return 0;
}