<?php
require_once(getabspath("classes/cipherer.php"));
$tdataelite = array();
	$tdataelite[".NumberOfChars"] = 80; 
	$tdataelite[".ShortName"] = "elite";
	$tdataelite[".OwnerID"] = "";
	$tdataelite[".OriginalTable"] = "exemptions";

//	field labels
$fieldLabelselite = array();
if(mlang_getcurrentlang()=="English")
{
	$fieldLabelselite["English"] = array();
	$fieldToolTipselite["English"] = array();
	$fieldLabelselite["English"]["Location"] = "Location";
	$fieldToolTipselite["English"]["Location"] = "";
	$fieldLabelselite["English"]["VRM"] = "VRM";
	$fieldToolTipselite["English"]["VRM"] = "";
	if (count($fieldToolTipselite["English"]))
		$tdataelite[".isUseToolTips"] = true;
}
	
	
	$tdataelite[".NCSearch"] = true;



$tdataelite[".shortTableName"] = "elite";
$tdataelite[".nSecOptions"] = 0;
$tdataelite[".recsPerRowList"] = 1;
$tdataelite[".mainTableOwnerID"] = "";
$tdataelite[".moveNext"] = 1;
$tdataelite[".nType"] = 1;




$tdataelite[".showAddInPopup"] = false;

$tdataelite[".showEditInPopup"] = false;

$tdataelite[".showViewInPopup"] = false;

$tdataelite[".fieldsForRegister"] = array();

$tdataelite[".listAjax"] = false;

	$tdataelite[".audit"] = false;

	$tdataelite[".locking"] = false;

$tdataelite[".listIcons"] = true;
$tdataelite[".inlineAdd"] = true;

$tdataelite[".exportTo"] = true;

$tdataelite[".printFriendly"] = true;


$tdataelite[".showSimpleSearchOptions"] = false;

$tdataelite[".showSearchPanel"] = true;

if (isMobile())
	$tdataelite[".isUseAjaxSuggest"] = false;
else 
	$tdataelite[".isUseAjaxSuggest"] = true;

$tdataelite[".rowHighlite"] = true;

// button handlers file names

$tdataelite[".addPageEvents"] = false;

// use datepicker for search panel
$tdataelite[".isUseCalendarForSearch"] = false;

// use timepicker for search panel
$tdataelite[".isUseTimeForSearch"] = false;






$tdataelite[".allSearchFields"] = array();

$tdataelite[".allSearchFields"][] = "Location";
$tdataelite[".allSearchFields"][] = "VRM";

$tdataelite[".googleLikeFields"][] = "Location";
$tdataelite[".googleLikeFields"][] = "VRM";


$tdataelite[".advSearchFields"][] = "Location";
$tdataelite[".advSearchFields"][] = "VRM";

$tdataelite[".isTableType"] = "list";

	



// Access doesn't support subqueries from the same table as main



$tdataelite[".pageSize"] = 20;

$tstrOrderBy = "ORDER BY exemptions.VRM";
if(strlen($tstrOrderBy) && strtolower(substr($tstrOrderBy,0,8))!="order by")
	$tstrOrderBy = "order by ".$tstrOrderBy;
$tdataelite[".strOrderBy"] = $tstrOrderBy;

$tdataelite[".orderindexes"] = array();
$tdataelite[".orderindexes"][] = array(2, (1 ? "ASC" : "DESC"), "exemptions.VRM");

$tdataelite[".sqlHead"] = "SELECT exemptions.Location,  exemptions.VRM";
$tdataelite[".sqlFrom"] = "FROM exemptions  INNER JOIN isha_streets ON exemptions.Location = isha_streets.Location";
$tdataelite[".sqlWhereExpr"] = "(exemptions.`Start Date` <=CURDATE()) AND (exemptions.EndDate >=CURDATE()) AND (isha_streets.enfcompany =\"Elite\")";
$tdataelite[".sqlTail"] = "";




//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdataelite[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdataelite[".arrGroupsPerPage"] = $arrGPP;

$tableKeyselite = array();
$tdataelite[".Keys"] = $tableKeyselite;

$tdataelite[".listFields"] = array();
$tdataelite[".listFields"][] = "Location";
$tdataelite[".listFields"][] = "VRM";

$tdataelite[".addFields"] = array();
$tdataelite[".addFields"][] = "Location";
$tdataelite[".addFields"][] = "VRM";

$tdataelite[".inlineAddFields"] = array();
$tdataelite[".inlineAddFields"][] = "Location";
$tdataelite[".inlineAddFields"][] = "VRM";

$tdataelite[".editFields"] = array();

$tdataelite[".inlineEditFields"] = array();

$tdataelite[".exportFields"] = array();
$tdataelite[".exportFields"][] = "Location";
$tdataelite[".exportFields"][] = "VRM";
	
