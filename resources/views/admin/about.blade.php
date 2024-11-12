@extends('layouts.app')
@section('content')
    @include('admin.topmenu')
    @include('admin.sidebar')
    <div class="main-panel ">
        <div class="content">
            <div class="page-inner">
                <div class="mt-2 mb-4">

                </div>
                <x-danger-alert />
                <x-success-alert />

                <div class="mb-5 row">
                    <div class="col-12 text-center p-4 card shadow ">
                        <h1 class="title1">About RemedyPro invesment Script</h1>
                        <p class="title1">Remedy Technology</p>
                        {{-- <div>
								<button type="button" class="text-white btn btn-primary btn-sm disabled" disabled>
								CONTACT US TODAT!!!!
                                </button>
                               
							</div> --}}
                        <div class="mt-4">
                            <a href="https://t.me/+VRumJJSKKGdjM2I0" target="_blank" class="btn btn-primary"> For Help/ More scripts</a>
                        </div>
                        
                        <div class="mt-4">
                            <h2>EMAIL US</h2>
                            <a  class="btn btn-light"> Support@remedycodes.online</a>
                        </div>
                        
                         <div class="mt-4">
                             <h2> Whatsapp Us</h2>
                            <a  class="btn btn-light"> +16019085643</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
