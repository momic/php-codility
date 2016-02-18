function solution($M, $A) {
    // write your code in PHP5.5
    $N = count($A);
    $accessed = array_fill(0, $M+1, -1);
    $front = $back = 0;
    $result = 0;
    
    for ($front=0;$front<$N;$front++) {
        if ($accessed[$A[$front]] == -1) {
            $accessed[$A[$front]] = $front;
        }
        else {
            // Compute the number of distinct slices between newBack-1 and back position
            // 1+2+3+4+…+n-1+n = n*(n+1)/2
            //
            // (front – back) * (front – back + 1) / 2 
            // – 
            // (front – newBack) * (front – newBack + 1) / 2
            // = (newBack – back) * (front – back + front – newBack + 1) / 2
            
            $newBack = $accessed[$A[$front]] + 1;
            $result += (($newBack - $back) * ($front - $back + $front - $newBack + 1) / 2);
            if ($result >= 1000000000)
                return 1000000000;
                
            for ($i=$back;$i<$newBack;$i++)
                $accessed[$A[$i]] = -1;
                
            $accessed[$A[$front]] = $front;
            
            $back = $newBack;
        }
    }
        
    // Process last slices
    $result += (($front - $back) * ($front - $back + 1) / 2);
    
    return min($result, 1000000000);
}