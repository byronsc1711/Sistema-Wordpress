<?php
global $wpdb;

$info = "{$wpdb->prefix}datoss";

if(isset($_POST['btnguardar'])){
    $titulo = $_POST['txtitulo'];
    $descripcion = $_POST['txdescripcion'];
    $cultura = $_POST['txcultura'];
    $archivo = $_POST['txarchivo'];
    $query = "SELECT id FROM $info ORDER BY id DESC limit 1";
    $resultado = $wpdb->get_results($query,ARRAY_A);
    $proximoId = $resultado[0]['id'];

    $datos = [
        'id' => null,
        'titulo' =>  $titulo,
        'descripcion' => $descripcion,
        'cultura' => $cultura,
        'archivo' => $archivo
    ];

    $wpdb->insert($info,$datos);
}


$query = "SELECT * FROM $info";
$lista_datos = $wpdb->get_results($query,ARRAY_A);
if(empty($lista_datos)){
    $lista_datos = array();
}

?>
<div class="wrap">
<?php
    echo "<h1 class='wp/heading-inline'>" . get_admin_page_title() . "</h1>";
    ?>
    <br><br>
    <a id="btnnuevo" class="page-title-action">Añadir Nuevo</a>
    <br><br><br>
    <table class="wp-list-table widefat fixed striped pages">
    <thead>
    <th>Título</th>
    <th>Descripción</th>
    <th>Nacionalidad o Pueblo</th>
    <th>Contenido</th>
    <th>Acciones</th>
    </thead>

    <tbody id="the-list">
    <?php
    foreach($lista_datos as $key => $value){
        $titulo = $value['titulo'];
        $descripcion = $value['descripcion'];
        $cultura = $value['cultura'];
        $archivo = $value['archivo'];
        echo "
    <tr>
    <td>$titulo</td>
    <td>$descripcion</td>
    <td>$cultura</td>
    <td>$archivo</td>
    <td>
    <a class='page-title-action'>Editar</a>
    <a class='page-title-action'>Borrar</a>
    </td>

    </tr>
    ";
    }

    ?>
    </tbody>

    </table>

</div>

<div class="modal" id="modalnuevo" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">INGRESAR DATOS</h5>
      </div>

      <form method="POST">
      <div class="modal-body">
        
        <div class="form-group">
        <label for="txtitulo" class="col-sm-4 col-form-label" style="width:100%">Ingrese el Título</label>
        <div class="col-sm-12">
        <input type="text" id="txtitulo" name="txtitulo" style="width:100%">
        </div>
        <br>
        <label for="txdescripcion" class="col-sm-8 col-form-label" style="width:100%">Ingrese la Descripción</label>
        <div class="col-sm-12">
        <textarea id="txdescripcion" name="txdescripcion" style="width:100%"></textarea>
        </div>
        <br>
        <label for="txcultura" class="col-sm-10 col-form-label" style="width:100%">Ingrese la Nacionalidad o Pueblo</label>
        <div class="col-sm-12">
        <select id="txcultura" name="txcultura">
        <option value="achuar">Nacionalidad Achuar</option>
        <option value="andoa">Nacionalidad Andoa</option>
        <option value="awa">Nacionalidad Awá</option>
        <option value="chachi">Nacionalidad Chachi</option>
        <option value="cofan">Nacionalidad Cofán</option>
        <option value="eperara">Nacionalidad Éperara Siapidara</option>
        <option value="kicha">Nacionalidad Kichwa</option>
        <option value="sapara">Nacionalidad Sápara</option>
        <option value="sekoya">Nacionalidad Sekoya</option>
        <option value="shiwiar">Nacionalidad Shiwiar</option>
        <option value="shuar">Nacionalidad Shuar</option>
        <option value="siona">Nacionalidad Siona</option>
        <option value="sachila">Nacionalidad Tsáchila</option>
        <option value="waorani">Nacionalidad Waorani</option>
        <option value="afro">Pueblo Afroecuatoriano</option>
        <option value="huanca">Pueblo Huancavilca</option>
        <option value="manta">Pueblo Manta</option>
        <option value="montubio">Pueblo Montuvios</option>
        </select>
        </div>
        <br>
        <label for="txarchivo" class="col-sm-12 col-form-label">Ingrese los archivos</label>
        <div class="col-sm-12">
        <input type="file" id="txarchivo" name="txarchivo" style="width:100%">
        </div>
        </div>

      </div>

      <div class="modal-footer">
      <button type="button" class="btn btn-primary" name="btnguardar" id="btnguardar">Guardar</button>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
      </div>
      </form>

    </div>
  </div>
</div>

