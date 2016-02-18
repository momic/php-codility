function solution($A) {
    // write your code in PHP5.5
    $N = count($A);
    $upperBounds = $lowerBounds = array_fill(0, $N, 0);

    for ($i=0;$i<$N;$i++) {
        $upperBounds[$i] = $i + $A[$i];
        $lowerBounds[$i] = $i - $A[$i];
    }

    sort($upperBounds);
    sort($lowerBounds);

    $intersections = 0;
    $lowerBoundsIndex = 0;

    for ($upperBoundsIndex=0;$upperBoundsIndex<$N;$upperBoundsIndex++) {
	// How many lower bounds are less or equal current upper bound?
        while ($lowerBoundsIndex<$N && $upperBounds[$upperBoundsIndex] >= $lowerBounds[$lowerBoundsIndex])
            $lowerBoundsIndex++;
	// Intersections are number of lower bounds - number of upper bounds (whole circle is below current upper bound) - 1 (minus lower bound of current upper bound)
        $intersections += $lowerBoundsIndex - $upperBoundsIndex - 1;
        if ($intersections > 10000000)
            return -1;
    }

    return $intersections;
}