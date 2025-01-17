@extends('layouts.dashly1')
@section('title', $title)
@section('content')
    <!-- Page title -->
    <div class="page-title">
        <div class="row justify-content-between align-items-center">
            <div class="mb-3 col-md-6 mb-md-0">
            <h1 class="h2 m-0">
        Account transactions history
    </h1>
    <p class="m-0">All your transaction history in one place.</p>
    <br>
            </div>
        </div>
    </div>
    <x-danger-alert />
    <x-success-alert />
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <ul class="mb-3 nav nav-pills nav-pills-icon nav-justified" id="pills-tab" role="tablist">
                        <li class="p-2 nav-item col-6 col-lg-3" role="presentation ">
                            <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home"
                                role="tab" aria-controls="pills-home" aria-selected="true">
                                <span class="d-block">
                                    <i class="bi bi-wallet-fill fs-3"></i>
                                </span>
                                <span class="mt-2 d-none d-sm-block">Deposit</span>
                            </a>
                        </li>
                        <li class="p-2 nav-item col-6 col-lg-3" role="presentation">
                            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile"
                                role="tab" aria-controls="pills-profile" aria-selected="false">
                                <span class="d-block">
                                   <i class="bi bi-graph-down fs-3"></i>
                                </span>
                                <span class="mt-2 d-none d-sm-block">Withdrawal</span>
                            </a>
                        </li>
                        <li class="p-2 nav-item col-6 col-lg-3" role="presentation">
                            <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact"
                                role="tab" aria-controls="pills-contact" aria-selected="false">
                                <span class="d-block">
                                    <i class="bi bi-hourglass fs-3"></i>
                                </span>
                                <span class="mt-2 d-none d-sm-block">Others</span>
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                            aria-labelledby="pills-home-tab">
                            <div class="table-responsive">
                                <table id="DeposTbl" class="table table-hover ">
                                    <thead>
                                        <tr>
                                            <th>Amount</th>
                                            <th>Payment mode</th>
                                            <th>Status</th>
                                            <th>Date created</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($deposits as $deposit)
                                            <tr>
                                                <td>{{ $settings->currency }}{{ $deposit->amount }}</td>
                                                <td>{{ $deposit->payment_mode }}</td>
                                                <td>
                                                    @if ($deposit->status == 'Processed')
                                                        <span class="badge badge-success bg-success">{{ $deposit->status }}</span>
                                                    @elseif($deposit->status == 'Pending')
                                                        <span class="badge badge-danger bg-warning">{{ $deposit->status }}</span>
                                                    @endif
                                                </td>
                                                <td>{{ \Carbon\Carbon::parse($deposit->created_at)->toDayDateTimeString() }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>
                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                            <div class="table-responsive">
                                <table id="WithdrawTbl" class="table table-hover ">
                                    <thead>
                                        <tr>
                                            <th>Amount requested</th>
                                            <th>Amount + charges</th>
                                            <th>Recieving mode</th>
                                            <th>Status</th>
                                            <th>Date created</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($withdrawals as $withdrawal)
                                            <tr>
                                                <td>{{ $settings->currency }}{{ $withdrawal->amount }}</td>
                                                <td>{{ $settings->currency }}{{ $withdrawal->to_deduct }}</td>
                                                <td>{{ $withdrawal->payment_mode }}</td>
                                                <td>
                                                    @if ($withdrawal->status == 'Processed')
                                                        <span class="badge badge-success bg-success">{{ $withdrawal->status }}</span>
                                                    @else
                                                        <span class="badge badge-danger bg-warning">{{ $withdrawal->status }}</span>
                                                    @endif
                                                </td>
                                                <td>{{ \Carbon\Carbon::parse($withdrawal->created_at)->toDayDateTimeString() }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>
                        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                            <div class="table-responsive">
                                <table id="OthersTable" class="table table-hover ">
                                    <thead>
                                        <tr>
                                            <th>Amount</th>
                                            <th>Type</th>
                                            <th>Plan/Narration</th>
                                            <th>Date created</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($t_history as $history)
                                            <tr>
                                                <td>{{ $settings->currency }}{{ $history->amount }}</td>
                                                <td>{{ $history->type }}</td>
                                                <td>{{ $history->plan }}</td>
                                                <td>{{ \Carbon\Carbon::parse($history->created_at)->toDayDateTimeString() }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
