<?php
declare(strict_types=1);

/**
 * Вариант 1. В точности по ТЗ. Код там, где выделили для него место.
 */
function maxPrefixSum(array $nums): int {
    $len = count($nums);
    for ($i = 1; $i < $len; $i++) {
        $nums[$i] = $nums[$i - 1] + $nums[$i];
    }
    $ans = 0;
    // Ваш код

    $ans = $nums[0];
    for ($i = 1; $i < $len; $i++) {
        if ($nums[$i] > $ans) {
            $ans = $nums[$i];
        }
    }

    return $ans;
}


/**
 * Вариант 2. Так делал бы, если бы с нуля.
 */
function maxPrefixSum1(array $nums): int {
    $len = count($nums);

    $maxSum = $currentSum = $nums[0];
    for ($i = 1; $i < $len; $i++) {
        $currentSum += $nums[$i];
        if ($currentSum > $maxSum) {
            $maxSum = $currentSum;
        }
    }

    return $maxSum;
}



echo maxPrefixSum([7, -5, 1, 5, -3, 2]);
