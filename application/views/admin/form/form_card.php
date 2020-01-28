
<input type="hidden" id="divArea" name="divArea" />

<form id="form_card" method="post">

<input type="hidden" id="areaId" name="area_fk" />
<input type="hidden" id="cardId" name="id" value="0" />
<input type="hidden" id="projetoId" name="projeto_fk" value="<?php echo $projetoId; ?>" />

<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header"><h3 id="modalTitle"></h3></div>
		<div class="modal-body">
		
<div id="modal_response_area"></div>
		
	<div class="col-md-12">
		<p>
			<label for="post">Post:<sup>*</sup></label>&nbsp;<input id="post" type="text" name="post" value="" style="width:90%" maxlength="200" />
		</p>
	</div><br clear="both">
	
	<div class="col-md-12">
		<p>
			<label for="descricao">Descri&ccedil;&atilde;o:</label>&nbsp;<textarea rows="2" cols="60" id="descricao" name="descricao"></textarea>
		</p>
	</div><br clear="both">
	
	<div class="col-md-12">
		<p>
			<label for="url">URL:</label>&nbsp;&nbsp;<input type="text" id="url" name="url" value="" style="width:90%" maxlength="100" />
		</p>
	</div>
	
	<div class="col-md-12">
		
		<label for="cor">Cor:</label><br />
		
		<div class="col-md-3"><input type="radio" name="cor" id="31b0d5" value="#31b0d5" checked="checked" />&nbsp;<span style="color: #31b0d5"><b>Azul</b></span></div>
		<div class="col-md-3"><input type="radio" name="cor" id="ec971f" value="#ec971f" />&nbsp;<span style="color: #ec971f"><b>Laranja</b></span></div>
		<div class="col-md-3"><input type="radio" name="cor" id="00FF00" value="#00FF00" />&nbsp;<span style="color: #449d44"><b>Verde</b></span></div>
		<div class="col-md-3"><input type="radio" name="cor" id="c9302c" value="#c9302c" />&nbsp;<span style="color: #c9302c"><b>Vermelho</b></span></div>
		
	</div>
	
	<p>&nbsp;</p><br clear="both" />
		
		</div>
		<div class="modal-footer">
		
			<a id="btnFormRemover" class="btn btn-danger hidden" data-dismiss="modal">Excluir</a>
			<a id="btnFormCancelar" class="btn btn-default" data-dismiss="modal">Cancelar</a>
			<a id="btnFormCard" href="#" class="btn btn-primary">Salvar</a>
			
		</div>
	</div>
</div>
</form>	
