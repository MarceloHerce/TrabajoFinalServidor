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

### Parámetros

- `json`: Un objeto JSON que contiene la información del producto, como `price`, `title`, `category`, `image`, y `id`.

### Acciones Realizadas

1. Selecciona el contenedor HTML con la clase `.container`.
2. Crea elementos HTML dinámicamente para representar la tarjeta de producto, incluyendo un contenedor `<div>`, dos elementos `<p>` para mostrar el precio y el título, dos botones `<button>` (uno para la categoría y otro para agregar al carrito), y una imagen `<img>` para mostrar la imagen del producto.
3. Configura los contenidos y atributos de los elementos HTML según la información proporcionada en el objeto JSON.
4. Añade event listeners para redirigir a los usuarios a la página del producto cuando hacen clic en la tarjeta y para agregar el producto al carrito cuando hacen clic en el botón correspondiente.
5. Agrega la tarjeta creada al contenedor principal con la clase `.container`.
6. Aplica la clase CSS `pCard` al contenedor para aplicar estilos específicos.

### Uso

```javascript
// Ejemplo de uso:
const producto = {
  id: 1,
  title: 'Producto de Ejemplo',
  price: 19.99,
  category: 'Electrónicos',
  image: 'ruta/imagen.png'
};

createCard(producto);
```
<br>

## Método createBtn

Este método se encarga de crear dinámicamente botones de categorías en el DOM basados en la información proporcionada en un array de objetos JSON.

### Parámetros

- `json`: Un array de objetos JSON que contiene información sobre cada categoría.

### Acciones Realizadas

1. Selecciona el contenedor HTML con el id `#categories`.
2. Crea un botón especial llamado "All categories" que, al hacer clic, restablece el contenido del contenedor y carga todos los productos.
3. Crea botones individuales para cada categoría presente en el array JSON.
4. Configura atributos y contenidos de los botones según la información proporcionada en los objetos JSON.
5. Añade event listeners a cada botón para realizar acciones específicas cuando se hace clic.
6. Agrega los botones al contenedor con el id `#categories`.

### Uso

```javascript
// Ejemplo de uso:
const categorias = ['Electrónicos', 'Ropa', 'Joyería', 'Hogar'];

createBtn(categorias);
```

<br>

## Función resetContainer

Esta función se encarga de resetear el contenido del contenedor de productos en el DOM.

### Acciones Realizadas

1. Selecciona el contenedor HTML con la clase `.container`.
2. Vacía el contenido del contenedor, eliminando todos los elementos hijos presentes.
3. Para que las cartas de los productos no se repitan al pulsar los botones de las categorias.

### Uso

```javascript
// Ejemplo de uso:
resetContainer();
createCard(producto);
```

<br>

## Lógica de Verificación de Sesión

Esta lógica verifica si existe una sesión activa almacenada en sessionStorage antes de realizar ciertas acciones en la interfaz de usuario.

### Acciones Realizadas
1. Verifica si existe un valor no nulo en sessionStorage con la clave "login".
2. Si hay una sesión activa:
   - Invoca la función `getAllCategories()` para obtener y mostrar todas las categorías disponibles.
   - Obtiene referencias a elementos del DOM, como el contenedor de productos, el elemento con id "userF", el botón de cierre de sesión, y otros elementos relacionados.
   - Ajusta estilos en el elemento con id "userF" para cambiar su visualización, permitiendo flexibilidad en su diseño.
   - Muestra el botón de cierre de sesión ("logout") y oculta los formularios relacionados con la autenticación.
   - Muestra el botón para crear un nuevo producto ("createProductBtn").
   - Verifica si el contenedor de productos está vacío antes de llamar a la función `getAllProducts()` para obtener y mostrar todos los productos. También se comenta una posible llamada a `getAllProductsLocalStorage()` que está actualmente comentada.
   - Se asume que existen elementos con los ids "logout", "forms", y "createProduct" en el DOM.

### Uso
```javascript
// Ejemplo de uso (dentro de un contexto de autenticación):
if (sessionStorage.getItem("login") !== null) {
    // ... Código de verificación de sesión aquí ...
}
```

<br>

## Manejo de Envío de Datos del Formulario de Inicio de Sesión