//	Location
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 1;
	$fdata["strName"] = "Location";
	$fdata["GoodName"] = "Location";
	$fdata["ownerTable"] = "exemptions";
	$fdata["Label"] = "Location"; 
	$fdata["FieldType"] = 200;
	
		
		
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		$fdata["bInlineAdd"] = true; 
	
		
		
		
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "Location"; 
		$fdata["FullName"] = "exemptions.Location";
	
				$fdata["FieldPermissions"] = true;
	
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "");
	
		
		
		
		
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats 	
	$fdata["EditFormats"] = array();
	
	$edata = array("EditFormat" => "Text field");
	
		
		
		
	
//	Begin Lookup settings
	//	End Lookup Settings

		
		
		
		
		
		
		
		$edata["EditParams"] = "";
			$edata["EditParams"].= " maxlength=50";
			
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats

		$fdata["isSeparate"] = false;
	
	$tdataelite["Location"] = $fdata;
//	VRM
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 2;
	$fdata["strName"] = "VRM";
	$fdata["GoodName"] = "VRM";
	$fdata["ownerTable"] = "exemptions";
	$fdata["Label"] = "VRM"; 
	$fdata["FieldType"] = 200;
	
		
		
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		$fdata["bInlineAdd"] = true; 
	
		
		
		
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "VRM"; 
		$fdata["FullName"] = "exemptions.VRM";
	
				$fdata["FieldPermissions"] = true;
	
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "");
	
		
		
		
		
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats 	
	$fdata["EditFormats"] = array();
	
	$edata = array("EditFormat" => "Text field");
	
		
		
		
	
//	Begin Lookup settings
	//	End Lookup Settings

		
		
		
		
		
		
		
		$edata["EditParams"] = "";
			$edata["EditParams"].= " maxlength=15";
			
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats

		$fdata["isSeparate"] = false;
	
	$tdataelite["VRM"] = $fdata;

	
$tables_data["elite"]=&$tdataelite;
$field_labels["elite"] = &$fieldLabelselite;
$fieldToolTips["elite"] = &$fieldToolTipselite;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["elite"] = array();
	
// tables which are master tables for current table (detail)
$masterTablesData["elite"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










function createSqlQuery_elite()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "exemptions.Location,  exemptions.VRM";
$proto0["m_strFrom"] = "FROM exemptions  INNER JOIN isha_streets ON exemptions.Location = isha_streets.Location";
$proto0["m_strWhere"] = "(exemptions.`Start Date` <=CURDATE()) AND (exemptions.EndDate >=CURDATE()) AND (isha_streets.enfcompany =\"Elite\")";
$proto0["m_strOrderBy"] = "ORDER BY exemptions.VRM";
$proto0["m_strTail"] = "";
$proto0["cipherer"] = null;
$proto1=array();
$proto1["m_sql"] = "(exemptions.`Start Date` <=CURDATE()) AND (exemptions.EndDate >=CURDATE()) AND (isha_streets.enfcompany =\"Elite\")";
$proto1["m_uniontype"] = "SQLL_AND";
	$obj = new SQLNonParsed(array(
	"m_sql" => "(exemptions.`Start Date` <=CURDATE()) AND (exemptions.EndDate >=CURDATE()) AND (isha_streets.enfcompany =\"Elite\")"
));

$proto1["m_column"]=$obj;
$proto1["m_contained"] = array();
						$proto3=array();
$proto3["m_sql"] = "exemptions.`Start Date` <=CURDATE()";
$proto3["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "Start Date",
	"m_strTable" => "exemptions"
));

$proto3["m_column"]=$obj;
$proto3["m_contained"] = array();
$proto3["m_strCase"] = "<=CURDATE()";
$proto3["m_havingmode"] = "0";
$proto3["m_inBrackets"] = "1";
$proto3["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto3);

			$proto1["m_contained"][]=$obj;
						$proto5=array();
$proto5["m_sql"] = "exemptions.EndDate >=CURDATE()";
$proto5["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "EndDate",
	"m_strTable" => "exemptions"
));

$proto5["m_column"]=$obj;
$proto5["m_contained"] = array();
$proto5["m_strCase"] = ">=CURDATE()";
$proto5["m_havingmode"] = "0";
$proto5["m_inBrackets"] = "1";
$proto5["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto5);

			$proto1["m_contained"][]=$obj;
						$proto7=array();
$proto7["m_sql"] = "isha_streets.enfcompany =\"Elite\"";
$proto7["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "enfcompany",
	"m_strTable" => "isha_streets"
));

