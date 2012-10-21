<?php
require_once(getabspath("classes/cipherer.php"));
$tdataisha_audit = array();
	$tdataisha_audit[".NumberOfChars"] = 80; 
	$tdataisha_audit[".ShortName"] = "isha_audit";
	$tdataisha_audit[".OwnerID"] = "";
	$tdataisha_audit[".OriginalTable"] = "isha_audit";

//	field labels
$fieldLabelsisha_audit = array();
if(mlang_getcurrentlang()=="English")
{
	$fieldLabelsisha_audit["English"] = array();
	$fieldToolTipsisha_audit["English"] = array();
	$fieldLabelsisha_audit["English"]["id"] = "Id";
	$fieldToolTipsisha_audit["English"]["id"] = "";
	$fieldLabelsisha_audit["English"]["datetime"] = "Datetime";
	$fieldToolTipsisha_audit["English"]["datetime"] = "";
	$fieldLabelsisha_audit["English"]["ip"] = "Ip";
	$fieldToolTipsisha_audit["English"]["ip"] = "";
	$fieldLabelsisha_audit["English"]["user"] = "User";
	$fieldToolTipsisha_audit["English"]["user"] = "";
	$fieldLabelsisha_audit["English"]["table"] = "Table";
	$fieldToolTipsisha_audit["English"]["table"] = "";
	$fieldLabelsisha_audit["English"]["action"] = "Action";
	$fieldToolTipsisha_audit["English"]["action"] = "";
	$fieldLabelsisha_audit["English"]["description"] = "Description";
	$fieldToolTipsisha_audit["English"]["description"] = "";
	if (count($fieldToolTipsisha_audit["English"]))
		$tdataisha_audit[".isUseToolTips"] = true;
}
	
	
	$tdataisha_audit[".NCSearch"] = true;



$tdataisha_audit[".shortTableName"] = "isha_audit";
$tdataisha_audit[".nSecOptions"] = 0;
$tdataisha_audit[".recsPerRowList"] = 1;
$tdataisha_audit[".mainTableOwnerID"] = "";
$tdataisha_audit[".moveNext"] = 1;
$tdataisha_audit[".nType"] = 0;




$tdataisha_audit[".showAddInPopup"] = false;

$tdataisha_audit[".showEditInPopup"] = false;

$tdataisha_audit[".showViewInPopup"] = false;

$tdataisha_audit[".fieldsForRegister"] = array();

$tdataisha_audit[".listAjax"] = false;

	$tdataisha_audit[".audit"] = true;

	$tdataisha_audit[".locking"] = false;

$tdataisha_audit[".listIcons"] = true;
$tdataisha_audit[".edit"] = true;
$tdataisha_audit[".inlineEdit"] = true;
$tdataisha_audit[".inlineAdd"] = true;
$tdataisha_audit[".view"] = true;

$tdataisha_audit[".exportTo"] = true;

$tdataisha_audit[".printFriendly"] = true;

$tdataisha_audit[".delete"] = true;

$tdataisha_audit[".showSimpleSearchOptions"] = false;

$tdataisha_audit[".showSearchPanel"] = true;

if (isMobile())
	$tdataisha_audit[".isUseAjaxSuggest"] = false;
else 
	$tdataisha_audit[".isUseAjaxSuggest"] = true;

$tdataisha_audit[".rowHighlite"] = true;

// button handlers file names

$tdataisha_audit[".addPageEvents"] = false;

// use datepicker for search panel
$tdataisha_audit[".isUseCalendarForSearch"] = true;

// use timepicker for search panel
$tdataisha_audit[".isUseTimeForSearch"] = false;






$tdataisha_audit[".allSearchFields"] = array();

$tdataisha_audit[".allSearchFields"][] = "id";
$tdataisha_audit[".allSearchFields"][] = "datetime";
$tdataisha_audit[".allSearchFields"][] = "ip";
$tdataisha_audit[".allSearchFields"][] = "user";
$tdataisha_audit[".allSearchFields"][] = "table";
$tdataisha_audit[".allSearchFields"][] = "action";
$tdataisha_audit[".allSearchFields"][] = "description";

$tdataisha_audit[".googleLikeFields"][] = "id";
$tdataisha_audit[".googleLikeFields"][] = "datetime";
$tdataisha_audit[".googleLikeFields"][] = "ip";
$tdataisha_audit[".googleLikeFields"][] = "user";
$tdataisha_audit[".googleLikeFields"][] = "table";
$tdataisha_audit[".googleLikeFields"][] = "action";
$tdataisha_audit[".googleLikeFields"][] = "description";


