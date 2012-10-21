<?php
require_once(getabspath("classes/cipherer.php"));
$tdataVehicle_in_Abbott_North = array();
	$tdataVehicle_in_Abbott_North[".NumberOfChars"] = 80; 
	$tdataVehicle_in_Abbott_North[".ShortName"] = "Vehicle_in_Abbott_North";
	$tdataVehicle_in_Abbott_North[".OwnerID"] = "";
	$tdataVehicle_in_Abbott_North[".OriginalTable"] = "ticket";

//	field labels
$fieldLabelsVehicle_in_Abbott_North = array();
if(mlang_getcurrentlang()=="English")
{
	$fieldLabelsVehicle_in_Abbott_North["English"] = array();
	$fieldToolTipsVehicle_in_Abbott_North["English"] = array();
	$fieldLabelsVehicle_in_Abbott_North["English"]["location"] = "Location";
	$fieldToolTipsVehicle_in_Abbott_North["English"]["location"] = "";
	$fieldLabelsVehicle_in_Abbott_North["English"]["VRM"] = "VRM";
	$fieldToolTipsVehicle_in_Abbott_North["English"]["VRM"] = "";
	$fieldLabelsVehicle_in_Abbott_North["English"]["make"] = "Make";
	$fieldToolTipsVehicle_in_Abbott_North["English"]["make"] = "";
	$fieldLabelsVehicle_in_Abbott_North["English"]["colour"] = "Colour";
	$fieldToolTipsVehicle_in_Abbott_North["English"]["colour"] = "";
	$fieldLabelsVehicle_in_Abbott_North["English"]["notes"] = "Notes";
	$fieldToolTipsVehicle_in_Abbott_North["English"]["notes"] = "";
	$fieldLabelsVehicle_in_Abbott_North["English"]["ID"] = "ID";
	$fieldToolTipsVehicle_in_Abbott_North["English"]["ID"] = "";
	$fieldLabelsVehicle_in_Abbott_North["English"]["isha_streets_contract"] = "Isha Streets.contract";
	$fieldToolTipsVehicle_in_Abbott_North["English"]["isha_streets.contract"] = "";
	if (count($fieldToolTipsVehicle_in_Abbott_North["English"]))
		$tdataVehicle_in_Abbott_North[".isUseToolTips"] = true;
}
	
	
	$tdataVehicle_in_Abbott_North[".NCSearch"] = true;



$tdataVehicle_in_Abbott_North[".shortTableName"] = "Vehicle_in_Abbott_North";
$tdataVehicle_in_Abbott_North[".nSecOptions"] = 0;
$tdataVehicle_in_Abbott_North[".recsPerRowList"] = 1;
$tdataVehicle_in_Abbott_North[".mainTableOwnerID"] = "";
$tdataVehicle_in_Abbott_North[".moveNext"] = 1;
$tdataVehicle_in_Abbott_North[".nType"] = 1;




$tdataVehicle_in_Abbott_North[".showAddInPopup"] = false;

$tdataVehicle_in_Abbott_North[".showEditInPopup"] = false;

$tdataVehicle_in_Abbott_North[".showViewInPopup"] = false;

$tdataVehicle_in_Abbott_North[".fieldsForRegister"] = array();

$tdataVehicle_in_Abbott_North[".listAjax"] = false;

	$tdataVehicle_in_Abbott_North[".audit"] = true;

	$tdataVehicle_in_Abbott_North[".locking"] = false;

$tdataVehicle_in_Abbott_North[".listIcons"] = true;
$tdataVehicle_in_Abbott_North[".inlineAdd"] = true;




$tdataVehicle_in_Abbott_North[".showSimpleSearchOptions"] = false;

$tdataVehicle_in_Abbott_North[".showSearchPanel"] = true;

if (isMobile())
	$tdataVehicle_in_Abbott_North[".isUseAjaxSuggest"] = false;
else 
	$tdataVehicle_in_Abbott_North[".isUseAjaxSuggest"] = true;

$tdataVehicle_in_Abbott_North[".rowHighlite"] = true;

// button handlers file names

