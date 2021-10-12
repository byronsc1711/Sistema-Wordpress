jQuery(document).ready(function(){

  $(document).on('submit','#entry_form', function(e) {
    e.preventDefault();
    $('.wqmessage').html('');
    $('.wqsubmit_message').html('');

    var wqtitle = $('#wqtitle').val();
    var wqdescription = $('#wqdescription').val();
    var wqmedia = $('#wqmedia').val();

    if(wqtitle=='') {
      $('#wqtitle_message').html('Title is Required');
    }
    if(wqdescription=='') {
      $('#wqdescription_message').html('Description is Required');
    }
    if(wqmedia=='') {
      $('#wqmedia_message').html('Media is Required');
    }

    if(wqtitle!='' && wqdescription!='' && wqmedia!='') {
      var fd = new FormData(this);
      var action = 'wqnew_entry';
      fd.append("action", action);

      $.ajax({
        data: fd,
        type: 'POST',
        url: ajax_var.ajaxurl,
        contentType: true,
			  cache: false,
			  processData:false,
        success: function(response) {
          var res = JSON.parse(response);
          $('.wqsubmit_message').html(res.message);
          if(res.rescode!='404') {
            $('#entry_form')[0].reset();
            $('.wqsubmit_message').css('color','green');
          } else {
            $('.wqsubmit_message').css('color','red');
          }
        }
      });
    } else {
      return false;
    }
  });

  $(document).on('submit','#update_form', function(e) {
    e.preventDefault();
    $('.wqmessage').html('');
    $('.wqsubmit_message').html('');

    var wqtitle = $('#wqtitle').val();
    var wqdescription = $('#wqdescription').val();
    var wqmedia = $('#wqmedia').val();

    if(wqtitle=='') {
      $('#wqtitle_message').html('Title is Required');
    }
    if(wqdescription=='') {
      $('#wqdescription_message').html('Description is Required');
    }
    if(wqmedia=='') {
      $('#wqmedia_message').html('Media is Required');
    }

    if(wqtitle!='' && wqdescription!='' && wqmedia!='') {
      var fd = new FormData(this);
      var action = 'wqedit_entry';
      fd.append("action", action);

      $.ajax({
        data: fd,
        type: 'POST',
        url: ajax_var.ajaxurl,
        contentType: true,
			  cache: false,
			  processData:false,
        success: function(response) {
          var res = JSON.parse(response);
          $('.wqsubmit_message').html(res.message);
          if(res.rescode!='404') {
            $('.wqsubmit_message').css('color','green');
          } else {
            $('.wqsubmit_message').css('color','red');
          }
        }
      });
    } else {
      return false;
    }
  });

});
