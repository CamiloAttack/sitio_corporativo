	(function ($) {
        var $container = $('.portfolio'),
            colWidth = function () {
                var w = $container.width(), 
                    columnNum = 1,
                    columnWidth = 0;
                if (w > 1200) {
                    columnNum  = 5;
                    $('.box .magnifier').show();                     
                } 
                else if (w > 900) {
                    columnNum  = 5;
                    $('.box .magnifier').show();                     
                } 
                else if (w > 600) {
                    columnNum  = 3;
                    $('.box .magnifier').show(); 
                    $('.box').on('click');
                } 
                else if (w > 400) {
                    columnNum  = 2;
                    $('.box .magnifier').show(); 
                    $('.box').on('click',function(){
                    //    alert();
                    });
                }
                else if (w > 300) {
                    columnNum  = 1;
                    $('.box iframe').width($container.width());
                    $('.box video').width($container.width());  
                    $('.box .magnifier').hide(); 
                 
                    //$('.box').off('click');
                }
                columnWidth = Math.floor(w/columnNum);
                $container.find('.box').each(function(k,v) {
 
                    var $item = $(this),

                        k= k+1;
 
                        var add_valor = k.toString();
                        $item.addClass(add_valor);
                        $item.attr("data_val_carga_media",add_valor);
                        $("#ultimo_box").text(k);
                        
                        multiplier_w = $item.attr('class').match(/item-w(\d)/),
                        multiplier_h = $item.attr('class').match(/item-h(\d)/),
                        width = multiplier_w ? columnWidth*multiplier_w[1]-0 : columnWidth-5,
                        height = multiplier_h ? columnWidth*multiplier_h[1]*1-5 : columnWidth*0.5-5;
                    $item.css({
                        width: width-12,
                        height: height
                    });
                });
                return columnWidth;
            }
                        
            function refreshWaypoints() {

                setTimeout(function() {
 
                    $container.find('.isotope-hidden').each(function(k,v) {

                        k= k+1;
 
                        var add_valor = k.toString();
                        $(this).removeClass();
                        $(this).addClass("box entry item-w1 item-h1 isotope-item isotope-hidden "+$(this).attr("data_class_filtro"));
                        $(this).attr("data_val_carga_media","");
             
                    });


                    $container.find('.box').not('.isotope-hidden').each(function(k,v) {

                        k= k+1;
 
                        var add_valor = k.toString();
                        $(this).removeClass();
                        $(this).addClass("box entry item-w1 item-h1 isotope-item "+$(this).attr("data_class_filtro"));
                        $(this).addClass(add_valor);
                        $(this).attr("data_val_carga_media",add_valor);
                        $("#ultimo_box").text(k);
             
                    });
                }, 0);   
            }
                        
            $('nav.portfolio-filter ul a').on('click', function() {
                var selector = $(this).attr('data-filter');
                $container.isotope({ filter: selector }, refreshWaypoints());
                $('nav.portfolio-filter ul a').removeClass('active');
                $(this).addClass('active');
                return false;
            });
                
            function setPortfolio() { 
                setColumns();
                $container.isotope('reLayout');
            }
    
            isotope = function () {
                $container.isotope({
                    resizable: true,
                    itemSelector: '.box',
					layoutMode : 'masonry',
					gutter: 0,
                    masonry: {
                        columnWidth: colWidth(),
                        gutterWidth: 10
                    }
                });
            };
        isotope();
        $(window).smartresize(isotope);
    }(jQuery));