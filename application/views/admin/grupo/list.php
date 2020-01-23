
<div class="row">
<div class="col-md-12">

	<?php if(isset($content)): ?><h3><?php echo $content;?></h3><?php endif;?>

	<div class="pull-right">
		<?php echo anchor('admin/grupo/novo', 'Novo', 'class="btn btn-primary" title="Cadastrar Novo"'); ?>
	</div>
	<br clear="both">
</div>

<div class="col-md-12">

	<div class="table-responsive">
	<table cellpadding="0" cellspacing="0" class="table table-bordered">
	
		<tr>
			<th>Nome</th><th></th>
		</tr>
<?php foreach ($grupos as $chave=>$valor): ?>
    	<tr class="linha_<?php echo ($chave%2)?>">
    		<td><?php echo $valor['gru_nome'] ?></td>
    		
    		<td><?php echo anchor('admin/grupo/editar/'.$valor['gru_id'], 'Editar', 'class="btn btn-info" title="Editar"'); ?></td>
    	</tr>
<?php endforeach;?>

    </table>
    </div>
</div>
</div>

<!-- <pre> -->
<?php //debug_zval_dump($modulos); ?>
<!-- </pre> -->