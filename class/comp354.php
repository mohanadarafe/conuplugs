<?php
class ODCU_library{
    private $userName = "146";
    private $password = "1215c8e99fe409b8e9f774e694542cbc";
    private $baseURL = "https://opendata.concordia.ca/API/v1/course/";
    function query($url){
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_SSL_VERIFYHOST => 0,
        CURLOPT_SSL_VERIFYPEER => 0,
        CURLOPT_HEADER => 0,
        CURLOPT_USERPWD => $this->userName . ":" . $this->password
       
       
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        if ($err) {
            var_dump($err);
            return false;
        } else {
            return $response;
        }
    } //function query(){
	function getID(){
		//Change this catalog filter to the correct course
		$url = $this->baseURL."catalog/filter/COMP/354/*";			
		$result = $this->query($url);
		$result= json_decode($result,true);
		return $result[0]["ID"];
	}

	function getFullCourseName(){
		//Change this catalog filter to the correct course
		$url = $this->baseURL."catalog/filter/COMP/354/*";			
		$result = $this->query($url);
		$result= json_decode($result,true);
		return "<strong>".$result[0]["subject"].$result[0]["catalog"].": "."</strong>".$result[0]["title"];
	}

    function getDescription($temp){
		$url = $this->baseURL."description/filter/".$temp;
        $result = $this->query($url);
        return $result;
	}
	
}
//Get Info
    $endpoint = new ODCU_library();
?>
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>ConUPlugs | Welcome</title>

        <!-- CSS -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,500,500i">
        <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="../assets/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="../assets/css/animate.css">
        <link rel="stylesheet" href="../assets/css/style.css">

        <link rel="shortcut icon" href="../assets/ico/favicon.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">

    </head>

    <body>
		
		<!-- Top menu -->
		<nav class="navbar navbar-inverse navbar-fixed-top navbar-no-bg" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#top-navbar-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a href="../index.html"><img src="../assets/img/conu.png" width= 200px; style="float: left; padding-left: 10px;"></a>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="top-navbar-1">
					<ul class="nav navbar-nav navbar-right navbar-search-button">
						<li><a class="search-button" href="#"><i class="fa fa-search"></i></a></li>
					</ul>
					<form class="navbar-form navbar-right navbar-search-form disabled wow fadeInLeft" role="form" action="" method="post">
						<div class="form-group">
							<input type="text" name="my-input" class="searchBar" list="my-list" onchange="javascript:handleSelect(this)">	
						<datalist id="my-list">
						    <option value="COMP232"></option>
							<option value="COMP248"></option>
							<option value="ENGR201"></option>
							<option value="ENGR213"></option>
							<option value="COMP249"></option>
							<option value="SOEN228"></option>
							<option value="SOEN287"></option>
							<option value="ENGR233"></option>
							<option value="COMP348"></option>
							<option value="COMP352"></option>
							<option value="ENCS282"></option>
							<option value="ENGR202"></option>
							<option value="COMP346"></option>
							<option value="SOEN331"></option>
							<option value="SOEN341"></option>
							<option value="ENGR371"></option>
							<option value="ELEC275"></option>
							<option value="COMP335"></option>
							<option value="SOEN342"></option>
							<option value="SOEN343"></option>
							<option value="SOEN384"></option>
							<option value="ENGR391"></option>
							<option value="SOEN344"></option>
							<option value="SOEN345"></option>
							<option value="SOEN357"></option>
							<option value="SOEN390"></option>
							<option value="ENGR301"></option>
							<option value="SOEN321"></option>
							<option value="SOEN490"></option>
							<option value="ENGR392"></option>
							<option value="SOEN385"></option>
							<option value="COMP354"></option>
							<option value="ENCS393"></option>
							<option value="COMP228"></option>
							<option value="COMP233"></option>
							<option value="BIOL206"></option>
							<option value="ENGR242"></option>
							<option value="ENGR243"></option>
							<option value="ENGR251"></option>
							<option value="PHYS284"></option>
							<option value="ECON201"></option>
							<option value="ECON203"></option>
							<option value="COMP445"></option>
							<option value="COMP345"></option>
							<option value="COMP353"></option>
						  </datalist>
						</div>
					</form>
					<ul class="nav navbar-nav navbar-right navbar-menu-items wow fadeIn">
						<li><a href="../index.html">Home</a></li>
					</ul>
				</div>
			</div>
		</nav>
        <!-- Features -->
        <div class="features-container section-container">
	        <div class="container">
	        	
	            <div class="row">
	                <div class="col-sm-12 features section-description wow fadeIn"><br/>
	                    <h2>
						<?php //Get Info
							$info = $endpoint->getFullCourseName();
							echo $info;
						?>
						</h2>
	                    <div class="divider-1 wow fadeInUp"><span></span></div>
	                </div>
	            </div>
	            
	            <div class="row">
	                <div class="col-sm-12 features-box wow fadeInLeft">
						<h2>Course summary</h2>
						<?php //Get Info
							$ID = $endpoint->getID();
							$info = $endpoint->getDescription($ID);
							$info = json_decode($info,true);
							echo "<p>".$info[0]["description"]."<p>";
						?>
	                </div>
	            </div>
				
				<!--TEACHERS-->
                <div class="row">
                        <div class="col-sm-12 features-box wow fadeInLeft">
							<h2>Rate my Teacher</h2>
							<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
							<a href="http://www.ratemyprofessors.com/ShowRatings.jsp?tid=459550" target=__blank>Juergen Rilling</a> <!--Name of Teacher-->
							<span class="fa fa-star checked"></span> <!--fa-star means full star-->
							<span class="fa fa-star-o checked"></span> <!--fa-star-half means half star-->
							<span class="fa fa-star-o checked"></span> <!--fa-star-o means empty star-->
							<span class="fa fa-star-o checked"></span>
                            <span class="fa fa-star-o checked"></span><br/><br/>
                            <a href="http://www.ratemyprofessors.com/ShowRatings.jsp?tid=459550" target=__blank>Gregory Butler</a> <!--Name of Teacher-->
							<span class="fa fa-star checked"></span> <!--fa-star means full star-->
							<span class="fa fa-star-half checked"></span> <!--fa-star-half means half star-->
							<span class="fa fa-star-o checked"></span> <!--fa-star-o means empty star-->
							<span class="fa fa-star-o checked"></span>
                            <span class="fa fa-star-o checked"></span><br/><br/>
						</div>
				</div>

				<!--RESOURCES-->
				<div class="row">
                        <div class="col-sm-12 features-box wow fadeInLeft">
							<h2>Resources</h2> <!--Change href link to exam & date inside the p tag-->
                            <a href="http://citeseerx.ist.psu.edu/viewdoc/download?doi=10.1.1.460.79&rep=rep1&type=pdf" 
								target="__blank">
								<p>Final Review</p>
                            </a>
						</div>
				</div>
	        </div>
        </div>

        <!-- Javascript -->
        <script src="../assets/js/jquery-1.11.1.min.js"></script>
        <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="../assets/js/jquery.backstretch.min.js"></script>
        <script src="../assets/js/wow.min.js"></script>
        <script src="../assets/js/waypoints.min.js"></script>
        <script src="../assets/js/scripts.js"></script>
        <script>
			function handleSelect(elm)
			{
				window.location = elm.value+".php";
			}
		</script>
        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->

    </body>

</html>