Este bloque de código se encarga de manejar el evento de envío (submit) del formulario de inicio de sesión (`loginForm`). Al recibir este evento, obtiene los valores del nombre de usuario (`username`) y la contraseña (`password`) desde los campos del formulario y los utiliza para verificar la autenticación del usuario.

### Acciones Realizadas
1. Añade un event listener al formulario de inicio de sesión (`loginForm`) que se activa cuando se envía el formulario.
2. Dentro del event listener, obtiene los valores de los campos de nombre de usuario (`username`) y contraseña (`password`) del formulario.
3. Llama a la función `verifyUser` pasando el nombre de usuario y la contraseña obtenidos como parámetros.
4. Maneja la promesa devuelta por `verifyUser` utilizando `then` y `catch`:
   - Si la autenticación es exitosa, puede realizar acciones adicionales como recargar la página (`// location.reload();`).
   - Si hay un error durante la autenticación, muestra el error en la consola.

### Uso
```javascript
// Ejemplo de uso:
loginForm.addEventListener('submit', () => {
    // ... Código de manejo de envío del formulario de inicio de sesión ...
});
```
<br>

## Manejo de Envío de Datos del Formulario de Registro

Este bloque de código se encarga de manejar el evento de envío (submit) del formulario de registro (`registerForm`). Al recibir este evento, obtiene los valores de varios campos del formulario, crea un objeto `user` con esta información y lo utiliza para registrar un nuevo usuario.

### Acciones Realizadas
1. Añade un event listener al formulario de registro (`registerForm`) que se activa cuando se envía el formulario.
2. Dentro del event listener, utiliza `event.preventDefault()` para evitar que el formulario se envíe por defecto y cause una recarga de la página.
3. Obtiene los valores de varios campos del formulario, como el correo electrónico, nombre de usuario, contraseña, nombre, dirección, código postal, teléfono, etc.
4. Crea un objeto `user` utilizando los datos obtenidos del formulario.
5. Verifica si ya existe un usuario con el mismo nombre de usuario utilizando la función `usernameExists`.
6. Si el nombre de usuario no existe, llama a la función `putUser` para registrar el nuevo usuario y obtiene el ID del usuario registrado.
7. Almacena el objeto `user` en el localStorage utilizando el ID del usuario como clave (`localStorage.setItem("user"+user.id,JSON.stringify(user))`).

### Uso
```javascript
// Ejemplo de uso:
registerForm.addEventListener('submit', async function(event) {
    // ... Código de manejo de envío del formulario de registro ...
});
```

<br>

## Función putUser

Esta función realiza una solicitud POST a la URL 'https://fakestoreapi.com/users' para agregar un nuevo usuario utilizando la información proporcionada en el objeto `user`.

### Parámetros
- `user`: Un objeto que contiene la información del usuario, como el correo electrónico, nombre de usuario, contraseña, nombre, dirección, código postal, teléfono, etc.

### Acciones Realizadas
1. Utiliza la función `fetch` para realizar una solicitud POST a la URL 'https://fakestoreapi.com/users'.
2. Configura el cuerpo de la solicitud con la información del usuario en formato JSON utilizando `JSON.stringify(user)`.
3. Maneja la respuesta de la solicitud utilizando `then` y `res.json()` para convertir la respuesta a formato JSON.
4. Devuelve la respuesta en formato JSON.
5. Maneja cualquier error que ocurra durante la solicitud utilizando `catch` para mostrar un mensaje de error en la consola.

### Uso
```javascript
// Ejemplo de uso:
const nuevoUsuario = {
  // ... Proporciona la información del nuevo usuario ...
};

putUser(nuevoUsuario)
  .then(res => console.log(res))
  .catch(error => console.error("Error al añadir usuario: " + error));
```

<br>

## Función getAllUsers

Esta función realiza una solicitud GET a la URL 'https://fakestoreapi.com/users' para obtener la lista completa de usuarios registrados en la API.

### Acciones Realizadas
1. Utiliza `fetch` junto con `await` para realizar una solicitud GET a la URL 'https://fakestoreapi.com/users'.
2. Maneja la respuesta de la solicitud utilizando `await response.json()` para convertir la respuesta a formato JSON.
3. Devuelve la lista completa de usuarios.

### Uso
```javascript
// Ejemplo de uso:
try {
  const listaUsuarios = await getAllUsers();
  console.log(listaUsuarios);
} catch (error) {
  console.error("Error obteniendo usuarios:", error);
}
```
<br>

