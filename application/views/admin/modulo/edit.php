
<div class="row">

<div class="col-md-12">

	<?php if(isset($content)): ?><h3><?php echo $content;?></h3><?php endif;?>
	
	
	<?php 
	
	echo form_open('admin/modulo/salvar'); 
	
	if (isset($modulo['mod_id'])) echo form_input('id', $modulo['mod_id'], 'style="display:none"');
	
	?>
	
	<div style="float: right;">		
		
		<?php echo form_button('cancel', 'Voltar', 'class="btn btn-default" onClick="history.go(-1)"'); ?>
		<?php echo form_submit('salvar', 'Salvar', 'class="btn btn-success"'); ?>
	</div>
	<br clear="both">
</div>

<div class="col-md-12">
	
	<div class="table-responsive">
	<table cellpadding="0" cellspacing="0" class="table table-bordered">
	
		<tr>
			<td class="col-md-1">Nome:</td><td><?php echo isset($modulo) ? form_input('nome', $modulo['mod_nome']) : form_input('nome'); ?></td>
		</tr>
		
		<tr>
			<td class="col-md-1">URL:</td><td><?php echo isset($modulo) ? form_input('alias', $modulo['mod_alias']) : form_input('alias'); ?></td>
		</tr>
		
		<tr>
			<td class="col-md-1">Ordem:</td><td><?php echo isset($modulo) ? form_input('ordem', $modulo['mod_ordem']) : form_input('ordem'); ?></td>
		</tr>
		
		<tr>
			<td class="col-md-1">Visibilidade:</td><td><?php echo isset($modulo) ? form_input('visible', $modulo['mod_visible']) : form_input('visible'); ?></td>
		</tr>

    </table>
    </div>
    <?php echo form_close(); ?>
    
    <hr>
</div>

<div class="col-md-12">
    <?php if(isset($modulo)): ?>
    <br />
    <h4> Funcionalidades do M&oacute;dulo: <?php echo $modulo['mod_nome']; ?></h4>
    
    <div class="pull-right">
    <?php echo anchor('admin/funcionalidade/criar/'.$modulo['mod_id'], 'Nova Funcionalidade', 'class="btn btn-primary" title="Cadastrar Nova Funcionalidade"'); ?>
    </div>
    <br clear="both" />
    <?php endif;?>
    
</div>

<div class="col-md-12">
    
	<?php if(isset($funcionalidades)):?>
	<div class="table-responsive">
    <table cellpadding="0" cellspacing="0" class="table table-bordered">
	
		<tr>
			<th>Nome</th>
			<th>Alias</th>
			<th>Ordem</th>
			<th>Grupo - Permiss&atilde;o</th>
			<th></th>
		</tr>
<?php foreach ($funcionalidades as $chave=>$valor): ?>
    	<tr class="linha_<?php echo ($chave%2)?>">
    		<td><?php echo $valor['fun_nome'] ?></td>
    		<td><?php echo $valor['fun_alias'] ?></td>
    		<td><?php echo $valor['fun_ordem'] ?></td>
    		
    		<td>
				<div style="text-align: left; padding-left: 10px; height: 65px; 
					width:95%; overflow: scroll; overflow-x: hidden;">    		
    			<?php if(isset($valor['permissoes'])):?>
    			<?php foreach ($valor['permissoes'] as $key=>$value): ?>
    				
    				<?php echo $value['gru_nome']." => ".$value['per_nome']; ?><br />
    			
    			<?php endforeach;?>
    			<?php endif;?>
    			</div>
    		</td>
    		
    		<td><?php echo anchor('admin/funcionalidade/editar/'.$valor['fun_id'], 'Editar', 'class="btn btn-info" title="Editar"'); ?></td>
    	</tr>
<?php endforeach;?>

    </table>
    </div>
    <?php endif;?>
    
</div>

</div>

<!-- <pre> -->
<?php //debug_zval_dump($funcionalidades); ?>
<!-- </pre> -->