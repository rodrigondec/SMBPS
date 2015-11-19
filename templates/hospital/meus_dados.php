<div class='text-center'>
	<h2>Meus dados</h2>
	<hr />
</div>
<?php 
	$usuario = select('*', 'usuário', 'id', $_SESSION["id_usuario"]);
	$hospital = select('*', 'hospital', 'id', $_SESSION['id_hospital']);
?>
<div class='container'>

	<!-- <nav>
  		<ul class="pager">
    		<li><a href="#" onclick='show_usuario();'>Usuário</a></li>
    		<li><a href="#" onclick='show_hospital();'>Hospital</a></li>
  		</ul>
	</nav> -->
<!-- 	<div>
		MENU MENUMENUEMUENUENE
		<button class='btn btn-primary'>Mostrar usuário</button>
		<button class='btn btn-primary'>Mostrar hospital</button>
	</div> -->
	<!-- <hr /> -->
	<div>
		<div class="list-group text-left col-lg-2">
			<a id='nav_usuario' href="#" class="list-group-item active" onclick='show_usuario();'>Usuário</a>
			<a id='nav_hospital' href="#" class="list-group-item" onclick='show_hospital();'>Hospital</a>
		</div>
		<div id='usuario' class=''>
			<p>Usuário</p>
			<?php 
			    var_dump($usuario);echo '<br /><br />';
			?>
		</div>
		<div id='hospital' class='hidden'>
			<p>Hospital</p>
			<?php 
			    var_dump($hospital);echo '<br /><br />';
			?>
		</div>
	</div>
	
	
	
</div>
<script type="text/javascript">

	function show_usuario(){
		$('#usuario').attr('class', '')
		$('#hospital').attr('class', 'hidden')

		$('#nav_usuario').attr('class', 'list-group-item active')
		$('#nav_hospital').attr('class', 'list-group-item')
	}

	function show_hospital(){
		$('#usuario').attr('class', 'hidden')
		$('#hospital').attr('class', '')

		$('#nav_usuario').attr('class', 'list-group-item')
		$('#nav_hospital').attr('class', 'list-group-item active')
	}

</script>