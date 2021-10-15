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

                    <div class="text-center mb-80 mb-sm-50">
                        <h2 class="section-title">Experiencias laborales</h2>
                    </div>

                    <!-- Row -->
                    <div class="row">

                        <!-- Col -->

                        <div class="col-md-10 mb-40">

                            <!-- Form -->
                            <form method="post" action="#" id="form" class="form">

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
                                            <td style="padding-bottom: 5px"><input style="width: 25rem;margin-right: 5px;" type="text" name="addMoreInputFields[0][nombre]" class="form-control" /></td>
                                            <td style="padding-bottom: 5px"><input style="width: 15rem;margin-right: 5px;" type="text" name="addMoreInputFields[0][cargo]" class="form-control" /></td>
                                            <td style="padding-bottom: 5px"><input style="width: 15rem;margin-right: 5px;" type="date" name="fecha_inicio" id="fecha_inicio[0][fecha_inicio]" class="input-md round form-control"></td>
                                            <td style="padding-bottom: 5px"><input style="width: 15rem" type="date" name="fecha_fin" id="fecha_fin[0][fecha_fin]" class="input-md round form-control"></td>
                                            <td style="padding-bottom: 5px"><button type="button" name="add" id="dynamic-ar" style="border-color:#32a8a6 ;color: #32a8a6" class="btn btn-outline-primary">+</button></td>
                                        </tr>
                                    </table>
                                </div>

                                <div class="mb-20 mb-md-10 col-md-4">
                                    <div>
                                        <!-- Name -->
                                        <label for="secundario">Educacion Secundaria</label>
                                        <input type="text" autocomplete="off" name="secundario" id="secundario" class="input-md round form-control" maxlength="100">

                                    </div>

                                    <label for="orientacion">Orientacion</label>
                                    <input type="text" autocomplete="off" name="orientacion" id="orientacion" class="input-md round form-control" maxlength="100">
                                </div>

                                <div class="mb-20 mb-md-10">
                                    <!-- Surname -->
                                    <label for="surname">Apellido</label>
                                    <input type="text" autocomplete="off" name="surname" id="surname"
                                        class="input-md round form-control" maxlength="100">
                                </div>

                                <div class="mb-20 mb-md-10">
                                    <label for="fecha_nacimiento">Fecha de nacimiento</label>
                                    <!-- Date-->
                                    <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" class="input-md round form-control">
                                </div>

                                <div class="mb-20 mb-md-10">
                                    <label for="adress">Direccion</label>
                                    <!-- Date-->
                                    <input type="text" autocomplete="off" name="adress" id="adress"
                                        class="input-md round form-control" maxlength="100">
                                </div>

                            </form>
                            <!-- End Form -->

                        </div>

                        <!-- End Col -->

                        <!-- Col -->

                        <div class="col-sm-4 mb-40"></div>

                        <!-- End Col -->

                        <!-- Col -->
                        <div style="padding-left:20px ;background-image: url('https://cdn.pixabay.com/photo/2017/07/25/14/54/rain-2538429_960_720.jpg')"
                            class="col-sm-4 mb-40"></div>
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
        $("#dynamic-ar").click(function () {
            ++i;
            $("#dynamicAddRemove").append('<tr style="padding-bottom: 20rem;"><td style="padding-bottom: 5px"><input style="width: 25rem;margin-right: 5px" type="text" name="addMoreInputFields[' + i +'][nombre]" class="form-control" /></td><td style="padding-bottom: 5px"><input style="width: 15rem;margin-right: 5px;" type="text" name="addMoreInputFields[' + i +'][cargo]" class="form-control" /></td><td style="padding-bottom: 5px"><input style="width: 15rem;margin-right: 5px;" type="date" name="fecha_inicio" id="fecha_inicio[' + i +'][fecha_inicio]" class="input-md round form-control"></td><td style="padding-bottom: 5px"><input style="width: 15rem" type="date" name="fecha_fin" id="fecha_fin[' + i +'][fecha_fin]" class="input-md round form-control"></td><td style="padding-bottom: 5px"><button type="button" class="btn btn-outline-danger remove-input-field">Quitar</button></td></tr>');});
        $(document).on('click', '.remove-input-field', function () {
            $(this).parents('tr').remove();
        });

        $("#tieneExp").click(function () {

            if ($('#tieneExp').is(':checked')) {
                $("#dynamicAddRemove").css({ 'visibility' : 'visible'});
                }
            else{
                $("#dynamicAddRemove").css({ 'visibility' : 'hidden'});
            }
            });
    </script>

@endsection
