function solution($A) {
    // write your code in PHP5.5
    $length = count($A);
    $isPermutation = (array_sum($A) == $length * ($length + 1) / 2) &&
                     (count(array_flip($A)) == $length);
    
    return ($isPermutation) ? 1 : 0;
}