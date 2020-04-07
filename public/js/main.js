var nick = prompt('Enter your name');
var chatDiv = document.getElementById('msgArea');
var url = 'http://localhost/files/Projects/Chattie/';
var room = /(?<!(chattie\/chat\/\/))[0-9a-zA-Z_\-]*$/i.exec(window.location.href)[0]
var lastId = 0;

$(document).ready(function() {
	
	var init = function() 
	{
		$.post(url + 'init/50')
		.done(function(data) {
			let messages = JSON.parse(data);
			lastId = messages[0].id;
			$('#lastId').val(lastId);
			
			for (i in messages)
			{
				let message = new Message();
				message.assign(messages[i]);
				$('#msgArea').prepend(message.view());
			}
		});
		
		scrollBottom();
	}
	
	$('#msgForm').submit(function() {
		let url = $(this).attr('action');
		let color = $(this).find('[name="msgColor"]').val();
		let message = $(this).find('[name="msgInput"]').val();
		
		send(url, nick, color, message);
		scrollBottom();
		clearInputs();
		
		return false;
	});
	
	var appendMessage = function(data) 
	{
		let message = new Message();
		message.assign(data);
		$('#msgArea').append(message.view());
	}
	
	var scrollBottom = function() 
	{
		chatDiv.scrollTop = chatDiv.scrollHeight;
	}
	
	var clearInputs = function()
	{
		$('#msgInput').val('');
	}
	
	var send = function(url, nick, color, message)
	{
		console.log(arguments);
		
		$.post(url, {
			nick: nick,
			color: color,
			message: message
			
		}).done(function(data) {
			console.log(data);
			$('#msgInput').val('');
		});
	}
	
	var updateChatWindow = function()
	{
		$.get(url + 'lastFrom/' + $('#lastId').val(), function(data) {
			
			if (data != undefined && data != null)
			{
				let messages = JSON.parse(data);
				
				if (messages != undefined && messages != null && messages.length > 0)
				{
					for (i in messages)
						appendMessage(messages[i]);

					$('#lastId').val(messages[messages.length - 1].id);
					
					scrollBottom();
				}
			}
			
			updateChatWindow();
		});
	}
	
	console.log(room)
	
//	init();
	updateChatWindow();
});