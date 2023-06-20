<?php $empleado = "http://localhost/SkylAb-145/Proyects/muerte-x2/apirest/controles/empleado.php?op=GetAll?op=GetAll"; 
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $empleado);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER,1);
    $idEmpleado = json_decode(curl_exec($curl));
?>
<form action="" method="post">
    <label for="delete">Eliga Empleado a Eliminar</label>
    <select class="form-control form-control-lg" id="delete" name="id_empleado">
      <option>Seleccione Empleado a eliminar</option>
      <?php foreach($idEmpleado as $id) { ?>
        <option value="<?= $id->id_empleado; ?>"><?= $id->nombreEmpleado; ?></option>
      <?php } ?>
    </select>
    <div class="form-check">
        <input type="submit" class="btn btn-info swalDefaultInfo" name="delete" value="Eliminar">
    </div>
</form>

<?php 
$url = "http://localhost/SkylAb-145/Proyects/muerte-x2/apirest/controles/empleado.php?op=GetAll?op=delete"; 
if(isset($_POST['delete'])){

$datos = [
    'id_empleado' => $_POST['id_empleado']
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
