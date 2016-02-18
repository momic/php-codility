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
        
    if ($peaksCount == 1)
        return 1;

    $numberOfBlocks = [];
    $i=2;
    $symetricBlocks = [];
    $numberOfBlocksCount = $size = 0;
    while ($i*$i<$N) {
        if ($N % $i == 0) {
            if ($peaksCount >= ($N / $i)) {
                $numberOfBlocks[] = ($N / $i);
                $numberOfBlocksCount++;
            }
                
            if ($peaksCount >= $i) {
                $symetricBlocks[] = $i;
                $size++;
                $numberOfBlocksCount++;
            }
        }
        $i++;
    }
    
    if ($i*$i == $N) {
        $numberOfBlocks[] = ($i);
        $numberOfBlocksCount++;
    }
    
    while($size>0) {
        $numberOfBlocks[] = array_pop($symetricBlocks);
        $size--;
    }
    
    if ($numberOfBlocksCount == 0 && $peaksCount > 0)
        return 1;
        
    for ($i=0;$i<$numberOfBlocksCount;$i++) {
        $candidate = true;
        $peakPointer = 0;
        $blockSize = ($N / $numberOfBlocks[$i]);
        for($block=0;$block<$numberOfBlocks[$i];$block++) {
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
            return $numberOfBlocks[$i];
    }

    return 0;
}