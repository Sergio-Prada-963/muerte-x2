<?php $salidaD = "http://localhost/SkylAb-145/Proyects/muerte-x2/apirest/controles/salidaDetalle.php?op=GetAll"; 
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $salidaD);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER,1);
    $idSalidaD = json_decode(curl_exec($curl));
?>
<form action="" method="post">
    <label for="delete">Eliga Detalle de Salida a Eliminar</label>
    <select class="form-control form-control-lg" id="delete" name="id_salidaD">
      <option>Seleccione Detalle de Salida a eliminar</option>
      <?php foreach($idSalidaD as $id) { ?>
        <option value="<?= $id->id_salida; ?>"><?= $id->nombreEmpleado; ?></option>
      <?php } ?>
    </select>
    <div class="form-check">
        <input type="submit" class="btn btn-info swalDefaultInfo" name="delete" value="Eliminar">
    </div>
</form>

<?php 
$url = "http://localhost/SkylAb-145/Proyects/muerte-x2/apirest/controles/salidaDetalle.php?op=delete"; 
if(isset($_POST['delete'])){

$datos = [
    'id_salidaD' => $_POST['id_salidaD']
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