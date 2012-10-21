<?php
require_once(getabspath("classes/cipherer.php"));
$tdataisha_streets = array();
	$tdataisha_streets[".NumberOfChars"] = 80; 
	$tdataisha_streets[".ShortName"] = "isha_streets";
	$tdataisha_streets[".OwnerID"] = "";
	$tdataisha_streets[".OriginalTable"] = "isha_streets";

//	field labels
$fieldLabelsisha_streets = array();
if(mlang_getcurrentlang()=="English")
{
	$fieldLabelsisha_streets["English"] = array();
	$fieldToolTipsisha_streets["English"] = array();
	$fieldLabelsisha_streets["English"]["ID"] = "ID";
	$fieldToolTipsisha_streets["English"]["ID"] = "";
	$fieldLabelsisha_streets["English"]["Location"] = "Location";
	$fieldToolTipsisha_streets["English"]["Location"] = "";
	$fieldLabelsisha_streets["English"]["ACTIVE"] = "ACTIVE";
	$fieldToolTipsisha_streets["English"]["ACTIVE"] = "";
	$fieldLabelsisha_streets["English"]["contract"] = "Contract";
	$fieldToolTipsisha_streets["English"]["contract"] = "";
	$fieldLabelsisha_streets["English"]["location"] = "Location";
	$fieldToolTipsisha_streets["English"]["location"] = "";
	$fieldLabelsisha_streets["English"]["enfcompany"] = "Enfcompany";
	$fieldToolTipsisha_streets["English"]["enfcompany"] = "";
	if (count($fieldToolTipsisha_streets["English"]))
		$tdataisha_streets[".isUseToolTips"] = true;
}
	
	
	$tdataisha_streets[".NCSearch"] = true;



$tdataisha_streets[".shortTableName"] = "isha_streets";
$tdataisha_streets[".nSecOptions"] = 0;
$tdataisha_streets[".recsPerRowList"] = 1;
$tdataisha_streets[".mainTableOwnerID"] = "";
$tdataisha_streets[".moveNext"] = 1;
$tdataisha_streets[".nType"] = 0;




$tdataisha_streets[".showAddInPopup"] = false;

$tdataisha_streets[".showEditInPopup"] = false;

$tdataisha_streets[".showViewInPopup"] = false;

$tdataisha_streets[".fieldsForRegister"] = array();

$tdataisha_streets[".listAjax"] = false;

	$tdataisha_streets[".audit"] = true;

	$tdataisha_streets[".locking"] = false;

$tdataisha_streets[".listIcons"] = true;
$tdataisha_streets[".edit"] = true;
$tdataisha_streets[".inlineEdit"] = true;
$tdataisha_streets[".inlineAdd"] = true;
$tdataisha_streets[".view"] = true;

$tdataisha_streets[".exportTo"] = true;

$tdataisha_streets[".printFriendly"] = true;

$tdataisha_streets[".delete"] = true;

$tdataisha_streets[".showSimpleSearchOptions"] = false;

$tdataisha_streets[".showSearchPanel"] = true;

if (isMobile())
	$tdataisha_streets[".isUseAjaxSuggest"] = false;
else 
	$tdataisha_streets[".isUseAjaxSuggest"] = true;

$tdataisha_streets[".rowHighlite"] = true;

// button handlers file names

$tdataisha_streets[".addPageEvents"] = false;

// use datepicker for search panel
$tdataisha_streets[".isUseCalendarForSearch"] = false;

// use timepicker for search panel
$tdataisha_streets[".isUseTimeForSearch"] = false;






$tdataisha_streets[".allSearchFields"] = array();

$tdataisha_streets[".allSearchFields"][] = "ID";
$tdataisha_streets[".allSearchFields"][] = "Location";
$tdataisha_streets[".allSearchFields"][] = "ACTIVE";
$tdataisha_streets[".allSearchFields"][] = "contract";
$tdataisha_streets[".allSearchFields"][] = "enfcompany";

