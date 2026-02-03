@extends('admin.partials.master')
@section('admin_content')
    <section id="dashboard-ecommerce">
        <div class="row">
            <div class="col-xl-4 col-12 dashboard-users">
                <div class="row  ">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-sm-6 col-12 dashboard-users-success">
                                <div class="card text-center">
                                    <div class="card-content">
                                        <div class="card-body py-1">
                                            <div
                                                class="badge-circle badge-circle-lg badge-circle-light-success mx-auto mb-50">
                                                <i class="bx bx-briefcase-alt font-medium-5"></i>
                                            </div>
                                            <div class="text-muted line-ellipsis">Total Purchase</div>
                                            <h3 class="mb-0">{{\App\Models\Purchase::get()->count()}}</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-12 dashboard-users-danger">
                                <div class="card text-center">
                                    <div class="card-content">
                                        <div class="card-body py-1">
                                            <div
                                                class="badge-circle badge-circle-lg badge-circle-light-danger mx-auto mb-50">
                                                <i class="bx bx-user font-medium-5"></i>
                                            </div>
                                            <div class="text-muted line-ellipsis">Users</div>
                                            <h3 class="mb-0">{{\App\Models\User::get()->count()}}</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6 col-12 dashboard-users-danger">
                                <div class="card text-center">
                                    <div class="card-content">
                                        <div class="card-body py-1">
                                            <div class="badge-circle badge-circle-lg badge-circle-light-danger mx-auto mb-50">
                                                <i class="bx bx-shopping-bag font-medium-5"></i>
                                            </div>
                                            <div class="text-muted line-ellipsis">Active Bonus</div>
                                            <?php
                                                $b = \App\Models\Bonus::where('status', 'active')->first();
                                            ?>
                                            <h3 class="mb-0" style="font-size: 13px !important;">{{$b ? $b->bonus_name : 'Bonus not Available'}}</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6 col-12 dashboard-visit">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="card-title">Visits of {{date('Y-M')}}</h4>
                        <i class="bx bx-dots-vertical-rounded font-medium-3 cursor-pointer"></i>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <div id="multi-radial-chart"></div>
                            <ul class="list-inline d-flex justify-content-around mb-0">
                                <li><span class="bullet bullet-xs bullet-primary mr-50"></span>Target</li>
                                <li><span class="bullet bullet-xs bullet-danger mr-50"></span>Mart</li>
                                <li><span class="bullet bullet-xs bullet-warning mr-50"></span>Ebay</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6 col-12 dashboard-greetings">
                <div class="card">
                    <div class="card-header">
                        <h3 class="greeting-text">Congratulations {{admin()->user()->name ?? 'Admin'}}!</h3>
                        <p class="mb-0">Best seller of the month</p>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-end">
                                <div class="dashboard-content-left">
                                    <h1 class="text-primary font-large-2 text-bold-500">$89k</h1>
                                    <p>You have done 57.6% more sales today.</p>
                                    <button type="button" class="btn btn-primary glow">View Sales</button>
                                </div>
                                <div class="dashboard-content-right">
                                    <img src="{{asset(admin_file_root())}}/app-assets/images/icon/cup.png"
                                         height="220" width="220" class="img-fluid" alt="Dashboard Ecommerce"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-3 col-6 dashboard-users-danger">
                <div class="card text-center">
                    <div class="card-content">
                        <div class="card-body py-1">
                            <div class="badge-circle badge-circle-lg badge-circle-light-danger mx-auto mb-50">
                                <i class="bx bx-notepad font-medium-5"></i>
                            </div>
                            <div class="text-muted line-ellipsis">Pending Withdraw</div>
                            <h3 class="mb-0">{{\App\Models\Withdrawal::where('status', 'pending')->get()->count()}}</h3>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-3 col-6 dashboard-users-danger">
                <div class="card text-center">
                    <div class="card-content">
                        <div class="card-body py-1">
                            <div class="badge-circle badge-circle-lg badge-circle-light-danger mx-auto mb-50">
                                <i class="bx bx-notepad font-medium-5"></i>
                            </div>
                            <div class="text-muted line-ellipsis">Approved Withdraw</div>
                            <h3 class="mb-0">{{\App\Models\Withdrawal::where('status', 'approved')->get()->count()}}</h3>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-3 col-6 dashboard-users-danger">
                <div class="card text-center">
                    <div class="card-content">
                        <div class="card-body py-1">
                            <div class="badge-circle badge-circle-lg badge-circle-light-danger mx-auto mb-50">
                                <i class="bx bx-notepad font-medium-5"></i>
                            </div>
                            <div class="text-muted line-ellipsis">Pending Deposit</div>
                            <h3 class="mb-0">{{\App\Models\Deposit::where('status', 'pending')->get()->count()}}</h3>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-3 col-6 dashboard-users-danger">
                <div class="card text-center">
                    <div class="card-content">
                        <div class="card-body py-1">
                            <div class="badge-circle badge-circle-lg badge-circle-light-danger mx-auto mb-50">
                                <i class="bx bx-notepad font-medium-5"></i>
                            </div>
                            <div class="text-muted line-ellipsis">Approved Deposit</div>
                            <h3 class="mb-0">{{\App\Models\Deposit::where('status', 'approved')->get()->count()}}</h3>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
