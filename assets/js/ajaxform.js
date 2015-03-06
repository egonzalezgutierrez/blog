$(function () {
	$('#ajaxform').bind('submit', function () {
		$.ajax({
			type: 'POST',
			url:  $('#ajaxform').attr("action"),
			data: $('#ajaxform').serialize(),
			success:function(response) {
				var json = JSON.parse(response);
				switch(json['st']) {
					case 0:
						$('#ajax_message').html('<div class="alert alert-danger alert-error"><a href="#" class="close" data-dismiss="alert">&times;</a><p>'+json.msg+'</p></div>'); 
						break;
					case 1:
						$(location).attr('href', json.redirect);
						break;
				}							
			}
		});
		return false;
	});
});
