
<div class="row">
<div class="col-md-12">

	<?php if(isset($content)): ?><h3><?php echo $content;?></h3><?php endif;?>

	<div class="pull-right">
		<?php echo anchor('admin/permissao/novo', 'Novo', 'class="btn btn-primary" title="Cadastrar Novo"'); ?>
	</div>
	<br clear="both">
</div>

<div class="col-md-12">

	<div class="table-responsive">
	<table cellpadding="0" cellspacing="0" class="table table-bordered">
	
		<tr>
			<th class="col-md-1">Nome</th><th></th>
		</tr>
<?php foreach ($permissaoes as $chave=>$valor): ?>
    	<tr>
    		<td><?php echo $valor['per_nome'] ?></td>
    		
    		<td><?php echo anchor('admin/permissao/editar/'.$valor['per_id'], 'Editar', 'class="btn btn-default" title="Editar"'); ?></td>
    	</tr>
<?php endforeach;?>

    </table>
    </div>
</div>
</div>

<!-- <pre> -->
<?php //debug_zval_dump($modulos); ?>
<!-- </pre> -->