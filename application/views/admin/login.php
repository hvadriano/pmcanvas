
<div class="container">

	<?php echo form_open('admin/login/validate', 'class="form-signin"'); ?>
		<h1><?php echo MENU_TITLE ?></h1>
    	<h2 class="form-signin-heading">Administra&ccedil;&atilde;o</h2>
    	
        <label for="inputEmail" class="sr-only">Email</label>
        <input type="email" id="email" name="email" class="form-control" placeholder="Email" required autofocus>
        
        <label for="inputPassword" class="sr-only">Senha</label>
        <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
        
        <div class="checkbox">
        	<label>
            	<input type="checkbox" value="Lembrar-me"> Lembrar-me
          	</label>
        </div>
        
        <?php if(isset($error) && $error) { ?>
			<div class="alert alert-danger alert-dismissible" role="alert">
				E-mail ou Senha n&atilde;o confere!</p>
			</div>
        <?php } ?>
        
        
        <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
        
        <p>&nbsp;</p>
        
        <p><a href="<?php echo base_url().'admin/login/form_recuperar_senha'?>" >Esqueceu sua senha?</a></p>
	<?php echo form_close(); ?>
	 
</div> <!-- /container -->
