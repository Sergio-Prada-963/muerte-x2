<?php $obra = "http://localhost/SkylAb-145/Proyects/muerte-x2/apirest/controles/obra.php?op=GetAll"; 
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $obra);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER,1);
    $idObra = json_decode(curl_exec($curl));
?>
<form action="" method="post">
    <label for="delete">Eliga Obra a Eliminar</label>
    <select class="form-control form-control-lg" id="delete" name="id_obra">
      <option>Seleccione Obra a eliminar</option>
      <?php foreach($idObra as $id) { ?>
        <option value="<?= $id->id_obra; ?>"><?= $id->obra; ?></option>
      <?php } ?>
    </select>
    <div class="form-check">
        <input type="submit" class="btn btn-info swalDefaultInfo" name="delete" value="Eliminar">
    </div>
</form>

<?php 
$url = "http://localhost/SkylAb-145/Proyects/muerte-x2/apirest/controles/obra.php?op=delete"; 
if(isset($_POST['delete'])){

$datos = [
    'id_obra' => $_POST['id_obra']
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