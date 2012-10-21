<?php
require_once(getabspath("classes/cipherer.php"));
$tdataWest_London_Mental_Health = array();
	$tdataWest_London_Mental_Health[".NumberOfChars"] = 80; 
	$tdataWest_London_Mental_Health[".ShortName"] = "West_London_Mental_Health";
	$tdataWest_London_Mental_Health[".OwnerID"] = "";
	$tdataWest_London_Mental_Health[".OriginalTable"] = "exemptions";

//	field labels
$fieldLabelsWest_London_Mental_Health = array();
if(mlang_getcurrentlang()=="English")
{
	$fieldLabelsWest_London_Mental_Health["English"] = array();
	$fieldToolTipsWest_London_Mental_Health["English"] = array();
	$fieldLabelsWest_London_Mental_Health["English"]["Location"] = "Location";
	$fieldToolTipsWest_London_Mental_Health["English"]["Location"] = "";
	$fieldLabelsWest_London_Mental_Health["English"]["VRM"] = "VRM";
	$fieldToolTipsWest_London_Mental_Health["English"]["VRM"] = "";
	$fieldLabelsWest_London_Mental_Health["English"]["Start_Date"] = "Start Date";
	$fieldToolTipsWest_London_Mental_Health["English"]["Start Date"] = "";
	$fieldLabelsWest_London_Mental_Health["English"]["EndDate"] = "End Date";
	$fieldToolTipsWest_London_Mental_Health["English"]["EndDate"] = "";
	$fieldLabelsWest_London_Mental_Health["English"]["Reason"] = "Reason";
	$fieldToolTipsWest_London_Mental_Health["English"]["Reason"] = "";
	$fieldLabelsWest_London_Mental_Health["English"]["make"] = "Make";
	$fieldToolTipsWest_London_Mental_Health["English"]["make"] = "";
	$fieldLabelsWest_London_Mental_Health["English"]["colour"] = "Colour";
	$fieldToolTipsWest_London_Mental_Health["English"]["colour"] = "";
	$fieldLabelsWest_London_Mental_Health["English"]["ID"] = "ID";
	$fieldToolTipsWest_London_Mental_Health["English"]["ID"] = "";
	$fieldLabelsWest_London_Mental_Health["English"]["location"] = "Location";
	$fieldToolTipsWest_London_Mental_Health["English"]["location"] = "";
	if (count($fieldToolTipsWest_London_Mental_Health["English"]))
		$tdataWest_London_Mental_Health[".isUseToolTips"] = true;
}
	
	
	$tdataWest_London_Mental_Health[".NCSearch"] = true;



$tdataWest_London_Mental_Health[".shortTableName"] = "West_London_Mental_Health";
$tdataWest_London_Mental_Health[".nSecOptions"] = 0;
$tdataWest_London_Mental_Health[".recsPerRowList"] = 1;
$tdataWest_London_Mental_Health[".mainTableOwnerID"] = "";
$tdataWest_London_Mental_Health[".moveNext"] = 1;
$tdataWest_London_Mental_Health[".nType"] = 1;




$tdataWest_London_Mental_Health[".showAddInPopup"] = false;

$tdataWest_London_Mental_Health[".showEditInPopup"] = false;

$tdataWest_London_Mental_Health[".showViewInPopup"] = false;

$tdataWest_London_Mental_Health[".fieldsForRegister"] = array();

$tdataWest_London_Mental_Health[".listAjax"] = false;

	$tdataWest_London_Mental_Health[".audit"] = true;

	$tdataWest_London_Mental_Health[".locking"] = false;

$tdataWest_London_Mental_Health[".listIcons"] = true;

$tdataWest_London_Mental_Health[".exportTo"] = true;

$tdataWest_London_Mental_Health[".printFriendly"] = true;


$tdataWest_London_Mental_Health[".showSimpleSearchOptions"] = false;

$tdataWest_London_Mental_Health[".showSearchPanel"] = true;

if (isMobile())
	$tdataWest_London_Mental_Health[".isUseAjaxSuggest"] = false;
else 
	$tdataWest_London_Mental_Health[".isUseAjaxSuggest"] = true;

$tdataWest_London_Mental_Health[".rowHighlite"] = true;

// button handlers file names

$tdataWest_London_Mental_Health[".addPageEvents"] = false;

// use datepicker for search panel
$tdataWest_London_Mental_Health[".isUseCalendarForSearch"] = true;

// use timepicker for search panel
$tdataWest_London_Mental_Health[".isUseTimeForSearch"] = false;






$tdataWest_London_Mental_Health[".allSearchFields"] = array();

$tdataWest_London_Mental_Health[".allSearchFields"][] = "Location";
$tdataWest_London_Mental_Health[".allSearchFields"][] = "VRM";
$tdataWest_London_Mental_Health[".allSearchFields"][] = "make";
$tdataWest_London_Mental_Health[".allSearchFields"][] = "colour";
$tdataWest_London_Mental_Health[".allSearchFields"][] = "Start Date";
$tdataWest_London_Mental_Health[".allSearchFields"][] = "EndDate";
$tdataWest_London_Mental_Health[".allSearchFields"][] = "Reason";

