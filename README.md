# TrabajoFinalServidor
<img src="view/src/Logo.png" alt="Texto alternativo" width="100rem" height="auto"> <h2>ShopIT</h2>

<br>

# UserIMPL.php

## selectUserById()
Seleccciona el usuario en funcion de una id. Recibe como argumentos $pdo y $id.

## insertUser()
Recibe como argumento $pdo y $user para insertarlo en la base de datos. Este metodo solo insertara usuarios con el rol de visitor.

## updatetUser()
R


# UserIMPL.php

## selectUserById
## insertUser
## updatetUser
Este método se encarga de crear dinámicamente una tarjeta de producto en el DOM basada en la información proporcionada en un objeto JSON.

# ServicesIMPL.php

## selectAllServices

Este método recupera todos los servicios de la base de datos y devuelve un array de objetos Service.

### Parámetros

- `$pdo`: Objeto PDO que representa una conexión a la base de datos.

### Retorno

- Un array de objetos Service, cada uno representando un servicio.

### Excepciones

- Si ocurre un error al ejecutar la consulta SQL, se captura una excepción de tipo `PDOException` y se imprime un mensaje de error.

### Uso

```php
try {
    $pdo = new PDO(/* configuración de conexión */);
    $services = selectAllServices($pdo);

    // $services ahora contiene un array de objetos Service

    foreach ($services as $service) {
        // Realizar operaciones con cada objeto Service
        echo $service->getServiceName();
        // ...
    }

} catch (PDOException $e) {
    echo "Error al obtener servicios: " . $e->getMessage();
}
```

## selectServiceById

Este método recupera un servicio de la base de datos según su identificador y devuelve un objeto Service.

### Parámetros

- `$pdo`: Objeto PDO que representa una conexión a la base de datos.
- `$id`: Identificador único del servicio que se desea recuperar.

### Retorno

- Un objeto Service que representa el servicio con el ID proporcionado. Si el servicio no se encuentra, se devuelve `null`.

### Excepciones

- Si ocurre un error al ejecutar la consulta SQL, se captura una excepción de tipo `PDOException` y se imprime un mensaje de error.

### Uso

```php
try {
    $pdo = new PDO(/* configuración de conexión */);
    $serviceId = 1; // ID del servicio que se desea recuperar
    $service = selectServiceById($pdo, $serviceId);

    if ($service !== null) {
        // Realizar operaciones con el objeto Service
        echo $service->getServiceName();
        // ...
    } else {
        echo "Servicio no encontrado";
    }

} catch (PDOException $e) {
    echo "Error al obtener servicio: " . $e->getMessage();
}
```

## insertService

Este método inserta un nuevo servicio en la base de datos.

### Parámetros

- `$servicio`: Objeto Service que contiene los detalles del servicio a insertar.

### Retorno

- No hay un valor de retorno explícito. Se imprime un mensaje en caso de éxito o se maneja una excepción en caso de error.

### Excepciones

- Si ocurre un error al ejecutar la consulta SQL, se captura una excepción de tipo `PDOException` y se imprime un mensaje de error.

### Uso

```php
try {
    $pdo = new PDO(/* configuración de conexión */);

    // Crear un objeto Service con los detalles del nuevo servicio
    $nuevoServicio = new Service(/* detalles del servicio */);

    // Insertar el nuevo servicio en la base de datos
    insertService($pdo, $nuevoServicio);

    echo "Inserción exitosa";

} catch (PDOException $e) {
    echo "Error al insertar servicio: " . $e->getMessage();
}
```

## updateService

Este método actualiza un servicio existente en la base de datos.

### Parámetros

- `$servicio`: Objeto Service que contiene los detalles actualizados del servicio.

### Retorno

- No hay un valor de retorno explícito. Se imprime un mensaje en caso de éxito o se maneja una excepción en caso de error.

### Excepciones

- Si ocurre un error al ejecutar la consulta SQL, se captura una excepción de tipo `PDOException` y se imprime un mensaje de error.

### Uso

