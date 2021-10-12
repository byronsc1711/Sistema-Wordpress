<?php
require_once 'conexion.php';
if(!empty($_POST["save_record"])) {
	$pdo_statement=$con->prepare("UPDATE crud3 set titulo='" . $_POST[ 'titulo' ] . "', descripcion='" . $_POST[ 'descripcion' ]. "', cultura='" . $_POST[ 'cultura' ]. "' WHERE id=" . $_GET["id"]);
	$result = $pdo_statement->execute();
	if($result) {
		header('location:index.php');
	}
}
$pdo_statement = $con->prepare("SELECT * FROM crud3 where id=" . $_GET["id"]);
$pdo_statement->execute();
$result = $pdo_statement->fetchAll();

//ingreso de archivos
if (($_FILES['my_file']['name']!="")){
    // Cuando se reconocen los archivos
        $target_dir = "archivos/";
        $file = $_FILES['my_file']['name'];
        $path = pathinfo($file);
        $filename = $path['filename'];
        $ext = $path['extension'];
        $temp_name = $_FILES['my_file']['tmp_name'];
        $path_filename_ext = $target_dir.$filename.".".$ext;
     
    // Revisar si existen datos
    if (file_exists($path_filename_ext)) {
     echo "Sorry, file already exists.";
     }else{
     move_uploaded_file($temp_name,$path_filename_ext);
     
     }
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
		<h1>GESTOR DE ARCHIVOS</h1>
        <br><br>
		<form name="form" method="post" enctype="multipart/form-data">
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
            <input type="file" id="my_file" name="my_file" value="<?php echo $result[0]['my_file']; ?>" class="input__text">
			</div>
			<div class="btn__group">
				<a href="index.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="save_record" value="Guardar" class="btn btn__primary">
			</div>
		</form>
	</div>
</body>
</html>
