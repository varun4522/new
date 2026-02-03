@extends('admin.partials.master')
@section('admin_content')
    <section id="dashboard-ecommerce">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h4 class="card-title">
                            <div class="d-flex justify-content-between">
                                <div>{{$title}} Payment Lists</div>
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
                                        <th>Phone&RefId</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                        <th>Active</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach(\App\Models\Usdt::orderByDesc('id')->get() as $key => $row)
                                        <tr>
                                            <td>{{$key + 1}}</td>
                                            <td>
                                                {{$row->user->phone.'('.$row->user->ref_id.')' ?? '--'}}
                                            </td>
                                            <td>
                                                Addable BDT: {{$row->amount}} <br>
                                                USDT: {{$row->amount / setting('rate')}}
                                            </td>
                                            <td>
                                                <span class="badge @if($row->status == 'pending') badge-warning @elseif($row->status == 'approved') badge-success  @elseif($row->status == 'rejected') badge-danger @endif" style="font-size: 8px">{{$row->status}}</span>
                                            </td>
                                            <td>
                                                <a href="{{route('admin.usdt.status', [$row->id, 'approved'])}}" class="btn btn-success">Approved</a>
                                                <a href="{{route('admin.usdt.status', [$row->id, 'rejected'])}}" class="btn btn-danger">Rejected</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


