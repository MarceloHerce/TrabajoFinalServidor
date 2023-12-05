<?php
require_once ("../model/Product.php");

function selectAllProducts($pdo){
    try {
        //Hacemos la query
        $statement = $pdo->query("SELECT * FROM products");

        $results = [];
        foreach ($statement->fetchAll() as $p) {
            $imageData = $p["image"];
            $deBlobImg = base64_encode($imageData);
            $objectP = new Product($p["product_id"], $p["pro_name"], $p["pro_description"],$p["price"],$p["stock"],$deBlobImg,$p["x_category_id"]);
            array_push($results, $objectP);
        }
        return $results;
    }catch (PDOException $e) {
        echo "Error al obtener productos" . $e;
    }
}
function selectProductById($pdo, $id){
    try {
        //Hacemos la query
        $sql = "SELECT * FROM products WHERE product_id = (?)";
        $stmt= $pdo->prepare($sql);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        $res = $stmt->fetch();
        if ($res) {
            $imageData = $res["image"];
            $deBlobImg = base64_encode($imageData);
            $product = new Product($res["product_id"], $res["pro_name"], $res["pro_description"], $res["price"], $res["stock"], $deBlobImg, $res["x_category_id"]);
            return $product;
        }
    }catch (PDOException $e) {
        echo "Error al obtener producto" . $e;
    }
}
function selectProductsByCategoryId($pdo, $categoryId){
    try {
        //Hacemos la query
        $sql = "SELECT * FROM products WHERE x_category_id = (?)";
        $stmt= $pdo->prepare($sql);
        $stmt->bindParam(1, $categoryId);
        $stmt->execute();
        $results = [];
        // Insertar productos en array
        while ($res = $stmt->fetch()) {
            $imageData = $res["image"];
            $deBlobImg = base64_encode($imageData);
            $product = new Product($res["product_id"], $res["pro_name"], $res["pro_description"], $res["price"], $res["stock"], $deBlobImg, $res["x_category_id"]);
            array_push($results, $product);
        }
        return $results;
    }catch (PDOException $e) {
        echo "No se ha podido completar la transaccion";
    }
}
function selectProductsByCategoryName($pdo, $categoryName){
    try {
        //Hacemos la query
        $sql = "SELECT * FROM products as pro JOIN categories as cat on pro.x_category_id = cat.category_id WHERE cat_name = (?)";
        $stmt= $pdo->prepare($sql);
        $stmt->bindParam(1, $categoryName);
        $stmt->execute();
        $results = [];
        // Insertar productos en array
        while ($res = $stmt->fetch()) {
            $imageData = $res["image"];
            $deBlobImg = base64_encode($imageData);
            $product = new Product($res["product_id"], $res["pro_name"], $res["pro_description"], $res["price"], $res["stock"], $deBlobImg, $res["x_category_id"]);
            array_push($results, $product);
        }
        return $results;
    }catch (PDOException $e) {
        echo "No se ha podido completar la transaccion" .$e;
    }
}
function orderByPriceAscend($array){
    usort($array, array('Product','sortByPriceAsc'));
    return $array;
}
function orderByPriceDescend($array){
    usort($array, array('Product','sortByPriceDesc'));
    return $array;
}
function orderByNameAscend($array){
    usort($array, array('Product','sortByNameAsc'));
    return $array;
}
function orderByNameDescend($array){
    usort($array, array('Product','sortByNameDesc'));
    return $array;
}
function productImage($img){
    $base64Image = base64_encode($img);
    return $base64Image;
}

function insertProduct($product) {
    try {
        $this->connect();

        $sql = "INSERT INTO products (pro_name, pro_description, price, stock, image, x_category_id) 
                VALUES ((?), (?), (?), (?), (?), (?))";

        $stmt = $this->conexion->prepare($sql);

        $stmt->bindParam(1, $product->pro_name);
        $stmt->bindParam(2, $product->pro_description);
        $stmt->bindParam(3, $product->price);
        $stmt->bindParam(4, $product->stock);
        $stmt->bindParam(5, $product->image);
        $stmt->bindParam(6, $product->x_category_id);

        $stmt->execute();

        echo "Inserción exitosa";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

function updateProduct($product) {
    try {
        $this->connect();

        $sql = "UPDATE products SET 
                pro_name = (?)
                pro_description = (?), 
                price = (?), 
                stock = (?), 
                image = (?), 
                x_category_id = (?) 
                WHERE product_id = (?)";

        $stmt = $this->conexion->prepare($sql);

        $stmt->bindParam(1, $product->product_id);
        $stmt->bindParam(2, $product->pro_name);
        $stmt->bindParam(3, $product->pro_description);
        $stmt->bindParam(4, $product->price);
        $stmt->bindParam(5, $product->stock);
        $stmt->bindParam(6, $product->image);
        $stmt->bindParam(7, $product->x_category_id);

        $stmt->execute();

        echo "Actualización exitosa";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
function deleteProduct($product_id) {
    try {
        $this->connect();

        $sql = "UPDATE products SET stock = 0 WHERE product_id = (?)";

        $stmt = $this->conexion->prepare($sql);
        $stmt->bindParam(1, $product_id);

        $stmt->execute();

        echo "Borrado exitoso (Stock establecido en 0)";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}



?>
