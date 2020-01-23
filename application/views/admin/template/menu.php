<nav class="navbar navbar-default">
	<div class="container">
    	<div class="navbar-header">
        	<button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
            	<span class="sr-only">Toggle navigation</span>
	        	<span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
            </button>
            <a href="<?php echo base_url(); ?>admin" class="navbar-brand"><?php echo MENU_TITLE; ?></a>
        </div>
        <div class="navbar-collapse collapse">
        
        	<ul class="nav navbar-nav navbar-right">
				<li><h5>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo character_limiter($usuario['usu_nome'], 30 );?></h5></li>
				<li class="btn-sair-mobile"><span>&nbsp;&nbsp;&nbsp;<?php echo anchor('home', 'Front page', 'class="btn btn-info btn-xs" style="margin-top:8px"'); ?></span></li>
            	<li class="btn-sair-mobile"><span>&nbsp;&nbsp;&nbsp;<?php echo anchor('admin/login/logout', 'Sair', 'class="btn btn-danger btn-xs" style="margin-top:8px"'); ?></span></li>
          	</ul>
          	
        	<ul class="nav navbar-nav">
        	<?php foreach ($result['modulos'] as $chave=>$valor): ?>
        	
              	<li class="dropdown">
                	<a aria-expanded="false" aria-haspopup="true" role="button" 
                		data-toggle="dropdown" class="dropdown-toggle" href="#"><?php echo $valor['mod_nome']; ?> <span class="caret"></span></a>
                	
                	<?php if(isset($valor['funcionalidades'])):?>
                	<ul class="dropdown-menu">
                		<?php foreach ($valor['funcionalidades'] as $key=>$value): ?>
                  		<li><?php if($value['fun_visible'] == '1') echo anchor($value['fun_alias'], $value['fun_nome']); ?></li>
                  		<?php endforeach;?>
                	</ul>
                	<?php endif;?>
                	
              	</li>
              	
			<?php endforeach;?>
			</ul>
			
		</div><!--/.nav-collapse -->
	</div>
</nav>