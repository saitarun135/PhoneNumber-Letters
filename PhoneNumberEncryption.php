<?php

function letterCombinations($digits) {
    if (strlen($digits) == 0) {
        return [];
    }
    
    $dialPad = [
        '2' => 'abc', '3' => 'def', 
        '4' => 'ghi', '5' => 'jkl',
        '6' => 'mno', '7' => 'pqrs', 
        '8' => 'tuv', '9' => 'wxyz'
    ];
    
    $result = [];
    backtrack($result, $digits, $dialPad, "", 0);
    return $result;
}

function backtrack(&$result, $digits, $dialPad, $currentCombination, $index) {
    if ($index == strlen($digits)) {
        $result[] = $currentCombination;
        return;
    }
    
    $currentDigit = $digits[$index];
    if (!isset($dialPad[$currentDigit])) {
        return;
    }
    
    $letters = str_split($dialPad[$currentDigit]);
    foreach ($letters as $letter) {
        backtrack($result, $digits, $dialPad, $currentCombination . $letter, $index + 1);
    }
}

// Test the function
$a = '5678';
$result = letterCombinations($a);
print_r($result); // Should print all combinations for digits "5678"
?>
