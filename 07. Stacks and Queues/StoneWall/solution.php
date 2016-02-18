function solution($H) {
    // write your code in PHP5.5
    $N = count($H);
    $stack = [];
    $size = $bricks = 0;
    
    for($i=0;$i<$N;$i++) {
        while ($size > 0 && $H[$i] < end($stack)) {
            array_pop($stack);
            $size--;
            $bricks++;            
        }
        
        if ($size == 0 || $H[$i] > end($stack))
            $size = array_push($stack, $H[$i]);
    }
    
    return $bricks + $size;
}