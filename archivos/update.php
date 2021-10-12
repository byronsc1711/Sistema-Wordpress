<?php
	include_once 'conexion.php';

	if(isset($_GET['id'])){
		$id=(int) $_GET['id'];

		$buscar_id=$con->prepare('SELECT * FROM crud WHERE id=:id LIMIT 1');
		$buscar_id->execute(array(
			':id'=>$id
		));
		$resultado=$buscar_id->fetch();
	}else{
		header('Location: index.php');
	}


	if(isset($_POST['guardar'])){
		$titulo=$_POST['titulo'];
		$descripcion=$_POST['descripcion'];
		$cultura=$_POST['cultura'];
		$archivo=$_POST['archivo'];
		$id=(int) $_GET['id'];

				$consulta_update=$con->prepare('UPDATE crud SET  
					titulo=:titulo,
					descripcion=:descripcion,
					cultura=:cultura,
					archivo=:archivo,
					WHERE id=:id;'
				);
				$consulta_update->execute(array(
					':titulo' =>$titulo,
					':descripcion' =>$descripcion,
					':cultura' =>$cultura,
					':archivo' =>$archivo,
					':id' =>$id
				));
				header('Location: index.php');
	}

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Editar Datos</title>
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
				<input type="text" name="titulo" value="<?php if($resultado) echo $resultado['titulo']; ?>" class="input__text">
			</div>
            Ingrese la Descripción
            <br><br>
            <div class="form-group">
            <textarea type="text" name="descripcion" rows="6" cols="100" class="input__text"><?php if($resultado) echo $resultado['descripcion']; ?>
                </textarea>
			</div>
            Escoja una Opción
            <br><br>
			<div class="form-group">
            <select id="cultura" name="cultura" value="<?php if($resultado) echo $resultado['cultura']; ?>" class="input__text">
            <option value="Nacionalidad Achuar">Nacionalidad Achuar</option>
            <option value="Nacionalidad Andoa">Nacionalidad Andoa</option>
            <option value="Nacionalid Adawa">Nacionalidad Awá</option>
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
            <input type="file" id="archivo" name="archivo" value="<?php if($resultado) echo $resultado['archivo']; ?>" class="input__text">
			</div>
			<div class="btn__group">
				<a href="index.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
			</div>
		</form>
	</div>
</body>
</html>