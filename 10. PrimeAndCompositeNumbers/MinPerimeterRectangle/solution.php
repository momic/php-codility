function solution($N) {
    // write your code in PHP5.5
    $perimiter = 2 * ($N + 1);
    $i = 2;
    while ($i*$i<=$N) {
        if ($N % $i == 0)
            $perimiter = min($perimiter, 2 * ($i + $N/$i));
        $i++;
    }
            
    return $perimiter;
}