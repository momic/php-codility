function solution($A) {
    // write your code in PHP5.5
    $N = count($A);
    sort($A);
    
    $back = 0;
    $front = $N - 1;
    
    
    $minAbsSum = PHP_INT_MAX;
    
    while ($back <= $front) {
        $oldAbsSum = abs($A[$front] + $A[$back]);
        $minAbsSum = ($minAbsSum > $oldAbsSum) ? $oldAbsSum : $minAbsSum;
        $front--;
        while ($front>=$back && $oldAbsSum >= abs($A[$front] + $A[$back])) {
            $oldAbsSum = abs($A[$front] + $A[$back]);
            $minAbsSum = ($minAbsSum > $oldAbsSum) ? $oldAbsSum : $minAbsSum;
            $front--;
        }
        $front++;
        $back++;
    }
    
    return $minAbsSum;
}