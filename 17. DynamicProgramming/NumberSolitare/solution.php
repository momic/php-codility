function solution($A) {
    // write your code in PHP5.5
    $N = count($A);
    $dp = array_fill(0, $N, 0);
    
    $dp[0] = $A[0];
    for ($i=1;$i<$N;$i++) { // positions
        $currentSum = $dp[$i-1] + $A[$i];
        for($j=2;$j<=6;$j++) { // jumps
            if ($i - $j < 0)
                break;
            if ($dp[$i-$j] + $A[$i] > $currentSum) {
                $currentSum = $dp[$i-$j] + $A[$i];
            }
        }
        
        $dp[$i] = $currentSum;
    }
    
    return $dp[$N-1];
}