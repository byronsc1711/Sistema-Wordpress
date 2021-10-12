<?php

if(isset($_REQUEST['entryid']) && $_REQUEST['entryid']!='') {
  global $wpdb;
  $data = $wpdb->get_row( "SELECT * FROM `wp_crud` WHERE id = '".$_REQUEST['entryid']."'" );
?>
  <div class="wrap wqmain_body">
    <h3 class="wqpage_heading">Editar Contenido</h3>
    <div class="wqform_body">
      <form name="update_form" id="update_form" enctype="multipart/form-data" method="POST">
        <input type="hidden" name="wqentryid" id="wqentryid" value="<?=$_REQUEST['entryid']?>" />
        <div class="wqlabel">Título</div>
        <div class="wqfield">
          <input type="text" class="wqtextfield" name="wqtitle" id="wqtitle" placeholder="Ingrese un título" value="<?=$data->title?>" />
        </div>
        <div id="wqtitle_message" class="wqmessage"></div>

        <div>&nbsp;</div>

        <div class="wqlabel">Descripción</div>
        <div class="wqfield">
          <textarea name="wqdescription" class="wqtextfield" id="wqdescription" placeholder="Ingrese una descripción"><?=$data->description?></textarea>
        </div>
        <div id="wqdescription_message" class="wqmessage"></div>

        <div>&nbsp;</div>

        <div class="wqlabel">Subir Archivos</div>
        <div class="wqfield">
        <input type="file" class="wqtextfield" name="wqmedia"  id="wqmedia" d />
        </div>
        <div id="wqmedia_message" class="wqmessage"></div>

        <div>&nbsp;</div>

        <div><input type="submit" class="wqsubmit_button" id="wqedit" value="Editar" /></div>
        <div>&nbsp;</div>
        <div class="wqsubmit_message"></div>

      </form>
    </div>
  </div>
<?php
} else {
?>
<div class="wrap wqmain_body">
  <h3 class="wqpage_heading">Nuevo Contenido</h3>
  <div class="wqform_body">
    <form name="entry_form" id="entry_form" enctype="multipart/form-data" method="POST">

      <div class="wqlabel">Título</div>
      <div class="wqfield">
        <input type="text" class="wqtextfield" name="wqtitle" id="wqtitle" placeholder="Ingrese un título" value="" />
      </div>
      <div id="wqtitle_message" class="wqmessage"></div>

      <div>&nbsp;</div>

      <div class="wqlabel">Descripción</div>
      <div class="wqfield">
        <textarea name="wqdescription" class="wqtextfield" id="wqdescription" placeholder="Ingrese una descripción"></textarea>
      </div>
      <div id="wqdescription_message" class="wqmessage"></div>

      <div>&nbsp;</div>

      <div class="wqlabel">Subir Archivos</div>
        <div class="wqfield">
        <input type="file" name="wqmedia" class="wqtextfield" id="wqmedia" value="<?=$data->media?>" />
        <div id="wqmedia_message" class="wqmessage"></div>
        </div>

      <div>&nbsp;</div>

      <div><input type="submit" class="wqsubmit_button" id="wqadd" value="Guardar" /></div>
      <div>&nbsp;</div>
      <div class="wqsubmit_message"></div>

    </form>
  </div>
</div>
<?php } ?>
