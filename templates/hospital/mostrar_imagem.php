<?php 
    $imagem = select('nome', 'imagem', 'id', '1', LINK);
    var_dump($imagem);
?>
<div align='center'>
	<img src="<?php echo IMGS.$imagem['nome'];?>" width='70%'>
</div>