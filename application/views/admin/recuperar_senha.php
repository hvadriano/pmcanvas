
<div class="container">

	<?php echo form_open('admin/login/recuperar', 'class="form-signin"'); ?>
		<h1><?php echo MENU_TITLE ?></h1>
    	<h3>Recupera&ccedil;&atilde;o de senha</h3>
    	
        <label for="inputEmail" class="sr-only">Email</label>
        <input type="email" id="email" name="email" class="form-control" placeholder="Email" required autofocus>
        
        <?php if(isset($error) && $error) { ?>
        <p class="error">E-mail n&atilde;o encontrado.</p>
        <?php } ?>
        
        
        <button class="btn btn-lg btn-primary btn-block" type="submit">Enviar</button>
        
        <p>&nbsp;</p>
	<?php echo form_close(); ?>
	 
</div> <!-- /container -->
