<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Upload extends CI_Controller
{

    public function index($new_path = null)
    {
        $this->load->helper('url');
        $this->load->view('v_main', [
            'new_path' => $new_path,
            'base_url' => base_url(),
            'body' => 'v_upload'
        ]);
    }

    public function convert_to_dbf()
    {

        $this->load->helper('url');
        $this->load->helper('download');
        $this->load->library('zip');
        $this->config->load('dbf');
        $reports = $this->config->item('reports');
        $code = $this->input->post('code');
        $total_count = count($_FILES['fileToUpload']['name']);
        $new_path = uniqid() . date("Y-m-d-H-i-s");
        for ($i = 0; $i < $total_count; $i++) {
            $tmpFilePath = $_FILES['fileToUpload']['tmp_name'][$i];
            if ($tmpFilePath != "") {
                if (!file_exists("./uploads/" . $new_path)) {
                    mkdir("./uploads/" . $new_path, 0777);
                }
                $newFilePath = "./uploads/" . $new_path . "/" . $_FILES['fileToUpload']['name'][$i];
                $text_config = "";
                $dbf_config = "";
                foreach ($reports as $report) {
                    if ($report->text == $_FILES['fileToUpload']['name'][$i]) {
                        $text_config = $report->text;
                        $dbf_config = $report->dbf;
                    }
                }
                var_dump(" $dbf_config : " . $dbf_config);
                echo '<br>';
                $dbf_config_new = explode("YYMM", $dbf_config)[0];
                $dbf_config_new = $dbf_config_new . $code . ".dbf";
                $tempPath = "./uploads/" . $new_path . "/" . $dbf_config_new;
                copy('./uploads/' . $dbf_config, $tempPath);
                if (move_uploaded_file($tmpFilePath, $newFilePath)) {
                    $file = fopen($newFilePath, "r");
                    $db = dbase_open($tempPath, 2);
                    $index = 0;
                    while (!feof($file)) {
                        $line_of_text = fgets($file);
                        if (!ctype_space($line_of_text) && $line_of_text != '') {
                            $members = explode('\n', $line_of_text);
                            if ($index != 0) {
                                $columns = explode('|', $members[0]);
                                if ($text_config == "CHAyymm.txt") {
                                    dbase_add_record($db, [
                                        $columns[0],
                                        $columns[1],
                                        $columns[2],
                                        $columns[3],
                                        $columns[4]
                                    ]);
                                } else if ($text_config == "CHTyymm.txt") {
                                    dbase_add_record($db, [
                                        $columns[0],
                                        $columns[1],
                                        $columns[2],
                                        $columns[3],
                                        $columns[4],
                                        $columns[5]
                                    ]);
                                } else if ($text_config == "IDXyymm.txt") {
                                    dbase_add_record($db, [
                                        $columns[0],
                                        $columns[1],
                                        $columns[2],
                                        $columns[3]
                                    ]);
                                } else if ($text_config == "INSyymm.txt") {
                                    dbase_add_record($db, [
                                        $columns[0],
                                        $columns[1],
                                        $columns[2],
                                        $columns[3],
                                        $columns[4],
                                        $columns[5],
                                        $columns[6],
                                        $columns[7]
                                    ]);
                                } else if ($text_config == "IOPyymm.txt") {
                                    dbase_add_record($db, [
                                        $columns[0],
                                        $columns[1],
                                        $columns[2],
                                        $columns[3],
                                        $columns[4],
                                        $columns[5],
                                        $columns[6],
                                        $columns[7]
                                    ]);
                                } else if ($text_config == "IPDyymm.txt") {
                                    dbase_add_record($db, [
                                        $columns[0],
                                        $columns[1],
                                        $columns[2],
                                        $columns[3],
                                        $columns[4],
                                        $columns[5],
                                        $columns[6],
                                        $columns[7],
                                        $columns[8],
                                        $columns[9],
                                        $columns[10]
                                    ]);
                                } else if ($text_config == "IRFyymm.txt") {
                                    dbase_add_record($db, [
                                        $columns[0],
                                        $columns[1],
                                        $columns[2]
                                    ]);
                                } else if ($text_config == "ODXyymm.txt") {
                                    dbase_add_record($db, [
                                        $columns[0],
                                        $columns[1],
                                        $columns[2],
                                        $columns[3],
                                        $columns[4],
                                        $columns[5]
                                    ]);
                                } else if ($text_config == "OOPyymm.txt") {
                                    dbase_add_record($db, [
                                        $columns[0],
                                        $columns[1],
                                        $columns[2],
                                        $columns[3],
                                        $columns[4]
                                    ]);
                                } else if ($text_config == "OPDyymm.txt") {
                                    dbase_add_record($db, [
                                        $columns[0],
                                        $columns[1],
                                        $columns[2]
                                    ]);
                                } else if ($text_config == "ORFyymm.txt") {
                                    dbase_add_record($db, [
                                        $columns[0],
                                        $columns[1],
                                        $columns[2],
                                        $columns[3],
                                        $columns[4]
                                    ]);
                                } else if ($text_config == "PATyymm.txt") {
                                    dbase_add_record($db, [
                                        $columns[0],
                                        $columns[1],
                                        $columns[2],
                                        $columns[3],
                                        $columns[4],
                                        $columns[5],
                                        $columns[6],
                                        $columns[7],
                                        $columns[8],
                                        $columns[9]
                                    ]);
                                }
                            }
                            $index++;
                        }
                    }
                    fclose($file);
                    $fullPath = "./uploads/" . $new_path;
                    array_map('unlink', glob($fullPath . "/*.txt"));
                }
            }
        }
        redirect(base_url() . 'Upload/index/' . $new_path);
    }
}

/* End of file Upload.php */
