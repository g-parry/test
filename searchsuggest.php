<?php
@ini_set("display_errors","1");
@ini_set("display_startup_errors","1");

include("include/dbcommon.php");
add_nocache_headers();

include('classes/searchclause.php');

$table = postvalue("table");
$strTableName = GetTableByShort($table);

if (!checkTableName($table))
	exit(0);

include("include/".$table."_variables.php");

if(!isLogged())
	return;
if(!CheckSecurity(@$_SESSION["_".$strTableName."_OwnerID"],"Search"))
	return;

// if nothing to search 
if (postvalue('searchFor') == ''){
	echo "<textarea>".htmlspecialchars(my_json_encode(array('success' => true, 'result' => '')))."</textarea>"; 
	return;
}
$sessionPrefix = $strTableName;

$cipherer = new RunnerCipherer($strTableName);

// array of fields which were added in wizard for search
$allSearchFields = $gSettings->getAllSearchFields();



// SearchClause class stuff
if (isset($_SESSION[$sessionPrefix.'_advsearch']))
	$searchClauseObj = unserialize($_SESSION[$sessionPrefix.'_advsearch']);
else{
	$params = array();
	$params['tName'] = $strTableName;
	$params['cipherer'] = $cipherer;
	$params['searchFieldsArr'] = $allSearchFields;
	$params['sessionPrefix'] = $sessionPrefix;
	$params['panelSearchFields'] = $gSettings->getPanelSearchFields();
	$params['googleLikeFields'] = $gSettings->getGoogleLikeFields();
	$searchClauseObj = new SearchClause($params);
}
// array of vals
$response = array();

if(postvalue("start"))
	$suggestAllContent=false;

$searchFor = postvalue('searchFor');
$searchField = GoodFieldName(postvalue('searchField'));
$strSecuritySql = SecuritySQL("Search", $strTableName);
$detailKeys = array();
$masterWhere = "";

if ($searchField == ""){
	$allSearchFields = $gSettings->getGoogleLikeFields();
}	
if(@$_SESSION[$sessionPrefix."_mastertable"] != "")
{
	$masterTablesInfoArr = $gSettings->getMasterTablesArr($strTableName);
	$masterKeys = array();
	for($i = 0; $i < count($masterTablesInfoArr); $i ++) 
	{
		if($_SESSION[$sessionPrefix."_mastertable"] == $masterTablesInfoArr[$i]['mDataSourceTable']) 
		{
			if($masterTablesInfoArr[$i]['dispInfo']) 
			{
				$detailKeys = $masterTablesInfoArr[$i]['detailKeys'];
				for($j = 0; $j < count($detailKeys); $j ++){
					$masterWhere .= " and ".StrWhereAdv($detailKeys[$j], @$_SESSION[$sessionPrefix."_masterkey".($j + 1)]
						, 'Equals', "", "", true);
				}
			}
			break;
		}
	}
}

// proccess fields and create sql
foreach($allSearchFields as $f)
{
	$fType =  $gSettings->getFieldType($f);
	// filter fields by type
	if (!IsCharType($fType) && !IsNumberType($fType) && !IsGuid($fType) || IsTextType($fType) || in_array($f, $detailKeys))
	{
		continue;
	}
	// get suggest for field
	if(($searchField == '' || $searchField == GoodFieldName($f)) && $gSettings->checkFieldPermissions($f))
	{
		$where = "";
		$having = "";
		if (!$gQuery->IsAggrFuncField($gSettings->getFieldIndex($f)-1))
		{
			$where = $searchClauseObj->getSuggestWhere($f, $fType, $suggestAllContent, $searchFor);
		}
		elseif ($gQuery->IsAggrFuncField($gSettings->getFieldIndex($f)-1))
		{
			$having = $searchClauseObj->getSuggestWhere($f, $fType, $suggestAllContent, $searchFor);
		}
		// prepare common vals
		$where = whereAdd($where.$masterWhere, $strSecuritySql);
		$sqlHead = "SELECT DISTINCT ".GetFullFieldName($f)." ";
		if($gQuery->HasGroupBy())
		{
			$strSQL = $gQuery->gSQLWhere_having_fromQuery("", $where, $having);
			$strSQL = "SELECT DISTINCT st.".AddFieldWrappers($f)." from (".$strSQL.") st";
		}else{
			$strSQL = SQLQuery::gSQLWhere_having($sqlHead, $gQuery->FromToSql(), $gQuery->WhereToSql(), $gQuery->GroupByToSql()
				, $gQuery->Having()->toSql($gQuery), $where, $having);
		}
		
			$strSQL .= " ORDER BY 1 LIMIT 10 ";
		$rs=db_query($strSQL,$conn);
		$i=0;
		
		while ($row = db_fetch_numarray($rs)) 
		{
			$i++;
			$val = $cipherer->DecryptField($f, $row[0]);
			if(IsGuid($fType))
				$val=substr($val,1,-1);
			$pos = strpos($val,"\n");
			if ($pos!==FALSE) {
				$response[] = substr($val,0,$pos);
			} else {
				$response[] = $val;
			}
			if ($i>10)
				break;
		}
	}
}

db_close($conn);
$response = array_unique($response); 
sort($response);
// all queries worked without errors, add success marker
$returnJSON['success'] = true;
$result = array();
for( $i=0;$i<10 && $i<count($response);$i++) 
{
	$value=$response[$i];
	if($suggestAllContent)
	{
		$str = substr($value,0,50);
		$pos = my_stripos($str,$searchFor,0);
		if($pos===false)
			$result[] = $str;
		else
			$result[] = (substr($str,0,$pos))."<b>".(substr($str,$pos,strlen($searchFor)))."</b>".(substr($str,$pos+strlen($searchFor)));
	}
	else
		$result[] =  "<b>".(substr($value,0,strlen($searchFor)))."</b>".(substr($value,strlen($searchFor),50-strlen($searchFor)))."\n";
}
$returnJSON['result'] = $result;

echo "<textarea>".htmlspecialchars(my_json_encode($returnJSON))."</textarea>";
?>