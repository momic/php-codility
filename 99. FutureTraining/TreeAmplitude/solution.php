function maxdiff($max, $min, $node) {
   if (!isset($node))
	return ['min' => $min, 'max' => $max];

   $max = (isset($max) && $max > $node->x) ? $max : $node->x;
   $min = (isset($min) && $min < $node->x) ? $min : $node->x;

   $leftResult = maxdiff($max, $min, $node->l);
   $rightResult = maxdiff($max, $min, $node->r);

   $leftAmplitude = abs($leftResult['max'] - $leftResult['min']);
   $rightAmplitude = abs($leftResult['max'] - $leftResult['min']);
   
   return ($leftAmplitude > $rightAmplitude) ? $leftResult : $rightResult;
}

$result = maxdiff(null, null, $T);
return $result['max'] - $result['min'];