<?php
require_once(getabspath("classes/cipherer.php"));
$tdataDemo_Contract = array();
	$tdataDemo_Contract[".NumberOfChars"] = 80; 
	$tdataDemo_Contract[".ShortName"] = "Demo_Contract";
	$tdataDemo_Contract[".OwnerID"] = "";
	$tdataDemo_Contract[".OriginalTable"] = "exemptions";

//	field labels
$fieldLabelsDemo_Contract = array();
if(mlang_getcurrentlang()=="English")
{
	$fieldLabelsDemo_Contract["English"] = array();
	$fieldToolTipsDemo_Contract["English"] = array();
	$fieldLabelsDemo_Contract["English"]["Location"] = "Location";
	$fieldToolTipsDemo_Contract["English"]["Location"] = "";
	$fieldLabelsDemo_Contract["English"]["VRM"] = "VRM";
	$fieldToolTipsDemo_Contract["English"]["VRM"] = "";
	$fieldLabelsDemo_Contract["English"]["Start_Date"] = "Start Date";
	$fieldToolTipsDemo_Contract["English"]["Start Date"] = "";
	$fieldLabelsDemo_Contract["English"]["EndDate"] = "End Date";
	$fieldToolTipsDemo_Contract["English"]["EndDate"] = "";
	$fieldLabelsDemo_Contract["English"]["Reason"] = "Reason";
	$fieldToolTipsDemo_Contract["English"]["Reason"] = "";
	$fieldLabelsDemo_Contract["English"]["make"] = "Make";
	$fieldToolTipsDemo_Contract["English"]["make"] = "";
	$fieldLabelsDemo_Contract["English"]["colour"] = "Colour";
	$fieldToolTipsDemo_Contract["English"]["colour"] = "";
	$fieldLabelsDemo_Contract["English"]["ID"] = "ID";
	$fieldToolTipsDemo_Contract["English"]["ID"] = "";
	if (count($fieldToolTipsDemo_Contract["English"]))
		$tdataDemo_Contract[".isUseToolTips"] = true;
}
	
	
	$tdataDemo_Contract[".NCSearch"] = true;



$tdataDemo_Contract[".shortTableName"] = "Demo_Contract";
$tdataDemo_Contract[".nSecOptions"] = 0;
$tdataDemo_Contract[".recsPerRowList"] = 1;
$tdataDemo_Contract[".mainTableOwnerID"] = "";
$tdataDemo_Contract[".moveNext"] = 1;
$tdataDemo_Contract[".nType"] = 1;




$tdataDemo_Contract[".showAddInPopup"] = false;

$tdataDemo_Contract[".showEditInPopup"] = false;

$tdataDemo_Contract[".showViewInPopup"] = false;

$tdataDemo_Contract[".fieldsForRegister"] = array();

$tdataDemo_Contract[".listAjax"] = false;

	$tdataDemo_Contract[".audit"] = true;

	$tdataDemo_Contract[".locking"] = false;

$tdataDemo_Contract[".listIcons"] = true;

$tdataDemo_Contract[".exportTo"] = true;

$tdataDemo_Contract[".printFriendly"] = true;


$tdataDemo_Contract[".showSimpleSearchOptions"] = false;

$tdataDemo_Contract[".showSearchPanel"] = true;

if (isMobile())
	$tdataDemo_Contract[".isUseAjaxSuggest"] = false;
else 
	$tdataDemo_Contract[".isUseAjaxSuggest"] = true;

$tdataDemo_Contract[".rowHighlite"] = true;

// button handlers file names

$tdataDemo_Contract[".addPageEvents"] = false;

// use datepicker for search panel
$tdataDemo_Contract[".isUseCalendarForSearch"] = true;

// use timepicker for search panel
$tdataDemo_Contract[".isUseTimeForSearch"] = false;






$tdataDemo_Contract[".allSearchFields"] = array();

$tdataDemo_Contract[".allSearchFields"][] = "Location";
$tdataDemo_Contract[".allSearchFields"][] = "VRM";
$tdataDemo_Contract[".allSearchFields"][] = "make";
$tdataDemo_Contract[".allSearchFields"][] = "colour";
$tdataDemo_Contract[".allSearchFields"][] = "Start Date";
$tdataDemo_Contract[".allSearchFields"][] = "EndDate";
$tdataDemo_Contract[".allSearchFields"][] = "Reason";

