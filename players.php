<?php
@include_once('set.php');
@include_once('steamauth/steamauth.php');
@include_once "langdoc.php";
$lang = $_COOKIE["lang"];

$gamenum = fetchinfo("value","info","name","current_game");
if(!isset($_SESSION["steamid"])) $admin = 0;
else $admin = fetchinfo("admin","users","steamid",$_SESSION["steamid"]);
$ls=0;
$rs = mysql_query("SELECT * FROM `game".$gamenum."` GROUP BY `userid` ORDER BY `id` DESC");
//$rs = mysql_query("SELECT * FROM `game39` GROUP BY `userid` ORDER BY `id` DESC");
//$rs23 = mysql_query("SELECT * FROM `currentplayers` GROUP BY `value` ORDER BY `value` DESC");
echo mysql_error();

?>
<?php if(mysql_num_rows($rs) == 0): 
mysql_query("DELETE FROM `currentplayers`");
?>


<?php else: ?> 

	<?php
	//var_dump($xda['uid']);
	while($row=mysql_fetch_array($rs)):
		$avatar = $row["avatar"];
		$uid = $row['userid'];
		$rowcurrent = mysql_query("SELECT * FROM `currentplayers` WHERE `uid` = '$uid'");
		$xda = mysql_fetch_array($rowcurrent);

		$username = fetchinfo("name", "users", "steamid", $uid);
		$steamprofile2x = fetchinfo("steamprofile", "users", "steamid", $uid);
		$steamid = fetchinfo("steamid", "users", "steamid", $uid);
		$rs2 = mysql_query("SELECT SUM(value) AS value FROM `game".$gamenum."` WHERE `userid`='$uid'");
		//$rs2 = mysql_query("SELECT SUM(value) AS value FROM `game39` WHERE `userid`='$uid'");
		$row2 = mysql_fetch_assoc($rs2);
		//var_dump($xda['uid']);
		//var_dump($xda['uid']);
		$value =$row2['value'];	
		$value2 =$row2["value"];
		$value2 = str_replace(".","",$value2);
		mysql_query("INSERT INTO currentplayers (id, uid, value, username, steamprofile2x, steamid, avatar, byvalue) VALUES ('', '$uid', '$value', '$username', '$steamprofile2x', '$steamid', '$avatar', '$value2') " );
		//var_dump($xda['uid']);
		switch ($xda) {
			case (is_null($xda['value'])):
			mysql_query("INSERT INTO currentplayers (id, uid, value, username, steamprofile2x, steamid, avatar, byvalue) VALUES ('', '$uid', '$value', '$username', '$steamprofile2x', '$steamid', '$avatar', '$value2') " );
				break;
			case ($xda['uid'] == $row['userid']):
				mysql_query("UPDATE `currentplayers` SET `value`='".$value."', `username`='".$username."', `steamprofile2x`='".$steamprofile2x."', `byvalue`='".$value2."' , `steamid`='".$steamid."', `avatar`='".$avatar."' WHERE `uid`='".$row['userid']."' ");
				break;
			case(mysql_num_rows(mysql_query('SELECT * FROM `currentplayers` WHERE `uid`="'.$uid.'" AND `value`="'.$value.'"'))==0):
			mysql_query("INSERT INTO currentplayers (id, uid, value, username, steamprofile2x, steamid, avatar, byvalue) VALUES ('', '$uid', '$value', '$username', '$steamprofile2x', '$steamid', '$avatar', '$value2') " );
			break;

			case($xda['value'] != $value):
			mysql_query("UPDATE `currentplayers` SET `value`='$value', `username`='$username',`byvalue`='$value2', `steamprofile2x`='$steamprofile2x', `steamid`='$steamid', `avatar`='$avatar', `value`='$value' WHERE `value`='$value ");
			break;
			default:
				mysql_query("INSERT INTO currentplayers (id, uid, value, username, steamprofile2x, steamid, avatar, byvalue) VALUES ('', '$uid', '$value', '$username', '$steamprofile2x', '$steamid', '$avatar', '$value2') " );
				break;

			 }
 ?>
<?php endwhile; 


 endif; 

 $rs23 = mysql_query("SELECT * FROM currentplayers ORDER BY value DESC ");
if(mysql_num_rows($rs) == 0): 
	else:

		while($rsx=mysql_fetch_array($rs23)):?>
		<div style="padding:10px;">
		<div style="float:left;">
		<img src="<?php echo $rsx['avatar']; ?>" style="max-width:90px;padding:10px;"/>
		</div>
		<div style="padding:10px;">
			<h4 style="margin-top:0;margin-bottom:0px"><a href="<?php echo $steamprofile2x;?>"><?php echo $rsx['username']; ?></a></h4><br/>
			<?php $val = $rsx['value']; ?>
			<span class="si">Skins: $<?php echo round($val, 2); ?></span>
			</span>
		</div>
		</div><br/>
 <?php endwhile; ?>
<?php endif; ?>

