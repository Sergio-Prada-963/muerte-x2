<?php $inventario = "http://localhost/muerte-x2/apirest/controles/inventario.php?op=GetAll"; 
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $inventario);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER,1);
    $idInventario = json_decode(curl_exec($curl));
?>
<form action="" method="post">
    <label for="delete">Eliga Inventario a Eliminar</label>
    <select class="form-control form-control-lg" id="delete" name="id_inventario">
      <option>Seleccione Inventario a eliminar</option>
      <?php foreach($idInventario as $id) { ?>
        <option value="<?= $id->id_inventario; ?>"><?= $id->nombre; ?></option>
      <?php } ?>
    </select>
    <div class="form-check">
        <input type="submit" class="btn btn-info swalDefaultInfo" name="delete" value="Eliminar">
    </div>
</form>

<?php 
$url = "http://localhost/muerte-x2/apirest/controles/inventario.php?op=delete"; 
if(isset($_POST['delete'])){

$datos = [
    'id_inventario' => $_POST['id_inventario']
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