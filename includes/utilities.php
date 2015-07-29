<?php
function redirectUser($page = "index.php"){
	//define the url
	$url = "http://" . $_SERVER["HTTP_HOST"] . dirname($_SERVER["PHP_SELF"]);

	//remove slashes
	$url = rtrim($url, "/\\");

	//add page
	$url .= "/" . $page;

	//redirect
	header($url);
	exit();
}

//begin error msg function
function CreateErrorMsg($msg)
{
	return '<div class="error"> *' . $msg . '</div>';
}
//end error msg function

//string sanitation function
function sanitizeString($string){
	$string = trim($string);
	$string = stripcslashes($string);
	$string = strip_tags($string);
	$string = filter_var($string, FILTER_SANITIZE_STRING);

	return $string;
}

//function to truncate text
function truncate($string, $width) {
	$string = substr($string, 0, $width);
	$string = $string . "...";

	return $string;
}

/*function for select box / contact page*/
function selectedOptions($nameAttribute, $contactReason, $selected)
{
	$select = "<select name='$nameAttribute' class='customerDataDrop'>";

	$count = 0;
	$arrayLength = count($contactReason);
	while ( $count < $arrayLength ) {
		$select .= "<option value='$count' ";
		if ( $count == $selected ) {
			$select .= "selected";
		}
		$select .= ">$contactReason[$count]</option>";
		$count += 1;
	}
	$select .= "</select><br>";
	return $select;
}
?>