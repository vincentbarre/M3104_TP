<?php
foreach ($result as $ligne) {
	echo "Le film '$ligne->title' est noté $ligne->grade <br />";
}

// calcul de la barre de navigation
$base = site_url('reviews/index/');
$prev_aff = false;
if ($start-10 >= 0) {
	echo "<br /><a href='$base".($start - 10)."'>Prev</a>";
	$prev_aff = true;
}

if (($start+10) < $max) {
	if ($prev_aff) echo " / ";
	echo "<a href='$base".($start + 10)."'>Next</a>";
}
