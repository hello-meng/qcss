document.domain = "healthbox7th.com";

var server_url = 'https://chat.healthbox7th.com';
var video_call_url = 'https://videocall.healthbox7th.com';

var socket = io.connect(server_url);
var incomming_call = false;

var reqData = {
	room: room,
	user: {
		user_id: user_id,
		user_type: user_type,
		user_name: user_name,
		user_avatar: user_avatar
	},
	to: {
		user_id: to_user_id,
		user_type: to_user_type
	},
	message: {}
};

socket.on('connect', function() {
   socket.emit('room', room);
});

socket.on('message', function(data) {
	var html = '';
	if(data.user.user_id == user_id && data.user.user_type == user_type) {

		html += '<div class="row bg-success message-row">';
		html += '	<div class="col-xs-12 me">';
		html += '		<div class="col-lg-11 col-sm-10 col-xs-9 message text-right">';
		
		if(data.message.type == 'text') {
			html += data.message.text;
		} else if(data.message.type == 'image') {
			html += '<img src="' + data.message.thumbnail + '" class="img-square thumbnail-image" />';
			html += '<p><i class="glyphicon glyphicon-picture"></i> ' + data.message.name + '</p>';
			html += '<a href="' + data.message.url + '" target="_blank"><i class="glyphicon glyphicon-download-alt"></i> <small>Download</small></a>';
		} else if(data.message.type == 'file') {
			html += '<p><i class="glyphicon glyphicon-paperclip"></i> ' + data.message.name + '</p>';
			html += '<a href="' + data.message.url + '" target="_blank"><i class="glyphicon glyphicon-download-alt"></i> <small>Download</small></a>';
		}

		html += '		</div>';
		html += '		<div class="col-lg-1 col-sm-2 col-xs-3 text-center profile">';
		html += '			<img src="' + data.user.user_avatar + '" alt="' + data.user.user_name + '" class="img-circle user-avatar">';
		html += '			<br />';
		html += '			' + data.user.user_name;
		html += '		</div>';
		html += '	</div>';
		html += '</div>';

	} else {

		html += '<div class="row bg-warning message-row">';
		html += '	<div class="col-xs-12 other">';
		html += '		<div class="col-lg-1 col-sm-2 col-xs-3 text-center profile">';
		html += '			<img src="' + data.user.user_avatar + '" alt="' + data.user.user_name + '" class="img-circle user-avatar">';
		html += '			<br />';
		html += '			' + data.user.user_name;
		html += '		</div>';
		html += '		<div class="col-lg-11 col-sm-10 col-xs-9 message text-left">';
		
		if(data.message.type == 'text') {
			html += data.message.text;
		} else if(data.message.type == 'image') {
			html += '<img src="' + data.message.thumbnail + '" class="img-square thumbnail-image" />';
			html += '<p><i class="glyphicon glyphicon-picture"></i> ' + data.message.name + '</p>';
			html += '<a href="' + data.message.url + '" target="_blank"><i class="glyphicon glyphicon-download-alt"></i> <small>Download</small></a>';
		} else if(data.message.type == 'file') {
			html += '<p><i class="glyphicon glyphicon-paperclip"></i> ' + data.message.name + '</p>';
			html += '<a href="' + data.message.url + '" target="_blank"><i class="glyphicon glyphicon-download-alt"></i> <small>Download</small></a>';
		}

		html += '		</div>';
		html += '	</div>';
		html += '</div>';
	}

	$('#chat').append(html);
	scrollChatBox();
});

socket.on('video_call', function(data) {
	if(data.to.user_id == user_id && data.to.user_type == user_type) {
		$('#video_call').removeClass('btn-primary').addClass('btn-danger');
		$('#video_call i').removeClass('glyphicon-facetime-video').addClass('glyphicon-phone-alt');
		$('#video_call span').html('Incomming Call');
		incomming_call = true;
	}
});

