<?php
if($_POST['image_form_submit'] == 1)
{
	$images_arr = array();
	foreach($_FILES['images']['name'] as $key=>$val){
		$image_name = $_FILES['images']['name'][$key];
		$tmp_name 	= $_FILES['images']['tmp_name'][$key];
		$size 		= $_FILES['images']['size'][$key];
		$type 		= $_FILES['images']['type'][$key];
		$error 		= $_FILES['images']['error'][$key];
		
		############ Remove comments if you want to upload and stored images into the "uploads/" folder #############
		
		// $target_dir = "img/";
		// $target_file = $target_dir.$_FILES['images']['name'][$key];
		// if(move_uploaded_file($_FILES['images']['tmp_name'][$key],$target_file)){
		// 	$images_arr[] = $target_file;
		// }
		
		//display images without stored
		$extra_info = getimagesize($_FILES['images']['tmp_name'][$key]);
    	$images_arr[] = "data:" . $extra_info["mime"] . ";base64," . base64_encode(file_get_contents($_FILES['images']['tmp_name'][$key]));
	}
	
	//Generate images view
	if(!empty($images_arr)){ $count=0;
		foreach($images_arr as $image_src){ $count++?>
			<ul class="reorder_ul reorder-photos-list">
            	<li id="image_li_<?php echo $count; ?>" class="ui-sortable-handle">
                	<a href="javascript:void(0);" style="float:none;" class="image_link"><img src="<?php echo $image_src; ?>" alt=""></a>
               	</li>
          	</ul>
	<?php }
	}
}
?>