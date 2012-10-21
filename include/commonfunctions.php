<?php 
/**
 * That function  copies all elements from associative array to object, as object properties with same names
 * Usefull when you need to copy many properties
 *
 * @param link $obj
 * @param link $argsArr
 */
function RunnerApply (&$obj, &$argsArr)
{	
	foreach ($argsArr as $key=>$var)
		setObjectProperty($obj,$key,$argsArr[$key]);
}


function GetImageFromDB($gQuery, $forPDF = false, $params = array())
{
	global $conn;
	if(!$forPDF)
	{
		$table = postvalue("table");
		$strTableName = GetTableByShort($table);
		$settings = new ProjectSettings($strTableName);
		
		if (!checkTableName($table))
		{
			return '';
		}
		
		//include("include/".$table."_variables.php");
		@ini_set("display_errors","1");
		@ini_set("display_startup_errors","1");
	
			if(!isLogged() || !CheckSecurity(@$_SESSION["_".$strTableName."_OwnerID"],"Search"))
		{ 
			header("Location: login.php"); 
			return;
		}
	
		$field = postvalue("field");
		if(!$settings->checkFieldPermissions($field))
			return DisplayNoImage();
	
		//	construct sql
		$keysArr = $settings->getTableKeys();
		$keys = array();
		foreach ($keysArr as $ind=>$k)
		{
			$keys[$k]=postvalue("key".($ind+1));
		}
	}
	else
	{
		$table = @$params["table"];
	
		$strTableName = GetTableByShort($table);
		
		if (!checkTableName($table))
		{
			exit(0);
		}
		$settings = new ProjectSettings($strTableName);
		$field = @$params["field"];
		//	construct sql
		$keysArr = $settings->getTableKeys();
		$keys = array();
		foreach ($keysArr as $ind=>$k)
		{
			$keys[$k]=@$params["key".($ind+1)];
		}
	}
	if(!$gQuery->HasGroupBy())
	{
		// Do not select any fields except current (image) field.
		// If query has 'group by' clause then other fields are used in it and we may not simply cut 'em off.
		// Just don't do anything in that case.
		$gQuery->RemoveAllFieldsExcept($settings->getFieldIndex($field));
	}
	
	$where=KeyWhere($keys);
	
		$secOpt = $settings->getAdvancedSecurityType();
	if ($secOpt == ADVSECURITY_VIEW_OWN)
	{
		$where=whereAdd($where,SecuritySQL("Search"));
	}
	
	$sql = $gQuery->gSQLWhere($where);
	
	$rs = db_query($sql,$conn);
	
	if($forPDF)
	{
		if($rs && ($data=db_fetch_array($rs)))
			return $data[$field];
	}
	else
	{
		if(!$rs || !($data=db_fetch_array($rs)))
			return DisplayNoImage();
		
		$value=db_stripslashesbinary($data[$field]);
		if(!$value)
		{
			if(postvalue("alt"))
			{
				$value=db_stripslashesbinary($data[postvalue("alt")]);
				if(!$value)
					return DisplayNoImage();
			}
			else
				return DisplayNoImage();
		}
		
		$itype=SupposeImageType($value);
		
		if(!$itype)
		{
			return DisplayFile();
		}
		if(!isset($pdf))
		{
			header("Content-Type: ".$itype);
			header("Cache-Control: private");
			SendContentLength(strlen_bin($value));
		}
		echoBinary($value);
		return '';
	}
}

function getLangFileName($langName)
{
	$langArr = array();
	$langArr["English"] = "English";
	return $langArr[$langName];
}

function GetGlobalData($name, $defValue)
{
	global $globalSettings;
	if(!array_key_exists($name, $globalSettings))
		return $defValue;
	return $globalSettings[$name];
}

function DisplayMap($params) 
{
	global $pageObject;
	
	$pageObject->googleMapCfg['mapsData'][$params['id']]['addressField'] = $params['addressField'] ? $params['addressField'] : "";
	$pageObject->googleMapCfg['mapsData'][$params['id']]['latField'] = $params['latField'] ? $params['latField'] : '';
	$pageObject->googleMapCfg['mapsData'][$params['id']]['lngField'] = $params['lngField'] ? $params['lngField'] : '';
	$pageObject->googleMapCfg['mapsData'][$params['id']]['width'] = $params['width'] ? $params['width'] : 0;
	$pageObject->googleMapCfg['mapsData'][$params['id']]['height'] = $params['height'] ? $params['height'] : 0;
	$pageObject->googleMapCfg['mapsData'][$params['id']]['type'] = 'BIG_MAP';
	$pageObject->googleMapCfg['mapsData'][$params['id']]['showCenterLink'] = $params['showCenterLink'] ? $params['showCenterLink'] : 0;
	$pageObject->googleMapCfg['mapsData'][$params['id']]['descField'] = $params['descField'] ? $params['descField'] : $pageObject->googleMapCfg['mapsData'][$params['id']]['addressField'];
	$pageObject->googleMapCfg['mapsData'][$params['id']]['descField'] = $params['description'] ? $params['description'] : $pageObject->googleMapCfg['mapsData'][$params['id']]['addressField'];
	
	if (isset($params['zoom']))
		$pageObject->googleMapCfg['mapsData'][$params['id']]['zoom'] = $params['zoom'];
	
	//$pageObject->googleMapCfg['bigMapDefZoom'] = $pageObject->googleMapCfg['mapsData'][$params['id']]['zoom'];
	
	if ($pageObject->googleMapCfg['mapsData'][$params['id']]['showCenterLink'])
		$pageObject->googleMapCfg['mapsData'][$params['id']]['centerLinkText'] = $params['centerLinkText'] ? $params['centerLinkText'] : '';
	
	$pageObject->googleMapCfg['mainMapIds'][] = $params['id'];
	
	if (isset($params['APIkey']))
		$pageObject->googleMapCfg['APIcode'] = $params['APIkey'];
}

function DisplayCAPTCHA() 
{
	global $pageObject;
	$pageObject->xt->assign_event($pageObject->captchaId, $pageObject, 'createCaptcha', array());
}

function checkTableName($shortTName, $type=false)
{
	if (!$shortTName)
		return false;
	
	if ("ISHA_Exemptions" == $shortTName && ($type===false || ($type!==false && $type == 1)))
		return true;
	if ("NEW_Exemptions" == $shortTName && ($type===false || ($type!==false && $type == 1)))
		return true;
	if ("Burdett_Exemptions" == $shortTName && ($type===false || ($type!==false && $type == 1)))
		return true;
	if ("Abbott_North" == $shortTName && ($type===false || ($type!==false && $type == 1)))
		return true;
	if ("Bethnal_Green" == $shortTName && ($type===false || ($type!==false && $type == 1)))
		return true;
	if ("Bow_Bridge" == $shortTName && ($type===false || ($type!==false && $type == 1)))
		return true;
	if ("Brownfield" == $shortTName && ($type===false || ($type!==false && $type == 1)))
		return true;
	if ("East_End" == $shortTName && ($type===false || ($type!==false && $type == 1)))
		return true;
	if ("Glamis_Estate" == $shortTName && ($type===false || ($type!==false && $type == 1)))
		return true;
	if ("Island_Homes" == $shortTName && ($type===false || ($type!==false && $type == 1)))
		return true;
	if ("Lansbury" == $shortTName && ($type===false || ($type!==false && $type == 1)))
		return true;
	if ("Lansbury_West" == $shortTName && ($type===false || ($type!==false && $type == 1)))
		return true;
	if ("Leopold" == $shortTName && ($type===false || ($type!==false && $type == 1)))
		return true;
	if ("OFHA" == $shortTName && ($type===false || ($type!==false && $type == 1)))
		return true;
	if ("Shadwell" == $shortTName && ($type===false || ($type!==false && $type == 1)))
		return true;
	if ("Spitalfields" == $shortTName && ($type===false || ($type!==false && $type == 1)))
		return true;
	if ("admin_rights" == $shortTName && ($type===false || ($type!==false && $type == 1)))
		return true;
	if ("admin_members" == $shortTName && ($type===false || ($type!==false && $type == 1)))
		return true;
	if ("admin_users" == $shortTName && ($type===false || ($type!==false && $type == 1)))
		return true;
	if ("isha_audit" == $shortTName && ($type===false || ($type!==false && $type == 0)))
		return true;
	if ("Wessex_Homes" == $shortTName && ($type===false || ($type!==false && $type == 1)))
		return true;
	if ("Octavia_Housing" == $shortTName && ($type===false || ($type!==false && $type == 1)))
		return true;
	if ("West_London_Mental_Health" == $shortTName && ($type===false || ($type!==false && $type == 1)))
		return true;
	if ("Abbott_South" == $shortTName && ($type===false || ($type!==false && $type == 1)))
		return true;
	if ("isha_streets" == $shortTName && ($type===false || ($type!==false && $type == 0)))
		return true;
	if ("Demo_Contract" == $shortTName && ($type===false || ($type!==false && $type == 1)))
		return true;
	if ("Devons" == $shortTName && ($type===false || ($type!==false && $type == 1)))
		return true;
	if ("Vehicle_in_Abbott_North" == $shortTName && ($type===false || ($type!==false && $type == 1)))
		return true;
	if ("Ticket_Octavia" == $shortTName && ($type===false || ($type!==false && $type == 1)))
		return true;
	if ("Ticket_Demo_Site" == $shortTName && ($type===false || ($type!==false && $type == 1)))
		return true;
	if ("elite" == $shortTName && ($type===false || ($type!==false && $type == 1)))
		return true;
	if ("Request_Visit_WLMH" == $shortTName && ($type===false || ($type!==false && $type == 1)))
		return true;
	return false;
}

//Get password field on register page
function GetPasswordField($table = "")
{
	global $cPasswordField;
	return $cPasswordField;
}
//Get user name field on register page
function GetUserNameField($table = "")
{
	global $cUserNameField;
	return $cUserNameField;
}

//Get user name field on register page
function GetDisplayNameField($table = "")
{
	global $cDisplayNameField;
	return $cDisplayNameField;
}

//Get user name field on register page
function GetEmailField($table = "")
{
	global $cEmailField;
	return $cEmailField;
}

function GetTablesList($pdfMode = false)
{
	$arr = array();
	$strPerm = GetUserPermissions("ISHA Exemptions");
	if(strpos($strPerm, "P")!==false || ($pdfMode && strpos($strPerm, "S")!==false))
	{
		$arr[]="ISHA Exemptions";
	}
	$strPerm = GetUserPermissions("NEW Exemptions");
	if(strpos($strPerm, "P")!==false || ($pdfMode && strpos($strPerm, "S")!==false))
	{
		$arr[]="NEW Exemptions";
	}
	$strPerm = GetUserPermissions("Burdett Exemptions");
	if(strpos($strPerm, "P")!==false || ($pdfMode && strpos($strPerm, "S")!==false))
	{
		$arr[]="Burdett Exemptions";
	}
	$strPerm = GetUserPermissions("Abbott North");
	if(strpos($strPerm, "P")!==false || ($pdfMode && strpos($strPerm, "S")!==false))
	{
		$arr[]="Abbott North";
	}
	$strPerm = GetUserPermissions("Bethnal Green");
	if(strpos($strPerm, "P")!==false || ($pdfMode && strpos($strPerm, "S")!==false))
	{
		$arr[]="Bethnal Green";
	}
	$strPerm = GetUserPermissions("Bow Bridge");
	if(strpos($strPerm, "P")!==false || ($pdfMode && strpos($strPerm, "S")!==false))
	{
		$arr[]="Bow Bridge";
	}
	$strPerm = GetUserPermissions("Brownfield");
	if(strpos($strPerm, "P")!==false || ($pdfMode && strpos($strPerm, "S")!==false))
	{
		$arr[]="Brownfield";
	}
	$strPerm = GetUserPermissions("East End");
	if(strpos($strPerm, "P")!==false || ($pdfMode && strpos($strPerm, "S")!==false))
	{
		$arr[]="East End";
	}
	$strPerm = GetUserPermissions("Glamis Estate");
	if(strpos($strPerm, "P")!==false || ($pdfMode && strpos($strPerm, "S")!==false))
	{
		$arr[]="Glamis Estate";
	}
	$strPerm = GetUserPermissions("Island Homes");
	if(strpos($strPerm, "P")!==false || ($pdfMode && strpos($strPerm, "S")!==false))
	{
		$arr[]="Island Homes";
	}
	$strPerm = GetUserPermissions("Lansbury");
	if(strpos($strPerm, "P")!==false || ($pdfMode && strpos($strPerm, "S")!==false))
	{
		$arr[]="Lansbury";
	}
	$strPerm = GetUserPermissions("Lansbury West");
	if(strpos($strPerm, "P")!==false || ($pdfMode && strpos($strPerm, "S")!==false))
	{
		$arr[]="Lansbury West";
	}
	$strPerm = GetUserPermissions("Leopold");
	if(strpos($strPerm, "P")!==false || ($pdfMode && strpos($strPerm, "S")!==false))
	{
		$arr[]="Leopold";
	}
	$strPerm = GetUserPermissions("OFHA");
	if(strpos($strPerm, "P")!==false || ($pdfMode && strpos($strPerm, "S")!==false))
	{
		$arr[]="OFHA";
	}
	$strPerm = GetUserPermissions("Shadwell");
	if(strpos($strPerm, "P")!==false || ($pdfMode && strpos($strPerm, "S")!==false))
	{
		$arr[]="Shadwell";
	}
	$strPerm = GetUserPermissions("Spitalfields");
	if(strpos($strPerm, "P")!==false || ($pdfMode && strpos($strPerm, "S")!==false))
	{
		$arr[]="Spitalfields";
	}
	$strPerm = GetUserPermissions("admin_rights");
	if(strpos($strPerm, "P")!==false || ($pdfMode && strpos($strPerm, "S")!==false))
	{
		$arr[]="admin_rights";
	}
	$strPerm = GetUserPermissions("admin_members");
	if(strpos($strPerm, "P")!==false || ($pdfMode && strpos($strPerm, "S")!==false))
	{
		$arr[]="admin_members";
	}
	$strPerm = GetUserPermissions("admin_users");
	if(strpos($strPerm, "P")!==false || ($pdfMode && strpos($strPerm, "S")!==false))
	{
		$arr[]="admin_users";
	}
	$strPerm = GetUserPermissions("isha_audit");
	if(strpos($strPerm, "P")!==false || ($pdfMode && strpos($strPerm, "S")!==false))
	{
		$arr[]="isha_audit";
	}
	$strPerm = GetUserPermissions("Wessex Homes");
	if(strpos($strPerm, "P")!==false || ($pdfMode && strpos($strPerm, "S")!==false))
	{
		$arr[]="Wessex Homes";
	}
	$strPerm = GetUserPermissions("Octavia Housing");
	if(strpos($strPerm, "P")!==false || ($pdfMode && strpos($strPerm, "S")!==false))
	{
		$arr[]="Octavia Housing";
	}
	$strPerm = GetUserPermissions("West London Mental Health");
	if(strpos($strPerm, "P")!==false || ($pdfMode && strpos($strPerm, "S")!==false))
	{
		$arr[]="West London Mental Health";
	}
	$strPerm = GetUserPermissions("Abbott South");
	if(strpos($strPerm, "P")!==false || ($pdfMode && strpos($strPerm, "S")!==false))
	{
		$arr[]="Abbott South";
	}
	$strPerm = GetUserPermissions("isha_streets");
	if(strpos($strPerm, "P")!==false || ($pdfMode && strpos($strPerm, "S")!==false))
	{
		$arr[]="isha_streets";
	}
	$strPerm = GetUserPermissions("Demo Contract");
	if(strpos($strPerm, "P")!==false || ($pdfMode && strpos($strPerm, "S")!==false))
	{
		$arr[]="Demo Contract";
	}
	$strPerm = GetUserPermissions("Devons");
	if(strpos($strPerm, "P")!==false || ($pdfMode && strpos($strPerm, "S")!==false))
	{
		$arr[]="Devons";
	}
	$strPerm = GetUserPermissions("Vehicle in Abbott North");
	if(strpos($strPerm, "P")!==false || ($pdfMode && strpos($strPerm, "S")!==false))
	{
		$arr[]="Vehicle in Abbott North";
	}
	$strPerm = GetUserPermissions("Ticket Octavia");
	if(strpos($strPerm, "P")!==false || ($pdfMode && strpos($strPerm, "S")!==false))
	{
		$arr[]="Ticket Octavia";
	}
	$strPerm = GetUserPermissions("Ticket Demo Site");
	if(strpos($strPerm, "P")!==false || ($pdfMode && strpos($strPerm, "S")!==false))
	{
		$arr[]="Ticket Demo Site";
	}
	$strPerm = GetUserPermissions("elite");
	if(strpos($strPerm, "P")!==false || ($pdfMode && strpos($strPerm, "S")!==false))
	{
		$arr[]="elite";
	}
	$strPerm = GetUserPermissions("Request Visit WLMH");
	if(strpos($strPerm, "P")!==false || ($pdfMode && strpos($strPerm, "S")!==false))
	{
		$arr[]="Request Visit WLMH";
	}
	return $arr;
}

//	return the full database field original name
function GetFullFieldName($field, $table = "", $addAs = true)
{
	if($table == ""){
		global $strTableName;
		$table = $strTableName;
	}
	$pSet = new ProjectSettings($table);
	$fname = $pSet->getFullNameField($field);
	if($pSet->hasEncryptedFields() && !isEncryptionByPHPEnabled()){
		$cipherer = new RunnerCipherer($table);
		return $cipherer->GetFieldName($fname, $field)
			.($cipherer->isFieldEncrypted($field) && $addAs ? " as ".AddFieldWrappers($field) : "");
	}
	return $fname;
}

//	return the full database field original name
function GetFullFieldNameForInsert($pSet, $field)
{
	return $pSet->getFullNameField($field);
}

// returns Chart type
function GetChartType($shorttable)
{
	return "";
}

////////////////////////////////////////////////////////////////////////////////
// data output functions
////////////////////////////////////////////////////////////////////////////////

//	format field value for output
function GetData($data, $field, $format, $ptype, $table = "", $pSet = null, $fieldType = -1)
{
	return GetDataInt($data[$field], $data, $field, $format, $ptype, $table, $pSet = null, $fieldType = -1);
}


