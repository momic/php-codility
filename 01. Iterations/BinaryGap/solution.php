function solution($N) {
    // write your code in PHP5.5
    $gap = $maxGap = 0;
    
    // skip zero bits at the end
    while ($N>0 && $N%2 == 0)
        $N /= 2;
    
    while ($N>0) {
        $bit = $N % 2;
        if ($bit == 0)
            $gap++;
        elseif ($gap > 0) {
            $maxGap = max($maxGap, $gap);
            $gap = 0;
        }
        else {}; // gap has zero elements, do nothing
        
        $N /= 2;
    }
    return $maxGap;
}