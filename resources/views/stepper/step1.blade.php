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
                                <h1 class="hs-line-7 mb-20 mb-xs-10">Paso 1</h1>
                            </div>
                            <div class="wow fadeInUpShort" data-wow-delay=".2s">
                                
                            </div>
                        </div>

                    </div>

                </div>
            </section>
            <!-- End Home Section -->


            <!-- Section -->
            <section class="page-section bg-dark light-content">
                <form action="{{ route('generador.paso1.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="container relative">

                    <div class="text-center mb-80 mb-sm-50">
                        <h2 class="section-title">Datos personales</h2>
                    </div>

                    <!-- Row -->
                    <div class="row">

                        <!-- Col -->
                        @if ($errors->any())
                            <div style="color: #32a8a6 ;background-color: black" class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="col-sm-4 mb-40">
                                <h3>Informacion personal basica</h3>
                                <div class="mb-20 mb-md-10">
                                    <!-- Name -->
                                    <label for="name">Nombre completo</label>
                                    
                                    
                                    <input type="text" autocomplete="off" name="name" value="{{ isset($sessionData) ? $sessionData['name'] : '' }}" id="name"
                                        class="input-md round form-control" maxlength="30">
                                </div>

                                <div class="mb-20 mb-md-10">
                                    <!-- Surname -->
                                    <label for="surname">Apellido</label>
                                    <input type="text" autocomplete="off" name="surname" id="surname" value="{{ isset($sessionData) ? $sessionData['surname'] : '' }}"
                                        class="input-md round form-control" maxlength="30">
                                </div>

                                <div class="mb-20 mb-md-10">
                                    <label for="birthday">Fecha de nacimiento</label>
                                    <!-- Date-->
                                    <input type="date" name="birthday" id="birthday" value="{{ isset($sessionData) ? $sessionData['birthday'] : '' }}"
                                        class="input-md round form-control">
                                </div>

                                <div class="mb-20 mb-md-10">
                                    <label for="adress">Dirección</label>
                                    <!-- Date-->
                                    <input type="text" autocomplete="off" name="adress" id="adress" value="{{ isset($sessionData) ? $sessionData['adress'] : '' }}"
                                        class="input-md round form-control" maxlength="25">
                                </div>
                        </div>

                        <!-- End Col -->

                        <!-- Col -->

                        <div class="col-sm-4 mb-40">

                            <h3>Información de Contacto</h3>
                            <div class="mb-20 mb-md-10">
                                <!-- Email -->
                                <label for="email">Email</label>
                                <input  type="email" autocomplete="off" name="email" id="email"  value="{{ isset($sessionData) ? $sessionData['email'] : '' }}"
                                    class="input-md round form-control" maxlength="25">
                            </div>


                            <div class="mb-20 mb-md-10">
                                <!-- Phone -->
                                <label for="phone">Teléfono</label>
                                <input type="text" name="phone" id="phone" class="input-md round form-control" value="{{ isset($sessionData) ? $sessionData['phone'] : '' }}"
                                    maxlength="100">
                            </div>

                            <br>
                        </div>

                        <!-- End Col -->

                        <!-- Col -->
                        <div style="padding-left:20px ;background-image: url('https://cdn.pixabay.com/photo/2017/07/25/14/54/rain-2538429_960_720.jpg')"
                            class="col-sm-4 mb-40"></div>
                        <!-- End Col -->

                    </div>
                    <!-- End Row -->
                    <div>
                        <div style="width: 100%;text-align: center">
                            <button class="btn btn-outline-secondary">Siguiente paso</button>
                        </div>
                    </div>
                </div>
            </form>
            </section>
            <!-- End Section -->

        </main>



    </div>
    <!-- End Page Wrap -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/imask/6.0.7/imask.min.js" integrity="sha512-qCt/OTd55ilhuXLRNAp/G8uONXUrpFoDWsXDtyjV4wMbvh46dOEjvHZyWkvnffc6I2g/WHSKsaFUCm0RISxnzQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>


        var phoneMask = IMask(
            document.getElementById("phone"),
            {
                mask: "+{000}-(000)-0000000",
            }
        );
    </script>

@endsection
