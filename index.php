<html>
<head>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	
	<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery('#ajax_form').submit(function(){
			var dados = jQuery( this ).serialize();

			jQuery.ajax({
				type: "POST",
				url: "salvar.php",
				data: dados,
				success: function( data )
				{
					location.reload();
				}
			});
			
			return false;
		});
	});
	</script>

	<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery('#ajax_dell').submit(function(){
			var dados = jQuery( this ).serialize();

			jQuery.ajax({
				type: "POST",
				url: "deletar.php",
				data: dados,
				success: function( data )
				{
					location.reload();
				}
			});
			
			return false;
		});
	});
	</script>

</head>
<body>
	<form method="post" action="" id="ajax_form">
		<label><input type="hidden" name="id" value="" /></label>
		<label>User: <input type="text" name="nome" value="" /></label>
		<label>Senha: <input type="password" name="password" value="" /></label>

		<label><input type="submit" name="enviar" value="Enviar" /></label>
	</form>
           <table  border="1px" cellpadding="5px" cellspacing="0">
                <tr>
                    <td>Id</td>
                    <td>Nome</td>
                    <td>Senha</td>
                    <td>Ação</td>
                </tr>
                <?php
                include 'conexao.php'; 
                $select = "SELECT * FROM users";
                $result = mysqli_query($conn,$select); //resultado do select
                while ($row = mysqli_fetch_array($result)) { 
                    $id = $row['id'];
                    $nome = $row['usern'];
                    $senha = $row['password'];
                    ?>   
            <tr>
                <td><?php echo $id; ?></td>
                <td><?php echo $nome; ?></td>
                <td><?php echo $senha; ?></td>
                <td>
                	<form id="ajax_dell" method='post'>
					    <input type='hidden' name='id' value='<?php echo $id; ?>'>
					    <input type='submit' name='deletar' value='deletar' />
					</form>
                </td>
            </tr>
                <?php } ?>
            </table>
</body>
</html>