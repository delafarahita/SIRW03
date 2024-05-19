<?php

namespace App\Http\Controllers;

use App\Models\DataPendudukModel;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use App\Models\Penduduk; // Assuming you have a model named Penduduk

class ExportController extends Controller
{
    public function exportToExcel()
    {
        // Create new Spreadsheet object
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Add table headers
        $sheet->setCellValue('A1', 'NIK');
        $sheet->setCellValue('B1', 'NO KK');
        $sheet->setCellValue('C1', 'Nama');
        $sheet->setCellValue('D1', 'Tempat Lahir');
        $sheet->setCellValue('E1', 'Tanggal Lahir');
        $sheet->setCellValue('F1', 'Gol. Darah');
        $sheet->setCellValue('G1', 'Jenis Kelamin');
        $sheet->setCellValue('H1', 'Alamat');
        $sheet->setCellValue('I1', 'RW');
        $sheet->setCellValue('J1', 'RT');
        $sheet->setCellValue('K1', 'Kelurahan');
        $sheet->setCellValue('L1', 'Kecamatan');
        $sheet->setCellValue('M1', 'Kewarganegaraan');
        $sheet->setCellValue('N1', 'Pekerjaan');
        $sheet->setCellValue('O1', 'Agama');
        $sheet->setCellValue('P1', 'Domisili');

        // Fetch data from the database
        $data = DataPendudukModel::all();

        // Add data to the sheet
        $rowNumber = 2;
        foreach ($data as $row) {
            $sheet->setCellValue('A' . $rowNumber, $row->nik);
            $sheet->setCellValue('B' . $rowNumber, $row->no_kk);
            $sheet->setCellValue('C' . $rowNumber, $row->nama);
            $sheet->setCellValue('D' . $rowNumber, $row->tempat_lahir);
            $sheet->setCellValue('E' . $rowNumber, $row->tanggal_lahir);
            $sheet->setCellValue('F' . $rowNumber, $row->gol_darah);
            $sheet->setCellValue('G' . $rowNumber, $row->jenis_kelamin);
            $sheet->setCellValue('H' . $rowNumber, $row->alamat);
            $sheet->setCellValue('I' . $rowNumber, $row->rw);
            $sheet->setCellValue('J' . $rowNumber, $row->id_rt);
            $sheet->setCellValue('K' . $rowNumber, $row->kelurahan);
            $sheet->setCellValue('L' . $rowNumber, $row->kecamatan);
            $sheet->setCellValue('M' . $rowNumber, $row->kewarganegaraan);
            $sheet->setCellValue('N' . $rowNumber, $row->pekerjaan);
            $sheet->setCellValue('O' . $rowNumber, $row->agama);
            $sheet->setCellValue('P' . $rowNumber, $row->domisili);
            $rowNumber++;
        }

        
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="Data_Penduduk.xlsx"');
        header('Cache-Control: max-age=0');
        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
        exit;
    }
}
