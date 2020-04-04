$(document).ready(function() {
	$('#msgForm').submit(function() {
		
		var data = new Object();
		url = $(this).attr('action');
		data.nick = $(this).find('[name="msgNick"]').val();
		data.msg = $(this).find('[name="msgColor"]').val();
		data.color = $(this).find('[name="msgInput"]').val();
		
		send(url, data)
//		send($(this).attr());
		
		return false;
	});
	
	var send = function(url, data)
	{
		$.post(url, {
			data: data
		}).done(function(data) {
			console.log(data)
		});
	}
});