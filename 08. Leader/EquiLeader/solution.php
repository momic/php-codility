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
        return 0;
        
    $count = 0; 
    for($i=0;$i<$N;$i++)
        if ($A[$i] == $value)
            $count++;
        
    if ($count <= floor($N/2)) 
        return 0;
        
    $equiCount = $leftDominators = 0;
    for($i=0;$i<$N;$i++) {
        if ($A[$i] == $value)
            $leftDominators++;
        
        if ($leftDominators > (int) floor(($i+1)/2) && 
           (($count-$leftDominators) > (int) floor(($N-$i-1)/2)))
            $equiCount++;
    }

    
    return $equiCount;
}