phpDiePretty
============

An alternative to the plain text "die" command in php. If you must die, die pretty.

Installation:
Place the class.diePretty.php file in your includes directory.

To enable animations, add in the animate.css script from https://github.com/daneden/animate.css in a web accessible location.
You may need to change the class.diePretty.php script to correctly refer to your animate css. Look for the following line and modify accordingly:
* print '&lt;link rel=&quot;stylesheet&quot; href=&quot;css/animate.css&quot; /&gt;';



Usage:
In your script include the diePretty class.
require_once(/path/to/include/dir.'class.diePretty.php');

DiePretty::errorPage($ErrorMessage);
DiePretty::errorPage($ErrorMessage,$headingMessage);
DiePretty::errorPage($ErrorMessage,$headingMessage,$effect);
