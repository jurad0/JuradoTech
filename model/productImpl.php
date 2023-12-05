<?php
require_once("../connection/Connection.php");
require_once("../model/Product.php");




// ORDER PRODUCT BY  
function orderByPriceAsc($arr)
{
    usort($arr, array('Product', 'compareByPriceAsc'));
    return $arr;
}
function orderByPriceDesc($arr)
{
    usort($arr, array('Product', 'compareByPriceDesc'));
    return $arr;
}
function orderByNameAsc($arr)
{
    usort($arr, array('Product', 'compareByNameAsc'));
    return $arr;
}
function orderByNameDesc($arr)
{
    usort($arr, array('Product', 'compareByNameDesc'));
    return $arr;
}


function selectProductById($pdo, $id)
{
    try {
        $sql = "SELECT * FROM products WHERE product_id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);
        $res = $stmt->fetch();
        if ($res) {
            $imageData = $res["image"];
            $base64Image = base64_encode($imageData);
            $product = new Product(
                $res["product_id"],
                $res["pro_name"],
                $res["pro_description"],
                $res["price"],
                $res["stock"],
                $base64Image,
                $res["x_category_id"]
            );
            return $product;
        }
    } catch (PDOException $e) {
        echo "Couldn't complete the transaction";
    }
}

function selectAllProducts($pdo)
{
    try {
        $sql = "SELECT * FROM products";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        while ($res = $stmt->fetch()) {
            $imageData = $res["image"];
            $base64Image = base64_encode($imageData);
            $product = new Product(
                $res["product_id"],
                $res["pro_name"],
                $res["pro_description"],
                $res["price"],
                $res["stock"],
                $base64Image,
                $res["x_category_id"]
            );
            $products[] = $product;
        }
        return $products;
    } catch (PDOException $e) {
        echo "Couldn't complete the transaction";
    }
}
function getCategoryNameByCategoryId($pdo, $categoryId)
{
    try {
        $sql = "SELECT * FROM categories WHERE category_id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$categoryId]);
        $res = $stmt->fetch();

        if ($res) {
            return $res["cat_Name"]; //return category name
        } else {
            return false;
        }
    } catch (PDOException $e) {
        echo "Couldn't complete the transaction";
    }
}

function selectProductsByCategory($pdo, $categoryId)
{
    try {
        $sql = "SELECT * FROM products WHERE x_category_id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$categoryId]);
        while ($res = $stmt->fetch()) {
            $imageData = $res["image"];
            $base64Image = base64_encode($imageData);
            $product = new Product(
                $res["product_id"],
                $res["pro_name"],
                $res["pro_description"],
                $res["price"],
                $res["stock"],
                $base64Image,
                $res["x_category_id"]
            );
            $products[] = $product;
        }
        return $products;
    } catch (PDOException $e) {
        echo "Couldn't complete the transaction";
    }
}





function productImage($img)
{
    $base64Image = base64_encode($img);
    return $base64Image;
}

?>