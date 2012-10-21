<?php
$strTableName="Burdett Exemptions";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="exemptions";

$gstrOrderBy="ORDER BY exemptions.VRM";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

// alias for 'SQLQuery' object
$gSettings = new ProjectSettings("Burdett Exemptions");
$gQuery = $gSettings->getSQLQuery();
$eventObj = &$tableEvents["Burdett Exemptions"];

$reportCaseSensitiveGroupFields = false;

$gstrSQL = $gQuery->gSQLWhere("");

?>