
<div class="container">
    <?php if(isset($already_installed) && $already_installed) { ?>
    Primeiro com CodeIgnitor has already been installed.
    <?php } else { ?>
        <?php if(isset($already_installed) && !$already_installed) { echo form_open('install/run'); }
        else { echo form_open('login/validate', 'class="form-signin"'); } ?>
 
        <label for="inputEmail" class="sr-only">Email</label>
        <input type="email" id="email" name="email" class="form-control" placeholder="Email" required autofocus>
        
        <label for="inputPassword" class="sr-only">Senha</label>
        <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
 
        <?php if(isset($error) && $error) { ?>
        <p class="error">E-mail e/ou senha n&atilde;o confere.<br />
        Verifique as informa&ccedil;&otilde;es antes de tentar novamente!</p>
        <?php } ?>
 
        <?php if(isset($already_installed) && !$already_installed) { echo form_submit('install', 'Install', 'class="btn-blue"'); }
        else { ?>
        	<button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
        <?php } ?>
 
        <?php echo form_close(); ?>
    <?php } ?>
</div>