<?php
$adminslist=array(
		'76561198126259709', //radw
		'76561198065442521', //andrew
		'76561198124682398', //$wag
	);

function isadmin($steamid)
{
	global $adminslist;
	if(in_array($steamid, $adminslist))
	{
		return true;
	}
	else
	{
		return false;
	}
}