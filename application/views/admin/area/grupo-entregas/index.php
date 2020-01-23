<div class="col-md-12 pmcarea_item2 pmcarea_item_form" id="pmcarea_grupoentregas">

	<h2>
		<span class="title">Grupos de Entregas</span>
		<input type="hidden" class="area" value="9" />
		<a href="#modal" data-toggle="modal" class="pull-right addcard"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
	</h2>
	
	<div id="div_grupoentregas" class="pmcareahover">
		
		<?php if ( isset( $cards['_grupoentregas'] ) ) : ?>
		<?php foreach ( $cards['_grupoentregas'] as $key=>$card ) :?>
		
		<div id="card_<?php echo $card[ 'id' ]; ?>" class="lista_sorteavel" style="background-color: <?php echo $card[ 'cor' ]; ?>">
			<div style="width: 82%; float: left;">
			<a class="editarcard" id="editar_<?php echo $card[ 'id' ]; ?>" href="#modal" data-toggle="modal" title="Editar" style="text-decoration: none; color: #000000">
				<?php echo $card[ 'post' ]; ?>
			</a>
			</div>
			
			
			<div style="width: 18%; float: left;">
			<a id="linkDe_<?php echo $card[ 'id' ]; ?>" href="#modalLinkCard" data-toggle="modal" class="pull-right linkDe" title="Linkar Cards"><span class="glyphicon glyphicon-link" aria-hidden="true"></span></a>
			<span style="width: 4px;" class="pull-right">&nbsp;</span>
			<a id="entrega_<?php echo $card[ 'id' ]; ?>" href="#modalEntrega" data-toggle="modal" class="pull-right entrega" title="Entregas do Grupo"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span></a>
			</div>
			<br clear="both" />
		</div>
		
		<?php endforeach; ?>
		<?php endif; ?>
		
	</div>

</div>