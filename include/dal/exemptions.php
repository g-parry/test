<?php
$dalTableexemptions = array();
$dalTableexemptions["ID"] = array("type"=>3,"varname"=>"ID");
$dalTableexemptions["Location"] = array("type"=>200,"varname"=>"Location");
$dalTableexemptions["VRM"] = array("type"=>200,"varname"=>"VRM");
$dalTableexemptions["Start Date"] = array("type"=>7,"varname"=>"Start_Date");
$dalTableexemptions["EndDate"] = array("type"=>7,"varname"=>"EndDate");
$dalTableexemptions["Reason"] = array("type"=>200,"varname"=>"Reason");
$dalTableexemptions["make"] = array("type"=>200,"varname"=>"make");
$dalTableexemptions["colour"] = array("type"=>200,"varname"=>"colour");
$dalTableexemptions["contract"] = array("type"=>200,"varname"=>"contract");
	$dalTableexemptions["ID"]["key"]=true;
$dal_info["exemptions"]=&$dalTableexemptions;

?>