//	GetData Internal
function GetDataInt($value, $data, $field, $format, $ptype, $table = "", $pSet = null, $fieldType = -1)
{
	global $strTableName;
	if($table == "")
		$table = $strTableName;
		
	if(is_null($pSet))
		$pSet = new ProjectSettings($table, $ptype);
	if($fieldType < 0)
		$fieldType = $pSet->getFieldType($field);
	if($format == FORMAT_CUSTOM && $data)
	{
		return CustomExpression($value, $data, $field, $ptype, "");
	}
	
	$ret = "";
// long binary data?
	if(IsBinaryType($fieldType))
	{
		$ret="LONG BINARY DATA - CANNOT BE DISPLAYED";
	} 
	else
		$ret = $value;
	if($ret===false)
		$ret="";
	
	if($format == FORMAT_DATE_SHORT) 
		$ret = format_shortdate(db2time($value));
	else if($format == FORMAT_DATE_LONG) 
		$ret = format_longdate(db2time($value));
	else if($format == FORMAT_DATE_TIME) 
		$ret = str_format_datetime(db2time($value));
	else if($format == FORMAT_TIME) 
	{
		if(IsDateFieldType($fieldType))
			$ret = str_format_time(db2time($value));
		else
		{
			$numbers=parsenumbers($value);
			if(!count($numbers))
				return "";
			while(count($numbers)<3)
				$numbers[]=0;
			$ret = str_format_time(array(0,0,0,$numbers[0],$numbers[1],$numbers[2]));
		}
	}
	else if($format == FORMAT_NUMBER) 
		$ret = str_format_number($value, $pSet->isDecimalDigits($field));
	else if($format == FORMAT_CURRENCY) 
		$ret = str_format_currency($value);
	else if($format == FORMAT_CHECKBOX) 
	{
		$ret="<img src=\"images/check_";
		if($value && $value!=0)
			$ret.="yes";
		else
			$ret.="no";
		$ret.=".gif\" border=0";
		if(isEnableSection508())
			$ret.= " alt=\" \"";
		$ret.= ">";
	}
	else if($format == FORMAT_PERCENT) 
	{
		if($value!="")
			$ret = ($value*100)."%";
	}
	else if($format == FORMAT_PHONE_NUMBER)
	{
		if(strlen($ret)==7)
			$ret=substr($ret,0,3)."-".substr($ret,3);
		else if(strlen($ret)==10)
			$ret="(".substr($ret,0,3).") ".substr($ret,3,3)."-".substr($ret,6);
	}
	else if($format == FORMAT_FILE_IMAGE)
	{
		if(!CheckImageExtension($ret))
			return "";

		if($pSet->showThumbnail($field))
		{
			$thumbprefix = $pSet->getStrThumbnail($field);
		 	// show thumbnail
			$thumbname=$thumbprefix.$ret;
			if(substr($pSet->getLinkPrefix($field),0,7)!="http://" && !myfile_exists(getabspath($pSet->getLinkPrefix($field).$thumbname)))
				$thumbname=$ret;
			
			$linkPrefix = "<a ";
			if($pSet->isUseiBox($field))
				$linkPrefix .= " rel='ibox'";
			else
				$linkPrefix .= " target=_blank";
						
			$ret = $linkPrefix." href=\"".htmlspecialchars(AddLinkPrefix($pSet, $field, $ret))."\">";
			$ret.="<img";
			if(isEnableSection508())
				$ret.= " alt=\"".htmlspecialchars($data[$field])."\"";
			$ret.=" border=0";
			$ret.=" src=\"".htmlspecialchars(AddLinkPrefix($pSet, $field,$thumbname))."\"></a>";
		}
		else
			if(isEnableSection508())
				$ret='<img alt=\"".htmlspecialchars($data[$field])."\" src="'.AddLinkPrefix($pSet, $field, $ret).'" border=0>';
			else
				$ret='<img src="'.htmlspecialchars(AddLinkPrefix($pSet, $field, $ret)).'" border=0>';
	}
	else if($format == FORMAT_HYPERLINK)
	{
		if($data)
			$ret = GetHyperlink($ret, $field, $data, $ptype, "");
	}
	else if($format==FORMAT_EMAILHYPERLINK)
	{
		$link=$ret;
		$title=$ret;
		if(substr($ret,0,7)=="mailto:")
			$title=substr($ret,8);
		else
			$link="mailto:".$link;
		$ret='<a href="'.$link.'">'.$title.'</a>';
	}
	else if($format==FORMAT_FILE)
	{
		$iquery="table=".GetTableURL($table)."&field=".rawurlencode($field);
		$arrKeys = $pSet->getTableKeys();
		$keylink="";
		for ( $j=0; $j < count($arrKeys); $j++ ) 
		{
			$keylink.="&key" . ($j+1) . "=".rawurlencode($data[$arrKeys[$j]]);
		}
		$iquery.=$keylink;
		return 	'<a href="download.php?'.$iquery.'">'.htmlspecialchars($ret).'</a>';
	}
	else if($pSet->getEditFormat($field)==EDIT_FORMAT_CHECKBOX && $format==FORMAT_NONE)
	{
		if($ret && $ret!=0)
			$ret="Yes";
		else
			$ret="No";
	}
	return $ret;
}

function GetShorteningForLargeText($strValue, $cNumberOfChars)
{
		$useUTF8 = false;

	$ret = "";
	if($useUTF8)
		$ret = utf8_substr($strValue, 0, $cNumberOfChars );
	else
		$ret = substr($strValue, 0, $cNumberOfChars );
	return htmlspecialchars($ret);
}

function ProcessLargeText($pSet, $strValue, $iquery = "",$table = "", $mode = MODE_LIST, $format = "", $isMobileLookup = false)
{
	$cNumberOfChars = $pSet->getNumberOfChars();
	
	if(substr($strValue,0,8) == "<a href="
		|| substr($strValue,0,23) == "<img src=\"images/check_")
		return $strValue;
		
	$needShortening = $format!=EDIT_FORMAT_LOOKUP_WIZARD && $cNumberOfChars > 0 && strlen($strValue) > $cNumberOfChars;
	
	if($needShortening && $mode==MODE_LIST && !$isMobileLookup)
	{
		global $strTableName;
		if(!$table)
			$table = $strTableName;
		
		$ret = GetShorteningForLargeText($strValue, $cNumberOfChars);
		$ret.=' <a href="javascript:void(0);" query="fulltext.php?pagetype='.$pSet->_viewPage.'&table='.GetTableURL($table)
			.'&'.$iquery.'">'."More".' ...</a>';
	}
	else if($needShortening && ($mode == MODE_PRINT || $isMobileLookup))
	{
		$ret = GetShorteningForLargeText($strValue, $cNumberOfChars)." ...";
	}
	else
		$ret = htmlspecialchars($strValue);

/*Left to future developments 
//	highlight search results
	if ($mode==MODE_LIST && $_SESSION[$strTableName."_search"]==1)
	{
		$ind = 0;
		$searchopt=$_SESSION[$strTableName."_searchoption"];
		$searchfor=$_SESSION[$strTableName."_searchfor"];
//		highlight Contains search
		if($searchopt=="Contains")
		{
			while ( ($ind = my_stripos($ret, $searchfor, $ind)) !== false )
			{
				$ret = substr($ret, 0, $ind) . "<span class=highlight>". substr($ret, $ind, strlen($searchfor)) ."</span>" . substr($ret, $ind + strlen($searchfor));
				$ind+= strlen("<span class=highlight>") + strlen($searchfor) + strlen("</span>");
			}
		}
//		highlight Starts with search
		elseif($searchopt=="Starts with ...")
		{
			if( !strncasecmp($ret, $searchfor,strlen($searchfor)) )
				$ret = "<span class=highlight>". substr($ret, 0, strlen($searchfor)) ."</span>" . substr($ret, strlen($searchfor));
		}
		elseif($searchopt=="Equals")
		{
			if( !strcasecmp($ret, $searchfor) )
				$ret = "<span class=highlight>". $ret ."</span>";
		}
		elseif($searchopt=="More than ...")
		{
			if( strtoupper($ret)>strtoupper($searchfor) )
				$ret = "<span class=highlight>". $ret ."</span>";
		}
		elseif($searchopt=="Less than ...")
		{
			if( strtoupper($ret)<strtoupper($searchfor) )
				$ret = "<span class=highlight>". $ret ."</span>";
		}
		elseif($searchopt=="Equal or more than ...")
		{
			if( strtoupper($ret)>=strtoupper($searchfor) )
				$ret = "<span class=highlight>". $ret ."</span>";
		}
		elseif($searchopt=="Equal or less than ...")
		{
			if( strtoupper($ret)<=strtoupper($searchfor) )
				$ret = "<span class=highlight>". $ret ."</span>";
		}
	}
*/
	return nl2br($ret);
}

//	construct hyperlink
function GetHyperlink($str, $field, $data, $ptype, $table = "")
{
	global $strTableName;
	if(!strlen($table))
		$table = $strTableName;
	if(!strlen($str))
		return "";
	$ret = $str;
	$title = $ret;
	$link = $ret;
	if(substr($ret,strlen($ret)-1)=='#')
	{
		$i = strpos($ret,'#');
		$title = substr($ret,0,$i);
		$link = substr($ret,$i+1,strlen($ret)-$i-2);
		if(!$title)
			$title = $link;
	}
	$target = "";
	if(strpos($link,"://")===false && substr($link,0,7)!="mailto:")
		$link=$prefix.$link;
	$ret='<a href="'.$link.'"'.$target.'>'.$title.'</a>';
	return $ret;
}

//	add prefix to the URL
function AddLinkPrefix($pSet, $field, $link,$table="")
{
	if(strpos($link,"://")===false && substr($link,0,7)!="mailto:")
		return $pSet->getLinkPrefix($field).$link;
	return $link;
}

function GetTotalsForTime($value)
{
	$time=parsenumbers($value);
	while(count($time)<3)
		$time[]=0;
	return $time;
}

//	return Totals string
function GetTotals($field, $value, $stype, $iNumberOfRows, $sFormat, $ptype)
{
	global $strTableName;
	$pSet = new ProjectSettings($strTableName, $ptype);
	$days = 0;
	if($stype == "AVERAGE")
	{
		if($iNumberOfRows)
		{	
			if($sFormat == FORMAT_TIME)
			{
				if($value)
				{
					$value = round($value/$iNumberOfRows,0);
					$s = $value % 60;
					$value -= $s;
					$value /= 60;
					$m = $value % 60;
					$value -= $m;
					$value /= 60;
					$h = $value % 24;
					$value -= $h;
					$value /= 24;
					$d = $value;
					
					$value = ($d!=0 ? $d.'d ' : ''). mysprintf("%02d:%02d:%02d",array($h,$m,$s));
				}
			}
			else $value = round($value/$iNumberOfRows,2);
		}
		else
			return "";
	}
	if($stype == "TOTAL")
	{
		if($sFormat == FORMAT_TIME)
		{
			if($value)
			{
				$s = $value % 60;
				$value -= $s;
				$value /= 60;
				$m = $value % 60;
				$value -= $m;
				$value /= 60;
				$h = $value % 24;
				$value -= $h;
				$value /= 24;
				$d = $value;
				$value = ($d!=0 ? $d.'d ' : ''). mysprintf("%02d:%02d:%02d",array($h,$m,$s));
			}
		}
	}
	$sValue = "";
	$data = array($field => $value);
	if($sFormat == FORMAT_CURRENCY)
	 	$sValue = str_format_currency($value);
	else if($sFormat == FORMAT_PERCENT)
		$sValue = str_format_number($value*100)."%"; 
	else if($sFormat == FORMAT_NUMBER)
 		$sValue = str_format_number($value, $pSet->isDecimalDigits($field));
	else if($sFormat == FORMAT_CUSTOM && $stype!="COUNT")
 		$sValue = GetData($data, $field, $sFormat, $ptype);
	else 
 		$sValue = $value;
	
	if($stype == "COUNT") 
		return $value;
	if($stype == "TOTAL") 
		return $sValue;
	if($stype == "AVERAGE") 
		return $sValue;
	return "";
}

//	display Lookup Wizard value in List/View mode
function DisplayLookupWizard($field, $value, $data, $keylink, $mode, $ptype)
{
	global $conn, $strTableName;
	$pSet = new ProjectSettings($strTableName, $ptype);
	if(!strlen($value))
		return "";
		
	$nLookupType = $pSet->getLookupType($field);

	$lookupTable = $pSet->getLookupTable($field);
	$displayFieldName = $pSet->getDisplayField($field);
	$linkFieldName = $pSet->getLinkField($field);
	$linkAndDisplaySame = $displayFieldName == $linkFieldName;
	
	$where = "";
	$out = "";
	$lookupvalue = $value;
	$iquery = "field=".htmlspecialchars(rawurlencode($field)).$keylink; 
	
	if($nLookupType == LT_QUERY){
		$lookupPSet = new ProjectSettings($lookupTable, $ptype);
		$lookupQueryObj = $lookupPSet->getSQLQuery();
		if($pSet->getCustomDisplay($field))
			$lookupQueryObj->AddCustomExpression($displayFieldName, $lookupPSet, $strTableName, $field);
		$lookupQueryObj->ReplaceFieldsWithDummies($lookupPSet->getBinaryFieldsIndices());
		$cipherer = new RunnerCipherer($lookupTable);
		$lookupIndexes = GetLookupFieldsIndexes($pSet, $field);
		$displayFieldIndex = $lookupIndexes["displayFieldIndex"];
	}else{
		$cipherer = new RunnerCipherer($strTableName);
		$LookupSQL= "SELECT ";
		$LookupSQL.= $pSet->getLWDisplayField($field);
		$LookupSQL.= " FROM ".AddTableWrappers($pSet->getLookupTable($field))." WHERE ";
		$displayFieldIndex = 0;
	}
	
	if($pSet->multiSelect($field))
	{
		$arr = splitvalues($value);
		$numeric = true;
		$type = $pSet->getLWLinkFieldType($field);
		if(!$type)
		{
			foreach($arr as $val)
				if(strlen($val) && !is_numeric($val))
				{
					$numeric=false;
					break;
				}
		}
		else
			$numeric = !NeedQuotes($type);
		$in = "";
		foreach($arr as $val)
		{
			if($numeric && !strlen($val))
				continue;
			if(strlen($in))
				$in.= ",";
			if($numeric)
				$in.= ($val+0);
			else
				$in.= db_prepare_string($cipherer->EncryptField($nLookupType == LT_QUERY ? $linkFieldName : $field, $val));
		}
		if(strlen($in))
		{
			$where = GetLWWhere($field, $ptype);
			if($nLookupType == LT_QUERY){
				$inWhere = GetFullFieldName($linkFieldName, $lookupTable, false)." in (".$in.")";
				if(strlen($where))
					$inWhere.=" and (".$where.")";
				$LookupSQL = $lookupQueryObj->toSql(whereAdd($lookupQueryObj->m_where->toSql($lookupQueryObj), $inWhere));
			}else{
				$LookupSQL.= $pSet->getLWLinkField($field)." in (".$in.")";
				if(strlen($where))
					$LookupSQL.=" and (".$where.")";
			}
			LogInfo($LookupSQL);
			$rsLookup = db_query($LookupSQL,$conn);
			$found = false;
			$lookupArrTmp = array(); 
			$lookupArr = array(); 
			while($lookuprow=db_fetch_numarray($rsLookup))
			{
				$lookupArrTmp[] = $lookuprow[$displayFieldIndex];
			}
			$lookupArr = array_unique($lookupArrTmp);
			foreach($lookupArr as $lookupvalue)
			{
				if($found)
					$out.= ",";
				$found = true;
				$outVal = GetDataInt($lookupvalue, $data, $field, $pSet->getViewFormat($field), $ptype);
				$out.= $nLookupType == LT_QUERY || $linkAndDisplaySame ? 
					$cipherer->DecryptField($nLookupType == LT_QUERY ? $displayFieldName : $field, $outVal) : $outVal;
			}
			if($found)
			{
				if($pSet->NeedEncode($field) && $mode!=MODE_EXPORT)
					return ProcessLargeText($pSet, $out, $iquery, "", $mode, $pSet->getEditFormat($field));
				else
					return $out;
			}
		}
	}
	else
	{
		$found = false;
		$strdata = $cipherer->MakeDBValue($nLookupType == LT_QUERY ? $linkFieldName : $field, $value, "", "", true);
		if($nLookupType == LT_QUERY){
			$strWhere = GetFullFieldName($linkFieldName, $lookupTable, false)." = " . $strdata;
			$LookupSQL = $lookupQueryObj->toSql(whereAdd($lookupQueryObj->m_where->toSql($lookupQueryObj), $strWhere));
		}else{
			$strWhere = $pSet->getLWLinkField($field)." = " . $strdata;
			$where = GetLWWhere($field, $ptype);
			if(strlen($where))
				$strWhere.= " and (".$where.")";
			$LookupSQL.= $strWhere;
		}
		LogInfo($LookupSQL);
		$rsLookup = db_query($LookupSQL,$conn);
		if($lookuprow = db_fetch_numarray($rsLookup)){
			$lookupvalue = $lookuprow[$displayFieldIndex];
			$found = true;
		}
	}
	if(!$out){
		if($found && ($nLookupType == LT_QUERY || $linkAndDisplaySame)){
			$lookupvalue = $cipherer->DecryptField($nLookupType == LT_QUERY ? $displayFieldName : $field, $lookupvalue);
		}
		$out = GetDataInt($lookupvalue, $data, $field, $pSet->getViewFormat($field), $ptype);
	}
	
	if($pSet->NeedEncode($field) && $mode!=MODE_EXPORT)
		$value = ProcessLargeText($pSet, $out ,$iquery, "", $mode, $pSet->getEditFormat($field));
	else
		$value = $out;
	return $value;
}

function DisplayNoImage()
{
	$path = getabspath("images/no_image.gif");
	header("Content-Type: image/gif");
	printfile($path);
}

function DisplayFile()
{
	$path = getabspath("images/file.gif");
	header("Content-Type: image/gif");
	printfile($path);
}

////////////////////////////////////////////////////////////////////////////////
// miscellaneous functions
////////////////////////////////////////////////////////////////////////////////
//	analog of strrpos function
function my_strrpos($haystack, $needle)
{
	$index = strpos(strrev($haystack), strrev($needle));
	if($index === false)
		return false;
	$index = strlen($haystack) - strlen($needle) - $index;
	return $index;
}

//	utf-8 analog of strlen function
function strlen_utf8($str)
{
	$len=0;
	$i=0;
	$olen=strlen($str);
	while($i<$olen)
	{
		$c=ord(substr($str,$i,1));
		if($c<128)
			$i++;
		else if($i<$olen-1 && $c>=192 && $c<=223)
			$i+=2;
		else if($i<$olen-2 && $c>=224 && $c<=239)
			$i+=3;
		else if($i<$olen-3 && $c>=240)
			$i+=4;
		else
			break;
		$len++;
	}
	return $len;
}

//	utf-8 analog of substr function
function substr_utf8($str,$index,$strlen)
{
	if($strlen<=0)
		return "";
	$len=0;
	$i=0;
	$olen=strlen($str);
	$oindex=-1;
	while($i<$olen)
	{
		if($len==$index)
			$oindex=$i;
		
		$c=ord(substr($str,$i,1));
		if($c<128)
			$i++;
		else if($i<$olen-1 && $c>=192 && $c<=223)
			$i+=2;
		else if($i<$olen-2 && $c>=224 && $c<=239)
			$i+=3;
		else if($i<$olen-3 && $c>=240)
			$i+=4;
		else
			break;
		$len++;
		if($oindex>=0 && $len==$index+$strlen)
			return substr($str,$oindex,$i-$oindex);
	}
	if($oindex>0)
		return substr($str,$oindex,$olen-$oindex);
	return "";
}


//	prepare string for JavaScript. Replace ' with \' and linebreaks with \r\n
function jsreplace($str)
{
	$ret= str_replace(array("\\","'","\r","\n"),array("\\\\","\\'","\\r","\\n"),$str);
	return my_str_ireplace("</script>","</scr'+'ipt>",$ret);
}

function LogInfo($SQL)
{/*
	global $dSQL,$dDebug;
	$dSQL=$SQL;
	if($dDebug)
	{
		echo $dSQL;
		echo "<br>";
	}*/
}

//	check if file extension is image extension
function CheckImageExtension($filename)
{
	if(strlen($filename)<4)
		return false;
	$ext=strtoupper(substr($filename,strlen($filename)-4));
	if($ext==".GIF" || $ext==".JPG" || $ext=="JPEG" || $ext==".PNG" || $ext==".BMP")
		return $ext;
	return false;
} 

function RTESafe($strText)
{
//	returns safe code for preloading in the RTE
	$tmpString="";
	
	$tmpString = trim($strText);
	if(!$tmpString) return "";
	
//	convert all types of single quotes
	$tmpString = str_replace( chr(145), chr(39),$tmpString);
	$tmpString = str_replace( chr(146), chr(39),$tmpString);
	$tmpString = str_replace("'", "&#39;",$tmpString);
	
//	convert all types of double quotes
	$tmpString = str_replace(chr(147), chr(34),$tmpString);
	$tmpString = str_replace(chr(148), chr(34),$tmpString);
	
//	replace carriage returns & line feeds
	$tmpString = str_replace(chr(10), " ",$tmpString);
	$tmpString = str_replace(chr(13), " ",$tmpString);
	
	return $tmpString;
}

