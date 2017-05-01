<?php

namespace App\Http\Providers;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Excel5;

class PhpExcel
{
    private $excel_data = array();
    private $spreadsheet_obj = null;
    private $writer_obj = null;

    public function __construct()
    {
        $this -> spreadsheet_obj = new Spreadsheet();
    }

    /**
     * 設定輸出資料
     *
     * @param $get_data 輸出的資料
     */
    public function set_excel_data($get_data)
    {
        $this -> excel_data = $get_data;
    }

    /**
     * 輸出excel資料成為下載檔案
     */
    public function get_excel_file()
    {
        $filename = date("Y-m-d") . ".xls";
        header('Content-type: application/vnd.ms-excel');
        header('Content-Disposition: attachment; filename="' . $filename . '"');
        $sheet = $this -> spreadsheet_obj->getActiveSheet();
        $sheet->setCellValue('A1', '對話順序');
        $sheet->setCellValue('B1', '作答題號');
        $sheet->setCellValue('C1', '學生回答內容');
        $sheet->setCellValue('D1', '電腦回應內容');
        $sheet->setCellValue('E1', '答對/答錯');
        $sheet->setCellValue('F1', '回饋類型');
        if(is_array($this -> excel_data)  AND count($this -> excel_data) > 0)
        {
            $y_index = 2;
            foreach($this -> excel_data as $k => $v)
            {
                $sheet->setCellValue('A'.$y_index, ($k+1) );
                $sheet->setCellValue('B'.$y_index, $v['item_id']);
                $sheet->setCellValue('C'.$y_index, $v['student_ans']);
                $sheet->setCellValue('D'.$y_index, '');
                $sheet->setCellValue('E'.$y_index, '');
                $sheet->setCellValue('F'.$y_index, $v['feedback_dsc']);
                $y_index++;
            }
        }
        $writer = new Excel5($this -> spreadsheet_obj);
        $writer->save('php://output');
    }


}
