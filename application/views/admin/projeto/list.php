<div class="row">
	<div class="col-md-12">
	
		<h2>Seus Projetos</h2>
	
	</div>
</div>

<div class="row">
	<div class="col-md-12">
	
		<div class="table-responsive">
		<table cellpadding="0" cellspacing="0" class="table table-bordered">
	
		<tr>
			<th>Nome</th><th>Pitch</th><th></th>
		</tr>
		<?php if ( isset( $projetos ) ) : ?>
		<?php foreach ( $projetos as $chave=>$valor) : ?>
		
			<tr class="linha_<?php echo ($chave%2)?>">
	    		<td><?php echo $valor['nome'] ?></td>
	    		<td><?php echo $valor['pitch'] ?></td>
	    		
	    		<td><?php echo anchor('admin/card/index/0/'.$valor['id'], 'Abrir', 'class="btn btn-info" title="Abrir Projeto"'); ?></td>
	    	</tr>
		
		<?php endforeach; ?>
		<?php endif; ?>
		
		</table>
    	</div>
    
	</div>
</div>
