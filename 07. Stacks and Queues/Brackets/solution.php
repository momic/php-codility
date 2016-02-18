function solution($S) {
    // write your code in PHP5.5
    $stack = [];
    $size = 0;
    $N = strlen($S);
    $MAP = [')' => '(', '}' => '{', ']' => '['];
    for ($i=0;$i<$N;$i++)
        switch ($S[$i]) {
            case '(':
            case '{':
            case '[':
                $size = array_push($stack, $S[$i]);
                break;
            case ')':
            case '}':
            case ']':
                if (end($stack) == $MAP[$S[$i]]) {
                    array_pop($stack);
                    $size--;
                }
                else
                    return 0;
                break;            
        }
        
    return ($size == 0) ? 1 : 0;
}