$tdataisha_streets[".googleLikeFields"][] = "ID";
$tdataisha_streets[".googleLikeFields"][] = "Location";
$tdataisha_streets[".googleLikeFields"][] = "ACTIVE";
$tdataisha_streets[".googleLikeFields"][] = "contract";
$tdataisha_streets[".googleLikeFields"][] = "enfcompany";


$tdataisha_streets[".advSearchFields"][] = "ID";
$tdataisha_streets[".advSearchFields"][] = "Location";
$tdataisha_streets[".advSearchFields"][] = "ACTIVE";
$tdataisha_streets[".advSearchFields"][] = "contract";
$tdataisha_streets[".advSearchFields"][] = "enfcompany";

$tdataisha_streets[".isTableType"] = "list";

	



// Access doesn't support subqueries from the same table as main



$tdataisha_streets[".pageSize"] = 20;

$tstrOrderBy = "";
if(strlen($tstrOrderBy) && strtolower(substr($tstrOrderBy,0,8))!="order by")
	$tstrOrderBy = "order by ".$tstrOrderBy;
$tdataisha_streets[".strOrderBy"] = $tstrOrderBy;

$tdataisha_streets[".orderindexes"] = array();

$tdataisha_streets[".sqlHead"] = "SELECT ID,   Location,   ACTIVE,   contract,   enfcompany";
$tdataisha_streets[".sqlFrom"] = "FROM isha_streets";
$tdataisha_streets[".sqlWhereExpr"] = "";
$tdataisha_streets[".sqlTail"] = "";




//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdataisha_streets[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdataisha_streets[".arrGroupsPerPage"] = $arrGPP;

$tableKeysisha_streets = array();
$tableKeysisha_streets[] = "ID";
$tdataisha_streets[".Keys"] = $tableKeysisha_streets;

$tdataisha_streets[".listFields"] = array();
$tdataisha_streets[".listFields"][] = "enfcompany";
$tdataisha_streets[".listFields"][] = "ID";
$tdataisha_streets[".listFields"][] = "Location";
$tdataisha_streets[".listFields"][] = "ACTIVE";
$tdataisha_streets[".listFields"][] = "contract";

$tdataisha_streets[".addFields"] = array();
$tdataisha_streets[".addFields"][] = "Location";
$tdataisha_streets[".addFields"][] = "ACTIVE";
$tdataisha_streets[".addFields"][] = "contract";
$tdataisha_streets[".addFields"][] = "enfcompany";

$tdataisha_streets[".inlineAddFields"] = array();
$tdataisha_streets[".inlineAddFields"][] = "enfcompany";
$tdataisha_streets[".inlineAddFields"][] = "Location";
$tdataisha_streets[".inlineAddFields"][] = "ACTIVE";
$tdataisha_streets[".inlineAddFields"][] = "contract";

$tdataisha_streets[".editFields"] = array();
$tdataisha_streets[".editFields"][] = "Location";
$tdataisha_streets[".editFields"][] = "ACTIVE";
$tdataisha_streets[".editFields"][] = "contract";
$tdataisha_streets[".editFields"][] = "enfcompany";

$tdataisha_streets[".inlineEditFields"] = array();
$tdataisha_streets[".inlineEditFields"][] = "enfcompany";
$tdataisha_streets[".inlineEditFields"][] = "Location";
$tdataisha_streets[".inlineEditFields"][] = "ACTIVE";
$tdataisha_streets[".inlineEditFields"][] = "contract";

$tdataisha_streets[".exportFields"] = array();
$tdataisha_streets[".exportFields"][] = "ID";
$tdataisha_streets[".exportFields"][] = "Location";
$tdataisha_streets[".exportFields"][] = "ACTIVE";
$tdataisha_streets[".exportFields"][] = "contract";
$tdataisha_streets[".exportFields"][] = "enfcompany";
	
