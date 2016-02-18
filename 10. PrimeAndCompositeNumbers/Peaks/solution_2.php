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
            $blocksWithPeaks = array_fill(0, $i, 0);
            $blockSize = ($N / $i);
            $blocksWithPeaksCount = 0;
            foreach($peaks as $peak) {
                $blockNo = (int) $peak / $blockSize;
                if ($blocksWithPeaks[$blockNo] == 0) {
                    $blocksWithPeaks[$blockNo] = 1;
                    $blocksWithPeaksCount++;
                }
            }
            if ($blocksWithPeaksCount == $i)
                return $i; 
        }
    }

    return 0;
}