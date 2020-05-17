<?php 
@include_once "langdoc.php";
if(!isset($_COOKIE['lang'])) {
	setcookie("lang","en",2147485547);
	$lang = "en";
} else $lang = $_COOKIE["lang"];
$sitename = "CSGOEVO";
$title = "$sitename Rules";
@include_once('set.php');
@include_once('steamauth/steamauth.php');
@include_once('steamauth/userInfo.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo $title ?></title>
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="simple-line-icons.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script type="text/javascript" src="js/noty/packaged/jquery.noty.packaged.min.js"></script>
	<script src="https://cdn.rawgit.com/kimmobrunfeldt/progressbar.js/0.5.6/dist/progressbar.js"></script>
	<script src="js/main.js"></script>
</head>
<body>
	<div id="wrapper">
		<header id="header">
			<strong class="logo"><i class="dice"></i><a href="/">CSGO<span style="color: #38C4A9;">EVO</span></a></strong>
				<div class="heder-nav1">
	
			
			<div style="float: right;height: 70px;">
				<?php
				if(!isset($_SESSION["steamid"])) {
					steamlogin();
					echo "<div class=\"div-login-set1\"><a class=\"login-set1\" href=\"#\"><i class=\"icon-social-facebook\" style=\"line-height:35px;\"></i></a><a class=\"login-set2\" href=\"#\"><i class=\"icon-social-twitter\" style=\"line-height:35px;\"></i></a>
					<a class=\"login-set2\" href=\"#\"><i class=\"icon-social-tumblr\" style=\"line-height:35px;\"></i></a><a class=\"btn1\" href=\"?login\" ><i class=\"icon-login\" style=\"line-height:35px;\"></i></a></div>";
					}
					else {
					echo '<div class="barboss22"><div class="barbossov"><img src="'.$steamprofile['avatar'].'" class="ava_top"></div><div class="barboss">'.$steamprofile['personaname'].'</div></div>';
					echo "<div class=\"div-login-set\"><a class=\"login-set\" href=\"./settings.php\"><i class=\"icon-settings\" style=\"line-height:35px;\"></i></a><a class=\"btn\" href=\"steamauth/logout.php\" ><i class=\"icon-logout\" style=\"line-height:35px;\"></i></a></div>";
					mysql_query("UPDATE users SET name='".$steamprofile['personaname']."', avatar='".$steamprofile['avatarfull']."' WHERE steamid='".$_SESSION["steamid"]."'");
					}
				?>
    		</div>
	
				
			</div>
	    </header>
			<div id="main">
				<div class="sidebar">
					<nav id="nav">
					<div class="barbbbb"><i class="icon-grid ic_padd" style="line-height: 44px;"></i>Navigation</div>
						<ul>
							<li><a href="/"><i class="icon-game-controller ic_padd"></i>Play</a></li>
							<li><a href="/history.php"><i class="icon-clock ic_padd"></i><?php echo $msg[$lang]["history"]; ?></a></li>
							<li><a href="/top.php"><i class="icon-trophy ic_padd"></i><?php echo $msg[$lang]["top"]; ?></a></li>
							<li><a href="/about.php"><i class="icon-question ic_padd"></i><?php echo $msg[$lang]["about"]; ?></a></li>
							<li><a href="/rls.php"><i class="icon-note ic_padd"></i><?php echo $msg[$lang]["rules"]; ?></a></li>
						</ul>
					</nav>
	
					
					<div class="bonus-block">
						<div class="box">
							<p style="padding-top: 10px;"><i class="icon-check ic_padd3"></i>  First player receive <span style="color: #38C4A9;">+10%</span> chance to win.</p>
							<div class="text-box">
								<p><i class="icon-check ic_padd2"></i> Add <span style="color: #38C4A9;">CSGOEVO</span> to your nick and get -5% to rake.</p>
							</div>
						</div>
					</div>
					<div class="last-winner">
						<div class="barbbbb" style="text-align: center;"><i class="icon-badge ic_padd" style="line-height: 44px;padding: 0 10px 0 0;"></i>Latest winners</div>
						<?php 
							$lastgame = fetchinfo("value","info","name","current_game");
							$lastwinner = fetchinfo("userid","games","id",$lastgame-1);
							$winnercost = fetchinfo("cost","games","id",$lastgame-1);
							$winnerpercent = round(fetchinfo("percent","games","id",$lastgame-1),1);
							$winneravatar = fetchinfo("avatar","users","steamid",$lastwinner);
							$winnername = fetchinfo("name","users","steamid",$lastwinner);
						?>
						<div class="visual">
							<img src="<?php echo $winneravatar ?>" alt="image description" width="109" height="109">
						</div>
						<h3 align="center"><?php echo $winnername ?></h3>
						<ul>
							<li>
								<span class="val"><?php echo $msg[$lang]["win"]; ?>:</span>
								<span class="price">$<?php echo round($winnercost,2); ?></span>
							</li>
							<li>
								<span class="val"><?php echo $msg[$lang]["chanceee"]; ?>:</span>
								<span class="price"><?php echo $winnerpercent ?>%</span>
							</li>
						</ul>
					</div>
					

				</div>	
				<div class="content">
					<h2>Rules</h2>
					<div class="lists">
						<div class="box">
							<h3><span>1.</span>GENERAL PROVISIONS</h3>
							<ul>
								<li>
									<p><span>1.1.</span>By registering in the project CSGOEVO, you agree to these terms in full. Prohibited the registration and use of the service to persons who do not agree with these Rules.</p>
								</li>
								<li>
									<p><span>1.2.</span>The project administration is not responsible for any damage caused to you resulting from the use of this service.</p>
								</li>
								<li>
									<p><span>1.3.</span>Any cheating of the system, hacking attempts, the use of false data during registration will be severely punished by the Administration CSGOEVO, until the removal of all accounts involved in the above actions.</p>
								</li>
								<li>
									<p><span>1.4.</span>Any referral to the Administration CSGOEVO, having obscene content or carrying offensive nature will be ignored. In case of repetition of the incident – BAN and account deletion</p>
								</li>
								<li>
									<p><span>1.5.</span>The administration has the right to amend these rules by notifying users in the News.</p>
								</li>
								<li>
									<p><span>1.6.</span>Since it is impossible to describe all the specific rules of the field work in the project, any recommendations or requirements of the Administration of the project, should be seen as a complement to existing regulations.</p>
								</li>
							</ul>
						</div>
						<div class="box">
							<h3><span>2.</span>RESPONSIBILITIES OF USERS</h3>
							<ul>
								<li>
									<p><span>2.1.</span>To provide correct information and to have an open inventory</p>
								</li>
								<li>
									<p><span>2.2.</span>Prohibited from using excessive profanity in correspondence with other users, as well as blackmail, extortion of money or bonuses. In case of receipt of complaints from victims, the offending account will be banned and removed, or deprived of the right of correspondence.</p>
								</li>
								<li>
									<p><span>2.3.</span>When detecting faults or errors in the script and website users should first verify that the Administration does not know what is wrong. Check the "news" section. If news with a description of the problem, to report errors to the technical support service.</p>
								</li>
								<li>
									<p><span>2.4.</span>Attempt to hack the website and not to use the possible errors in scripts. Violators will be immediately banned.</p>
								</li>
								<li>
									<p><span>2.5.</span>It is strictly prohibited to place links containing viruses and phishing sites/links.</p>
								</li>
							</ul>
						</div>
						<div class="box">
							<h3><span>3.</span>THE BASIS FOR THE REMOVAL AND INCLUSION IN THE BLACKLIST (BAN)</h3>
							<ul>
								<li>
									<p><span>3.1.</span>All users are required to fully and unquestioningly follow the Rules CSGOEVO. Disagreement or permanent contestation of the Rules will result in a BAN.</p>
								</li>
								<li>
									<p><span>3.2.</span>The system fraud, hacking attempts, penetration into other people's accounts.</p>
								</li>
								<li>
									<p><span>3.3.</span>Blackmail users, attempts and fraud.</p>
								</li>
								<li>
									<p><span>3.4.</span>Appeals to the Administration, having obscene content or carrying offensive.</p>
								</li>
								<li>
									<p><span>3.5.</span>Aiding, abetting, in violation of the above provisions.</p>
								</li>
							</ul>
						</div>
					</div>
				</div>
</body>
</html>