```php
try {
    $pdo = new PDO(/* configuración de conexión */);

    // Crear un objeto Service con los detalles actualizados del servicio
    $servicioActualizado = new Service(/* detalles actualizados del servicio */);

    // Actualizar el servicio en la base de datos
    updateService($pdo, $servicioActualizado);

    echo "Actualización exitosa";

} catch (PDOException $e) {
    echo "Error al actualizar servicio: " . $e->getMessage();
}
```

# ProducIMPL.php

## selectAllProducts

Este método recupera todos los productos de la base de datos y devuelve un array de objetos Product.

### Parámetros

- `$pdo`: Objeto PDO que representa una conexión a la base de datos.

### Retorno

- Un array de objetos Product, cada uno representando un producto.

### Excepciones

- Si ocurre un error al ejecutar la consulta SQL, se captura una excepción de tipo `PDOException` y se imprime un mensaje de error.

### Uso

```php
try {
    $pdo = new PDO(/* configuración de conexión */);
    $products = selectAllProducts($pdo);

    // $products ahora contiene un array de objetos Product

    foreach ($products as $product) {
        // Realizar operaciones con cada objeto Product
        echo $product->getProductName();
        // ...
    }

} catch (PDOException $e) {
    echo "Error al obtener productos: " . $e->getMessage();
}
```

## selectProductById

Este método recupera un producto de la base de datos según su identificador y devuelve un objeto Product.

### Parámetros

- `$pdo`: Objeto PDO que representa una conexión a la base de datos.
- `$id`: Identificador único del producto que se desea recuperar.

### Retorno

- Un objeto Product que representa el producto con el ID proporcionado. Si el producto no se encuentra, se devuelve `null`.

### Excepciones

- Si ocurre un error al ejecutar la consulta SQL, se captura una excepción de tipo `PDOException` y se imprime un mensaje de error.

### Uso

```php
try {
    $pdo = new PDO(/* configuración de conexión */);
    $productId = 1; // ID del producto que se desea recuperar
    $product = selectProductById($pdo, $productId);

    if ($product !== null) {
        // Realizar operaciones con el objeto Product
        echo $product->getProductName();
        // ...
    } else {
        echo "Producto no encontrado";
    }

} catch (PDOException $e) {
    echo "Error al obtener producto: " . $e->getMessage();
}
```

## selectProductsByCategoryId

Este método recupera todos los productos de la base de datos que pertenecen a una categoría específica y devuelve un array de objetos Product.

### Parámetros

- `$pdo`: Objeto PDO que representa una conexión a la base de datos.
- `$categoryId`: Identificador único de la categoría de productos que se desea recuperar.

### Retorno

- Un array de objetos Product, cada uno representando un producto que pertenece a la categoría especificada.

### Excepciones

- Si ocurre un error al ejecutar la consulta SQL, se captura una excepción de tipo `PDOException` y se imprime un mensaje de error.

### Uso

```php
try {
    $pdo = new PDO(/* configuración de conexión */);
    $categoryId = 1; // ID de la categoría de productos que se desea recuperar
    $products = selectProductsByCategoryId($pdo, $categoryId);

    // $products ahora contiene un array de objetos Product pertenecientes a la categoría especificada

    foreach ($products as $product) {
        // Realizar operaciones con cada objeto Product
        echo $product->getProductName();
        // ...
    }

} catch (PDOException $e) {
    echo "Error al obtener productos por categoría: " . $e->getMessage();
}
```

## selectProductsByCategoryName

Este método recupera todos los productos de la base de datos que pertenecen a una categoría específica por su nombre y devuelve un array de objetos Product.

### Parámetros

- `$pdo`: Objeto PDO que representa una conexión a la base de datos.
- `$categoryName`: Nombre de la categoría de productos que se desea recuperar.

### Retorno

- Un array de objetos Product, cada uno representando un producto que pertenece a la categoría especificada por su nombre.

### Excepciones

- Si ocurre un error al ejecutar la consulta SQL, se captura una excepción de tipo `PDOException` y se imprime un mensaje de error.

### Uso

```php
try {
    $pdo = new PDO(/* configuración de conexión */);
    $categoryName = "NombreCategoria"; // Nombre de la categoría de productos que se desea recuperar
    $products = selectProductsByCategoryName($pdo, $categoryName);

    // $products ahora contiene un array de objetos Product pertenecientes a la categoría especificada por su nombre

    foreach ($products as $product) {
        // Realizar operaciones con cada objeto Product
        echo $product->getProductName();
        // ...
    }

} catch (PDOException $e) {
    echo "Error al obtener productos por nombre de categoría: " . $e->getMessage();
}
```

