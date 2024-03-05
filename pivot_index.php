<?php
declare(strict_types=1);

/**
 * Вариант 1. больше кода, но чуть быстрее на большом кол-ве входных данных
 */
function pivotIndex(array $nums): int
{
    $len = count($nums);
    $copy = $nums;
    for ($i = 1; $i < $len; $i++) {
        $copy[$i] = $copy[$i - 1] + $copy[$i];
    }
    $ans = 0;
    // Ваш код


    // проверка особенных кейсов. можно было внести это во внутрь цикла,
    // но внутри цикла появились бы доп-условия и замедлили бы работу.
    if (1 === $len) {
        return 0;
    }
    if (2 === $len) {
        if (0 === $nums[0]) {
            return 1;
        }
        if (0 === $nums[1]) {
            return 0;
        }
    }


    // далее, гарантированно, в массиве 3 и более элементов.

    // если последний элемент опорный
    if (0 === $copy[$len - 2]) {
        return $len - 1;
    }

    $sumRight = 0;
    for ($i = $len - 2; $i >= 1; $i--) {
        $sumRight += $nums[$i + 1];
        $sumLeft = $copy[$i - 1];
        if ($sumLeft === $sumRight) {
            return $i;
        }
    }

    // если первый элемент опорный
    $sumRight += $nums[1];  // мы же в цикле остановились на 1-м, а значит, первый элемент не попал в сумму
    if (0 === $sumRight) {
        return 0;
    }


    // если до сюда дошел ко, то н нашли опорынй индекс.
    $ans = -1;
    return $ans;
}


/**
 * Вариант 2. Меньше кода, чуть лучше читаемость. Но лишние дейсвия в цикел.
 */
function pivotIndex1(array $nums): int
{
    $len = count($nums);
    $copy = $nums;
    for ($i = 1; $i < $len; $i++) {
        $copy[$i] = $copy[$i - 1] + $copy[$i];
    }
    $ans = 0;
    // Ваш код


    $sumRight = 0;
    for ($i = $len - 1; $i >= 0; $i--) {
        // на крайних элементах, считаем, что сумма нулевая (нет больше элементов). В это и есть утяжеление цикла.
        $sumRight += ($len - 1 === $i) ? 0 : $nums[$i + 1];
        $sumLeft = (0 === $i) ? 0 : $copy[$i - 1];
        if ($sumLeft === $sumRight) {
            return $i;
        }
    }


    // если до сюда дошел ко, то н нашли опорынй индекс.
    $ans = -1;
    return $ans;
}


echo pivotIndex([ 1, 3, -1, 8, -3, 6]);
