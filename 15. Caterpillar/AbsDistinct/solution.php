function solution($A) {
    // write your code in PHP5.5
    $N = count($A);
    $beg = 0;
    $end = $N-1;
    
    $currentValue = max(abs($A[$beg]), abs($A[$end]));
    $distinct = 1;
    
    while ($beg <= $end) {
        if ($currentValue == abs($A[$beg])) {
            $beg++;
            continue;
        }

        if ($currentValue == abs($A[$end])) {
            $end--;
            continue;
        }
        
        if (abs($A[$beg]) >= abs($A[$end])) {
            $currentValue = abs($A[$beg]);
            $beg++;
        }
        else {
            $currentValue = abs($A[$end]);
            $end--;
        }
        $distinct++;
    }
    
    return $distinct;
}