$tdataDemo_Contract[".googleLikeFields"][] = "ID";
$tdataDemo_Contract[".googleLikeFields"][] = "Location";
$tdataDemo_Contract[".googleLikeFields"][] = "VRM";
$tdataDemo_Contract[".googleLikeFields"][] = "make";
$tdataDemo_Contract[".googleLikeFields"][] = "colour";
$tdataDemo_Contract[".googleLikeFields"][] = "Start Date";
$tdataDemo_Contract[".googleLikeFields"][] = "EndDate";
$tdataDemo_Contract[".googleLikeFields"][] = "Reason";


$tdataDemo_Contract[".advSearchFields"][] = "Location";
$tdataDemo_Contract[".advSearchFields"][] = "VRM";
$tdataDemo_Contract[".advSearchFields"][] = "make";
$tdataDemo_Contract[".advSearchFields"][] = "colour";
$tdataDemo_Contract[".advSearchFields"][] = "Start Date";
$tdataDemo_Contract[".advSearchFields"][] = "EndDate";
$tdataDemo_Contract[".advSearchFields"][] = "Reason";

$tdataDemo_Contract[".isTableType"] = "list";

	



// Access doesn't support subqueries from the same table as main



$tdataDemo_Contract[".pageSize"] = 20;

$tstrOrderBy = "ORDER BY exemptions.VRM";
if(strlen($tstrOrderBy) && strtolower(substr($tstrOrderBy,0,8))!="order by")
	$tstrOrderBy = "order by ".$tstrOrderBy;
$tdataDemo_Contract[".strOrderBy"] = $tstrOrderBy;

$tdataDemo_Contract[".orderindexes"] = array();
$tdataDemo_Contract[".orderindexes"][] = array(2, (1 ? "ASC" : "DESC"), "exemptions.VRM");

$tdataDemo_Contract[".sqlHead"] = "SELECT exemptions.Location,  exemptions.VRM,  exemptions.`Start Date`,  exemptions.EndDate,  exemptions.Reason,  exemptions.make,  exemptions.colour,  exemptions.ID";
$tdataDemo_Contract[".sqlFrom"] = "FROM exemptions  INNER JOIN isha_streets ON exemptions.Location = isha_streets.Location";
$tdataDemo_Contract[".sqlWhereExpr"] = "(exemptions.`Start Date` <=CURDATE()) AND (exemptions.EndDate >=CURDATE()) AND (isha_streets.contract =\"DEMO\")";
$tdataDemo_Contract[".sqlTail"] = "";




//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdataDemo_Contract[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdataDemo_Contract[".arrGroupsPerPage"] = $arrGPP;

$tableKeysDemo_Contract = array();
$tableKeysDemo_Contract[] = "ID";
$tdataDemo_Contract[".Keys"] = $tableKeysDemo_Contract;

$tdataDemo_Contract[".listFields"] = array();
$tdataDemo_Contract[".listFields"][] = "Location";
$tdataDemo_Contract[".listFields"][] = "VRM";
$tdataDemo_Contract[".listFields"][] = "make";
$tdataDemo_Contract[".listFields"][] = "colour";
$tdataDemo_Contract[".listFields"][] = "Start Date";
$tdataDemo_Contract[".listFields"][] = "EndDate";
$tdataDemo_Contract[".listFields"][] = "Reason";

$tdataDemo_Contract[".addFields"] = array();
$tdataDemo_Contract[".addFields"][] = "Location";
$tdataDemo_Contract[".addFields"][] = "VRM";
$tdataDemo_Contract[".addFields"][] = "make";
$tdataDemo_Contract[".addFields"][] = "colour";
$tdataDemo_Contract[".addFields"][] = "Start Date";
$tdataDemo_Contract[".addFields"][] = "EndDate";
$tdataDemo_Contract[".addFields"][] = "Reason";

$tdataDemo_Contract[".inlineAddFields"] = array();

$tdataDemo_Contract[".editFields"] = array();

$tdataDemo_Contract[".inlineEditFields"] = array();

$tdataDemo_Contract[".exportFields"] = array();
$tdataDemo_Contract[".exportFields"][] = "Location";
$tdataDemo_Contract[".exportFields"][] = "VRM";
$tdataDemo_Contract[".exportFields"][] = "make";
$tdataDemo_Contract[".exportFields"][] = "colour";
$tdataDemo_Contract[".exportFields"][] = "Start Date";
$tdataDemo_Contract[".exportFields"][] = "EndDate";
$tdataDemo_Contract[".exportFields"][] = "Reason";
	
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
	
	$edata = array("EditFormat" => "Lookup wizard");
	
		
		
		
	
