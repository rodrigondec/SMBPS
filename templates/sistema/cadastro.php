<div class='text-center'>
	<h2>Cadastro</h2>
	<hr />
</div>
<form class='centered-30' method='post'>
	<div class='form-group text-left'>
	    <label for='nome'>Nome</label>
	    <input type='nome' name='nome' class='form-control' placeholder='Nome'  required />
	</div>
	<div class='form-group text-left'>
	    <label for='email'>Email</label>
	    <input type='email' name='email' class='form-control' placeholder='Email'  required />
	</div>
	<div class='text-center'>
		<input type='reset' value='Apagar' class='btn btn-warning' />
		<input type='submit' value='Enviar' class='btn btn-primary' />
	</div>
</form>
<?php 
    if(count($_POST) > 0){
    	var_dump($_POST);
    }
?>