$tdataWest_London_Mental_Health[".googleLikeFields"][] = "ID";
$tdataWest_London_Mental_Health[".googleLikeFields"][] = "Location";
$tdataWest_London_Mental_Health[".googleLikeFields"][] = "VRM";
$tdataWest_London_Mental_Health[".googleLikeFields"][] = "make";
$tdataWest_London_Mental_Health[".googleLikeFields"][] = "colour";
$tdataWest_London_Mental_Health[".googleLikeFields"][] = "Start Date";
$tdataWest_London_Mental_Health[".googleLikeFields"][] = "EndDate";
$tdataWest_London_Mental_Health[".googleLikeFields"][] = "Reason";


$tdataWest_London_Mental_Health[".advSearchFields"][] = "Location";
$tdataWest_London_Mental_Health[".advSearchFields"][] = "VRM";
$tdataWest_London_Mental_Health[".advSearchFields"][] = "make";
$tdataWest_London_Mental_Health[".advSearchFields"][] = "colour";
$tdataWest_London_Mental_Health[".advSearchFields"][] = "Start Date";
$tdataWest_London_Mental_Health[".advSearchFields"][] = "EndDate";
$tdataWest_London_Mental_Health[".advSearchFields"][] = "Reason";

$tdataWest_London_Mental_Health[".isTableType"] = "list";

	



// Access doesn't support subqueries from the same table as main



$tdataWest_London_Mental_Health[".pageSize"] = 20;

$tstrOrderBy = "ORDER BY exemptions.VRM";
if(strlen($tstrOrderBy) && strtolower(substr($tstrOrderBy,0,8))!="order by")
	$tstrOrderBy = "order by ".$tstrOrderBy;
$tdataWest_London_Mental_Health[".strOrderBy"] = $tstrOrderBy;

$tdataWest_London_Mental_Health[".orderindexes"] = array();
$tdataWest_London_Mental_Health[".orderindexes"][] = array(2, (1 ? "ASC" : "DESC"), "exemptions.VRM");

$tdataWest_London_Mental_Health[".sqlHead"] = "SELECT exemptions.Location,  exemptions.VRM,  exemptions.`Start Date`,  exemptions.EndDate,  exemptions.Reason,  exemptions.make,  exemptions.colour,  exemptions.ID";
$tdataWest_London_Mental_Health[".sqlFrom"] = "FROM exemptions  INNER JOIN isha_streets ON exemptions.Location = isha_streets.Location";
$tdataWest_London_Mental_Health[".sqlWhereExpr"] = "(exemptions.`Start Date` <=CURDATE()) AND (exemptions.EndDate >=CURDATE()) AND (isha_streets.contract =\"WLMH\")";
$tdataWest_London_Mental_Health[".sqlTail"] = "";




//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdataWest_London_Mental_Health[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdataWest_London_Mental_Health[".arrGroupsPerPage"] = $arrGPP;

$tableKeysWest_London_Mental_Health = array();
$tableKeysWest_London_Mental_Health[] = "ID";
$tdataWest_London_Mental_Health[".Keys"] = $tableKeysWest_London_Mental_Health;

$tdataWest_London_Mental_Health[".listFields"] = array();
$tdataWest_London_Mental_Health[".listFields"][] = "Location";
$tdataWest_London_Mental_Health[".listFields"][] = "VRM";
$tdataWest_London_Mental_Health[".listFields"][] = "make";
$tdataWest_London_Mental_Health[".listFields"][] = "colour";
$tdataWest_London_Mental_Health[".listFields"][] = "Start Date";
$tdataWest_London_Mental_Health[".listFields"][] = "EndDate";
$tdataWest_London_Mental_Health[".listFields"][] = "Reason";

$tdataWest_London_Mental_Health[".addFields"] = array();
$tdataWest_London_Mental_Health[".addFields"][] = "Location";
$tdataWest_London_Mental_Health[".addFields"][] = "VRM";
$tdataWest_London_Mental_Health[".addFields"][] = "make";
$tdataWest_London_Mental_Health[".addFields"][] = "colour";
$tdataWest_London_Mental_Health[".addFields"][] = "Start Date";
$tdataWest_London_Mental_Health[".addFields"][] = "EndDate";
$tdataWest_London_Mental_Health[".addFields"][] = "Reason";

$tdataWest_London_Mental_Health[".inlineAddFields"] = array();

$tdataWest_London_Mental_Health[".editFields"] = array();

$tdataWest_London_Mental_Health[".inlineEditFields"] = array();

$tdataWest_London_Mental_Health[".exportFields"] = array();
$tdataWest_London_Mental_Health[".exportFields"][] = "Location";
$tdataWest_London_Mental_Health[".exportFields"][] = "VRM";
$tdataWest_London_Mental_Health[".exportFields"][] = "make";
$tdataWest_London_Mental_Health[".exportFields"][] = "colour";
$tdataWest_London_Mental_Health[".exportFields"][] = "Start Date";
$tdataWest_London_Mental_Health[".exportFields"][] = "EndDate";
$tdataWest_London_Mental_Health[".exportFields"][] = "Reason";
	
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
	
		
		$edata["LookupWhere"] = "contract = 'WLMH'";
	
		
		
		
				
	
	
	//	End Lookup Settings

		$edata["IsRequired"] = true; 
	
		
		
		
		
		
		
		
