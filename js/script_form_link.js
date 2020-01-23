$(document).ready(function(){
	
	$( '.linkDe' ).live( "click", function() {
		
		var $this 		= $( this );
		var $cardId 	= $this.attr('id').replace("linkDe_", "");
		var $projetoId 	= $( '#projetoId' ).val();
		
		var $base_url = $( '#base_url' ).val();
		$.post( $base_url+"admin/card/link", {cardDe : $cardId, projetoId : $projetoId }, function( response, status, xhr ) {
			
			if ( status == "error" ) {
			    
				var msg = "Ocorreu um erro: ";
				$( "#modal_response_area" ).html( msg + xhr.status + " " + xhr.statusText );
				
			} else {
				
				console.log(response);
				console.log(response.action);
				console.log(response.array_areas);
				console.log(response.cards);
				console.log(response.projetoId);
				
				var $area = response.array_areas[response.card.area_fk];
				var $post = response.card.post;

				$( '#modalTitleLink' ).html("&Aacute;rea:&nbsp;"+$area +", Post-it:&nbsp;" + $post);
				
				$( '#card_de' ).val(response.card.id);
				
				var $areas = [];
				var $i = 0;
				var $j = 2;
				
//				<h4>Justificativas</h4>
//				<div class="col-md-4"><input type="checkbox" />&nbsp;Novo Old</div>
//				<div class="col-md-4"><input type="checkbox" />&nbsp;popof popof</div>
//				<br />
//				<hr>
				
				var $cardsParaLink = "";
				$.each( response.cards, function ( index, value ) {
					
					if ( ! contains( $areas, value.area_fk ) ) { // se areas ainda não estiver neste array
						$areas.push( value.area_fk );
						console.log( value.area_fk );
						
						$i++;
						
						if ( $i == $j ) {
							$cardsParaLink += '</div><hr />';
							$j++;
						}
						
						$cardsParaLink += '<div class="col-md-12"><h4 style="border-top: 1px solid #ededed">'+response.array_areas[value.area_fk]+'</h4>';
						
					}
					
					var $check = ( ! contains( response.link, value.id ) ) ? '' : 'checked="checked"';
					
					$cardsParaLink += '<div class="col-md-6"><input '+$check+' class="check_link" type="checkbox" value="'+value.id+'" />&nbsp;'+value.post+'</div>';
					console.log( value );
					
					
				});
				
				$( '#div_cards_para_link' ).html( $cardsParaLink );
				
			}
			
		}, "json" );
		
	});
	
	
	$( '.check_link' ).live( "click", function() {
		
		var $this = $( this );
		var $cardId = $( '#card_de' ).val();
		
		var $post = {
				cardDe		: $cardId,
				check		: $this.attr( "checked" ),
				cardPara	: $this.attr( "value" )
		};
		
		console.log( $post );

		var $base_url = $( '#base_url' ).val();
		
		$.post( $base_url+"admin/card/check", $post,
				function( response, status, xhr ) {
			
			if ( status == "error" ) {
			    
				var msg = "Ocorreu um erro: ";
				$( "#modal_response_area" ).html( msg + xhr.status + " " + xhr.statusText );
				
			} else {
				
				
			}
			
		}, "json" );
		
	});
	
});

function contains(arr, x) {
    return arr.filter(function(elem) { return elem == x }).length > 0;
}