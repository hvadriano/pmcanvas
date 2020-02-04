$(document).ready(function(){
	
	var $area_hover = null;
	
	// area de origem onde o mouse est�
	$('.pmcareahover').click(function() {
		//console.log(this.id);
		$origem = this.id;
	});
	// -------------------------------------------------
	
	// configura drag and drop
	$(".pmcareahover").sortable({
		connectWith: ['.pmcareahover'],
		placeholder: 'dragHelper',
		scroll: true,
		revert: true,
		stop: function( e, ui ) {

		}
	});
	
	// adiciona um crad para na �rea desejada -----------------------------------------
	$('.addcard').click(function() {
		var $this = $( this );
		var $div_area = $this.parents('div').find('.pmcareahover').attr('id');
		var $title = $this.parents('h2').find('.title').html();
		var $areaId = $this.parents('h2').find('.area').val();
		console.log($div_area);
		console.log($title);
		console.log($areaId);
		
		$( '#areaId' ).val($areaId);
		$( '#divArea' ).val($div_area);
		$( '#modalTitle' ).html("Post-it:&nbsp;" + $title);
		
		// limpando os campos do novo formul�rio
		$( '#cardId' ).val("0");
		$( '#post' ).val("");
		$( '#descricao' ).val("");
		$( '#url' ).val("");
		$( "#btnFormCard" ).html( "Salvar" );
		$( '#btnFormRemover' ).addClass( "hidden" );
		
	});
	// --------------------------------------------------------------------------------
	
	$('.pmcareahover').sortable({
		opacity: 0.6,
		cursor: 'move',
		update: function(){

			var $destino = $(this).attr("id");
			var li = $(this).find('li');
			
			if( typeof($origem)  === "undefined" ) location.reload(); // para recarregar a p�gina quando houver este erro
			
			//console.log(li);
			
			var order = $(this).sortable("serialize")+'&acao=atualizar&origem='+$origem+'&destino='+$destino;
			
			var $base_url = $( '#base_url' ).val();
			$.post( $base_url+"admin/card/drag", order, function(retorno){
				//$('#div_justificativa').append(retorno);
				console.log(retorno);
				console.log("---------------------------------------------------------");
			}, "json");
	
			//console.log($(this));
		}
	});
	
//	$('#'+$area_hover).find('ul').find('li').droppable({
//        activeClass : 'ui-state-default',
//        hoverClass : 'ui-state-hover',
//        drop : function(event, ui){
//            //ui.draggable.find('.drag').remove();
//            //$(this).find('.aqui').remove();
//        	
//        	//console.log(ui.draggable);
//        	//console.log(event.draggable);
//
//            $(this).append(ui.draggable);
//        }
//    });
//	
	
			
});