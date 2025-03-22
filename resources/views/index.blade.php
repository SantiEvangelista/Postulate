@extends('layout')
@section('body')
    @include('components.navbar')

    <main>
        <div class="w-100 overflow-hidden bg-gray-100" id="top">
            <div class="container position-relative">
                <div class="col-12 col-lg-8 mt-0 h-100 position-absolute top-0 end-0 bg-cover" data-aos="fade-left"
                    style="background-image: url({{ asset('images/webp/interior11.webp') }});">
                </div>
                <div class="row">
                    <div class="col-lg-7 py-vh-6 position-relative" data-aos="fade-right">
                        <h1 class="display-1 fw-bold mt-5">Sell more useless stuff faster!</h1>
                        <p class="lead">To be honest, this is just a stupid placeholder text. We don´t know how to
                            sell anything, not even lesser or slower as you.</p>
                        <a href="#" class="btn btn-dark btn-xl shadow me-3 rounded-0 my-5">Get started free</a>
                    </div>
                </div>
            </div>
        </div>

        @include('components.reasons')



        @include('components.stats')



        <div class="container py-vh-4 w-100 overflow-hidden">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-lg-5">
                    <h3 class="py-5 border-top border-dark" data-aos="fade-right">What our clients say</h3>
                </div>
                <div class="col-md-7" data-aos="fade-left">
                    <blockquote>
                        <div class="fs-4 my-3 fw-light pt-4 border-bottom pb-3">"I´am the CEO of this company. So maybe
                            you think "he will tell us something super awesome about it only". But no. Its a really
                            strange place to work with creepy people all around.
                            They do some computer stuff I don´t understand. But I wear expensive Glasses and a Patagonia
                            Hoodie. So I´am fine with it."</div>
                        <img src="{{ asset('images/webp/person11.webp') }}" width="64" height="64"
                            class="img-fluid rounded-circle me-3" alt="" data-aos="fade">
                        <span><span class="fw-bold">John Doe,</span>
                            CEO of Stride Ltd.</span>
                    </blockquote>
                </div>

            </div>
        </div>

        <div class="small py-vh-3 w-100 overflow-hidden">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-lg-4 border-end" data-aos="fade-up">
                        <div class="d-flex">
                            <div class="col-md-3 flex-fill pt-3 pe-3 pe-md-0">
                                <svg xmlns="http://www.w3.org/2000/svg" width="42" height="42" fill="currentColor"
                                    class="bi bi-box-seam" viewbox="0 0 16 16">
                                    <path
                                        d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5l2.404.961L10.404 2l-2.218-.887zm3.564 1.426L5.596 5 8 5.961 14.154 3.5l-2.404-.961zm3.25 1.7-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923l6.5 2.6zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464L7.443.184z" />
                                </svg>
                            </div>
                            <div class="col-md-9 flex-fill">
                                <h3 class="h5 my-2">Delivery Service</h3>
                                <p>If we had any physical goods we would deliver them to your door steps. Of course in
                                    time and to the right adress. But we have no products...</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 border-end" data-aos="fade-up" data-aos-delay="200">
                        <div class="d-flex">
                            <div class="col-md-3 flex-fill pt-3 pt-3 pe-3 pe-md-0">
                                <svg xmlns="http://www.w3.org/2000/svg" width="42" height="42" fill="currentColor"
                                    class="bi bi-card-checklist" viewbox="0 0 16 16">
                                    <path
                                        d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z" />
                                    <path
                                        d="M7 5.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0zM7 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 0 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0z" />
                                </svg>
                            </div>
                            <div class="col-md-9 flex-fill">
                                <h3 class="h5 my-2">Independently Checked</h3>
                                <p>Maybe we would do something to ensure that you get what you ordered. But you can´t
                                    order anything here, so we can give you a 100% gurantee that anything would be
                                    great!</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="400">
                        <div class="d-flex">
                            <div class="col-md-3 flex-fill pt-3 pt-3 pe-3 pe-md-0">
                                <svg xmlns="http://www.w3.org/2000/svg" width="42" height="42" fill="currentColor"
                                    class="bi bi-window-sidebar" viewbox="0 0 16 16">
                                    <path
                                        d="M2.5 4a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1zm2-.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm1 .5a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z" />
                                    <path
                                        d="M2 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2H2zm12 1a1 1 0 0 1 1 1v2H1V3a1 1 0 0 1 1-1h12zM1 13V6h4v8H2a1 1 0 0 1-1-1zm5 1V6h9v7a1 1 0 0 1-1 1H6z" />
                                </svg>
                            </div>
                            <div class="col-md-9 flex-fill">
                                <h3 class="h5 my-2">Online Support</h3>
                                <p>Okay, we have this crazy online support form. Fill it out and the content will be
                                    mailed to you as PDF. Print it out. Than send it via Fax to our super duper hidden
                                    Fax number.</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>









    </main>

    @include('components.footer')
@endsection
