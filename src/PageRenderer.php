<?php

namespace Nmpl\Pulsebridge;

// Remove Composer autoload
// require __DIR__ . '/../vendor/autoload.php';


if (file_exists(__DIR__ . '/vendor/autoload.php')) {
    require_once __DIR__ . '/vendor/autoload.php';
} else {
    // Manually require dependencies
    require_once __DIR__ . '/Pulsebridge.php';
    require_once __DIR__ . '/Logger.php';
}


class PageRenderer
{
    public static function renderHeader($title)
    {

        if (!isset($smsgateway)) {
            $smsgateway = new Pulsebridge();
            $smsgateway->setDataPath(dirname(__DIR__) . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR);

        }

        echo '<!DOCTYPE html>
        <html lang="en">
        <head>
        <meta charset="UTF-8">
          <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="PulseBridge - SMS Gateway Software">

         <meta property="og:title" content="PulseBridge - SMS Gateway Software">
        <meta property="og:type" content="">
        <meta property="og:url" content="">
        <meta property="og:image" content="">

        <link rel="icon" href="./resources/favicon.ico" sizes="any">
        <link rel="icon" href="./resources/logo.svg" type="image/svg+xml">
        <link rel="apple-touch-icon" href="./resources/logo.svg">

        <link rel="manifest" href="site.webmanifest">
        <meta name="theme-color" content="#fafafa">

        <title>' . $title . '</title>
        <link rel="icon" href="./resources/favicon.ico" type="image/x-icon">
        <link rel="stylesheet" href="./resources/css/bootstrap.min.css" >
		<link rel="stylesheet" href="./resources/css/fontawesome.min.css"  crossorigin="anonymous">

	 </head>
        <body>
		<script src="./resources/js/jquery-3.6.4.slim.min.js" ></script>
		<script src="./resources/js/popper.min.js" ></script>
		<script src="./resources/js/bootstrap.min.js"></script>
		';

	// Navbar
	echo '<header class="bg-dark text-white py-3">
		<div class="container">
			<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
				<!-- Include the SVG logo -->
				<a class="navbar-brand" href="index.php">
					<img src="resources/logo.svg" width="30" height="30" class="d-inline-block align-top" alt="Logo">
					Pulsebridge
				</a>

				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarNav">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item">
							<a class="nav-link" href="/">Home</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#" data-toggle="modal" data-target="#faqModal">FAQ</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="https://wa.link/9exku8">Contact</a>
						</li>
					</ul>
				</div>
			</nav>
		</div>
	</header>';

	// FAQ Modal
	echo '<div class="modal fade" id="faqModal" tabindex="-1" role="dialog" aria-labelledby="faqModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="faqModalLabel">Frequently Asked Questions</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<!-- Add your FAQ content here -->
						<p><strong>Q: What is the SMS Gateway application?</strong></p>
						<p><strong>A:</strong> The SMS Gateway application is a software that runs on an Android mobile phone, serving as a bridge between web interfaces and SMS functionality.</p>

						<p><strong>Q: How does it work?</strong></p>
						<p><strong>A:</strong> The SMS Gateway application on the mobile phone receives commands and messages from the web interface, allowing users to send and receive SMS messages programmatically.</p>

						<p><strong>Q: Can I use the SMS Gateway for business purposes?</strong></p>
						<p><strong>A:</strong> Yes, the SMS Gateway is designed to support business use cases, enabling you to integrate SMS functionality into your applications, services, or processes.</p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>';

    echo '<div class="container mt-4">';
		echo '<h1 class="mt-4 display-4 text-center">PulseBridge<sup style="font-size: 30px;">' . $smsgateway->getVersion() . '</sup></h1>';
      echo '<p class="mt-4 display-4 text-center" style="font-size: large;">SMS gateway web-application with an HTTP interface to connect with a PulseBridge android <a href="https://github.com/aamitn/pulsebridge-app/releases">app</a> and send/receive SMS. </p>';
		echo '<p class="mt-4 display-4 text-center" style="font-size: small;">App Version: ' . $smsgateway->getVersion() . '</p>';
		echo '<hr>';
	}

public static function renderFooter()
{
    echo '</div>'; // Close the container div

    // Footer Start
    echo '<footer class="mt-5 text-center">';

    // Footer CTA App Download Link
    echo '
        <div class="d-flex justify-content-center align-items-center my-4" style="gap: 28px;">
            <div>
                <span style="
                    font-size: 1.35rem;
                    font-weight: 600;
                    color: #1a237e;
                    letter-spacing: 0.5px;
                    background: linear-gradient(90deg, #00c6ff 0%, #0072ff 100%);
                    -webkit-background-clip: text;
                    -webkit-text-fill-color: transparent;
                    display: inline-block;
                    padding: 4px 0 4px 0;
                    ">
                    <i class="fas fa-mobile-alt" style="color:#0072ff; margin-right:8px;"></i>
                    Get the <span style="color:#0072ff;">PulseBridge</span> Android App
                </span>
                <div style="font-size: 0.98rem; color: #333; margin-top: 4px;">
                    Ditch Twillio! with the PulseBridge gateway and app, send SMS messages directly from your Android phone.
                </div>
            </div>
            <a href="https://github.com/aamitn/pulsebridge-app/releases/" target="_blank" rel="noopener" style="display:inline-block;">
                <img src="https://play.google.com/intl/en_us/badges/static/images/badges/en_badge_web_generic.png"
                    alt="Get it on Google Play"
                    style="height:64px; margin-bottom:0; box-shadow:0 4px 16px rgba(0,114,255,0.12); border-radius:10px;">
            </a>
        </div>
    ';

    // Footer server and client time, PHP run mode, and web server information
    echo '<div class="row">
                <div class="col">
                    <strong>Server Time:</strong> <span id="serverTime"></span> -
                    <strong>Client Time:</strong> <span id="clientTime"></span>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <strong>PHP Run Mode:</strong> ' . php_sapi_name() . '
                    <strong>Web Server:</strong> ' . $_SERVER['SERVER_SOFTWARE'] .
            (function_exists('apache_get_version') ? apache_get_version() : '') . '
                </div>
            </div>';

        //Footer copyright and year
        echo  '<div class="row">
                <div class="col">
                        <hr>
                    <small class="text-muted">Pulsebridge - Bitmutex Technologies &copy; ' . date("Y") . '</small>
                </div>
            </div>
        </footer>';

        //Time Update JS
        echo '<script>
                function updateServerTime() {
                    var currentTime = new Date();
                    var hours = currentTime.getHours();
                    var minutes = currentTime.getMinutes();
                    var seconds = currentTime.getSeconds();

                    // Add leading zero if needed
                    minutes = (minutes < 10 ? "0" : "") + minutes;
                    seconds = (seconds < 10 ? "0" : "") + seconds;

                    var formattedTime = hours + ":" + minutes + ":" + seconds;
                    document.getElementById("serverTime").innerHTML = formattedTime;
                }

                function updateClientTime() {
                    var currentTime = new Date();
                    var hours = currentTime.getHours();
                    var minutes = currentTime.getMinutes();
                    var seconds = currentTime.getSeconds();

                    // Add leading zero if needed
                    minutes = (minutes < 10 ? "0" : "") + minutes;
                    seconds = (seconds < 10 ? "0" : "") + seconds;

                    var formattedTime = hours + ":" + minutes + ":" + seconds;
                    document.getElementById("clientTime").innerHTML = formattedTime;
                }

                // Update server time every second
                setInterval(updateServerTime, 1000);

                // Update client time every second
                setInterval(updateClientTime, 1000);

                // Initial updates
                updateServerTime();
                updateClientTime();
            </script>';
        echo '</body></html>';
}

}


// Create an Pulsebridge instance if not done yet, and define the flat-file data folder
if (!isset($smsgateway)) {
    $smsgateway = new Pulsebridge();
    $smsgateway->setDataPath(dirname(__DIR__) . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR);
}

// Detect the URL with php file
//$url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'] . ($_SERVER['PHP_SELF']);

// Detect the URL without php file
$url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'];

// Retrieve some parameters
$command = isset($_GET["m"]) ? "m" : (isset($_GET["i"]) ? "i" : (isset($_GET["e"]) ? "e" : ""));
$h = isset($_GET["h"]) ? $_GET["h"] : "";
$mid = isset($_GET["mid"]) ? $_GET["mid"] : "";

// Correct the international format of the phone number if needed
$to = isset($_GET["to"]) ? $_GET["to"] : "";