function html_special_decode($str)
{
	$ret=$str;
	$ret=str_replace("&gt;",">",$ret);
	$ret=str_replace("&lt;","<",$ret);
	$ret=str_replace("&quot;","\"",$ret);
	$ret=str_replace("&#039;","'",$ret);
	$ret=str_replace("&#39;","'",$ret);
	$ret=str_replace("&amp;","&",$ret);
	return $ret;
}

////////////////////////////////////////////////////////////////////////////////
// database and SQL related functions
////////////////////////////////////////////////////////////////////////////////

//	add clause to WHERE or HAVING expression
function whereAdd($where,$clause)
{
	if(!strlen($clause))
		return $where;
	if(!strlen($where))
		return $clause;
	return "(".$where.") and (".$clause.")";
}

//	add WHERE clause to SQL string
function AddWhere($sql,$where)
{
	if(!strlen($where))
		return $sql;
	$sql=str_replace(array("\r\n","\n","\t")," ",$sql);
	$tsql = strtolower($sql);
	$n = my_strrpos($tsql," where ");
	$n1 = my_strrpos($tsql," group by ");
	$n2 = my_strrpos($tsql," order by ");
	if($n1===false)
		$n1=strlen($tsql);
	if($n2===false)
		$n2=strlen($tsql);
	if ($n1>$n2)
		$n1=$n2;
	if($n===false)
		return substr($sql,0,$n1)." where ".$where.substr($sql,$n1);
	else
		return substr($sql,0,$n+strlen(" where "))."(".substr($sql,$n+strlen(" where "),$n1-$n-strlen(" where ")).") and (".$where.")".substr($sql,$n1);
}

//	construct WHERE clause with key values
function KeyWhere(&$keys, $table="")
{
	global $strTableName;
	if(!$table)
		$table = $strTableName;
	$strWhere="";
	
	$pSet = new ProjectSettings($table);
	$cipherer = new RunnerCipherer($table);
	$keyFields = $pSet->getTableKeys();
	foreach($keyFields as $kf)
	{
		if(strlen($strWhere))
			$strWhere.=" and ";
		$value = $cipherer->MakeDBValue($kf, $keys[$kf], "", "", true);
			$valueisnull = ($value==="null");
		if($valueisnull)
			$strWhere.= GetFullFieldNameForInsert($pSet, $kf)." is null";
		else
			$strWhere.= GetFullFieldName($kf, $table, false)."=".$cipherer->MakeDBValue($kf, $keys[$kf], "", "", true);
	}
	return $strWhere;
}

//	consctruct SQL WHERE clause for simple search
function StrWhereExpression($strField, $SearchFor, $strSearchOption, $SearchFor2, $p_cipherer)
{
	global $strTableName;
	$pSet = new ProjectSettings($strTableName, PAGE_SEARCH);
	$cipherer = new RunnerCipherer($strTableName);
	$type = $pSet->getFieldType($strField);
	// Filed name for encryption functions
	$encFieldName = $strField;
	
	$ismssql=false;
	
	$isdb2=false;

	$isMysql = true;

	$btexttype=IsTextType($type);
	$btexttype=false;

	if($strSearchOption=='Empty')
	{
		if(IsCharType($type) && (!$ismssql || !$btexttype))
			return "(".GetFullFieldNameForInsert($pSet, $strField)." is null or ".GetFullFieldNameForInsert($pSet, $strField)."='')";			
		elseif ($ismssql && $btexttype)	
			return "(".GetFullFieldNameForInsert($pSet, $strField)." is null or ".GetFullFieldNameForInsert($pSet, $strField)." LIKE '')";
		else
			return GetFullFieldNameForInsert($pSet, $strField)." is null";
	}
	$strQuote="";
	if(NeedQuotes($type))
		$strQuote = "'";
//	return none if trying to compare numeric field and string value
	$sSearchFor=$SearchFor;
	$sSearchFor2=$SearchFor2;
	if(IsBinaryType($type))
		return "";
	

	
	if(IsDateFieldType($type) && $strSearchOption!="Contains" && $strSearchOption!="Starts with" )
	{
		$time=localdatetime2db($SearchFor);
		if($time=="null")
			return "";
		$sSearchFor=db_datequotes($time);
		if($strSearchOption=="Between")
		{
			$time=localdatetime2db($SearchFor2);
			if($time=="null")
				$sSearchFor2="";
			else
				$sSearchFor2=db_datequotes($time);
		}
	}
	
	if(!$strQuote && !is_numeric($sSearchFor))
		return "";
	
	if($cipherer->isFieldPHPEncrypted($encFieldName))
		$sSearchFor = $cipherer->MakeDBValue($encFieldName, $sSearchFor);
	else{
		if(!$strQuote && $strSearchOption!="Contains" && $strSearchOption!="Starts with")
		{
			$sSearchFor = 0+$sSearchFor;
			$sSearchFor2 = 0+$sSearchFor2;
		}
		else if(!IsDateFieldType($type) && $strSearchOption!="Contains" && $strSearchOption!="Starts with")
		{
			if($btexttype)
			{
				$sSearchFor=db_prepare_string($sSearchFor);
				if($strSearchOption=="Between" && $sSearchFor2)
					$sSearchFor2=db_prepare_string($sSearchFor2);
			}
			else
			{
				$sSearchFor = $pSet->isEnableUpper(db_prepare_string($sSearchFor));
				if($strSearchOption=="Between" && $sSearchFor2)
					$sSearchFor2 = $pSet->isEnableUpper(db_prepare_string($sSearchFor2));
			}
		}
	}

	if(IsCharType($type) && !$btexttype)
	{
		if(!$cipherer->isFieldPHPEncrypted($encFieldName))
			$strField = $pSet->isEnableUpper(GetFullFieldName($strField, "", false));
		else 
			$strField=GetFullFieldName($strField);
	}
	elseif($strSearchOption=="Contains" || $strSearchOption=="Starts with")
	{
		$strField = db_field2char(GetFullFieldName($strField),$type);
	}
	elseif($pSet->getViewFormat($strField)==FORMAT_TIME)
	{
		$strField = db_field2time(GetFullFieldName($strField),$type);
	}
	else 
	{
		$strField=GetFullFieldName($strField);
	}

/*
	elseif ($ismssql && !$btexttype && ($strSearchOption=="Contains" || $strSearchOption=="Starts with"))
		$strField="convert(varchar(50),".GetFullFieldName($strField).")";
	elseif ($isdb2 && !$btexttype && ($strSearchOption=="Contains" || $strSearchOption=="Starts with"))
		$strField="char(".GetFullFieldName($strField).")";
	else 
		$strField=GetFullFieldName($strField);
*/
	$ret="";
		$like="like";
	
	if ($isMysql)
	{
		$sSearchForMysql = str_replace('\\\\', '\\\\\\\\', $sSearchFor); 
	}
	if($strSearchOption=="Contains")
	{
		if ($isMysql)
		{
			$sSearchFor = $sSearchForMysql;
		}
		if($cipherer->isFieldPHPEncrypted($encFieldName))
			return $strField."=".$sSearchFor;
		
		if(IsCharType($type) && !$btexttype)
			return $strField." ".$like." ".$pSet->isEnableUpper(db_prepare_string("%".$sSearchFor."%"));
		else
			return $strField." ".$like." ".db_prepare_string("%".$sSearchFor."%");
	}
	else if($strSearchOption=="Equals") 
		return $strField."=".$sSearchFor;
	else if($strSearchOption=="Starts with")
	{
		if ($isMysql)
		{
			$sSearchFor = $sSearchForMysql;
		}
		if(IsCharType($type) && !$btexttype)
			return $strField." ".$like." ".$pSet->isEnableUpper(db_prepare_string($sSearchFor."%"));
		else
			return $strField." ".$like." ".db_prepare_string($sSearchFor."%");
	}
	else if($strSearchOption=="More than") return $strField.">".$sSearchFor;
	else if($strSearchOption=="Less than") return $strField."<".$sSearchFor;
	else if($strSearchOption=="Between")
	{
		$ret=$strField.">=".$sSearchFor;
		if($sSearchFor2) $ret.=" and ".$strField."<=".$sSearchFor2;
			return $ret;
	}
	return "";
}

//	construct SQL WHERE clause for Advanced search
function StrWhereAdv($strField, $SearchFor, $strSearchOption, $SearchFor2, $etype, $isSuggest)
{
	global $strTableName;
	
	$pSet = new ProjectSettings($strTableName, PAGE_SEARCH);
	$cipherer = new RunnerCipherer($strTableName);
	
	$type = $pSet->getFieldType($strField);
	$isOracle = false;

	$ismssql=false;

	$isdb2=false;
	
	$btexttype=IsTextType($type);
	$btexttype=false;

	$isMysql = true;

	if(IsBinaryType($type))
		return "";
	if($strSearchOption=='Empty')
	{
		if(IsCharType($type) && (!$ismssql || !$btexttype) && !$isOracle)
		{
			return "(".GetFullFieldNameForInsert($pSet, $strField)." is null or ".GetFullFieldNameForInsert($pSet, $strField)."='')";
		}
		elseif ($ismssql && $btexttype)
		{
			return "(".GetFullFieldNameForInsert($pSet, $strField)." is null or ".GetFullFieldNameForInsert($pSet, $strField)." LIKE '')";
		}
		else
		{
			return GetFullFieldNameForInsert($pSet, $strField)." is null";
		}
	}
		$like="like";
	
	
	if($pSet->getEditFormat($strField) == EDIT_FORMAT_LOOKUP_WIZARD)
	{
		if($pSet->multiSelect($strField))
			$SearchFor=splitvalues($SearchFor);
		else
			$SearchFor=array($SearchFor);
		$ret="";
		foreach($SearchFor as $value)
		{
			if(!($value=="null" || $value=="Null" || $value==""))
			{
				if(strlen($ret))
					$ret.=" or ";
				if($strSearchOption=="Equals")
				{
					$value=make_db_value($strField,$value);
					if(!($value=="null" || $value=="Null"))
						$ret.=GetFullFieldName($strField, "", false).'='.$value;
				}
				elseif($isSuggest)
				{
					$ret.=" ".GetFullFieldName($strField, "", false)." ".$like." ".db_prepare_string('%'.$value.'%');	
				}
				else
				{
					if(strpos($value,",")!==false || strpos($value,'"')!==false)
						$value = '"'.str_replace('"','""',$value).'"';
					
					if ($isMysql)
					{
						$value = str_replace('\\\\', '\\\\\\\\', $value); 
					}
					//for search by multiply Lookup wizard field
					$ret.=GetFullFieldName($strField, "", false)." = ".db_prepare_string($value);
					$ret.=" or ".GetFullFieldName($strField, "", false)." ".$like." ".db_prepare_string("%,".$value.",%");
					$ret.=" or ".GetFullFieldName($strField, "", false)." ".$like." ".db_prepare_string("%,".$value);
					$ret.=" or ".GetFullFieldName($strField, "", false)." ".$like." ".db_prepare_string($value.",%");
				}
			}
		}
		if(strlen($ret))
			$ret="(".$ret.")";
		return $ret;
	}
	if($pSet->GetEditFormat($strField) == EDIT_FORMAT_CHECKBOX)
	{
		if($SearchFor=="none")
			return "";
			
		if(NeedQuotes($type))
		{
							$isOracle = false;
			
			if($SearchFor=="on")
			{
				$whereStr = "(".GetFullFieldName($strField)."<>'0' ";
				if (!$isOracle)
				{
					$whereStr .= " and ".GetFullFieldName($strField)."<>'' ";
				} 
				$whereStr .= " and ".GetFullFieldName($strField)." is not null)";
				return $whereStr;
			}
			elseif($SearchFor=="off")
			{
				$whereStr = "(".GetFullFieldName($strField)."='0' ";
				if (!$isOracle)
				{
					$whereStr .= " or ".GetFullFieldName($strField)."='' "; 
				}
				$whereStr .= " or ".GetFullFieldName($strField)." is null)";
			}
		}
		else
		{
			if($SearchFor=="on")
			{
				return "(".GetFullFieldName($strField)."<>0 and ".GetFullFieldName($strField)." is not null)";
			}
			elseif($SearchFor=="off")
			{
				return "(".GetFullFieldName($strField)."=0 or ".GetFullFieldName($strField)." is null)";
			}
		}
	}
	$value1 = $cipherer->MakeDBValue($strField, $SearchFor, $etype, "", true);
	$value2 = false;
	$cleanvalue2 = false;
	if($strSearchOption == "Between")
	{
		$cleanvalue2 = prepare_for_db($strField,$SearchFor2,$etype);
		$value2 = make_db_value($strField,$SearchFor2,$etype);
	}
		
	if($strSearchOption!="Contains" && $strSearchOption!="Starts with" && ($value1==="null" || $value2==="null" )
		&& !$cipherer->isFieldPHPEncrypted($strField))
		return "";
	
	if(IsCharType($type) && !$btexttype)
	{
		if(!$cipherer->isFieldPHPEncrypted($strField))
		{
			$value1 = $pSet->isEnableUpper($value1);
			$value2 = $pSet->isEnableUpper($value2);
			$gstrField = $pSet->isEnableUpper(GetFullFieldName($strField, "", false));
		}
		else
			$gstrField = GetFullFieldName($strField, "", false);
	}
	elseif($strSearchOption=="Contains" || $strSearchOption=="Starts with")
	{
		$gstrField = db_field2char(GetFullFieldName($strField, "", false),$type);
	}
	elseif($pSet->getViewFormat($strField)==FORMAT_TIME)
	{
		$gstrField = db_field2time(GetFullFieldName($strField, "", false),$type);
	}
	else 
	{
		$gstrField  =GetFullFieldName($strField, "", false);
	}
/*
	elseif ($ismssql && !$btexttype && ($strSearchOption=="Contains" || $strSearchOption=="Starts with"))
		$gstrField="convert(varchar,".GetFullFieldName($strField).")";
	elseif ($isdb2 && !$btexttype && ($strSearchOption=="Contains" || $strSearchOption=="Starts with"))
		$gstrField="char(".GetFullFieldName($strField).")";
	else 
		$gstrField=GetFullFieldName($strField);
*/
	$ret="";
	
	if($strSearchOption=="Contains")
	{
		if ($isMysql)
		{
			$SearchFor = str_replace('\\\\', '\\\\\\\\', $SearchFor);
		}
		if($cipherer->isFieldPHPEncrypted($strField))
			return $gstrField."=".$cipherer->MakeDBValue($strField, $SearchFor);
		
		if(IsCharType($type) && !$btexttype)
			return $gstrField." ".$like." ".$pSet->isEnableUpper(db_prepare_string("%".$SearchFor."%"));
		else
			return $gstrField." ".$like." ".db_prepare_string("%".$SearchFor."%");
	}
	else if($strSearchOption=="Equals") 
	{
		return $gstrField."=".$value1;
	}
	else if($strSearchOption=="Starts with")
	{
		if ($isMysql)
		{
			$SearchFor = str_replace('\\\\', '\\\\\\\\', $SearchFor);
		}
		if(IsCharType($type) && !$btexttype)
			return $gstrField." ".$like." ".$pSet->isEnableUpper(db_prepare_string($SearchFor."%"));
		else
			return $gstrField." ".$like." ".db_prepare_string($SearchFor."%");
	}
	else if($strSearchOption=="More than") return $gstrField.">".$value1;
	else if($strSearchOption=="Less than") return $gstrField."<".$value1;
	else if($strSearchOption=="Equal or more than") return $gstrField.">=".$value1;
	else if($strSearchOption=="Equal or less than") return $gstrField."<=".$value1;
	else if($strSearchOption=="Between")
	{
		$ret=$gstrField.">=".$value1." and ";
		if (IsDateFieldType($type))
		{
			$timeArr = db2time($cleanvalue2);
			// for dates without time, add one day
			if ($timeArr[3]==0 && $timeArr[4]==0 && $timeArr[5]==0)
			{
				$timeArr = adddays($timeArr, 1);
				$value2 = $timeArr[0]."-".$timeArr[1]."-".$timeArr[2];
				$value2 = add_db_quotes($strField, $value2, $strTableName);
				$ret .= $gstrField."<".$value2;
			}
			else
			{
				$ret.=$gstrField."<=".$value2;
			}
		}
		else 
		{
			$ret.=$gstrField."<=".$value2;
		}
		return $ret;
	}
	return "";
}

//	get count of rows from the query
function GetRowCount($strSQL)
{
	global $conn;
	$strSQL=str_replace(array("\r\n","\n","\t")," ",$strSQL);
	$tstr = strtoupper($strSQL);
	$ind1 = strpos($tstr,"SELECT ");
	$ind2 = my_strrpos($tstr," FROM ");
	$ind3 = my_strrpos($tstr," GROUP BY ");
	if($ind3===false)
	{
		$ind3 = strpos($tstr," ORDER BY ");
		if($ind3===false)
			$ind3=strlen($strSQL);
	}
	$countstr=substr($strSQL,0,$ind1+6)." count(*) ".substr($strSQL,$ind2+1,$ind3-$ind2);
	$countrs = db_query($countstr,$conn);
	$countdata = db_fetch_numarray($countrs);
	return $countdata[0];
}

//	add MSSQL Server TOP clause
function AddTop($strSQL, $n)
{
	$tstr = strtoupper($strSQL);
	$ind1 = strpos($tstr,"SELECT");
	return substr($strSQL,0,$ind1+6)." top ".$n." ".substr($strSQL,$ind1+6);
}
//	add DB2 Server TOP clause
function AddTopDB2($strSQL, $n)
{
	
	return $strSQL." fetch first ".$n." rows only";
}
function AddTopIfx($strSQL,$n)
{
	return substr($strSQL,0,7)."limit ".$n." ".substr($strSQL,7);
}
//	add Oracle ROWNUMBER checking
function AddRowNumber($strSQL, $n)
{
	return "select * from (".$strSQL.") where rownum<".($n+1);
}

// test database type if values need to be quoted
function NeedQuotesNumeric($type)
{
    if($type == 203 || $type == 8 || $type == 129 || $type == 130 || 
		$type == 7 || $type == 133 || $type == 134 || $type == 135 ||
		$type == 201 || $type == 205 || $type == 200 || $type == 202 || $type==72 || $type==13)
		return true;
	else
		return false;
}

//	using ADO DataTypeEnum constants
//	the full list available at:
//	http://msdn.microsoft.com/library/default.asp?url=/library/en-us/ado270/htm/mdcstdatatypeenum.asp

function IsNumberType($type)
{
	if($type==20 || $type==6 || $type==14 || $type==5 || $type==10 
	|| $type==3 || $type==131 || $type==4 || $type==2 || $type==16
	|| $type==21 || $type==19 || $type==18 || $type==17 || $type==139
	|| $type==11)
		return true;
	return false;
}

function IsFloatType($type)
{
	if($type==14 || $type==5 || $type==131 || $type==6)
		return true;
	return false;
}


function NeedQuotes($type)
{
	return !IsNumberType($type);
}

function IsBinaryType($type)
{
	if($type==128 || $type==205 || $type==204)
		return true;
	return false;
}

function IsDateFieldType($type)
{
	if($type==7 || $type==133 || $type==135)
		return true;
	return false;
}

function IsTimeType($type)
{
	if($type==134)
		return true;
	return false;
}

function IsCharType($type)	
{
	if(IsTextType($type) || $type==8 || $type==129 || $type==200 || $type==202 || $type==130)
		return true;
	return false;
}

function IsTextType($type)
{
	if($type==201 || $type==203)
		return true;
	return false;
}

function IsGuid($type)
{
	if($type==72)
		return true;
	return false;
}


////////////////////////////////////////////////////////////////////////////////
// security functions
////////////////////////////////////////////////////////////////////////////////


