<?php
namespace nmpl\pulsebridge;

class App
{

    public function dependencyInstaller(): void
    {
        // Check if the autoload.php file exists
        $autoloadPath = __DIR__ . '/vendor/autoload.php';

        if (!file_exists($autoloadPath)) {


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

        <title>Installation-PulseBridge</title>
        <link rel="icon" href="./resources/favicon.ico" type="image/x-icon">
         <link rel="stylesheet" href="./resources/css/fontawesome.min.css"  crossorigin="anonymous">
	 </head>
        <body>
        <img src="./resources/logo.svg" alt="logo" style="display: block; margin: 10px auto; width: 120px; height: auto; border-radius: 10px; box-shadow: 0 4px 8px rgb(37, 150, 190);  "/>
        ';


            // Output the result of the shell command
            echo '<div style="max-width: 600px; margin: auto; padding: 20px; border: 2px solid #3498db; background-color: #ecf0f1; border-radius: 10px; text-align: center;">';
            echo "<h2 style='color: #3498db;'>Application Installation</h2>";
            echo "<p style='font-size: 18px; margin-bottom: 20px;'>Before installing, make sure you have Composer installed on your system. If not, follow the steps below:</p>";
            echo "<p style='font-size: small; color: #2c3e50;'>**Make sure you have shell_exec() enabled in your php.ini</p>";
            // Step1: Download Composer
            echo "<h3 style='color: #2c3e50;'>Step 1: Download Composer</h3>";

            echo "<p style='font-size: 16px; color: #2c3e50;'>Visit <a href='https://getcomposer.org/download/' target='_blank' style='color: #3498db; text-decoration: none;'>Composer Download Page</a> to download and install Composer on your system or click the button below:</p>";


            // Check if composer.phar is not present in the project root
            if (!file_exists('composer.phar')) {
                // Display the form to download and install Composer
                echo '<form id="composerForm" method="post">';
                echo '<input type="submit" name="composerCommand" value="Download & Install Composer" style="background-color: #3498db; color: #fff; padding: 10px 15px; border: none; cursor: pointer; font-size: 16px; border-radius: 5px;">';
                echo '</form>';
            } else {
                // Display a success message with a completed icon
                echo '<div style="text-align: center; color: #2ecc71; font-size: 18px;">';
                echo '<i class="fa-solid fa-circle-check" style="color: #2ecc71; font-size: 24px;"></i> Composer is installed successfully!';
                echo '</div>';
            }

            echo "<hr style='border-color: #3498db; margin: 20px 0;'>";

            // Step2: Install App
            echo "<h3 style='color: #2c3e50;'>Step 2: Install Application</h3>";

            echo "<p style='font-size: 16px; color: #2c3e50;'>Once Composer is installed, run <strong>composer install</strong> in your terminal or click the button below:</p>";

            // Output a professional-looking HTML button that triggers another shell command when clicked
            echo '<form id="executeForm" method="post">';
            echo '<input type="submit" name="executeCommand" value="Install Application" style="background-color: #3498db; color: #fff; padding: 10px 15px; border: none; cursor: pointer; font-size: 16px; border-radius: 5px;">';
            echo '</form>';

            // Output PHP version and server info
            echo "<p style='font-size: 16px; margin-top: 20px; color: #2c3e50;'>Server Information: " . $_SERVER['SERVER_SOFTWARE'] . "</p>";

            // Check if the button is clicked
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['executeCommand'])) {
                // Replace 'your-other-shell-command' with the actual shell command you want to execute
                $otherShellCommand = 'php composer.phar install';

                // Execute the other shell command
                $otherOutput = shell_exec($otherShellCommand);

                // Output the result of the other shell command
                echo "<p style='font-size: 16px; margin-top: 20px; color: #2c3e50;'>Application Successfully Installed! Redirecting in 5 Seconds <pre style='font-size: 14px; background-color: #ecf0f1; padding: 10px; border-radius: 5px; overflow-x: auto;'>$otherOutput</pre></p>";

            }

            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['composerCommand'])) {

                $command1 = "php -r \"copy('https://getcomposer.org/installer', 'composer-setup.php');\"";
                $command2 = "php composer-setup.php";
                $command3 = "php -r \"unlink('composer-setup.php');\"";


                // Execute the other shell command
                $otherOutput1 = shell_exec($command1);
                $otherOutput2 = shell_exec($command2);
                $otherOutput3 = shell_exec($command3);

                echo "<p style='font-size: 16px; margin-top: 20px; color: #2c3e50;'>Installing...: 
                 <pre style='font-size: 14px; background-color: #ecf0f1; padding: 10px; border-radius: 5px; overflow-x: auto;'>$otherOutput1</pre>
                <pre style='font-size: 14px; background-color: #ecf0f1; padding: 10px; border-radius: 5px; overflow-x: auto;'>$otherOutput2</pre>
                <pre style='font-size: 14px; background-color: #ecf0f1; padding: 10px; border-radius: 5px; overflow-x: auto;'>$otherOutput3</pre>
                </p>";

                header("Refresh:0");
            }

            // You can choose to exit here or continue with the rest of your code
            echo '</div><footer style="text-align: center;">
              <p>Bitmutex Technologies &copy; '.  date ('Y') .' |  <a href="mailto:amit@bitmutex.com">support@bitmutex.com</a></p>
            </footer>';

            exit();
        }

        // Include the autoload.php file
        require $autoloadPath;
    }

    public function run(): void
    {
        $logger = new Logger(__DIR__ . '/logs/');

        $driver = new Driver($logger);
    }
}

// Instantiate and run the App
$app = new App();

// If the button is clicked, wait for 2 seconds using JavaScript before submitting the form
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['executeCommand'])) {
    echo '<script>
        setTimeout(function() {
            document.getElementById("executeForm").submit();
        }, 2000);
        
                setTimeout(function() {
            document.getElementById("composerForm").submit();
        }, 2000);
    </script>';
}

$app->dependencyInstaller();
$app->run();