$tdataisha_audit[".advSearchFields"][] = "id";
$tdataisha_audit[".advSearchFields"][] = "datetime";
$tdataisha_audit[".advSearchFields"][] = "ip";
$tdataisha_audit[".advSearchFields"][] = "user";
$tdataisha_audit[".advSearchFields"][] = "table";
$tdataisha_audit[".advSearchFields"][] = "action";
$tdataisha_audit[".advSearchFields"][] = "description";

$tdataisha_audit[".isTableType"] = "list";

	



// Access doesn't support subqueries from the same table as main



$tdataisha_audit[".pageSize"] = 20;

$tstrOrderBy = "";
if(strlen($tstrOrderBy) && strtolower(substr($tstrOrderBy,0,8))!="order by")
	$tstrOrderBy = "order by ".$tstrOrderBy;
$tdataisha_audit[".strOrderBy"] = $tstrOrderBy;

$tdataisha_audit[".orderindexes"] = array();

$tdataisha_audit[".sqlHead"] = "SELECT id,   `datetime`,   ip,   `user`,   `table`,   `action`,   description";
$tdataisha_audit[".sqlFrom"] = "FROM isha_audit";
$tdataisha_audit[".sqlWhereExpr"] = "";
$tdataisha_audit[".sqlTail"] = "";




//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdataisha_audit[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdataisha_audit[".arrGroupsPerPage"] = $arrGPP;

$tableKeysisha_audit = array();
$tableKeysisha_audit[] = "id";
$tdataisha_audit[".Keys"] = $tableKeysisha_audit;

$tdataisha_audit[".listFields"] = array();
$tdataisha_audit[".listFields"][] = "id";
$tdataisha_audit[".listFields"][] = "datetime";
$tdataisha_audit[".listFields"][] = "ip";
$tdataisha_audit[".listFields"][] = "user";
$tdataisha_audit[".listFields"][] = "table";
$tdataisha_audit[".listFields"][] = "action";
$tdataisha_audit[".listFields"][] = "description";

$tdataisha_audit[".addFields"] = array();
$tdataisha_audit[".addFields"][] = "datetime";
$tdataisha_audit[".addFields"][] = "ip";
$tdataisha_audit[".addFields"][] = "user";
$tdataisha_audit[".addFields"][] = "table";
$tdataisha_audit[".addFields"][] = "action";
$tdataisha_audit[".addFields"][] = "description";

$tdataisha_audit[".inlineAddFields"] = array();
$tdataisha_audit[".inlineAddFields"][] = "datetime";
$tdataisha_audit[".inlineAddFields"][] = "ip";
$tdataisha_audit[".inlineAddFields"][] = "user";
$tdataisha_audit[".inlineAddFields"][] = "table";
$tdataisha_audit[".inlineAddFields"][] = "action";
$tdataisha_audit[".inlineAddFields"][] = "description";

$tdataisha_audit[".editFields"] = array();
$tdataisha_audit[".editFields"][] = "datetime";
$tdataisha_audit[".editFields"][] = "ip";
$tdataisha_audit[".editFields"][] = "user";
$tdataisha_audit[".editFields"][] = "table";
$tdataisha_audit[".editFields"][] = "action";
$tdataisha_audit[".editFields"][] = "description";

$tdataisha_audit[".inlineEditFields"] = array();
$tdataisha_audit[".inlineEditFields"][] = "datetime";
$tdataisha_audit[".inlineEditFields"][] = "ip";
$tdataisha_audit[".inlineEditFields"][] = "user";
$tdataisha_audit[".inlineEditFields"][] = "table";
$tdataisha_audit[".inlineEditFields"][] = "action";
$tdataisha_audit[".inlineEditFields"][] = "description";

$tdataisha_audit[".exportFields"] = array();
$tdataisha_audit[".exportFields"][] = "id";
$tdataisha_audit[".exportFields"][] = "datetime";
$tdataisha_audit[".exportFields"][] = "ip";
$tdataisha_audit[".exportFields"][] = "user";
$tdataisha_audit[".exportFields"][] = "table";
$tdataisha_audit[".exportFields"][] = "action";
$tdataisha_audit[".exportFields"][] = "description";
	
//	id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 1;
	$fdata["strName"] = "id";
	$fdata["GoodName"] = "id";
	$fdata["ownerTable"] = "isha_audit";
	$fdata["Label"] = "Id"; 
	$fdata["FieldType"] = 3;
	
		$fdata["AutoInc"] = true;
	
		
		$fdata["bListPage"] = true; 
	
		
		
		
		
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "id"; 
		$fdata["FullName"] = "id";
	
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
	
	$tdataisha_audit["id"] = $fdata;
