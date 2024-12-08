<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('common_file_upload')) {
    function common_file_upload($upload_path,$allowed_type,$named_file_str,$module_name,$module_id,$redirect) {
        $CI =& get_instance();

        $config['upload_path'] = './'.$upload_path;
        $config['allowed_types'] = $allowed_type;
        $config['overwrite'] = TRUE;

        $files = $_FILES;
        $cpt = count($_FILES[$named_file_str]['name']);
        for ($i = 0; $i < $cpt; $i++) {
            $_FILES['file']['name'] = $files[$named_file_str]['name'][$i];
            $_FILES['file']['type'] = $files[$named_file_str]['type'][$i];
            $_FILES['file']['tmp_name'] = $files[$named_file_str]['tmp_name'][$i];
            $_FILES['file']['error'] = $files[$named_file_str]['error'][$i];
            $_FILES['file']['size'] = $files[$named_file_str]['size'][$i];
            $config['file_name'] = date('ymdhis') . '_' . rand() . '_' . $i;
            $CI->upload->initialize($config);
            if ($CI->upload->do_upload('file')) {
                $file_data = $CI->upload->data();
                $CI->common_model->save_upload_img($module_name, $module_id, $upload_path, $file_data);
            } else {
                $error = $CI->upload->display_errors();
                $CI->session->set_flashdata('message', $error);
                redirect($redirect);
            }
        }
      
    }
}