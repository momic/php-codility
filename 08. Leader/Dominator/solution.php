function solution($A) {
    // write your code in PHP5.5
    $N = count($A);
    $size = $value = 0;
    for($i=0;$i<$N;$i++)
        if ($size == 0) {
            $value = $A[$i];
            $size++;
        }
        elseif ($value == $A[$i])
            $size++;
        else
            $size--;
        
    if ($size <= 0)
        return -1;
        
    $count = 0; 
    $index = -1;
    for($i=0;$i<$N;$i++)
        if ($A[$i] == $value) {
            $count++;
            $index=$i;
        }
        
    return ($count > (int) $N / 2) ? $index : -1;
}