//	datetime
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 2;
	$fdata["strName"] = "datetime";
	$fdata["GoodName"] = "datetime";
	$fdata["ownerTable"] = "isha_audit";
	$fdata["Label"] = "Datetime"; 
	$fdata["FieldType"] = 135;
	
		
		
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		$fdata["bInlineAdd"] = true; 
	
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "datetime"; 
		$fdata["FullName"] = "`datetime`";
	
				$fdata["FieldPermissions"] = true;
	
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "Short Date");
	
		
		
		
		
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats 	
	$fdata["EditFormats"] = array();
	
	$edata = array("EditFormat" => "Date");
	
		
		
		
	
//	Begin Lookup settings
	//	End Lookup Settings

		$edata["IsRequired"] = true; 
	
		
		
		
		
		$edata["DateEditType"] = 13; 
	$edata["InitialYearFactor"] = 0; 
	$edata["LastYearFactor"] = 2; 
	
		
		
//	Begin validation
	$edata["validateAs"] = array();
						$edata["validateAs"]["basicValidate"][] = "IsRequired";
	
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats

		$fdata["isSeparate"] = false;
	
	$tdataisha_audit["datetime"] = $fdata;
//	ip
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 3;
	$fdata["strName"] = "ip";
	$fdata["GoodName"] = "ip";
	$fdata["ownerTable"] = "isha_audit";
	$fdata["Label"] = "Ip"; 
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
	
		$fdata["strField"] = "ip"; 
		$fdata["FullName"] = "ip";
	
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
			$edata["EditParams"].= " maxlength=40";
			
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats

		$fdata["isSeparate"] = false;
	
	$tdataisha_audit["ip"] = $fdata;
//	user
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 4;
	$fdata["strName"] = "user";
	$fdata["GoodName"] = "user";
	$fdata["ownerTable"] = "isha_audit";
	$fdata["Label"] = "User"; 
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
	
		$fdata["strField"] = "user"; 
		$fdata["FullName"] = "`user`";
	
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
			$edata["EditParams"].= " maxlength=250";
			
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats

		$fdata["isSeparate"] = false;
	
	$tdataisha_audit["user"] = $fdata;
//	table
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 5;
	$fdata["strName"] = "table";
	$fdata["GoodName"] = "table";
	$fdata["ownerTable"] = "isha_audit";
	$fdata["Label"] = "Table"; 
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
	
		$fdata["strField"] = "table"; 
		$fdata["FullName"] = "`table`";
	
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
			$edata["EditParams"].= " maxlength=250";
			
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats

		$fdata["isSeparate"] = false;
	
	$tdataisha_audit["table"] = $fdata;
//	action
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 6;
	$fdata["strName"] = "action";
	$fdata["GoodName"] = "action";
	$fdata["ownerTable"] = "isha_audit";
	$fdata["Label"] = "Action"; 
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
	
		$fdata["strField"] = "action"; 
		$fdata["FullName"] = "`action`";
	
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
			$edata["EditParams"].= " maxlength=250";
			
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats

		$fdata["isSeparate"] = false;
	
	$tdataisha_audit["action"] = $fdata;
//	description
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 7;
	$fdata["strName"] = "description";
	$fdata["GoodName"] = "description";
	$fdata["ownerTable"] = "isha_audit";
	$fdata["Label"] = "Description"; 
	$fdata["FieldType"] = 201;
	
		
		
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		$fdata["bInlineAdd"] = true; 
	
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "description"; 
		$fdata["FullName"] = "description";
	
				$fdata["FieldPermissions"] = true;
	
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "");
	
		
		
		
		
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats 	
	$fdata["EditFormats"] = array();
	
	$edata = array("EditFormat" => "Text area");
	
		
		
		
	
//	Begin Lookup settings
	//	End Lookup Settings

		
		
		
		
		
		
		$edata["EditParams"] = "";
			$edata["EditParams"].= " rows=100";
	$edata["nRows"] = 100;
			$edata["EditParams"].= " cols=200";
	$edata["nCols"] = 200;
	
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats

		$fdata["isSeparate"] = false;
	
	$tdataisha_audit["description"] = $fdata;

	