//	ID
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 1;
	$fdata["strName"] = "ID";
	$fdata["GoodName"] = "ID";
	$fdata["ownerTable"] = "isha_streets";
	$fdata["Label"] = "ID"; 
	$fdata["FieldType"] = 3;
	
		$fdata["AutoInc"] = true;
	
		
		$fdata["bListPage"] = true; 
	
		
		
		
		
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "ID"; 
		$fdata["FullName"] = "ID";
	
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

		$edata["IsRequired"] = true; 
	
		
		
		
		
		
		
		$edata["EditParams"] = "";
					
//	Begin validation
	$edata["validateAs"] = array();
				$edata["validateAs"]["basicValidate"][] = getJsValidatorName("Number");	
						$edata["validateAs"]["basicValidate"][] = "IsRequired";
	
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats

		$fdata["isSeparate"] = false;
	
	$tdataisha_streets["ID"] = $fdata;
//	Location
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 2;
	$fdata["strName"] = "Location";
	$fdata["GoodName"] = "Location";
	$fdata["ownerTable"] = "isha_streets";
	$fdata["Label"] = "Location"; 
	$fdata["FieldType"] = 200;
	
		
		
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		$fdata["bInlineAdd"] = true; 
	
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "Location"; 
		$fdata["FullName"] = "Location";
	
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
	
	$tdataisha_streets["Location"] = $fdata;
//	ACTIVE
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 3;
	$fdata["strName"] = "ACTIVE";
	$fdata["GoodName"] = "ACTIVE";
	$fdata["ownerTable"] = "isha_streets";
	$fdata["Label"] = "ACTIVE"; 
	$fdata["FieldType"] = 3;
	
		
		
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		$fdata["bInlineAdd"] = true; 
	
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "ACTIVE"; 
		$fdata["FullName"] = "ACTIVE";
	
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

		$edata["IsRequired"] = true; 
	
		
		
		
		
		
		
		$edata["EditParams"] = "";
					
//	Begin validation
	$edata["validateAs"] = array();
				$edata["validateAs"]["basicValidate"][] = getJsValidatorName("Number");	
						$edata["validateAs"]["basicValidate"][] = "IsRequired";
	
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats

		$fdata["isSeparate"] = false;
	
	$tdataisha_streets["ACTIVE"] = $fdata;
//	contract
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 4;
	$fdata["strName"] = "contract";
	$fdata["GoodName"] = "contract";
	$fdata["ownerTable"] = "isha_streets";
	$fdata["Label"] = "Contract"; 
	$fdata["FieldType"] = 200;
	
		
		
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		$fdata["bInlineAdd"] = true; 
	
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "contract"; 
		$fdata["FullName"] = "contract";
	
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
	
	$tdataisha_streets["contract"] = $fdata;
//	enfcompany
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 5;
	$fdata["strName"] = "enfcompany";
	$fdata["GoodName"] = "enfcompany";
	$fdata["ownerTable"] = "isha_streets";
	$fdata["Label"] = "Enfcompany"; 
	$fdata["FieldType"] = 200;
	
		
		
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		$fdata["bInlineAdd"] = true; 
	
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "enfcompany"; 
		$fdata["FullName"] = "enfcompany";
	
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
					
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats

		$fdata["isSeparate"] = false;
	
	$tdataisha_streets["enfcompany"] = $fdata;

	
$tables_data["isha_streets"]=&$tdataisha_streets;
$field_labels["isha_streets"] = &$fieldLabelsisha_streets;
$fieldToolTips["isha_streets"] = &$fieldToolTipsisha_streets;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["isha_streets"] = array();
	
