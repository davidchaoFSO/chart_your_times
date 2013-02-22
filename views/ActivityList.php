<?php

echo "<p>Below is the list of all of your charted activities. Click on the links to see details for each activity.</p>";

foreach($data as /*$num => */$row){
	echo "<a href='DataDetail.php?id=${row['activity']}'>${row['activity']}</a>  <br/>";
}

echo "<hr />";
?>