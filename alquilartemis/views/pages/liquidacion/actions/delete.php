<?php $liquidacion = "http://localhost/muerte-x2/apirest/controles/liquidacion.php?op=GetAll"; 
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $liquidacion);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER,1);
    $idLiquidacion = json_decode(curl_exec($curl));
?>
<form action="" method="post">
    <label for="delete">Eliga Liquidacion a Eliminar</label>
    <select class="form-control form-control-lg" id="delete" name="id_liquidacion">
      <option>Seleccione Liquidacion a eliminar</option>
      <?php foreach($idLiquidacion as $id) { ?>
        <option value="<?= $id->id_liquidacion; ?>"><?= $id->nombreEmpleado; ?></option>
      <?php } ?>
    </select>
    <div class="form-check">
        <input type="submit" class="btn btn-info swalDefaultInfo" name="delete" value="Eliminar">
    </div>
</form>

<?php 
$url = "http://localhost/muerte-x2/apirest/controles/liquidacion.php?op=delete"; 
if(isset($_POST['delete'])){

$datos = [
    'id_liquidacion' => $_POST['id_liquidacion']
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