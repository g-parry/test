<?php
require_once(getabspath("classes/cipherer.php"));
$tdataLeopold = array();
	$tdataLeopold[".NumberOfChars"] = 80; 
	$tdataLeopold[".ShortName"] = "Leopold";
	$tdataLeopold[".OwnerID"] = "";
	$tdataLeopold[".OriginalTable"] = "exemptions";

//	field labels
$fieldLabelsLeopold = array();
if(mlang_getcurrentlang()=="English")
{
	$fieldLabelsLeopold["English"] = array();
	$fieldToolTipsLeopold["English"] = array();
	$fieldLabelsLeopold["English"]["Location"] = "Location";
	$fieldToolTipsLeopold["English"]["Location"] = "";
	$fieldLabelsLeopold["English"]["VRM"] = "VRM";
	$fieldToolTipsLeopold["English"]["VRM"] = "";
	$fieldLabelsLeopold["English"]["Start_Date"] = "Start Date";
	$fieldToolTipsLeopold["English"]["Start Date"] = "";
	$fieldLabelsLeopold["English"]["EndDate"] = "End Date";
	$fieldToolTipsLeopold["English"]["EndDate"] = "";
	$fieldLabelsLeopold["English"]["Reason"] = "Reason";
	$fieldToolTipsLeopold["English"]["Reason"] = "";
	$fieldLabelsLeopold["English"]["make"] = "Make";
	$fieldToolTipsLeopold["English"]["make"] = "";
	$fieldLabelsLeopold["English"]["colour"] = "Colour";
	$fieldToolTipsLeopold["English"]["colour"] = "";
	$fieldLabelsLeopold["English"]["contract"] = "Contract";
	$fieldToolTipsLeopold["English"]["contract"] = "";
	$fieldLabelsLeopold["English"]["ID"] = "ID";
	$fieldToolTipsLeopold["English"]["ID"] = "";
	if (count($fieldToolTipsLeopold["English"]))
		$tdataLeopold[".isUseToolTips"] = true;
}
	
	
	$tdataLeopold[".NCSearch"] = true;



$tdataLeopold[".shortTableName"] = "Leopold";
$tdataLeopold[".nSecOptions"] = 0;
$tdataLeopold[".recsPerRowList"] = 1;
$tdataLeopold[".mainTableOwnerID"] = "";
$tdataLeopold[".moveNext"] = 1;
$tdataLeopold[".nType"] = 1;




$tdataLeopold[".showAddInPopup"] = false;

$tdataLeopold[".showEditInPopup"] = false;

$tdataLeopold[".showViewInPopup"] = false;

$tdataLeopold[".fieldsForRegister"] = array();

$tdataLeopold[".listAjax"] = false;

	$tdataLeopold[".audit"] = true;

	$tdataLeopold[".locking"] = false;

$tdataLeopold[".listIcons"] = true;

$tdataLeopold[".exportTo"] = true;

$tdataLeopold[".printFriendly"] = true;


$tdataLeopold[".showSimpleSearchOptions"] = false;

$tdataLeopold[".showSearchPanel"] = true;

if (isMobile())
	$tdataLeopold[".isUseAjaxSuggest"] = false;
else 
	$tdataLeopold[".isUseAjaxSuggest"] = true;

$tdataLeopold[".rowHighlite"] = true;

// button handlers file names

$tdataLeopold[".addPageEvents"] = false;

// use datepicker for search panel
$tdataLeopold[".isUseCalendarForSearch"] = true;

// use timepicker for search panel
$tdataLeopold[".isUseTimeForSearch"] = false;






$tdataLeopold[".allSearchFields"] = array();

$tdataLeopold[".allSearchFields"][] = "Location";
$tdataLeopold[".allSearchFields"][] = "VRM";
$tdataLeopold[".allSearchFields"][] = "Start Date";
$tdataLeopold[".allSearchFields"][] = "EndDate";
$tdataLeopold[".allSearchFields"][] = "Reason";
$tdataLeopold[".allSearchFields"][] = "make";
$tdataLeopold[".allSearchFields"][] = "colour";

$tdataLeopold[".googleLikeFields"][] = "Location";
$tdataLeopold[".googleLikeFields"][] = "VRM";
$tdataLeopold[".googleLikeFields"][] = "Start Date";
$tdataLeopold[".googleLikeFields"][] = "EndDate";
$tdataLeopold[".googleLikeFields"][] = "Reason";
$tdataLeopold[".googleLikeFields"][] = "make";
$tdataLeopold[".googleLikeFields"][] = "colour";
$tdataLeopold[".googleLikeFields"][] = "contract";
$tdataLeopold[".googleLikeFields"][] = "ID";


$tdataLeopold[".advSearchFields"][] = "Location";
$tdataLeopold[".advSearchFields"][] = "VRM";
$tdataLeopold[".advSearchFields"][] = "Start Date";
$tdataLeopold[".advSearchFields"][] = "EndDate";
$tdataLeopold[".advSearchFields"][] = "Reason";
$tdataLeopold[".advSearchFields"][] = "make";
$tdataLeopold[".advSearchFields"][] = "colour";

