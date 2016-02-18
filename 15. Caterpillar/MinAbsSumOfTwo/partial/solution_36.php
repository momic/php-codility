function solution($A) {
    // write your code in PHP5.5
    $N = count($A);
    sort($A);
    
    $minAbsSum = PHP_INT_MAX;
    foreach(range(0, $N - 1) as $back) {
        $front = $back;
        $oldAbsSum = abs($A[$front] + $A[$back]);
        $minAbsSum = ($minAbsSum > $oldAbsSum) ? $oldAbsSum : $minAbsSum;
        
        $front++;
        while ($front<$N && $oldAbsSum >= abs($A[$front] + $A[$back])) {
            $oldAbsSum = abs($A[$front] + $A[$back]);
            $minAbsSum = ($minAbsSum > $oldAbsSum) ? $oldAbsSum : $minAbsSum;
            $front++;
        }
    }
    
    return $minAbsSum;
}