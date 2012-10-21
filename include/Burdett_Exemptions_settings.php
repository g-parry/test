<?php
require_once(getabspath("classes/cipherer.php"));
$tdataBurdett_Exemptions = array();
	$tdataBurdett_Exemptions[".NumberOfChars"] = 80; 
	$tdataBurdett_Exemptions[".ShortName"] = "Burdett_Exemptions";
	$tdataBurdett_Exemptions[".OwnerID"] = "";
	$tdataBurdett_Exemptions[".OriginalTable"] = "exemptions";

//	field labels
$fieldLabelsBurdett_Exemptions = array();
if(mlang_getcurrentlang()=="English")
{
	$fieldLabelsBurdett_Exemptions["English"] = array();
	$fieldToolTipsBurdett_Exemptions["English"] = array();
	$fieldLabelsBurdett_Exemptions["English"]["Location"] = "Location";
	$fieldToolTipsBurdett_Exemptions["English"]["Location"] = "";
	$fieldLabelsBurdett_Exemptions["English"]["VRM"] = "VRM";
	$fieldToolTipsBurdett_Exemptions["English"]["VRM"] = "";
	$fieldLabelsBurdett_Exemptions["English"]["Start_Date"] = "Start Date";
	$fieldToolTipsBurdett_Exemptions["English"]["Start Date"] = "";
	$fieldLabelsBurdett_Exemptions["English"]["EndDate"] = "End Date";
	$fieldToolTipsBurdett_Exemptions["English"]["EndDate"] = "";
	$fieldLabelsBurdett_Exemptions["English"]["Reason"] = "Reason";
	$fieldToolTipsBurdett_Exemptions["English"]["Reason"] = "";
	$fieldLabelsBurdett_Exemptions["English"]["make"] = "Make";
	$fieldToolTipsBurdett_Exemptions["English"]["make"] = "";
	$fieldLabelsBurdett_Exemptions["English"]["colour"] = "Colour";
	$fieldToolTipsBurdett_Exemptions["English"]["colour"] = "";
	$fieldLabelsBurdett_Exemptions["English"]["ID"] = "ID";
	$fieldToolTipsBurdett_Exemptions["English"]["ID"] = "";
	if (count($fieldToolTipsBurdett_Exemptions["English"]))
		$tdataBurdett_Exemptions[".isUseToolTips"] = true;
}
	
	
	$tdataBurdett_Exemptions[".NCSearch"] = true;



$tdataBurdett_Exemptions[".shortTableName"] = "Burdett_Exemptions";
$tdataBurdett_Exemptions[".nSecOptions"] = 0;
$tdataBurdett_Exemptions[".recsPerRowList"] = 1;
$tdataBurdett_Exemptions[".mainTableOwnerID"] = "";
$tdataBurdett_Exemptions[".moveNext"] = 1;
$tdataBurdett_Exemptions[".nType"] = 1;




$tdataBurdett_Exemptions[".showAddInPopup"] = false;

$tdataBurdett_Exemptions[".showEditInPopup"] = false;

$tdataBurdett_Exemptions[".showViewInPopup"] = false;

$tdataBurdett_Exemptions[".fieldsForRegister"] = array();

$tdataBurdett_Exemptions[".listAjax"] = false;

	$tdataBurdett_Exemptions[".audit"] = true;

	$tdataBurdett_Exemptions[".locking"] = false;

$tdataBurdett_Exemptions[".listIcons"] = true;

$tdataBurdett_Exemptions[".exportTo"] = true;

$tdataBurdett_Exemptions[".printFriendly"] = true;


$tdataBurdett_Exemptions[".showSimpleSearchOptions"] = false;

$tdataBurdett_Exemptions[".showSearchPanel"] = true;

if (isMobile())
	$tdataBurdett_Exemptions[".isUseAjaxSuggest"] = false;
else 
	$tdataBurdett_Exemptions[".isUseAjaxSuggest"] = true;

$tdataBurdett_Exemptions[".rowHighlite"] = true;

// button handlers file names

$tdataBurdett_Exemptions[".addPageEvents"] = false;

// use datepicker for search panel
$tdataBurdett_Exemptions[".isUseCalendarForSearch"] = true;

// use timepicker for search panel
$tdataBurdett_Exemptions[".isUseTimeForSearch"] = false;






$tdataBurdett_Exemptions[".allSearchFields"] = array();

$tdataBurdett_Exemptions[".allSearchFields"][] = "Location";
$tdataBurdett_Exemptions[".allSearchFields"][] = "VRM";
$tdataBurdett_Exemptions[".allSearchFields"][] = "make";
$tdataBurdett_Exemptions[".allSearchFields"][] = "colour";
$tdataBurdett_Exemptions[".allSearchFields"][] = "Start Date";
$tdataBurdett_Exemptions[".allSearchFields"][] = "EndDate";
$tdataBurdett_Exemptions[".allSearchFields"][] = "Reason";

