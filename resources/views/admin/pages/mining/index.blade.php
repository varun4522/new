@extends('admin.partials.master')
@section('admin_content')
    <section id="dashboard-ecommerce">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h4 class="card-title">
                            <div class="d-flex justify-content-between">
                                <div>Mining Lists</div>
                            </div>
                        </h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            <div class="table-responsive">
                                <table class="table table-striped dataex-html5-selectors">
                                    <thead>
                                    <tr>
                                        <th>S.N</th>
                                        <th>User Info</th>
                                        <th>Mining Basic Info</th>
                                        <th>Mining Amount Info</th>
                                        <th>Mining Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($lists as $key => $row)
                                        <tr>
                                            <td>{{$key + 1}}</td>
                                            <td>
                                                <small>
                                                    Name: {{$row->user->name ?? '--'}} <br>
                                                    Username: {{$row->user->username ?? '--'}} <br>
                                                    Ref id: {{$row->user->ref_id ?? '--'}} <br>
                                                </small>
                                            </td>
                                            <td>
                                                <small>
                                                    Mining Start Time: {{$row->running_start_date}} <br>
                                                    Mining End Time: {{$row->running_end_date}} <br>
                                                    Total Hours: {{$row->total_time}} <br>
                                                    Mining Code: {{$row->package->code}} <br>
                                                </small>
                                            </td>
                                            <td>
                                                <small>
                                                    Mining Profit Amount: {{price($row->package->package_commission)}} <br>
                                                    Average Amount: {{price($row->package->commission_with_avg_amount)}} <br>
                                                    Purchase Amount: {{price($row->package->price)}} <br>
                                                    Time Position: {{$row->continue_date_time}} <br>
                                                </small>
                                            </td>

                                            <td>
                                                <small>
                                                    Status: <span
                                                        class="badge @if($row->running_status == 'start') badge-success @elseif($row->running_status == 'end') badge-danger  @elseif($row->running_status == 'stop') badge-info @endif"
                                                        style="font-size: 8px">{{$row->running_status}}</span> <br>

                                                    Running Status: @if($row->running_status == 'start')
                                                        <img style="width: 50px; height: 50px; border-radius: 50%" src="{{asset('public/app/img/running.gif')}}">
                                                    @else
                                                        <img style="width: 50px; height: 50px; border-radius: 50%" src="{{asset('public/app/img/stop.png')}}">
                                                    @endif
                                                </small>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                                {{$lists->links("pagination::bootstrap-4")}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