//	Begin validation
	$edata["validateAs"] = array();
						$edata["validateAs"]["basicValidate"][] = "IsRequired";
	
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats

		$fdata["isSeparate"] = false;
	
	$tdataWest_London_Mental_Health["Location"] = $fdata;
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
	
	$tdataWest_London_Mental_Health["VRM"] = $fdata;
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

		
		
		
		
		
		$edata["DateEditType"] = 13; 
	$edata["InitialYearFactor"] = 0; 
	$edata["LastYearFactor"] = 2; 
	
		
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats

		$fdata["isSeparate"] = false;
	
	$tdataWest_London_Mental_Health["Start Date"] = $fdata;
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

		
		
		
		
		
		$edata["DateEditType"] = 13; 
	$edata["InitialYearFactor"] = 0; 
	$edata["LastYearFactor"] = 2; 
	
		
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats

		$fdata["isSeparate"] = false;
	
	$tdataWest_London_Mental_Health["EndDate"] = $fdata;
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
	
	$tdataWest_London_Mental_Health["Reason"] = $fdata;
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
	
	$edata = array("EditFormat" => "Text field");
	
		
		
		
	
//	Begin Lookup settings
	//	End Lookup Settings

		
		
		
		
		
		
		
		$edata["EditParams"] = "";
			$edata["EditParams"].= " maxlength=20";
			
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats

		$fdata["isSeparate"] = false;
	
	$tdataWest_London_Mental_Health["make"] = $fdata;
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
	
	$edata = array("EditFormat" => "Text field");
	
		
		
		
	
//	Begin Lookup settings
	//	End Lookup Settings

		
		
		
		
		
		
		
		$edata["EditParams"] = "";
			$edata["EditParams"].= " maxlength=20";
			
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats

		$fdata["isSeparate"] = false;
	
	$tdataWest_London_Mental_Health["colour"] = $fdata;
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
	
	$tdataWest_London_Mental_Health["ID"] = $fdata;

	
$tables_data["West London Mental Health"]=&$tdataWest_London_Mental_Health;
$field_labels["West_London_Mental_Health"] = &$fieldLabelsWest_London_Mental_Health;
$fieldToolTips["West London Mental Health"] = &$fieldToolTipsWest_London_Mental_Health;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["West London Mental Health"] = array();
	
// tables which are master tables for current table (detail)
$masterTablesData["West London Mental Health"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










function createSqlQuery_West_London_Mental_Health()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "exemptions.Location,  exemptions.VRM,  exemptions.`Start Date`,  exemptions.EndDate,  exemptions.Reason,  exemptions.make,  exemptions.colour,  exemptions.ID";
$proto0["m_strFrom"] = "FROM exemptions  INNER JOIN isha_streets ON exemptions.Location = isha_streets.Location";
$proto0["m_strWhere"] = "(exemptions.`Start Date` <=CURDATE()) AND (exemptions.EndDate >=CURDATE()) AND (isha_streets.contract =\"WLMH\")";
$proto0["m_strOrderBy"] = "ORDER BY exemptions.VRM";
$proto0["m_strTail"] = "";
$proto0["cipherer"] = null;
$proto1=array();
$proto1["m_sql"] = "(exemptions.`Start Date` <=CURDATE()) AND (exemptions.EndDate >=CURDATE()) AND (isha_streets.contract =\"WLMH\")";
$proto1["m_uniontype"] = "SQLL_AND";
	$obj = new SQLNonParsed(array(
	"m_sql" => "(exemptions.`Start Date` <=CURDATE()) AND (exemptions.EndDate >=CURDATE()) AND (isha_streets.contract =\"WLMH\")"
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
$proto7["m_sql"] = "isha_streets.contract =\"WLMH\"";
$proto7["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "contract",
	"m_strTable" => "isha_streets"
));

$proto7["m_column"]=$obj;
$proto7["m_contained"] = array();
$proto7["m_strCase"] = "=\"WLMH\"";
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
$queryData_West_London_Mental_Health = createSqlQuery_West_London_Mental_Health();
								$tdataWest_London_Mental_Health[".sqlquery"] = $queryData_West_London_Mental_Health;
	
if(isset($tdataWest_London_Mental_Health["field2"])){
	$tdataWest_London_Mental_Health["field2"]["LookupTable"] = "carscars_view";
	$tdataWest_London_Mental_Health["field2"]["LookupOrderBy"] = "name";
	$tdataWest_London_Mental_Health["field2"]["LookupType"] = 4;
	$tdataWest_London_Mental_Health["field2"]["LinkField"] = "email";
	$tdataWest_London_Mental_Health["field2"]["DisplayField"] = "name";
	$tdataWest_London_Mental_Health[".hasCustomViewField"] = true;
}

$tableEvents["West London Mental Health"] = new eventsBase;
$tdataWest_London_Mental_Health[".hasEvents"] = false;

$cipherer = new RunnerCipherer("West London Mental Health");

?>