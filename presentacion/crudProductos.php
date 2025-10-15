<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    require_once 'logica/Producto.php';

    $idProducto = $_POST["idProducto"];
    $Nombre = $_POST["Nombre"];
    $Tamanio = $_POST["Tamanio"];
    $PrecioVenta = $_POST["PrecioVenta"];
    $Imagen = $_POST["Imagen"];
    $Proveedor = $_POST["Proveedor"];
    $TipoProducto = $_POST["TipoProducto"];

    $producto = new Producto("", "Tequila", "750ml", 300, "tequila.jpg", 1, 1);
    $producto->InsertarProducto();
    ?>
    <div class="card text-start">
        <div
            class="card text-white bg-primary"
        >
            <img class="card-img-top" src="holder.js/100px180/" alt="Title" />
            <div class="card-body">
                <h4 class="card-title">Productos</h4>
                <table>
                    <tr>
                        <th>ID Producto</th>
                        <th>Nombre</th>
                        <th>Tamaño</th>
                        <th>Precio de venta</th>
                        <th>Imagen</th>
                        <th>ID Proveedor</th>
                        <th>ID Tipo de producto</th>
                    </tr>
                    <?php
                    $productos = $producto->Mostrar();
                    foreach ($productos as $prod) {
                        echo "<tr>";
                        echo "<td>" . $prod->getIdProducto() . "</td>";
                        echo "<td>" . $prod->getNombre() . "</td>";
                        echo "<td>" . $prod->getTamanio() . "</td>";
                        echo "<td>" . $prod->getPrecioVenta() . "</td>";
                        echo "<td>" . $prod->getImagen() . "</td>";
                        echo "<td>" . $prod->getProveedor() . "</td>";
                        echo "<td>" . $prod->getTipoProducto() . "</td>";
                        echo "</tr>";
                    }
                    ?>
                </table>
            </div>
        </div>
        
        <div class="card-body">
            <h4 class="card-title">Inserte producto</h4>
            <p class="card-text">
                <form action="">
                    <input type="text" name="idProducto" id="idProducto" placeholder="ID Producto"><br>
                    <input type="text" name="Nombre" id="Nombre" placeholder="Nombre"><br>
                    <input type="text" name="Tamanio" id="Tamanio" placeholder="Tamaño"><br>
                    <input type="text" name="PrecioVenta" id="PrecioVenta" placeholder="Precio de venta"><br>
                    <input type="text" name="Imagen" id="Imagen" placeholder="Imagen"><br>
                    <input type="text" name="Proveedor" id="Proveedor" placeholder="ID Proveedor"><br>
                    <input type="text" name="TipoProducto" id="TipoProducto" placeholder="ID Tipo de producto"><br>
                    <input type="submit" value="Insertar">
                </form>
            </p>
        </div>
    </div>

</body>

</html>