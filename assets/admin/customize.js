( function( $ ) {
    'use strict'; 
    if (typeof wp !== 'undefined' && typeof wp.customize !== 'undefined') {
        wp.customize.bind('ready', function() {
            architronixRangeSlider();
            architronixGoogleFontField();
        });
    }

    function architronixRangeSlider(){
        $('[type="range"]').each(function(){
            $(this).wrap('<div class="architronix-range-control" />');
            let value = $(this).val();
            let prefix = $(this).attr('prefix');
            value = prefix? prefix+value : value;

            let suffix = $(this).attr('suffix');
            value = suffix? value+suffix : value;
            
            $(this).closest('.architronix-range-control').append('<input type="text" class="range-value" value="'+value+'">');
        });

        $(document).on('change', '[type="range"]', function(){
            let value = $(this).val();
            let prefix = $(this).attr('prefix');
            value = prefix? prefix+value : value;

            let suffix = $(this).attr('suffix');
            value = suffix? value+suffix : value;

            $(this).closest('.architronix-range-control').find('.range-value').val(value);
        })

        $(document).on('keyup', '.architronix-range-control .range-value', function(){
            let value = $(this).val();
            $(this).closest('.architronix-range-control').find('[type="range"]').val(parseInt(value)).trigger('change');
        })    
    }

    function architronixGoogleFontField(){
        $('.architronix-google-fonts .googlefont-name select').on('select2:select', function (e) {
            var data = e.params.data;
            var field_id = $(this).attr('id');

            $.ajax({
                url : architronixCustomize.ajax_url,
                type : 'post',
                data : {
                    action : 'architronixGoogleFontField',
                    nonce : architronixCustomize.nonce,
                    font_id : data.id,
                    field_id : field_id
                },
                success : function( response ) {
                    $('#'+field_id).closest('.architronix-google-fonts').find('.googlefont-variants .rwmb-input-list').empty().html(response.variants);
                    $('#'+field_id).closest('.architronix-google-fonts').find('.googlefont-subsets .rwmb-input-list').empty().html(response.subsets);
                    $('#'+field_id).closest('.architronix-google-fonts').find('.googlefont-family input').val(response.family);
                }
            });
           
          
        });
    }
    

    $(document).on('click', '.rwmb-field .devices button', function(){
        var device = $(this).data('device');       
        $('.wp-full-overlay-footer [data-device="'+device+'"]').trigger('click');
    });

    $(document).on('click', '.wp-full-overlay-footer .devices button', function(){
        var device = $(this).data('device');
        $('.meta-field-device').hide();
        $('.meta-field-'+device).show();
        $('.rwmb-field .devices button').removeClass('active').attr('aria-pressed', 'false');
        $('.rwmb-field [data-device="'+device+'"]').addClass('active').attr('aria-pressed', 'true');
    });

    $(document).on('click', '.rwmb-field .color-modes button', function(){
        var mode = $(this).data('mode');
        $('.meta-field-color-mode').hide();
        $('.meta-field-mode-'+mode).show();
        $('.rwmb-field .color-modes button').removeClass('active').attr('aria-pressed', 'false');
        $('.rwmb-field [data-mode="'+mode+'"]').addClass('active').attr('aria-pressed', 'true');
    });

    $('.rwmb-field .color-modes .active').trigger('click');
    
} )( jQuery );    