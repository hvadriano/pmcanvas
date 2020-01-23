$(document).ready(function(){
	
	$( '#btnFormCard' ).live( "click", function() {
		
		var $this = $( this );
		var $formId = $this.parents('form').attr('id');
		
		var $post = $this.parents('form').find('#post').val();
		
		console.log($formId);
		console.log($post);
		
		if($post==""){
			$this.parents('form').find('#post').addClass("border-required");
			return false;
		}
		
		var $base_url = $( '#base_url' ).val();
		
		$.post( $base_url+"admin/card/salvar", $( "#"+$formId ).serialize(),
				function( response, status, xhr ) {
			
			if ( status == "error" ) {
			    
				var msg = "Ocorreu um erro: ";
				$( "#modal_response_area" ).html( msg + xhr.status + " " + xhr.statusText );
				
			} else {
				
				console.log(response.action);
				console.log(response);
				
				if( response.action == "CREATE" ) {
					
					var $card = '<div id="card_'+response.id+'" class="lista_sorteavel" style="background-color: '+response.cor+'">'
									+'<div style="width: 94%; float: left;">'
									+'<a class="editarcard" id="editar_'+response.id+'" href="#modal" data-toggle="modal" title="Editar" style="text-decoration: none; color: #000000">'
										+response.post
									+'</a>'
									+'</div>'
									
									+'<div>'
									+'<div style="width: 6%; float: left;">'
									+'<a id="linkDe_'+response.id+'" href="#modalLinkCard" data-toggle="modal" class="pull-right linkDe" title="Linkar Cards"><span class="glyphicon glyphicon-link" aria-hidden="true"></span></a>'
									+'</div><br clear="both" />'
								+'</div>';
					
					var $divArea = $( '#divArea' ).val();
					
					$( '#'+$divArea ).prepend( $card );
					$( "#cardId" ).val(response.id);
					
				} else {
					
					var $card = ''
					+'<div style="width: 92%; float: left;">'
						+'<a class="editarcard" id="editar_'+response.id+'" href="#modal" data-toggle="modal" title="Editar" style="text-decoration: none; color: #000000">'
							+response.post
						+'</a>'
						+'</div>'
						
						+'<div>'
						+'<div style="width: 8%; float: left;">'
						+'<a id="linkDe_'+response.id+'" href="#modalLinkCard" data-toggle="modal" class="pull-right linkDe" title="Linkar Cards"><span class="glyphicon glyphicon-link" aria-hidden="true"></span></a>'
						+'</div><br clear="both" />';
					
					$( "#card_"+response.id ).html( $card );
					$( "#card_"+response.id ).css( "background-color", response.cor );
				}
				
				$this.parents('form').find('#post').removeClass("border-required");
				$( "#btnFormCancelar" ).html( "Fechar" );
				$( "#btnFormCard" ).html( "Editar" );
				
				$( '#btnFormRemover' ).removeClass( "hidden" );
			}
			
		}, "json" );
		
	});
	
	$( '.editarcard' ).live( "click", function() {
		
		var $this = $( this );
		var $cardId = $this.attr('id').replace("editar_", "");
		var $title = $this.parents('.pmcarea_item_form').find('.title').html();
		
		$( '#modalTitle' ).html("Post-it:&nbsp;" + $title);
		var $base_url = $( '#base_url' ).val();
		
		$.post( $base_url+"admin/card/editar", {cardId : $cardId},
				function( response, status, xhr ) {
			
			if ( status == "error" ) {
			    
				var msg = "Ocorreu um erro: ";
				$( "#modal_response_area" ).html( msg + xhr.status + " " + xhr.statusText );
				
			} else {
				
				console.log(response.action);
				console.log(response);
				
				// preenchendo os campos do formulário para edição
				$( '#cardId' ).val( response.id );
				$( '#areaId' ).val( response.area_fk );
				$( '#post' ).val( response.post );
				$( '#descricao' ).val( response.descricao );
				$( '#url' ).val( response.url );
				$( "#btnFormCard" ).html( "Editar" );
				$( response.cor ).attr( "checked", true );
				
				$( '#btnFormRemover' ).removeClass( "hidden" );
			}
			
		}, "json" );
		
	});
	
	$( '#btnFormRemover' ).live( "click", function() {
	
		var $this = $( this );
		var $cardId = $this.parents('form').find('#cardId').attr("value");
		
		bootbox.confirm("Deseja excluir esse Card?", function(result) {
			  console.log(result);
			  console.log($cardId);
			  
			  //update card para deletado
			  if ( result == true ) {
				  
				  var $base_url = $( '#base_url' ).val();
				  
				  $.post( $base_url+"admin/card/excluir", {cardId : $cardId}, function( response, status, xhr ) {
						
						if ( status == "error" ) {
						    
							var msg = "Ocorreu um erro: ";
							$( "#modal_response_area" ).html( msg + xhr.status + " " + xhr.statusText );
							
						} else {
							
							console.log(response.action);
							console.log(response);
							
							$( '#card_' + $cardId ).hide(500);


						}
						
					}, "json" );
				  
			  }
			  
		});
	
	});
	
	
});