<?php
$dalTableticket = array();
$dalTableticket["ID"] = array("type"=>3,"varname"=>"ID");
$dalTableticket["location"] = array("type"=>200,"varname"=>"location");
$dalTableticket["VRM"] = array("type"=>200,"varname"=>"VRM");
$dalTableticket["make"] = array("type"=>200,"varname"=>"make");
$dalTableticket["colour"] = array("type"=>200,"varname"=>"colour");
$dalTableticket["notes"] = array("type"=>200,"varname"=>"notes");
$dalTableticket["date"] = array("type"=>135,"varname"=>"date");
	$dalTableticket["ID"]["key"]=true;
$dal_info["ticket"]=&$dalTableticket;

?>