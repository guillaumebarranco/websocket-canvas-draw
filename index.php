<?php
	
	$page = "hublot";

	if(isset($_GET['page']) && $_GET['page'] === 'annexe') {
		$page = "annexe";
	}

?>

<!DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=yes">
	<title>HTML5 Canvas + Node.JS Socket.io</title>

	<link rel="stylesheet" href="http://localhost/websocket-canvas-draw/style.css" />

	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
	<script type="text/javascript" src="http://localhost/websocket-canvas-draw/js/jquery.event.drag-2.0.js"></script>
	<script src="http://localhost/websocket-canvas-draw/node_modules/socket.io-client/dist/socket.io.js"></script>
	<script type="text/javascript" src="http://localhost/websocket-canvas-draw/scripts.js"></script>
</head>

<body>
	<div style="width: 1350px; margin: 0 auto;">

		<section class="left">

			<div class="whiteboard">

				<article><!-- our canvas will be inserted here--></article>

			</div>

			<?php if($page === "hublot") { ?>

				<div class="disablestream">
					<button class="button">Couper la diffusion</button>
				</div>
			<?php } ?>


		</section>

		<section class="right">
			
			<p>
				Vos questions sur le <br />
				<span class="twoem"><span class="orange">#</span>CCSPACESFAQ</p> 
			</p>

			<ul>
				<li>POST</li>
				<li>POST</li>
				<li>POST</li>
				<li>POST</li>
				<li>POST</li>
				<li>POST</li>
				<li>POST</li>
				<li>POST</li>
				<li>POST</li>
				<li>POST</li>
				<li>POST</li>
				<li>POST</li>
				<li>POST</li>
			</ul>

			<img src="img/<?php echo $page; ?>.png" class="logo" width="300" alt="">

		</section>
	</div>

	<script>
		function getTweets() {

			$.ajax({
				url: "http://localhost:2222",
				type: "GET",
				success: function(response) {
					response = JSON.parse(response);
					console.log('r', response);

					$('.right ul').empty();
					
					for(var i in response.statuses) {

						if(i < 6) {

							var text = response.statuses[i].text;
							text = text.replace('#CCSPACESFAQ', '');

							$('.right ul').append('<li>'+text+'</li>');
						}
					}
				}
			});
		}

		getTweets();

		setInterval(function() {
			getTweets();
		}, 10000);

	</script>

</body>