$tables_data["isha_audit"]=&$tdataisha_audit;
$field_labels["isha_audit"] = &$fieldLabelsisha_audit;
$fieldToolTips["isha_audit"] = &$fieldToolTipsisha_audit;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["isha_audit"] = array();
	
// tables which are master tables for current table (detail)
$masterTablesData["isha_audit"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










function createSqlQuery_isha_audit()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "id,   `datetime`,   ip,   `user`,   `table`,   `action`,   description";
$proto0["m_strFrom"] = "FROM isha_audit";
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
	"m_strName" => "id",
	"m_strTable" => "isha_audit"
));

$proto5["m_expr"]=$obj;
$proto5["m_alias"] = "";
$obj = new SQLFieldListItem($proto5);

$proto0["m_fieldlist"][]=$obj;
						$proto7=array();
			$obj = new SQLField(array(
	"m_strName" => "datetime",
	"m_strTable" => "isha_audit"
));

$proto7["m_expr"]=$obj;
$proto7["m_alias"] = "";
$obj = new SQLFieldListItem($proto7);

$proto0["m_fieldlist"][]=$obj;
						$proto9=array();
			$obj = new SQLField(array(
	"m_strName" => "ip",
	"m_strTable" => "isha_audit"
));

$proto9["m_expr"]=$obj;
$proto9["m_alias"] = "";
$obj = new SQLFieldListItem($proto9);

$proto0["m_fieldlist"][]=$obj;
						$proto11=array();
			$obj = new SQLField(array(
	"m_strName" => "user",
	"m_strTable" => "isha_audit"
));

$proto11["m_expr"]=$obj;
$proto11["m_alias"] = "";
$obj = new SQLFieldListItem($proto11);

$proto0["m_fieldlist"][]=$obj;
						$proto13=array();
			$obj = new SQLField(array(
	"m_strName" => "table",
	"m_strTable" => "isha_audit"
));

$proto13["m_expr"]=$obj;
$proto13["m_alias"] = "";
$obj = new SQLFieldListItem($proto13);

$proto0["m_fieldlist"][]=$obj;
						$proto15=array();
			$obj = new SQLField(array(
	"m_strName" => "action",
	"m_strTable" => "isha_audit"
));

$proto15["m_expr"]=$obj;
$proto15["m_alias"] = "";
$obj = new SQLFieldListItem($proto15);

$proto0["m_fieldlist"][]=$obj;
						$proto17=array();
			$obj = new SQLField(array(
	"m_strName" => "description",
	"m_strTable" => "isha_audit"
));

$proto17["m_expr"]=$obj;
$proto17["m_alias"] = "";
$obj = new SQLFieldListItem($proto17);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto19=array();
$proto19["m_link"] = "SQLL_MAIN";
			$proto20=array();
$proto20["m_strName"] = "isha_audit";
$proto20["m_columns"] = array();
$proto20["m_columns"][] = "id";
$proto20["m_columns"][] = "datetime";
$proto20["m_columns"][] = "ip";
$proto20["m_columns"][] = "user";
$proto20["m_columns"][] = "table";
$proto20["m_columns"][] = "action";
$proto20["m_columns"][] = "description";
$obj = new SQLTable($proto20);

$proto19["m_table"] = $obj;
$proto19["m_alias"] = "";
$proto21=array();
$proto21["m_sql"] = "";
$proto21["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto21["m_column"]=$obj;
$proto21["m_contained"] = array();
$proto21["m_strCase"] = "";
$proto21["m_havingmode"] = "0";
$proto21["m_inBrackets"] = "0";
$proto21["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto21);

$proto19["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto19);

$proto0["m_fromlist"][]=$obj;
$proto0["m_groupby"] = array();
$proto0["m_orderby"] = array();
$obj = new SQLQuery($proto0);

	return $obj;
}
$queryData_isha_audit = createSqlQuery_isha_audit();
							$tdataisha_audit[".sqlquery"] = $queryData_isha_audit;
	
if(isset($tdataisha_audit["field2"])){
	$tdataisha_audit["field2"]["LookupTable"] = "carscars_view";
	$tdataisha_audit["field2"]["LookupOrderBy"] = "name";
	$tdataisha_audit["field2"]["LookupType"] = 4;
	$tdataisha_audit["field2"]["LinkField"] = "email";
	$tdataisha_audit["field2"]["DisplayField"] = "name";
	$tdataisha_audit[".hasCustomViewField"] = true;
}

$tableEvents["isha_audit"] = new eventsBase;
$tdataisha_audit[".hasEvents"] = false;

$cipherer = new RunnerCipherer("isha_audit");

?>