## Función verifyUser

Esta función verifica la autenticación de un usuario comparando el nombre de usuario (`username`) y la contraseña (`password`) proporcionados con la información de usuarios almacenada tanto en la API como en el localStorage. También realiza acciones como iniciar sesión y recargar la página en caso de autenticación exitosa.

### Parámetros
- `username`: El nombre de usuario proporcionado para la autenticación.
- `password`: La contraseña proporcionada para la autenticación.

### Acciones Realizadas
1. Utiliza la función `getAllUsers` para obtener la lista completa de usuarios desde la API.
2. Verifica la autenticidad del usuario comparando el nombre de usuario y la contraseña con los usuarios de la API y del localStorage.
3. Si encuentra un usuario válido en la API:
   - Llama a la función `login` con la información del usuario autenticado.
   - Recarga la página (`location.reload()`).
   - Retorna `true`.
4. Si encuentra un usuario válido en el localStorage pero no en la API, realiza acciones similares a las del punto 3.
5. Si no encuentra un usuario válido, muestra un mensaje de error en la consola y retorna `false`.
6. Maneja cualquier error que pueda ocurrir durante la verificación y almacenamiento de usuario. En caso de error, redirige a la página de error y retorna `false`.

### Uso
```javascript
// Ejemplo de uso:
try {
  const autenticado = await verifyUser('nombreUsuario', 'contraseñaUsuario');
  console.log(autenticado);
} catch (error) {
  console.error("Error al verificar y almacenar usuario:", error);
  // Manejar el error según sea necesario
}
```

## Función login

Esta función se encarga de realizar el proceso de inicio de sesión para un usuario autenticado. Almacena información relevante en sessionStorage, incluyendo el estado de inicio de sesión (`login`), los detalles del usuario (`user`), y un carrito de compras inicializado (`cart`).

### Parámetros
- `user`: Un objeto que contiene la información del usuario autenticado.

### Acciones Realizadas
1. Utiliza `sessionStorage.setItem` para establecer la variable de estado de inicio de sesión (`login`) en `true`.
2. Almacena la información del usuario (`user`) en formato JSON en sessionStorage.
3. Inicializa un carrito de compras vacío y lo almacena en sessionStorage. El carrito de compras incluye el ID del usuario, la fecha actual y una lista de productos vacía.

### Uso
```javascript
// Ejemplo de uso:
const usuarioAutenticado = {
  // ... Proporciona la información del usuario autenticado ...
};

login(usuarioAutenticado);
```

<br>

## Función usernameExists

Esta función verifica si un nombre de usuario ya está en uso, tanto en la API como en el localStorage.

### Parámetros
- `username`: El nombre de usuario que se desea verificar.

### Acciones Realizadas
1. Utiliza la función `getAllUsers` para obtener la lista completa de usuarios desde la API.
2. Verifica la existencia del nombre de usuario en la API y en el localStorage.
3. Si encuentra el nombre de usuario en la API o en el localStorage, muestra un mensaje de que el nombre de usuario está en uso y retorna `false`.
4. Si no encuentra el nombre de usuario en ninguno de los lugares, muestra un mensaje de éxito en la consola y retorna `true`.
5. Maneja cualquier error que pueda ocurrir durante la verificación del nombre de usuario. En caso de error, muestra un mensaje de error en la consola y retorna `false`.

### Uso
```javascript
// Ejemplo de uso:
try {
  const existeNombreUsuario = await usernameExists('nombreUsuario');
  console.log(existeNombreUsuario);
} catch (error) {
  console.error("Error al verificar nombre de usuario:", error);
  // Manejar el error según sea necesario
}
```

<br>

## Función getUserMaxId

Esta función se encarga de obtener el máximo ID de usuario existente en el localStorage, para asignar un nuevo ID único al próximo usuario registrado.

### Acciones Realizadas
1. Inicializa la variable `maxId` con un valor predeterminado de 11.
2. Utiliza la función `getKeysByPattern("user")` para obtener todas las claves en el localStorage que sigan el patrón "user".
3. Itera sobre las claves y verifica si el ID extraído de cada clave es mayor o igual al valor actual de `maxId`.
4. Si se encuentra un ID mayor o igual, actualiza `maxId` al valor del ID más uno.
5. Retorna el valor final de `maxId`, que ahora es el máximo ID disponible para un nuevo usuario.

