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
		<div class="row w-100 m-0">
			<div class="col-12 col-lg-10 offset-lg-1 p-0">
				<div class="app">
					<div class="banner w-100">
						<div class="banner__content">
							<h1 class="banner__header">
								Chattie
							</h1>
							<p class="font-italic banner__paragraph">
								Your place in the web
							</p>
						</div>
					</div>
					
					<div class="row w-100 m-0 bg-dark">
						<div class="col-sm-3 col-md-3 p-4 pr-sm-3 w-100 rooms">
							<nav class="jumbotron h-100 p-0">
								<ul class="rooms__list">
									<?php if (!empty($rooms)): ?>
										<?php foreach ($rooms as $room): ?>
											<li class="rooms__item d-block">
												<a href="<?= URL . 'chat/' . $room->slug; ?>" class="rooms__link">
													<?= $room->name; ?>
												</a>
											</li>
										<?php endforeach; ?>
									<?php endif; ?>
								</ul>
							</nav>
						</div>

						<div class="col-sm-9 col-md-9 p-0 chat">
							<div class="container-fluid p-4 pl-sm-3 chat__container">
								<div class="d-block mb-4 bg-light msg__area form-control" id="msgArea" style="min-height:20rem; min-height:45vh; max-height:20rem; max-height:35vh; overflow-y:scroll;"></div>

								<input type="hidden" id="lastId" value="0">

								<form action="<?= URL; ?>send" id="msgForm" class="d-flex">

									<input type="text" name="msgInput" id="msgInput" class="form-control msg__input d-inline-block" placeholder="Enter your message here...">

									<input type="color" name="msgColor" id="msgColor" class="form-control msg__color ml-3">

									<input type="submit" value="Send" name="msgSend" id="msgSend" class="btn btn-main msg__send ml-3">

								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<a href="https://pngtree.com/free-backgrounds">free background photos from pngtree.com</a>
		
		<script src="<?= URL; ?>public/js/message.class.js"></script>
		<script src="<?= URL; ?>public/js/main.js"></script>
	</body>
</html>