## orderByPriceAscend

Este método ordena un array de objetos Product en orden ascendente según el precio.

### Parámetros

- `$array`: Array de objetos Product que se desea ordenar.

### Retorno

- Un array de objetos Product ordenado en orden ascendente según el precio.

### Uso

```php
// Ejemplo de uso
$products = /* obtener el array de productos */;

$sortedProducts = orderByPriceAscend($products);

foreach ($sortedProducts as $product) {
    // Realizar operaciones con cada objeto Product
    echo $product->getProductName() . " - Precio: " . $product->getPrice();
    // ...
}
```

## orderByPriceDescend

Este método ordena un array de objetos Product en orden descendente según el precio.

### Parámetros

- `$array`: Array de objetos Product que se desea ordenar.

### Retorno

- Un array de objetos Product ordenado en orden descendente según el precio.

### Uso

```php
// Ejemplo de uso
$products = /* obtener el array de productos */;

$sortedProducts = orderByPriceDescend($products);

foreach ($sortedProducts as $product) {
    // Realizar operaciones con cada objeto Product
    echo $product->getProductName() . " - Precio: " . $product->getPrice();
    // ...
}
```

## orderByNameAscend

Este método ordena un array de objetos Product en orden ascendente según el nombre.

### Parámetros

- `$array`: Array de objetos Product que se desea ordenar.

### Retorno

- Un array de objetos Product ordenado en orden ascendente según el nombre.

### Uso

```php
// Ejemplo de uso
$products = /* obtener el array de productos */;

$sortedProducts = orderByNameAscend($products);

foreach ($sortedProducts as $product) {
    // Realizar operaciones con cada objeto Product
    echo $product->getProductName();
    // ...
}
```

## orderByNameDescend

Este método ordena un array de objetos Product en orden descendente según el nombre.

### Parámetros

- `$array`: Array de objetos Product que se desea ordenar.

### Retorno

- Un array de objetos Product ordenado en orden descendente según el nombre.

### Uso

```php
// Ejemplo de uso
$products = /* obtener el array de productos */;

$sortedProducts = orderByNameDescend($products);

foreach ($sortedProducts as $product) {
    // Realizar operaciones con cada objeto Product
    echo $product->getProductName();
    // ...
}
```

## orderByNameDescend

Este método ordena un array de objetos Product en orden descendente según el nombre.

### Parámetros

- `$array`: Array de objetos Product que se desea ordenar.

### Retorno

- Un array de objetos Product ordenado en orden descendente según el nombre.

### Uso

```php
// Ejemplo de uso
$products = /* obtener el array de productos */;

$sortedProducts = orderByNameDescend($products);

foreach ($sortedProducts as $product) {
    // Realizar operaciones con cada objeto Product
    echo $product->getProductName();
    // ...
}
```

## updateProduct

Este método actualiza un producto existente en la base de datos.

### Parámetros

- `$product`: Objeto Product que contiene los detalles actualizados del producto.

### Retorno

- No hay un valor de retorno explícito. Se imprime un mensaje en caso de éxito o se maneja una excepción en caso de error.

### Uso

```php
try {
    $product = new Product(/* detalles actualizados del producto */);

    // Llamada al método updateProduct para actualizar el producto en la base de datos
    updateProduct($product);

    echo "Actualización exitosa";

} catch (PDOException $e) {
    echo "Error al actualizar producto: " . $e->getMessage();
}
```

## deleteProduct

Este método "borra" un producto estableciendo su stock en 0 en lugar de eliminarlo físicamente de la base de datos.

### Parámetros

- `$product_id`: Identificador único del producto que se desea "borrar".

### Retorno

- No hay un valor de retorno explícito. Se imprime un mensaje en caso de éxito o se maneja una excepción en caso de error.

### Uso

