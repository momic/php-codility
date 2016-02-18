function solution($A) {
    // write your code in PHP5.5
    $N = count($A);
    sort($A);
    
    $back = 0;
    $front = $N - 1;
    $minAbsSum = PHP_INT_MAX;
    
    while ($back <= $front) {
        $oldSum = $A[$front] + $A[$back];
        $minAbsSum = min($minAbsSum, abs($oldSum));
        
        if ($oldSum <= 0) 
            $back++;
        else
            $front--;
    }
    
    return $minAbsSum;
}