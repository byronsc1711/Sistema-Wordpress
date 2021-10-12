<?php 
	include_once 'conexion.php';
	
	if(isset($_POST['guardar'])){
		$titulo=$_POST['titulo'];
		$descripcion=$_POST['descripcion'];
		$cultura=$_POST['cultura'];
		$archivo=$_POST['archivo'];

		if(!empty($titulo) && !empty($descripcion) && !empty($cultura) && !empty($archivo)){
				$consulta_insert=$con->prepare('INSERT INTO crud(titulo,descripcion,cultura,archivo) VALUES(:titulo,:descripcion,:cultura,:archivo)');
				$consulta_insert->execute(array(
					':titulo' =>$titulo,
					':descripcion' =>$descripcion,
					':cultura' =>$cultura,
					':archivo' =>$archivo
				));
				header('Location: index.php');
		}else{
			echo "<script> alert('Los campos estan vacios');</script>";
		}

	}


?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Nuevo Dato</title>
	<link rel="stylesheet" href="css/estilo.css">
</head>
<body>
	<div class="contenedor">
		<h1>CRUD DE ARCHIVOS</h1>
        <br><br>
		<form action="" method="post">
        Ingrese el Título
        <br><br>
			<div class="form-group">
				<input type="text" name="titulo" id="titulo" class="input__text">
			</div>
            Ingrese la Descripción
            <br><br>
            <div class="form-group">
				<textarea type="text" name="descripcion" rows="6" cols="100" id="descripcion" class="input__text" placeholder="Ingrese la descripción">
                </textarea>
			</div>
            Escoja una Opción
            <br><br>
			<div class="form-group">
            <select id="cultura" name="cultura" class="input__text">
            <option value="Nacionalidad Achuar">Nacionalidad Achuar</option>
            <option value="Nacionalidad Andoa">Nacionalidad Andoa</option>
            <option value="Nacionalidad Awá">Nacionalidad Awá</option>
            <option value="Nacionalidad Chachi">Nacionalidad Chachi</option>
            <option value="Nacionalidad Cofán">Nacionalidad Cofán</option>
            <option value="Nacionalidad Éperara Siapidara">Nacionalidad Éperara Siapidara</option>
            <option value="Nacionalidad Kichwa">Nacionalidad Kichwa</option>
            <option value="Nacionalidad Sápara">Nacionalidad Sápara</option>
            <option value="Nacionalidad Sekoya">Nacionalidad Sekoya</option>
            <option value="Nacionalidad Shiwiar">Nacionalidad Shiwiar</option>
            <option value="Nacionalidad Shuar">Nacionalidad Shuar</option>
            <option value="Nacionalidad Siona">Nacionalidad Siona</option>
            <option value="Nacionalidad Tsáchila">Nacionalidad Tsáchila</option>
            <option value="Nacionalidad Waorani">Nacionalidad Waorani</option>
            <option value="Pueblo Afroecuatoriano">Pueblo Afroecuatoriano</option>
            <option value="Pueblo Huancavilca">Pueblo Huancavilca</option>
            <option value="Pueblo Manta">Pueblo Manta</option>
            <option value="Pueblo Montuvio">Pueblo Montuvios</option>
        </select>
			</div>
            Ingrese los Archivos
            <br><br>
			<div class="form-group">
            <input type="file" id="archivo" name="archivo" class="input__text">
			</div>
            <br><br>
			<div class="btn__group">
				<a href="index.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
			</div>
		</form>
	</div>
</body>
</html>
