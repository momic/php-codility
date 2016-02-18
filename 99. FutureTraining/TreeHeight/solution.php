function solution($T) {
    // write your code in PHP5.5
    if (!isset($T->l) && !isset($T->r))
        return 0;
    elseif (!isset($T->l))
        return 1 + solution($T->r);
    elseif (!isset($T->r))
        return 1 + solution($T->l);
    else
        return 1 + max(solution($T->l), solution($T->r));
}