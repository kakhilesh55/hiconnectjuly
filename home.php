<?php include 'includes/userinfo.php';
if(isset($card_id) && ($card_id!=''))
{
	if((isset($theme_selected)) && ($theme_selected !=''))
	{
			if($theme_selected['theme_id'] == 1)
			{
				include 't1/index.php'; 
			}
			else if($theme_selected['theme_id'] == 2)
			{
				include 't2/index.php';
			}
			else if($theme_selected['theme_id'] == 5)
			{
				include 't3/index.php';
			}
	}
	else
		include 't3/index.php'; 

}
else
{
    include 'index.php';
}
?>