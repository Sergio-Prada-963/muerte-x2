<?php $salida = "http://localhost/SkylAb-145/Proyects/muerte-x2/apirest/controles/salida.php?op=GetAll"; 
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $salida);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER,1);
    $idSalida = json_decode(curl_exec($curl));
?>
<form action="" method="post">
    <label for="delete">Eliga Salida a Eliminar</label>
    <select class="form-control form-control-lg" id="delete" name="id_salida">
      <option>Seleccione Salida a eliminar</option>
      <?php foreach($idSalida as $id) { ?>
        <option value="<?= $id->id_salida; ?>"><?= $id->nombreEmpleado; ?></option>
      <?php } ?>
    </select>
    <div class="form-check">
        <input type="submit" class="btn btn-info swalDefaultInfo" name="delete" value="Eliminar">
    </div>
</form>

<?php 
$url = "http://localhost/SkylAb-145/Proyects/muerte-x2/apirest/controles/salida.php?op=delete"; 
if(isset($_POST['delete'])){

$datos = [
    'id_salida' => $_POST['id_salida']
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