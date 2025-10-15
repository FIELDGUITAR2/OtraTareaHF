<?php

class Conexion{
    private $conexion;
    private $resultado;
    
    public function abrir(){
        if($_SERVER['REMOTE_ADDR'] == "::1"){
            $this -> conexion = new mysqli("localhost", "root", "", "cocina_etilica");
        }else{
            $this -> conexion = new mysqli("localhost", "itiud_cocinaetilica", "UXpieQ728%", "itiud_cocinaetilica");
        }
    }
    
    public function cerrar(){
        $this -> conexion -> close();
    }
    
    public function ejecutar($sentencia){
        $this -> resultado = $this -> conexion -> query($sentencia);
    }
    
    public function registro(){
        return $this -> resultado -> fetch_row();
    }
    
    public function filas(){
        return $this -> resultado -> num_rows;
    }
    

    /**
     * Get the value of resultado
     */ 
    public function getResultado()
    {
        return $this->resultado;
    }

    /**
     * Set the value of resultado
     *
     * @return  self
     */ 
    public function setResultado($resultado)
    {
        $this->resultado = $resultado;

        return $this;
    }
}


?>