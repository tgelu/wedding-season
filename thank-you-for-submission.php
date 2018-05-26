<?php
	if (isset($_POST)) {
		$dir = "/home/tgelu/wedding-posts/" . uniqid('wedding_' . date('Y-m-d') . '_');
		mkdir($dir);

		$description = getDescription($_POST);
		writeDescription($dir, $description);

		sendMails($description, ["alexa@weddingseason.events", "gelu@weddingseason.events"]);
	}

	function sendMails($body, $emails) {
		$body = "Yaay!\nSomeone submitted a wedding to be featured with the following description: \n\n" . $body;
		$headers = array(
			"From: 'Wedding Season Notifications' <notifications@weddingseason.events>",
			"X-Mailer: PHP/" . PHP_VERSION
		);
		foreach($emails as $email) {
			mail($email, "😍 Someone submitted a wedding! 🎉", $body, implode("\r\n", $headers));
		}
	}

	function getDescription($form) {
		$description = '';
		foreach($form as $key => $value) {
			if ($key != 'submit') {
				$description .= $key . "\n" . $value . "\n\n";
			}
		}
		return $description;
	}

	function writeDescription($dir, $description) {
		$file = fopen($dir . '/description.txt', 'w');
		fwrite($file, $description);
		fclose($file);
	}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Google Analytics -->
		<script>
			window.ga=window.ga||function(){(ga.q=ga.q||[]).push(arguments)};ga.l=+new Date;
			ga('create', 'UA-109147046-1', 'auto');
			ga('send', 'pageview');
		</script>
		<script async src='https://www.google-analytics.com/analytics.js'></script>
		<!-- End Google Analytics -->
		
		<title>Thank you for the submission - Wedding Season</title>
		<meta charset="utf-8">
		<link href="https://fonts.googleapis.com/css?family=Lora:400i|Lusitana:400,700|Parisienne" rel="stylesheet">
		<link rel="shortcut icon" type="image/png" href="/img/favicon.png"/>
		<link rel="stylesheet" href="/css/general.css" type="text/css">
		<link rel="stylesheet" href="/css/page.css" type="text/css">
		<link rel="stylesheet" href="/css/flexboxgrid.min.css" type="text/css">
		<link rel="stylesheet" href="/css/font-awesome/css/font-awesome.min.css" type="text/css">
		<meta name="viewport" content="width=device-width, initial-scale=1">
	</head>
	<body>
		<div class="back">
			<div class="container logo-container">
				<div class="row">
					<div class="col-xs-12 center-xs">
						<a href="/">
							<picture>
								<source media="(max-width: 767px)" srcset="/img/logo/wedding-season-logo.svg">
								<source media="(min-width: 768px)" srcset="/img/logo/wedding-season-logo-wide.svg">
								<img class="logo" src="/img/logo/wedding-season-logo-wide.svg" alt="wedding season logo">
							</picture>
						</a>
					</div>
				</div>
			</div>
			<div class="container-fluid menu-container">
				<div class="container">
					<div class="row center-xs">
						<div class="col-xs-12 col-md-12 col-lg-10">
							<nav class="row menu">
								<div class="col-xs">
									<a href="/">Home</a>
								</div>
								<div class="col-xs">
									<a href="/about.html">About</a>
								</div>
								<div class="col-xs">
									<a href="/blog.html">Blog</a>
								</div>
								<div class="col-xs">
									<a class="a--highlighted" href="/submit-wedding.html">Submit</a>
								</div>
								<div class="col-xs">
									<a href="/get-in-touch.html">Get in touch</a>
								</div>
							</nav>
						</div>			
					</div>
				</div>
			</div>
		</div>
		
		<div class="container">
			<div class="row center-xs" style="text-align: left;">
				<div class="col-xs-12 col-sm-11 col-md-9 col-lg-8">
					<h1>Thank you very much for your submission! 😍</h1>
					<p>We appreciate it, and <em>we promise</em> to do our best in order to produce a high quality post to your credit.</p>
					<p>We will let you know as soon as we are done!</p>
					<img class="divider--end" role="presentation" src="/img/decorations/end-divider.svg"/>
				</div>
			</div>
		</div>
		<footer>
			<div class="container">
				<div class="row center-xs middle-xs between-xs start-md">
					<div class="col-xs-12 col-sm-6 last-xs first-sm">
						<a href="/">
							<img class="logo--footer" src="/img/logo/wedding-season-logo-wide-black.svg" alt="wedding season logo"/>
						</a>
					</div>
					<div class="col-xs-12 col-sm-6">
						<div class="row center-xs end-md">
							<div class="col-xs-12">
								<div class="row middle-xs">
									<div class="col-xs">
										Get in touch:
									</div>
									<div class="col-xs-2 col-sm-2 col-md-1">
										<a href="https://www.pinterest.com/weddingseason_events/" target="_blank" aria-label="Wedding Season on Pinterest" title="Wedding Season on Pinterest">
											<i class="fa fa-pinterest"></i>
										</a>
									</div>
									<div class="col-xs-2 col-sm-2 col-md-1">
										<a href="https://www.facebook.com/weddingseason.events" target="_blank" aria-label="Wedding Season on Facebook" title="Wedding Season on Facebook">
											<i class="fa fa-facebook-official"></i>
										</a>
									</div>
									<div class="col-xs-2 col-sm-2 col-md-1">
										<a href="https://www.instagram.com/weddingseason.events/" target="_blank" aria-label="Wedding Season on Instagram" title="Wedding Season on Instagram">
											<i class="fa fa-instagram"></i>
										</a>
									</div>
								</div>
							</div>
						</div>
						<div class="row center-xs end-sm">
							<div class="col-xs-12">
								<address>
									Wedding Season<br/>
									Nixvej 2A, 4700 Næstved, Denmark
								</address>
							</div>
						</div>
					</div>	
				</div>
			</div>
		</footer>
	</body>
</html>
