
<div class="row">
<div class="col-md-12">

	<?php if(isset($content)): ?><h3><?php echo $content;?></h3><?php endif;?>
	
	
	<?php 
	
	echo form_open('admin/permissao/salvar'); 
	
	if (isset($permissao['per_id'])) echo form_input('id', $permissao['per_id'], 'style="display:none"');
	
	?>
	
	<div class="pull-right">		
		
		<?php echo form_button('cancel', 'Voltar', 'class="btn btn-default" onClick="history.go(-1)"'); ?>
		<?php echo form_submit('salvar', 'Salvar', 'class="btn btn-primary"'); ?>
	</div>
	<br clear="both">
</div>

<div class="col-md-12">
	
	<div class="table-responsive">
	<table cellpadding="0" cellspacing="0" class="table table-bordered">
	
		<tr>
			<td class="col-md-1">Nome:</td>
			<td><?php echo isset($permissao) ? form_input('nome', $permissao['per_nome']) : form_input('nome'); ?></td>
		</tr>

    </table>
    </div>
    <?php echo form_close(); ?>
    
</div>
</div>

<!-- <pre> -->
<?php //debug_zval_dump($funcionalidades); ?>
<!-- </pre> -->