//	return user permissions on the table
//	A - Add
//	D - Delete
//	E - Edit
//	S - List/View/Search
//	P - Print/Export

function ReadUserPermissions($userID="")
{
	global $conn,$gPermissionsRead, $gPermissionsRefreshTime, $caseInsensitiveUsername;
	
	if (!strlen($userID))
		$userID=$_SESSION["UserID"];
	$needreload=false;
	if(!array_key_exists("UserRights",$_SESSION))
		$needreload=true;
	elseif(!array_key_exists($userID,$_SESSION["UserRights"]))
		$needreload=true;
	if(!$needreload && ($gPermissionsRead || time()-@$_SESSION["LastReadRights"]<=$gPermissionsRefreshTime))
		return;	
	$groups=array();
	$bIsAdmin=false;
	if($userID!="Guest")
	{
					$sql = "select GroupID, UserName from `ishaugmembers` where UserName=".db_prepare_string($userID);
		$rs = db_query($sql,$conn);
		while($data=db_fetch_numarray($rs)){
							if ($caseInsensitiveUsername && !strcmp($data[1],$userID)){
					$groups[]=$data[0];
				}
				else if (!$caseInsensitiveUsername){
					$groups[]=$data[0];
				}
		}
		
		if(!count($groups))
			$groups[]=-2;
	}
	else
		$groups[]=-3;
	
	$groupstr="";
	foreach($groups as $g)
	{
		if($groupstr!="")
			$groupstr.=",";
		$groupstr.=$g;
		if($g==-1)
			$bIsAdmin=true;
	}
	$rights=array();
	$sql = "select TableName,AccessMask from `ishaugrights` where GroupID in (".$groupstr.")";
	$rs = db_query($sql,$conn);
	while($data=db_fetch_numarray($rs))
	{
		if(!array_key_exists($data[0],$rights))
		{
			$rights[$data[0]]=$data[1];
			continue;
		}
		for($i=0;$i<strlen($data[1]);$i++)
		{
			if(strpos($rights[$data[0]],substr($data[1],$i,1))===false)
				$rights[$data[0]].=substr($data[1],$i,1);
		}
	} 
	if(!array_key_exists("UserRights",$_SESSION))
		$_SESSION["UserRights"]=array();
		if($bIsAdmin)
			$rights[".IsAdmin"]=true;
	$rights[".Groups"]=$groups;
	$_SESSION["UserRights"][$userID]=&$rights;
	$_SESSION["LastReadRights"]=time();
	
	$gPermissionsRead=true;
}

function guestHasPermissions() 
{	
	ReadUserPermissions("Guest");
	if(!count($_SESSION["UserRights"]["Guest"]))
		return false;
	if(array_key_exists("ISHA Exemptions",$_SESSION["UserRights"]["Guest"]))
		return true;
	if(array_key_exists("NEW Exemptions",$_SESSION["UserRights"]["Guest"]))
		return true;
	if(array_key_exists("Burdett Exemptions",$_SESSION["UserRights"]["Guest"]))
		return true;
	if(array_key_exists("Abbott North",$_SESSION["UserRights"]["Guest"]))
		return true;
	if(array_key_exists("Bethnal Green",$_SESSION["UserRights"]["Guest"]))
		return true;
	if(array_key_exists("Bow Bridge",$_SESSION["UserRights"]["Guest"]))
		return true;
	if(array_key_exists("Brownfield",$_SESSION["UserRights"]["Guest"]))
		return true;
	if(array_key_exists("East End",$_SESSION["UserRights"]["Guest"]))
		return true;
	if(array_key_exists("Glamis Estate",$_SESSION["UserRights"]["Guest"]))
		return true;
	if(array_key_exists("Island Homes",$_SESSION["UserRights"]["Guest"]))
		return true;
	if(array_key_exists("Lansbury",$_SESSION["UserRights"]["Guest"]))
		return true;
	if(array_key_exists("Lansbury West",$_SESSION["UserRights"]["Guest"]))
		return true;
	if(array_key_exists("Leopold",$_SESSION["UserRights"]["Guest"]))
		return true;
	if(array_key_exists("OFHA",$_SESSION["UserRights"]["Guest"]))
		return true;
	if(array_key_exists("Shadwell",$_SESSION["UserRights"]["Guest"]))
		return true;
	if(array_key_exists("Spitalfields",$_SESSION["UserRights"]["Guest"]))
		return true;
	if(array_key_exists("admin_rights",$_SESSION["UserRights"]["Guest"]))
		return true;
	if(array_key_exists("admin_members",$_SESSION["UserRights"]["Guest"]))
		return true;
	if(array_key_exists("admin_users",$_SESSION["UserRights"]["Guest"]))
		return true;
	if(array_key_exists("isha_audit",$_SESSION["UserRights"]["Guest"]))
		return true;
	if(array_key_exists("Wessex Homes",$_SESSION["UserRights"]["Guest"]))
		return true;
	if(array_key_exists("Octavia Housing",$_SESSION["UserRights"]["Guest"]))
		return true;
	if(array_key_exists("West London Mental Health",$_SESSION["UserRights"]["Guest"]))
		return true;
	if(array_key_exists("Abbott South",$_SESSION["UserRights"]["Guest"]))
		return true;
	if(array_key_exists("isha_streets",$_SESSION["UserRights"]["Guest"]))
		return true;
	if(array_key_exists("Demo Contract",$_SESSION["UserRights"]["Guest"]))
		return true;
	if(array_key_exists("Devons",$_SESSION["UserRights"]["Guest"]))
		return true;
	if(array_key_exists("Vehicle in Abbott North",$_SESSION["UserRights"]["Guest"]))
		return true;
	if(array_key_exists("Ticket Octavia",$_SESSION["UserRights"]["Guest"]))
		return true;
	if(array_key_exists("Ticket Demo Site",$_SESSION["UserRights"]["Guest"]))
		return true;
	if(array_key_exists("elite",$_SESSION["UserRights"]["Guest"]))
		return true;
	if(array_key_exists("Request Visit WLMH",$_SESSION["UserRights"]["Guest"]))
		return true;
	return false;
}


function GetUserPermissionsDynamic($table="")
{
	global $strTableName,$gPermissionsRefreshTime,$gPermissionsRead;
	if(!$table)
		$table=$strTableName;
		
	ReadUserPermissions();
	if(IsAdmin())
	{
	if($table=="admin_rights")
		return "ADESPIM";
	if($table=="admin_members")
		return "ADESPIM";
	if($table=="admin_users")
		return "ADESPIM";
	}

	return @$_SESSION["UserRights"][$_SESSION["UserID"]][$table];
}

function IsAdmin()
{
	global $gPermissionsRefreshTime,$gPermissionsRead;
	ReadUserPermissions();
	return array_key_exists(".IsAdmin",@$_SESSION["UserRights"][$_SESSION["UserID"]]);
}

function GetUserPermissions($table="")
{
	return GetUserPermissionsDynamic($table);
}

//
function isLogged(){
	
	if (@$_SESSION["UserID"]) {
		return true;
	}
		return false;
}


function inFacebook(){
		global $conn, $cCharset, $cUserNameField, $cPasswordField;
	
	$facebook = new facebookWrapper();
	
	$signed_request = $facebook->FBgetSignedRequest();
	
	if ($signed_request) {
		$strUsername = "fb".(string)$signed_request['user_id'];
		$strSQL = "select * from ".AddTableWrappers("users")." where ".AddFieldWrappers(GetUserNameField())."='".$strUsername."'";
		$rs = db_query($strSQL,$conn);
		$data = db_fetch_array($rs);
		if ($data){
			AfterFBLogIn($data[$cUserNameField], $data[$cPasswordField]);
			return true;
		}
	}
	return false;
}

/**
* Set session variables and permissions after login via Facebook
*
*/
function AfterFBLogIn($pUsername, $pPassword){
	global $conn, $cUserNameFieldType, $cPasswordFieldType, $cUserNameField, $cDisplayNameField, $globalEvents;
	$logged = false;
	$strUsername = (string)$pUsername;
	$sUsername = $strUsername;
		
	if(NeedQuotes($cUserNameFieldType))
		$strUsername = db_prepare_string($strUsername);
	else
		$strUsername = (0+$strUsername);
		
	$strSQL = "select * from ".AddTableWrappers("users")." where ".AddFieldWrappers($cUserNameField)."=".$strUsername."";
	$rs = db_query($strSQL,$conn);
 	$data = db_fetch_array($rs);
	if($data){
		$logged=true;
		$pDisplayUsername = $data[$cDisplayNameField]!='' ? $data[$cDisplayNameField] : $sUsername;
		DoLogin(false, $pUsername, $pDisplayUsername, "", ACCESS_LEVEL_USER, $pPassword);
		SetAuthSessionData($pUsername, $data, true, $pPassword);
	}
}

/**
 * SetAuthSessionData
 * Add to session auth data and permissions
 * @param {string} user identifier
 * @param {string} user display name
 * @param {object} fetched row from DB with user data
 */
function SetAuthSessionData($pUsername, &$data, $fromFacebook, $password)
{
	global $globalEvents;
		$_SESSION["GroupID"] = $data["email"];


	if($globalEvents->exists("AfterSuccessfulLogin"))
	{
		$globalEvents->AfterSuccessfulLogin($pUsername != "Guest" ? $pUsername : "", $password, $data);
	}	
}

function DoLogin($autoLogin = false, $userID = "Guest", $userName = "", $groupID = "<Guest>"
	, $accessLevel = ACCESS_LEVEL_GUEST, $password = "")
{
	global $globalEvents;
	
	if($userID == "Guest" && $userName == "")
		$userName = "Guest";
	
	$_SESSION["UserID"] = $userID;
	$_SESSION["UserName"] = $userName;
	$_SESSION["GroupID"] = $groupID;
	$_SESSION["AccessLevel"] = $accessLevel;
	$auditObj = GetAuditObject();
	if($auditObj)
	{
		$auditObj->LogLogin($userID);
		$auditObj->LoginSuccessful();
	}
	if($autoLogin && $globalEvents->exists("AfterSuccessfulLogin"))
	{
		$dummy = array();
		$globalEvents->AfterSuccessfulLogin($userID != "Guest" ? $userID : "", $password, $dummy);
	}
}

// 
function CheckSecurity($strValue, $strAction)
{
global $cAdvSecurityMethod, $strTableName;
$pSet = new ProjectSettings($strTableName);

	if($_SESSION["AccessLevel"]==ACCESS_LEVEL_ADMIN)
		return true;

	$strPerm = GetUserPermissions();
	if(@$_SESSION["AccessLevel"]!=ACCESS_LEVEL_ADMINGROUP && strpos($strPerm, "M")===false)
	{
	}
	//	 check user group permissions
	if($strAction=="Add" && !(strpos($strPerm, "A")===false) ||
	   $strAction=="Edit" && !(strpos($strPerm, "E")===false) ||
	   $strAction=="Delete" && !(strpos($strPerm, "D")===false) ||
	   $strAction=="Search" && !(strpos($strPerm, "S")===false) ||
	   $strAction=="Import" && !(strpos($strPerm, "I")===false) ||
	   $strAction=="Export" && !(strpos($strPerm, "P")===false) )
		return true;
	else
		return false;
	return true;
}


//	add security WHERE clause to SELECT SQL command
function SecuritySQL($strAction, $table="")
{
	global $cAdvSecurityMethod,$strTableName;
	
	if (!strlen($table))	
		$table = $strTableName;
	
	$pSet = new ProjectSettings($table);
	
   	$ownerid=@$_SESSION["_".$table."_OwnerID"];
	$ret="";
	if(@$_SESSION["AccessLevel"]==ACCESS_LEVEL_ADMIN)
		return "";
		
	$ret="";
	$strPerm = GetUserPermissions($table);

	if(strpos($strPerm,"M")===false)
	{
	}
	
	if($strAction=="Edit" && !(strpos($strPerm, "E")===false) ||
	   $strAction=="Delete" && !(strpos($strPerm, "D")===false) ||
	   $strAction=="Search" && !(strpos($strPerm, "S")===false) ||
	   $strAction=="Export" && !(strpos($strPerm, "P")===false) )
		return $ret;
	else
		return "1=0";
	return "";
}

////////////////////////////////////////////////////////////////////////////////
// editing functions
////////////////////////////////////////////////////////////////////////////////

function make_db_value($field,$value,$controltype="",$postfilename="",$table="")
{	
	$ret=prepare_for_db($field,$value,$controltype,$postfilename,$table);
	
	if($ret===false)
		return $ret;
	return add_db_quotes($field,$ret,$table);
}

function add_db_quotes($field, $value, $table = "")
{
	global $strTableName;
	if($table=="")
		$table=$strTableName;
	$pSet = new ProjectSettings($table);
	
	$type = $pSet->getFieldType($field);
	if(IsBinaryType($type))
		return db_addslashesbinary($value);
	if(($value==="" || $value===FALSE || is_null($value)) && !IsCharType($type))
		return "null";
	if(NeedQuotes($type))
	{
		if(!IsDateFieldType($type))
			$value=db_prepare_string($value);
		else
			$value=db_datequotes($value);
	}
	else
	{
		$strvalue = (string)$value;
		$strvalue = str_replace(",",".",$strvalue);
		if(is_numeric($strvalue))
			$value=$strvalue;
		else
			$value=0;
	}
	return $value;
}

function prepare_for_db($field, $value, $controltype = "", $postfilename = "", $table = "")
{
	global $strTableName;
	if($table == "")
		$table = $strTableName;
	$pSet = new ProjectSettings($table);
	$filename = "";
	$type = $pSet->getFieldType($field);
	if(!$controltype || $controltype == "multiselect")
	{
		if(is_array($value))
			$value = combinevalues($value);
		if(($value === "" || $value === FALSE) && !IsCharType($type))
			return "";
		if(IsGuid($type))
		{
			if(!IsGuidString($value))
				return "";
		}
		return $value;
	}	
	else if($controltype == "time")
	{
		if(!strlen($value))
			return "";
		$time = localtime2db($value);
		if(IsDateFieldType($pSet->getFieldType($field)))
		{
			$time = "2000-01-01 ".$time;
		}
		return $time;
	}
	else if(substr($controltype, 0, 4) == "date")
	{
		$dformat = substr($controltype, 4);
		if($dformat == EDIT_DATE_SIMPLE || $dformat == EDIT_DATE_SIMPLE_DP)
		{
			$time = localdatetime2db($value);
			if($time == "null")
				return "";
			return $time;
		}
		else if($dformat == EDIT_DATE_DD || $dformat == EDIT_DATE_DD_DP)
		{
			$a = explode("-",$value);
			if(count($a) < 3)
				return "";
			else
			{
				$y = $a[0];
				$m = $a[1];
				$d = $a[2];
			}
			if($y < 100)
			{
				if($y < 70)
					$y += 2000;
				else
					$y += 1900;
			}
			return mysprintf("%04d-%02d-%02d",array($y,$m,$d));
		}
		else
			return "";
	}
	else if(substr($controltype, 0, 8) == "checkbox")
	{
		if($value == "on")
			$ret = 1;
		else if($value == "none")
			return "";
		else 
			$ret = 0;
		return $ret;
	}
	else
		return false;
}

//	delete uploaded files when deleting the record
function DeleteUploadedFiles($pSet, $gQuery, $where, $ptype, $table = "")
{
	global $conn, $gstrSQL;
	$sql = $gQuery->gSQLWhere($where);
	$rs = db_query($sql,$conn);
	if(!($data=db_fetch_array($rs)))
		return;
	foreach($data as $field=>$value)
	{
		if(strlen($value) && $pSet->getEditFormat($field) == EDIT_FORMAT_FILE)
		{
			$isAbs = $pSet->isAbsolute($field);
			$filename = $pSet->getUploadFolder($field).$value;
			if(!$isAbs)
				$filename = getabspath($filename);
			runner_delete_file($filename);
			if($pSet->getCreateThumbnail($field))
			{
				$filename = $pSet->getUploadFolder($field).$pSet->getStrThumbnail($field).$value;
				if(!$isAbs)
					$filename = getabspath($filename);
				runner_delete_file($filename);
			}
		}
	}
}

//	combine checked values from multi-select list box
function combinevalues($arr)
{
	$ret="";
	foreach($arr as $val)
	{
		if(strlen($ret))
			$ret.=",";
		if(strpos($val,",")===false && strpos($val,'"')===false)
			$ret.=$val;
		else
		{
			$val=str_replace('"','""',$val);
			$ret.='"'.$val.'"';
		}
	}
	return $ret;
}

//	split values for multi-select list box
function splitvalues($str)
{
	$arr=array();
	$start=0;
	$i=0;
	$inquot=false;
	while($i<=strlen($str))
	{
		if($i<strlen($str) && substr($str,$i,1)=='"')
			$inquot=!$inquot;
		else if($i==strlen($str) || !$inquot && substr($str,$i,1)==',')
		{
			$val=substr($str,$start,$i-$start);
			$start=$i+1;
			if(strlen($val) && substr($val,0,1)=='"')
			{
				$val=substr($val,1,strlen($val)-2);
				$val=str_replace('""','"',$val);
			}
			$arr[]=$val;
		}
		$i++;
	}
	return $arr;
}


////////////////////////////////////////////////////////////////////////////////
// edit controls creation functions
////////////////////////////////////////////////////////////////////////////////

