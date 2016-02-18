function solution($A, $B) {
    // write your code in PHP5.5
    $L = max($A);
    $modLimit = (1 << max($B)) - 1;
    
    $fib = array_fill(0, $L, 0);
    $fib[0] = $fib[1] = 1;
    for($i=2;$i<$L+1;$i++)
        $fib[$i] = ($fib[$i-1] + $fib[$i-2]) & $modLimit;

    $result = [];        
    for($i=0;$i<count($A);$i++)
        $result[] = $fib[$A[$i]] & ((1 << $B[$i]) - 1);
        
    return $result;    
}