<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>LanServer Home</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="cover.css" rel="stylesheet">
    <link rel="stylesheet" href="css/tree.css" /> 


  </head>

  <body>
	<!-- Bootstrap core JavaScript -->
    <script src="jquery/jquery.min.js"></script>
    <script src='jquery/jquery-ui.min.js'></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- Background Video -->
    <script src="js/jquery.backgroundvideo.min.js"></script>
    <!-- jQuery Color Plugin --> 
	<script type="text/javascript" src="js/jquery.color.js"></script> 
	<!-- Filetree --> 
	<script type="text/javascript" src="js/jMenu.js"></script> 

     
	<script type="text/javascript">
 
		$(document).ready(function(){
			
			var videobackground = new $.backgroundVideo($('body'), {
				"align": "centerXY",
				"width": 480,
				"height": 480,
				"path": "media/",
				"filename": "video",
				"types": ["mp4","ogg","webm"]
			});
			 
			$(".step2").hide();
			$(".step3").hide();
			$(".step1").show();
			$("#jQ-menu").hide();
 
			$('.step1t').click(function(){
				$("#step1li").attr('class', 'active');
				$("#step2li").attr('class', 'inactive');
				$("#step3li").attr('class', 'inactive');
				$(".step2").hide();
				$(".step3").hide();
				$(".step1").show();
			});
			$('.step2t').click(function(){
				$("#step2li").attr('class', 'active');
				$("#step1li").attr('class', 'inactive');
				$("#step3li").attr('class', 'inactive');
				$(".step1").hide();
				$(".step3").hide();
				$(".step2").show();
			});
			$('.step3t').click(function(){
				$("#step3li").attr('class', 'active');
				$("#step1li").attr('class', 'inactive');
				$("#step2li").attr('class', 'inactive');
				$(".step2").hide();
				$(".step1").hide();
				$(".step3").show();
			});
			
			$('#viewbtn').click(function(event) {
	
				event.preventDefault();
				$("#jQ-menu").show();
				$("#viewbtn").hide();
				$("#viewadv").hide();
	
			});

		});
 
	</script>

    <div class="site-wrapper">

      <div class="site-wrapper-inner">

        <div class="cover-container">

          <div class="masthead clearfix">
            <div class="inner">
              <h3 class="masthead-brand">Welcome to my LAN-Party</h3>
              <ul class="nav masthead-nav">
                <li id="step1li" class="active"><a href="#" class="step1t">Step 1</a></li>
                <li id="step2li" class="inactive"><a href="#" class="step2t">Step 2</a></li>
                <li id="step3li" class="inactive"><a href="#" class="step3t">Step 3</a></li>
              </ul>
            </div>
          </div>
		  <div class="step1">
            <div class="inner cover">
              <h1 class="cover-heading">Get uTorrent.</h1>
              <p class="lead">We share our files/games using the BitTorrent protocol, because it's way faster than handing around an external HDD all the time. So get uTorrent if you dont have it already. It doesn't need to be installed and it's just around 2MB in size. Just execute it and continue with step 2.</p>
              <p class="lead">
                <a href="download/utorrent.exe" class="btn btn-lg btn-default">Get it!</a>
              </p>
            </div>
          </div>
          <div class="step2">
            <div class="inner cover">
              <h1 class="cover-heading">File List</h1>
              <p class="lead" id="viewadv">Here you can see every Torrent file available. Just click the button below, pick the games you want and open the torrents with uTorrent.</p>
              <p class="lead">
                <a href="#" class="btn btn-lg btn-default" id="viewbtn">Get File List</a>
                <div id="jQ-menu"> 
 
					<?php
						$path = "./torrents/";

						function createDir($path = '.')
						{	
							if ($handle = opendir($path)) 
							{
								echo "<ul>";
				
								while (false !== ($file = readdir($handle))) 
								{
									if (is_dir($path.$file) && $file != '.' && $file !='..')
										printSubDir($file, $path, $queue);
									else if ($file != '.' && $file !='..')
									$queue[] = $file;
								}
			
								printQueue($queue, $path);
								echo "</ul>";
							}
						}
	
						function printQueue($queue, $path)
						{
							foreach ($queue as $file) 
							{
								printFile($file, $path);
							} 
						}
	
						function printFile($file, $path)
						{
							echo "<li><a href=\"".$path.$file."\">$file</a></li>";
						}
	
						function printSubDir($dir, $path)
						{
							echo "<li><span class=\"toggle\">$dir</span>";
							createDir($path.$dir."/");
							echo "</li>";
						}
						
						createDir($path);
						?>

				</div>
              </p>
            </div>
          </div>
          <div class="step3">
            <div class="inner cover">
              <h1 class="cover-heading">Seed</h1>
              <p class="lead">BitTorrent is so fast, because every client which downloads the file also uploads it to other peers. If no one is seeding, you could as well download the file from the server.</p>
              <p class="lead">Enjoy playing.</p>
            </div>
          </div>
          <div class="mastfoot">
            <div class="inner">
              <p>Template by <a href="https://twitter.com/mdo">@mdo</a>, modified by <a href="https://twitter.com/kellagroup">@kellagroup</a>.</p>
            </div>
          </div>

        </div>

      </div>

    </div>

  </body>
</html>