//	returns HTML code that represents required Date edit control
function GetDateEdit($ptype, $field, $value, $type, $fieldNum = 0, $search = MODE_EDIT, $record_id = "", &$pageObj)
{	
	global $cYearRadius, $locale_info, $jscode, $strTableName;
	$pSet = new ProjectSettings($strTableName, $ptype);
	$is508 = isEnableSection508();
	$strLabel = $pSet->label($field);
	$cfieldname = GoodFieldName($field);
	$cfield = "value_".GoodFieldName($field).'_'.$record_id;
	if($fieldNum)
		$cfield = "value".$fieldNum."_".GoodFieldName($field).'_'.$record_id;
	$tvalue = $value;
		
	$time = db2time($tvalue);
	if(!count($time))
		$time = array(0, 0, 0, 0, 0, 0);
	$dp = 0;
	switch($type)
	{
		case EDIT_DATE_SIMPLE_DP:
			$ovalue = $value;
			if($locale_info["LOCALE_IDATE"] == 1)
			{
				$fmt = "dd".$locale_info["LOCALE_SDATE"]."MM".$locale_info["LOCALE_SDATE"]."yyyy";
				$sundayfirst = "false";
			}
			else if($locale_info["LOCALE_IDATE"] == 0)
			{
				$fmt = "MM".$locale_info["LOCALE_SDATE"]."dd".$locale_info["LOCALE_SDATE"]."yyyy";
				$sundayfirst = "true";
			}
			else
			{
				$fmt = "yyyy".$locale_info["LOCALE_SDATE"]."MM".$locale_info["LOCALE_SDATE"]."dd";
				$sundayfirst = "false";
			}
			
			if($time[5])
				$fmt.= " HH:mm:ss";
			else if($time[3] || $time[4])
				$fmt.= " HH:mm";
			
			if($time[0])
				$ovalue = format_datetime_custom($time,$fmt);
			$ovalue1 = $time[2]."-".$time[1]."-".$time[0];
			$showtime = "false";
			if($pSet->dateEditShowTime($field))
			{
				$showtime = "true";
				$ovalue1.= " ".$time[3].":".$time[4].":".$time[5];
			}
			// need to create date control object to use it with datePicker
			$ret='<input id="'.$cfield.'" type="Text" name="'.$cfield.'" size="20" value="'.$ovalue.'">';
			$ret.='<input id="ts'.$cfield.'" type="Hidden" name="ts'.$cfield.'" value="'.$ovalue1.'">&nbsp;&nbsp;';
			//$ret.='&nbsp;<img src="images/cal.gif" width=16 height=16 border=0 alt="'."Click Here to Pick up the date".'">';
			$ret.='&nbsp;<a href="#" id="imgCal_'.$cfield.'">'.
				'<img src="images/cal.gif" width=16 height=16 border=0 alt="'."Click Here to Pick up the date".'"></a>';			
			echo $ret;
				
			
			return;
		case EDIT_DATE_DD_DP:
			$dp=1;
		case EDIT_DATE_DD:
			$retday='<select id="day'.$cfield.'" '.(($search == MODE_INLINE_EDIT || $search==MODE_INLINE_ADD) && $is508==true ? 'alt="'.$strLabel.'" ' : '').'name="day'.$cfield.'" ></select>';
			$retmonth='<select id="month'.$cfield.'" '.(($search == MODE_INLINE_EDIT || $search==MODE_INLINE_ADD) && $is508==true ? 'alt="'.$strLabel.'" ' : '').'name="month'.$cfield.'" ></select>';
			$retyear='<select id="year'.$cfield.'" '.(($search == MODE_INLINE_EDIT || $search==MODE_INLINE_ADD) && $is508==true ? 'alt="'.$strLabel.'" ' : '').'name="year'.$cfield.'" ></select>';
			$sundayfirst="false";
			if($locale_info["LOCALE_ILONGDATE"]==1)
				$ret=$retday."&nbsp;".$retmonth."&nbsp;".$retyear;
			else if($locale_info["LOCALE_ILONGDATE"]==0)
			{
				$ret=$retmonth."&nbsp;".$retday."&nbsp;".$retyear;
				$sundayfirst="true";
			}
			else
				$ret=$retyear."&nbsp;".$retmonth."&nbsp;".$retday;
				
			if($time[0] && $time[1] && $time[2])
				$ret.="<input id=\"".$cfield."\" type=hidden name=\"".$cfield."\" value=\"".$time[0]."-".$time[1]."-".$time[2]."\">";
			else
				$ret.="<input id=\"".$cfield."\" type=hidden name=\"".$cfield."\" value=\"\">";
			

			// calendar handling for three DD
			if($dp)
			{
				$ret.='&nbsp;<a href="#" id="imgCal_'.$cfield.'">'.
				'<img src="images/cal.gif" width=16 height=16 border=0 alt="Click Here to Pick up the date"></a>'.
				'<input id="ts'.$cfield.'" type=hidden name="ts'.$cfield.'" value="'.$time[2].'-'.$time[1].'-'.$time[0].'">';
				//$ret.='&nbsp;<img src="images/cal.gif" width=16 height=16 border=0 alt="Click Here to Pick up the date"><input id="ts'.$cfield.'" type=hidden name="ts'.$cfield.'" value="'.$time[2].'-'.$time[1].'-'.$time[0].'">';
			}
		
			echo $ret;

			return;
	//	case EDIT_DATE_SIMPLE:
		default:
			$ovalue=$value;
			if($time[0])
			{
				if($time[3] || $time[4] || $time[5])
					$ovalue=str_format_datetime($time);
				else
					$ovalue=format_shortdate($time);
			}
			echo '<input id="'.$cfield.'" type=text name="'.$cfield.'" size="20" value="'.htmlspecialchars($ovalue).'">';
			return;;
	}
}

//	create javascript array with values for dependent dropdowns
function BuildSecondDropdownArray( $arrName, $strSQL)
{
	global $conn;

	echo $arrName . "=new Array();\r\n";
	$i = 0;
	$rs = db_query($strSQL,$conn);
	while($row = db_fetch_numarray($rs))
	{
		echo $arrName."[".($i*3)."]='".jsreplace($row[0]). "';\r\n";
		echo $arrName."[".($i*3 + 1)."]='".jsreplace($row[1]). "';\r\n";
		echo $arrName."[".($i*3 + 2)."]='".jsreplace($row[2]). "';\r\n";
		$i++;
	}
}

function GetLookupFieldsIndexes($pSet, $field)
{
	$lookupTable = $pSet->getLookupTable($field);
	$lookupType = $pSet->getLookupType($field);
	$displayFieldName = $pSet->getDisplayField($field);
	$linkFieldName = $pSet->getLinkField($field);
	$linkAndDisplaySame = $linkFieldName == $displayFieldName;
	if($lookupType == LT_QUERY)
	{
		$lookupPSet = new ProjectSettings($lookupTable);
		$linkFieldIndex = $lookupPSet->getFieldIndex($linkFieldName) - 1;
		if($linkAndDisplaySame)
			$displayFieldIndex = $linkFieldIndex;
		else
		{
			if($pSet->getCustomDisplay($field))
				$displayFieldIndex = $lookupPSet->getCustomExpressionIndex($pSet->_table, $field);
			else
				$displayFieldIndex = $lookupPSet->getFieldIndex($displayFieldName) - 1;
		}
	}
	else 
	{
		$linkFieldIndex = 0;
		$displayFieldIndex = $linkAndDisplaySame ? 0 : 1;
	}
	return array("linkFieldIndex" => $linkFieldIndex, "displayFieldIndex" => $displayFieldIndex);
}

//	create Lookup wizard control
function BuildSelectControl($field, $value, $fieldNum = 0, $mode, $id = "", $additionalCtrlParams, &$pageObj, $ptype)
{
	global $conn,$strTableName;
	
	if(is_null($pageObj))
		$pSet = new ProjectSettings($strTableName, $ptype);
	else 
		$pSet = $pageObj->pSet;
		
	$lwDisplayField = $pSet->getLWDisplayField($field, false);
		
//	read control settings
	$table = $strTableName;
	$strLabel = $pSet->label($field);
	$is508 = isEnableSection508();
	$alt = "";
	if(($mode == MODE_INLINE_EDIT || $mode == MODE_INLINE_ADD) && $is508)
		$alt = ' alt="'.htmlspecialchars($strLabel).'" ';
	$cfield = "value_".GoodFieldName($field)."_".$id;
	$clookupfield = "display_value_".GoodFieldName($field)."_".$id;
	$openlookup = "open_lookup_".GoodFieldName($field)."_".$id;
	$ctype = "type_".GoodFieldName($field)."_".$id;
	if($fieldNum)
	{
		$cfield = "value".$fieldNum."_".GoodFieldName($field)."_".$id;
		$ctype = "type".$fieldNum."_".GoodFieldName($field)."_".$id;
	}
	$addnewitem = false;
	$advancedadd = false;
	$strCategoryControl = $pSet->getCategoryControl($field);
	$categoryFieldId = GoodFieldName($pSet->getCategoryControl($field));
	$bUseCategory = $pSet->useCategory($field);
	$dependentLookups = $pSet->getDependentLookups($field);
	
	
	$lookupType = $pSet->getLookupType($field);
	$lookupTable = $pSet->getLookupTable($field);
	$LCType = $pSet->lookupControlType($field);
	
	$displayFieldName = $pSet->getDisplayField($field);
	$linkFieldName = $pSet->getLinkField($field);
	$linkAndDisplaySame = $displayFieldName == $linkFieldName;
	if(is_null($pageObj))	
		$ciphererLink = new RunnerCipherer($strTableName, $pSet);
	else 
		$ciphererLink = $pageObj->cipherer;
	if($lookupType == LT_QUERY)
		$ciphererDisplay = new RunnerCipherer($lookupTable);
	else 
		$ciphererDisplay = $ciphererLink;
	$isLinkFieldEncrypted = $ciphererLink->isFieldPHPEncrypted($field);
	$isDisplayFieldEncrypted = ($lookupType == LT_QUERY || $linkAndDisplaySame) 
			&& $ciphererDisplay->isFieldPHPEncrypted($lookupType == LT_QUERY ? $displayFieldName : $field);
			
	$horizontalLookup = $pSet->isHorizontalLookup($field);
	$inputStyle = ($additionalCtrlParams['style'] ? 'style="'.$additionalCtrlParams['style'].'"' : '');
	if(is_null($pageObj))
		$strLookupWhere = GetLWWhere($field, $pSet->_editPage, $table);
	else
		$strLookupWhere = GetLWWhere($field, $pageObj->pageType, $table);

	$lookupSize = $pSet->selectSize($field);
	if($LCType == LCT_CBLIST)
		$lookupSize = 2; // simply > 1 for CBLIST
	
	$add_page = GetTableURL($lookupTable)."_add.php";
	$list_page = GetTableURL($lookupTable)."_list.php";

	$strPerm = GetUserPermissions($lookupTable);
//	alter "add on the fly" settings	
	if(strpos($strPerm,"A")!==false)
	{
		$addnewitem = $pSet->isAllowToAdd($field);
		$advancedadd = !$pSet->isSimpleAdd($field);
		if(!$advancedadd)
			$addnewitem = false;
	}
//	alter lookuptype settings
	if($LCType == LCT_LIST && strpos($strPerm,"S") === false)
		$LCType = LCT_DROPDOWN;
	if($LCType == LCT_LIST)
		$addnewitem = false;
	if($mode == MODE_SEARCH)
		$addnewitem = false;
//	prepare multi-select attributes
	$multiple = "";
	$postfix = "";
	if($lookupSize > 1)
	{
		$avalue = splitvalues($value);
		$multiple = " multiple";
		$postfix = "[]";
	}
	else 
		$avalue = array((string)$value);
		
//	prepare JS code

	$className = "DropDownLookup";
	if($LCType == LCT_AJAX)
		$className = "EditBoxLookup";
	elseif($LCType == LCT_LIST)
		$className = "ListPageLookup";
	elseif($LCType == LCT_CBLIST)
		$className = "CheckBoxLookup";

//	build the control
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//	list of values
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	if($lookupType == LT_LISTOFVALUES)
	{
//	read lookup values
		$arr = $pSet->getLookupValues($field);
//	print Type control to allow selecting nothing
		if($lookupSize > 1)
			echo "<input id=\"".$ctype."\" type=hidden name=\"".$ctype."\" value=\"multiselect\">";
//	dropdown control
		if($LCType == LCT_DROPDOWN)
		{
			$alt = "";
			echo '<select id="'.$cfield.'" size = "'.$lookupSize.'" '.$alt.'name="'.$cfield.$postfix.'" '.$multiple.'>';
			if($lookupSize<2 )
				echo '<option value="">'."Please select".'</option>';
			else if($mode==MODE_SEARCH)
				echo '<option value=""> </option>';
				
			foreach($arr as $opt)
			{
				$res=array_search((string)$opt,$avalue);
				if(!($res===NULL || $res===FALSE))
		      		echo '<option value="'.htmlspecialchars($opt).'" selected>'.htmlspecialchars($opt).'</option>';
				else
		      		echo '<option value="'.htmlspecialchars($opt).'">'.htmlspecialchars($opt).'</option>';
			}
			echo "</select>";
		}
		elseif($LCType == LCT_CBLIST)
		{
			echo '<div>';
			$spacer = '<br/>';
			if($horizontalLookup)
				$spacer = '&nbsp;';
			$i = 0;
			foreach($arr as $opt)
			{
				echo '<input id="'.$cfield.'_'.$i.'" type="checkbox" '.$alt.' name="'.$cfield.$postfix.'" value="'.htmlspecialchars($opt).'"';
				$res = array_search((string)$opt,$avalue);
				if(!($res === NULL || $res === FALSE))
					echo ' checked="checked" ';
				echo '/>';
				echo '&nbsp;<b id="data_'.$cfield.'_'.$i.'">'.htmlspecialchars($opt).'</b>'.$spacer;
				$i++;
			}
			echo '</div>';
		}
		return;
	}

// build table-based lookup

////////////////////////////////////////////////////////////////////////////////////////////
//	table-based ajax-lookup control
////////////////////////////////////////////////////////////////////////////////////////////
	if($LCType == LCT_AJAX || $LCType == LCT_LIST)
	{
////////////////////////////////////////////////////////////////////////////////////////////
//	dependent ajax-lookup control
////////////////////////////////////////////////////////////////////////////////////////////
		if($bUseCategory)
		{
// ajax	dependent dropdown
			// get parent value
			$celementvalue = "var parVal = ''; var parCtrl = Runner.controls.ControlManager.getAt('".jsreplace($strTableName)."', ".$id.", '".jsreplace($field)."', 0).parentCtrl; if (parCtrl){ parVal = parCtrl.getStringValue();};";
			if($LCType==LCT_AJAX)
				echo '<input type="text" categoryId="'.$categoryFieldId.'" autocomplete="off" id="'.$clookupfield.'" name="'.$clookupfield.'" '.$inputStyle.'>';
			elseif($LCType==LCT_LIST)
			{	
				echo '<input type="text" categoryId="'.$categoryFieldId.'" autocomplete="off" id="'.$clookupfield.'" name="'.$clookupfield.'"  readonly '.$inputStyle.'>';				
				echo "&nbsp;<a href=# id=".$openlookup.">"."Select"."</a>";				
			}
			echo '<input type="hidden" id="'.$cfield.'" name="'.$cfield.'">';
//	add new item link
			if($addnewitem)
				echo "&nbsp;<a href=# id='addnew_".$cfield."'>"."Add new"."</a>";
			return;
		}

////////////////////////////////////////////////////////////////////////////////////////////
//	regular ajax-lookup control
////////////////////////////////////////////////////////////////////////////////////////////
		
//	get the initial value
		$lookup_value = "";
		$lookupSQL = buildLookupSQL($ptype, $field, $table, "", $value, false, true, false, true);
		$lookupIndexes = GetLookupFieldsIndexes($pSet, $field);
		$rs_lookup = db_query($lookupSQL, $conn);	
		if ( $data = db_fetch_numarray($rs_lookup) )
		{
			if($isDisplayFieldEncrypted) 
				$lookup_value = $ciphererDisplay->DecryptField($lookupType == LT_QUERY ? $displayFieldName : $field, $data[$lookupIndexes["displayFieldIndex"]]);
			else
				$lookup_value = $data[$lookupIndexes["displayFieldIndex"]];
		}
		elseif(strlen($strLookupWhere))
		{
		// try w/o WHERE expression
			$lookupSQL = buildLookupSQL($ptype, $field, $table, "", $value, false, true, false, false);
			$rs_lookup = db_query($lookupSQL, $conn);			
			if($data = db_fetch_numarray($rs_lookup))
			{
				if($isDisplayFieldEncrypted)
					$lookup_value = $ciphererDisplay->DecryptField($lookupType == LT_QUERY ? $displayFieldName : $field, $data[$lookupIndexes["displayFieldIndex"]]);
				else
					$lookup_value = $data[$lookupIndexes["displayFieldIndex"]];
			}
		}
//	build the control
		if($LCType == LCT_AJAX)
		{
			if (!strlen($lookup_value) && $pSet->isfreeInput($field))
				$lookup_value = $value;
			
			echo '<input type="text" '.$inputStyle.' autocomplete="off" '.(($mode==MODE_INLINE_EDIT || $mode==MODE_INLINE_ADD) && $is508==true ? 'alt="'.$strLabel.'" ' : '').'id="'.$clookupfield.'" name="'.$clookupfield.'" value="'.htmlspecialchars($lookup_value).'">';
		}
		elseif($LCType == LCT_LIST)
		{
			echo '<input type="text" autocomplete="off" '.$inputStyle.' id="'.$clookupfield.'" '.(($mode==MODE_INLINE_EDIT || $mode==MODE_INLINE_ADD) && $is508==true ? 'alt="'.$strLabel.'" ' : '').'name="'.$clookupfield.'" value="'.htmlspecialchars($lookup_value).'" 	readonly >';			
			echo "&nbsp;<a href=# id=".$openlookup.">"."Select"."</a>";			
		}
		echo '<input type="hidden" id="'.$cfield.'" name="'.$cfield.'" value="'.htmlspecialchars($value).'">';
//	add new item
		if($addnewitem)
			echo "&nbsp;<a href=# id='addnew_".$cfield."'>"."Add new"."</a>";
		return;
	}
////////////////////////////////////////////////////////////////////////////////////////////
//	classic lookup - start
////////////////////////////////////////////////////////////////////////////////////////////
	
////////////////////////////////////////////////////////////////////////////////////////////
//	dependent classic lookup
////////////////////////////////////////////////////////////////////////////////////////////
	if($bUseCategory)
	{
		//	print Type control to allow selecting nothing
		if($lookupSize > 1)
			echo "<input id=\"".$ctype."\" type=hidden name=\"".$ctype."\" value=\"multiselect\">";
		echo '<select size = "'.$lookupSize.'" id="'.$cfield.'" name="'.$cfield.$postfix.'"'.$multiple.'>';
		echo '<option value="">'."Please select".'</option>';
		echo "</select>";
		if($addnewitem)
			echo "&nbsp;<a href=# id='addnew_".$cfield."'>"."Add new"."</a>";
		return;
	}
	
	$lookupSQL = buildLookupSQL($ptype, $field, $table, "", "", false, false, false);
	$rs = db_query($lookupSQL,$conn);
	
	$lookupIndexes = GetLookupFieldsIndexes($pSet, $field);
	$linkFieldIndex = $lookupIndexes["linkFieldIndex"];
	$displayFieldIndex = $lookupIndexes["displayFieldIndex"];
	
		
////////////////////////////////////////////////////////////////////////////////////////////
//	simple classic lookup
////////////////////////////////////////////////////////////////////////////////////////////
//	print control header
	if($lookupSize > 1)
		echo "<input id=\"".$ctype."\" type=hidden name=\"".$ctype."\" value=\"multiselect\">";
	if($LCType!=LCT_CBLIST)
	{
		echo '<select size = "'.$lookupSize.'" id="'.$cfield.'" '.(($mode == MODE_INLINE_EDIT || $mode==MODE_INLINE_ADD) && $is508==true 
			? 'alt="'.$strLabel.'" ' : '').'name="'.$cfield.$postfix.'"'.$multiple.'>';
		if($lookupSize<2)
			echo '<option value="">'."Please select".'</option>';
		else if($mode==MODE_SEARCH)
			echo '<option value=""> </option>';
	}
	else
	{
		echo '<div>';
		$spacer = '<br/>';
		if($horizontalLookup)
			$spacer = '&nbsp;';
	}
//	print lookup data
	$found = false;
	$i = 0;
	$lookupUnique = $pSet->isLookupUnique($field);
	while($data = db_fetch_numarray($rs))
	{
		if($lookupType == LT_QUERY && $lookupUnique){
			if(!isset($uniqueArray))
				$uniqueArray = array();
			if(in_array($data[$displayFieldIndex], $uniqueArray))
				continue;
			$uniqueArray[] = $data[$displayFieldIndex];
		}
		if($isLinkFieldEncrypted)
			$data[$linkFieldIndex] = $ciphererLink->DecryptField($field, $data[$linkFieldIndex]);
		if($isDisplayFieldEncrypted)
			$data[$displayFieldIndex] = $ciphererDisplay->DecryptField($lookupType == LT_QUERY ? $displayFieldName : $field, 
				$data[$displayFieldIndex]);
		$res = array_search((string)$data[$linkFieldIndex],$avalue);
		$checked = "";
		if(!($res === NULL || $res === FALSE))
		{
			$found = true;
			if($LCType == LCT_CBLIST)
				$checked = " checked=\"checked\"";
			else
				$checked = " selected";
		}
			
		if($LCType == LCT_CBLIST)
		{
			echo '<input id="'.$cfield.'_'.$i.'" type="checkbox" '.$alt.' name="'.$cfield.$postfix.'" value="'.htmlspecialchars($data[$linkFieldIndex]).'"'.$checked.'/>';
			echo '&nbsp;<b id="data_'.$cfield.'_'.$i.'">'.htmlspecialchars($data[$displayFieldIndex]).'</b>'.$spacer;
		}
		else
			echo '<option value="'.htmlspecialchars($data[$linkFieldIndex]).'"'.$checked.'>'.htmlspecialchars($data[$displayFieldIndex]).'</option>';
		$i++;
	}

//	try the same query w/o WHERE clause if current value not found
	if(!$found && strlen($value) && $mode==MODE_EDIT && strlen($strLookupWhere))
	{
		$lookupSQL = buildLookupSQL($ptype, $field,$table,"",$value,false,true,false,false,true);
		$lookupIndexes = GetLookupFieldsIndexes($pSet, $field);
		$linkFieldIndex = $lookupIndexes["linkFieldIndex"];
		$displayFieldIndex = $lookupIndexes["displayFieldIndex"];
		$rs=db_query($lookupSQL,$conn);
		if($data=db_fetch_numarray($rs))
		{
			if($isLinkFieldEncrypted)
				$data[$linkFieldIndex] = $ciphererLink->DecryptField($field, $data[$linkFieldIndex]);
			if($isDisplayFieldEncrypted)
				$data[$displayFieldIndex] = $ciphererDisplay->DecryptField($lookupType == LT_QUERY ? $displayFieldName : $field, 
					$data[$displayFieldIndex]);
			if($LCType==LCT_CBLIST)
			{
				echo '<input id="'.$cfield.'_'.$i.'" type="checkbox" '.$alt.' name="'.$cfield.$postfix.'" value="'.htmlspecialchars($data[$linkFieldIndex]).'" checked="checked"/>';
				echo '&nbsp;<b id="data_'.$cfield.'_'.$i.'">'.htmlspecialchars($data[$displayFieldIndex]).'</b>'.$spacer;
			}
			else
				echo '<option value="'.htmlspecialchars($data[$linkFieldIndex]).'" selected>'.htmlspecialchars($data[$displayFieldIndex]).'</option>';
		}
	}
//	print footer
	if($LCType!=LCT_CBLIST)
	{
		echo "</select>";
	}
	else
		echo '</div>';
//	add new item
	if($addnewitem)
		echo "&nbsp;<a href=# id='addnew_".$cfield."'>"."Add new"."</a>";

}

