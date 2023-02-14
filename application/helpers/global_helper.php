<?php 

function prx($array, $is_not_die = false)
{
	echo '<pre>';
	print_r($array);
	echo '</pre>';

	$is_not_die ? '' : die;
}

function lq($is_not_die = false)
{
	$ci = &get_instance();
	echo $ci->db->last_query();
	$is_not_die ? '' : die;
}

function doLog($text)
{
    $filename = FCPATH.'/mb.txt';
    $fh = fopen($filename, "a") or die("Could not open log file.");
    fwrite($fh, date("d-m-Y, H:i")." - ".print_r($text,true)."\n") or die("Could not write file!");
    fclose($fh);
}
 ?>