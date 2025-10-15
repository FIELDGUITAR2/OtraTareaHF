<?php

    require_once 'persistencia/ProductoDAO.php';
    require_once 'logica/Conexion.php';

class Producto{


    private $idProducto;
    private $Nombre;
    private $Tamanio;
    private $PrecioVenta;
    private $Imagen;
    private $Proveedor;
    private $TipoProducto;

    public function __construct($idProducto = "", 
    $Nombre = "", 
    $Tamanio = "", 
    $PrecioVenta = "", 
    $Imagen = "", 
    $Proveedor = "", 
    $TipoProducto = "") {
        $this->idProducto = $idProducto;
        $this->Nombre = $Nombre;
        $this->Tamanio = $Tamanio;
        $this->PrecioVenta = $PrecioVenta;
        $this->Imagen = $Imagen;
        $this->Proveedor = $Proveedor;
        $this->TipoProducto = $TipoProducto;
    }

    /**
     * Get the value of idProducto
     */ 
    public function getIdProducto()
    {
        return $this->idProducto;
    }

    /**
     * Set the value of idProducto
     *
     * @return  self
     */ 
    public function setIdProducto($idProducto)
    {
        $this->idProducto = $idProducto;

        return $this;
    }

    /**
     * Get the value of Nombre
     */ 
    public function getNombre()
    {
        return $this->Nombre;
    }

    /**
     * Set the value of Nombre
     *
     * @return  self
     */ 
    public function setNombre($Nombre)
    {
        $this->Nombre = $Nombre;

        return $this;
    }

    /**
     * Get the value of Tamanio
     */ 
    public function getTamanio()
    {
        return $this->Tamanio;
    }

    /**
     * Set the value of Tamanio
     *
     * @return  self
     */ 
    public function setTamanio($Tamanio)
    {
        $this->Tamanio = $Tamanio;

        return $this;
    }

    /**
     * Get the value of PrecioVenta
     */ 
    public function getPrecioVenta()
    {
        return $this->PrecioVenta;
    }

    /**
     * Set the value of PrecioVenta
     *
     * @return  self
     */ 
    public function setPrecioVenta($PrecioVenta)
    {
        $this->PrecioVenta = $PrecioVenta;

        return $this;
    }

    /**
     * Get the value of Imagen
     */ 
    public function getImagen()
    {
        return $this->Imagen;
    }

    /**
     * Set the value of Imagen
     *
     * @return  self
     */ 
    public function setImagen($Imagen)
    {
        $this->Imagen = $Imagen;

        return $this;
    }

    /**
     * Get the value of Proveedor
     */ 
    public function getProveedor()
    {
        return $this->Proveedor;
    }

    /**
     * Set the value of Proveedor
     *
     * @return  self
     */ 
    public function setProveedor($Proveedor)
    {
        $this->Proveedor = $Proveedor;

        return $this;
    }

    /**
     * Get the value of TipoProducto
     */ 
    public function getTipoProducto()
    {
        return $this->TipoProducto;
    }

    /**
     * Set the value of TipoProducto
     *
     * @return  self
     */ 
    public function setTipoProducto($TipoProducto)
    {
        $this->TipoProducto = $TipoProducto;

        return $this;
    }

    public function InsertarProducto(){
        $conexion = new Conexion();
        $productoDAO = new ProductoDAO($this->idProducto, $this->Nombre, $this->Tamanio, $this->PrecioVenta, $this->Imagen, $this->Proveedor, $this->TipoProducto);
        $conexion->abrir();
        $conexion->ejecutar($productoDAO->Insertar());    
        $conexion->cerrar();
    }

    public function Mostrar(){
        $conexion = new Conexion();
        $productoDAO = new ProductoDAO($this->idProducto, $this->Nombre, $this->Tamanio, $this->PrecioVenta, $this->Imagen, $this->Proveedor, $this->TipoProducto);
        $conexion->abrir();
        $conexion->ejecutar($productoDAO->Mostrar());
        $productos = $conexion->getResultado();
        $productos = array();
        foreach($conexion->registro() as $prod){
            array_push($productos, new Producto($prod[0], $prod[1], $prod[2], $prod[3], $prod[4], $prod[5], $prod[6]));
        }
        $conexion->cerrar();
        return $productos;
    }
}

?>