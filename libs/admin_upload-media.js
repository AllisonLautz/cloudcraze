// <




jQuery(document).ready(function($){


  $('#wp-admin-bar-view a').attr('target', '_blank');




  function Media(el){

    var fieldID;
    var ex;
    var i;

    console.log(el)

    $('.button.'+el+'').click(function(){
      if(el == 'media' || el == 'banded' || el == 'jobcard'){
        file_frame =  wp.media({
          title: 'Insert media',
          button: {
            text: 'Use media'
          },
          multiple: true
        })
      }

      else if (el  == 'video'){
        var file_frame =  wp.media({
          title: 'Insert video',
          library : {
            type : 'video'
          },
          button: {
            text: 'Use video'
          },
          multiple: false
        })
      }

      else if (el  == 'resource'){
        var file_frame =  wp.media({
          title: 'Insert Item',
          button: {
            text: 'Use item'
          },
          multiple: false
        })
      }


      else if (el  == 'logos'){
        file_frame =  wp.media({
          title: 'Insert logos',
          library : {
            type : 'image'
          },
          button: {
            text: 'Use logos'
          },
          multiple: true
        })
      }

      else if (el  == 'icons'){
        file_frame =  wp.media({
          title: 'Insert icons',
          library : {
            type : 'image'
          },
          button: {
            text: 'Use icons'
          },
          multiple: true
        })
      }

      else{
        var file_frame =  wp.media({
          title: 'Insert image',
          library : {
            type : 'image'
          },
          button: {
            text: 'Use image'
          },
          multiple: false
        })

      }
      fieldID = $(this).data('fieldid');
      index = $('.button.'+el+'').index( this );
      t = $(this);
      console.log(t, el)

      ex = t.siblings('.imagehere').find('.index').length


      if (file_frame) file_frame.close();
      file_frame.on( 'select', function(){
        var attachments = file_frame.state().get('selection').map( 
          function( attachment ) {
            attachment.toJSON();
            return attachment;
          });

        for (i = 0; i < attachments.length; i++) {
          var build = ''
          +'<div class="index index['+parseInt(ex + i)+']" data-fieldID="'+fieldID+'">';
          if(el == 'video'){
            build += '<video autoplay loop class="fullvideo">'
            +'<source src="'+attachments[i].attributes.url+'" type="video/mp4" />'
            +'</video>'
            +'<div class="videocontrols"><a class="playpause" data-id="'+fieldID+'"></a></div>';
          }

          else{
            if(attachments[i].attributes.url.indexOf('pdf') > -1){
              var pdf2jpg = attachments[i].attributes.url.replace('.pdf', '-pdf.jpg');
              build += '<img src="'+pdf2jpg+'">';
            }
            else{
              build += '<img src="'+attachments[i].attributes.url+'">';
            }
          }
          build += '<div class="controls">'
          +'<a class="change" data-id="'+fieldID+'"></a>'
          +'<a class="remove" data-id="'+fieldID+'"></a>'
          +'</div>'
          +'<input class="imageIDhere" type="text" name="'+fieldID+'['+parseInt(ex + i)+']" value="'+attachments[i].id+'">';
          if(el == 'banded'){
            build += '<input class="band_title" type="text" name="band_title['+parseInt(ex + i)+']" id="band_title['+parseInt(ex + i)+']" value="" placeholder="title">';

            build += '<div class="text">'
            +'<input class="band_title" type="text" name="band_title['+parseInt(ex + i)+']" id="band_title['+parseInt(ex + i)+']" value="" placeholder="title">'
            +'<textarea class="band_desc" name="band_desc['+parseInt(ex + i)+']" id="band_desc['+parseInt(ex + i)+']" placeholder="description"></textarea>'
            +'<input class="band_btn" type="text" name="band_btn['+parseInt(ex + i)+']" id="band_btn['+parseInt(ex + i)+']" value="" placeholder="button text">'
            +'<input class="band_url" type="text" name="band_url['+parseInt(ex + i)+']" id="band_url['+parseInt(ex + i)+']" value="" placeholder="button url">'
            +'</div>';
          }

          if(el == 'jobcard'){
            build += '<div class="text">'
            +'<input class="jobcard_title" type="text" name="jobcard_title['+parseInt(ex + i)+']" id="jobcard_title['+parseInt(ex + i)+']" value="" placeholder="title">'
            +'<textarea class="job_desc" name="job_desc['+parseInt(ex + i)+']" id="job_desc['+parseInt(ex + i)+']" placeholder="description"></textarea>'
            +'</div>';
          }


          if(el == 'logos'){
            build += '<div class="text">'
            +'<input class="logo_url" type="text" name="logo_url['+parseInt(ex + i)+']" id="logo_url['+parseInt(ex + i)+']" value="" placeholder="https://www.URL.com">'

            +'</div>';
          }

          if(el == 'icons'){
            build += '<div class="text">'
            +'<input class="icon_url" type="text" name="icon_url['+parseInt(ex + i)+']" id="icon_url['+parseInt(ex + i)+']" value="" placeholder="https://www.URL.com">'

            +'</div>';
          }


          build +='</div>';

          t.siblings('.imagehere').append(build);
        } /* end for */
      });

      file_frame.open();

    })


function resetIndex(i) {
	$('.index').each(function(i) {
		var fieldID = $(this).data('fieldid')
		var index = $(this).index();
		$(this).find('.imageIDhere').attr('name', fieldID+'['+index+']"');
		$(this).find('.band_title').attr('name', 'band_title['+index+']').attr('id', 'band_title['+index+']');
		$(this).find('.band_desc').attr('name', 'band_desc['+index+']').attr('id', 'band_desc['+index+']');
		$(this).find('.band_btn').attr('name', 'band_btn['+index+']').attr('id', 'band_btn['+index+']');
		$(this).find('.band_url').attr('name', 'band_url['+index+']').attr('id', 'band_url['+index+']');


		$(this).find('.jobcard_title').attr('name', 'jobcard_title['+index+']').attr('id', 'jobcard_title['+index+']');
		$(this).find('.job_desc').attr('name', 'job_desc['+index+']').attr('id', 'job_desc['+index+']');
	});
}

function makeSortable() {
	$('.imagehere').sortable({
		opacity: 0.6,
		stop: function() {
			resetIndex();
		}      
	});
}

$(document).on('click', '.remove', function(e) {
	e.preventDefault();

	$(this).parents('.index').animate({ opacity: 0 }, 200, function() {
		$(this).remove();
		resetIndex();
	});
});


$('.button.'+el+'').siblings('.imagehere').find('.change').click(function(e){
	e.preventDefault();
	var t = $(this);
	var cat = t.parents('.input').attr('class');
	console.log(cat)

	if (cat.includes('video')){
		var file_frame =  wp.media({
			title: 'Insert video',
			library : {
				type : 'video'
			},
			button: {
				text: 'Use video'
			},
			multiple: false
		})
	}

	else{
		var file_frame =  wp.media({
			title: 'Insert image',
			library : {
				type : 'image'
			},
			button: {
				text: 'Use image'
			},
			multiple: false
		})

	}


	if (file_frame) file_frame.close();
	file_frame.on( 'select', function(){
		var attachment = file_frame.state().get('selection').first().toJSON();

		t.parents('.index').find('img').attr('src', attachment.url)
		t.parents('.index').find('.imageIDhere').attr('value', attachment.id)

	});

	file_frame.open();
})


makeSortable();
}





$('.videocontrols').on('click', function(ev) {
	ev.preventDefault();
	$(this).find('.playpause').toggleClass('active');
  // // $('video')[0].src += "&autoplay=0";
  // var autoplay =  $(this).parents('.index').find('video').attr('autoplay');
  // console.log(autoplay)

  // $(this).siblings('.fullvideo')[0].removeAttr('autoplay').removeAttr('loop');
  // if(autoplay){
  //   $(this).parents('.index').find('video').removeAttr('autoplay').pause();
  // }
  // else{
  //   $(this).parents('.index').find('video').attr('autoplay', 'autoplay');
  // }
  // $(this).parents('.index').find('video').src += "&autoplay=1";
});


Media('resource');
Media('logos');
Media('logo');
Media('image');
Media('media');
Media('video');
Media('icons');


$('i.fold').click(function(){
  $(this).parents('.section').toggleClass('active').find('.row').not('.row.heading').slideToggle();
})





})




jQuery(function($){
  function p2pRestrict(t, n){ /* type, number */

    $('div[data-p2p_type='+t+']').bind("DOMSubtreeModified", function() {   
      if($('div[data-p2p_type='+t+'] > table.p2p-connections >tbody >tr').length >= n)
      {
        $('div[data-p2p_type='+t+'] > div.p2p-create-connections').hide();
      }
      else 
      {
        $('div[data-p2p_type='+t+'] > div.p2p-create-connections').show();
      }
    });

    $('div[data-p2p_type='+t+'] > table.p2p-connections >tbody >tr').ready(function() {
      if($('div[data-p2p_type='+t+'] > table.p2p-connections >tbody >tr').length >= n)
      {
        $('div[data-p2p_type='+t+'] > div.p2p-create-connections').hide();
      }
      else 
      {
        $('div[data-p2p_type='+t+'] > div.p2p-create-connections').show();
      }
    });

  }





  p2pRestrict('featured-news', 1);
  p2pRestrict('featured-event', 1);
  p2pRestrict('featured-post', 1);
  p2pRestrict('blog_post', 3);
  
  
});