//	Begin Lookup settings
								$edata["LookupType"] = 2;
		$edata["pLookupType"] = 2;
	$edata["freeInput"] = 0;
	$edata["autoCompleteFieldsOnEdit"] = 0;
	$edata["autoCompleteFields"] = array();
				
		
			
	$edata["LinkField"] = "Location";
	$edata["LinkFieldType"] = 200;
	$edata["DisplayField"] = "Location";
	
		
	$edata["LookupTable"] = "isha_streets";
	$edata["LookupOrderBy"] = "";
	
		
		$edata["LookupWhere"] = "contract = 'DEMO'";
	
		
		
		
				
	
	
	//	End Lookup Settings

		$edata["IsRequired"] = true; 
	
		
		
		
		
		
		
		
//	Begin validation
	$edata["validateAs"] = array();
						$edata["validateAs"]["basicValidate"][] = "IsRequired";
	
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats

		$fdata["isSeparate"] = false;
	
	$tdataDemo_Contract["Location"] = $fdata;
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

		$edata["IsRequired"] = true; 
	
		
		
		
		
		
		
		$edata["EditParams"] = "";
			$edata["EditParams"].= " maxlength=15";
			
//	Begin validation
	$edata["validateAs"] = array();
						$edata["validateAs"]["basicValidate"][] = "IsRequired";
	
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats

		$fdata["isSeparate"] = false;
	
	$tdataDemo_Contract["VRM"] = $fdata;
//	Start Date
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 3;
	$fdata["strName"] = "Start Date";
	$fdata["GoodName"] = "Start_Date";
	$fdata["ownerTable"] = "exemptions";
	$fdata["Label"] = "Start Date"; 
	$fdata["FieldType"] = 7;
	
		
		
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		
		
		
		
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "Start Date"; 
		$fdata["FullName"] = "exemptions.`Start Date`";
	
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
	
	$tdataDemo_Contract["Start Date"] = $fdata;
//	EndDate
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 4;
	$fdata["strName"] = "EndDate";
	$fdata["GoodName"] = "EndDate";
	$fdata["ownerTable"] = "exemptions";
	$fdata["Label"] = "End Date"; 
	$fdata["FieldType"] = 7;
	
		
		
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		
		
		
		
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "EndDate"; 
		$fdata["FullName"] = "exemptions.EndDate";
	
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
	
	$tdataDemo_Contract["EndDate"] = $fdata;
//	Reason
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 5;
	$fdata["strName"] = "Reason";
	$fdata["GoodName"] = "Reason";
	$fdata["ownerTable"] = "exemptions";
	$fdata["Label"] = "Reason"; 
	$fdata["FieldType"] = 200;
	
		
		
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		
		
		
		
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "Reason"; 
		$fdata["FullName"] = "exemptions.Reason";
	
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
			$edata["EditParams"].= " maxlength=150";
			
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats

		$fdata["isSeparate"] = false;
	
	$tdataDemo_Contract["Reason"] = $fdata;
//	make
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 6;
	$fdata["strName"] = "make";
	$fdata["GoodName"] = "make";
	$fdata["ownerTable"] = "exemptions";
	$fdata["Label"] = "Make"; 
	$fdata["FieldType"] = 200;
	
		
		
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		
		
		
		
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "make"; 
		$fdata["FullName"] = "exemptions.make";
	
				$fdata["FieldPermissions"] = true;
	
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "");
	
		
		
		
		
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats 	
	$fdata["EditFormats"] = array();
	
	$edata = array("EditFormat" => "Lookup wizard");
	
		
		
		
	
//	Begin Lookup settings
								$edata["LookupType"] = 1;
		$edata["pLookupType"] = 1;
	$edata["freeInput"] = 0;
	$edata["autoCompleteFieldsOnEdit"] = 0;
	$edata["autoCompleteFields"] = array();
				
		
			
	$edata["LinkField"] = "make";
	$edata["LinkFieldType"] = 200;
	$edata["DisplayField"] = "make";
	
		
	$edata["LookupTable"] = "make";
	$edata["LookupOrderBy"] = "make";
	
		
		
		
		
		
		$edata["SimpleAdd"] = true;
			
	
	
	//	End Lookup Settings

		
		
		
		
		
		
		
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats

		$fdata["isSeparate"] = false;
	
	$tdataDemo_Contract["make"] = $fdata;
//	colour
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 7;
	$fdata["strName"] = "colour";
	$fdata["GoodName"] = "colour";
	$fdata["ownerTable"] = "exemptions";
	$fdata["Label"] = "Colour"; 
	$fdata["FieldType"] = 200;
	
		
		
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		
		
		
		
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "colour"; 
		$fdata["FullName"] = "exemptions.colour";
	
				$fdata["FieldPermissions"] = true;
	
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "");
	
		
		
		
		
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats 	
	$fdata["EditFormats"] = array();
	
	$edata = array("EditFormat" => "Lookup wizard");
	
		
		
		
	
