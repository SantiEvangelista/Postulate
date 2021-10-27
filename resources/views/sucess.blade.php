@extends('layout')
<head>
</head>
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
                                <h1 class="hs-line-7 mb-20 mb-xs-10">Exito!</h1>
                            </div>
                        </div>
                    </div>

                </div>
            </section>
            
            <section class="page-section bg-dark light-content">
                <p style="font-size: 3rem;text-align: center;" class="hs-line-2 mb-20 mb-xs-2">Curriculum Generado correctamente!</p>
                <div style="width: 100%;text-align: center">
                    <a href="{{ route('resultado.pdf',['generador'=>$cv]) }}" target="_blank" class="btn btn-outline-secondary">Toca para ver tu nuevo curriculum</a>
                </div>

            </section>
            <!-- End Section -->

        </main>

    </div>

@endsection
