<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>@yield('title')</title>
        {{-- <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" /> --}}
        {{-- <link rel="icon" type="image/x-icon" href="{{asset("assets/sb/assets/img/favicon.ico")}}" /> --}}

        <link rel="apple-touch-icon" sizes="57x57" href="{{asset("assets/sb/assets/img/fav/apple-icon-57x57.png")}}">
        <link rel="apple-touch-icon" sizes="60x60" href="{{asset("assets/sb/assets/img/fav/apple-icon-60x60.png")}}">
        <link rel="apple-touch-icon" sizes="72x72" href="{{asset("assets/sb/assets/img/fav/apple-icon-72x72.png")}}">
        <link rel="apple-touch-icon" sizes="76x76" href="{{asset("assets/sb/assets/img/fav/apple-icon-76x76.png")}}">
        <link rel="apple-touch-icon" sizes="114x114" href="{{asset("assets/sb/assets/img/fav/apple-icon-114x114.png")}}">
        <link rel="apple-touch-icon" sizes="120x120" href="{{asset("assets/sb/assets/img/fav/apple-icon-120x120.png")}}">
        <link rel="apple-touch-icon" sizes="144x144" href="{{asset("assets/sb/assets/img/fav/apple-icon-144x144.png")}}">
        <link rel="apple-touch-icon" sizes="152x152" href="{{asset("assets/sb/assets/img/fav/apple-icon-152x152.png")}}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{asset("assets/sb/assets/img/fav/apple-icon-180x180.png")}}">
        <link rel="icon" type="image/png" sizes="192x192"  href="{{asset("assets/sb/assets/img/fav/android-icon-192x192.png")}}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{asset("assets/sb/assets/img/fav/favicon-32x32.png")}}">
        <link rel="icon" type="image/png" sizes="96x96" href="{{asset("assets/sb/assets/img/fav/favicon-96x96.png")}}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{asset("assets/sb/assets/img/fav/favicon-16x16.png")}}">
        <link rel="manifest" href=imagenes/fav/manifest.json">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
        <meta name="theme-color" content="#ffffff">


        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        {{-- <link href="css/styles.css" rel="stylesheet" /> --}}
        <link href="{{asset("assets/sb/css/styles.css")}}" rel="stylesheet" />
        <link href="{{asset("assets/sb/css/whatsapp.css")}}" rel="stylesheet" />


        <link rel="stylesheet" type="text/css" href="{{asset("assets/sb/css/galeria.css")}}" />
        <link rel="stylesheet" type="text/css" href="{{asset("assets/sb/css/magnific-popup.css")}}" />
        <link rel="stylesheet" type="text/css" href="{{asset("assets/sb/css/slick.css")}}" />
        <link rel="stylesheet" type="text/css" href="{{asset("assets/sb/css/slick-theme.css")}}" />

    </head>
    <body id="page-top">

        <!-- Messenger plugin del chat Code -->
    <div id="fb-root"></div>

    <!-- Your plugin del chat code -->
    <div id="fb-customer-chat" class="fb-customerchat">
    </div>

    <script>
      var chatbox = document.getElementById('fb-customer-chat');
      chatbox.setAttribute("page_id", "113855177741299");
      chatbox.setAttribute("attribution", "biz_inbox");

      window.fbAsyncInit = function() {
        FB.init({
          xfbml            : true,
          version          : 'v12.0'
        });
      };

      (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/es_LA/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
    </script>

        <a href="https://wa.me/51971142315?text=Hola,%20estoy%20interesado%20en%20los%20servicios%20que%20ofrecen%20en%20su%20página%20web" class="whatsapp" target="_blank"> <i class="fab fa-whatsapp whatsapp-icon"></i></a>
        <b class="cotizacion" id="botonModalCotizacion"> Solicita cotización</b>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            @include('theme/sb/navbar')
        </nav>
        @yield('contenido')
        <!-- Footer-->
        <footer class="footer py-4">
            @include('theme/sb/footer')
        </footer>
        <!-- Portfolio Modals-->
        <!-- Modal 1-->
        <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-dismiss="modal"><img src="{{asset("assets/sb/assets/img/close-icon.svg")}}" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <!-- Project Details Go Here-->
                                    <h2 class="text-uppercase">Mall Plaza Comas</h2>
                                    <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                                    <img class="img-fluid d-block mx-auto" src="assets/sb/assets/img/portafolio/mallplaza.jpg" alt="" />
                                    <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                                    <ul class="list-inline">
                                        <li>Date: January 2020</li>
                                        <li>Client: Threads</li>
                                        <li>Category: Illustration</li>
                                    </ul>
                                    <button class="btn btn-primary" data-dismiss="modal" type="button">
                                        <i class="fas fa-times mr-1"></i>
                                        Close Project
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal 2-->
        <div class="portfolio-modal modal fade" id="portfolioModal2" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <!-- Project Details Go Here-->
                                    <h2 class="text-uppercase">Project Name</h2>
                                    <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                                    <img class="img-fluid d-block mx-auto" src="assets/img/portfolio/02-full.jpg" alt="" />
                                    <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                                    <ul class="list-inline">
                                        <li>Date: January 2020</li>
                                        <li>Client: Explore</li>
                                        <li>Category: Graphic Design</li>
                                    </ul>
                                    <button class="btn btn-primary" data-dismiss="modal" type="button">
                                        <i class="fas fa-times mr-1"></i>
                                        Close Project
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal 3-->
        <div class="portfolio-modal modal fade" id="portfolioModal3" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <!-- Project Details Go Here-->
                                    <h2 class="text-uppercase">Project Name</h2>
                                    <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                                    <img class="img-fluid d-block mx-auto" src="assets/img/portfolio/03-full.jpg" alt="" />
                                    <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                                    <ul class="list-inline">
                                        <li>Date: January 2020</li>
                                        <li>Client: Finish</li>
                                        <li>Category: Identity</li>
                                    </ul>
                                    <button class="btn btn-primary" data-dismiss="modal" type="button">
                                        <i class="fas fa-times mr-1"></i>
                                        Close Project
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal 4-->
        <div class="portfolio-modal modal fade" id="portfolioModal4" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <!-- Project Details Go Here-->
                                    <h2 class="text-uppercase">Project Name</h2>
                                    <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                                    <img class="img-fluid d-block mx-auto" src="assets/img/portfolio/04-full.jpg" alt="" />
                                    <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                                    <ul class="list-inline">
                                        <li>Date: January 2020</li>
                                        <li>Client: Lines</li>
                                        <li>Category: Branding</li>
                                    </ul>
                                    <button class="btn btn-primary" data-dismiss="modal" type="button">
                                        <i class="fas fa-times mr-1"></i>
                                        Close Project
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal 5-->
        <div class="portfolio-modal modal fade" id="portfolioModal5" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <!-- Project Details Go Here-->
                                    <h2 class="text-uppercase">Project Name</h2>
                                    <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                                    <img class="img-fluid d-block mx-auto" src="assets/img/portfolio/05-full.jpg" alt="" />
                                    <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                                    <ul class="list-inline">
                                        <li>Date: January 2020</li>
                                        <li>Client: Southwest</li>
                                        <li>Category: Website Design</li>
                                    </ul>
                                    <button class="btn btn-primary" data-dismiss="modal" type="button">
                                        <i class="fas fa-times mr-1"></i>
                                        Close Project
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal 6-->
        <div class="portfolio-modal modal fade" id="portfolioModal6" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <!-- Project Details Go Here-->
                                    <h2 class="text-uppercase">Project Name</h2>
                                    <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                                    <img class="img-fluid d-block mx-auto" src="assets/img/portfolio/06-full.jpg" alt="" />
                                    <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                                    <ul class="list-inline">
                                        <li>Date: January 2020</li>
                                        <li>Client: Window</li>
                                        <li>Category: Photography</li>
                                    </ul>
                                    <button class="btn btn-primary" data-dismiss="modal" type="button">
                                        <i class="fas fa-times mr-1"></i>
                                        Close Project
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        {{-- Modal Solicitar cotización--}}
<div class="modal fade" id="modalCotizacion" tabindex="-1" role="dialog" aria-labelledby="modalCotizacionLabel" aria-hidden="true">

    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCotizacionLabel">Solicitar Cotización</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form-cotizacion" id="formcotizacion">
                @csrf
                <div class="modal-body">
                    <div class="alert alert-danger" style="display:none"></div>

                    <div class="form-group row">
                        <label for="direccion" class="col-lg-3 col-form-label requerido">Nombre o empresa</label>
                        <div class="col-lg-8">
                            <input type="text" name="nombre" id="nomnbre" class="form-control" />
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="botas" class="col-lg-3 col-form-label requerido">Correo</label>
                        <div class="col-lg-8">
                            <input type="email" name="correo" id="correo" class="form-control"/>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="overol" class="col-lg-3 col-form-label requerido">Celular-telf</label>
                        <div class="col-lg-8">
                            <input type="text" name="celular" id="celular" class="form-control"/>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="celular" class="col-lg-3 col-form-label requerido">Seleccione servicio</label>
                        <div class="col-lg-8">
                            <select name="tipo" id="tipo" class="selectpicker form-control" data-live-search="true">
                                <option value="Vivienda">Mantenimiento</option>
                                <option value="Multifamiliar">Instalación</option>
                                <option value="Oficina">Modernización</option>
                                <option value="Otros">Reparación</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="celular" class="col-lg-3 col-form-label requerido">Seleccione tipo</label>
                        <div class="col-lg-8">
                            <select name="tipo" id="tipo" class="selectpicker form-control" data-live-search="true">
                                <option value="Multifamiliar">Multifamiliar</option>
                                <option value="Vivienda">Vivienda</option>
                                <option value="Oficina">Oficina</option>
                                <option value="Otros">Otros</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="correo" class="col-lg-3 col-form-label requerido">N° paradas</label>
                        <div class="col-lg-8">
                            <input type="text" name="paradas" id="paradas" class="form-control" required/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="correo" class="col-lg-3 col-form-label requerido">N° pasajeros</label>
                        <div class="col-lg-8">
                            <input type="text" name="paradas" id="paradas" class="form-control" required/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="observacion" class="col-lg-3 col-form-label">Observación</label>
                        <div class="col-lg-8">
                            <textarea name="observacion" id="observacion" class="form-control" cols="30" rows="5" placeholder="Mensaje"></textarea>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" id="guardarinfo" class="btn btn-primary">Cotizar</button>
                </div>
            </form>
        </div>
    </div>
</div>




        {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script> --}}

        <!-- Bootstrap core JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
        <!-- Third party plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
        <!-- Contact form JS-->
        {{-- <script src="assets/mail/jqBootstrapValidation.js"></script> --}}
        <script src="{{asset("assets/sb/assets/mail/jqBootstrapValidation.js")}}"></script>
        {{-- <script src="assets/mail/contact_me.js"></script> --}}
        <script src="{{asset("assets/sb/assets/mail/contact_me.js")}}"></script>
        <!-- Core theme JS-->
        {{-- <script src="js/scripts.js"></script> --}}
        <script src="{{asset("assets/sb/js/scripts.js")}}"></script>

        <script src="{{asset("assets/sb/js/background.cycle.js")}}"></script>

        <script src="{{asset("assets/sb/js/slick.min.js")}}"></script>
        <script src="{{asset("assets/sb/js/jquery.magnific-popup.min.js")}}"></script>

    </body>
</html>