//	Begin Lookup settings
								$edata["LookupType"] = 1;
		$edata["pLookupType"] = 1;
	$edata["freeInput"] = 0;
	$edata["autoCompleteFieldsOnEdit"] = 0;
	$edata["autoCompleteFields"] = array();
				
		
			
	$edata["LinkField"] = "colour";
	$edata["LinkFieldType"] = 200;
	$edata["DisplayField"] = "colour";
	
		
	$edata["LookupTable"] = "colour";
	$edata["LookupOrderBy"] = "colour";
	
		
		
		
		
		
		$edata["SimpleAdd"] = true;
			
	
	
	//	End Lookup Settings

		
		
		
		
		
		
		
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats

		$fdata["isSeparate"] = false;
	
	$tdataDemo_Contract["colour"] = $fdata;
//	ID
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 8;
	$fdata["strName"] = "ID";
	$fdata["GoodName"] = "ID";
	$fdata["ownerTable"] = "exemptions";
	$fdata["Label"] = "ID"; 
	$fdata["FieldType"] = 3;
	
		$fdata["AutoInc"] = true;
	
		
		
		
		
		
		
		
		
		
		
		$fdata["strField"] = "ID"; 
		$fdata["FullName"] = "exemptions.ID";
	
				
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
				$edata["validateAs"]["basicValidate"][] = getJsValidatorName("Number");	
						
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats

		$fdata["isSeparate"] = false;
	
	$tdataDemo_Contract["ID"] = $fdata;

	
$tables_data["Demo Contract"]=&$tdataDemo_Contract;
$field_labels["Demo_Contract"] = &$fieldLabelsDemo_Contract;
$fieldToolTips["Demo Contract"] = &$fieldToolTipsDemo_Contract;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["Demo Contract"] = array();
	
