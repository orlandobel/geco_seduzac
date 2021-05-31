<?php
    $curso = null;
    $participantes = null;
    $msg = null;

    if(session('curso'))
        $curso = session('curso');

    if(session('participantes'))
        $participantes = session('participantes');

    if(session('msg'))
        $msg = session('msg');
?>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="">
      <meta name="author" content="">
  

      <title>geco seduzac</title>

      <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
      <link rel="stylesheet" href="{{ asset('Templates/css/sb-admin-2.min.css') }}">
      <link rel="stylesheet" href="{{ asset('Templates/vendor/fontawesome-free/css/all.min.css') }}">

      <link rel="stylesheet" href="{{ asset('customcss/excel-form.css') }}">
    </head>
    <body id="page-top">

        <div class="modal fade" id="db-modal" tabindex="-1" role="dialog" aria-labelledby="uploadModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <form action="{{ route('participantes.subir') }}" method="post" enctype="multipart/form-data" id="db-form">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="uploadModalTitle">Seleccione la base de datos Xlsx</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div>
                                <label for="" id="db_name">Seleccione un archivo</label>
                                <h2>Cuerpo del modal</h2>
                            </div>
                            <div class="dropdown-divider"></div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="primer_registro">Fila del primer participante</label>
                                        <input type="text" name="primer_registro" id="primer_registro" class="form-controll row-form">
                                    </div>
                                </div>
                                
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="primer_registro">Fila del ultimo participante</label>
                                        <input type="text" name="ultimo_registro" id="último_registro" class="form-controll row-form">
                                    </div>
                                </div>
                            </div>

                            <div class="dropdown-divider"></div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="row justify-content-center">
                                        <label for="">Coloque la columna del capo solicitado</label>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 border-right">
                                            <div class="row justify-content-center mb-3">
                                                Con respecto al participante
                                            </div>
                                            <div class="row justify-content-center">
                                                <div class="col-lg-6">
                                                    <div class="row mb-2">
                                                        <div class="col-lg-10">
                                                            <label for="nombre_col">Nombre</label>
                                                        </div>
                                                        <div class="col-lg-1">
                                                            <input type="text" name="nombre_col" id="nombre_col" class="form-controll col-form">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-lg-10">
                                                            <label for="paterno_col align-middle">Apellido paterno</label>
                                                        </div>
                                                        <div class="col-lg-1">
                                                            <input type="text" name="paterno_col" id="paterno_col" class="form-controll col-form">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-lg-10">
                                                            <label for="materno">Apellido Materno</label>
                                                        </div>
                                                        <div class="col-lg-1">
                                                            <input type="text" name="materno_col" id="materno_col" class="form-controll col-form">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-lg-10">
                                                            <label for="curp_col">CURP</label>
                                                        </div>
                                                        <div class="col-lg-1">
                                                            <input type="text" name="curp_col" id="curp_col" class="fomr-controll col-form">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-lg-10">
                                                            <label for="entidad_col">Entidad</label>
                                                        </div>
                                                        <div class="col-lg-1">
                                                            <input type="text" name="entidad_col" id="entidad_col" class="form-contro col-form">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-lg-10">
                                                            <label for="cct">CCT</label>
                                                        </div>
                                                        <div class="col-lg-1">
                                                            <input type="text" name="cct_col" id="cct_col" class="form-contro col-form">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
        
                                        <div class="col-lg-6">
                                            <div class="row justify-content-center mb-3">
                                                <label for="">Con respecto al curso</label>
                                            </div>
                                            <div class="row justify-content-center">
                                                <div class="col-lg-6">
                                                    <div class="row mb-2">
                                                        <div class="col-lg-10">
                                                            <label for="curso_col">Nombre</label>
                                                        </div>
                                                        <div class="col-lg-1">
                                                            <input type="text" name="curso_col" id="curso_col" class="form-controll col-form">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-lg-10">
                                                            <label for="duracion_col">Duración</label>
                                                        </div>
                                                        <div class="col-lg-1">
                                                            <input type="text" name="duracion_col" id="duracion_col" class="form-controll col-form">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-lg-10">
                                                            <label for="inicio_col">Inicio</label>
                                                        </div>
                                                        <div class="col-lg-1">
                                                            <input type="text" name="inicio_col" id="inicio_col" class="form-controll col-form">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-lg-10">
                                                            <label for="final_col">Finalización</label>
                                                        </div>
                                                        <div class="col-lg-1">
                                                            <input type="text" name="final_col" id="final_col" class="form-controll col-form">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="file" name="upload_db" id="upload_db" hidden accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
                            
                            <a href="javascript:upload();" class="nav-link mr-auto">Seleccionar base de datos</a>
                            
                            <button type="submit" class="btn btn-primary" id="submit" disabled>Subir</button>
                            <button class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="modal fade" id="save-modal" tabindex="-1" role="dialog" aria-labelledby="saveModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="{{ route('constancias.crear') }}" method="POST">
                        @csrf
                        <input type="hidden" name="curso" value="{{ $curso }}">
                        @if(isset($participantes))
                            @foreach($participantes as $p)
                                <input type="hidden" name="participantes[]" value="{{ $p }}">
                            @endforeach
                        @endif
    
                        <div class="modal-body">
                            <input type="radio" name="plantilla" id="plantilla1" class="form-controll"  value="version1">Version 1 <br>
                            <input type="radio" name="plantilla" id="plantilla2" class="form-controll"  value="version2">Version 2 <br>
                            <input type="text" name="grupo_curso" id="grupo_curso" class="form-controll" disabled>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" id="generar" class="btn btn-primary">Generar</button>
                            <button class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div id="wrapper">

            <!-- Sidebar -->
            <ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">
    
                <!-- Sidebar - Brand -->
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                    <div class="sidebar-brand-icon rotate-n-15">
                        <i class="fas fa-laugh-wink"></i>
                    </div>
                    <div class="sidebar-brand-text mx-3">SEDUZAC</sup></div>
                </a>
    
                <!-- Divider -->
                <hr class="sidebar-divider my-0">

                <!-- Divider -->
                <hr class="sidebar-divider">
    
                <!-- Heading -->
                <div class="sidebar-heading">
                    Control de sistema
                </div>
                
                <li class="nav-item">
                    <a href="#" class="nav-link" data-toggle="modal" data-target="#db-modal">
                        <i class="fas fa-fw fa-wrench"></i>
                        <span>Subir base de datos</span>
                    </a>
                </li>
                
                <li class="nav-item">
                    <a href="#" class="nav-link" data-toggle="modal" data-target="#save-modal">
                        <i class="fas fa-fw fa-wrench"></i>
                        <span>Guardar</span>
                    </a>
                </li>
            </ul>
            <!-- End of Sidebar -->
    
            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">
                <!-- Main Content -->
                <div id="content">
                    <!-- Topbar -->
                    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    </nav>
                    <!-- End of Topbar -->
    
                    <!-- Begin Page Content -->
                    <div class="container-fluid">
                        <div class="row justify-content-center">
                            <div class="col-xl-10 col-lg12 col-md-9">
                                @if($errors->any())
                                    @foreach($errors->all() as $error)
                                    <div class="alert alert-danger" role="alert" id="error-alert" aria-label="close">{{ $error }}</div>
                                    @endforeach
                                @endif

                                <div class="vard-o-hidden border-8 shadow-lg my-5">    
                                    <div class="card-body p-0">
                                        <div class="row">
                                            <div class="col-lg-8">
                                                <div class="pt-5 pl-5">
                                                    <div class="text-center">
                                                        <div class="form-group">
                                                            <label for="">Nombre del curso</label>
                                                            @if(isset($curso))
                                                                <input type="text" name="nombre-curso" id="nobre-curso" class="form-control" value="{{ $curso->nombre }}">
                                                            @else
                                                                <input type="text" name="nombre-curso" id="nobre-curso" class="form-control" disabled>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="pt-5 pr-5">
                                                    <div class="text-center">
                                                        <div class="form-group">
                                                            <label for="duracion">Duración (horas)</label>
                                                            @if(isset($curso))
                                                                <input type="text" name="duracion" id="duracion" class="form-control" value="{{ $curso->duracion }}">
                                                            @else
                                                                <input type="text" name="duracion" id="duracion" class="form-control" disabled>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="pt-2 pl-5 pb-5">
                                                    <div class="text-center">
                                                        <div class="form-group">
                                                            <label for="">Fecha de inicio</label>
                                                            @if(isset($curso))
                                                                <input type="text" name="inicio" id="inicio" class="form-control" value="{{ $curso->inicio }}">
                                                            @else
                                                                <input type="text" name="inicio" id="inicio" class="form-control" disabled>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="pt-2 pr-5 pb-5">
                                                    <div class="text-center">
                                                        <div class="form-group">
                                                            <label for="">Fecha de final</label>
                                                            @if(isset($curso))
                                                                <input type="text" name="final" id="final" class="form-control" value="{{ $curso->final }}">
                                                            @else
                                                                <input type="text" name="final" id="final" class="form-control" disabled>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row justify-content-center">
                            <div class="col-xl-10 col-lg-12 col-md-9">
                                <div class="vard-o-hidden border-8 shadow-lg my-5">
                                    <div class="card-body p-0">
                                        <div class="vard-o-hidden border-8 shadow-lg my-5">
                                            <div class="card-body p-0">
                                                <div class="row px-5 pt-5 pb-3 text-center">
                                                    <div class="col-lg-5">
                                                        Nombre
                                                    </div>
                                                    <div class="col-lg-4">
                                                        Entidad
                                                    </div>
                                                    <div class="col-lg-2">
                                                        CCT
                                                    </div>
                                                </div>
                                                @if(isset($participantes))
                                                    @foreach($participantes as $participante)
                                                        <div class="dropdown-divider"></div>
                                                        <div class="row px-5 py-2 text-center align-middle">
                                                            <div class="col-lg-5">
                                                                {{ $participante->nombre }} {{ $participante->aPaterno }} {{ $participante->aMaterno }}
                                                            </div>
                                                            <div class="col-lg-4">
                                                                {{ $participante->entidad }}
                                                            </div>
                                                            <div class="col-lg-2">
                                                                {{ $participante->cct}}
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                    <div class="row pb-3"></div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.container-fluid -->
    
                </div>
                <!-- End of Main Content -->
    
                <!-- Footer -->
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright © Your Website 2020</span>
                        </div>
                    </div>
                </footer>
                <!-- End of Footer -->
    
            </div>
            <!-- End of Content Wrapper -->
    
        </div>

        <!-- Bootstrap core JavaScript-->
        <script src="{{ asset('Templates/vendor/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('Templates/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

        <!-- Core plugin JavaScript-->
        <script src="{{ asset('Templates/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

        <!-- Custom scripts for all pages-->
        <script src="{{ asset('Templates/js/sb-admin-2.min.js') }}"></script>

        <!-- Page level plugins -->
        <script src="{{ asset('Templates/vendor/chart.js/Chart.min.js') }}"></script>

        <!-- Page level custom scripts -->
        <script src="{{ asset('Templates/js/demo/chart-area-demo.js') }}"></script>
        <script src="{{ asset('Templates/js/demo/chart-pie-demo.js') }}"></script>

        <script src="{{ asset('customjs/upload_data.js') }}"></script>
        <script src="{{ asset('customjs/upload_template.js') }}"></script>

        @if(isset($msg))
        <script>
            $(document).ready( function() {
                $("#template-alert").show();
                
                setTimeout(function() {
                    $("#template-alert").fadeTo(500, 0).slideUp(500, function() {
                        $(this).remove();
                    })
                },2000)
            });
        </script>
        @endif

        <script>
            $("input[name='plantilla']").on('change', function() {
                if(this.value == "version2")
                    $('#grupo_curso').prop('disabled', false);
                else
                    $('#grupo_curso').prop('disabled', true);
            })
        </script>
    </body>
</html>