```php
try {
    $productId = 1; // ID del producto que se desea "borrar"
    
    // Llamada al método deleteProduct para establecer el stock en 0
    deleteProduct($productId);

    echo "Borrado exitoso (Stock establecido en 0)";

} catch (PDOException $e) {
    echo "Error al borrar producto: " . $e->getMessage();
}
```

# OrderIMPL.php

## selectOrderById

Este método recupera un producto de la base de datos según su identificador y devuelve un objeto Order.

### Parámetros

- `$pdo`: Objeto PDO que representa una conexión a la base de datos.
- `$id`: Identificador único del producto que se desea recuperar.

### Retorno

- Un objeto Order que representa el producto con el ID proporcionado. Si el producto no se encuentra, se devuelve `null`.

### Excepciones

- Si ocurre un error al ejecutar la consulta SQL, se captura una excepción de tipo `PDOException` y se imprime un mensaje de error.

### Uso

```php
try {
    $pdo = new PDO(/* configuración de conexión */);
    $productId = 1; // ID del producto que se desea recuperar
    $product = selectOrderById($pdo, $productId);

    if ($product !== null) {
        // Realizar operaciones con el objeto Order
        echo $product->getProductName();
        // ...
    } else {
        echo "Producto no encontrado";
    }

} catch (PDOException $e) {
    echo "Error al obtener producto: " . $e->getMessage();
}
```

## selectOrdersByUserId

Este método recupera todas las órdenes asociadas a un usuario específico de la base de datos y devuelve un array de objetos Order.

### Parámetros

- `$pdo`: Objeto PDO que representa una conexión a la base de datos.
- `$id`: Identificador único del usuario cuyas órdenes se desea recuperar.

### Retorno

- Un array de objetos Order que representa las órdenes asociadas al usuario. Si el usuario no tiene órdenes, se devuelve un array vacío.

### Excepciones

- Si ocurre un error al ejecutar la consulta SQL, se maneja una excepción de tipo `PDOException` y se imprime un mensaje de error.

### Uso

```php
try {
    $pdo = new PDO(/* configuración de conexión */);
    $userId = 1; // ID del usuario cuyas órdenes se desea recuperar
    $orders = selectOrdersByUserId($pdo, $userId);

    // $orders ahora contiene un array de objetos Order asociados al usuario

    foreach ($orders as $order) {
        // Realizar operaciones con cada objeto Order
        echo "Orden ID: " . $order->getOrderId() . ", Fecha: " . $order->getOrderDate();
        // Acceder a los ítems de la orden
        foreach ($order->items as $item) {
            echo "Producto ID: " . $item->getProductId() . ", Cantidad: " . $item->getQuantity();
            // ...
        }
        // ...
    }

} catch (PDOException $e) {
    echo "Error al obtener órdenes por usuario: " . $e->getMessage();
}
```

## selectItemsByOrderId

Este método recupera todos los ítems asociados a una orden específica de la base de datos y devuelve un array de objetos que representan productos o servicios junto con la cantidad.

### Parámetros

- `$pdo`: Objeto PDO que representa una conexión a la base de datos.
- `$id`: Identificador único de la orden cuyos ítems se desea recuperar.

### Retorno

- Un array de ítems, donde cada ítem es un array asociativo con las claves "item" y "quantity". "item" contiene un objeto que representa un producto o servicio, y "quantity" contiene la cantidad del ítem en la orden.

### Excepciones

- Si ocurre un error al ejecutar la consulta SQL, se captura una excepción de tipo `PDOException` y se imprime un mensaje de error.

### Uso

```php
try {
    $pdo = new PDO(/* configuración de conexión */);
    $orderId = 1; // ID de la orden cuyos ítems se desea recuperar
    $items = selectItemsByOrderId($pdo, $orderId);

    // $items ahora contiene un array de ítems asociados a la orden

    foreach ($items as $item) {
        // Realizar operaciones con cada ítem
        $itemObj = $item["item"];
        $quantity = $item["quantity"];
        echo "Producto o Servicio ID: " . $itemObj->getId() . ", Cantidad: " . $quantity;
        // ...
    }

} catch (PDOException $e) {
    echo "Error al obtener ítems por orden: " . $e->getMessage();
}
```

## getCartItemByTypeId

Este método recupera un ítem del carrito (producto o servicio) de la base de datos según su tipo y su identificador.

