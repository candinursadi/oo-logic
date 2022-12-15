<?php
function get_scheme($body, $node = 1){
    $result = [];
    foreach ($body->childNodes as $child) {
        $array = [];
        if($child->attributes){
            foreach ($child->attributes as $attr) {
                if(substr($attr->name, 0, 3) == 'sc-'){
                    $array[substr($attr->name, 3)] = $attr->value;
                }
            }
            $result[] = $array;
        }

        if($child->childNodes){
            $getChild = get_scheme($child, $node + 1);
            if(count($getChild)) $result[] = $getChild;
        }
    }

    return $result;
}

$html='
<div sc-prop sc-alias="" sc-type="Organization">
    <div sc-name="Alice">Hello 
        <i sc-name="Wonderland">World</i>
    </div>
</div>';

$dom = new DOMDocument();
$dom->loadHTML($html);

$bodys = $dom->getElementsByTagName('body');
$body = $bodys->item(0);

$result = get_scheme($body, $node = 1);
echo "Get Scheme + Challenge";
echo "<br>";
echo json_encode($result);
echo "<br>";
echo "<br>";
?>