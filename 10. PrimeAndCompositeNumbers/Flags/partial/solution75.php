function solution($A) {
    // write your code in PHP5.5
    $N = count($A);
    $peaks = [];
    for ($i=1;$i<$N-1;$i++)
        if ($A[$i] > max($A[$i+1], $A[$i-1]))
            $peaks[] = $i;
        
    $peaksCount = count($peaks);    
    if ($peaksCount == 0)
        return 0;
        
    $maxFlags = $peaksCount;
    while ($maxFlags * ($maxFlags - 1) > $peaks[$peaksCount-1] - $peaks[0])
        $maxFlags--;
        
    for ($k=$maxFlags;$k>0;$i--) {
        $flagsDeployed = 1;
        $distance = 0;
        for ($i=1;$i<$peaksCount;$i++) {
            $distance += abs($peaks[$i-1] - $peaks[$i]);
            if ($distance >= $k) {
                $flagsDeployed++;
                $distance = 0;
            }
        }
        
        if ($flagsDeployed >= $k)
            return $k;
    }
    
    return 0;
}