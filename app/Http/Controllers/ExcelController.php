<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Shared\Date;

use Carbon\Carbon;

use App\Models\Participante;

class ExcelController extends Controller
{
    //
    public function upload(Request $request) {
        $this->validate($request, [
            'primer_registro' => 'required',
            'ultimo_registro' => 'required',
            'nombre_col' => 'required',
            'paterno_col' => 'required',
            'materno_col' => 'required',
            'curp_col' => 'required',
            'entidad_col' => 'required',
            'cct_col' => 'required',
            'curso_col' => 'required',
            'duracion_col' => 'required',
            'inicio_col' => 'required',
            'final_col' => 'required',
            'upload_db' => 'required'
        ], [
            'primer_registro.required' => 'El numero de fila del primer registro es obligatorio',
            'ultimo_registro.required' => 'El numero de fila del último registro es obligatorio',
            'nombre_col.required' => 'La columna del nombre del participante es requerida',
            'paterno_col.required' => 'La columna del apellido paterno del participante es requerida',
            'materno_col.required' => 'La columna del apellido materno del participante es requerida',
            'curp_col.required' => 'La columna del CURP del participante es requerida',
            'entidad_col.required' => 'La columna de la entidad del participante es requerida',
            'cct_col.required' => 'La columna del CCT del participante es requerida',
            'curso_col.required' => 'La columna del nombre del curso es requerida',
            'duracion_col.required' => 'La columna de la duración del curso es requerida',
            'inicio_col.required' => 'La columna de la fecha de inicio del curso es requerida',
            'final_col.required' => 'La columna de la fecha de finalización curso es requerida',
            'upload_db.required' => 'Seleccione una base de datos'
        ]);

        $participantes = array();
        $input_type_file = "Xlsx";
        $file_path = $request->upload_db;
        
        $reader = IOFactory::createReader($input_type_file);
        $reader->setReadDataOnly(true);

        $file = $reader->load($file_path);
        $sheet = $file->getActiveSheet();

        $init_row = $request->primer_registro;
        $max_row = $request->ultimo_registro + 1;

        $nombre_col = $request->nombre_col;
        $paterno_col = $request->paterno_col;
        $materno_col = $request->materno_col;
        $curp_col = $request->curp_col;
        $entidad_col = $request->entidad_col;
        $cct_col = $request->cct_col;
        $curso_col = $request->curso_col;
        $duracion_col = $request->duracion_col;
        $inicio_col = $request->inicio_col;
        $final_col = $request->final_col;

        for($i=$init_row; $i<$max_row; $i++) {
            $data = [
                'entidad' => $sheet->getCell($entidad_col.$i)->getValue(),
                'nombre' => $sheet->getCell($nombre_col.$i)->getValue(),
                'aPaterno' => $sheet->getCell($paterno_col.$i)->getValue(),
                'aMaterno' => $sheet->getCell($materno_col.$i)->getValue(),
                'cct' => $sheet->getCell($cct_col.$i)->getValue(),
                'curp' => $sheet->getCell($curp_col.$i)->getValue()
            ];

            if(is_null($data['entidad']) ) {
                break;
            }
            $participantes[] = new Participante($data);
        }
        

        $inicio = Date::excelToDateTimeObject($sheet->getCell($inicio_col.$init_row)->getValue());
        $final = Date::excelToDateTimeObject($sheet->getCell($final_col.$init_row)->getValue());
        
        setlocale(LC_TIME, 'es_MX.UTF-8');
        Carbon::setLocale('es_MX');

        $fecha_inicio = date_format($inicio, 'Y-m-d');
        $fecha_final = date_format($final, 'Y-m-d');

        $curso_data = [
            'nombre' => $sheet->getCell($curso_col.$init_row)->getValue(),
            'duracion' => $sheet->getCell($duracion_col.$init_row)->getValue(),
            'inicio' => Carbon::parse($fecha_inicio)->formatLocalized('%d de %B del %Y'),
            'final' => Carbon::parse($fecha_final)->formatLocalized('%d de %B del %Y')
        ];

        $curso = new Curso($curso_data);

        return redirect()->back()
            ->with('curso', $curso)
            ->with('participantes', $participantes);
    }
}