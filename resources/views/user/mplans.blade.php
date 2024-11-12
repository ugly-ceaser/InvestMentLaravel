@extends('layouts.dashly1')
@section('title', $title)
@section('content')
    <!-- Title -->
    <div class="mb-5">
        <h1 class="h2 m-0">
            Withdraw from your account.
        </h1>
        <p class="m-0">Place a withdrawal request using any of the payment method below.</p>
    </div>
    <x-danger-alert />
    <x-success-alert />
    <div class="row mb-6">
        @forelse ($plans as $plan)
            <div class="col-xl-4">
                <!-- Card -->
                <div class="card border-0 py-6 px-4 mb-6 mb-xl-3">
                    <div class="card-body">
                        <h2 class="card-title h3 text-uppercase text-primary text-center mb-3">{{$plan->increment_amount}} % ROI</h2>
                        <h3 class="card-text display-3  text-primary text-center">
                            {{$plan->name}} <span
                                class="fs-3 fw-normal text-success">{{$plan->tag}}</span>
                        </h3>

                        <!-- Divider -->
                        <hr>

                        <ul class="list-unstyled mb-7">
                            <li class="mb-3">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" height="12" width="12"
                                    class="me-2 text-primary">
                                    <path
                                        d="M23.37.29a1.49,1.49,0,0,0-2.09.34L7.25,20.2,2.56,15.51A1.5,1.5,0,0,0,.44,17.63l5.93,5.94a1.53,1.53,0,0,0,2.28-.19l15.07-21A1.49,1.49,0,0,0,23.37.29Z"
                                        style="fill: currentColor" />
                                </svg>
                                Minimum amount: {{$settings->currency}}{{number_format($plan->min_price)}}
                            </li>

                            <li class="mb-3">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" height="12" width="12"
                                    class="me-2 text-primary">
                                    <path
                                        d="M23.37.29a1.49,1.49,0,0,0-2.09.34L7.25,20.2,2.56,15.51A1.5,1.5,0,0,0,.44,17.63l5.93,5.94a1.53,1.53,0,0,0,2.28-.19l15.07-21A1.49,1.49,0,0,0,23.37.29Z"
                                        style="fill: currentColor" />
                                </svg>
                                Maximum amount: {{$settings->currency}}{{number_format($plan->max_price)}}
                            </li>
                            <li class="mb-3">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" height="12" width="12"
                                    class="me-2 text-primary">
                                    <path
                                        d="M23.37.29a1.49,1.49,0,0,0-2.09.34L7.25,20.2,2.56,15.51A1.5,1.5,0,0,0,.44,17.63l5.93,5.94a1.53,1.53,0,0,0,2.28-.19l15.07-21A1.49,1.49,0,0,0,23.37.29Z"
                                        style="fill: currentColor" />
                                </svg>
                                {{$plan->increment_amount	}}% {{$plan->increment_interval}} for {{$plan->expiration}}
                            </li>
                            <li class="mb-3">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" height="12" width="12"
                                    class="me-2 text-primary">
                                    <path
                                        d="M23.37.29a1.49,1.49,0,0,0-2.09.34L7.25,20.2,2.56,15.51A1.5,1.5,0,0,0,.44,17.63l5.93,5.94a1.53,1.53,0,0,0,2.28-.19l15.07-21A1.49,1.49,0,0,0,23.37.29Z"
                                        style="fill: currentColor" />
                                </svg>
                                Charges Amount:
                                
                            </li>
                            <li class="mb-3">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" height="12" width="12"
                                    class="me-2 text-primary">
                                    <path
                                        d="M23.37.29a1.49,1.49,0,0,0-2.09.34L7.25,20.2,2.56,15.51A1.5,1.5,0,0,0,.44,17.63l5.93,5.94a1.53,1.53,0,0,0,2.28-.19l15.07-21A1.49,1.49,0,0,0,23.37.29Z"
                                        style="fill: currentColor" />
                                </svg>
                                Duration: {{$plan->expiration}}
                            </li>
                        </ul>
                        <div class="">
                            <form method="post" action="{{route('joinplan')}}">
                                
                                <input type="number" min="{{$plan->min_price}}" max="{{$plan->max_price}}" name="iamount" placeholder="             {{$settings->currency}} {{$plan->min_price}} - {{$settings->currency}} {{$plan->max_price}} " class="form-control h3 "> <br>
                                <input type="hidden" name="duration" value="{{$plan->expiration}}">
                                <input type="hidden" name="id" value="{{ $plan->id }}">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="submit" class="btn btn-block pricing-action btn-primary" value="Join plan" >
                            </form>
                            
                            
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center">
                <h3>No Plans.</h3>
            </div>
        @endforelse

        <div id="withdrawdisabled" class="modal fade" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="exampleModalCenterTitle">No Plans</h3>
                    </div>
                    <div class="modal-footer m-0">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
