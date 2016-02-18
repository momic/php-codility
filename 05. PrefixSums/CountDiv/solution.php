function solution($A, $B, $K) {
    // write your code in PHP5.5
    if ($A % $K == 0)
        return (int) (($B - $A) / $K) + 1;
    else
        return (int) (($B - ($A - ($A % $K))) / $K);
}