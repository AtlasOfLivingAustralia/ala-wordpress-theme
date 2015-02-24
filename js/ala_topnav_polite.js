// ALA wordpress theme: function to politely move ALA navbar down below Wordpress admin bar if present.

jQuery(document).ready(function($) {   
    if( $('#wpadminbar').length ) {
         // wordpress admin bar is present
         var wpadminheight = $('#wpadminbar').css('height');
         $('#alatopnav').css({top: wpadminheight});
    } else {
        // wordpress admin bar is not present
        $('#alatopnav').css({top: 0});
    }
});

