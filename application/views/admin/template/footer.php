	</div>
	
	<?php if( $this->uri->segment(2) != 'login' ) :?>
	<footer id="footer-template">
		<div class="container">
			<div class="row">
				<div class="col-md-12">&copy; Adriano Vieira <?php echo date('Y')?></div>
			</div>
		</div>	
	</footer>
	<?php endif; ?>

    <!-- Bootstrap core JavaScript 
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
<!--     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> -->
    <script src="<?php echo base_url(); ?>scripts/jquery-1.11.3.min.js"></script>
    <script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>js/bootbox.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="<?php echo base_url(); ?>js/ie10-viewport-bug-workaround.js"></script>
    
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>css/jquery-ui-1.8.5.custom.css" />
<!-- 	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script> -->
<!--     <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.5/jquery-ui.min.js"></script> -->
    
    <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery_1.4.2_jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/jqueryui_1.8.5_jquery-ui.min.js"></script>
    
    <script src="<?php echo base_url(); ?>js/script.js"></script>
    <script src="<?php echo base_url(); ?>js/script_form.js"></script>
    <script src="<?php echo base_url(); ?>js/script_form_link.js"></script>
    
  </body>
</html>