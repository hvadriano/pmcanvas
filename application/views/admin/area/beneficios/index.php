<div class="col-md-12 pmcarea_item pmcarea_item_form" id="pmcarea_beneficios">

	<h2>
		<span class="title">Benef&iacute;cios Futuro</span>
		<input type="hidden" class="area" value="3" />
		<a href="#modal" data-toggle="modal" class="pull-right addcard"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
	</h2>
	
	<div id="div_beneficios" class="pmcareahover">
		
		<?php if ( isset( $cards['_beneficios'] ) ) : ?>
		<?php foreach ( $cards['_beneficios'] as $key=>$card ) :?>
		
		<div id="card_<?php echo $card[ 'id' ]; ?>" class="lista_sorteavel" style="background-color: <?php echo $card[ 'cor' ]; ?>">
			<div style="width: 92%; float: left;">
			<a class="editarcard" id="editar_<?php echo $card[ 'id' ]; ?>" href="#modal" data-toggle="modal" title="Editar" style="text-decoration: none; color: #000000">
				<?php echo $card[ 'post' ]; ?>
			</a>
			</div>
			
			<div style="width: 8%; float: left;">
			<a id="linkDe_<?php echo $card[ 'id' ]; ?>" href="#modalLinkCard" data-toggle="modal" class="pull-right linkDe" title="Linkar Cards"><span class="glyphicon glyphicon-link" aria-hidden="true"></span></a>
			</div>
			<br clear="both" />
		</div>
		
		<?php endforeach; ?>
		<?php endif; ?>
		
	</div>

</div>