$tdataLeopold[".isTableType"] = "list";

	



// Access doesn't support subqueries from the same table as main



$tdataLeopold[".pageSize"] = 20;

$tstrOrderBy = "";
if(strlen($tstrOrderBy) && strtolower(substr($tstrOrderBy,0,8))!="order by")
	$tstrOrderBy = "order by ".$tstrOrderBy;
$tdataLeopold[".strOrderBy"] = $tstrOrderBy;

$tdataLeopold[".orderindexes"] = array();

$tdataLeopold[".sqlHead"] = "SELECT exemptions.Location,  exemptions.VRM,  exemptions.`Start Date`,  exemptions.EndDate,  exemptions.Reason,  exemptions.make,  exemptions.colour,  isha_streets.contract,  exemptions.ID";
$tdataLeopold[".sqlFrom"] = "FROM exemptions  INNER JOIN isha_streets ON exemptions.Location = isha_streets.Location";
$tdataLeopold[".sqlWhereExpr"] = "(exemptions.`Start Date` <=CURDATE()) AND (exemptions.EndDate >=CURDATE()) AND (isha_streets.contract =\"Leopold\")";
$tdataLeopold[".sqlTail"] = "";




//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdataLeopold[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdataLeopold[".arrGroupsPerPage"] = $arrGPP;

$tableKeysLeopold = array();
$tableKeysLeopold[] = "ID";
$tdataLeopold[".Keys"] = $tableKeysLeopold;

$tdataLeopold[".listFields"] = array();
$tdataLeopold[".listFields"][] = "Location";
$tdataLeopold[".listFields"][] = "VRM";
$tdataLeopold[".listFields"][] = "make";
$tdataLeopold[".listFields"][] = "colour";
$tdataLeopold[".listFields"][] = "Start Date";
$tdataLeopold[".listFields"][] = "EndDate";
$tdataLeopold[".listFields"][] = "Reason";

$tdataLeopold[".addFields"] = array();
$tdataLeopold[".addFields"][] = "Location";
$tdataLeopold[".addFields"][] = "VRM";
$tdataLeopold[".addFields"][] = "make";
$tdataLeopold[".addFields"][] = "colour";
$tdataLeopold[".addFields"][] = "Start Date";
$tdataLeopold[".addFields"][] = "EndDate";
$tdataLeopold[".addFields"][] = "Reason";

$tdataLeopold[".inlineAddFields"] = array();

$tdataLeopold[".editFields"] = array();

$tdataLeopold[".inlineEditFields"] = array();

$tdataLeopold[".exportFields"] = array();
$tdataLeopold[".exportFields"][] = "Location";
$tdataLeopold[".exportFields"][] = "VRM";
$tdataLeopold[".exportFields"][] = "Start Date";
$tdataLeopold[".exportFields"][] = "EndDate";
$tdataLeopold[".exportFields"][] = "Reason";
$tdataLeopold[".exportFields"][] = "make";
$tdataLeopold[".exportFields"][] = "colour";
	
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
	
		
		$edata["LookupWhere"] = "contract = 'Leopold'";
	
		
		
		
				
	
	
	//	End Lookup Settings

		$edata["IsRequired"] = true; 
	
		
		
		
		
		
		
		
//	Begin validation
	$edata["validateAs"] = array();
						$edata["validateAs"]["basicValidate"][] = "IsRequired";
	
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats

		$fdata["isSeparate"] = false;
	
	$tdataLeopold["Location"] = $fdata;
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
	
	$tdataLeopold["VRM"] = $fdata;
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
	
	$tdataLeopold["Start Date"] = $fdata;
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
	
	$tdataLeopold["EndDate"] = $fdata;
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
	
	$tdataLeopold["Reason"] = $fdata;
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
	
	$tdataLeopold["make"] = $fdata;
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
	
	$tdataLeopold["colour"] = $fdata;
//	contract
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 8;
	$fdata["strName"] = "contract";
	$fdata["GoodName"] = "contract";
	$fdata["ownerTable"] = "isha_streets";
	$fdata["Label"] = "Contract"; 
	$fdata["FieldType"] = 200;
	
		
		
		
		
		
		
		
		
		
		
		
		$fdata["strField"] = "contract"; 
		$fdata["FullName"] = "isha_streets.contract";
	
				
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
	
	$tdataLeopold["contract"] = $fdata;
//	ID
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 9;
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
	
	$tdataLeopold["ID"] = $fdata;

	
$tables_data["Leopold"]=&$tdataLeopold;
$field_labels["Leopold"] = &$fieldLabelsLeopold;
$fieldToolTips["Leopold"] = &$fieldToolTipsLeopold;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["Leopold"] = array();
	
