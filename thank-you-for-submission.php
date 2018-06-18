---
title: Thank you for the submission
layout: page
---
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
