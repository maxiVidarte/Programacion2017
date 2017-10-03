<?php
class Archivo{

	public static function Subir()
	{
		//INDICO CUAL SERA EL DESTINO DEL ARCHIVO SUBIDO
		$archivoTmp = $_POST["codigo"]. ".jpg";
		$destino = "FotosProductos/" . $archivoTmp;
		
        $tipoArchivo = pathinfo($_FILES["foto"]["name"], PATHINFO_EXTENSION);

		//VERIFICO EL TAMA�O MAXIMO QUE PERMITO SUBIR
		if ($_FILES["foto"]["size"] > 500000) {
			var_dump("El archivo es demasiado grande. Verifique!!!");
		}

		if (!move_uploaded_file($_FILES["foto"]["tmp_name"], $destino)) 
			var_dump("Ocurrio un error al subir el archivo. No pudo guardarse.");
		else
			var_dump("exitosamente se guardo la foto");
		
	}

	public static function Borrar($path)
	{
		return unlink($path);
	}

	public static function Mover($pathOrigen, $pathDestino)
	{
		return copy($pathOrigen, $pathDestino);
	}
}
?>