// tables which are master tables for current table (detail)
$masterTablesData["Leopold"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










function createSqlQuery_Leopold()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "exemptions.Location,  exemptions.VRM,  exemptions.`Start Date`,  exemptions.EndDate,  exemptions.Reason,  exemptions.make,  exemptions.colour,  isha_streets.contract,  exemptions.ID";
$proto0["m_strFrom"] = "FROM exemptions  INNER JOIN isha_streets ON exemptions.Location = isha_streets.Location";
$proto0["m_strWhere"] = "(exemptions.`Start Date` <=CURDATE()) AND (exemptions.EndDate >=CURDATE()) AND (isha_streets.contract =\"Leopold\")";
$proto0["m_strOrderBy"] = "";
$proto0["m_strTail"] = "";
$proto0["cipherer"] = null;
$proto1=array();
$proto1["m_sql"] = "(exemptions.`Start Date` <=CURDATE()) AND (exemptions.EndDate >=CURDATE()) AND (isha_streets.contract =\"Leopold\")";
$proto1["m_uniontype"] = "SQLL_AND";
	$obj = new SQLNonParsed(array(
	"m_sql" => "(exemptions.`Start Date` <=CURDATE()) AND (exemptions.EndDate >=CURDATE()) AND (isha_streets.contract =\"Leopold\")"
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
$proto7["m_sql"] = "isha_streets.contract =\"Leopold\"";
$proto7["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "contract",
	"m_strTable" => "isha_streets"
));

$proto7["m_column"]=$obj;
$proto7["m_contained"] = array();
$proto7["m_strCase"] = "=\"Leopold\"";
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
	"m_strName" => "contract",
	"m_strTable" => "isha_streets"
));

$proto25["m_expr"]=$obj;
$proto25["m_alias"] = "";
$obj = new SQLFieldListItem($proto25);

$proto0["m_fieldlist"][]=$obj;
						$proto27=array();
			$obj = new SQLField(array(
	"m_strName" => "ID",
	"m_strTable" => "exemptions"
));

$proto27["m_expr"]=$obj;
$proto27["m_alias"] = "";
$obj = new SQLFieldListItem($proto27);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto29=array();
$proto29["m_link"] = "SQLL_MAIN";
			$proto30=array();
$proto30["m_strName"] = "exemptions";
$proto30["m_columns"] = array();
$proto30["m_columns"][] = "ID";
$proto30["m_columns"][] = "Location";
$proto30["m_columns"][] = "VRM";
$proto30["m_columns"][] = "Start Date";
$proto30["m_columns"][] = "EndDate";
$proto30["m_columns"][] = "Reason";
$proto30["m_columns"][] = "make";
$proto30["m_columns"][] = "colour";
$proto30["m_columns"][] = "contract";
$obj = new SQLTable($proto30);

$proto29["m_table"] = $obj;
$proto29["m_alias"] = "";
$proto31=array();
$proto31["m_sql"] = "";
$proto31["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto31["m_column"]=$obj;
$proto31["m_contained"] = array();
$proto31["m_strCase"] = "";
$proto31["m_havingmode"] = "0";
$proto31["m_inBrackets"] = "0";
$proto31["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto31);

$proto29["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto29);

$proto0["m_fromlist"][]=$obj;
												$proto33=array();
$proto33["m_link"] = "SQLL_INNERJOIN";
			$proto34=array();
$proto34["m_strName"] = "isha_streets";
$proto34["m_columns"] = array();
$proto34["m_columns"][] = "ID";
$proto34["m_columns"][] = "Location";
$proto34["m_columns"][] = "ACTIVE";
$proto34["m_columns"][] = "contract";
$proto34["m_columns"][] = "enfcompany";
$obj = new SQLTable($proto34);

$proto33["m_table"] = $obj;
$proto33["m_alias"] = "";
$proto35=array();
$proto35["m_sql"] = "exemptions.Location = isha_streets.Location";
$proto35["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "Location",
	"m_strTable" => "exemptions"
));

$proto35["m_column"]=$obj;
$proto35["m_contained"] = array();
$proto35["m_strCase"] = "= isha_streets.Location";
$proto35["m_havingmode"] = "0";
$proto35["m_inBrackets"] = "0";
$proto35["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto35);

$proto33["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto33);

$proto0["m_fromlist"][]=$obj;
$proto0["m_groupby"] = array();
$proto0["m_orderby"] = array();
$obj = new SQLQuery($proto0);

	return $obj;
}
$queryData_Leopold = createSqlQuery_Leopold();
									$tdataLeopold[".sqlquery"] = $queryData_Leopold;
	
if(isset($tdataLeopold["field2"])){
	$tdataLeopold["field2"]["LookupTable"] = "carscars_view";
	$tdataLeopold["field2"]["LookupOrderBy"] = "name";
	$tdataLeopold["field2"]["LookupType"] = 4;
	$tdataLeopold["field2"]["LinkField"] = "email";
	$tdataLeopold["field2"]["DisplayField"] = "name";
	$tdataLeopold[".hasCustomViewField"] = true;
}

$tableEvents["Leopold"] = new eventsBase;
$tdataLeopold[".hasEvents"] = false;

$cipherer = new RunnerCipherer("Leopold");

?>