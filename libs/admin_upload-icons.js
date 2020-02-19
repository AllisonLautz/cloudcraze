/* https://github.com/zulfnore/gallery-metabox */

jQuery(function($) {

	var hash = window.location.href;

	var french = hash.includes('lang=fr');
  // console.log(french)


  if(french){
    // console.log('french')
    file_frame =  wp.media({
    	title: 'Insert image',
    	library : {
    		uploadedTo : wp.media.view.settings.post.id, 
    		type : 'image', 
    		order: 'DEC', 
    	},
    	button: {
    		text: 'Utilisez'
    	},
    	multiple: true
    })

}

else{
	file_frame =  wp.media({
		title: 'Insert image',
		library : {
      // uploadedTo : wp.media.view.settings.post.id, 
      type : 'image'
  },
  button: {
  	text: 'Use image(s)'
  },
  multiple: true
})
}

var file_frame;

  // $(document).on('click', '#'+n+'-metabox a.slider-add', function(e) {
  	function galleryMetaBox(el, n){
  		var el = $(el);
  		el.each(function(){

  			$(this).click(function(el){
  				el = $(this);
  				event.preventDefault();   
  				console.log('.'+n+'-add clicked')
        // e.preventDefault();



        if (file_frame) file_frame.close();

        // // file_frame = wp.media.frames.file_frame = wp.media({
        // //   title: $(this).data('uploader-title'),
        // //   button: {
        // //     text: $(this).data('uploader-button-text'),
        // //   },
        // //   multiple: true
        // // });

        file_frame.on('select', function(el) {
        	console.log('select clicked')

        	var listIndex = $('#'+n+'-metabox-list li').index($('#'+n+'-metabox-list li:last')),
        	selection = file_frame.state().get('selection');

        	selection.map(function(attachment, i) {

        		attachment = attachment.toJSON(),
        		index      = listIndex + (i + 1);

        		var build = '<li id="index_'+index+'" class="index index_'+index+'">'
        		+'<input type="hiddens" name="industry_icons_title[' + index + ']" value="' + attachment.id + '">'
        		+'<div class="slide image-preview" style="background-image:url('+attachment.url+');">'
        		+'<a class="change-image"></a>'
        		+'<a class="remove-image"></a>';

        		if(n !== 'slider'){
        			build +=
        			'<ul class="collapse wrapper">'
        			// +'<li class="title">'
        			// +'<label>Title</label>'
        			// +'<textarea name="industry_icons_title['+index+']" id="industry_icons_title['+index+']"></textarea>'
        			// +'</li>'
        			+'<li>'
        			// +'<label>Description</label>'
        			// +'<input type="text" name="industry_icons_desc['+index+']" id="industry_icons_desc['+index+']" value="">'
        			+'<input type="text" name="industry_icons_title['+index+']" id="industry_icons_title['+index+']" value="">'
        			// +'</li>'
        			// +'<li>'
        			// +'<label>Button Text</label>'
        			// +'<input type="text" name="industry_icons_btn['+index+']" id="industry_icons_btn['+index+']" value="">'
        			// +'</li>'
        			// +'<li>'
        			// +'<label>Button URL</label>'
        			// +'<input type="text" name="industry_icons_url['+index+']" id="industry_icons_url['+index+']" value="">'
        			+'</li>'
        			+ '(tinymce here)'
        			// tinymce.init(tinyMCEPreInit.mceInit['editorcontentid']);
        			+'</ul>';
        		}

        		build +=
        		'</div></li>';



        		console.log($(this), el, '#'+n+'-metabox-list')
        		$('#'+n+'-metabox-list').append(build);


        	});
        });

        makeSortable();

        file_frame.open();

    });

  		});

  		$(document).on('click', '#'+n+'-metabox a.change-image', function(e) {

  			e.preventDefault();

  			var that = $(this);

  			if (file_frame) file_frame.close();

  			file_frame = wp.media.frames.file_frame = wp.media({
  				title: $(this).data('uploader-title'),
  				button: {
  					text: $(this).data('uploader-button-text'),
  				},
  				multiple: false
  			});

  			file_frame.on( 'select', function() {
  				attachment = file_frame.state().get('selection').first().toJSON();

  				that.parent().find('input:hidden').attr('value', attachment.id);
  				that.parent().find('img.image-preview').attr('src', attachment.url);
  			});

  			file_frame.open();

  		});

  		function resetIndex() {
  			$('#'+n+'-metabox-list li').each(function(i) {
  				$(this).find('input:hidden').attr('name', 'vdw_industry_icons_id[' + i + ']');



  			});
  		}





  		function makeSortable() {
    // $('#'+n+'-metabox-list').sortable({
    //   opacity: 0.6,
    //   stop: function() {
    //     resetIndex();
    //   }
    // });

    $('#'+n+'-metabox-list').sortable({
    	opacity: 0.6,
    	update: function(event, ui) {
    		var order = []; 
    		$('#'+n+'-metabox-list > li.index').each( function(e) {
    			order.push( $(this).attr('id')  + '=' + ( $(this).index() + 1 ) );
    		});
    		var positions = order.join(';')
        // $.cookie( LI_POSITION , positions , { expires: 10 });
    }

});
}

$(document).on('click', '#'+n+'-metabox a.remove-image', function(e) {
	e.preventDefault();

	$(this).parents('li').animate({ opacity: 0 }, 200, function() {
		$(this).remove();
		resetIndex();
	});
});

makeSortable();


}


galleryMetaBox('.icons-add', 'icons');
// galleryMetaBox('.testimonials-add', 'testimonials');
// galleryMetaBox('.banner-add', 'banner');


// galleryMetaBox('.careers-add', 'careers');

});
