function solution($S) {
    // write your code in PHP5.5
    $result = 0;
    $N = strlen($S);
    for($i=0;$i<$N;$i++) {
        $result += ($S[$i] == '(') ? 1 : -1;
        if ($result < 0)
            return 0;
    }
    
    return ($result == 0) ? 1 : 0;
}