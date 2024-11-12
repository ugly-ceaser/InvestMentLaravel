@extends('layouts.base')

@section('title', 'Contact')



@section('content')


   

    <!-- Start Breadcrumb 
    ============================================= -->
    <div class="breadcrumb-area shadow dark bg-fixed text-center text-light" style="background-image: url(temp/front/assets/img/banner/23.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <h1>Contact Us</h1>
                    <ul class="breadcrumb">
                        <li><a href="#"><i class="fas fa-home"></i> Home</a></li>
                        
                        <li class="active">Contact</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb -->

    <!-- Start Contact Area
    ============================================= -->
    <div class="contact-area default-padding">
        <div class="container">
            <div class="row">
                <div class="contact-items bg-contain" style="background-image: url(temp/front/assets/img/map.svg);">
                    <div class="col-md-4 address">
                        <div class="address-items">
                            <ul class="info">
                                <li>
                                    <h4>Office Location</h4>
                                    <div class="icon"><i class="fas fa-map-marked-alt"></i></div> 
									 
                                    <span>{{$settings->office}}</span>
                                </li>
                                
                            </ul>
                        </div>
                    </div> 
                    <div class="col-md-4 address">
                        <div class="address-items">
                            <ul class="info">
                                <li>
                                    <h4>Phone</h4>
                                    <div class="icon"><i class="fas fa-phone"></i></div> 
                                    <span> +1(530) 712 4028</span>
                                </li>
                                
                            </ul>
                        </div>
                    </div> 
                    <div class="col-md-4 address">
                        <div class="address-items">
                            <ul class="info">
                                <li>
                                    <h4>Email</h4>
                                    <div class="icon"><i class="fas fa-envelope-open"></i> </div>
                                    <span>{{$settings->contact_email}}<br>{{$settings->contact_email}}</span>
                                </li>
                                
                            </ul>
                        </div>
                    </div> 
					 
               </div>
            </div>
        </div>
    </div>


   
   
   
   


@endsection