function BuildRadioControl($field, $value, $fieldNum = 0, $id = "", $mode, $ptype)
{
	global $conn, $strTableName;
	
	$pSet = new ProjectSettings($strTableName, $ptype);
	
	$is508=isEnableSection508();
	$strLabel=$pSet->label($field);
	$cfieldname=GoodFieldName($field)."_".$id;
	$cfield="value_".GoodFieldName($field)."_".$id;
	//$cfieldid="value_".GoodFieldName($field);
	$ctype="type_".GoodFieldName($field)."_".$id;
	
	if($fieldNum)
	{
		$cfield="value".$fieldNum."_".GoodFieldName($field)."_".$id;
		$ctype="type".$fieldNum."_".GoodFieldName($field)."_".$id;
	}
	$LookupSQL ="";
	$spacer = '<br/>';
	
	if($LookupSQL)
	{
		$lookupIndexes = GetLookupFieldsIndexes($pSet, $field);
		$linkFieldIndex = $lookupIndexes["linkFieldIndex"];
		$displayFieldIndex = $lookupIndexes["displayFieldIndex"];
		
		LogInfo($LookupSQL);
		$rs=db_query($LookupSQL,$conn);
		echo '<input id="'.$cfield.'" type=hidden name="'.$cfield.'" value="'.htmlspecialchars($value).'">';
		$i=0;
		while($data=db_fetch_numarray($rs))
		{
			if($LookupType == LT_QUERY && $pSet->isLookupUnique($field)){
				if(!isset($uniqueArray))
					$uniqueArray = array();
				if(in_array($data[$displayFieldIndex], $uniqueArray))
					continue;
				$uniqueArray[] = $data[$displayFieldIndex];
			}
			$checked="";
			if($data[$linkFieldIndex] == $value)
				$checked=" checked";
			echo "<input type=\"Radio\" id=\"radio_".$cfieldname."_".$i."\" ".(($mode==MODE_INLINE_EDIT || $mode==MODE_INLINE_ADD) 
				&& $is508==true ? "alt=\"".$strLabel."\" " : "")."name=\"radio_".$cfieldname."\" ".$checked." value=\""
				.htmlspecialchars($data[$linkFieldIndex])."\">".htmlspecialchars($data[$displayFieldIndex]).$spacer;
			$i++;
		}
	}
	else
	{
		echo '<input id="'.$cfield.'" type=hidden name="'.$cfield.'" value="'.htmlspecialchars($value).'">';
		$i=0;
		foreach($arr as $opt)
		{
			$checked="";
			if($opt==$value)
				$checked=" checked";
			echo "<input  type=\"Radio\" id=\"radio_".$cfieldname."_".$i."\" ".(($mode==MODE_INLINE_EDIT || $mode==MODE_INLINE_ADD) && $is508==true ? "alt=\"".$strLabel."\" " : "")."name=\"radio_".$cfieldname."\" ".$checked." value=\"".htmlspecialchars($opt)."\">".htmlspecialchars($opt).$spacer;
			$i++;
		}
	}
	return;

}
////////////////////////////////////////////////////////////////////////////////
/**
 * Get locale, am, pm for field edit as time
 * @param integer $convention - 24 or 12 hours format for timePicker
 * @param boolean $useTimePicker -  use timePicker or not
 * @return array
 */
function getLacaleAmPmForTimePicker($convention, $useTimePicker = false)
{
	$am = '';
	$pm = '';
	global $locale_info;
	if($useTimePicker)
	{
		$locale_convention = $locale_info["LOCALE_ITIME"] ? 24 : 12;
		if($convention == $locale_convention)
		{
			$am = $locale_info["LOCALE_S1159"];
			$pm = $locale_info["LOCALE_S2359"];
			$locale = $locale_info["LOCALE_STIMEFORMAT"];
		}
		else{
				if($convention == 24)
				{
					$am = '';
					$pm = '';
					$locale = "H:mm:ss";
				}
				else{
						$am = 'am';
						$pm = 'pm';
						$locale = "h:mm:ss tt";
					}
			}
	}
	else
		$locale = $locale_info["LOCALE_STIMEFORMAT"];
		
	return array('am'=>$am,'pm'=>$pm,'locale'=>$locale);	
}

/**
 * Get value for field edit as time and get dpTime settings
 * @param integer $convention - 24 or 12 hours format for timePicker
 * @param string $type - type of field
 * @param string $value - value of field
 * @param boolean $useTimePicker -  use timePicker or not
 * @return array
 */
function getValForTimePicker($type,$value,$locale)
{
	$val = "";
	$dbtime = array();
	if(IsDateFieldType($type))
	{
		$dbtime = db2time($value);
		if(count($dbtime))
			$val = format_datetime_custom($dbtime, $locale);
	}
	else 
	{
		$arr = parsenumbers($value);
		if(count($arr))
		{
			while(count($arr)<3)
				$arr[] = 0;
			$dbtime = array(0, 0, 0, $arr[0], $arr[1], $arr[2]);
			$val = format_datetime_custom($dbtime, $locale);
		}
	}
	
	return array('val'=>$val,'dbTime'=>$dbtime);
}
////////////////////////////////////////////////////////////////////////////////
 
function BuildEditControl($field ,$value, $format, $mode, $ptype, $fieldNum = 0, $id = "",$validate, $additionalCtrlParams, &$pageObj)
{
	global $rs, $data, $strTableName, $filenamelist, $keys, $locale_info, $jscode, $isUseRTEBasic, $isUseRTECK, $isUseRTEInnova;
	
	$pSet = new ProjectSettings($strTableName, $ptype);
	
	if(!$format)
		$format = $pSet->getEditFormat($field);
		
	$inputStyle = 'style="';
	$inputStyle .= ($additionalCtrlParams['style'] ? $additionalCtrlParams['style'] : '');
	$inputStyle .= '"';
	
	$cfieldname = GoodFieldName($field)."_".$id;
	$cfield = "value_".GoodFieldName($field)."_".$id;
	$ctype = "type_".GoodFieldName($field)."_".$id;
	$is508 = isEnableSection508();

	$strLabel=$pSet->label($field);
	if($fieldNum)
	{
		$cfield="value".$fieldNum."_".GoodFieldName($field)."_".$id;
		$ctype="type".$fieldNum."_".GoodFieldName($field)."_".$id;
	}
	$type = $pSet->getFieldType($field);
	$arr = "";
	$iquery = "field=".rawurlencode($field);
	$keylink = "";

	$arrKeys = $pSet->getTableKeys();
	for ( $j=0; $j < count($arrKeys); $j++ ) 
	{
		$keylink.="&key" . ($j+1) . "=".rawurlencode($data[$arrKeys[$j]]);
	}
	$iquery.=$keylink;
	
	$isHidden = (isset($additionalCtrlParams['hidden']) && $additionalCtrlParams['hidden']);
	echo '<span id="edit'.$id.'_'.GoodFieldName($field).'_'.$fieldNum.'" class="runner-nowrap"'.($isHidden ? ' style="display:none"' : '').'>';
	if($format == EDIT_FORMAT_FILE && $mode == MODE_SEARCH)
		$format = "";
	if($format == EDIT_FORMAT_TEXT_FIELD)
	{
		if(IsDateFieldType($type))
		{
			echo '<input id="'.$ctype.'" type="hidden" name="'.$ctype.'" value="date'.EDIT_DATE_SIMPLE.'">'.GetDateEdit($ptype, $field, $value, 0, $fieldNum, $mode, $id, $pageObj);
		}
		else
		{
			if($mode == MODE_SEARCH)
				echo '<input id="'.$cfield.'" '.$inputStyle.' type="text" autocomplete="off" '. (($mode==MODE_INLINE_EDIT || $mode==MODE_INLINE_ADD) && $is508==true ? 'alt="'.$strLabel.'" ' : '') . 'name="'.$cfield.'" '.$pSet->getEditParams($field).' value="'.htmlspecialchars($value).'">';				
			else
				echo '<input id="'.$cfield.'" '.$inputStyle.' type="text" '.(($mode==MODE_INLINE_EDIT || $mode==MODE_INLINE_ADD) && $is508==true ? 'alt="'.$strLabel.'" ' : '').'name="'.$cfield.'" '.$pSet->getEditParams($field).' value="'.htmlspecialchars($value).'">';
			
		}
	}
	else if($format == EDIT_FORMAT_TIME)
	{
		echo '<input id="'.$ctype.'" '.$inputStyle.' type="hidden" name="'.$ctype.'" value="time">';
		$arr_number=parsenumbers((string)$value);
		if(count($arr_number) == 6)
		{
			$value = mysprintf("%d:%02d:%02d",array($arr_number[3],$arr_number[4],$arr_number[5]));
		}
		$timeAttrs = $pSet->getFormatTimeAttrs($field);	
		if(count($timeAttrs))
		{
			if($timeAttrs["useTimePicker"])
			{
				$convention = $timeAttrs["hours"];
				$loc = getLacaleAmPmForTimePicker($convention, true);
				$tpVal = getValForTimePicker($type,$value,$loc['locale']);
				echo '<input type="text" '.$inputStyle.' name="'.$cfield.'" '.(($mode==MODE_INLINE_EDIT || $mode==MODE_INLINE_ADD) && $is508==true ? 'alt="'.$strLabel.'" ' : '').'id="'.$cfield.'" '.$pSet->getEditParams($field).' value="'.htmlspecialchars($tpVal['val']).'">';
				echo '&nbsp;';
				echo '<img class="runner-imgclock" src="images/clock.gif" alt="Time" border="0" style="margin:4px 0 0 6px; visibility: hidden;" id="trigger-test-'.$cfield.'" />';
			}	
			else
				echo '<input id="'.$cfield.'" '.$inputStyle.' type="text" '.(($mode==MODE_INLINE_EDIT || $mode==MODE_INLINE_ADD) && $is508==true ? 'alt="'.$strLabel.'" ' : '').'name="'.$cfield.'" '.$pSet->getEditParams($field).' value="'.htmlspecialchars($value).'">';
		}
	}
	else if($format==EDIT_FORMAT_TEXT_AREA)
	{
		$nWidth = $pSet->getNCols($field);
		$nHeight = $pSet->getNRows($field);
		if($pSet->isUseRTE($field))
		{
			$value = RTESafe($value);
						// creating src url
			$browser = "";
			if(@$_REQUEST["browser"]=="ie")
				$browser = "&browser=ie";
				
			// add JS code
			echo "<iframe frameborder=\"0\" vspace=\"0\" hspace=\"0\" marginwidth=\"0\" marginheight=\"0\" scrolling=\"no\" id=\"".$cfield."\" ".(($mode==MODE_INLINE_EDIT || $mode==MODE_INLINE_ADD) && $is508==true ? "alt=\"".$strLabel."\" " : "")."name=\"".$cfield."\" title=\"Basic rich text editor\" style='";
			if (!isMobile())
				echo "width: " . ($nWidth+1) . "px;";
			echo "height: " . ($nHeight+100) . "px;'";
			echo " src=\"rte.php?ptype=".$ptype."&table=".GetTableURL($strTableName)."&"."id=".$id."&".$iquery.$browser."&".($mode==MODE_ADD || $mode==MODE_INLINE_ADD ? "action=add" : '')."\">";  
			echo "</iframe>";
		}
		else{
				
				echo '<textarea id="'.$cfield.'" '.(($mode==MODE_INLINE_EDIT || $mode==MODE_INLINE_ADD) && $is508==true ? 'alt="'.$strLabel.'" ' : '').'name="'.$cfield.'" style="';
				if (!isMobile())
					echo "width: " . ($nWidth) . "px;";
				echo 'height: ' . $nHeight . 'px;">'.htmlspecialchars($value).'</textarea>';
			}
	}
	else if($format==EDIT_FORMAT_PASSWORD)
	{
		echo '<input '.$inputStyle.' id="'.$cfield.'" type="Password" '.(($mode==MODE_INLINE_EDIT || $mode==MODE_INLINE_ADD) && $is508==true ? 'alt="'.$strLabel.'" ' : '').'name="'.$cfield.'" '.$pSet->getEditParams($field).' value="'.htmlspecialchars($value).'">';
		
	}
	else if($format==EDIT_FORMAT_DATE)
	{
		echo '<input id="'.$ctype.'" type="hidden" name="'.$ctype.'" value="date'.$pSet->getDateEditType($field).'">'.GetDateEdit($ptype, $field, $value, $pSet->getDateEditType($field), $fieldNum, $mode, $id, $pageObj);
	}
	else if($format==EDIT_FORMAT_RADIO)
	{
		BuildRadioControl($field, $value, $fieldNum, $id, $mode, $ptype);
	}
	else if($format==EDIT_FORMAT_CHECKBOX)
	{
		if($mode==MODE_ADD || $mode==MODE_INLINE_ADD || $mode==MODE_EDIT || $mode==MODE_INLINE_EDIT) 
		{
			$checked="";
			if($value && $value!=0)
				$checked=" checked";
			echo '<input id="'.$ctype.'" type="hidden" name="'.$ctype.'" value="checkbox">';
			echo '<input id="'.$cfield.'" type="Checkbox" '.(($mode==MODE_INLINE_EDIT || $mode==MODE_INLINE_ADD) && $is508==true ? 'alt="'.$strLabel.'" ' : '').'name="'.$cfield.'" '.$checked.'>';
		}
		else
		{
			echo '<input id="'.$ctype.'" type="hidden" name="'.$ctype.'" value="checkbox">';
			echo '<select id="'.$cfield.'" '.(($mode==MODE_INLINE_EDIT || $mode==MODE_INLINE_ADD) && $is508==true ? 'alt="'.$strLabel.'" ' : '').'name="'.$cfield.'">';
			$val=array("","on","off");
			$show=array("","True","False");
			foreach($val as $i=>$v)
			{
				$sel="";
				if($value===$v)
					$sel=" selected";
				echo '<option value="'.$v.'"'.$sel.'>'.$show[$i].'</option>';
			}
			echo "</select>";
			
		}
	}
	else if($format==EDIT_FORMAT_DATABASE_IMAGE || $format==EDIT_FORMAT_DATABASE_FILE)
	{
		$disp = "";
		$strfilename = "";
		if($mode == MODE_EDIT || $mode == MODE_INLINE_EDIT)
		{
			$value = db_stripslashesbinary($value);
			$itype = SupposeImageType($value);
			$thumbfield = "";

			if($itype)
			{
				if($pSet->showThumbnail($field))
				{
					$thumbfield = $pSet->getStrThumbnail($field);
					$disp = "<a ";
					
					if($pSet->isUseiBox($field))
						$disp.= " rel='ibox'";
					else
						$disp.= " target=_blank";
						
					$disp.=" href=\"imager.php?table=".GetTableURL($strTableName)."&".$iquery."&rndVal=".rand(0,32768)."\">";
					$disp.= "<img id=\"image_".GoodFieldName($field)."_".$id."\" name=\"".$cfield."\" border=0";
					if(isEnableSection508())
						$disp.= " alt=\"Image from DB\"";
					$disp.=" src=\"imager.php?table=".GetTableURL($strTableName)."&field=".rawurlencode($thumbfield)."&alt=".rawurlencode($field).$keylink."&rndVal=".rand(0,32768)."\">";
					$disp.= "</a>";
				}
				else
				{
					$disp='<img id="image_'.GoodFieldName($field).'_'.$id.'" name="'.$cfield.'"';
					if(isEnableSection508())
						$disp.= ' alt="Image from DB"';
					$disp.=' border=0 src="imager.php?table='.GetTableURL($strTableName).'&'.$iquery."&rndVal=".rand(0,32768).'">';
				}	
			}
			else
			{
				if(strlen($value))
				{
					$disp='<img id="image_'.GoodFieldName($field).'_'.$id.'" name="'.$cfield.'" border=0 ';
					if(isEnableSection508())
						$disp.= ' alt="file"';
					$disp.=' src="images/file.gif">';
				}
				else
				{
					$disp='<img id="image_'.GoodFieldName($field).'_'.$id.'" name="'.$cfield.'" border="0"';
					if(isEnableSection508())
						$disp.= ' alt=" "';
					$disp.=' src="images/no_image.gif">';
				}
			}
//	filename
			if($format==EDIT_FORMAT_DATABASE_FILE && !$itype && strlen($value))
			{
				if(!($filename=@$data[$pSet->getFilenameField($field)]))
					$filename="file.bin";
				$disp='<a href="getfile.php?table='.GetTableURL($strTableName).'&filename='.htmlspecialchars($filename).'&'.$iquery.'".>'.$disp.'</a>';
			}
//	filename edit
			if($format==EDIT_FORMAT_DATABASE_FILE && $pSet->getFilenameField($field))
			{
				if(!($filename=@$data[$pSet->getFilenameField($field)]))
					$filename = "";
				if($mode == MODE_INLINE_EDIT)
				{
					$strfilename='<br><label for="filename_'.$cfieldname.'">'."Filename".'</label>&nbsp;&nbsp;<input type="text" '.$inputStyle.' id="filename_'.$cfieldname.'" name="filename_'.$cfieldname.'" size="20" maxlength="50" value="'.htmlspecialchars($filename).'">';					
				}
				else
				{
					$strfilename='<br><label for="filename_'.$cfieldname.'">'."Filename".'</label>&nbsp;&nbsp;<input type="text" '.$inputStyle.' id="filename_'.$cfieldname.'" name="filename_'.$cfieldname.'" size="20" maxlength="50" value="'.htmlspecialchars($filename).'">';					
				}
			}
			$strtype='<br><input id="'.$ctype.'_keep" type="Radio" name="'.$ctype.'" value="file0" checked>'."Keep";
			
			if(strlen($value) && !$pSet->isRequired($field))
			{
				$strtype.='<input id="'.$ctype.'_delete" type="Radio" name="'.$ctype.'" value="file1">'."Delete";
			}
			$strtype.='<input id="'.$ctype.'_update" type="Radio" name="'.$ctype.'" value="file2">'."Update";
		}
		else
		{
//	if Add mode
			$strtype='<input id="'.$ctype.'" type="hidden" name="'.$ctype.'" value="file2">';
			if($format==EDIT_FORMAT_DATABASE_FILE && $pSet->getFilenameField($field))
			{
				$strfilename='<br><label for="filename_'.$cfieldname.'">'."Filename".'</label>&nbsp;&nbsp;<input type="text" '.$inputStyle.' id="filename_'.$cfieldname.'" name="filename_'.$cfieldname.'" size="20" maxlength="50">';			
			}
		}
		
		if($mode==MODE_INLINE_EDIT && $format==EDIT_FORMAT_DATABASE_FILE)
			$disp="";
		echo $disp.$strtype;
		if ($mode==MODE_EDIT || $mode==MODE_INLINE_EDIT)
		{
			echo '<br>';
		}
		echo '<input type="File" '.$inputStyle.' id="'.$cfield.'" '.(($mode==MODE_INLINE_EDIT || $mode==MODE_INLINE_ADD) && $is508==true ? 'alt="'.$strLabel.'" ' : '').' name="'.$cfield.'" >'.$strfilename;
		echo '<input type="Hidden" id="notempty_'.$cfieldname.'" value="'.(strlen($value) ? 1 : 0).'">';
	}
	else if($format==EDIT_FORMAT_LOOKUP_WIZARD)
			BuildSelectControl($field, $value, $fieldNum, $mode,$id, $additionalCtrlParams, $pageObj, $ptype);
	else if($format==EDIT_FORMAT_HIDDEN)
			echo '<input id="'.$cfield.'" type="Hidden" name="'.$cfield.'" value="'.htmlspecialchars($value).'">';
	else if($format==EDIT_FORMAT_READONLY)
	{
		if(($mode==MODE_EDIT || $mode==MODE_ADD || $mode==MODE_INLINE_EDIT || $mode==MODE_INLINE_ADD) && $format==EDIT_FORMAT_READONLY)
		{
			global $readonlyfields;
			echo '<span id="readonly_'.$cfield.'">'.$readonlyfields[$field].'</span>';
		}
		echo '<input id="'.$cfield.'" type="Hidden" name="'.$cfield.'" value="'.htmlspecialchars($value).'">';
	
	}
	else if($format==EDIT_FORMAT_FILE)
	{
		$disp = "";
		$strfilename = "";
		$function = "";
		if($mode == MODE_EDIT || $mode == MODE_INLINE_EDIT)
		{
//	show current file
			if($pSet->getViewFormat($field) == FORMAT_FILE || $pSet->getViewFormat($field) == FORMAT_FILE_IMAGE)
			{
				$disp = GetData($data, $field, $pSet->getViewFormat($field), $ptype)."<br>";
			}
			$filename = $value;
//	filename edit
			$filename_size = 30;
			if($pSet->isUseTimestamp($field))
				$filename_size = 50;
			$strfilename = '<input type=hidden name="filenameHidden_'.$cfieldname.'" value="'.htmlspecialchars($filename).'"><br>'."Filename".'&nbsp;&nbsp;<input type="text" style="background-color:gainsboro" disabled id="filename_'.$cfieldname.'" name="filename_'.$cfieldname.'" size="'.$filename_size.'" maxlength="100" value="'.htmlspecialchars($filename).'">';
			if ( $mode==MODE_INLINE_EDIT ) {
				$strtype='<br><input id="'.$ctype.'_keep" type="Radio" name="'.$ctype.'" value="upload0" checked class="runner-uploadtype">'."Keep";
			} else {
				$strtype='<br><input id="'.$ctype.'_keep" type="Radio" name="'.$ctype.'" value="upload0" checked class="runner-uploadtype">'."Keep";
			}
			
			if((strlen($value) || $mode==MODE_INLINE_EDIT) && !$pSet->isRequired($field))
			{
				$strtype.='<input id="'.$ctype.'_delete" type="Radio" name="'.$ctype.'" value="upload1" class="runner-uploadtype">'."Delete";
			}
			$strtype.='<input id="'.$ctype.'_update" type="Radio" name="'.$ctype.'" value="upload2" class="runner-uploadtype">'."Update";
		}
		else
		{
//	if Adding record
			$filename_size=30;
			if($pSet->isUseTimestamp($field))
				$filename_size=50;
			$strtype='<input id="'.$ctype.'" type="hidden" name="'.$ctype.'" value="upload2">';
			$strfilename='<br>'."Filename".'&nbsp;&nbsp;<input type="text" id="filename_'.$cfieldname.'" name="filename_'.$cfieldname.'" size="'.$filename_size.'" maxlength="100">';			
		}
		echo $disp.$strtype.$function;
		
		if ($mode==MODE_EDIT || $mode==MODE_INLINE_EDIT)
		{
			echo '<br>';
		}
		
		echo '<input type="File" id="'.$cfield.'" '.(($mode==MODE_INLINE_EDIT || $mode==MODE_INLINE_ADD) && $is508==true ? 'alt="'.$strLabel.'" ' : '').' name="'.$cfield.'" >'.$strfilename;
		echo '<input type="Hidden" id="notempty_'.$cfieldname.'" value="'.(strlen($value)? 1 : 0).'">';
	}
	if(count($validate['basicValidate']) && array_search('IsRequired', $validate['basicValidate'])!==false)
		echo'&nbsp;<font color="red">*</font></span>';
	else
		echo '</span>';
}
function my_stripos($str,$needle, $offest)
{
	if (strlen($needle)==0 || strlen($str)==0)
		return false;
	return strpos(strtolower($str),strtolower($needle), $offest);
} 

