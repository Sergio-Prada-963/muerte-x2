<?php $proveedor = "http://localhost/muerte-x2/apirest/controles/proveedor.php?op=GetAll"; 
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $proveedor);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER,1);
    $idProveedor = json_decode(curl_exec($curl));
?>
<form action="" method="post">
    <label for="delete">Eliga proveedor a Eliminar</label>
    <select class="form-control form-control-lg" id="delete" name="id_proveedor">
      <option>Seleccione Proveedor a eliminar</option>
      <?php foreach($idProveedor as $id) { ?>
        <option value="<?= $id->id_proveedor; ?>"><?= $id->nombreProveedor; ?></option>
      <?php } ?>
    </select>
    <div class="form-check">
        <input type="submit" class="btn btn-info swalDefaultInfo" name="delete" value="Eliminar">
    </div>
</form>

<?php 
$url = "http://localhost/muerte-x2/apirest/controles/proveedor.php?op=delete"; 
if(isset($_POST['delete'])){

$datos = [
    'id_proveedor' => $_POST['id_proveedor']
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