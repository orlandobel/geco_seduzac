<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Participante;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

use function PHPUnit\Framework\isNull;

class ResourcesController extends Controller
{
    //

    public function template(Request $request) {

        if(!$request->hasFile("upload_template")) {
            return redirect()->back()->withErrors(["Debe seleccionar una imagen"]);
        }
        
        $request->file("upload_template")->storeAs("public/template", "template.png");
        $msg = "msg aux";

        if(isset($request->curso) ) {
            $participantes = array();
            $data_curso = $request->curso;
            $particiapntes_array_data = $request->participantes;
    
            $curso = new Curso(json_decode($data_curso, true));
            foreach($particiapntes_array_data as $data) {
                $participante = new Participante(json_decode($data, true));
    
                $participantes[] = $participante;
            }
    
            return redirect()->back()
                ->with("curso", $curso)
                ->with("participantes", $participantes)
                ->with("msg", $msg);
        }

        return redirect()->back()->with("msg", $msg);
        
    }

    public static function qrGenerate(Participante $p, Curso $c) {
        
        $data = 
            "Nombre: " . $p->nombre ." " . $p->aPaterno . " " . $p->aMaterno . "\n".
            "Entidad: " . $p->entidad . "\n" .
            "Nombre del curso: " . $c->nombre . "\n" .
            "Fecha de inicio: " . $c->inicio . "\n" .
            "Fecha de conclución: " . $c->final;

        return QrCode::encoding("UTF-8")->generate($data, "qr.svg");

    }
}
