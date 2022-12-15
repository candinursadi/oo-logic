<?php
function sum_deep($array, $char, $node = 1){
    $result = 0;
    foreach($array as $v){
        if(is_array($v)){
            $result += sum_deep($v, $char, $node + 1);
        }else{
            if(str_contains($v, $char)) $result += $node;
        }
    }

    return $result;
}

function sum_deep_challenge($array, $string){
    $chars = str_split($string);
    $result = 0;
    foreach($chars as $i => $char){
        $sum = 0;
        $result += sum_deep($array, $char) * ($i+1);
    }

    return $result;
}

echo "Sum Deep";
echo "<br>";
echo sum_deep(['AB', ['XY'], ['YP']], 'Y');
echo '<br>';
echo sum_deep(['', ['', ['XXXXX']]], 'X');
echo '<br>';
echo sum_deep(['X'], 'X');
echo '<br>';
echo sum_deep([''], 'X');
echo '<br>';
echo sum_deep(['X', ['', ['', ['Y'], ['X']]], ['X', ['', ['Y'], ['Z']]]], 'X');
echo '<br>';
echo sum_deep(['X', [''], ['X'], ['X'], ['Y', ['']], ['X']], 'X');
echo '<br>';
echo '<br>';

echo 'Sum Deep Challenge';
echo '<br>';
echo sum_deep_challenge(['ABAH', ['CIRCA'], ['CRUMP', ['IRA']], ['ALI']], 'ACI');
echo '<br>';
echo '<br>';
?>