@extends('layouts.app')

@section('content')
    @include('admin.topmenu')
    @include('admin.sidebar')
    <div class="main-panel">
        <div class="content ">
            <div class="page-inner">
                <div class="mt-2 mb-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h1 class="title1">Add Investment Plan</h1>
                        </div>
                        <div>
                            <a href="{{ route('plans') }}" class="btn btn-sm btn-primary">
                                <i class="fa fa-arrow-left"></i> Back
                            </a>
                        </div>
                    </div>
                </div>

                <x-danger-alert />
                <x-success-alert />

                <div class="mb-5 row">
                    <div class="col-lg-12">
                        <div class="p-3 card">
                            <form role="form" method="post" action="{{ route('addplan') }}">
                                @csrf <!-- Include CSRF Token for security -->
                                
                                <div class="form-row">
                                    <!-- Plan Name -->
                                    <div class="form-group col-md-6">
                                        <h5>Plan Name</h5>
                                        <input class="form-control" placeholder="Enter Plan name" type="text"
                                            name="name" required>
                                    </div>

                                    <!-- Plan Price -->
                                    <div class="form-group col-md-6">
                                        <h5>Plan Price ({{ $settings->currency }})</h5>
                                        <input class="form-control" placeholder="Enter Plan price" type="number"
                                            name="price" required>
                                        <small>This is the maximum amount a user can pay to invest in this plan. Enter the value without commas.</small>
                                    </div>

                                    <!-- Plan Minimum Price -->
                                    <div class="form-group col-md-6">
                                        <h5>Plan Minimum Price ({{ $settings->currency }})</h5>
                                        <input class="form-control" placeholder="Enter Plan minimum price" type="number"
                                            name="min_price" required>
                                        <small>This is the minimum amount a user can pay to invest in this plan. Enter the value without commas.</small>
                                    </div>

                                    <!-- Plan Maximum Price -->
                                    <div class="form-group col-md-6">
                                        <h5>Plan Maximum Price ({{ $settings->currency }})</h5>
                                        <input class="form-control" placeholder="Enter Plan maximum price" type="number"
                                            name="max_price" required>
                                        <small>Same as plan price, enter the value without commas.</small>
                                    </div>

                                    <!-- Minimum Return -->
                                    <div class="form-group col-md-6">
                                        <h5>Minimum Return (%)</h5>
                                        <input class="form-control" placeholder="Enter minimum return" type="number"
                                            step="any" name="minr" required>
                                        <small>This is the minimum return (ROI) for this plan, enter the value without commas.</small>
                                    </div>

                                    <!-- Maximum Return -->
                                    <div class="form-group col-md-6">
                                        <h5>Maximum Return (%)</h5>
                                        <input class="form-control" placeholder="Enter maximum return" type="number"
                                            step="any" name="maxr" required>
                                        <small>This is the Maximum return (ROI) for this plan, enter the value without commas.</small>
                                    </div>

                                    <!-- Gift Bonus -->
                                    <div class="form-group col-md-6">
                                        <h5>Gift Bonus ({{ $settings->currency }})</h5>
                                        <input class="form-control" placeholder="Enter Additional Gift Bonus" type="number"
                                            step="any" name="gift" value="0" required>
                                        <small>Optional Bonus if a user buys this plan. Enter the value without commas.</small>
                                    </div>

                                    <!-- Plan Tag -->
                                    <div class="form-group col-md-6">
                                        <h5>Plan Tag</h5>
                                        <input class="form-control" placeholder="Enter Plan Tag" type="text"
                                            step="any" name="tag" value="{{ $plan->tag ?? '' }}">
                                        <small>Optional Plan tag (e.g., 'Popular', 'VIP', etc.).</small>
                                    </div>

                                    <!-- Top up Interval -->
                                    <div class="form-group col-md-6">
                                        <h5>Top up Interval</h5>
                                        <select class="form-control" name="t_interval">
                                            <option>Monthly</option>
                                            <option>Weekly</option>
                                            <option>Daily</option>
                                            <option>Hourly</option>
                                            <option>Every 30 Minutes</option>
                                            <option>Every 10 Minutes</option>
                                        </select>
                                        <small>This specifies how often the system should add profit (ROI) to the user account.</small>
                                    </div>

                                    <!-- Top up Type -->
                                    <div class="form-group col-md-6">
                                        <h5>Top up Type</h5>
                                        <select class="form-control" name="t_type">
                                            <option>Percentage</option>
                                            <option>Fixed</option>
                                        </select>
                                        <small>This specifies if the system should add profit in percentage (%) or a fixed amount.</small>
                                    </div>

                                    <!-- Top up Amount -->
                                    <div class="form-group col-md-6">
                                        <h5>Top up Amount (in % or {{ $settings->currency }})</h5>
                                        <input class="form-control" placeholder="Top up amount" type="number"
                                            step="any" name="t_amount" required>
                                        <small>This is the amount the system will add to users' accounts as profit, based on the topup type and interval.</small>
                                    </div>

                                    <!-- Investment Duration -->
                                    <div class="form-group col-md-6">
                                        <h5>Investment Duration</h5>
                                        <input class="form-control" placeholder="e.g., 1 Days, 2 Weeks, 1 Months"
                                            type="text" name="expiration" required>
                                        <small>This specifies how long the investment plan will run. Follow the guide on how to set up the investment duration.</small>
                                    </div>

                                    <!-- Submit Button -->
                                    <div class="form-group col-md-12">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-primary" value="Add Plan">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Duration Modal -->
        <div id="durationModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <h5>FIRSTLY, always precede the time frame with a digit. <br> SECONDLY, always add space after the number. <br> LASTLY, the first letter of the timeframe should be in CAPS, and always add 's' to the timeframe even if it's just a day, month, or year.</h5>
                        <h2>Examples: 1 Days, 3 Weeks, 1 Hours, 48 Hours, 4 Months, 1 Years, 9 Months</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