// tables which are master tables for current table (detail)
$masterTablesData["Demo Contract"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










function createSqlQuery_Demo_Contract()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "exemptions.Location,  exemptions.VRM,  exemptions.`Start Date`,  exemptions.EndDate,  exemptions.Reason,  exemptions.make,  exemptions.colour,  exemptions.ID";
$proto0["m_strFrom"] = "FROM exemptions  INNER JOIN isha_streets ON exemptions.Location = isha_streets.Location";
$proto0["m_strWhere"] = "(exemptions.`Start Date` <=CURDATE()) AND (exemptions.EndDate >=CURDATE()) AND (isha_streets.contract =\"DEMO\")";
$proto0["m_strOrderBy"] = "ORDER BY exemptions.VRM";
$proto0["m_strTail"] = "";
$proto0["cipherer"] = null;
$proto1=array();
$proto1["m_sql"] = "(exemptions.`Start Date` <=CURDATE()) AND (exemptions.EndDate >=CURDATE()) AND (isha_streets.contract =\"DEMO\")";
$proto1["m_uniontype"] = "SQLL_AND";
	$obj = new SQLNonParsed(array(
	"m_sql" => "(exemptions.`Start Date` <=CURDATE()) AND (exemptions.EndDate >=CURDATE()) AND (isha_streets.contract =\"DEMO\")"
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
$proto7["m_sql"] = "isha_streets.contract =\"DEMO\"";
$proto7["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "contract",
	"m_strTable" => "isha_streets"
));

$proto7["m_column"]=$obj;
$proto7["m_contained"] = array();
$proto7["m_strCase"] = "=\"DEMO\"";
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
						$proto15=array();
			$obj = new SQLField(array(
	"m_strName" => "Start Date",
	"m_strTable" => "exemptions"
));

$proto15["m_expr"]=$obj;
$proto15["m_alias"] = "";
$obj = new SQLFieldListItem($proto15);

$proto0["m_fieldlist"][]=$obj;
						$proto17=array();
			$obj = new SQLField(array(
	"m_strName" => "EndDate",
	"m_strTable" => "exemptions"
));

$proto17["m_expr"]=$obj;
$proto17["m_alias"] = "";
$obj = new SQLFieldListItem($proto17);

$proto0["m_fieldlist"][]=$obj;
						$proto19=array();
			$obj = new SQLField(array(
	"m_strName" => "Reason",
	"m_strTable" => "exemptions"
));

$proto19["m_expr"]=$obj;
$proto19["m_alias"] = "";
$obj = new SQLFieldListItem($proto19);

$proto0["m_fieldlist"][]=$obj;
						$proto21=array();
			$obj = new SQLField(array(
	"m_strName" => "make",
	"m_strTable" => "exemptions"
));

$proto21["m_expr"]=$obj;
$proto21["m_alias"] = "";
$obj = new SQLFieldListItem($proto21);

$proto0["m_fieldlist"][]=$obj;
						$proto23=array();
			$obj = new SQLField(array(
	"m_strName" => "colour",
	"m_strTable" => "exemptions"
));

$proto23["m_expr"]=$obj;
$proto23["m_alias"] = "";
$obj = new SQLFieldListItem($proto23);

$proto0["m_fieldlist"][]=$obj;
						$proto25=array();
			$obj = new SQLField(array(
	"m_strName" => "ID",
	"m_strTable" => "exemptions"
));

$proto25["m_expr"]=$obj;
$proto25["m_alias"] = "";
$obj = new SQLFieldListItem($proto25);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto27=array();
$proto27["m_link"] = "SQLL_MAIN";
			$proto28=array();
$proto28["m_strName"] = "exemptions";
$proto28["m_columns"] = array();
$proto28["m_columns"][] = "ID";
$proto28["m_columns"][] = "Location";
$proto28["m_columns"][] = "VRM";
$proto28["m_columns"][] = "Start Date";
$proto28["m_columns"][] = "EndDate";
$proto28["m_columns"][] = "Reason";
$proto28["m_columns"][] = "make";
$proto28["m_columns"][] = "colour";
$proto28["m_columns"][] = "contract";
$obj = new SQLTable($proto28);

$proto27["m_table"] = $obj;
$proto27["m_alias"] = "";
$proto29=array();
$proto29["m_sql"] = "";
$proto29["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto29["m_column"]=$obj;
$proto29["m_contained"] = array();
$proto29["m_strCase"] = "";
$proto29["m_havingmode"] = "0";
$proto29["m_inBrackets"] = "0";
$proto29["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto29);

$proto27["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto27);

$proto0["m_fromlist"][]=$obj;
												$proto31=array();
$proto31["m_link"] = "SQLL_INNERJOIN";
			$proto32=array();
$proto32["m_strName"] = "isha_streets";
$proto32["m_columns"] = array();
$proto32["m_columns"][] = "ID";
$proto32["m_columns"][] = "Location";
$proto32["m_columns"][] = "ACTIVE";
$proto32["m_columns"][] = "contract";
$proto32["m_columns"][] = "enfcompany";
$obj = new SQLTable($proto32);

$proto31["m_table"] = $obj;
$proto31["m_alias"] = "";
$proto33=array();
$proto33["m_sql"] = "exemptions.Location = isha_streets.Location";
$proto33["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "Location",
	"m_strTable" => "exemptions"
));

$proto33["m_column"]=$obj;
$proto33["m_contained"] = array();
$proto33["m_strCase"] = "= isha_streets.Location";
$proto33["m_havingmode"] = "0";
$proto33["m_inBrackets"] = "0";
$proto33["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto33);

$proto31["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto31);

$proto0["m_fromlist"][]=$obj;
$proto0["m_groupby"] = array();
$proto0["m_orderby"] = array();
												$proto35=array();
						$obj = new SQLField(array(
	"m_strName" => "VRM",
	"m_strTable" => "exemptions"
));

$proto35["m_column"]=$obj;
$proto35["m_bAsc"] = 1;
$proto35["m_nColumn"] = 0;
$obj = new SQLOrderByItem($proto35);

$proto0["m_orderby"][]=$obj;					
$obj = new SQLQuery($proto0);

	return $obj;
}
$queryData_Demo_Contract = createSqlQuery_Demo_Contract();
								$tdataDemo_Contract[".sqlquery"] = $queryData_Demo_Contract;
	
if(isset($tdataDemo_Contract["field2"])){
	$tdataDemo_Contract["field2"]["LookupTable"] = "carscars_view";
	$tdataDemo_Contract["field2"]["LookupOrderBy"] = "name";
	$tdataDemo_Contract["field2"]["LookupType"] = 4;
	$tdataDemo_Contract["field2"]["LinkField"] = "email";
	$tdataDemo_Contract["field2"]["DisplayField"] = "name";
	$tdataDemo_Contract[".hasCustomViewField"] = true;
}

$tableEvents["Demo Contract"] = new eventsBase;
$tdataDemo_Contract[".hasEvents"] = false;

$cipherer = new RunnerCipherer("Demo Contract");

?>