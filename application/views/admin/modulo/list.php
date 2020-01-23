
<div class="row">

<div class="col-md-12">

	<?php if(isset($content)): ?><h3><?php echo $content;?></h3><?php endif;?>

	<div class="pull-right">
		<?php echo anchor('admin/modulo/editar', 'Cadastrar Novo', 'class="btn btn-primary" title="Cadastrar Novo"'); ?>
	</div>
	<br clear="both">
</div>

<div class="col-md-12">

	<div class="table-responsive">
	<table cellpadding="0" cellspacing="0" class="table table-bordered">
	
		<tr>
			<th>Nome</th><th>Alias</th><th>Ordem</th><th></th>
		</tr>
<?php foreach ($modulos as $chave=>$valor): ?>
    	<tr class="<?php echo ($chave%2) ? "warning" : "";?>">
    		<td><?php echo $valor['mod_nome'] ?></td>
    		<td><?php echo $valor['mod_alias'] ?></td>
    		<td><?php echo $valor['mod_ordem'] ?></td>
    		
    		<td><?php echo anchor('admin/modulo/editar/'.$valor['mod_id'], 'Editar', 'class="btn btn-info" title="Editar"'); ?></td>
    	</tr>
<?php endforeach;?>

    </table>
    </div>
</div>

</div>

<!-- <pre> -->
<?php //debug_zval_dump($modulos); ?>
<!-- </pre> -->