// tables which are master tables for current table (detail)
$masterTablesData["isha_streets"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










function createSqlQuery_isha_streets()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "ID,   Location,   ACTIVE,   contract,   enfcompany";
$proto0["m_strFrom"] = "FROM isha_streets";
$proto0["m_strWhere"] = "";
$proto0["m_strOrderBy"] = "";
$proto0["m_strTail"] = "";
$proto0["cipherer"] = null;
$proto1=array();
$proto1["m_sql"] = "";
$proto1["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto1["m_column"]=$obj;
$proto1["m_contained"] = array();
$proto1["m_strCase"] = "";
$proto1["m_havingmode"] = "0";
$proto1["m_inBrackets"] = "0";
$proto1["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1);

$proto0["m_where"] = $obj;
$proto3=array();
$proto3["m_sql"] = "";
$proto3["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto3["m_column"]=$obj;
$proto3["m_contained"] = array();
$proto3["m_strCase"] = "";
$proto3["m_havingmode"] = "0";
$proto3["m_inBrackets"] = "0";
$proto3["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto3);

$proto0["m_having"] = $obj;
$proto0["m_fieldlist"] = array();
						$proto5=array();
			$obj = new SQLField(array(
	"m_strName" => "ID",
	"m_strTable" => "isha_streets"
));

$proto5["m_expr"]=$obj;
$proto5["m_alias"] = "";
$obj = new SQLFieldListItem($proto5);

$proto0["m_fieldlist"][]=$obj;
						$proto7=array();
			$obj = new SQLField(array(
	"m_strName" => "Location",
	"m_strTable" => "isha_streets"
));

$proto7["m_expr"]=$obj;
$proto7["m_alias"] = "";
$obj = new SQLFieldListItem($proto7);

$proto0["m_fieldlist"][]=$obj;
						$proto9=array();
			$obj = new SQLField(array(
	"m_strName" => "ACTIVE",
	"m_strTable" => "isha_streets"
));

$proto9["m_expr"]=$obj;
$proto9["m_alias"] = "";
$obj = new SQLFieldListItem($proto9);

$proto0["m_fieldlist"][]=$obj;
						$proto11=array();
			$obj = new SQLField(array(
	"m_strName" => "contract",
	"m_strTable" => "isha_streets"
));

$proto11["m_expr"]=$obj;
$proto11["m_alias"] = "";
$obj = new SQLFieldListItem($proto11);

$proto0["m_fieldlist"][]=$obj;
						$proto13=array();
			$obj = new SQLField(array(
	"m_strName" => "enfcompany",
	"m_strTable" => "isha_streets"
));

$proto13["m_expr"]=$obj;
$proto13["m_alias"] = "";
$obj = new SQLFieldListItem($proto13);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto15=array();
$proto15["m_link"] = "SQLL_MAIN";
			$proto16=array();
$proto16["m_strName"] = "isha_streets";
$proto16["m_columns"] = array();
$proto16["m_columns"][] = "ID";
$proto16["m_columns"][] = "Location";
$proto16["m_columns"][] = "ACTIVE";
$proto16["m_columns"][] = "contract";
$proto16["m_columns"][] = "enfcompany";
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
$proto0["m_groupby"] = array();
$proto0["m_orderby"] = array();
$obj = new SQLQuery($proto0);

	return $obj;
}
$queryData_isha_streets = createSqlQuery_isha_streets();
					$tdataisha_streets[".sqlquery"] = $queryData_isha_streets;
	
if(isset($tdataisha_streets["field2"])){
	$tdataisha_streets["field2"]["LookupTable"] = "carscars_view";
	$tdataisha_streets["field2"]["LookupOrderBy"] = "name";
	$tdataisha_streets["field2"]["LookupType"] = 4;
	$tdataisha_streets["field2"]["LinkField"] = "email";
	$tdataisha_streets["field2"]["DisplayField"] = "name";
	$tdataisha_streets[".hasCustomViewField"] = true;
}

$tableEvents["isha_streets"] = new eventsBase;
$tdataisha_streets[".hasEvents"] = false;

$cipherer = new RunnerCipherer("isha_streets");

?>