$tdataBurdett_Exemptions[".googleLikeFields"][] = "ID";
$tdataBurdett_Exemptions[".googleLikeFields"][] = "Location";
$tdataBurdett_Exemptions[".googleLikeFields"][] = "VRM";
$tdataBurdett_Exemptions[".googleLikeFields"][] = "make";
$tdataBurdett_Exemptions[".googleLikeFields"][] = "colour";
$tdataBurdett_Exemptions[".googleLikeFields"][] = "Start Date";
$tdataBurdett_Exemptions[".googleLikeFields"][] = "EndDate";
$tdataBurdett_Exemptions[".googleLikeFields"][] = "Reason";


$tdataBurdett_Exemptions[".advSearchFields"][] = "Location";
$tdataBurdett_Exemptions[".advSearchFields"][] = "VRM";
$tdataBurdett_Exemptions[".advSearchFields"][] = "make";
$tdataBurdett_Exemptions[".advSearchFields"][] = "colour";
$tdataBurdett_Exemptions[".advSearchFields"][] = "Start Date";
$tdataBurdett_Exemptions[".advSearchFields"][] = "EndDate";
$tdataBurdett_Exemptions[".advSearchFields"][] = "Reason";

$tdataBurdett_Exemptions[".isTableType"] = "list";

	



// Access doesn't support subqueries from the same table as main



$tdataBurdett_Exemptions[".pageSize"] = 20;

$tstrOrderBy = "ORDER BY exemptions.VRM";
if(strlen($tstrOrderBy) && strtolower(substr($tstrOrderBy,0,8))!="order by")
	$tstrOrderBy = "order by ".$tstrOrderBy;
$tdataBurdett_Exemptions[".strOrderBy"] = $tstrOrderBy;

$tdataBurdett_Exemptions[".orderindexes"] = array();
$tdataBurdett_Exemptions[".orderindexes"][] = array(2, (1 ? "ASC" : "DESC"), "exemptions.VRM");

$tdataBurdett_Exemptions[".sqlHead"] = "SELECT exemptions.Location,  exemptions.VRM,  exemptions.`Start Date`,  exemptions.EndDate,  exemptions.Reason,  exemptions.make,  exemptions.colour,  exemptions.ID";
$tdataBurdett_Exemptions[".sqlFrom"] = "FROM exemptions  INNER JOIN isha_streets ON exemptions.Location = isha_streets.Location";
$tdataBurdett_Exemptions[".sqlWhereExpr"] = "(exemptions.`Start Date` <=CURDATE()) AND (exemptions.EndDate >=CURDATE()) AND (isha_streets.contract =\"Burdett\")";
$tdataBurdett_Exemptions[".sqlTail"] = "";




//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdataBurdett_Exemptions[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdataBurdett_Exemptions[".arrGroupsPerPage"] = $arrGPP;

$tableKeysBurdett_Exemptions = array();
$tableKeysBurdett_Exemptions[] = "ID";
$tdataBurdett_Exemptions[".Keys"] = $tableKeysBurdett_Exemptions;

$tdataBurdett_Exemptions[".listFields"] = array();
$tdataBurdett_Exemptions[".listFields"][] = "Location";
$tdataBurdett_Exemptions[".listFields"][] = "VRM";
$tdataBurdett_Exemptions[".listFields"][] = "make";
$tdataBurdett_Exemptions[".listFields"][] = "colour";
$tdataBurdett_Exemptions[".listFields"][] = "Start Date";
$tdataBurdett_Exemptions[".listFields"][] = "EndDate";
$tdataBurdett_Exemptions[".listFields"][] = "Reason";

$tdataBurdett_Exemptions[".addFields"] = array();
$tdataBurdett_Exemptions[".addFields"][] = "Location";
$tdataBurdett_Exemptions[".addFields"][] = "VRM";
$tdataBurdett_Exemptions[".addFields"][] = "make";
$tdataBurdett_Exemptions[".addFields"][] = "colour";
$tdataBurdett_Exemptions[".addFields"][] = "Start Date";
$tdataBurdett_Exemptions[".addFields"][] = "EndDate";
$tdataBurdett_Exemptions[".addFields"][] = "Reason";

$tdataBurdett_Exemptions[".inlineAddFields"] = array();

$tdataBurdett_Exemptions[".editFields"] = array();

$tdataBurdett_Exemptions[".inlineEditFields"] = array();

$tdataBurdett_Exemptions[".exportFields"] = array();
$tdataBurdett_Exemptions[".exportFields"][] = "Location";
$tdataBurdett_Exemptions[".exportFields"][] = "VRM";
$tdataBurdett_Exemptions[".exportFields"][] = "make";
$tdataBurdett_Exemptions[".exportFields"][] = "colour";
$tdataBurdett_Exemptions[".exportFields"][] = "Start Date";
$tdataBurdett_Exemptions[".exportFields"][] = "EndDate";
$tdataBurdett_Exemptions[".exportFields"][] = "Reason";
	
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
	$edata["LookupOrderBy"] = "Location";
	
		
		$edata["LookupWhere"] = "contract like 'Burdett'";
	
		
		
		
				
	
	
	//	End Lookup Settings

		$edata["IsRequired"] = true; 
	
		
		
		
		
		
		
		