### Uso
```javascript
// Ejemplo de uso:
const nuevoIdUsuario = getUserMaxId();
console.log(nuevoIdUsuario);
```

<br>

## Función getKeysByPattern

Esta función se encarga de encontrar las claves en el localStorage que coinciden con un patrón especificado.

### Parámetros
- `pattern`: El patrón que se utilizará para filtrar las claves.

### Acciones Realizadas
1. Utiliza `Object.keys(localStorage)` para obtener todas las claves presentes en el localStorage.
2. Filtra las claves utilizando `Array.filter` y el método `startsWith` para seleccionar solo aquellas que comienzan con el patrón especificado.
3. Retorna un array con las claves que coinciden con el patrón.

### Uso
```javascript
// Ejemplo de uso:
const clavesCoincidentes = getKeysByPattern('user');
console.log(clavesCoincidentes);
```

<br>

## Función getValuesByPattern

Esta función utiliza la función `getKeysByPattern` para encontrar las claves en el localStorage que coinciden con un patrón especificado y luego obtiene los valores correspondientes a esas claves.

### Parámetros
- `pattern`: El patrón que se utilizará para filtrar las claves.

### Acciones Realizadas
1. Utiliza la función `getKeysByPattern` para obtener las claves en el localStorage que coinciden con el patrón especificado.
2. Utiliza `Array.map` para iterar sobre las claves y obtener los valores asociados a esas claves en el localStorage.
3. Si un valor se encuentra en el localStorage, se convierte de JSON a un objeto. Si no se encuentra, se devuelve `null`.
4. Retorna un array con los valores obtenidos.

### Uso
```javascript
// Ejemplo de uso:
const valoresCoincidentes = getValuesByPattern('user');
console.log(valoresCoincidentes);
```

<br>

## Función verifyProductLocalStorage

Esta función verifica si la información de un producto proveniente de la API existe en el localStorage. Si el producto no está presente, se devuelve directamente; de lo contrario, se devuelve la información del producto almacenada en el localStorage.

### Parámetros
- `product`: Un objeto que representa la información de un producto proveniente de la API.

### Acciones Realizadas
1. Utiliza `localStorage.getItem` para obtener la información asociada a la clave "product" concatenada con el ID del producto en el localStorage.
2. Verifica si el resultado es `null`, lo que indica que el producto no está en el localStorage.
    - Si no está en el localStorage, muestra un mensaje en la consola indicando que no está presente y devuelve el producto original.
3. Si la información del producto está presente en el localStorage:
    - Verifica si el método de almacenamiento es "delete". Si es así, muestra un mensaje indicando que el producto ha sido eliminado.
    - Si no es un método de eliminación, devuelve la información del producto almacenada en el localStorage.

### Uso
```javascript
// Ejemplo de uso:
const productoDesdeAPI = {
  // ... Proporciona la información del producto desde la API ...
};

const productoVerificado = verifyProductLocalStorage(productoDesdeAPI);
console.log(productoVerificado);
```

<br>

## Función getAllProducts

Esta función realiza una solicitud GET a la URL 'https://fakestoreapi.com/products' para obtener la lista completa de productos desde la API. Luego, itera sobre la lista, utiliza la función `verifyProductLocalStorage` para verificar la existencia de cada producto en el localStorage y crea tarjetas (`createCard`) para mostrar los productos en la interfaz.

### Acciones Realizadas
1. Utiliza `fetch` junto con `await` para realizar una solicitud GET a la URL 'https://fakestoreapi.com/products'.
2. Maneja la respuesta de la solicitud utilizando `await response.json()` para convertir la respuesta a formato JSON.
3. Itera sobre la lista de productos y utiliza la función `verifyProductLocalStorage` para verificar y obtener la información de cada producto.
4. Llama a la función `createCard` para crear tarjetas de visualización de productos en la interfaz.
5. Llama a `getAllProductsLocalStorage` para obtener y mostrar productos almacenados localmente.
6. Retorna la lista completa de productos desde la API.

### Uso
```javascript
// Ejemplo de uso:
try {
  const listaProductos = await getAllProducts();
  console.log(listaProductos);
} catch (error) {
  console.error("Error obteniendo productos:", error);
  // Manejar el error según sea necesario
}
```