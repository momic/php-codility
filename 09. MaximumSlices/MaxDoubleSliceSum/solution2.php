function solution($A) {
    // write your code in PHP5.5
    $N = count($A);
    
    if ($N <= 3)
        return 0;    
    
    $max_ending = $max_begining = $max_double_slice = 0;    
    
    $endings = array_fill(0, $N, 0);
    for ($i=1;$i<$N-1;$i++) {
        $max_ending = max(0, $max_ending + $A[$i]);
        $endings[$i] = $max_ending;
    }
    
    $beginings = array_fill(0, $N, 0);
    for ($i=$N-2;$i>0;$i--) {
        $max_begining = max(0, $max_begining + $A[$i]);
        $beginings[$i] = $max_begining;
    }
    
    for ($i=1;$i<$N-1;$i++)
        $max_double_slice = max($max_double_slice, $endings[$i-1] + $beginings[$i+1]);
        
    return $max_double_slice;
}