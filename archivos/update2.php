<?php
require_once 'conexion.php';
if(!empty($_POST["save_record"])) {
	$pdo_statement=$con->prepare("UPDATE crud set titulo='" . $_POST[ 'titulo' ] . "', descripcion='" . $_POST[ 'descripcion' ]. "', cultura='" . $_POST[ 'cultura' ]. "', archivo='" . $_POST[ 'archivo' ]. "' WHERE id=" . $_GET["id"]);
	$result = $pdo_statement->execute();
	if($result) {
		header('location:index.php');
	}
}
$pdo_statement = $con->prepare("SELECT * FROM crud where id=" . $_GET["id"]);
$pdo_statement->execute();
$result = $pdo_statement->fetchAll();
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
				<input type="text" name="titulo" value="<?php echo $result[0]['titulo']; ?>" class="input__text">
			</div>
            Ingrese la Descripción
            <br><br>
            <div class="form-group">
            <textarea type="text" name="descripcion" rows="6" cols="124"><?php echo $result[0]['descripcion']; ?>
                </textarea>
			</div>
            <br>
            Escoja una Opción
            <br><br>
			<div class="form-group">
            <select id="cultura" name="cultura" value="<?php echo $result[0]['cultura']; ?>" class="input__text">
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
            <input type="file" id="archivo" name="archivo" value="<?php echo $result[0]['archivo']; ?>" class="input__text">
			</div>
			<div class="btn__group">
				<a href="index.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="save_record" value="Guardar" class="btn btn__primary">
			</div>
		</form>
	</div>
</body>
</html>
