<!DOCTYPE html>
<html lang="en" bg="#0E044A;" background="#0E044A">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


    <title>Live Cricket Widget</title>
    <script src="https://code.jquery.com/jquery-latest.js"></script>
    
    	<script>
	    $(document).ready(function(){
			 $("#maintable").load("load.php");
	        setInterval(function() {
	            $("#maintable").load("load.php");
	        }, 10000);
	    });
	</script>
	
    <style type="text/css">
    	body{background-color: #0E044A!important;}
    	#maintable{background-color: #0E044A!important;}
    	.card-cus{
    		margin-top: 20px;
    		width: 300px;
    		border-radius: 4px;
    		box-shadow: 0px 2px 1px -1px rgb(0 0 0 / 20%), 0px 1px 1px 0px rgb(0 0 0 / 14%), 0px 1px 3px 0px rgb(0 0 0 / 12%);
    		border-radius:20px!important;
    		background-color: #fff;
    	}
    	.card-title {
    		font-weight: 700;
    		color: #424242;
    	}
    	.teams-name {
    		width: 65%;
    	}
    	.teams-score {
    		width: 35%;
    	}
	.container-fluid{
	    padding-left: 0px;
	    padding-right: 0px;
	    background-color: #0E044A!important;
	}
    	.blinking {
	  -webkit-animation: 1s blink ease infinite;
	  -moz-animation: 1s blink ease infinite;
	  -ms-animation: 1s blink ease infinite;
	  -o-animation: 1s blink ease infinite;
	  animation: 1s blink ease infinite;

	}

	@keyframes "blink" {
	  from, to {
	    opacity: 0;
	  }
	  50% {
	    opacity: 1;
	  }
	}

	@-moz-keyframes blink {
	  from, to {
	    opacity: 0;
	  }
	  50% {
	    opacity: 1;
	  }
	}

	@-webkit-keyframes "blink" {
	  from, to {
	    opacity: 0;
	  }
	  50% {
	    opacity: 1;
	  }
	}

	@-ms-keyframes "blink" {
	  from, to {
	    opacity: 0;
	  }
	  50% {
	    opacity: 1;
	  }
	}

	@-o-keyframes "blink" {
	  from, to {
	    opacity: 0;
	  }
	  50% {
	    opacity: 1;
	  }
	}
    	
    </style>
  </head>

	<body background="#0E044A">
		<table id="maintable" class="container-fluid">
		</table>
	</body>
</html>

