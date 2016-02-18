function gcd($a, $b) {
    return ($a%$b) ? gcd($b, $a%$b) : $b;
}

function solution($N, $M) {
    // write your code in PHP5.5
    return $N / gcd($N, $M);
}