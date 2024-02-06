<?php
$catalog = [];

$countForCategory = 1;
$catId = 1;
$hotoffer = 'no';

for ($i=1; $i <= 20; $i++) { 
	
	if ($countForCategory == 6) { $catId++; $countForCategory = 1; $hotoffer = 'yes'; } else { $hotoffer = 'no'; }

	$countForCategory++;

	$filePath = "{$i}.txt";

	$lines = file($filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    
    $product = [
        "id" => $i,
        "img" => "$i.jpg",
        "title" => trim($lines[0]),
        "price" => intval(trim($lines[1])),
        "oldprice" => intval(trim($lines[2])),
		"catid" => $catId,
		"hotoffer" => $hotoffer
    ];
    
    $category = pathinfo(dirname($filePath), PATHINFO_FILENAME);
    $catalog[] = $product;

}

echo '<pre>'; print_r($catalog); echo '</pre>';
file_put_contents('catalog.json', json_encode($catalog, JSON_UNESCAPED_UNICODE));