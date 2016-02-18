function solution($S) {
    // write your code in PHP5.5
    $N = strlen($S);
    
    if ($N % 2 == 0)
        return -1;

    $index = (int) ($N / 2);    
    return (strrev(substr($S, 0, $index)) == substr($S, $index+1)) ? $index : -1;
}