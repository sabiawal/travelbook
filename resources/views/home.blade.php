@extends('layouts.app')

<!-- Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
<!-- Google fonts-->
<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
<link href="https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
<link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />

<link href="{{ asset('css/styles.css') }}" rel="stylesheet" />

@section('content')
<div class="container">
    <!-- Portfolio Grid-->
    
    <section class="page-section " id="portfolio">
        <div class="container">

            <div class="row">
                @foreach($destination as $row)
                <div class="col-lg-4 col-sm-6 mb-4">
                    <div class="portfolio-item">
                        <a class="portfolio-link" data-toggle="modal" href="#hello_worldModel{{$row['DestinationName']}}">
                            <div class="portfolio-hover">
                                <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="{{asset($row['Image'])}}" height="800" width="1200" alt="">
                        </a>
                        <div class="portfolio-caption">
                            <div class="portfolio-caption-heading">{{$row['DestinationName']}}</div>
                            <div class="portfolio-caption-subheading text-muted">Price:{{$row['Price']}}</div>
                            <div class="portfolio-caption-subheading text-muted">{{$row['Category']}}</div>
                        </div>
                    </div>
                </div>
                <!-- Modal 1-->
<div class="portfolio-modal modal fade" id="hello_worldModel{{$row['DestinationName']}}" tabindex="-1" role="dialog" aria-hidden="true">
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
                                <li>Date: January 2020</li>
                                <li>Client: Everest</li>
                                <li>Category: Mountaineering</li>
                            </ul>
                                        <h2>
                                            <a href="{{ url('/book') }}">
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
    
</div>


@endsection