    // Validate the "to" field
    if (!empty($to) && !preg_match('/^\d{10}$/', $to)) {
        // Handle validation error (e.g., redirect to an error page)
        header("Location: error.php?message=Invalid phone number");
        exit();
    }


if ("00" == substr($to, 0, 2)) {
    $to = "+" . substr($to, 2, strlen($to) - 2);
}


// Define a default message if needed
$message = isset($_GET["message"]) ? $_GET["message"] : ""; // Hello World 😉

    // Validate the "message" field
    if (!empty($message) && strlen($message) < 5) {
        // Handle validation error (e.g., redirect to an error page)
        header("Location: error.php?message=Message should be at least 5 characters");
        exit();
    }


// Retrieve the device id
$id = isset($_GET["id"]) ? $_GET["id"] : "";
$device_id = $id;
if ((!empty($to)) && empty($device_id)) {
    $device_id = substr(md5(uniqid("", true)), 0, 16);
} elseif ((empty($to)) && (!empty($device_id)) && (!file_exists($smsgateway->getDataPath() . $device_id))) {
    $device_id = "";
}

// Calculate the device hash based on the secret
$device_h = $smsgateway->calculateAuthenticationHash($device_id);

// Check if device hash is valid for an existing device, otherwise flush the device id
if ((!empty($id)) && ($h != $device_h)) {
    $device_id = "";
} else {
    $smsgateway->updateDataStructure($id);
}

if ((!empty($mid)) && (!empty($device_id))) {
    $message_state = "MISSING";
    $message_array = $smsgateway->readSentStatus($id, $mid);
    if (isset($message_array[0]['status'])) {
        $message_state = $message_array[0]['status'];
    }
    echo $message_state;
} elseif ("e" == $command) {
    // An enhanced command can be implemented here
} elseif (("m" == $command) && (!empty($device_id))) {
    PageRenderer::renderHeader('Pulsebridge App');
//include 'header.php';
    echo '<body>';
    echo '<div class="container mt-4">';

// Back Button with Bootstrap styling and centered
    echo '<div class="text-center"><a href="'.$_SERVER['HTTP_REFERER'].'" class="btn btn-primary mx-auto" style="border-radius: 5px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); transition: background-color 0.3s;">Back</a></div>';

// Display messages resume for the "m" command
    echo '<div class="container mt-5">';

    echo '<div id="accordion">';

// New SMS messages received
    echo '<div class="card mb-4">';
    echo '<div class="card-header" id="newMessagesHeading">';
    echo '<h2 class="mb-0">';
    echo '<button class="btn btn-link" data-toggle="collapse" data-target="#newMessagesCollapse" aria-expanded="true" aria-controls="newMessagesCollapse">';
    echo '<p style="color: #1d2124;font-size: large;">New SMS messages received <i class="fas fa-chevron-down float-right"></i></p>';
    echo '</button>';
    echo '</h2>';
    echo '</div>';
    echo '<div id="newMessagesCollapse" class="collapse show" aria-labelledby="newMessagesHeading" data-parent="#accordion">';
    echo '<div class="card-body">';
    $new_messages = $smsgateway->readNewMessages($id);
    if (count($new_messages) > 0) {
        foreach ($new_messages as $message) {
            echo '<div class="card mb-2">';
            echo '<div class="card-body">';
            echo '<p class="text-muted"><span class="badge">' . date("Y-m-d H:i:s", $message['sms_received'] / 1000) . '</span></p>';
            echo '<span class="badge badge-primary">' . $message['from'] . '</span>: ' . $message['content'];
            echo '</div>';
            echo '</div>';
        }
    } else {
        echo '<p class="text-muted m-3">No messages to display.</p>';
    }
    echo '</div>';
    echo '</div>';
    echo '</div>';

// All SMS messages received
    echo '<div class="card mb-4">';
    echo '<div class="card-header" id="allMessagesHeading">';
    echo '<h2 class="mb-0">';
    echo '<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#allMessagesCollapse" aria-expanded="false" aria-controls="allMessagesCollapse">';
    echo '<p style="color: #1d2124;font-size: large;">All SMS messages received <i class="fas fa-chevron-down float-right"></i></p>';
    echo '</button>';
    echo '</h2>';
    echo '</div>';
    echo '<div id="allMessagesCollapse" class="collapse show" aria-labelledby="allMessagesHeading" data-parent="#accordion">';
    echo '<div class="card-body">';
    $all_messages = $smsgateway->readAllMessages($id);
    if (count($all_messages) > 0) {
        foreach ($all_messages as $message) {
            echo '<div class="card mb-2">';
            echo '<div class="card-body">';
            echo '<p class="text-muted"><span class="badge">' . date("Y-m-d H:i:s", $message['sms_received'] / 1000) . '</span></p>';
            echo '<span class="badge badge-primary">' . $message['from'] . '</span>: ' . $message['content'];
            echo '</div>';
            echo '</div>';
        }
    } else {
        echo '<p class="text-muted m-3">No messages to display.</p>';
    }
    echo '</div>';
    echo '</div>';
    echo '</div>';


    // All SMS messages sent
    echo '<div class="card mb-4">';
    echo '<div class="card-header" id="sentMessagesHeading">';
    echo '<h2 class="mb-0">';
    echo '<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#sentMessagesCollapse" aria-expanded="false" aria-controls="sentMessagesCollapse">';
    echo '<p style="color: #1d2124;font-size: large;">All SMS messages Sent <i class="fas fa-chevron-down float-right"></i></p>';
    echo '</button>';
    echo '</h2>';
    echo '</div>';
    echo '<div id="sentMessagesCollapse" class="collapse show" aria-labelledby="sentMessagesHeading" data-parent="#accordion">';
    echo '<div class="card-body">';
    $sent_messages = $smsgateway->readAllSentStatus($id);
    if (count($sent_messages) > 0) {
        foreach ($sent_messages as $message) {
            echo '<div class="card mb-2">';
            echo '<div class="card-body">';
            echo '<p class="text-muted"><span class="badge">' . date("Y-m-d H:i:s", $message['last_update'] / 1000) . '</span></p>';
            $statusBadgeClass = ($message['status'] === 'DELIVERED') ? 'badge badge-success' : 'badge badge-secondary';
            echo '<span class="' . $statusBadgeClass . '">' . $message['status'] . '</span>';
            echo ' <a class="badge badge-info" href="' . $url . '?id=' . $device_id . '&h=' . $h . '&mid=' . $message['message_id'] . '" target="track_' . $message['message_id'] . '">Track</a>';
            echo ' : ' . $message['content'];
            echo '</div>';
            echo '</div>';
        }
    } else {
        echo '<p class="text-muted m-3">No messages to display.</p>';
    }
    echo '</div>';
    echo '</div>';
    echo '</div>';

    echo '</div>'; // Closing accordion container

    echo '</div>';
    echo '</div>';

    //include 'footer.php';
    PageRenderer::renderFooter();
    echo '</body></html>';
}

elseif (empty($device_id) || ("i" == $command)) {
    // Display basic usage info
    if ("" == $to) {
        $autofocus_to = "autofocus=\"autofocus\"";
        $autofocus_message = "";
    } else {
        $autofocus_to = "";
        $autofocus_message = "autofocus=\"autofocus\"";
    }
	//include header;
	PageRenderer::renderHeader('Pulsebridge App');

    echo '
            <body>
                <div class="container mt-4">

                    <form action="' . htmlspecialchars($_SERVER["PHP_SELF"]) . '" method="get" class="mb-4" onsubmit="return validateForm()" name="smsForm">';


	if (!empty($id)) {
        // Back Button with Bootstrap styling and centered
        echo '<div class="text-center"><a href="'.$_SERVER['HTTP_REFERER'].'" class="btn btn-primary mx-auto" style="border-radius: 5px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); transition: background-color 0.3s;">Back</a></div>';

        echo '<div class="form-group">';
		echo '  <label for="id">Device Identification:</label>';
		echo '  <input class="form-control form-control-sm font-weight-bold" size="18" type="text" name="id" placeholder="e.g. 01234567890abcdef" value="' . $id . '" readonly>';
		echo '</div>';
		if (!empty($h)) {
			echo '<div class="form-group">';
			echo '  <label for="h">Secret Hash for the Device:</label>';
			echo '  <input class="form-control form-control-sm font-weight-bold" size="8" type="text" name="h" placeholder="e.g. abcdef" value="' . $h . '" readonly>';
			echo '</div>';
		}
	}

    $outputForm  = '	<div class="form-group">
                            <label for="to">Destination mobile phone number:</label>
                            <input class="form-control" size="20" ' . $autofocus_to . ' type="tel" name="to" placeholder="e.g. 00123456789012" value="' . $to . '">
                        </div>';
    $outputForm .= '
                        <div class="form-group">
                            <label for="message">Message:</label>
                            <textarea ' . $autofocus_message . ' class="form-control" columns="40" rows="5" placeholder="e.g. Please call me back asap !" name="message" autocomplete="on" maxlength="300" cols="80" wrap="soft">' . $message . '</textarea>
                        </div>
                        <button type="submit" class="btn btn-success">Send SMS message</button>
						<button type="reset" class="btn btn-secondary">Reset</button>
                        <p></p>';
    $outputForm .= '</form>
		<script>
		function goToLink() {
			window.location.href = \'index.php?to=0123456789&message=Tests 🙂\';
		}
		function validateForm() {
			var to = document.forms["smsForm"]["to"].value;
			var message = document.forms["smsForm"]["message"].value;

			// Validate the "to" field
			if (to === "" || !/^\d{10}$/.test(to)) {
				alert("Enter a valid 10-digit phone number.");
				return false;
			}

			// Validate the "message" field
			if (message === "" || message.length < 5) {
				alert("Message should be at least 5 characters.");
				return false;
			}

			return true;
		}
		</script>';

    if ("" == $h) {
        $outputForm .= '	<button class="btn btn-primary" onclick="goToLink()">Setup Credentials</button> <br>';
		$outputForm .= '... or send a first message calling this URL: ';
		$outputForm .= '<div style="display: flex; align-items: center;">';
		$outputForm .= '<div style="margin-right: 10px;">';
		$outputForm .= '<b><a href="' . $url . '?to=0123456789&message=Hello+world" target="_blank" data-toggle="tooltip" title="Send Your First SMS!"><i class="fas fa-link"></i> ' . $url . '?to=0123456789&message=Hello+world</a></b>';
		$outputForm .= '</div>';
		$outputForm .= '</div>';
	} else {
		$outputForm .= '... or send a direct message calling this URL: ';
		$outputForm .= '<div style="display: flex; align-items: center;">';
		$outputForm .= '<div style="margin-right: 10px;">';
		$outputForm .= '<b><a href="' . $url . '?id=' . $id . '&h=' . $h . '&to=' . (("" != $to) ? $to : "0123456789") . '&message=' . urlencode(("" != $message) ? $message : "Hello world 🙂") . '" target="_blank" data-toggle="tooltip" title="Send Direct Message"><i class="fas fa-envelope"></i> ' . $url . '?id=' . $id . '&h=' . $h . '&to=' . (("" != $to) ? $to : "0123456789") . '&message=' . urlencode(("" != $message) ? $message : "Hello world 🙂") . '</a></b>';
		$outputForm .= '</div>';
		$outputForm .= '</div>';
	}
		$outputForm .= '</div>';

       	 echo $outputForm;
		 PageRenderer::renderFooter();
	    //include 'footer.php';
		echo ' </body> </html>';

}

