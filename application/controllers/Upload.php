<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Upload extends CI_Controller
{

    public function index()
    {
        $this->load->helper('url');
        $this->load->view('v_main', [
            'base_url' => base_url(),
            'body' => 'v_upload'
        ]);
    }

    public function convert_to_dbf()
    {
        // $array_error = [
        //     'INSyymm.txt' => ['DATEIN' => [], 'DATEEXP' => []]
        // ];
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
                                       trim($columns[0]),
                                        trim($columns[1]),
                                        trim($columns[2]),
                                        trim($columns[3]),
                                        trim($columns[4])
                                    ]);
                                } else if ($text_config == "CHTyymm.txt") {
                                    dbase_add_record($db, [
                                       trim($columns[0]),
                                        trim($columns[1]),
                                        trim($columns[2]),
                                        trim($columns[3]),
                                        trim($columns[4]),
                                        trim($columns[5])
                                    ]);
                                } else if ($text_config == "IDXyymm.txt") {
                                    dbase_add_record($db, [
                                       trim($columns[0]),
                                        trim($columns[1]),
                                        trim($columns[2]),
                                        trim($columns[3])
                                    ]);
                                } else if ($text_config == "INSyymm.txt") {

                                    // if (empty($columns[4])) {
                                    //     array_push($array_error['INSyymm.txt']['DATEIN'], "ไม่พบข้อมูล DATEIN ในไฟล์ INSyymm ที่ HN : " . $columns[0]);
                                    // }

                                    // if (isset($columns[5]) && (int)substr($columns[5], 0, 4) > date("Y") + 2) {
                                    //     array_push($array_error['INSyymm.txt']['DATEEXP'], "พบ DATEEXP ผิดปกติ ในไฟล์ INSyymm ที่ HN : " . $columns[5] . " , DATEEXP : " . substr($columns[5], 0, 4));
                                    // }

                                    // echo "<pre>";
                                    // var_dump(
                                    //     trim($columns[0]),
                                    //     trim(trim($columns[1])),
                                    //     trim(trim($columns[)2]),
                                    //     trim(trim($columns[3])),
                                    //     trim(trim($columns[)4]),
                                    //     trim(trim($columns[5])),
                                    //     trim(trim($columns[6])),
                                    //     trim(trim($columns[7]))
                                    // );
                                    // die;

                                    dbase_add_record($db, [
                                       trim($columns[0]),
                                        trim($columns[1]),
                                        trim($columns[2]),
                                        trim($columns[3]),
                                        trim($columns[4]),
                                        trim($columns[5]),
                                        trim($columns[6]),
                                        trim($columns[7])
                                    ]);
                                } else if ($text_config == "IOPyymm.txt") {
                                    dbase_add_record($db, [
                                       trim($columns[0]),
                                        trim($columns[1]),
                                        trim($columns[2]),
                                        trim($columns[3]),
                                        trim($columns[4]),
                                        trim($columns[5]),
                                        trim($columns[6]),
                                        trim($columns[7])
                                    ]);
                                } else if ($text_config == "IPDyymm.txt") {
                                    dbase_add_record($db, [
                                       trim($columns[0]),
                                        trim($columns[1]),
                                        trim($columns[2]),
                                        trim($columns[3]),
                                        trim($columns[4]),
                                        trim($columns[5]),
                                        trim($columns[6]),
                                        trim($columns[7]),
                                        trim($columns[8]),
                                        trim($columns[9]),
                                        trim($columns[10])
                                    ]);
                                } else if ($text_config == "IRFyymm.txt") {
                                    dbase_add_record($db, [
                                       trim($columns[0]),
                                        trim($columns[1]),
                                        trim($columns[2])
                                    ]);
                                } else if ($text_config == "ODXyymm.txt") {
                                    dbase_add_record($db, [
                                       trim($columns[0]),
                                        trim($columns[1]),
                                        trim($columns[2]),
                                        trim($columns[3]),
                                        trim($columns[4]),
                                        trim($columns[5])
                                    ]);
                                } else if ($text_config == "OOPyymm.txt") {
                                    dbase_add_record($db, [
                                       trim($columns[0]),
                                        trim($columns[1]),
                                        trim($columns[2]),
                                        trim($columns[3]),
                                        trim($columns[4])
                                    ]);
                                } else if ($text_config == "OPDyymm.txt") {
                                    dbase_add_record($db, [
                                       trim($columns[0]),
                                        trim($columns[1]),
                                        trim($columns[2])
                                    ]);
                                } else if ($text_config == "ORFyymm.txt") {
                                    dbase_add_record($db, [
                                       trim($columns[0]),
                                        trim($columns[1]),
                                        trim($columns[2]),
                                        trim($columns[3]),
                                        trim($columns[4])
                                    ]);
                                } else if ($text_config == "PATyymm.txt") {
                                    dbase_add_record($db, [
                                       trim($columns[0]),
                                        trim($columns[1]),
                                        trim($columns[2]),
                                        trim($columns[3]),
                                        trim($columns[4]),
                                        trim($columns[5]),
                                        trim($columns[6]),
                                        trim($columns[7]),
                                        trim($columns[8]),
                                        trim($columns[9])
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
        // redirect(base_url() . 'Upload/index/' . $new_path);
        $this->load->view('v_main', [
            // 'array_error' => $array_error,
            'base_url' => base_url(),
            'body' => 'v_upload',
            'new_path' => $new_path
        ]);
    }
}

/* End of file Upload.php */
