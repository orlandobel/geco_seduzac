<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Participante;
use Hamcrest\Core\IsNot;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isNull;

class ResourcesController extends Controller
{
    //

    public function plantilla(Request $request) {

        if(!$request->hasFile('upload_template')) {
            return redirect()->back()->withErrors(['Debe seleccionar una imagen']);
        }
        
        $request->file('upload_template')->storeAs('public/template', 'template.png');
        $msg = 'msg aux';

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
                ->with('curso', $curso)
                ->with('participantes', $participantes)
                ->with('msg', $msg);
        }

        return redirect()->back()->with('msg', $msg);
        
    }
}
