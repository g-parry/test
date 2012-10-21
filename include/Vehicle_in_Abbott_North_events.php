<?php 
class eventclass_Vehicle_in_Abbott_North  extends eventsBase
{ 
	function eventclass_Vehicle_in_Abbott_North()
	{
	// fill list of events
		$this->events["AfterAdd"]=true;


//	onscreen events


	}
// Captchas functions	

//	handlers

		
		
		
		
		
		
		
		
		
		
		
				// After record added
function AfterAdd(&$values,&$keys,$inline,&$pageObject)
{

		
//**********  Send email with new data  ************

$email="elitepatrols@gmail.com";
$from="postmaster@cppadmin.co.uk";
$msg="";
$subject="Please check this location";

global $pageObject;

foreach($values as $field=>$value)
{
	if(!IsBinaryType($pageObject->pSet->getFieldType($field)))
		$msg.= $field." : ".$value."\r\n";
}
	
$ret=runner_mail(array('to' => $email, 'subject' => $subject, 'body' => $msg, 'from'=>$from));
if(!$ret["mailed"])
	echo $ret["message"];





// Place event code here.
// Use "Add Action" button to add code snippets.
;		
} // function AfterAdd

		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
//	onscreen events

} 
?>
