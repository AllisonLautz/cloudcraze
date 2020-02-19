jQuery(document).ready(function($){
	var $grid;

	function filters(T, p, i, sF, page, ppp){/* Template, parent, isotope, searchFilter, page, posts per page */
		if($(T).length){
			$('.inputwrap h3').click(function(){
				$(this).parents('.inputwrap').toggleClass('active');
				$(this).siblings('ul.filter').slideToggle(500);

			})

			if(T == '.template_page-resource'){
				$grid = $(p).isotope({
					itemSelector: i, 
					percentPosition: true,
					masonry: {
						columnWidth: 1,
						gutter: 10
					}

				});
			}
			else{
				$grid = $(p).isotope({
					itemSelector: i, 
					layoutMode: 'fitRows'
				});
			}

			var filters = [];
			// var $tg = $('.maincontent').offset().top - $('.header').outerHeight();

			$('.inputwrap .type li').click(function(event){
				var $target = $( event.currentTarget );

				var filter = '.'+$target.attr('class');

				$grid.isotope({ filter: filter });

				var text = $(this).text();
				$('.inputwrap h3').text(text);
				$('.inputwrap.active').removeClass('active').find('ul.filter').slideUp(500);


				if(sF){
					$('#searchFilter').val('');
				}
			});



			$('li.default.h3').click(function(){
				var v = $(this).attr('class');
				var text = $(this).text();
				var t = $(i);

				var $this = $(this);filters[ v ] = $this.attr('name');
				$grid.isotope({ filter: t });

				var ot = $('.inputwrap h3').data('text');
				$('.inputwrap h3').text(ot);
				$('.inputwrap.active').removeClass('active').find('ul.filter').slideUp(500);

			})



			if(sF){

				$('#searchFilter').on( 'keyup', function( event ) {
					setTimeout(function(filter){

						var filter = $('#searchFilter').val().toLowerCase();
						var t;
						console.log(filter)
						$('.posts.row-1 article').each(function(){
							t = $(this);
							var $target = $(this).html().toLowerCase();
							if($target.indexOf(filter) > -1){
								t.addClass('active')
							}
							else{
								t.removeClass('active')
							}

							var ot = $('.inputwrap h3').data('text');
							$('.inputwrap h3').text(ot);

							$grid.isotope({ filter: '.active' });

						})				

					}, 500);
				});

			}



			if(page && ppp){
				// var page = 1,
				// ppp = 6;
				
				if($('.section.max-1.news').length){
					var page = 1.3;
				}

				var load_ajax = function(){
					$.ajax({
						type: "GET",
						data: {
							ppp: ppp, 
							pageNumber: page,
							_ajax_nonce: load_ajax_obj.nonce,
							action: "cc_load",
						},
						dataType: "html",
						url: load_ajax_obj.ajax_url, 
						success: function(data){
							var $data = $(''+data+'')
							$grid.append( $data ).isotope( 'appended', $data )
						},
					})

				} 

				function animateIsotope(){

					$('.isotope article').each(function(){
						if(!($(this).hasClass('animate'))){
							$(this).addClass('animate');

							// console.log('no animate: ', $(this))
						}
					})

					jQuery.each(['animate'], function(i, classname) {
						var $elements = jQuery('.' + classname)
						$elements.each(function() {

							var inview = new Waypoint.Inview({
								element:this,
								enter: function(direction) {
									jQuery(this.element).addClass('transform');
									// console.log('enter ', jQuery(this.element))
								},
								entered: function(direction) {
									jQuery(this.element).addClass('transform');
									// console.log('entered ', jQuery(this.element))
								},
								exit: function(direction) {
									jQuery(this.element).addClass('transform');
									// console.log('exit ', jQuery(this.element))
								},
								exited: function(direction) {
									jQuery(this.element).removeClass('transform');
									// console.log('exited ', jQuery(this.element))
								}
							})
						})
					});
				}

				var click = 1;
				$('.loadmore').click(function(){

					event.preventDefault();
					click ++;
					page++;
					load_ajax();
					console.log(page)
					
					setTimeout(animateIsotope, 300);

				})
			}
		}
	}


	filters('.template_page-customers','.cards.customers', '.cards .card');
	filters('.template_page-resource', '.cards.resources', '.cards .card');



	filters('.template_archive-posts', '.isotope', '.isotope article', true, 1, 10);
	filters('.template_archive-events', '.isotope', '.isotope article', true, 1, 8);
	filters('.template_archive-webinars', '.isotope', '.isotope article', true, 1, 8);
	filters('.template_news', '.isotope', '.isotope article', true, 1, 10);


})