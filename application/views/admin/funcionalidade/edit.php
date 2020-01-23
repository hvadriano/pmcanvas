
<div class="row">
<div class="col-md-12">

	<?php if(isset($content)): ?><h3><?php echo $content;?></h3><?php endif;?>
	
	
	<?php 
	
	echo form_open('admin/funcionalidade/salvar'); 
	
	if (isset($funcionalidade['fun_id'])) echo form_input('funcionalidade', $funcionalidade['fun_id'], 'style="display:none"');
	
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
			<td>Nome:</td><td ><?php echo isset($funcionalidade) ? form_input('nome', $funcionalidade['fun_nome']) : form_input('nome'); ?></td>
		</tr>
		
		<tr>
			<td>URL:</td><td ><?php echo isset($funcionalidade) ? form_input('alias', $funcionalidade['fun_alias']) : form_input('alias'); ?></td>
		</tr>
		
		<tr>
			<td>Ordem:</td><td ><?php echo isset($funcionalidade) ? form_input('ordem', $funcionalidade['fun_ordem']) : form_input('ordem'); ?></td>
		</tr>
		
		<tr>
			<td class="col-md-1">Visibilidade:</td><td ><?php echo isset($funcionalidade) ? form_input('visible', $funcionalidade['fun_visible']) : form_input('visible'); ?></td>
		</tr>
		
		<tr>
			<td>M&oacute;dulo:</td>
			<td>
			
			<?php if (isset($modulos)){?>
			
				<select name="modulo">
				<?php 
				if(isset($modulo)){
				
					echo '<option selected="selected" value="'.$modulo['mod_id'].'">'.$modulo['mod_nome'].'</option>';
				
					foreach ($modulos as $chave=>$valor):	
					
						if($valor['mod_id'] != $modulo['mod_id']){
							echo '<option value="'.$valor['mod_id'].'">'.$valor['mod_nome'].'</option>';
						}			
					endforeach;
					
				}else{

					foreach ($modulos as $chave=>$valor):
	
						echo '<option value="'.$valor['mod_id'].'">'.$valor['mod_nome'].'</option>';
					
					endforeach;

				}
				?>
				
				
				</select>
				
			<?php } elseif(isset($modulo)) { ?>
			
				<span style="font-weight: bold;"><?php echo $modulo['mod_nome'];?></span>
				<?php echo form_input('modulo', $modulo['mod_id'], 'style="display:none"');?>
				<?php }?>
			</td>
		</tr>

		
    </table>
    </div>
    
    <hr>
    
    <div class="table-responsive">
    <table cellpadding="0" cellspacing="0" class="table table-bordered">
    	<tr class="linhaTitulo">
			<td width="30%">Grupo</td><td>Permiss&otilde;es</td>
		</tr>
		
		<?php foreach ($grupos as $chave=>$valor):?>
		<tr class="linha_<?php echo ($chave%2)?>">
			<td >
				<?php echo $valor['gru_nome']; ?>
			</td>
			
			<td >
				<?php foreach ($permissoes as $key=>$value):?>
				
				<INPUT TYPE="checkbox" 
				NAME="g<?php echo $valor['gru_id'];?>_p<?php echo $value['per_id'];?>" 
				VALUE="<?php echo $valor['gru_id'];?>_<?php echo $value['per_id'];?>" 
								
					<?php 
					foreach ($gfp as $k=>$v):
						
						if($value['per_id'] == $v['per_id'] && $valor['gru_id'] == $v['gru_id']){
							echo "CHECKED";
						}
						
					endforeach;?>
				> <?php echo $value['per_nome']?><br />
				
				<?php endforeach;?>
			</td>
		</tr>
		<?php endforeach;?>
		
	</table>
	</div>
    <?php echo form_close(); ?>
    
</div>
</div>

<!-- <pre> -->
<?php //debug_zval_dump($permissoes); ?>

<?php //debug_zval_dump($gfp); ?>

<?php //debug_zval_dump($modulos); ?>
<!-- </pre> -->