<?php


$string = 'some crazy text
more nonesense
@first: first-value;
yet even more non-sense
@second: second-value;
finally more non-sense';

preg_match_all('#@(.*?): (.*?);#is', $string, $matches);

$count = count($matches[0]);

for($i = 0; $i < $count; $i++)
{
    $return[$matches[1][$i]] = $matches[2][$i];
}

print_r($return);

?>