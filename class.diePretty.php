<?php
/**
 * 
 * @author terrypearson
 * 
 * This class allows us to have a better looking and consistent die message without duplicating html.
 *
 */
class DiePretty {
  
private $except;

	function __construct($ErrorMessage, $headingMessage = "An error occurred") {
		if($headingMessage == ""){
			$headingMessage = "An error occurred";
		}
		$this->except = $ErrorMessage;
		$this->headingMessage = $headingMessage;
	}
	function title() {
		return "Sorry, we encountered an error :-(";
	}
	function writeErrorPage($effect="") {
	
		print '<html>';
		print '<head>';
		print '<link rel="stylesheet" href="css/animate.css" />';
		print '<title>'.$this->title().'</title>';
		print '<style>'.$this->getCSS().'</style>';
		print '<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>';
		print '</head>';
		print '<body>';
		print '<div class="error-message" id="error-box">';
		print '<h2>'.$this->headingMessage.'</h2>';
		print '<blockquote class="custom-error">'.$this->getMessage().'</blockquote>';
		print '</div>';
		print "\n<br><a href='javascript:history.back();'>back</a>";
		print $this->getFancyEffect($effect);
		print '</body>';
		$this->dieNow();
	}
	
	function getCSS(){
		$css=<<<CSSTEXT
		/* Custom Error */
		.error-message {text-align: center;
		}
		.error-message h1, .custom-404 h2 {border: none; box-shadow: none; margin: 0; padding: 0;
		}
		.error-message h1 {font-size: 8.0em; text-shadow: 3px 3px 0 rgba(0, 0, 0, 0.1);
		}
		.error-message h2 {font-size: 2.0em; line-height: 2.0em;
		}
CSSTEXT;
		return $css;
	}
	
	function getMessage(){
		return $this->except;
	}
	
	function getFancyEffect($value=""){
		if ($value == ""){
			$value = "animated shake";
		}
		
		$theScript=<<<THISSCRIPT
		<script>
		$(document).ready(function(){
   			$('#error-box').addClass('{$value}');
 		});
		</script>
THISSCRIPT;
		return $theScript;
	}
	
	function dieNow(){
		die();
	}
	
	static function errorPage($ErrorMessage, $headingMessage = "",$effect=""){
		$dieMessage = new DiePretty($ErrorMessage, $headingMessage);
		$dieMessage->writeErrorPage($effect);
	}
	

}


?>
