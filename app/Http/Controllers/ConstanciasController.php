<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Participante;
use App\Models\Curso;

use App\Http\Controllers\ResourcesController;

use ZipArchive;
use Illuminate\Support\Facades\File;

class ConstanciasController extends Controller
{
    //
    public function template(Request $request) {
        $data_p = [
            'nombre' => "Orlando Odiseo",
            "aPaterno" => "Belmonte",
            "aMaterno" => "Flores",
            "curp" => "BEFO990105HZSLLR05",
            "entidad" => "Zacatecas",
            "cct" => 123456
        ];

        $data_curso = [
            "nombre" => "foo",
            "duracion" => "20",
            "inicio" => "12/05/2021",
            "final" => "13/05/2021"
        ];

        $p = new Participante($data_p);
        $c = new Curso($data_curso);

        ResourcesController::qrGenerate($p, $c);
        $pdfname = $p->curp.'.pdf';

        $pdf = \PDF::loadView('constancia', ['p' => $p]);
        $output = $pdf->output();
        file_put_contents($pdfname, $output);

        File::delete($pdfname);

        return $pdf->stream();
    }

    public function generate(Request $request) {
        $this->validate($request, [
            'curso' => 'required'
        ],
        [
            'curso.required' => 'No se ha detectado ninguna base de datos, por favor suba la base de datos en formato xlsx'
        ]);

        set_time_limit(0);

        $data_curso = json_decode($request->curso, true);
        $curso = new Curso($data_curso);

        $zip = new ZipArchive();
        $zipfile = 'constancias '.$curso->nombre.'.zip';

        $zip->open($zipfile, ZipArchive::OVERWRITE|ZipArchive::CREATE);

        foreach($request->participantes as $data_p) {
            $participante = new Participante(json_decode($data_p, true));
            ResourcesController::qrGenerate($participante, $curso);
            $pdfname = $participante->nombre.' '.$participante->aPaterno.' '.$participante->aMaterno.'.pdf';
            
            $pdf = \PDF::loadView('constancia', ['p' => $participante]);
            $output = $pdf->output();
            file_put_contents('constancias/'.$pdfname, $output);

            $zip->addFile('constancias/'.$pdfname, $curso->nombre.'/'.$pdfname);
        }

        $zip->close();
        header("Content-type: application/zip"); 
        header("Content-Disposition: attachment; filename=$zipfile");
        header("Content-length: " . filesize($zipfile));
        header("Pragma: no-cache"); 
        header("Expires: 0"); 
        readfile("$zipfile");

        File::cleanDirectory("constancias/");
        ob_clean();
        flush();

        File::delete($zipfile);

        return redirect()->back();
    }
}
