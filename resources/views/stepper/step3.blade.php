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
                                <h1 class="hs-line-7 mb-20 mb-xs-10">Paso 3</h1>
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
                            <h2 class="section-title">Habilidades y Rasgos</h2>
                        </div>

                        <!-- Row -->
                        <div class="row">

                            <!-- Col -->

                            <div class="col-md-10 mb-40">

                                <!-- Form -->
                                <form method="post" action="{{ route('generador.paso2.store') }}" id="form" class="form">
                                    @csrf
                                    <div class="container relative">                    
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
                                                    <h3>Rasgos de personalidad </h3>
                                                    <div class="mb-20 mb-md-10">
                                                        <!-- Name -->
                                                        <label for="name">Nombre completo</label>
                                                        <input value="Santiago" type="text" autocomplete="off" name="name" id="name"
                                                            class="input-md round form-control" maxlength="100">
                                                    </div>
                    
                                                    <div class="mb-20 mb-md-10">
                                                        <!-- Surname -->
                                                        <label for="surname">Apellido</label>
                                                        <input value="Evangelista" type="text" autocomplete="off" name="surname" id="surname"
                                                            class="input-md round form-control" maxlength="100">
                                                    </div>
                    
                                                    <div class="mb-20 mb-md-10">
                                                        <label for="birthday">Fecha de nacimiento</label>
                                                        <!-- Date-->
                                                        <input value="1998-06-16" type="date" name="birthday" id="birthday"
                                                            class="input-md round form-control">
                                                    </div>
                    
                                                    <div class="mb-20 mb-md-10">
                                                        <label for="adress">Direccion</label>
                                                        <!-- Date-->
                                                        <input value="Mendoza 2300" type="text" autocomplete="off" name="adress" id="adress"
                                                            class="input-md round form-control" maxlength="100">
                                                    </div>
                                            </div>
                    
                                            <!-- End Col -->
                    
                                            <!-- Col -->
                    
                                            <div class="col-sm-4 mb-40">
                    
                                                <h3>Informacion de Contacto</h3>
                                                <div class="mb-20 mb-md-10">
                                                    <!-- Email -->
                                                    <label for="email">Email</label>
                                                    <input value="d@gmail.com" type="email" autocomplete="off" name="email" id="email"
                                                        class="input-md round form-control" maxlength="100">
                                                </div>
                    
                    
                                                <div class="mb-20 mb-md-10">
                                                    <!-- Phone -->
                                                    <label for="phone">Telefono</label>
                                                    <input type="text" name="phone" id="phone" class="input-md round form-control"
                                                        maxlength="100">
                                                </div>
                    
                                                <br>
                                                <div class="mb-20 mb-md-10">
                                                    <label style="font-size: medium" for="imagen">Imagen <small
                                                            style="color: #32a8a6">*opcional</small></label>
                                                    <br>
                                                    <input type="file" id="imagen" name="imagen">
                    
                                                </div>
                                            </div>
                    
                                            <!-- End Col -->
                    
                                            <!-- Col -->
                                            <div style="padding-left:20px ;background-image: url('https://cdn.pixabay.com/photo/2017/07/25/14/54/rain-2538429_960_720.jpg')"
                                                class="col-sm-4 mb-40"></div>
                                            <!-- End Col -->
                    
                                        </div>
                                        <!-- End Row -->
                                        <div>
                                            <button>Siguiente paso</button>
                                        </div>
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
                            <button>Generar CV</button>

                            <a href="{{ route('generador.paso2.create') }}">Volver</a>
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
    
    </script>

@endsection