$('#send').click(function() {
	if($('#text').val().trim().length > 0) {

		var req_data = reqData;
		req_data.message = {
			type: 'text',
			text: $('#text').val()
		};

	    var request = $.ajax(server_url + '/sendMessage',{
		    'data': JSON.stringify(req_data),
		    'type': 'POST',
		    'processData': false,
		    'contentType': 'application/json'
		});

	    request.done(function( data ) {
			$('#text').val('');
		});

		request.fail(function( jqXHR, textStatus ) {
			alert('send message fail, please try again.');
		});
	}
});

$('#fileupload').fileupload({
	url: 'assets/upload/server/php/',
	dataType: 'json',
	done: function (e, data) {
		$('#progress').hide();
		$.each(data.result.files, function (index, file) {

			if(typeof file.name != 'undefined' && file.name != "") {

				var req_data = reqData;

				if(file.type.indexOf('image') > -1) {
					req_data.message = {
						type: 'image',
						name: file.name,
						url: file.url,
						thumbnail: file.thumbnailUrl
					};
				} else {
					req_data.message = {
						type: 'file',
						name: file.name,
						url: file.url
					};
				}
				

			    var request = $.ajax(server_url + '/sendMessage',{
				    'data': JSON.stringify(req_data),
				    'type': 'POST',
				    'processData': false,
				    'contentType': 'application/json'
				});

			    request.done(function( data ) {
					//alert('send complete.');
				});

				request.fail(function( jqXHR, textStatus ) {
					alert('send message fail, please try again.');
				});
			}
		});
	},
	progressall: function (e, data) {
	$('#progress').show();
	var progress = parseInt(data.loaded / data.total * 100, 10);
		$('#progress .progress-bar').css('width', progress + '%');
	}
}).prop('disabled', !$.support.fileInput)
.parent().addClass($.support.fileInput ? undefined : 'disabled');


$('#video_call').click(function() {

	if(incomming_call == true) {
		
		$('#myModal .modal-title').html('Accept Video Call');
		$('#myModal .modal-body').html('<iframe id="i_iframe" src="' + video_call_url + '/?user_id=' + user_id + '&user_type=' + user_type + '&room=' + room.replace('&','|') + '&width=' + ($(window).width() - 66) +'&height=' + ($(window).height() - 155) +'" scrolling="no" width="100%" height="100%" frameborder="0" />');
		$('#myModal .modal-body').css('height', ($(window).height() - 125));
		$('#myModal').modal('show');

		$('#video_call').removeClass('btn-danger').addClass('btn-primary');
		$('#video_call i').removeClass('glyphicon-phone-alt').addClass('glyphicon-facetime-video');
		$('#video_call span').html('Video Call');
		incomming_call = false;

	} else {

		var req_data = reqData;
	    var request = $.ajax(server_url + '/videoCall',{
		    'data': JSON.stringify(req_data),
		    'type': 'POST',
		    'processData': false,
		    'contentType': 'application/json'
		});

	    request.done(function( data ) {

	    	$('#myModal .modal-title').html('Video Call');
			$('#myModal .modal-body').html('<iframe id="i_iframe" src="' + video_call_url + '/?user_id=' + user_id + '&user_type=' + user_type + '&room=' + room.replace('&','|') + '&width=' + ($(window).width() - 66) +'&height=' + ($(window).height() - 155) +'" scrolling="no" width="100%" height="100%" frameborder="0" />');
			$('#myModal .modal-body').css('height', ($(window).height() - 125));
			$('#myModal').modal('show');

			$('#video_call').removeClass('btn-danger').addClass('btn-primary');
			$('#video_call i').removeClass('glyphicon-phone-alt').addClass('glyphicon-facetime-video');
			$('#video_call span').html('Video Call');
		});

		request.fail(function( jqXHR, textStatus ) {
			alert('receiver user not available, please try again.');
		});
	}
});


$('#chat').css('height', ($(window).height() - 155));

$("#text").keyup(function(event){
    if(event.keyCode == 13){
        $("#send").click();
    }
});

function scrollChatBox()
{
	var objDiv = document.getElementById("chat");
	objDiv.scrollTop = objDiv.scrollHeight;
}

$('#myModal').on('hidden.bs.modal', function () {
	$('#myModal .modal-body').html('');
});