$tdataVehicle_in_Abbott_North[".addPageEvents"] = false;

// use datepicker for search panel
$tdataVehicle_in_Abbott_North[".isUseCalendarForSearch"] = false;

// use timepicker for search panel
$tdataVehicle_in_Abbott_North[".isUseTimeForSearch"] = false;






$tdataVehicle_in_Abbott_North[".allSearchFields"] = array();

$tdataVehicle_in_Abbott_North[".allSearchFields"][] = "location";
$tdataVehicle_in_Abbott_North[".allSearchFields"][] = "VRM";
$tdataVehicle_in_Abbott_North[".allSearchFields"][] = "make";
$tdataVehicle_in_Abbott_North[".allSearchFields"][] = "colour";
$tdataVehicle_in_Abbott_North[".allSearchFields"][] = "notes";

$tdataVehicle_in_Abbott_North[".googleLikeFields"][] = "location";
$tdataVehicle_in_Abbott_North[".googleLikeFields"][] = "VRM";
$tdataVehicle_in_Abbott_North[".googleLikeFields"][] = "make";
$tdataVehicle_in_Abbott_North[".googleLikeFields"][] = "colour";
$tdataVehicle_in_Abbott_North[".googleLikeFields"][] = "notes";
$tdataVehicle_in_Abbott_North[".googleLikeFields"][] = "ID";
$tdataVehicle_in_Abbott_North[".googleLikeFields"][] = "isha_streets.contract";


$tdataVehicle_in_Abbott_North[".advSearchFields"][] = "location";
$tdataVehicle_in_Abbott_North[".advSearchFields"][] = "VRM";
$tdataVehicle_in_Abbott_North[".advSearchFields"][] = "make";
$tdataVehicle_in_Abbott_North[".advSearchFields"][] = "colour";
$tdataVehicle_in_Abbott_North[".advSearchFields"][] = "notes";

$tdataVehicle_in_Abbott_North[".isTableType"] = "list";

	



// Access doesn't support subqueries from the same table as main



$tdataVehicle_in_Abbott_North[".pageSize"] = 20;

$tstrOrderBy = "ORDER BY isha_streets.contract";
if(strlen($tstrOrderBy) && strtolower(substr($tstrOrderBy,0,8))!="order by")
	$tstrOrderBy = "order by ".$tstrOrderBy;
$tdataVehicle_in_Abbott_North[".strOrderBy"] = $tstrOrderBy;

$tdataVehicle_in_Abbott_North[".orderindexes"] = array();
$tdataVehicle_in_Abbott_North[".orderindexes"][] = array(7, (1 ? "ASC" : "DESC"), "isha_streets.contract");

$tdataVehicle_in_Abbott_North[".sqlHead"] = "SELECT ticket.location,  ticket.VRM,  ticket.make,  ticket.colour,  ticket.notes,  ticket.ID,  isha_streets.contract AS `isha_streets.contract`";
$tdataVehicle_in_Abbott_North[".sqlFrom"] = "FROM ticket  INNER JOIN isha_streets ON ticket.location = isha_streets.Location";
$tdataVehicle_in_Abbott_North[".sqlWhereExpr"] = "isha_streets.contract =\"Abbott North\"";
$tdataVehicle_in_Abbott_North[".sqlTail"] = "";




//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdataVehicle_in_Abbott_North[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdataVehicle_in_Abbott_North[".arrGroupsPerPage"] = $arrGPP;

$tableKeysVehicle_in_Abbott_North = array();
$tableKeysVehicle_in_Abbott_North[] = "ID";
$tdataVehicle_in_Abbott_North[".Keys"] = $tableKeysVehicle_in_Abbott_North;

$tdataVehicle_in_Abbott_North[".listFields"] = array();
$tdataVehicle_in_Abbott_North[".listFields"][] = "location";
$tdataVehicle_in_Abbott_North[".listFields"][] = "VRM";
$tdataVehicle_in_Abbott_North[".listFields"][] = "make";
$tdataVehicle_in_Abbott_North[".listFields"][] = "colour";
$tdataVehicle_in_Abbott_North[".listFields"][] = "notes";

