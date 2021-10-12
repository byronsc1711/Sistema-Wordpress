<?php
	include_once 'conexion.php';

	$sentencia_select=$con->prepare('SELECT *FROM crud3 ORDER BY id ASC');
	$sentencia_select->execute();
	$resultado=$sentencia_select->fetchAll();

	// metodo buscar
	if(isset($_POST['btn_buscar'])){
		$buscar_text=$_POST['buscar'];
		$select_buscar=$con->prepare('
			SELECT *FROM crud3 WHERE titulo LIKE :campo OR cultura LIKE :campo;'
		);

		$select_buscar->execute(array(
			':campo' =>"%".$buscar_text."%"
		));

		$resultado=$select_buscar->fetchAll();

	}

?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Inicio</title>
	<link rel="stylesheet" href="css/estilo.css">
</head>
<body>
	<div class="contenedor">
		<h1>GESTOR DE ARCHIVOS</h1>
		<div class="barra__buscador">
			<form action="" class="formulario" method="post">
				<input type="text" name="buscar" placeholder="buscar por título o nacionalidad" 
				value="<?php if(isset($buscar_text)) echo $buscar_text; ?>" class="input__text">
				<input type="submit" class="btn" name="btn_buscar" value="Buscar">
				<a href="insert.php" class="btn btn__nuevo">AGREGAR NUEVO</a>
			</form>
		</div>
        <br>
		<table>
			<tr class="head">
				<td>ID</td>
				<td>TÍTULO</td>
				<td>DESCRIPCIÓN</td>
				<td>NACIONALIDAD O PUEBLO</td>
				<td colspan="2">ACCIONES</td>
			</tr>
			<?php foreach($resultado as $fila):?>
				<tr >
					<td><?php echo $fila['id']; ?></td>
					<td><?php echo $fila['titulo']; ?></td>
					<td><?php echo $fila['descripcion']; ?></td>
					<td><?php echo $fila['cultura']; ?></td>
					<td><a href="update2.php?id=<?php echo $fila['id']; ?>"  class="btn__update" >Editar</a></td>
					<td><a href="delete.php?id=<?php echo $fila['id']; ?>" class="btn__delete">Eliminar</a></td>
				</tr>
			<?php endforeach ?>

		</table>
	</div>
</body>
</html>