

<?php
$keywords = array("mango","orange","apple","banana","grapes");
natcasesort($keywords);
foreach ($keywords as $keyword) {
	echo $keyword."<br>";
}