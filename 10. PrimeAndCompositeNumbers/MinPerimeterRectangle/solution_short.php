function solution($N) {
    // write your code in PHP5.5
    for($i=(int)sqrt($N);$i>0;$i--)
        if ($N % $i == 0)
            return 2*($i + $N/$i);
}