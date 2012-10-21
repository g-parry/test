<?php
include_once(getabspath("classes/runnerpage.php"));
class AddPage extends RunnerPage
{
	
	function AddPage(&$params)
	{
		parent::RunnerPage($params);
	}
	
	/**
	 * Assign body end
	 */	
	function assignBodyEnd(&$params) 
	{
		parent::assignBodyEnd($params);
				if($this->isHTMLFormNeeded())
		 	echo '<input type="hidden" name="a" value="added" /><input type="hidden" name="editType" value="'.ADD_SIMPLE.'" /><input type="hidden" name="id" value="'.$this->id.'" /></form>';
	}
}
?>