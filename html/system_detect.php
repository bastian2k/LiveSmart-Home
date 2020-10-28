<?php

/*
	System Detect
*/

// Include Base
include_once "common/base.php";
// Set Step
$step = 4;

// Disable Back Button
if(!isset($_SESSION["last_step"])) header("location: index.php");
if($_SESSION["last_step"] != $step && $_SESSION["last_step"] != $step - 1)
	header("location: " . (isset($_SESSION["back_url"]) ? $_SESSION["back_url"] : "index.php"));
$_SESSION["back_url" ] = $_SERVER["REQUEST_URI"];
$_SESSION["last_step"] = $step;

// Get Installation Country
$installationCountry = isset($_SESSION["installation_country"]) ? $_SESSION["installation_country"] : "de";

?>





<!DOCTYPE html>

<html>

	<head>

		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<meta name="author" content="Ivan Gavrilov">
		<link rel="icon" href="img/favicon.png">

		<title>batterX liveX</title>

		<link rel="stylesheet" href="css/dist/bundle.css?v=<?php echo $versionHash ?>">
		<link rel="stylesheet" href="css/common.css?v=<?php echo $versionHash ?>">
		<link rel="stylesheet" href="css/system_detect.css?v=<?php echo $versionHash ?>">

	</head>

	<body>





		<!-- Progress Bar -->
		<div id="progress" class="shadow-lg">
			<div><div class="progress"><div class="progress-bar progress-bar-striped bg-success progress-bar-animated"></div></div></div>
			<div><button id="btn_next" class="btn btn-success ripple" disabled><?php echo $lang["btn"]["continue"]; ?></button></div>
		</div>
		<!-- Progress Bar -->





		<main>



			<div id="inverterUnknown" class="container elevate-1">
				<h1><?php echo $lang["system_detect"]["inverter_unknown"] ?></h1>
				<div>
					<div class="notif loading"></div>
					<span class="message"><?php echo $lang["system_detect"]["please_connect_inverter"]; ?></span>
				</div>
			</div>
		


			<div id="inverterDetected" class="container d-none">

				<div class="card elevate-1">
					<div class="card-body">
						<h1>batter<span class="x">X</span> <span class="model"></span></h1>
						<img src="">
						<span class="serialnumber">S/N: <b></b></span>
					</div>
				</div>

				<div class="card elevate-1 mt-3 py-2">
					<div class="card-body py-4">
						<div class="standard-cont">
							<div class="vde-status notif loading"></div>
							<span class="standard">VDE4105</span>
						</div>
						<div>
							<div id="machineModelBox" class="mt-4 mb-2 d-none">
								<select id="machineModelSelect" class="custom-select custom-select-outline border-danger">
									<option value="050">VDE</option>
									<option value="051">AS4777</option>
									<option value="052">DK</option>
									<option value="053">RD1663</option>
									<option value="054">G83</option>
									<option value="055">Taiwan</option>
									<option value="056">USH</option>
									<option value="057">USL</option>
									<option value="058" selected>VDE4105</option>
									<option value="059">Korea</option>
									<option value="060">HongSun</option>
									<option value="061">Sweden</option>
									<option value="062">NRS097</option>
									<option value="063">Indian</option>
									<option value="064">EN50438</option>
									<option value="065">EN50438 (Czech)</option>
									<option value="066">EN50438 (DanMark)</option>
									<option value="067">EN50438 (Finland)</option>
									<option value="068">EN50438 (Ireland)</option>
									<option value="069">EN50438 (Norway)</option>
								</select>
								<button id="machineModelBtn" class="btn btn-danger ripple"><?php echo $lang["btn"]["apply"] ?></button>
							</div>
						</div>
						<div>
							<div class="vde-loading loading mt-4 mb-2"></div>
						</div>
					</div>
				</div>

			</div>



		</main>





		<script src="js/dist/bundle.js?v=<?php echo $versionHash ?>"></script>
		<script src="js/dist/moment.js?v=<?php echo $versionHash ?>"></script>
		<script src="js/common.js?v=<?php echo $versionHash ?>"></script>
		<script>const lang = <?php echo json_encode($lang) ?>;</script>
		<script>const installationCountry = <?php echo json_encode($installationCountry) ?>;</script>
		<script src="js/system_detect.js?v=<?php echo $versionHash ?>"></script>





	</body>

</html>