function my_str_ireplace($search, $replace,$str)
{
	$pos=my_stripos($str,$search,0);
	if($pos===false)
		return $str;
	return substr($str,0,$pos).$replace.substr($str,$pos+strlen($search));
} 


function in_assoc_array($name, $arr)
{
foreach ($arr as $key => $value) 
	if ($key==$name)
		return true;

return false;
}

function buildLookupSQL($pageType, $field, $table, $parentVal, $childVal = "", $doCategoryFilter = true, $doValueFilter = false, $addCategoryField = false, $doWhereFilter = true, $oneRecordMode = false)
{
	global $strTableName;
	
	if(!strlen($table))
		$table=$strTableName;
	$pSet = new ProjectSettings($table, $pageType);
//	read settings
	$nLookupType = $pSet->getLookupType($field);
	if($nLookupType != LT_LOOKUPTABLE && $nLookupType != LT_QUERY)
		return "";
	
	$lookupTable = $pSet->getLookupTable($field);
	$displayFieldName = $pSet->getDisplayField($field);
	$linkFieldName = $pSet->getLinkField($field);
	$linkAndDisplaySame = $displayFieldName == $linkFieldName;
	
	$bUnique = $pSet->isLookupUnique($field);
	$strLookupWhere = GetLWWhere($field, $pageType, $table);
	$strOrderBy = $pSet->getLookupOrderBy($field);
	if(strlen($strOrderBy))
	{
		$strOrderBy = AddFieldWrappers($strOrderBy);
		if($pSet->isLookupDesc($field))
			$strOrderBy .= ' DESC';
	}
	$bDesc = $pSet->isLookupDesc($field);
	$strCategoryFilter = $pSet->getCategoryFilter($field);
	$cipherer = new RunnerCipherer($table);
	
	if($nLookupType == LT_QUERY)
	{
		$lookupPSet = new ProjectSettings($lookupTable, $pageType);
		$secOpt = $lookupPSet->getAdvancedSecurityType();
		if($secOpt == ADVSECURITY_VIEW_OWN)
			$strLookupWhere = whereAdd($strLookupWhere, SecuritySQL("Search", $lookupTable));
	}
	if($doCategoryFilter)
	{
		if($nLookupType == LT_QUERY)
			$parentVal = $cipherer->MakeDBValue($pSet->getCategoryControl($field), $parentVal, "", $lookupTable);
		else
			$parentVal = make_db_value($strCategoryFilter, $parentVal, '', '', $lookupTable);
	}
		
	if($doValueFilter)
	{
		if($nLookupType == LT_QUERY)
			$childVal = $cipherer->MakeDBValue($pSet->getLWLinkField($field, false), $childVal, "", $lookupTable);
		else
			$childVal = make_db_value($pSet->getLWLinkField($field, true), $childVal, '', '', $lookupTable);
	}
		
	//	build Where clause
	
	$categoryWhere = "";
	$childWhere = "";
	if($pSet->useCategory($field) && $doCategoryFilter)
	{
		$condition = "=".$parentVal;
		if($childVal === "null")
			$condition = " is null";
		$categoryWhere = AddFieldWrappers($strCategoryFilter).$condition;
	}
	if($doValueFilter)
	{
		$condition = "=".$childVal;
		if($childVal === "null")
			$condition = " is null";
		if($nLookupType == LT_QUERY)
			$childWhere = $cipherer->GetFieldName($lookupPSet->getFullNameField($linkFieldName), $field).$condition;
		else 
			$childWhere = $pSet->getLWLinkField($field, true).$condition;
			
	}
	$strWhere = "";
	if($doWhereFilter && strlen($strLookupWhere))
		$strWhere = "(".$strLookupWhere.")";
		
	if(strlen($categoryWhere))
	{
		if(strlen($strWhere))
			$strWhere.=" AND ";
		$strWhere.=$categoryWhere;
	}
	if(strlen($childWhere))
	{
		if(strlen($strWhere))
			$strWhere.=" AND ";
		$strWhere.=$childWhere;
	}
			
//	build SQL string	
	if($nLookupType == LT_QUERY){
		$lookupQueryObj = $lookupPSet->getSQLQuery();
		
		if($pSet->getCustomDisplay($field))
			$lookupQueryObj->AddCustomExpression($displayFieldName, $lookupPSet, $table, $field);
		
		$lookupQueryObj->ReplaceFieldsWithDummies($lookupPSet->getBinaryFieldsIndices());
		$strWhere = whereAdd($lookupQueryObj->m_where->toSql($lookupQueryObj), $strWhere);
		$LookupSQL = $lookupQueryObj->toSql($strWhere, strlen($strOrderBy) ? ' ORDER BY '.$strOrderBy : null, null, $oneRecordMode);
	}else{		
		$LookupSQL = "SELECT ";
				if($bUnique)
			$LookupSQL .= "DISTINCT ";
		$LookupSQL .= $pSet->getLWLinkField($field);
		if(!$linkAndDisplaySame){
			$LookupSQL .= ",".$pSet->getLWDisplayField($field);
		}
		if($addCategoryField && strlen($strCategoryFilter))
			$LookupSQL .= ",".AddFieldWrappers($strCategoryFilter);
		
		$LookupSQL .= " FROM ".AddTableWrappers($lookupTable);
	
		if(strlen($strWhere))
			$LookupSQL.=" WHERE ".$strWhere;
		//	order by clause
		if(strlen($strOrderBy))
		{
			$LookupSQL.= " ORDER BY ".AddTableWrappers($lookupTable).".".$strOrderBy;
		}
				if($oneRecordMode)
			$LookupSQL.=" limit 0,1";
					}
	return $LookupSQL;
}

function loadSelectContent($pageType, $childFieldName, $parentVal, $doCategoryFilter=true, $childVal="", $initialLoad = true)
{
	global $conn, $LookupSQL, $strTableName;

	$pSet = new ProjectSettings($strTableName, $pageType);
	
	$response = array();
	
	$lookupType = $pSet->getLookupType($childFieldName);
	$isUnique = $pSet->isLookupUnique($childFieldName);
	
	if($pSet->useCategory($childFieldName) && $doCategoryFilter)
	{
		if($lookupType == LT_QUERY)
		{
			$lookupTable = $pSet->getLookupTable($childFieldName);
			$cipherer = new RunnerCipherer($lookupTable);
			$tempParentVal = $cipherer->MakeDBValue($pSet->getCategoryControl($childFieldName), $parentVal, "", $lookupTable);
		}
		else
			$tempParentVal = make_db_value($childFieldName, $parentVal);
		if($tempParentVal === "null")
			return $response;
	}
	
	$LookupSQL = buildLookupSQL($pageType, $childFieldName, $strTableName, $parentVal, $childVal, $doCategoryFilter
		, $pSet->fastType($childFieldName) && $initialLoad);

	$lookupIndexes = GetLookupFieldsIndexes($pSet, $childFieldName);
		
	$rs=db_query($LookupSQL,$conn);

	if(!$pSet->fastType($childFieldName))
	{
		while ($data = db_fetch_numarray($rs)) 
		{
			if($lookupType == LT_QUERY && $isUnique){
				if(!isset($uniqueArray))
					$uniqueArray = array();
				if(in_array($data[$lookupIndexes["displayFieldIndex"]], $uniqueArray))
					continue;
				$uniqueArray[] = $data[$lookupIndexes["displayFieldIndex"]];
			}
			$response[] = $data[$lookupIndexes["linkFieldIndex"]];
			$response[] = $data[$lookupIndexes["displayFieldIndex"]];
		}
	}
	else
	{
		$data=db_fetch_numarray($rs);
//	one record only
		if($data && (strlen($childVal) || !db_fetch_numarray($rs)))
		{
			$response[] = $data[$lookupIndexes["linkFieldIndex"]];
			$response[] = $data[$lookupIndexes["displayFieldIndex"]];
		}
	}
	return $response;
}


function xmlencode($str)
{

	$str = str_replace("&","&amp;",$str);
	$str = str_replace("<","&lt;",$str);
	$str = str_replace(">","&gt;",$str);
	$str = str_replace("'","&apos;",$str);
	return escapeEntities($str);

}

function print_inline_array(&$arr,$printkey=false)
{
	if(!$printkey)
	{
		foreach ( $arr as $key=>$val )
			echo str_replace(array("&","<","\\","\r","\n"),array("&amp;","&lt;","\\\\","\\r","\\n"),str_replace(array("\\","\r","\n"),array("\\\\","\\r","\\n"),$val))."\\n";
	}
	else
	{
		foreach( $arr as $key=>$val )
			echo str_replace(array("&","<","\\","\r","\n"),array("&amp;","&lt;","\\\\","\\r","\\n"),str_replace(array("\\","\r","\n"),array("\\\\","\\r","\\n"),$key))."\\n";
	}
		
}


function GetChartXML($chartname)
{
	$strTableName = GetTableByShort($chartname);	
	$settings = new ProjectSettings($strTableName);
	return $settings->getChartXml();
}


function GetSiteUrl()
{
	$url = "http://".$_SERVER["SERVER_NAME"];
	if($_SERVER["SERVER_PORT"]!=80)
	{
		if ($_SERVER["SERVER_PORT"]==443)
		   $url = "https://".$_SERVER["SERVER_NAME"];
		else
		   $url.=":".$_SERVER["SERVER_PORT"];
	}
	return $url;
}

function GetAuditObject($table="")
{
	
	$linkAudit = false;
	if(!$table)
	{
		$linkAudit = true;
	}
	else
	{
		$settings = new ProjectSettings($table);
		$linkAudit = $settings->auditEnabled();
	}
	if ($linkAudit)
	{	
		require_once(getabspath("include/audit.php"));
				return new AuditTrailTable();
	}
	else
	{
		return NULL;
	}
}
function GetLockingObject($table="")
{

	if(!$table)
	{
		global $strTableName;
		$table = $strTableName;
	}
	$settings = new ProjectSettings($table);
	if ($settings->lockingEnabled())
	{	
		require_once(getabspath("include/locking.php"));
		return new oLocking();
	}
	else
	{
		return NULL;
	}
}

function isEnableSection508()
{
	return GetGlobalData("isSection508",false);
}

function isEncryptionEnabled(){
	return GetGlobalData("isUseEncryption", ENCRYPTION_NONE) == ENCRYPTION_PHP 
		|| GetGlobalData("isUseEncryption", ENCRYPTION_NONE) == ENCRYPTION_DB;
}

function isEncryptionByPHPEnabled(){
	return GetGlobalData("isUseEncryption", ENCRYPTION_NONE) == ENCRYPTION_PHP;
}
/**
 * Returns validation type which defined in js validation object.
 * Use this function, because runner constants has another names of validation functions
 *
 * @param string $name
 * @return string
 */
function getJsValidatorName($name) 
{	
	switch ($name) 
	{
		case "Number":
			return "IsNumeric";
			break;
		case "Password":
			return "IsPassword";
			break;
		case "Email":
			return "IsEmail";
			break;
		case "Currency":
			return "IsMoney";
			break;
		case "US ZIP Code":
			return "IsZipCode";
			break;
		case "US Phone Number":
			return "IsPhoneNumber";
			break;
		case "US State":
			return "IsState";
			break;
		case "US SSN":
			return "IsSSN";
			break;
		case "Credit Card":
			return "IsCC";
			break;
		case "Time":
			return "IsTime";
			break;
		case "Regular expression":
			return "RegExp";
			break;						
		default:
			return $name;
			break;
	}
}

function GetInputElementId($field, $id, $ptype)
{
	global $strTableName;
	$pSet = new ProjectSettings($strTableName, $ptype);
	$format = $pSet->getEditFormat($field);
	if($format == EDIT_FORMAT_DATE)
	{
		$type = $pSet->getDateEditType($field);
		if($type==EDIT_DATE_DD || $type==EDIT_DATE_DD_DP)
			return "dayvalue_".GoodFieldName($field)."_".$id;
		else
			return "value_".GoodFieldName($field)."_".$id;
	}
	else if($format==EDIT_FORMAT_RADIO)
		return "radio_".GoodFieldName($field)."_".$id."_0";
	else if($format==EDIT_FORMAT_LOOKUP_WIZARD)	
	{
		$lookuptype=$pSet->LookupControlType($field);
		if($lookuptype==LCT_AJAX || $lookuptype==LCT_LIST)
			return "display_value_".GoodFieldName($field)."_".$id;
		else
			return "value_".GoodFieldName($field)."_".$id;
	}	
	else
		return "value_".GoodFieldName($field)."_".$id;		
}

function SetLangVars($links)
{
	global $xt;
	$xt->assign("lang_label",true);
	if(@$_REQUEST["language"])
		$_SESSION["language"]=@$_REQUEST["language"];

	$var=GoodFieldName(mlang_getcurrentlang())."_langattrs";
	$xt->assign($var,"selected");
	$is508=isEnableSection508();
	if($is508)
		$xt->assign_section("lang_label","<label for=\"lang\">","</label>");
	$xt->assign("langselector_attrs","name=lang ".($is508==true ? "id=\"lang\" " : "")."onchange=\"javascript: window.location='".$links.".php?language='+this.options[this.selectedIndex].value\"");
}

function GetTableCaption($table)
{
	global $tableCaptions;
	return @$tableCaptions[mlang_getcurrentlang()][$table];
}

function GetFieldByLabel($table="", $label) 
{
	global $field_labels, $strTableName;
	if (!$table)
	{
		$table = $strTableName;
	}
	
	if(!array_key_exists($table,$field_labels))
		return "";
	$currLang = mlang_getcurrentlang();
	if(!array_key_exists($currLang,$field_labels[$table]))
		return "";	
	$lables = $field_labels[$table][mlang_getcurrentlang()];
	foreach ($lables as $key=>$val)
	{
		if ($val == $label)
		{
			return $key;
		}
	}
	return '';
}

function GetFieldLabel($table,$field)
{
	global $field_labels;
	if(!array_key_exists($table,$field_labels))
		return "";
	return @$field_labels[$table][mlang_getcurrentlang()][$field];
}

function GetFieldToolTip($table, $field)
{
	global $fieldToolTips;
	if(!array_key_exists($table, $fieldToolTips))
		return "";
	return @$fieldToolTips[$table][mlang_getcurrentlang()][$field];
}

function GetCustomLabel($custom)
{
	global $custom_labels;
	return @$custom_labels[mlang_getcurrentlang()][$custom];
}