$tdataVehicle_in_Abbott_North[".addFields"] = array();
$tdataVehicle_in_Abbott_North[".addFields"][] = "location";
$tdataVehicle_in_Abbott_North[".addFields"][] = "VRM";
$tdataVehicle_in_Abbott_North[".addFields"][] = "make";
$tdataVehicle_in_Abbott_North[".addFields"][] = "colour";
$tdataVehicle_in_Abbott_North[".addFields"][] = "notes";

$tdataVehicle_in_Abbott_North[".inlineAddFields"] = array();
$tdataVehicle_in_Abbott_North[".inlineAddFields"][] = "location";
$tdataVehicle_in_Abbott_North[".inlineAddFields"][] = "VRM";
$tdataVehicle_in_Abbott_North[".inlineAddFields"][] = "make";
$tdataVehicle_in_Abbott_North[".inlineAddFields"][] = "colour";
$tdataVehicle_in_Abbott_North[".inlineAddFields"][] = "notes";

$tdataVehicle_in_Abbott_North[".editFields"] = array();

$tdataVehicle_in_Abbott_North[".inlineEditFields"] = array();

$tdataVehicle_in_Abbott_North[".exportFields"] = array();
	
//	location
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 1;
	$fdata["strName"] = "location";
	$fdata["GoodName"] = "location";
	$fdata["ownerTable"] = "ticket";
	$fdata["Label"] = "Location"; 
	$fdata["FieldType"] = 200;
	
		
		
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		$fdata["bInlineAdd"] = true; 
	
		
		
		
		$fdata["bAdvancedSearch"] = true; 
	
		
		
		$fdata["strField"] = "location"; 
		$fdata["FullName"] = "ticket.location";
	
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
	
		
		$edata["LookupWhere"] = "contract = 'Abbott North'";
	
		
		
		
				
	
	
	//	End Lookup Settings

		
		
		
		
		
		
		
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats

		$fdata["isSeparate"] = false;
	
	$tdataVehicle_in_Abbott_North["location"] = $fdata;
//	VRM
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 2;
	$fdata["strName"] = "VRM";
	$fdata["GoodName"] = "VRM";
	$fdata["ownerTable"] = "ticket";
	$fdata["Label"] = "VRM"; 
	$fdata["FieldType"] = 200;
	
		
		
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		$fdata["bInlineAdd"] = true; 
	
		
		
		
		$fdata["bAdvancedSearch"] = true; 
	
		
		
		$fdata["strField"] = "VRM"; 
		$fdata["FullName"] = "ticket.VRM";
	
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
	
	$tdataVehicle_in_Abbott_North["VRM"] = $fdata;
//	make
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 3;
	$fdata["strName"] = "make";
	$fdata["GoodName"] = "make";
	$fdata["ownerTable"] = "ticket";
	$fdata["Label"] = "Make"; 
	$fdata["FieldType"] = 200;
	
		
		
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		$fdata["bInlineAdd"] = true; 
	
		
		
		
		$fdata["bAdvancedSearch"] = true; 
	
		
		
		$fdata["strField"] = "make"; 
		$fdata["FullName"] = "ticket.make";
	
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
	
	$tdataVehicle_in_Abbott_North["make"] = $fdata;
//	colour
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 4;
	$fdata["strName"] = "colour";
	$fdata["GoodName"] = "colour";
	$fdata["ownerTable"] = "ticket";
	$fdata["Label"] = "Colour"; 
	$fdata["FieldType"] = 200;
	
		
		
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		$fdata["bInlineAdd"] = true; 
	
		
		
		
		$fdata["bAdvancedSearch"] = true; 
	
		
		
		$fdata["strField"] = "colour"; 
		$fdata["FullName"] = "ticket.colour";
	
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
	
	$tdataVehicle_in_Abbott_North["colour"] = $fdata;
