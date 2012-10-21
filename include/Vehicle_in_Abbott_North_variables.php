<?php
$strTableName="Vehicle in Abbott North";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="ticket";

$gstrOrderBy="ORDER BY isha_streets.contract";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

// alias for 'SQLQuery' object
$gSettings = new ProjectSettings("Vehicle in Abbott North");
$gQuery = $gSettings->getSQLQuery();
$eventObj = &$tableEvents["Vehicle in Abbott North"];

$reportCaseSensitiveGroupFields = false;

$gstrSQL = $gQuery->gSQLWhere("");

?>