function mlang_getcurrentlang()
{
	global $mlang_messages,$mlang_defaultlang;
	if(@$_REQUEST["language"])
		$_SESSION["language"]=@$_REQUEST["language"];
	if(@$_SESSION["language"])
		return $_SESSION["language"];
	return $mlang_defaultlang;
}

function mlang_getlanglist()
{
	global $mlang_messages,$mlang_defaultlang;
	return array_keys($mlang_messages);
}

function displayDetailsOn($table,$page)
{
	global $detailsTablesData;
	if(!isset($detailsTablesData[$table]) && !is_array($detailsTablesData[$table]))
		return false;
	if($page == PAGE_EDIT)
		$key="previewOnEdit";
	elseif($page == PAGE_ADD)
		$key="previewOnAdd";
	elseif($page == PAGE_VIEW)
		$key="previewOnView";
	else
		$key="previewOnList";
	for($i=0;$i<count($detailsTablesData[$table]);$i++)
	{
		if($detailsTablesData[$table][$i][$key])
			return true;
	}
	return false;
}

function showDetailTable($params)
{
	global $strTableName;
	$oldTableName = $strTableName;
	$strTableName = $params["table"];
	// show page
	if($params["dpObject"]->isDispGrid())
		$params["dpObject"]->showPage();	
	$strTableName = $oldTableName;
}

//	update record on Edit page

function DoUpdateRecordSQL($table,&$evalues,&$blobfields,$strWhereClause, $pageid, &$pageObject, &$cipherer)
{
	global $error_happened,$conn,$inlineedit,$usermessage,$message;
	if(!count($evalues))
		return true;
	$strSQL = "update ".AddTableWrappers($table)." set ";
	$blobs = PrepareBlobs($evalues,$blobfields);
//	construct SQL string
	foreach($evalues as $ekey=>$value)
	{
		if(in_array($ekey,$blobfields))			
			$strValues=$value;
		else
			if(is_null($cipherer))
				$strValues = add_db_quotes($ekey,$value);
			else 
				$strValues = $cipherer->AddDBQuotes($ekey,$value);
		$strSQL.=$pageObject->pSet->getTableField($ekey)."=".$strValues.", ";
	}
	if(substr($strSQL,-2)==", ")
		$strSQL=substr($strSQL,0,strlen($strSQL)-2);
	if($strWhereClause === "")
	{
		$strWhereClause = " (1=1) ";
	}
	$strSQL.=" where ".$strWhereClause;
	if(SecuritySQL("Edit"))
		$strSQL .= " and (".SecuritySQL("Edit").")";

	if(!ExecuteUpdate($pageObject,$strSQL,$blobs,false))
		return false;

//	delete & move files
	$pageObject->ProcessFiles();
	if ( $inlineedit ) 
	{
		$status="UPDATED";
		$message=""."Record updated"."";
		$IsSaved = true;
	} 
	else 
		$message="<<< "."Record updated"." >>>";
	if($usermessage!="")
		$message = $usermessage;
	return true;
}

//	insert record on Add & Register pages

function DoInsertRecordSQL($table,&$avalues,&$blobfields, $pageid, &$pageObject, &$cipherer)
{
	global $error_happened,$conn,$inlineadd,$usermessage,$message,$failed_inline_add,$keys,$strTableName;
//	make SQL string
	$strSQL = "insert into ".AddTableWrappers($table)." ";
	$strFields="(";
	$strValues="(";
	$blobs = PrepareBlobs($avalues,$blobfields);
	foreach($avalues as $akey=>$value)
	{
		$strFields .= $pageObject->pSet->getTableField($akey).", ";
		if(in_array($akey, $blobfields))			
			$strValues.=$value.", ";
		else
			if(is_null($cipherer))
				$strValues .= add_db_quotes($akey,$value).", ";
			else 
				$strValues .= $cipherer->AddDBQuotes($akey,$value).", ";
	}
	if(substr($strFields,-2)==", ")
		$strFields=substr($strFields,0,strlen($strFields)-2);
	if(substr($strValues,-2)==", ")
		$strValues=substr($strValues,0,strlen($strValues)-2);
	$strSQL.=$strFields.") values ".$strValues.")";
	
	if(!ExecuteUpdate($pageObject,$strSQL,$blobs,true))
		return false;
	
	if($error_happened)
		return false;
	$pageObject->ProcessFiles();
	if ( $inlineadd==ADD_INLINE ) 
	{
		$status="ADDED";
		$message=""."Record was added"."";
		$IsSaved = true;
	} 
	else
		$message="<<< "."Record was added"." >>>";
	if($usermessage!="")
		$message = $usermessage;
		
	$auditObj = GetAuditObject($table);
	
	if($inlineadd==ADD_SIMPLE || $inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP || $inlineadd==ADD_MASTER || tableEventExists("AfterAdd",$strTableName) || $auditObj)
	{
		$failed_inline_add = false;
		$keyfields=$pageObject->pSet->getTableKeys();
		foreach($keyfields as $k)
		{
			if(array_key_exists($k,$avalues))
				$keys[$k]=$avalues[$k];
			elseif($pageObject->pSet->isAutoincField($k))
			{
							$keys[$k]=GetMySQLLastInsertID();
			}
			else
				$failed_inline_add = true;
		}
	}
	return true;
}

function &getEventObject($table)
{
	global $tableEvents;
	$ret = null;
	if(!array_key_exists($table,$tableEvents))
		return $ret;
	return $tableEvents[$table];
}
function tableEventExists($event,$table)
{
	global $tableEvents;
	if(!array_key_exists($table,$tableEvents))
		return false;
	return $tableEvents[$table]->exists($event);
}

function add_nocache_headers()
{
	header("Cache-Control: no-cache, no-store, max-age=0, must-revalidate");
	header("Pragma: no-cache");
	header("Expires: Fri, 01 Jan 1990 00:00:00 GMT");
}

function IsGuidString(&$str)
{
//	{3F2504E0-4F89-11D3-9A0C-0305E82C3301} 
	if(strlen($str)==36 && substr($str,0,1)!="{" && substr($str,-1)!="}")
		$str="{".$str."}";
	elseif(strlen($str)==37 && substr($str,0,1)=="{" && substr($str,-1)!="}")
		$str=$str."}";
	elseif(strlen($str)==37 && substr($str,0,1)!="{" && substr($str,-1)=="}")
		$str="{".$str;
		
	if(strlen($str)!=38)
		return false;
	for($i=0;$i<38;$i++)
	{
		$c = substr($str,$i,1);
		if($i==0)
		{
			if($c!='{')
				return false;
		}
		elseif($i==37 )
		{
			if($c!='}')
				return false;
		}
		elseif($i==9 || $i==14 || $i==19 || $i==24)
		{
			if($c!='-')
				return false;
		}
		else
		{
			if(($c<'0' || $c>'9') && ($c<'a' || $c>'f') && ($c<'A' || $c>'F'))
				return false;
		}
	}
	return true;
}
function IsStoredProcedure($strSQL)
{
	if(strlen($strSQL)>6)
	{
		$c=strtolower(substr($strSQL,6,1));
		if(strtolower(substr($strSQL,0,6))=="select" && ($c<'0' || $c>'9') && ($c<'a' || $c>'z') && $c!='_')
			return false;
		else
			return true;
	}
	else
		return true;
}

function CreateCKeditor($cfield, $value)
{
	echo "<div id=\"disabledCKE_".$cfield."\"><textarea id=\"".$cfield."\" name=\"".$cfield."\" rows=\"8\" cols=\"60\">".htmlspecialchars($value)."</textarea>";
}
function GetDatabaseType()
{
	global $nDBType;
	return $nDBType;
}

/**
* Checks whether an browser for mobile devices
* Returns 0 - Browser stationary or it was not possible to determine
* 1-4 - the browser is running on your mobile device
*/
function MobileDetected() {
  $user_agent = strtolower($_SERVER['HTTP_USER_AGENT']);
  $accept = strtolower($_SERVER['HTTP_ACCEPT']);
 
  if ((strpos($accept,'text/vnd.wap.wml')!==false) ||
      (strpos($accept,'application/vnd.wap.xhtml+xml')!==false)) {
    return 1; // ????????? ??????? ????????? ?? HTTP-??????????
  }
 
  if (isset($_SERVER['HTTP_X_WAP_PROFILE']) ||
      isset($_SERVER['HTTP_PROFILE'])) {
    return 2; // Mobile browser detected by server settings
  }
 
  if (preg_match('/(ipad|android|symbianos|opera mini|ipod|blackberry|'.
	'palm os|palm|hiptop|avantgo|plucker|xiino|blazer|elaine|iris|3g_t|'.
	'windows ce|opera mobi|windows ce; smartphone;|windows ce; iemobile|'.
	'mini 9.5|vx1000|lge |m800|e860|u940|ux840|compal|'.
    'wireless| mobi|ahong|lg380|lgku|lgu900|lg210|lg47|lg920|lg840|'.
    'lg370|sam-r|mg50|s55|g83|t66|vx400|mk99|d615|d763|el370|sl900|'.
    'mp500|samu3|samu4|vx10|xda_|samu5|samu6|samu7|samu9|a615|b832|'.
    'm881|s920|n210|s700|c-810|_h797|mob-x|sk16d|848b|mowser|s580|'.
    'r800|471x|v120|rim8|c500foma:|160x|x160|480x|x640|t503|w839|'.
    'i250|sprint|w398samr810|m5252|c7100|mt126|x225|s5330|s820|'.
    'htil-g1|fly v71|s302|-x113|novarra|k610i|-three|8325rc|8352rc|'.
    'sanyo|vx54|c888|nx250|n120|mtk |c5588|s710|t880|c5005|i;458x|'.
    'p404i|s210|c5100|teleca|s940|c500|s590|foma|samsu|vx8|vx9|a1000|'.
    '_mms|myx|a700|gu1100|bc831|e300|ems100|me701|me702m-three|sd588|'.
    's800|8325rc|ac831|mw200|brew |d88|htc\/|htc_touch|355x|m50|km100|'.
    'd736|p-9521|telco|sl74|ktouch|m4u\/|me702|8325rc|kddi|phone|lg |'.
    'sonyericsson|samsung|240x|x320vx10|nokia|sony cmd|motorola|'.
    'up.browser|up.link|mmp|symbian|smartphone|midp|wap|vodafone|o2|'.
    'pocket|kindle|silk|hpwos|mobile|psp|treo)/', $user_agent)) {
    return 3; // Mobile browser detected by User Agent signature
  }
 
  if (in_array(substr($user_agent,0,4),
    Array("1207", "3gso", "4thp", "501i", "502i", "503i", "504i", "505i", "506i",
          "6310", "6590", "770s", "802s", "a wa", "abac", "acer", "acoo", "acs-",
          "aiko", "airn", "alav", "alca", "alco", "amoi", "anex", "anny", "anyw",
          "aptu", "arch", "argo", "aste", "asus", "attw", "au-m", "audi", "aur ",
          "aus ", "avan", "beck", "bell", "benq", "bilb", "bird", "blac", "blaz",
          "brew", "brvw", "bumb", "bw-n", "bw-u", "c55/", "capi", "ccwa", "cdm-",
          "cell", "chtm", "cldc", "cmd-", "cond", "craw", "dait", "dall", "dang",
          "dbte", "dc-s", "devi", "dica", "dmob", "doco", "dopo", "ds-d", "ds12",
          "el49", "elai", "eml2", "emul", "eric", "erk0", "esl8", "ez40", "ez60",
          "ez70", "ezos", "ezwa", "ezze", "fake", "fetc", "fly-", "fly_", "g-mo",
          "g1 u", "g560", "gene", "gf-5", "go.w", "good", "grad", "grun", "haie",
          "hcit", "hd-m", "hd-p", "hd-t", "hei-", "hiba", "hipt", "hita", "hp i",
          "hpip", "hs-c", "htc ", "htc-", "htc_", "htca", "htcg", "htcp", "htcs",
          "htct", "http", "huaw", "hutc", "i-20", "i-go", "i-ma", "i230", "iac",
          "iac-", "iac/", "ibro", "idea", "ig01", "ikom", "im1k", "inno", "ipaq",
          "iris", "jata", "java", "jbro", "jemu", "jigs", "kddi", "keji", "kgt",
          "kgt/", "klon", "kpt ", "kwc-", "kyoc", "kyok", "leno", "lexi", "lg g",
          "lg-a", "lg-b", "lg-c", "lg-d", "lg-f", "lg-g", "lg-k", "lg-l", "lg-m",
          "lg-o", "lg-p", "lg-s", "lg-t", "lg-u", "lg-w", "lg/k", "lg/l", "lg/u",
          "lg50", "lg54", "lge-", "lge/", "libw", "lynx", "m-cr", "m1-w", "m3ga",
          "m50/", "mate", "maui", "maxo", "mc01", "mc21", "mcca", "medi", "merc",
          "meri", "midp", "mio8", "mioa", "mits", "mmef", "mo01", "mo02", "mobi",
          "mode", "modo", "mot ", "mot-", "moto", "motv", "mozz", "mt50", "mtp1",
          "mtv ", "mwbp", "mywa", "n100", "n101", "n102", "n202", "n203", "n300",
          "n302", "n500", "n502", "n505", "n700", "n701", "n710", "nec-", "nem-",
          "neon", "netf", "newg", "newt", "nok6", "noki", "nzph", "o2 x", "o2-x",
          "o2im", "opti", "opwv", "oran", "owg1", "p800", "palm", "pana", "pand",
          "pant", "pdxg", "pg-1", "pg-2", "pg-3", "pg-6", "pg-8", "pg-c", "pg13",
          "phil", "pire", "play", "pluc", "pn-2", "pock", "port", "pose", "prox",
          "psio", "pt-g", "qa-a", "qc-2", "qc-3", "qc-5", "qc-7", "qc07", "qc12",
          "qc21", "qc32", "qc60", "qci-", "qtek", "qwap", "r380", "r600", "raks",
          "rim9", "rove", "rozo", "s55/", "sage", "sama", "samm", "sams", "sany",
          "sava", "sc01", "sch-", "scoo", "scp-", "sdk/", "se47", "sec-", "sec0",
          "sec1", "semc", "send", "seri", "sgh-", "shar", "sie-", "siem", "sk-0",
          "sl45", "slid", "smal", "smar", "smb3", "smit", "smt5", "soft", "sony",
          "sp01", "sph-", "spv ", "spv-", "sy01", "symb", "t-mo", "t218", "t250",
          "t600", "t610", "t618", "tagt", "talk", "tcl-", "tdg-", "teli", "telm",
          "tim-", "topl", "tosh", "treo", "ts70", "tsm-", "tsm3", "tsm5", "tx-9",
          "up.b", "upg1", "upsi", "utst", "v400", "v750", "veri", "virg", "vite",
          "vk-v", "vk40", "vk50", "vk52", "vk53", "vm40", "voda", "vulc", "vx52",
          "vx53", "vx60", "vx61", "vx70", "vx80", "vx81", "vx83", "vx85", "vx98",
          "w3c ", "w3c-", "wap-", "wapa", "wapi", "wapj", "wapm", "wapp", "wapr",
          "waps", "wapt", "wapu", "wapv", "wapy", "webc", "whit", "wig ", "winc",
          "winw", "wmlb", "wonu", "x700", "xda-", "xda2", "xdag", "yas-", "your",
          "zeto", "zte-"))) {
    return 4; // Mobile browser detected by User Agent signature
  }
 
  return false; // Mobile browser not found
} 


/**
* Check mobile device or PC 
*
*/
function isMobile(){
		if (isset($_SESSION['isMobile']))
		return $_SESSION['isMobile'];
	else {
		//if isset folder wurfl in the plugins
		if(myfile_exists("plugins/wurfl/WURFL/Application.php") && (myfile_exists("plugins/wurfl/resources/wurfl-config.xml"))){
			
			require_once(getabspath("plugins/wurfl/WURFL/Application.php"));
			$wurflConfigFile = getabspath("plugins/wurfl/resources/wurfl-config.xml");
			// Create WURFL Configuration from an XML config file
			$wurflConfig = new WURFL_Configuration_XmlConfig($wurflConfigFile);
			// Create a WURFL Manager Factory from the WURFL Configuration
			$wurflManagerFactory = new WURFL_WURFLManagerFactory($wurflConfig);
			// Create a WURFL Manager ($wurflManager is a WURFL_WURFLManager object)
			$wurflManager = $wurflManagerFactory->create();
			
			$wurflDevice = $wurflManager->getDeviceForHttpRequest($_SERVER);
			
			if ($wurflDevice->getCapability("is_wireless_device")=='true'){
				$_SESSION['isMobile'] = true;
			}
			else {
				$_SESSION['isMobile'] = false;
			}
		}
		else {
			//use standart function
			if ((MobileDetected()>=1) && (MobileDetected()<=4))
				$_SESSION['isMobile'] = true;	
			else 
				$_SESSION['isMobile'] = false;
		}
		
		return $_SESSION['isMobile'];
	}
}

/**
 * GetPageLayout
 * Return reference to layout object by table name, page type and section (or tab) name
 * @param {string} short table name (may be empty)
 * @param {string} page type
 * @param {string} section or tab name (may be empty)
 * @return {reference} reference to layout object
 */
function & GetPageLayout($tableName, $pageType, $sectionName = '')
{
	global $page_layouts;
	$layoutName = ($tableName != '' ? $tableName.'_' : '').$pageType.($sectionName != '' ? '_'.$sectionName : '');
	$layout = $page_layouts[$layoutName]; 
	if($layout){
		if(isMobile())
		{
			$layout->style = $layout->styleMobile;
		}
		else if(postvalue("pdf"))
		{
			$layout->style = $layout->pdfStyle();
		}
	}
	return $layout;
}

/**
 * isMobileIOS
 * Check is page browsed in apple device and is browser Safari or iCab
 * @return {bool}
 */
function isMobileIOS()
{
		if (isset($_SESSION['isMobileIOS']))
		return $_SESSION['isMobileIOS'];
	else {
		//if isset folder wurfl in the plugins
		$user_agent = strtolower($_SERVER['HTTP_USER_AGENT']);
		if(isMobile() && preg_match('/(iphone|ipad|ipod)/', $user_agent) && strpos($user_agent, 'applewebkit') !== FALSE)
			$_SESSION['isMobileIOS'] = true;
		else
			$_SESSION['isMobileIOS'] = false;
		
		return $_SESSION['isMobileIOS'];
	}
}

function extractStyle($str)
{
	$pos = my_stripos($str,'style="',0);
	$quot = '"';
	if($pos === false)
	{
		$pos = my_stripos($str,'style=\'',0);
		$quot = '\'';
	}
	if($pos === false)
		return;
	$pos1 = strpos($str,$quot, $pos+7);
	if($pos1 === false)
		return "";
	return substr($str, $pos+7, $pos1-$pos-7);
}

function injectStyle($str, $style)
{
	$pos = my_stripos($str,'style="',0);
	$quot = '"';
	if($pos === false)
	{
		$pos = my_stripos($str,'style=\'',0);
		$quot = '\'';
	}
	if($pos === false)
		return $str.' style="'.$style.'"';
	return substr($str,0, $pos+7).$style.";".substr($str, $pos+7);
}

function isSingleSign(){
	if (GetGlobalData("ADSingleSign",0) && $_SERVER["REMOTE_USER"]){
		return false;
	}
	return true;
}

function generatePassword($length)
{
	$password="";
	for($i=0;$i<$length;$i++)
	{
		$j = rand(0,35);
		if($j<26)
			$password.= chr(ord('a')+$j);
		else
			$password.= chr(ord('0')-26+$j);
	}
	return $password;
}

function securityCheckFileName($fileName)
{
	$maliciousStrings = array("../", "..\\");
	for($i = 0; $i < count($maliciousStrings); $i++)
	{
		while(strpos($fileName, $maliciousStrings[$i]) !== FALSE)
		{
			$fileName = str_replace($maliciousStrings, "", $fileName);
		}
	}
	return $fileName;
}
?>