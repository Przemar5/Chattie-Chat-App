$(document).ready(function() {
	
	var init = function() {
		$.post('http://localhost/files/Projects/Chattie/init/50')
		.done(function(data) {
			let messages = JSON.parse(data);
			
			for (i in messages)
			{
				let message = new Message();
				message.assign(messages[i]);
				$('#msgArea').append(message.view());
			}
		});
	}
	
	$('#msgForm').submit(function() {
		
		let url = $(this).attr('action');
		let nick = $(this).find('[name="msgNick"]').val();
		let color = $(this).find('[name="msgColor"]').val();
		let message = $(this).find('[name="msgInput"]').val();
		
		send(url, nick, color, message);
		
		return false;
	});
	
	var appendMessage = function(data) {
		let messageData = JSON.parse(data);
		let message = new Message();
		message.assign(messageData[0]);
		$('#msgArea').append(message.view());
	}
	
	var send = function(url, nick, color, message)
	{
		$.post(url, {
			nick: nick,
			color: color,
			message: message
		}).done(function(data) {
			console.log(data);
			appendMessage(data);
		});
	}
	
	init();
});