//	notes
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 5;
	$fdata["strName"] = "notes";
	$fdata["GoodName"] = "notes";
	$fdata["ownerTable"] = "ticket";
	$fdata["Label"] = "Notes"; 
	$fdata["FieldType"] = 200;
	
		
		
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		$fdata["bInlineAdd"] = true; 
	
		
		
		
		$fdata["bAdvancedSearch"] = true; 
	
		
		
		$fdata["strField"] = "notes"; 
		$fdata["FullName"] = "ticket.notes";
	
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
	
	$tdataVehicle_in_Abbott_North["notes"] = $fdata;
//	ID
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 6;
	$fdata["strName"] = "ID";
	$fdata["GoodName"] = "ID";
	$fdata["ownerTable"] = "ticket";
	$fdata["Label"] = "ID"; 
	$fdata["FieldType"] = 3;
	
		$fdata["AutoInc"] = true;
	
		
		
		
		
		
		
		
		
		
		
		$fdata["strField"] = "ID"; 
		$fdata["FullName"] = "ticket.ID";
	
				
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
	
	$tdataVehicle_in_Abbott_North["ID"] = $fdata;
//	isha_streets.contract
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 7;
	$fdata["strName"] = "isha_streets.contract";
	$fdata["GoodName"] = "isha_streets_contract";
	$fdata["ownerTable"] = "isha_streets";
	$fdata["Label"] = "Isha Streets.contract"; 
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
	
	$tdataVehicle_in_Abbott_North["isha_streets.contract"] = $fdata;

	
$tables_data["Vehicle in Abbott North"]=&$tdataVehicle_in_Abbott_North;
$field_labels["Vehicle_in_Abbott_North"] = &$fieldLabelsVehicle_in_Abbott_North;
$fieldToolTips["Vehicle in Abbott North"] = &$fieldToolTipsVehicle_in_Abbott_North;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["Vehicle in Abbott North"] = array();
	
// tables which are master tables for current table (detail)
$masterTablesData["Vehicle in Abbott North"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










function createSqlQuery_Vehicle_in_Abbott_North()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "ticket.location,  ticket.VRM,  ticket.make,  ticket.colour,  ticket.notes,  ticket.ID,  isha_streets.contract AS `isha_streets.contract`";
$proto0["m_strFrom"] = "FROM ticket  INNER JOIN isha_streets ON ticket.location = isha_streets.Location";
$proto0["m_strWhere"] = "isha_streets.contract =\"Abbott North\"";
$proto0["m_strOrderBy"] = "ORDER BY isha_streets.contract";
$proto0["m_strTail"] = "";
$proto0["cipherer"] = null;
$proto1=array();
$proto1["m_sql"] = "isha_streets.contract =\"Abbott North\"";
$proto1["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "contract",
	"m_strTable" => "isha_streets"
));

$proto1["m_column"]=$obj;
$proto1["m_contained"] = array();
$proto1["m_strCase"] = "=\"Abbott North\"";
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
	"m_strName" => "location",
	"m_strTable" => "ticket"
));

$proto5["m_expr"]=$obj;
$proto5["m_alias"] = "";
$obj = new SQLFieldListItem($proto5);

$proto0["m_fieldlist"][]=$obj;
						$proto7=array();
			$obj = new SQLField(array(
	"m_strName" => "VRM",
	"m_strTable" => "ticket"
));

$proto7["m_expr"]=$obj;
$proto7["m_alias"] = "";
$obj = new SQLFieldListItem($proto7);

$proto0["m_fieldlist"][]=$obj;
						$proto9=array();
			$obj = new SQLField(array(
	"m_strName" => "make",
	"m_strTable" => "ticket"
));

$proto9["m_expr"]=$obj;
$proto9["m_alias"] = "";
$obj = new SQLFieldListItem($proto9);

$proto0["m_fieldlist"][]=$obj;
						$proto11=array();
			$obj = new SQLField(array(
	"m_strName" => "colour",
	"m_strTable" => "ticket"
));

$proto11["m_expr"]=$obj;
$proto11["m_alias"] = "";
$obj = new SQLFieldListItem($proto11);

$proto0["m_fieldlist"][]=$obj;
						$proto13=array();
			$obj = new SQLField(array(
	"m_strName" => "notes",
	"m_strTable" => "ticket"
));

