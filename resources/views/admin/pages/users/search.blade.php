@extends('admin.partials.master')
@section('admin_content')
    <section id="dashboard-ecommerce">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h4 class="card-title">
                            <div class="d-flex justify-content-between">
                                <div>Get A User Using Referral Code</div>
                                <div><a href="{{route('admin.customer.index')}}" class="btn btn-primary btn-sm"> <i class="bx bx-plus"></i> Customer List </a> </div>
                            </div>
                        </h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            <form action="{{route('admin.search.submit')}}" method="get">
                                @csrf
                                <div class="form-group">
                                    <label for="search">Search a user (Phone, ReferID)</label>
                                    <input type="text" id="search" name="search" class="form-control is-valid" placeholder="Phone number OR Refer ID">
                                </div>
                                <div class="form-group text-center">
                                    <input type="submit" value="Go for Search" class="btn btn-success">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                @if(isset($user) && !empty($user))
                    <div class="card">
                        <div class="card-header pb-0">
                            <h4 class="card-title">
                                <div class="d-flex justify-content-between">
                                    <div>See Result</div>
                                </div>
                            </h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body card-dashboard">
                                <table class="table-bordered table">
                                    <tr>
                                        <td>User Name</td>
                                        <td>{{$user->name}}</td>
                                    </tr>
                                    <tr>
                                        <td>Username</td>
                                        <td>{{$user->username}}</td>
                                    </tr>
                                    <tr>
                                        <td>Referral Id</td>
                                        <td>{{$user->ref_id}}</td>
                                    </tr>
                                    <tr>
                                        <td>Referral By</td>
                                        <td>{{$user->ref_by ?? '--'}}</td>
                                    </tr>
                                    <tr>
                                        <td>User Email</td>
                                        <td>{{$user->email}}</td>
                                    </tr>

                                    <tr>
                                        <td>User Balance</td>
                                        <td>{{price($user->balance)}}</td>
                                    </tr>
                                    <tr>
                                        <td>User Status</td>
                                        <td>{{$user->status}}</td>
                                    </tr>
                                    <tr>
                                        <td>User Create Date & Time</td>
                                        <td>{{$user->created_at}}</td>
                                    </tr>




                                    <tr>
                                        <td>User balance add</td>
                                        <td>
                                            <form action="{{route('admin.customization.balance', 'plus')}}" method="">
                                                <input type="hidden" name="user_id" value="{{$user->id}}">
                                                {{price($user->balance)}} <input type="text" name="plus"><button type="submit">Submit</button>
                                            </form>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>User balance minus</td>
                                        <td>
                                            <form action="{{route('admin.customization.balance', 'minus')}}" method="">
                                                <input type="hidden" name="user_id" value="{{$user->id}}">
                                                {{price($user->balance)}} <input type="text" name="minus"><button type="submit">Submit</button>
                                            </form>
                                        </td>
                                    </tr>








                                    <tr>
                                        <td>User <span style="color: @if($user->status == 'active') green @else red @endif">@if($user->status == 'active') Active @else Inactive @endif</span> </td>
                                        <td>
                                            <a href="{{route('admin.customer.status', $user->id)}}"
                                               class="btn @if($user->status == 'active') btn-success @else btn-danger @endif"
                                               style="padding: 3px 7px;font-size: 20px"
                                               data-toggle="tooltip"
                                               title='@if($user->status == 'active') User status inactive after click @else User status active after click @endif'>
                                                <i class="bx @if($user->status == 'active') bx-up-arrow @else bx-down-arrow @endif"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Login Into User Panel</td>
                                        <td>
                                            <a href="{{route('admin.customer.login', $user->id)}}"
                                               target="_blank"
                                               class="btn btn-info"
                                               style="padding: 3px 7px;font-size: 20px"
                                               data-toggle="tooltip" title='Login Into User Account'>
                                                <i class="bx bx-user"></i></a>
                                        </td>
                                    </tr>


                                    <tr>
                                        <td>Change Password</td>
                                        <td>
                                            <a href="{{route('admin.customer.login', $user->id)}}"
                                               data-target="#myModal{{$user->id}}"

                                               data-toggle="modal">
                                                <i class="bx bx-lock"></i></a>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>



                    <form action="{{route('admin.customer.change-password')}}" method="POST">@csrf
                        <div class="modal fade" id="myModal{{$user->id}}">
                            <div class="modal-dialog">
                                <div class="modal-content">

                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title">Set New Password</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>

                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="password">Password </label>
                                            <input name="password" id="password" class="form-control is-valid" placeholder="Set User Password Again">
                                            <input type="hidden" name="id" value="{{$user->id}}">
                                        </div>
                                    </div>

                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                        <input type="submit" value="Submit" onclick="resetPassword('{{$user->id}}')" class="btn btn-primary">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </form>




                    <form action="{{route('admin.customer.bonus')}}" method="POST">@csrf
                        <div class="modal fade" id="bonusModal{{$user->id}}">
                            <div class="modal-dialog">
                                <div class="modal-content">

                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title">Gift a bonus</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>

                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="bonus">Enter bonus code </label>
                                            <input type="text" name="bonus" id="bonus" required class="form-control is-valid" placeholder="Bonus code">
                                            <input type="hidden" name="id" value="{{$user->id}}">
                                        </div>
                                    </div>

                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                        <input type="submit" value="Submit" onclick="submitBonus('{{$user->id}}')" class="btn btn-primary">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </form>
                @endif
            </div>
        </div>
    </section>



@endsection


