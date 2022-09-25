<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Travels</title>

        <script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" crossorigin="anonymous"></script>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />

        <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />

        <!-- Styles -->


        <style>
            body {
                font-family: 'Nunito';
            }
        </style>
    </head>

    <body >
    <header>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand js-scroll-trigger" href="{{url('/')}}"><H2>Travels</H2></a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars ml-1"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">

                @if (Route::has('login'))
                    <div >

                        @auth
                            <ul class="navbar-nav text-uppercase ml-auto">
                                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="{{ route('home') }}">Home</a></li>
                            </ul>
                        @else
                            <ul class="navbar-nav text-uppercase ml-auto">
                                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="{{ route('login') }}">Login</a></li>
                                @if (Route::has('register'))
                                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="{{ route('register') }}">Register</a></li>
                            </ul>
                        @endif
                        @endauth
                    </div>
                @endif
            </div>
            </div>
        </nav>
    </header>


    <!-- Masthead-->
    <header class="masthead">
        <div class="container">
            <div class="masthead-subheading">Welcome To Our Site!</div>
            <div class="masthead-heading text-uppercase">You're never unhappy when you Travel.</div>
            <div class=" masthead-subheading text-uppercase " > Work. Travel. Repeat.</div>
        </div>
    </header>

    <!-- Portfolio Grid-->

    <section class="page-section " id="portfolio">
        <div class="container">

            <div class="row">
                @foreach($destination as $row)
                <div class="col-lg-4 col-sm-6 mb-4">
                    <div class="portfolio-item">

                        <a class="portfolio-link" data-toggle="modal" >
                            <div class="portfolio-hover">
                                <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="{{asset($row['Image'])}}" height="800" width="1200" alt="">
                        </a>
                        <div class="portfolio-caption">
                            <div class="portfolio-caption-heading">{{$row['DestinationName']}}</div>
                            <div class="portfolio-caption-subheading text-muted">Price:{{$row['Price']}}</div>
                            <div class="portfolio-caption-subheading text-muted">{{$row['Category']}}</div>
                            <button type="button"  class="btn btn-info btn-sm" data-toggle="modal" data-target="#{{'portfolio'.$row['id']}}">View</button>
                        </div>
                    </div>
                </div>


                <div class="portfolio-modal modal fade" id="{{'portfolio'.$row['id']}}" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="close-modal" data-dismiss="modal"><img src="{{ asset('assets/img/close-icon.svg') }}" alt="Close modal" /></div>
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-lg-8">
                                        <div class="modal-body">

                                            <!-- Project Details Go Here-->
                                            <h2 class="text-uppercase">{{$row['DestinationName']}}</h2>

                                            <img class="img-fluid d-block mx-auto" src="{{asset($row['Image'])}}" alt="" />
                                            <p>{{$row['Description']}}</p>
                                            <ul class="list-inline">

                                                <li>Desttination : {{$row['DestinationName']}}</li>
                                                <li>Category: {{$row['Category']}}</li>
                                            </ul>


                                                        <h2><a @if (Route::has('login'))
                                                               @auth
                                                               href="{{ url('/book') }}"
                                                               @else href="{{ url('/login')}}"
                                                               @endif
                                                               @endauth class="text-sm text-gray-700 ">

                                                                Book Now!
                                                            </a>
                                                        </h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Team-->
    <section class="page-section bg-transparent" id="team">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Our Amazing Team</h2>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="team-member">
                        <img class="mx-auto rounded-circle" src="assets/img/team/Sabi.jpg" alt="" />
                        <h4>Sabi Awal</h4>
                        <p class="text-muted">Lead Designer</p>
                        <a class="btn btn-dark btn-social mx-2" href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="https://www.facebook.com/"><i class="fab fa-facebook-f"></i></a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="team-member">
                        <img class="mx-auto rounded-circle" src="assets/img/team/Sabi.jpg" alt="" />
                        <h4>Sabi Awal</h4>
                        <p class="text-muted">Lead Designer</p>
                        <a class="btn btn-dark btn-social mx-2" href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="https://www.facebook.com/"><i class="fab fa-facebook-f"></i></a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="team-member">
                        <img class="mx-auto rounded-circle" src="assets/img/team/Sabi.jpg" alt="" />
                        <h4>Sabi Awal</h4>
                        <p class="text-muted">Lead Designer</p>
                        <a class="btn btn-dark btn-social mx-2" href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="https://www.facebook.com/"><i class="fab fa-facebook-f"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact-->
    <section class="page-section" id="contact">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Contact Us</h2>

            </div>
            <form id="contactForm" method="post" action="{{url('message')}}">
                {{csrf_field()}}
                <div class="row align-items-stretch mb-5">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input class="form-control" name="Name" id="Name" type="text" placeholder="Your Name *" required="required" data-validation-required-message="Please enter your name." />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="form-group">
                            <input class="form-control" name="Email" id="Email" type="email" placeholder="Your Email *" required="required" data-validation-required-message="Please enter your email address." />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="form-group mb-md-0">
                            <input class="form-control" name="Contact" id="Contact" type="tel" placeholder="Your Phone *" required="required" data-validation-required-message="Please enter your phone number." />
                            <p class="help-block text-danger"></p>
                       </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group form-group-textarea mb-md-0">
                            <textarea class="form-control" name="Message" id="Message"type="text" placeholder="Your Message *" required="required" data-validation-required-message="Please enter a message."></textarea>
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <div id="success">
                    <button class="btn btn-primary btn-xl text-uppercase" type="submit">Send Message</button></div>
                </div>
            </form>
        </div>
    </section>
    <!-- Footer-->
    <footer class="footer py-4">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 text-lg-left">Copyright © Travels 2022</div>
                <div class="col-lg-4 my-3 my-lg-0">
                    <a class="btn btn-dark btn-social mx-2" href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="https://www.facebook.com/"><i class="fab fa-facebook-f"></i></a>
                </div>
                <div class="col-lg-4 text-lg-right">
                    <a class="mr-3" href="#!">Privacy Policy</a>
                    <a href="#!">Terms of Use</a>
                </div>
            </div>
        </div>
    </footer>
    <!-- Portfolio Modals-->
    <!-- Modal 1-->


    <!-- Bootstrap core JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Third party plugin JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <!-- Contact form JS-->
    <script src="{{ asset('assets/mail/jqBootstrapValidation.js') }}"></script>
    <script src="{{ asset('assets/mail/contact_me.js') }}"></script>
    <!-- Core theme JS-->
    <script src="{{ asset('js/scripts.js') }}"></script>

    </body>
</html>