$proto7["m_column"]=$obj;
$proto7["m_contained"] = array();
$proto7["m_strCase"] = "=\"Elite\"";
$proto7["m_havingmode"] = "0";
$proto7["m_inBrackets"] = "1";
$proto7["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto7);

			$proto1["m_contained"][]=$obj;
$proto1["m_strCase"] = "";
$proto1["m_havingmode"] = "0";
$proto1["m_inBrackets"] = "0";
$proto1["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1);

$proto0["m_where"] = $obj;
$proto9=array();
$proto9["m_sql"] = "";
$proto9["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto9["m_column"]=$obj;
$proto9["m_contained"] = array();
$proto9["m_strCase"] = "";
$proto9["m_havingmode"] = "0";
$proto9["m_inBrackets"] = "0";
$proto9["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto9);

$proto0["m_having"] = $obj;
$proto0["m_fieldlist"] = array();
						$proto11=array();
			$obj = new SQLField(array(
	"m_strName" => "Location",
	"m_strTable" => "exemptions"
));

$proto11["m_expr"]=$obj;
$proto11["m_alias"] = "";
$obj = new SQLFieldListItem($proto11);

$proto0["m_fieldlist"][]=$obj;
						$proto13=array();
			$obj = new SQLField(array(
	"m_strName" => "VRM",
	"m_strTable" => "exemptions"
));

$proto13["m_expr"]=$obj;
$proto13["m_alias"] = "";
$obj = new SQLFieldListItem($proto13);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto15=array();
$proto15["m_link"] = "SQLL_MAIN";
			$proto16=array();
$proto16["m_strName"] = "exemptions";
$proto16["m_columns"] = array();
$proto16["m_columns"][] = "ID";
$proto16["m_columns"][] = "Location";
$proto16["m_columns"][] = "VRM";
$proto16["m_columns"][] = "Start Date";
$proto16["m_columns"][] = "EndDate";
$proto16["m_columns"][] = "Reason";
$proto16["m_columns"][] = "make";
$proto16["m_columns"][] = "colour";
$proto16["m_columns"][] = "contract";
$obj = new SQLTable($proto16);

$proto15["m_table"] = $obj;
$proto15["m_alias"] = "";
$proto17=array();
$proto17["m_sql"] = "";
$proto17["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto17["m_column"]=$obj;
$proto17["m_contained"] = array();
$proto17["m_strCase"] = "";
$proto17["m_havingmode"] = "0";
$proto17["m_inBrackets"] = "0";
$proto17["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto17);

$proto15["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto15);

$proto0["m_fromlist"][]=$obj;
												$proto19=array();
$proto19["m_link"] = "SQLL_INNERJOIN";
			$proto20=array();
$proto20["m_strName"] = "isha_streets";
$proto20["m_columns"] = array();
$proto20["m_columns"][] = "ID";
$proto20["m_columns"][] = "Location";
$proto20["m_columns"][] = "ACTIVE";
$proto20["m_columns"][] = "contract";
$proto20["m_columns"][] = "enfcompany";
$obj = new SQLTable($proto20);

$proto19["m_table"] = $obj;
$proto19["m_alias"] = "";
$proto21=array();
$proto21["m_sql"] = "exemptions.Location = isha_streets.Location";
$proto21["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "Location",
	"m_strTable" => "exemptions"
));

$proto21["m_column"]=$obj;
$proto21["m_contained"] = array();
$proto21["m_strCase"] = "= isha_streets.Location";
$proto21["m_havingmode"] = "0";
$proto21["m_inBrackets"] = "0";
$proto21["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto21);

$proto19["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto19);

$proto0["m_fromlist"][]=$obj;
$proto0["m_groupby"] = array();
$proto0["m_orderby"] = array();
												$proto23=array();
						$obj = new SQLField(array(
	"m_strName" => "VRM",
	"m_strTable" => "exemptions"
));

$proto23["m_column"]=$obj;
$proto23["m_bAsc"] = 1;
$proto23["m_nColumn"] = 0;
$obj = new SQLOrderByItem($proto23);

$proto0["m_orderby"][]=$obj;					
$obj = new SQLQuery($proto0);

	return $obj;
}
$queryData_elite = createSqlQuery_elite();
		$tdataelite[".sqlquery"] = $queryData_elite;
	
if(isset($tdataelite["field2"])){
	$tdataelite["field2"]["LookupTable"] = "carscars_view";
	$tdataelite["field2"]["LookupOrderBy"] = "name";
	$tdataelite["field2"]["LookupType"] = 4;
	$tdataelite["field2"]["LinkField"] = "email";
	$tdataelite["field2"]["DisplayField"] = "name";
	$tdataelite[".hasCustomViewField"] = true;
}

$tableEvents["elite"] = new eventsBase;
$tdataelite[".hasEvents"] = false;

$cipherer = new RunnerCipherer("elite");

?>