<?php $entradaD = "http://localhost/SkylAb-145/Proyects/muerte-x2/apirest/controles/entradaDetalle.php?op=GetAll"; 
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $entradaD);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER,1);
    $idEntradaD = json_decode(curl_exec($curl));
?>
<form action="" method="post">
    <label for="delete">Eliga Entrada Detalle a Eliminar</label>
    <select class="form-control form-control-lg" id="delete" name="id_entradaD">
      <option>Seleccione Entrada Detalle a eliminar</option>
      <?php foreach($idEntradaD as $id) { ?>
        <option value="<?= $id->id_entrada; ?>"><?= $id->nombre; ?></option>
      <?php } ?>
    </select>
    <div class="form-check">
        <input type="submit" class="btn btn-info swalDefaultInfo" name="delete" value="Eliminar">
    </div>
</form>

<?php 
$url = "http://localhost/SkylAb-145/Proyects/muerte-x2/apirest/controles/entradaDetalle.php?op=delete"; 
if(isset($_POST['delete'])){

$datos = [
    'id_entradaD' => $_POST['id_entradaD']
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