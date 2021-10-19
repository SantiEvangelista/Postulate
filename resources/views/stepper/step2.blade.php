@extends('layout')

@section('contenido')

    <!-- Page Loader -->
    <div class="page-loader">
        <div class="loader">Cargando...</div>
    </div>
    <!-- End Page Loader -->

    <!-- Skip to Content -->
    <a href="#main" class="btn skip-to-content">Saltar al contenido</a>
    <!-- End Skip to Content -->

    <!-- Page Wrap -->
    <div class="page bg-dark light-content" id="top">


        <main id="main">

            <!-- Home Section -->
            <section class="small-section bg-dark-alfa-50 bg-scroll light-content" style="background-color: #32a8a6"
                id="home">
                <div class="container relative">

                    <div class="row">

                        <div class="col-md-8">
                            <div class="wow fadeInUpShort" data-wow-delay=".1s">
                                <h1 class="hs-line-7 mb-20 mb-xs-10">Paso 2</h1>
                            </div>
                            <div class="wow fadeInUpShort" data-wow-delay=".2s">
                                <p class="hs-line-6 opacity-075 mb-20 mb-xs-0">
                                    Lorem ipsum dolor sit amet consectetur
                                </p>
                            </div>
                        </div>

                        <div class="col-md-4 mt-30 wow fadeInUpShort" data-wow-delay=".1s">
                            <div class="mod-breadcrumbs text-end">
                                <a href="#">Home</a>&nbsp;<span class="mod-breadcrumbs-slash">•</span>&nbsp;<a
                                    href="#">Elements</a>&nbsp;<span
                                    class="mod-breadcrumbs-slash">•</span>&nbsp;<span>Forms</span>
                            </div>
                        </div>

                    </div>

                </div>
            </section>
            <!-- End Home Section -->


            <!-- Section -->
            <section class="page-section bg-dark light-content">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="container relative">
                        @if ($errors->any())
                            <div style="color: #32a8a6 ;background-color: black" class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="text-center mb-80 mb-sm-50">
                            <h2 class="section-title">Experiencias laborales</h2>
                        </div>

                        <!-- Row -->
                        <div class="row">

                            <!-- Col -->

                            <div class="col-md-10 mb-40">

                                <!-- Form -->
                                <form method="post" action="{{ route('generador.paso2.store') }}" id="form" class="form">
                                    @csrf
                                    <h3>Experiencias previas</h3>
                                    <div class="mb-20 mb-md-10">
                                        <div id="pregunta">
                                            <input style="margin-right: 5px;" type="checkbox" id="tieneExp">
                                            <label for="tieneExp">Tienes experiencia laboral?</label>
                                        </div>
                                        <table style="visibility: hidden;border-spacing:0 10px;" id="dynamicAddRemove">
                                            <tr>
                                                <th>Nombre de la empresa</th>
                                                <th>Cargo</th>
                                                <th>Fecha de inicio</th>
                                                <th>Fecha de fin</th>
                                                <th></th>
                                            </tr>
                                            <tr style="padding-bottom: 20em;">
                                                <td style="padding-bottom: 5px"><input
                                                        style="width: 25rem;margin-right: 5px;" type="text"
                                                        name="addMoreInputFields[0][nombre]" class="form-control" /></td>
                                                <td style="padding-bottom: 5px"><input
                                                        style="width: 15rem;margin-right: 5px;" type="text"
                                                        name="addMoreInputFields[0][cargo]" class="form-control" /></td>
                                                <td style="padding-bottom: 5px"><input
                                                        style="width: 15rem;margin-right: 5px;" type="date"
                                                        name="addMoreInputFields[0][fecha_inicio]" id="fecha_inicio[0][fecha_inicio]"
                                                        class="input-md round form-control"></td>
                                                <td style="padding-bottom: 5px"><input style="width: 15rem" type="date"
                                                        name="addMoreInputFields[0][fecha_fin]" id="fecha_fin[0][fecha_fin]"
                                                        class="input-md round form-control"></td>
                                                <td style="padding-bottom: 5px"><button type="button" name="add"
                                                        id="dynamic-ar" style="border-color:#32a8a6 ;color: #32a8a6"
                                                        class="btn btn-outline-primary">+</button></td>
                                            </tr>
                                        </table>
                                    </div>

                                    <div style="display:flex;flex-direction: row" class="mb-20 mb-md-10">
                                        <div style="padding-right: 2%">
                                            <label for="secundario">Educacion Secundaria</label>
                                            <input type="text" autocomplete="off" name="secundario" id="secundario"
                                                class="input-md round form-control" maxlength="100">
                                        </div>
                                        <div style="padding-right: 2%">
                                            <label for="orientacion">Orientacion</label>
                                            <input type="text" autocomplete="off" name="orientacion" id="orientacion"
                                                class="input-md round form-control" maxlength="100">
                                        </div>
                                        <div style="padding-right: 2%">
                                            <label for="orientacion">Fecha de Inicio</label>
                                            <input type="date" min='1930-01-01' name="fecha_inicio_secundario" id="fecha_inicio_secundario"
                                                class="input-md round form-control">
                                        </div>
                                        <div style="padding-right: 2%">
                                            <label for="orientacion">Fecha de Fin</label>
                                            <input type="date" min="1930-01-01" name="fecha_fin_secundario" id="fecha_fin_secundario"
                                                class="input-md round form-control">
                                        </div>
                                        <input style="margin-right: 5px;" type="checkbox" id="tieneExpSecundario">
                                        <label for="tieneExp">Aun no termine el secundario</label>
                                    </div>


                                </form>
                                <!-- End Form -->

                            </div>

                            <!-- End Col -->

                            <!-- Col -->

                            <div class="col-sm-4 mb-40"></div>

                            <!-- End Col -->

                            <!-- Col -->
                            <!-- End Col -->

                        </div>
                        <!-- End Row -->
                        <div>
                            <button>Siguiente paso</button>

                            <a href="{{ route('generador.paso1.create') }}">Volver</a>
                        </div>
                    </div>
                </form>


            </section>
            <!-- End Section -->

        </main>



    </div>
    <!-- End Page Wrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <script type="text/javascript">
        var i = 0;
        $("#dynamic-ar").click(function() {
            ++i;
            $("#dynamicAddRemove").append(
                '<tr style="padding-bottom: 20rem;"><td style="padding-bottom: 5px"><input style="width: 25rem;margin-right: 5px" type="text" name="addMoreInputFields[' +
                i +
                '][nombre]" class="form-control" /></td><td style="padding-bottom: 5px"><input style="width: 15rem;margin-right: 5px;" type="text" name="addMoreInputFields[' +
                i +
                '][cargo]" class="form-control" /></td><td style="padding-bottom: 5px"><input style="width: 15rem;margin-right: 5px;" type="date" name="addMoreInputFields[' +i +'][fecha_inicio]" id="fecha_inicio[' +
                i +
                '][fecha_inicio]" class="input-md round form-control"></td><td style="padding-bottom: 5px"><input style="width: 15rem" type="date" name="addMoreInputFields[' +i +'][fecha_fin]" id="fecha_fin[' +
                i +
                '][fecha_fin]" class="input-md round form-control"></td><td style="padding-bottom: 5px"><button type="button" class="btn btn-outline-danger remove-input-field">Quitar</button></td></tr>'
                );
        });
        
        $(document).on('click', '.remove-input-field', function() {
            $(this).parents('tr').remove();
        });

        $("#tieneExp").click(function() {

            if ($('#tieneExp').is(':checked')) {
                $("#dynamicAddRemove").css({
                    'visibility': 'visible'
                });
            } else {
                $("#dynamicAddRemove").css({
                    'visibility': 'hidden'
                });
            }
        });

        $("#tieneExpSecundario").click(function() {

            if ($('#tieneExpSecundario').is(':checked')) {
                $("#fecha_fin_secundario").prop('disabled', true);
            } else {
                $("#fecha_fin_secundario").prop('disabled', false);
            }
        });

        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth() + 1; //January is 0!
        var yyyy = today.getFullYear();

        if (dd < 10) {
            dd = '0' + dd;
        }

        if (mm < 10) {
            mm = '0' + mm;
        }

        today = yyyy + '-' + mm + '-' + dd;
        document.getElementById("fecha_inicio_secundario").setAttribute("max", today);
        document.getElementById("fecha_fin_secundario").setAttribute("max", today);
    </script>

@endsection
