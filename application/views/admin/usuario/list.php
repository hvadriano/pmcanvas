
<div class="row">
<div class="col-md-12">

	<?php if(isset($content)): ?><h3><?php echo $content;?></h3><?php endif;?>

	<div class="pull-right">
		<?php if(isset($btnCriar) && $btnCriar) echo anchor('admin/usuario/criar', 'Novo', 'class="btn btn-primary" title="Cadastrar Novo"'); ?>
	</div>
	<br clear="both">
</div>

<div class="col-md-12">
	<div class="table-responsive">
	<table cellpadding="0" cellspacing="0" class="table table-bordered">
	
		<tr>
			<th>Nome</th>
			<th>E-mail</th>
			<th>Cria&ccedil;&atilde;o</th>
			<th>Grupo</th>
			<th></th>
			<th></th>
		</tr>
<?php foreach ($usuarios as $chave=>$valor): ?>
    	<tr class="<?php echo ($chave%2) ? "warning" : "";?>">
    		<td><?php echo $valor['usu_nome'] ?></td>
    		<td><?php echo $valor['usu_email'] ?></td>
    		<td><?php echo $valor['usu_created'] ?></td>
    		<td><?php echo $valor['grupo']['gru_nome'] ?></td>
    		
    		<td><?php if(isset($btnEditar) && $btnEditar) echo anchor('admin/usuario/editar/'.$valor['usu_id'], 'Editar', 'class="btn btn-default" title="Editar"'); ?></td>
    		<td><?php if(isset($btnRemover) && $btnRemover) echo anchor('admin/usuario/remover/'.$valor['usu_id'], 'X', 'class="btn btn-danger" title="Remover"'); ?></td>
    	</tr>
<?php endforeach;?>

		<tr>
			<td colspan="6">
				<?php 
					if($pagination['pageLinks'] == ""){
					
						echo ($pagination['totalRows'] > 0) ? "Mostrando o(s) ".$pagination['totalRows']." iten(s) encontrado(s).": "Nenhum item encontrado";

					}else{

						$final = ($indice+$limit > $pagination['totalRows']) ? $pagination['totalRows'] : $indice+$limit;

						echo $pagination['totalRows']." itens encontrados. Mostando de " . ($indice+1). " a ".$final; 
						echo "<br />" . $pagination['pageLinks'];
					}
				
					
				?>
			</td>
		
		</tr>

    </table>
    </div>
</div>
</div>

<!-- <pre> -->
<!-- <w?php //debug_zval_dump($modulos); ?> -->
<!-- </pre> -->