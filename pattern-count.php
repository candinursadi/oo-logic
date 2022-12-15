<?php
function pattern_count($text, $pattern){
    $countPattern = strlen($pattern);
    $countText = strlen($text);
    $result = 0;
    
    if($countPattern > 0 && $countText >= $countPattern){
        for($i=0; $i <= $countText - $countPattern; $i++){
            if(substr($text, $i, $countPattern) == $pattern) $result += 1;
        }
    }

    return $result;
}

echo "Pattern Count";
echo "<br>";
echo pattern_count("palindrom", "ind");
echo "<br>";
echo pattern_count("abakadabra", "ab");
echo "<br>";
echo pattern_count("hello", "");
echo "<br>";
echo pattern_count("ababab", "aba");
echo "<br>";
echo pattern_count("aaaaaa", "aa");
echo "<br>";
echo pattern_count("hell", "hello");
echo "<br>";
echo "<br>";
?>