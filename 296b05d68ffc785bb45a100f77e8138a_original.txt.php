function mergeSort($arr) {
    $length = count($arr);
    
    if ($length <= 1) {
        return $arr;
    }
    
    $mid = (int) ($length / 2);
    $left = array_slice($arr, 0, $mid);
    $right = array_slice($arr, $mid);
    
    $left = mergeSort($left);
    $right = mergeSort($right);
    
    return merge($left, $right);
}

function merge($left, $right) {
    $result = [];
    $leftLength = count($left);
    $rightLength = count($right);
    $leftIndex = $rightIndex = 0;
    
    while ($leftIndex < $leftLength && $rightIndex < $rightLength) {
        if ($left[$leftIndex] < $right[$rightIndex]) {
            $result[] = $left[$leftIndex];
            $leftIndex++;
        } else {
            $result[] = $right[$rightIndex];
            $rightIndex++;
        }
    }
    
    while ($leftIndex < $leftLength) {
        $result[] = $left[$leftIndex];
        $leftIndex++;
    }
    
    while ($rightIndex < $rightLength) {
        $result[] = $right[$rightIndex];
        $rightIndex++;
    }
    
    return $result;
}

// Contoh penggunaan
$unsortedArray = [38, 27, 43, 3, 9, 82, 10];
$sortedArray = mergeSort($unsortedArray);

echo "Array sebelum diurutkan: " . implode(", ", $unsortedArray) . "\n";
echo "Array setelah diurutkan: " . implode(", ", $sortedArray) . "\n";

