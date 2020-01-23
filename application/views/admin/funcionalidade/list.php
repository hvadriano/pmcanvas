
<div class="row">

<div class="col-md-12">

	<?php if(isset($content)): ?><h3><?php echo $content;?></h3><?php endif;?>

	<div class="pull-right">
		<?php if(isset($btnCriar) && $btnCriar) echo anchor('admin/funcionalidade/criar', 'Nova Funcionalidade', ' class="btn btn-primary" title="Cadastrar Nova Funcionalidade"'); ?>
	</div>
	<br clear="both">
</div>

<div class="col-md-12">
	<div class="table-responsive">
	<table cellpadding="0" cellspacing="0" class="table table-bordered">
	
		<tr class="linhaTitulo">
			<th>Nome</th><th>Alias</th><th>Ordem</th><th>M&oacute;dulo</th><th></th>
		</tr>
<?php foreach ($funcionalidades as $chave=>$valor): ?>
    	<tr class="<?php echo ($chave%2) ? "warning" : "";?>">
    		<td><?php echo $valor['fun_nome'] ?></td>
    		<td><?php echo $valor['fun_alias'] ?></td>
    		<td><?php echo $valor['fun_ordem'] ?></td>
    		<td><?php echo $valor['modulo']['mod_nome'] ?></td>
    		
    		<td><?php if(isset($btnEditar) && $btnEditar) echo anchor('admin/funcionalidade/editar/'.$valor['fun_id'], 'Editar', 'class="btn btn-info" title="Editar"'); ?></td>
    	</tr>
<?php endforeach;?>

		<tr>
			<td colspan="5">
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

<!-- <pre>
Tem permiss&atilde;o: <q?php debug_zval_dump($temPermissao); ?>
btnEditar: <q?php debug_zval_dump($btnEditar); ?>
btnCriar: <q?php debug_zval_dump($btnCriar); ?>


<q?php debug_zval_dump($result['modAndFunAndPerAndGru']); ?>
</pre> -->