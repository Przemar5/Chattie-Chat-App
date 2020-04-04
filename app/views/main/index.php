<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Chattie Chat App</title>
		
		<script
		  src="https://code.jquery.com/jquery-3.4.1.min.js"
		  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
		  crossorigin="anonymous"></script>
		
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	
		<link rel="stylesheet" href="<?= URL; ?>public/css/style.css">
	</head>
	<body>
		<div class="row">
			<div class="col-sm-10 offset-sm-1">
				<div class="app">
					<div class="banner">
						<div class="banner__content">
							<h1 class="banner__header">
								Chattie
							</h1>
							<p class="font-italic banner__paragraph">
								Your place in the web
							</p>
						</div>
					</div>
					
					<div class="chat">
						<div class="container bg-light chat__container">
							<div class="d-block mb-3">
								<textarea name="msgArea" id="msgArea" rows="10" class="form-control msg__area"></textarea>
							</div>
							
							<form action="<?= URL; ?>send" id="msgForm" class="row mb-3">
								<div class="col-sm-8 mb-3">
									<input type="text" name="msgNick" id="msgNick" class="form-control msg__nick" placeholder="Enter your nick">
								</div>

								<div class="col-sm-4 mb-3">
									<input type="color" name="msgColor" id="msgColor" class="form-control msg__color">
								</div>
								
								<div class="col-md-10 mb-3">
									<input type="text" name="msgInput" id="msgInput" class="form-control msg__input" placeholder="Enter your message here...">
								</div>

								<div class="col-md-2 mb-3">
									<input type="submit" value="Send" name="msgSend" id="msgSend" class="btn btn-block btn-main input msg__send">
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<a href="https://pngtree.com/free-backgrounds">free background photos from pngtree.com</a>
		
		<script src="<?= URL; ?>public/js/main.js"></script>
	</body>
</html>