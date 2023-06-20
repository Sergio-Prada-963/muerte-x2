<?php $cliente = "http://localhost/muerte-x2/apirest/controles/cliente.php?op=GetAll"; 
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $cliente);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER,1);
    $idCliente = json_decode(curl_exec($curl));
?>
<form action="" method="post">
    <label for="delete">Eliga Cliente a Eliminar</label>
    <select class="form-control form-control-lg" id="delete" name="id_cliente">
      <option>Seleccione Cliente a eliminar</option>
      <?php foreach($idCliente as $id) { ?>
        <option value="<?= $id->id_cliente; ?>"><?= $id->nombre; ?></option>
      <?php } ?>
    </select>
    <div class="form-check">
        <input type="submit" class="btn btn-info swalDefaultInfo" name="delete" value="Eliminar">
    </div>
</form>

<?php 
$url = "http://localhost/muerte-x2/apirest/controles/cliente.php?op=delete"; 
if(isset($_POST['delete'])){

$datos = [
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