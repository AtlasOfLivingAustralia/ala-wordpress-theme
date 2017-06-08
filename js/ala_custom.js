// ALA custom functions
var tocWidth = 0; // global
var alaHeaderHeight = 0;
var alaFooterHeight = 0;

function resizeToc() {
    var toc = jQuery('.toc-floating-menu');
    var sidebar = jQuery('.sidebar-col');

    if (toc && sidebar) {
        toc.width(sidebar.width());

        if (jQuery(window).width() > 992) {
            jQuery('.toc-floating-menu').affix({
                offset: {
                    top: jQuery('.toc-floating-menu').offset().top - alaHeaderHeight - 35,
                    bottom: jQuery('footer').outerHeight(true) + jQuery('.alert-creativecommons').outerHeight(true)
                }
            });
        }
    }
}

// wait for all elements to render (including images) - will be slower than $(document).ready()
jQuery(window).load(function($) {
    resizePanels();

    jQuery( window ).resize(function() {
        resizePanels();
        resizeToc();
    });

    function resizePanels() {
        var panels = jQuery('.panel.panel-default'); // might want to use a more specific selector (e.g. add an extra class to those panel divs)
        var max = 0;
        jQuery.each(panels, function(i,el) {
            var thisMax = jQuery(el).find('img').outerHeight() + jQuery(el).find('.panel-body').outerHeight();
            var icon = jQuery(el).find('a');
            if (max < thisMax) {
                max = thisMax;
            }
        });

        if (max > 0) {
            panels.innerHeight(max); // set height to all divs
        }
    }
});

jQuery(document).ready(function($) {

    // Change banner images based on month - format jtron-bg-month-01-770px.jpg
    if ($('#ala-jumbotron').length) { //if (document.getElementById("ala-jumbotron")) {
        var month = ("0" + new Date().getMonth()).slice(-2);
        var filename = "/wp-content/themes/ala-wordpress-theme/img/jtron-bg-month-" + month + "-770px.jpg"
        document.getElementById("ala-jumbotron").style.backgroundImage = "url('" + filename + "')";
    }
 
    // update ALA stats
    if ($(".main-stats").length) {
        var statsUrl = "https://dashboard.ala.org.au/dashboard/homePageStats";
        $.getJSON(statsUrl, function(data) {
            updateStats("#allRecords", data.recordCounts.count.toLocaleString());
            updateStats("#allSpecies", data.speciesCounts.count.toLocaleString());
            updateStats("#allDownloads", data.downloadCounts.events.toLocaleString());
            updateStats("#allUsers", data.userCounts.count.toLocaleString());
        });
    }
    
    // Add floating table of contents (ToC)
    if ($('#toc_container').length) {
        $('#toc_container').addClass('toc-floating-menu affix-top');
        $('#toc_container').wrapAll("<div class='col-md-3 col-md-push-9 sidebar-col' id='toc-wrapper' />");
        $('#alaEditable').children().not('#toc-wrapper').wrapAll("<div id='alaInnerEditable' class='col-md-8 col-md-pull-3' />");
        $('#alaInnerEditable').css('padding-left', '0');
        $('.toc_title').replaceWith( "<h4>Page contents:</h4>" );
        $('.toc_list').addClass('nav').wrapAll("<div class='profile-usermenu margin-bottom-2'>");
    }

    if ($('.navbar-fixed-top').length && $('.toc-floating-menu').length) {
        var alaHeaderHeight = $('.navbar-fixed-top').outerHeight(true); //  + $('.info-hub-banner').outerHeight(true) + $('.breadcrumb').outerHeight(true);
        var alaFooterHeight = $('footer').outerHeight(true) + $('.alert-creativecommons').outerHeight(true);
        
        if ($(window).width() > 992) {
            $('.toc-floating-menu').affix({
                offset: {
                    top:  $('.toc-floating-menu').offset().top - alaHeaderHeight - 35,
                    bottom: alaFooterHeight
                }
            });
        }

        $(window).scroll(function () {
            //$('.sidebar-col').width($('.sidebarCol').width());
            resizeToc();
        });
    }

    // autocomplete for search inputs
    $(".autocomplete").autocomplete('https://bie.ala.org.au/ws/search/auto.jsonp', {
        extraParams: {limit: 100},
        dataType: 'jsonp',
        parse: function(data) {
            var rows = new Array();
            data = data.autoCompleteList;
            for(var i=0; i<data.length; i++){
                rows[i] = {
                    data: data[i],
                    value: data[i].matchedNames[0],
                    result: data[i].matchedNames[0]
                };
            }
            return rows;
        },
        matchSubset: false,
        formatItem: function(row, i, n) {
            return row.matchedNames[0];
        },
        cacheLength: 10,
        minChars: 3,
        scroll: false,
        max: 10,
        selectFirst: false
    });

    function updateStats(divId, statValue) {
        $(divId).fadeOut("fast").html(statValue).fadeIn("fast");
    }

});

