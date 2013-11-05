$( function() {
	window.setInterval('listagem_batch_menu()', 500);
});

function listagem_init_filter() {
	
	var h = $('.filter_holder').html();
	$('.filter_holder').html('<div class="inner">' + h + '</div>');
	
	$('.filter_holder').prepend('<a class="switch">ocultar filtro</a>');
	
	$('.filter_holder FORM').submit( function(e) {
		$(e.target).closest('.filter_holder .inner').slideUp();
	} );
}


function listagem_init() {
	$('.listagem .chk_all').click( listagem_chk_all );
	$('.listagem .batch SELECT.operacao').change( listagem_batch );
}


function listagem_chk_all(e) {
	$(e.target).closest('TABLE.listagem').find('.chk_item').each(
		function() {
			$(this).get(0).checked = e.target.checked;
		}
	);
}


function listagem_batch_menu() {
	it_chk = 0;
	$('.listagem .chk_item').each( function() {
		if ( this.checked ) it_chk++;
	});
	
	if ( it_chk > 0 ) {
		$('.ajax_grid .batch .itens_sel').html(it_chk + ' ' + ( it_chk == 1 ? ' item' : ' itens' ) );

		$('.ajax_grid .batch').fadeIn('slow');
	} else {
		$('.ajax_grid .batch').fadeOut('fast');
	}
}



function listagem_batch(e) {
	var par = $.evalJSON( e.target.value )	
	
	// define o escopo
	var sc = -1;
	if ( $(e.target).closest('.batch').find('.todos_filtrados:first').get(0).checked ) {
		sc = 'filter';
	} else {
		var ids = [];
		$(e.target).closest('DIV.listagem').find('.chk_item').each(
			function() {
				if ( this.checked) ids.push(this.value);
			}
		);
		
		if ( ids.length > 0 ) sc =  ids.join('_');
	}
	
	$.cookie("listagem_batch_sc", sc);
	
	
	
	if ( sc != -1 ) {
		$(e.target).closest('DIV.batch').find('.trigger')
				   .fancybox({width: par.width, height: par.height})
				   .attr('href', par.url)
				   .attr('title', par.title )
				   .click();
	} else {
		alert('Nenhum item selecionado. Escolha antes os itens nos quais deseja aplicar a açao.');
	}
	
	$(e.target).val('');
	
}

