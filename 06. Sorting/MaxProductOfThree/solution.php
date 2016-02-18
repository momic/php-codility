function solution($A) {
    // write your code in PHP5.5
    $N = count($A);
    sort($A);
    return max($A[$N-1]*$A[$N-2]*$A[$N-3], $A[$N-1]*$A[0]*$A[1]);
}