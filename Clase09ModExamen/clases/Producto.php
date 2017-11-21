
<?php 

class Producto{
    
    public $id;
    public $nombre;
    public $precio;
    public $stock;

    public function InsertarElProductoParametros()
    {
               $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
               $consulta =$objetoAccesoDato->RetornarConsulta("INSERT into productos (nombre,precio,stock)values(:nombre,:precio,:stock)");
               $consulta->bindValue(':nombre',$this->nombre, PDO::PARAM_STR);
               $consulta->bindValue(':precio', $this->precio, PDO::PARAM_INT);
               $consulta->bindValue(':stock', $this->stock, PDO::PARAM_INT);
               $consulta->execute();		
               return $objetoAccesoDato->RetornarUltimoIdInsertado();
    }

    public function GuardarProducto()
    {

        if($this->id>0)
            {
                $this->ModificarProductoParametros();
            }else {
                $this->InsertarElProductoParametros();
            }

    }


}

?>