$proto13["m_expr"]=$obj;
$proto13["m_alias"] = "";
$obj = new SQLFieldListItem($proto13);

$proto0["m_fieldlist"][]=$obj;
						$proto15=array();
			$obj = new SQLField(array(
	"m_strName" => "ID",
	"m_strTable" => "ticket"
));

$proto15["m_expr"]=$obj;
$proto15["m_alias"] = "";
$obj = new SQLFieldListItem($proto15);

$proto0["m_fieldlist"][]=$obj;
						$proto17=array();
			$obj = new SQLField(array(
	"m_strName" => "contract",
	"m_strTable" => "isha_streets"
));

$proto17["m_expr"]=$obj;
$proto17["m_alias"] = "isha_streets.contract";
$obj = new SQLFieldListItem($proto17);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto19=array();
$proto19["m_link"] = "SQLL_MAIN";
			$proto20=array();
$proto20["m_strName"] = "ticket";
$proto20["m_columns"] = array();
$proto20["m_columns"][] = "ID";
$proto20["m_columns"][] = "location";
$proto20["m_columns"][] = "VRM";
$proto20["m_columns"][] = "make";
$proto20["m_columns"][] = "colour";
$proto20["m_columns"][] = "notes";
$proto20["m_columns"][] = "date";
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
												$proto23=array();
$proto23["m_link"] = "SQLL_INNERJOIN";
			$proto24=array();
$proto24["m_strName"] = "isha_streets";
$proto24["m_columns"] = array();
$proto24["m_columns"][] = "ID";
$proto24["m_columns"][] = "Location";
$proto24["m_columns"][] = "ACTIVE";
$proto24["m_columns"][] = "contract";
$proto24["m_columns"][] = "enfcompany";
$obj = new SQLTable($proto24);

$proto23["m_table"] = $obj;
$proto23["m_alias"] = "";
$proto25=array();
$proto25["m_sql"] = "ticket.location = isha_streets.Location";
$proto25["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "location",
	"m_strTable" => "ticket"
));

$proto25["m_column"]=$obj;
$proto25["m_contained"] = array();
$proto25["m_strCase"] = "= isha_streets.Location";
$proto25["m_havingmode"] = "0";
$proto25["m_inBrackets"] = "0";
$proto25["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto25);

$proto23["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto23);

$proto0["m_fromlist"][]=$obj;
$proto0["m_groupby"] = array();
$proto0["m_orderby"] = array();
												$proto27=array();
						$obj = new SQLField(array(
	"m_strName" => "contract",
	"m_strTable" => "isha_streets"
));

$proto27["m_column"]=$obj;
$proto27["m_bAsc"] = 1;
$proto27["m_nColumn"] = 0;
$obj = new SQLOrderByItem($proto27);

$proto0["m_orderby"][]=$obj;					
$obj = new SQLQuery($proto0);

	return $obj;
}
$queryData_Vehicle_in_Abbott_North = createSqlQuery_Vehicle_in_Abbott_North();
							$tdataVehicle_in_Abbott_North[".sqlquery"] = $queryData_Vehicle_in_Abbott_North;
	
if(isset($tdataVehicle_in_Abbott_North["field2"])){
	$tdataVehicle_in_Abbott_North["field2"]["LookupTable"] = "carscars_view";
	$tdataVehicle_in_Abbott_North["field2"]["LookupOrderBy"] = "name";
	$tdataVehicle_in_Abbott_North["field2"]["LookupType"] = 4;
	$tdataVehicle_in_Abbott_North["field2"]["LinkField"] = "email";
	$tdataVehicle_in_Abbott_North["field2"]["DisplayField"] = "name";
	$tdataVehicle_in_Abbott_North[".hasCustomViewField"] = true;
}

include_once(getabspath("include/Vehicle_in_Abbott_North_events.php"));
$tableEvents["Vehicle in Abbott North"] = new eventclass_Vehicle_in_Abbott_North;
$tdataVehicle_in_Abbott_North[".hasEvents"] = true;

$cipherer = new RunnerCipherer("Vehicle in Abbott North");

?>