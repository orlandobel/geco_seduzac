<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Reader\IReadFilter;
use PhpOffice\PhpSpreadsheet\Shared\Date;

use App\Models\Participante;

class ExcelController extends Controller
{
    //
    public function upload(Request $request) {
        $participantes = array();
        $input_type_file = "Xlsx";
        $file_path = $request->upload_db;
        
        $reader = IOFactory::createReader($input_type_file);
        $reader->setReadDataOnly(true);

        $file = $reader->load($file_path);
        $sheet = $file->getActiveSheet();
        $max_row = $sheet->getHighestRow();

        for($i=3; $i<$max_row-2; $i++) {
            $data = [
                'entidad' => $sheet->getCellByColumnAndRow(2, $i, false)->getValue(),
                'nombre' => $sheet->getCellByColumnAndRow(7, $i, false)->getValue(),
                'aPaterno' => $sheet->getCellByColumnAndRow(8, $i, false)->getValue(),
                'aMaterno' => $sheet->getCellByColumnAndRow(9, $i, false)->getValue(),
                'cct' => $sheet->getCellByColumnAndRow(10, $i, false)->getValue()
            ];

            if(is_null($data['entidad']) ) {
                break;
            }
            $participantes[] = new Participante($data);

        }
        
        $inicio = Date::excelToDateTimeObject($sheet->getCell("T3")->getValue());
        $final = Date::excelToDateTimeObject($sheet->getCell("U3")->getValue());
        
        $curso_data = [
            'nombre' => $sheet->getCell('N3')->getValue(),
            'duracion' => $sheet->getCell('R3')->getValue(),
            'inicio' => date_format($inicio, 'd/m/Y'),
            'final' => date_format($final, 'd/m/Y')
        ];


        $curso = new Curso($curso_data);

        return redirect()->back()
            ->with('curso', $curso)
            ->with('participantes', $participantes);
    }
}