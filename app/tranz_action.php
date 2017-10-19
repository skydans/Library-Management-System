<?php
function late_calc($dateline, $return_date) {

$dateline_pcs = explode ("-", $dateline);
$dateline_pcs = $dateline_pcs[2]."-".$dateline_pcs[1]."-".$dateline_pcs[0];

$return_date_pcs = explode ("-", $return_date);
$return_date_pcs = $return_date_pcs[2]."-".$return_date_pcs[1]."-".$return_date_pcs[0];

$difference = strtotime ($return_date_pcs) - strtotime ($dateline_pcs);

$difference = $difference / 86400;

if ($difference>=1) {
	$date_final = floor($difference);
}
else {
	$date_final = 0;
}
return $date_final;
}
?>