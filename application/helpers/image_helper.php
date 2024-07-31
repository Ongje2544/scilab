<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
function image_thumb($folder_name, $image_name, $width, $height)
{
    // Get the CodeIgniter super object
    $CI =& get_instance();
 
    // Path to image thumbnail
    $image_thumb = dirname('uploads/' . $folder_name . '/' . $image_name) . '/' . base64_encode($image_name) . '_' . $width . '_' . $height . strrchr($image_name, '.');
     
    if( ! file_exists($image_thumb))
    {
        // LOAD LIBRARY
        $CI->load->library('image_lib');
 
        // CONFIGURE IMAGE LIBRARY
        $config['image_library']    = 'gd2';
        $config['source_image']     = 'uploads/' . $folder_name. '/' . $image_name;
        $config['new_image']        = $image_thumb;
        $config['maintain_ratio']   = TRUE;
        $config['height']           = $height;
        $config['width']            = $width;
        $CI->image_lib->initialize($config);
        $CI->image_lib->resize();
        $CI->image_lib->clear();
    }
 
    // return '<img src="' . dirname($_SERVER['SCRIPT_NAME']) . '/' . $image_thumb . '" />';
}
 
 
/* End of file image_helper.php */
/* Location: system/application/helpers/image_helper.php */