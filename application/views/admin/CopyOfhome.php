
	<div class="row">
		<div class="col-md-12">
			<?php if(isset($temPermissao) && !$temPermissao):?>
				Voc&ecirc; n&atilde;o tem permiss&atilde;o para acessar o URL solicitada. 
			<?php endif;?>
			
			<?php if(isset($mensagem)): ?>
				<div class="alert alert-danger alert-dismissible" role="alert">
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				  <strong><?php echo $mensagem; ?></strong> Voc&ecirc; n&atilde;o tem permiss&atilde;o para acessar o URL solicitado.<br /><span>&nbsp;</span>
				</div>
				
			<?php else: ?>
				<span>&nbsp;</span><br /><span>&nbsp;</span>
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
		
		<div class="col-md-3 pmcarea">
		
			<div><?php include_once 'area/stakeholders/index.php'; ?></div><br clear="both" />
			
			<div><?php include_once 'area/equipe/index.php'; ?></div>
			
		</div>
		
		<div class="col-md-3 pmcarea">
		
			<div><?php include_once 'area/premissas/index.php'; ?></div><br clear="both" />
			
			<div><?php include_once 'area/grupo-entregas/index.php'; ?></div>
			
		</div>
		
		<div class="col-md-3 pmcarea">
		
			<div><?php include_once 'area/riscos/index.php'; ?></div><br clear="both" />
			
			<div><?php include_once 'area/linha-tempo/index.php'; ?></div><br clear="both" />
			
			<div><?php include_once 'area/custos/index.php'; ?></div>
			
		</div>
		
		
	</div>
