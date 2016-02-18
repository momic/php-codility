function solution($X, $Y, $D) {
    // write your code in PHP5.5
    return (($D > 0) ? (int) ceil(($Y - $X) / $D) : 0);
}