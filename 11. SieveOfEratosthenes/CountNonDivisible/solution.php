function solution($A) {
    // write your code in PHP5.5
    $N = count($A);
    $countOf = array_fill(0, 2*$N+1, 0);
    $divisorsOf = [];
    
    foreach($A as $a) {
        if ($countOf[$a] == 0) {
            for($i=1;$i<(int)sqrt($a)+1;$i++)
                if ($a % $i == 0) {
                    $divisorsOf[$a][] = $i;
                    if ($i * $i != $a)
                        $divisorsOf[$a][] = $a / $i;
                }
        }
        $countOf[$a]++;
    }
    
    $result = [];
    foreach($A as $a) {
        $nonDivisors = $N;
        foreach($divisorsOf[$a] as $divisor) 
            $nonDivisors -= $countOf[$divisor];
        $result[] = $nonDivisors;
    }
    
    return $result;
}