//	Begin validation
	$edata["validateAs"] = array();
						$edata["validateAs"]["basicValidate"][] = "IsRequired";
	
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats

		$fdata["isSeparate"] = false;
	
	$tdataBurdett_Exemptions["Location"] = $fdata;
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

		
		
		
		
		
		
		
		$edata["EditParams"] = "";
			$edata["EditParams"].= " maxlength=15";
			
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats

		$fdata["isSeparate"] = false;
	
	$tdataBurdett_Exemptions["VRM"] = $fdata;
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
	
		
		
		$edata["AutoUpdate"] = true; 
	
	
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
	
	$tdataBurdett_Exemptions["Start Date"] = $fdata;
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
	
		
		
		$edata["AutoUpdate"] = true; 
	
	
//	Begin Lookup settings
	//	End Lookup Settings

		
		
		
		
		
		$edata["DateEditType"] = 13; 
	$edata["InitialYearFactor"] = 0; 
	$edata["LastYearFactor"] = 2; 
	
		
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats

		$fdata["isSeparate"] = false;
	
	$tdataBurdett_Exemptions["EndDate"] = $fdata;
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
	
	$tdataBurdett_Exemptions["Reason"] = $fdata;
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
	
	$tdataBurdett_Exemptions["make"] = $fdata;
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
	
	$tdataBurdett_Exemptions["colour"] = $fdata;
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
	
	$tdataBurdett_Exemptions["ID"] = $fdata;

	
$tables_data["Burdett Exemptions"]=&$tdataBurdett_Exemptions;
$field_labels["Burdett_Exemptions"] = &$fieldLabelsBurdett_Exemptions;
$fieldToolTips["Burdett Exemptions"] = &$fieldToolTipsBurdett_Exemptions;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["Burdett Exemptions"] = array();
	
// tables which are master tables for current table (detail)
$masterTablesData["Burdett Exemptions"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










function createSqlQuery_Burdett_Exemptions()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "exemptions.Location,  exemptions.VRM,  exemptions.`Start Date`,  exemptions.EndDate,  exemptions.Reason,  exemptions.make,  exemptions.colour,  exemptions.ID";
$proto0["m_strFrom"] = "FROM exemptions  INNER JOIN isha_streets ON exemptions.Location = isha_streets.Location";
$proto0["m_strWhere"] = "(exemptions.`Start Date` <=CURDATE()) AND (exemptions.EndDate >=CURDATE()) AND (isha_streets.contract =\"Burdett\")";
$proto0["m_strOrderBy"] = "ORDER BY exemptions.VRM";
$proto0["m_strTail"] = "";
$proto0["cipherer"] = null;
$proto1=array();
$proto1["m_sql"] = "(exemptions.`Start Date` <=CURDATE()) AND (exemptions.EndDate >=CURDATE()) AND (isha_streets.contract =\"Burdett\")";
$proto1["m_uniontype"] = "SQLL_AND";
	$obj = new SQLNonParsed(array(
	"m_sql" => "(exemptions.`Start Date` <=CURDATE()) AND (exemptions.EndDate >=CURDATE()) AND (isha_streets.contract =\"Burdett\")"
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
$proto7["m_sql"] = "isha_streets.contract =\"Burdett\"";
$proto7["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "contract",
	"m_strTable" => "isha_streets"
));

$proto7["m_column"]=$obj;
$proto7["m_contained"] = array();
$proto7["m_strCase"] = "=\"Burdett\"";
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
$queryData_Burdett_Exemptions = createSqlQuery_Burdett_Exemptions();
								$tdataBurdett_Exemptions[".sqlquery"] = $queryData_Burdett_Exemptions;
	
if(isset($tdataBurdett_Exemptions["field2"])){
	$tdataBurdett_Exemptions["field2"]["LookupTable"] = "carscars_view";
	$tdataBurdett_Exemptions["field2"]["LookupOrderBy"] = "name";
	$tdataBurdett_Exemptions["field2"]["LookupType"] = 4;
	$tdataBurdett_Exemptions["field2"]["LinkField"] = "email";
	$tdataBurdett_Exemptions["field2"]["DisplayField"] = "name";
	$tdataBurdett_Exemptions[".hasCustomViewField"] = true;
}

$tableEvents["Burdett Exemptions"] = new eventsBase;
$tdataBurdett_Exemptions[".hasEvents"] = false;

$cipherer = new RunnerCipherer("Burdett Exemptions");

?>