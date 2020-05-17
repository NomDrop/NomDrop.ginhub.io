<?php 
@include_once "langdoc.php";
if(!isset($_COOKIE['lang'])) {
	setcookie("lang","en",2147485547);
	$lang = "en";
} else $lang = $_COOKIE["lang"];
$sitename = "CSGOEVO";
$title = "$sitename About";
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
							<p style="padding-top: 10px;"><i class="icon-check ic_padd3"></i> First player receive <span style="color: #38C4A9;">+10%</span> chance to win.</p>
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
					<h2>About site</h2>
					<div class="lists">
						<div class="box">
							<h4>Welcome to CSGOEVO.</h4>
							<h6>What is CSGOEVO?</h6>
							<p>It is a complex mini-games, where anyone can earn things CS:GO. <br> What games are currently available? <br> Currently working Jackpot lottery. <br> How does Jackpot lottery?</p>
							<h5>Features:</h5>
							<ul>
								<li>
									<p><span class="user">1.</span>First came into the game player, the chance of victory increases by 10%.</p>
									<p><span class="user">2.</span>If you add to nick on steam "CSGOEVO", the Commission is reduced by 2 times.</p>
									<!--p><span class="user">3.</span>За победу каждого приглашенного (см. раздел "реферальная ссылка") игрока вам начисляется 0,05% от стоимости полученных им предметов. Если приглашенный вами игрок выиграл 100$, то вы получите 5 центов (0,05$).</p-->
								</li>
							</ul>
							<h5>It's very simple:</h5>
							<p>You make to Deposit their belongings.(maximum 10 things per game). Further, you earn a chance to win. The more expensive your clothes are, the higher chance of winning. Your chance of winning depends on the % included in the totals in one game. The chance varies depending on the amount that changes with new investment players. Once in one game, we collect 50 items we pick a random winner.</p>
							<h5>Working principle:</h5>
							<p>The more expensive and skins You bet, the more chance to hit the jackpot! But even investing only 1$, You have the opportunity to win the entire jackpot!</p>
							<h5>Worth knowing:</h5>
							<p>Maximum attachment - 10 items per game. We do not limit the maximum bet amount. The minimum amount will vary depending on the load on the site. For site development, advertising and competitions held by the Commission in the amount of 10% of the total amount of each game. All attachments and conclusions are made very quickly in an automated mode. If you play on the site, you accept the rules of conduct on the website. Before the game, make sure your inventory is open. The game lasts for 2 minutes or until 50 items. After that, randomly, the winner will be selected and our bot will send him the prize, hold the Commission. For the lottery, KS:th will be read only things KS:th. Pictures are taken in real time trading platform with steam. Forbidden to put gift items and gift sets for cs:go, such trades are cancelled. You have the guarantee of obtaining your belongings within half an hour after closing the pool. After this time we are not responsible for lost items. If you cancel the exchange or sent a counter-proposal after the victory, your belongings returned to you will not, because the bot is not designed to re-post things If you put in 30 seconds before the end of the match, then there is a possibility that your skins will go on to the next game . We do not accept responsibility for this, steam does not always process the exchanges on time.</p>
						</div>
						<div class="box">
							<h5>F.A.Q:</h5>
							<ul class="chat2">
								<li>
									<p><span class="user">Q:</span>Not all things came after my victory.</p>
									<p><span>A:</span>The site takes a commission of 10%.</p>
								</li>
								<li>
									<p><span class="user">Q:</span>My thing to count on, what to do?</p>
									<p><span>A:</span>All put things count. If your thing is really not visible, or not evaluated, not to worry. Write to tech support on the website, we will refund you your item!</p>
								</li>
								<li>
									<p><span class="user">Q:</span>I have set, but things got in another game.</p>
									<p><span>A:</span>This happens often when the bot comes to a lot of trades, we try to process them as quickly as possible, but sometimes do not have time to do it before the end of the game. Nothing to worry, Your stuff will get in the next game after a couple of seconds!</p>
								</li>
								<li>
									<p><span class="user">Q:</span>You don't hack?</p>
									<p><span>A:</span>We do not get information from your account. Authorization passes through the Steam server.</p>
								</li>
							</ul>
						</div>
						<div class="btn_holder">
							<a class="btn" href="/">Make a Deposit and you win the jackpot!</a>
						</div>
					</div>
				</div>
</body>
</html>