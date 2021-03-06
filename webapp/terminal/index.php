<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta charset="utf-8" />
    <title>LAN Server Backend</title>
    <meta name="author" content="Lukas Fülling"/>
    <meta name="Description" content="LAN Server backend page."/>
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.mousewheel-min.js"></script>
    <script src="js/jquery.terminal-min.js"></script>
    <link href="css/jquery.terminal.css" rel="stylesheet"/>
    <script>
    jQuery(document).ready(function($) {
        $('body').terminal("php/terminal.php", {
            login: true,
            greetings: "\nLogin successful.\nWelcome to the LAN Server backend.",
            onBlur: function() {
                // the height of the body is only 2 lines initialy
                return false;
            }
        });
    });
    </script>
    <noscript>Please Enable JS.</noscript>
  </head>
<body>
