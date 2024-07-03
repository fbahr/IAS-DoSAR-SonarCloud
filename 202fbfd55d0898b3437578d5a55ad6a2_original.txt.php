<?php

header("Content-Type: text/html; charset=utf-8");
$xml = new SimpleXMLElement("https://bready.ru/bitrix/catalog_export/yandex_796692.php", 0, true);
include "./importProds2.php";
$obj = new importProds();
echo "<pre>";
$categories = array();
foreach ($xml->shop->categories->category as $cat) {
    $id = $cat->attributes()["id"]->__toString();
    $name = $cat->__toString();
    $categories[$id] = trim($name);
}
$products = array();
foreach ($xml->shop->offers->offer as $offer) {
    $id = $offer->attributes()["id"]->__toString();
    $name = $offer->name->__toString();
    $description = $offer->description->__toString();
    $picture = $offer->picture->__toString();
    $price = $offer->price->__toString();
    $categoryId = $offer->categoryId->__toString();
    $url = $offer->url->__toString();
    if ($id && $categoryId && $name && $price) {
        $products[$id] = array("id" => $id, "name" => $name, "description" => preg_replace("/\\s{3,}/", '', $description), "picture" => $picture, "price" => $price, "categoryId" => $categoryId, "url" => $url);
    }
}
$categorsAll = $obj->getCategories();
foreach ($categories as $key => $cat) {
    if (!isset($categorsAll[$key]) && !in_array($key, array("630", "18"))) {
        $res1 = $obj->adderCategory($key, $cat);
    } elseif (isset($categorsAll[$key])) {
    }
}
$categorsAll = $obj->getCategories();
$prodsAll = $obj->getProducts();
$counter = 0;
$catsAdded = array();
foreach ($products as $id => $prod) {
    $catsAdded[$prod["categoryId"]] = $catsAdded[$prod["categoryId"]] ?: 0;
    if ($categorsAll[$prod["categoryId"]]) {
        if (!isset($prodsAll[$id])) {
            $res1 = $obj->addProduct($categorsAll[$prod["categoryId"]], $prod);
            $fileArr = $obj->uploadPhotoFull($prod["picture"]);
            $res2 = $obj->updatePhoto($id, $fileArr);
        } else {
        }
    }
}
$visible = $obj->showAllCategories();
var_dump($visible);
$empty1 = $obj->hideEmptyCategories();
var_dump($empty1);
echo "done</pre>";
