function solution($A, $B) {
    // write your code in PHP5.5
    $L = count($A);
    $fib = array_fill(0, $L, 0);
    $fib[0] = $fib[1] = 1;
    
    for($i=2;$i<$L+1;$i++)
        $fib[$i] = $fib[$i-1] + $fib[$i-2];
        
    $result = [];
    for($i=0;$i<$L;$i++)
        $result[] = $fib[$A[$i]] % (pow(2,$B[$i]));
        
    return $result;
}