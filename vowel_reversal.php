<?php
/*
Write a function that reverses vowels in a string.

Example

solution(‘one’) => ‘eno’ 

solution(‘umbrella’) => ‘embrulla’ 

solution(‘emanate’) => ‘ameneta’
*/
function solution($str) {
    $vowels = [];
    $strArr = str_split($str);
    foreach ($strArr as $char) {
      if (in_array($char, ['a','e','i','o','u']) && !in_array($char, $vowels)) {
        $vowels[] = $char;
      }
    }
    $result = "";
    foreach ($strArr as $char) {
      $pos = array_search($char, $vowels);
      if ($pos === false) {
        $result .= $char;
        continue;
      }
      if ($pos == 0) {
        $result .= $vowels[1];
        continue;
      }
      if ($pos == 1) {
        $result .= $vowels[0];
        continue;
      }
      if ($pos % 2 == 0 && array_key_exists(($pos+1), $vowels)) {
        $result .= $vowels[$pos+1];
        continue;
      }
      if ($pos % 2 == 0 && !array_key_exists(($pos+1), $vowels)) {
        $result .= $vowels[$pos];
        continue;
      }
      if ($pos % 2 != 0) {
        $result .= $vowels[$pos-1];
        continue;
      }
    }
    return $result;
}

$input = fgets(STDIN);
echo(solution($input));