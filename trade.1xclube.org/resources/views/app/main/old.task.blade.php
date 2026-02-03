<!doctype html>
<html lang="en">
<head>
    <meta data-n-head="ssr" charset="utf-8">
    <meta data-n-head="ssr" name="viewport" content="width=device-width, initial-scale=1">
    <meta data-n-head="ssr" data-hid="description" name="description" content="{{env('APP_NAME')}} APP">
    <link rel="stylesheet" href="{{asset('public/taask.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <title>{{env('APP_NAME')}}</title>
    <style>
        .tasks-page-content-item .description {
            font-size: 14px;
        }

        .modalBtn {
            margin: 6px 0;
            background: #35C75A;
            color: #fff;
            padding: 0px 34px;
            border-radius: 7px;
        }
    </style>
</head>
<body>
<?php
$signBalance = setting('daily_sign_amount');
?>
@include('alert-message')
<div id="__nuxt">
    <div id="__layout">
        <div>
            <section class="tasks-page flex flex-col">
                <div data-v-3d11c917="" class="header-wrapper fixed w-full">
                    <header data-v-3d11c917="" class="header w-full relative flex items-center primary">
                        <div data-v-3d11c917="" class="left absolute"
                             onclick="window.location.href='{{route('dashboard')}}'">
                            <svg data-v-3d11c917="" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                 viewBox="0 0 24 24" fill="none">
                                <path data-v-3d11c917=""
                                      d="M12.4888 15.9872C12.4888 15.9865 12.4903 15.9858 12.4903 15.9851C12.4846 15.9851 12.4839 15.9858 12.4888 15.9872ZM0.941297 13.007L8.30281 20.3685C8.93608 21.0018 9.96354 21.0018 10.5961 20.3685C11.2294 19.7367 11.2294 18.7092 10.5961 18.076L6.00247 13.4816H21.588C22.4836 13.4816 23.2092 12.7553 23.2092 11.8604C23.2092 10.9641 22.4828 10.2384 21.588 10.2384H6.00318L10.5968 5.64481C11.2301 5.01225 11.2301 3.98408 10.5968 3.35152C10.2802 3.03489 9.86482 2.87622 9.44946 2.87622C9.03481 2.87622 8.61945 3.03489 8.30352 3.35152L0.941297 10.7137C0.307328 11.347 0.307328 12.3731 0.941297 13.007Z"
                                      fill="currentColor"></path>
                            </svg>
                        </div>
                        <div data-v-3d11c917="" class="title bold flex-1">Task System</div>
                    </header>
                </div>
                <div class="tasks-page-content flex-1">
                    <div class="tasks-page-content-item sign">
                        <div class="flex items-center justify-between">
                            <div>
                                <div class="tasks-page-content-item-title flex items-center">
                                    <div class="title">Daily Attendance</div>
                                </div>
                                <div class="description">Sign in every day and get {{price($signBalance)}}</div>
                            </div>
                            <div class="flex items-center justify-between">
                                <div class="btns">
                                    <a style="background: ##35C75A;"
                                       class="waves-effect waves-light btn modal-trigger"
                                       href="#modal1">Receive</a>
                                </div>
                            </div>
                        </div>

                        <div id="modal1" class="modal">
                            <div class="modal-content">
                                <h4 style="color: #35C75A;text-align: center;padding: 40px 0;">Daily Attendance</h4>
                                <p style="font-size: 15px;text-align: center;">Sign in every day and
                                    get {{price($signBalance)}}</p>
                            </div>
                            <div class="modal-footer">
                                <a href="javascript:void(0)"
                                   class="modal-close waves-effect waves-green btn-flat modalBtn"
                                   style="background: #0000a045;color: #35C75A;">Cancel</a>
                                <a href="{{route('received.signed.balance')}}"
                                   class="modal-close waves-effect waves-green btn-flat modalBtn">Confirm</a>
                            </div>
                        </div>


                        <div class="progress-content">
                            <div data-v-5ac35242="" class="progress relative">
                                <div data-v-5ac35242="" class="progress-bar">
                                    <div data-v-5ac35242="" class="progress-value relative completed"
                                         style="width: @if($signBalance > 0) 0% @else 100% @endif;"></div>
                                </div>
                            </div>
                            <div class="completion" style="display: none;">1 / 1</div>
                        </div>
                    </div>

                    @foreach(\App\Models\Task::get() as $key=>$element)
                        <?php
                        $apply = \App\Models\TaskRequest::where('task_id', $element->id)->where('user_id', auth()->id())->where('status', '!=', 'rejected')->first();
                        ?>
                        <div class="tasks-page-content-item">
                            <div class="flex items-center justify-between">
                                <div>
                                    <div class="tasks-page-content-item-title flex items-center">
                                        <div class="title">Why create a team?</div>
                                    </div>
                                    <div class="description">If you want to
                                        make more money, you can invite your
                                        friends to join us.
                                        When friends you invite
                                        buy equipment, you can get cash rewards. You can earn a profit share from
                                        equipment
                                        purchased by
                                        your team members..
                                    </div>
                                </div>
                                <div class="flex items-center justify-between">
                                    <div class="btns">
                                        @if($apply)
                                            <a style="background: #35C75A;"
                                               class="waves-effect waves-light btn modal-trigger"
                                               href="#modal{{$element->id+5}}">Applied</a>
                                        @else
                                            <a style="background: #35C75A;"
                                               class="waves-effect waves-light btn modal-trigger"
                                               href="#modal{{$element->id+5}}">Request</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="progress-content">
                                <div class="tips">Completed</div>
                                <div data-v-5ac35242="" class="progress relative">
                                    <div data-v-5ac35242="" class="progress-bar" style="background: #35C75A;">
                                        <div data-v-5ac35242="" class="progress-value relative"
                                             style="width: @if(auth()->user()->invite10_balance > 0) 100% @else 0% @endif;background: #35C75A;"></div>
                                    </div>
                                </div>
                                <div class="completion">
                                    <div>Reward: {{price($element->bonus)}}</div>
                                    <div>Deposit: {{price($teamDeposit)}}/ Target: {{price($element->invest)}}</div>
                                </div>
                            </div>
                        </div>

                            <div id="modal{{$element->id+5}}" class="modal">
                                <div class="modal-content">
                                    <h4 style="color: #35C75A;text-align: center;padding: 40px 0;margin-bottom: 0;">Invite to activate members</h4>
                                    <p style="font-size: 15px;text-align: center;">
                                        By sharing, when the member you recommend reaches VIP1 or
                                        above, success invest {{price($element->invest)}}. Additional reward {{price($element->bonus)}} (when you
                                        reach the goal, you can
                                        receive the bonus here every day
                                    </p>
                                </div>
                                <div class="modal-footer">
                                    <a href="javascript:void(0)"
                                       class="modal-close waves-effect waves-green btn-flat modalBtn"
                                       style="background: #0000a045;color: #35C75A;">Cancel</a>
                                    <a href="{{url('apply-for-task-commission'.'/'. $element->id)}}"
                                       class="modal-close waves-effect waves-green btn-flat modalBtn">Confirm</a>
                                </div>
                            </div>
                    @endforeach

                </div>
            </section>
        </div>
    </div>
</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var elems = document.querySelectorAll('.modal');
        var instances = M.Modal.init(elems, options);
    });
    $(document).ready(function () {
        $('.modal').modal();
    });

</script>
</body>
</html>