 elseif (!empty($to)) {
    // Push the message on the server
    $message_id = $smsgateway->sendMessage($device_id, $to, $message);

    $outputSent = '
            <body>
                <div class="container mt-4">';
    if (empty($message_id)) {
        header('X-SMSGateway-State: FAILED');
        $outputSent .= '<meta name="X-SMSGateway-State" content="0">
                    </head>
                    <body>';
    } else {
        header('X-SMSGateway-State: NEW');
        header('X-SMSGateway-State-Url: ' . $url . '?id=' . $id . '&h=' . $h . '&mid=' . $message_id);
        header('X-SMSGateway-Message-Id: ' . $message_id);
        $outputSent .= '<meta name="X-SMSGateway-State" content="NEW">
                    <meta name="X-SMSGateway-State-Url" content="' . $url . '?id=' . $id . '&h=' . $h . '&mid=' . $message_id . '">
                    <meta name="X-SMSGateway-Message-Id" content="' . $message_id . '">
                    </head>
                    <body>';
    }

	//include Header
	PageRenderer::renderHeader('Pulsebridge App');

	// Display usage information
	$outputSent .= '<div class="container mt-4">';
	 if (empty($messageId)) {
		$outputSent .= '<div class="alert alert-success" role="alert">';
		$outputSent .= 'Message : <strong>' . htmlspecialchars($message) . '</strong> to phone number : <strong> ' . htmlspecialchars($to) . '</strong> successfully pushed on the server.';
		$outputSent .= '</div>';

         $outputSent .= '<div class="alert alert-info" role="alert">';
         $outputSent .= 'Device Code :  <strong>' . htmlspecialchars($device_id) . '</strong> <br>Device Hash: <strong>' . htmlspecialchars($device_h) .'</strong>';
         $outputSent .= '</div>';
	} else {
		$outputSent .= '<div class="alert alert-danger" role="alert">';
		$outputSent .= 'Message <strong>' . htmlspecialchars($message) . '</strong> for ' . htmlspecialchars($to) . ' failed to push on the server.';
		$outputSent .= '</div>';
	}

	$outputSent .= '<div class="row">';
	$outputSent .= '<div class="col-md-6">';
	$outputSent .= '<h2 class="h4 mb-3">Installation Instructions</h2>';
	$outputSent .= '<p>If not done yet, please install the Android Pulsebridge App by clicking the link below: </p>';
	$outputSent .= '<a href="https://github.com/medic/cht-gateway/releases/latest" target="_blank" class="btn btn-primary"><i class="fas fa-download"></i> Download SMSGatewayApp</a><br><br>';

	$outputSent .= '<h2 class="h4 mb-3">App Configuration</h2>';
	$outputSent .= '<p>Set the following URL in the Settings of the Android App:</p>';
	$outputSent .= '<div class="input-group mb-3">';
	$outputSent .= '<input type="text" class="form-control" id="app-url" value="' . htmlspecialchars($url) . '?id=' . htmlspecialchars($device_id) . '&h=' . htmlspecialchars($device_h) . '" readonly>';
	$outputSent .= '<button class="btn btn-outline-info" type="button" onclick="copyToClipboard()">Copy URL</button>';
	$outputSent .= '</div>';
	$outputSent .= '<small class="text-muted">Click "Copy URL" to copy the configuration URL to the clipboard.</small><br>';
     $outputSent .= '<small class="text-muted">Open Pulsebridge <a href="https://github.com/aamitn/pulsebridge-app/releases/">app</a> -> Settings -> Paste url to pulsebride url field</small>';

	$outputSent .= '</div>';
	$outputSent .= '<div class="col-md-6">';
	$outputSent .= '<h2 class="h4 mb-3">Actions</h2>';
	$outputSent .= '<p>Check SMS messages or send more SMS messages:</p>';
	$outputSent .= '<a href="' . htmlspecialchars($url) . '?id=' . htmlspecialchars($device_id) . '&h=' . htmlspecialchars($device_h) . '&m" class="btn btn-success mb-2">Check SMS Messages <i class="bi bi-arrow-right"></i></a>';
	$outputSent .= '<a href="' . htmlspecialchars($url) . '?id=' . htmlspecialchars($device_id) . '&h=' . htmlspecialchars($device_h) . '&to=&message=&i" class="btn btn-primary mb-2">Send More SMS Messages <i class="bi bi-arrow-right"></i></a>';

     $outputSent .= '<h2 class="h4 mb-3">Dev Usage</h2>';
    $outputSent .= '<p>Send Messages using HTTP GET on this URL from your application::</p>';
    $outputSent .= '<div style="display: flex; align-items: center;">';
    $outputSent .= '<div style="margin-right: 10px;">';
    $outputSent .= '<b><a href="' . $url . '?id=' . htmlspecialchars($device_id) . '&h=' .  htmlspecialchars($device_h) . '&to=' . (("" != $to) ? $to : "0123456789") . '&message=' . urlencode(("" != $message) ? $message : "Hello world 🙂") . '" target="_blank" data-toggle="tooltip" title="Send Direct Message"><i class="fas fa-envelope"></i> ' . $url . '?id=' .  htmlspecialchars($device_id) . '&h=' .  htmlspecialchars($device_h) . '&to=' . (("" != $to) ? $to : "0123456789") . '&message=' . urlencode(("" != $message) ? $message : "Your Message from pulsebridge🙂") . '</a></b>';
    $outputSent .= '</div>';
    $outputSent .= '</div>';


	$outputSent .= '</div>';
	$outputSent .= '</div>';

	$outputSent .= '</div>';

     $outputSent .= '<script>';
     $outputSent .= 'function copyToClipboard() {';
     $outputSent .= '  var input = document.getElementById("app-url");';
     $outputSent .= '  input.select();';
     $outputSent .= '  document.execCommand("copy");';
     $outputSent .= '  var alertContainer = document.createElement("div");';
     $outputSent .= '  alertContainer.style.padding = "10px";'; // Adjust the padding as needed
     $outputSent .= '  alertContainer.style.position = "fixed";';
     $outputSent .= '  alertContainer.style.top = "60px";'; // Adjust the top distance as needed
     $outputSent .= '  alertContainer.style.right = "20px";'; // Adjust the right distance as needed
     $outputSent .= '  alertContainer.style.zIndex = "1000";'; // Adjust the z-index as needed
     $outputSent .= '  alertContainer.className = "alert-container";'; // Added a class for styling
     $outputSent .= '  var alertDiv = document.createElement("div");';
     $outputSent .= '  alertDiv.className = "alert alert-success alert-dismissible fade show";';
     $outputSent .= '  alertDiv.innerHTML = "URL copied to clipboard!";';
     $outputSent .= '  var closeButton = document.createElement("button");';
     $outputSent .= '  closeButton.type = "button";';
     $outputSent .= '  closeButton.className = "close";';
     $outputSent .= '  closeButton.setAttribute("data-dismiss", "alert");';
     $outputSent .= '  closeButton.innerHTML = "&times;";';  // "&times;" is the HTML entity for the close symbol (X)
     $outputSent .= '  alertDiv.appendChild(closeButton);';
     $outputSent .= '  alertContainer.appendChild(alertDiv);';
     $outputSent .= '  document.body.appendChild(alertContainer);';
     $outputSent .= '  setTimeout(function() {';
     $outputSent .= '    alertContainer.remove();';
     $outputSent .= '  }, 3000);';  // 3000 milliseconds = 3 seconds
     $outputSent .= '}';
     $outputSent .= '</script>';

     echo $outputSent;
     //include 'footer';
     PageRenderer::renderFooter();
} else {
    // Run the API server
    $smsgateway->apiServer();
}


