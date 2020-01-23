
<div class="row">
<div class="col-md-12">

	<!-- <h1><w?php echo $token;?></h1>  -->

	<?php if(isset($content)): ?><h3><?php echo $content;?></h3><?php endif;?>
	
	
	<?php 

	echo validation_errors();
	
	echo form_open('admin/usuario/salvar'); 
	
	echo form_hidden('ok', $token);
	
	if (isset($usu['usu_id'])) echo form_input('id', $usu['usu_id'], 'style="display:none"');
	
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
			<td >Nome:</td>
			<td ><?php echo isset($usu) ? form_input('nome', $usu['usu_nome']) : form_input('nome'); ?></td>
		</tr>
		
		<tr>
			<td >E-mail:</td>
			<td ><?php echo isset($usu) ? form_input('email', $usu['usu_email']) : form_input('email'); ?></td>
		</tr>
		
		<tr>
			<td >Ativo:</td>
			<td >
				<INPUT TYPE="checkbox" 
				NAME="delete" 
				VALUE="1"
				<?php if(isset($usu) && $usu['usu_delete']==0){ echo "";}else echo "CHECKED";?>
				>
								
			</td>
		</tr>
		
		<tr>
			<td >Expira em:</td>
			<td ><?php echo isset($usu) ? form_input('expira', $usu['usu_data_expira']) : form_input('expira'); ?></td>
		</tr>
		
		<tr>
			<td >Grupo:</td>
			<td >
			
				<?php //echo isset($usu) ? form_input('grupo', $usu['grupo']['gru_nome']) : form_input('grupo'); ?>
				
				<?php if (isset($grupos)):?>
			
				<select name="grupo">
				<?php 
				if(isset($usu)){
				
					echo '<option selected="selected" value="'.$usu['grupo']['gru_id'].'">'.$usu['grupo']['gru_nome'].'</option>';
				
					foreach ($grupos as $chave=>$valor):	
					
						if($valor['gru_id'] != $usu['grupo']['gru_id']){
							echo '<option value="'.$valor['gru_id'].'">'.$valor['gru_nome'].'</option>';
						}			
					endforeach;
					
				}else{

					foreach ($grupos as $chave=>$valor):
	
						echo '<option value="'.$valor['gru_id'].'">'.$valor['gru_nome'].'</option>';
					
					endforeach;

				}
				?>
				
				
				</select>
				
			<?php endif; ?>
			
			</td>
		</tr>
		
		<tr>
			<td >Senha:</td>
			<td >
				<?php if (isset($usu)) { ?>
                <?php echo form_password('senha', '', 'id="senha" disabled'); ?>
                <?php echo form_checkbox('reset_senha', 1, false, 'id="reset_senha" title="Editar Senha"'); ?>
            	<?php } else { ?>
                <?php echo form_password('senha', '', 'id="senha"'); ?>
                <?php echo form_hidden('reset_senha', 1); ?>
            	<?php } ?>
			</td>
		</tr>

    </table>
    </div>
    <?php echo form_close(); ?>
    
</div>
</div>

<!-- <pre> -->
<?php //debug_zval_dump($result);?>

<?php //debug_zval_dump($funcionalidades); ?>
<!-- </pre> -->