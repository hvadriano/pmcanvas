
<?php //debug_zval_dump($cards_justificativas); ?>

<div class="modal fade" id="modal" role="dialog">
	<?php include_once 'form/form_card.php'; ?>
</div>

<div class="modal fade" id="modalLinkCard" role="dialog">
	<?php include_once 'form/form_card_link.php'; ?>
</div>

<div class="modal fade" id="modalEntrega" role="dialog">
	<?php include_once 'area/grupo-entregas/form_entrega.php'; ?>
</div>

	<div class="row">
		<div class="col-md-12">
			<?php if(isset($temPermissao) && !$temPermissao):?>
				Voc&ecirc; n&atilde;o tem permiss&atilde;o para acessar o URL solicitada. 
			<?php endif;?>
			
			<?php if(isset($mensagem)): ?>
				<div class="alert alert-danger alert-dismissible" role="alert">
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				  <strong><?php echo $mensagem; ?></strong> Voc&ecirc; n&atilde;o tem permiss&atilde;o para realizar a opera&ccedil;&atilde;o.<br /><span>&nbsp;</span>
				</div>
				
			<?php else: ?>
				
			<?php endif;?>
		</div>
	</div>

	<div class="row" id="content">
	
		<div class="col-md-3 pmcarea">
		
			<div><?php include_once 'area/justificativas/index.php'; ?></div><br clear="both" />
			
			<div><?php include_once 'area/objetivos/index.php'; ?></div><br clear="both" />
			
			<div><?php include_once 'area/beneficios/index.php'; ?></div>
		
		</div>
		
		<div class="col-md-3 pmcarea">
		
			<div><?php include_once 'area/produto/index.php'; ?></div><br clear="both" />
			
			<div><?php include_once 'area/requisitos/index.php'; ?></div>
			
		</div>	
		
		<div class="col-md-6 pmcarea2">
			
			<div style="margin-left:5px; margin-right: 5px;">
			<div class="col-md-6 pmcarea3">
		
				<div style="margin-right: 5px;"><?php include_once 'area/stakeholders/index.php'; ?></div><br clear="both" />
				
				<div style="margin-right: 5px;"><?php include_once 'area/equipe/index.php'; ?></div>
				
			</div>
			</div>
			
			<div style="margin-left:5px; margin-right: 5px;">
			<div class="col-md-6 pmcarea3">
			
				<div style="margin-left: 5px;"><?php include_once 'area/premissas/index.php'; ?></div><br clear="both" />
				
				<div style="margin-left: 5px;"><?php include_once 'area/grupo-entregas/index.php'; ?></div>
				
			</div>
			</div>
			
			<div style="margin-left:5px; margin-right: 5px;">
			<div class="col-md-12 pmcarea3">
			
				<div><?php include_once 'area/restricoes/index.php'; ?></div>
			
			</div>
			</div>
			
		</div>
			
		<div class="col-md-3 pmcarea">
		
			<div><?php include_once 'area/riscos/index.php'; ?></div><br clear="both" />
			
			<div><?php include_once 'area/linha-tempo/index.php'; ?></div><br clear="both" />
			
			<div><?php include_once 'area/custos/index.php'; ?></div>
			
		</div>
		
		
	</div>
