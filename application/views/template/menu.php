<!-- Static navbar -->
    <nav class="navbar navbar-default navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo base_url(); ?>"><?php echo MENU_TITLE; ?></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <!--
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#about">Sobre</a></li>
          </ul>
           -->
          <ul class="nav navbar-nav navbar-right">
            
            <?php if(!$this->session->userdata('logged')){ //confiro se está logado ?>
					<?php echo form_open('login/validate'); ?>
		            	<?php echo form_label('Email', 'email'); ?>
		        		<?php echo form_input('email', ""); ?>&nbsp;&nbsp;
		        		<?php echo form_label('Password', 'password'); ?>
		        		<?php echo form_password('password', ""); ?>&nbsp;&nbsp;
		        		<?php echo form_submit('login', 'Login', 'class="btn-blue"'); ?>
		            <?php echo form_close(); ?>
			<?php } else { // ainda tenho que verificar se o usuário tem permissão para acessar o atributo "alias" para a funcionalidade ?>
					<li><h5>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo character_limiter($usuario['usu_nome'], 30 );?></h5></li>
					<li class="btn-sair-mobile"><span>&nbsp;&nbsp;&nbsp;<?php echo anchor('admin/home', 'Administra&ccedil;&atilde;o', 'class="btn btn-info btn-xs" style="margin-top:8px"'); ?></span></li>
            		<li class="btn-sair-mobile"><span>&nbsp;&nbsp;&nbsp;<?php echo anchor('login/logout', 'Sair', 'class="btn btn-danger btn-xs" style="margin-top:8px"'); ?></span></li>
			<?php } ?>
            
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>