### Parámetros

- `$pdo`: Objeto PDO que representa una conexión a la base de datos.
- `$type`: Tipo de ítem (1 para producto, 2 para servicio).
- `$id`: Identificador único del ítem que se desea recuperar.

### Retorno

- Un objeto que representa el ítem del carrito (producto o servicio) asociado al tipo y al identificador proporcionados.

### Uso

```php
try {
    $pdo = new PDO(/* configuración de conexión */);
    $itemType = 1; // Tipo de ítem (1 para producto, 2 para servicio)
    $itemId = 1;   // ID del ítem que se desea recuperar
    $cartItem = getCartItemByTypeId($pdo, $itemType, $itemId);

    if ($cartItem !== null) {
        // Realizar operaciones con el ítem del carrito
        echo "Nombre del ítem: " . $cartItem->getProductName();
        // ...
    } else {
        echo "Ítem del carrito no encontrado";
    }

} catch (PDOException $e) {
    echo "Error al obtener ítem del carrito por tipo e ID: " . $e->getMessage();
}
```

## insertOrders

Este método realiza la inserción de órdenes en la base de datos, incluyendo la información de la orden y los detalles de los ítems del carrito.

### Parámetros

- `$pdo`: Objeto PDO que representa una conexión a la base de datos.

### Retorno

- No hay un valor de retorno explícito. Se realiza la inserción de órdenes en la base de datos.

### Excepciones

- Si ocurre un error durante la ejecución de las consultas SQL, se captura una excepción de tipo `PDOException` y se realiza un rollback para deshacer la transacción.

### Uso

```php
try {
    $pdo = new PDO(/* configuración de conexión */);
    
    // Llamada al método insertOrders para realizar la inserción de órdenes en la base de datos
    insertOrders($pdo);

    echo "Inserción de órdenes exitosa";

} catch (PDOException $e) {
    echo "Error al insertar órdenes: " . $e->getMessage();
}
```

## insertIntoOrderDetails

Este método realiza la inserción de detalles de ítems de una orden en la base de datos, incluyendo información sobre si el ítem es un producto o un servicio.

### Parámetros

- `$pdo`: Objeto PDO que representa una conexión a la base de datos.
- `$item`: Array que contiene la información del ítem a ser insertado en la orden.
- `$orderId`: Identificador único de la orden a la cual se asocian los detalles del ítem.

### Retorno

- No hay un valor de retorno explícito. Se realiza la inserción de detalles de ítems en la base de datos.

### Uso

```php
try {
    $pdo = new PDO(/* configuración de conexión */);
    $item = /* Array con información del ítem */;
    $orderId = 1; // ID de la orden a la cual se asocian los detalles del ítem

    // Llamada al método insertIntoOrderDetails para realizar la inserción de detalles de ítems en la base de datos
    insertIntoOrderDetails($pdo, $item, $orderId);

    echo "Inserción de detalles de ítems exitosa";

} catch (PDOException $e) {
    echo "Error al insertar detalles de ítems: " . $e->getMessage();
}
```

# EmployeeIMPL.php

## selectAllEmployees

Este método obtiene todos los registros de empleados de la base de datos y devuelve un array de objetos Employee.

### Parámetros

- `$pdo`: Objeto PDO que representa una conexión a la base de datos.

### Retorno

- Un array de objetos Employee, donde cada objeto representa un empleado con sus respectivos atributos.

### Excepciones

- Si ocurre un error al ejecutar la consulta SQL, se captura una excepción de tipo `PDOException` y se imprime un mensaje de error.

### Uso

```php
try {
    $pdo = new PDO(/* configuración de conexión */);
    
    // Llamada al método selectAllEmployees para obtener todos los empleados de la base de datos
    $employees = selectAllEmployees($pdo);

    // $employees ahora contiene un array de objetos Employee

    foreach ($employees as $employee) {
        // Realizar operaciones con cada objeto Employee
        echo "ID: " . $employee->getEmployeeId() . ", Nombre: " . $employee->getEmployeeName();
        // ...
    }

} catch (PDOException $e) {
    echo "Error al seleccionar empleados: " . $e->getMessage();
}
```