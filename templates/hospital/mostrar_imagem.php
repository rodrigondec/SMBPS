<div class='text-center'>
	<h2>Mostrar imagem</h2>
	<hr />
</div>
<?php 
    $imagem = select('nome', 'imagem', 'id', '1');
    var_dump($imagem);
?>
<div class='text-center'>
	<img src="<?php echo PROTOCOLOS.$imagem['nome'];?>" width='70%'>
</div>