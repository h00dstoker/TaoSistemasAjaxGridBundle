var tao_grid_checkall = {};
var tao_grid_interval = null;

function tao_grid_init( grid_id ) {
    var r0 = $('DIV.batch.' + grid_id );
    var r = r0.closest('DIV.grid');

    tao_grid_init_grid($(r));

    r0.find('SELECT').change( tao_grid_selected );
    //r0.find('A.fancybox').fancybox({'width': 800, 'height': 300});

    if(tao_grid_interval == null)
        tao_grid_interval = window.setInterval('tao_grid_batch_menu(' + grid_id + ')', 1000);
}

function tao_grid_selected(e) {
    var v = $(e.target).val();
    var o = $.parseJSON(v);
    $(e.target).closest('.grid').find('A.trigger').attr('data-frame-src', o['href'] );
    $(e.target).closest('.grid').find('A.trigger').attr('data-modal-title', o['title'] );
    $(e.target).closest('.grid').find('A.trigger').click();
}

function tao_check_all_clicked(e) {
    $(e.target).closest('DIV.grid').find('.item_id').each( function() {
        this.checked = e.target.checked;
    });
}

function tao_grid_remove_selection( grid_id ) {
    var r0 = $('DIV.batch.' + grid_id );
    var r = r0.closest('DIV.grid');

    r.find('.item_id').each( function() {
        this.checked = false;
    });

    r.find('.all_filtered').attr('checked', false);
}

function tao_grid_batch_menu( grid_id ) {
    var r0 = $('DIV.batch.' + grid_id );
    var r = r0.closest('DIV.grid');

    if ( checkall = r.find('.list').find('INPUT.check_all') ) {
        if ( checkall.attr('taogrid_active') != 1 ) {
            checkall.bind('click', tao_check_all_clicked );
            checkall.attr('taogrid_active', 1);
        }
    }

    var items = [];
    r.find('.item_id').each( function() {
        if ( this.checked ) items.push(this.value);
    });
    it_chk = items.length;

    if ( it_chk > 0 ) {
        r0.find('SELECT.op').val('');
        r0.find('.sel').html(it_chk + ' ' + ( it_chk == 1 ? ' item' : ' items' ) );
        r0.fadeIn('slow');
    } else {
        r0.fadeOut('fast');
    }

    /* store selected item ids in a cookie */
    if ( p = r.attr('id') ) {
        cookie_name = p + '_selected_ids';
    } else {
        cookie_name = 'tao_grid_selected_ids';
    }

    /*console.log(r0.find('INPUT.all_filtered:first').prop('checked'));*/

    if ( r0.find('INPUT.all_filtered:first').prop('checked') ) {
        v = 'all_filtered';
    } else {
        v = items.join('|');
    }

    $.cookie(cookie_name, v, {path:'./'});
}


function tao_grid_set_page(obj, page) {
    r0 = $(obj).closest('DIV.grid');
    filter = r0.find('DIV.filter').find('FORM');
    filter.find('INPUT[name=page]').val(page);
    filter.submit();
}

function tao_grid_set_sort_column(obj, col, dir) {
    r0 = $(obj).closest('DIV.grid');
    filter = r0.find('DIV.filter').find('FORM');
    filter.find('INPUT[name=page]').val(1);
    filter.find('INPUT[name=sort_col]').val(col);
    filter.find('INPUT[name=sort_dir]').val(dir);
    filter.submit();
}



function tao_grid_init_grid(grid) {
    grid.find('.filter FORM').ajaxForm(
        {
         beforeSubmit: tao_grid_pre_update,
         success: tao_grid_update,
         dataType: 'json',
         type: 'post',
         contentType: "application/x-www-form-urlencoded;charset=UTF-8",
        }
    );
}

function tao_grid_pre_update(form, options) {
    var grid = $(form).closest('DIV.grid');

    tao_grid_add_message_loading(grid);
}

function tao_grid_add_message_loading(grid) {
    console.log('tao_grid_add_message_loading ERRADO');
    $(grid).find('.list').addClass('loading');
}

function tao_grid_remove_message_loading(grid) {
    console.log('tao_grid_remove_message_loading ERRADO');
    $(grid).find('.list').removeClass('loading');
}

function tao_grid_update(r, status, xhr, form) {
    var grid = $(form).closest('DIV.grid');

    //$(grid).find('.filter .form').html( r.h_filtro );
    if(tao_grid_interval != null) {
        window.clearInterval(tao_grid_interval);
        tao_grid_interval = null;
    }



    if(r.status = 'ok') {
        $(grid).replaceWith(r.html);
    } else {
        alert('erro na requisicao');
    }

    /*if ( r.h_listagem ) {
        $(grid).find('.list').html( r.h_listagem ).fadeIn();
        eventos_fancybox_init();
    }
    tao_grid_init_grid($(grid));

    $('#sc').val(r.sc);
    $('#sd').val(r.sd);*/

    tao_grid_remove_message_loading(grid);
}