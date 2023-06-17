<?php
ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);
$cliente = "http://localhost/xampp/var/www/html/php/muerte-x2/apirest/controles/cliente.php?op=GetAll";
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $cliente);
curl_setopt($curl, CURLOPT_RETURNTRANSFER,1);
$idCliente = json_decode(curl_exec($curl));
?>
<div>
    <div class="card-header">
      <h3 class="card-title">Añadir Obra</h3>
    </div>
    <form action="" method="post">
        <div class="card-body">
          <div class="form-group">
            <label for="obra">Nombre Obra</label>
            <input type="text" class="form-control" id="obra" placeholder="Enter Nombre Obra" name="obra">
          </div>
          <div class="form-group">
            <label for="constructora">Contructora Encargada</label>
            <input type="text" class="form-control" id="constructora" placeholder="Enter Constructora" name="constructora">
          </div>
          <div class="form-group">
            <label for="tipoObra">Tipo de Obra</label>
            <input type="text" class="form-control" id="tipoObra" placeholder="Enter tipo Obra" name="tipo">
          </div>
          <div class="form-group">
            <label for="decripcion">Descripcion</label>
            <input type="text" class="form-control" id="decripcion" placeholder="Enter Descripcion" name="descripcion">
          </div>
          <div class="form-group">
            <label for="direccion">Direccion de la Obra</label>
            <input type="text" class="form-control" id="direccion" placeholder="Enter direccion de la Obra" name="direccion">
          </div>
          <div class="form-group">
            <label for="terrenoMetros">Terreno en metros de la Obra</label>
            <input type="number" class="form-control" id="terrenoMetros" placeholder="Enter metros de la Obra" name="terreno_metros">
          </div>
          <div class="form-group">
            <label for="idCliente">Cliente</label>
            <select name="id_cliente" id="idCliente">
              <?php foreach($idCliente as $id) { ?>
                <option value="<?= $id->id_cliente ?>"><?= $id->nombre ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="form-check">
            <input type="submit" class="btn btn-primary" name="guardar" value="Guardar">
          </div>
        </div>
    </form>
</div>

<?php 
$url = "http://localhost/xampp/var/www/html/php/muerte-x2/apirest/controles/obra.php?op=insert"; 
if(isset($_POST['guardar'])){

$datos = [
    'obra' => $_POST['obra'],
    'constructora' => $_POST['constructora'],
    'tipo' => $_POST['tipo'],
    'descripcion' => $_POST['descripcion'],
    'direccion' => $_POST['direccion'],
    'terreno_metros' => $_POST['terreno_metros'],
    'id_cliente' => $_POST['id_cliente']
];

$curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($datos));
    $response = curl_exec($curl);
    curl_close($curl);
    var_dump($response);


}
?>

