@extends('admin.partials.master')
@section('admin_content')
    <section id="dashboard-ecommerce">
        <div class="row">
            <div class="col-12">
                <form action="{{route('admin.setting.insert')}}" method="POST" enctype="multipart/form-data">@csrf
                    <input type="hidden" name="id" value="{{$data ? $data->id : ''}}">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">
                                <div class="d-flex justify-content-between">
                                    <div>{{$data ? 'Update' : 'Create New'}} Settings</div>
                                </div>
                            </h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12 mt-2">
                                        <div class="row">
                                            <div class="col-sm-12 mt-2">
                                                <div class="row">
                                                    <div class="col-12 col-sm-6">
                                                        <fieldset class="form-group">
                                                            <label for="basicInputFile">Upload Logo <small>{Suggestion:
                                                                    size 80X80(px)}</small> </label>
                                                            <div class="custom-file">
                                                                <input type="file" name="logo"
                                                                       class="custom-file-input is-valid"
                                                                       id="inputGroupFile01"
                                                                       @if(!$data) required
                                                                       @else @endif onchange="showPreview(event)">
                                                                <label class="custom-file-label" for="inputGroupFile01">Choose
                                                                    file</label>
                                                                <div class="valid-feedback">
                                                                    <i class="bx bx-radio-circle"></i>
                                                                    Note: Logo image mandatory
                                                                </div>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                    <div class="col-12 col-sm-6">
                                                        <div class="image_preview">
                                                            <img
                                                                src="{{$data ? asset(view_image($data->logo)) :  asset(not_found_img())}}"
                                                                id="file-ip-1-preview" class="rounded"
                                                                alt="Preview Image"
                                                                style="width: 100px;height: 100px">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <label for="withdraw_status">Withdraw status</label>
                                        <select name="withdraw_status" id="withdraw_status" class="form-control">
                                            <option value="active" @if($data->withdraw_status == 'active') selected @endif>Active</option>
                                            <option value="inactive" @if($data->withdraw_status == 'inactive') selected @endif>In-Active</option>
                                        </select>
                                        <div class="valid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            Note: This is filed is optional
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <label for="minimum_withdraw">minimum withdraw</label>
                                        <input type="text" class="form-control is-valid"
                                               name="minimum_withdraw" id="minimum_withdraw"
                                               placeholder="minimum_withdraw"
                                               value="{{$data ? $data->minimum_withdraw : old('minimum_withdraw')}}">
                                        <div class="valid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            Note: This is filed is optional
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="maximum_withdraw">maximum withdraw</label>
                                        <input type="text" class="form-control is-valid"
                                               name="maximum_withdraw" id="maximum_withdraw"
                                               placeholder="minimum_withdraw"
                                               value="{{$data ? $data->maximum_withdraw : old('maximum_withdraw')}}">
                                        <div class="valid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            Note: This is filed is optional
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <label for="withdraw_charge">withdraw charge(%)</label>
                                        <input type="text" class="form-control is-valid"
                                               name="withdraw_charge" id="minimum_withdraw"
                                               placeholder="10%"
                                               value="{{$data ? $data->withdraw_charge : old('withdraw_charge')}}">
                                        <div class="valid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            Note: This is filed is optional
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <label for="minimum_recharge">Minimum Recharge</label>
                                        <input type="text" class="form-control is-valid"
                                               name="minimum_recharge" id="minimum_recharge"
                                               placeholder="10%"
                                               value="{{$data ? $data->minimum_recharge : old('minimum_recharge')}}">
                                        <div class="valid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            Note: This is filed is optional
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="maximum_recharge">Maximum Recharge</label>
                                        <input type="text" class="form-control is-valid"
                                               name="maximum_recharge" id="maximum_recharge"
                                               placeholder="10%"
                                               value="{{$data ? $data->maximum_recharge : old('maximum_recharge')}}">
                                        <div class="valid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            Note: This is filed is optional
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <label for="telegram_channel">Telegram channel</label>
                                        <input type="text" class="form-control is-valid"
                                               name="telegram_channel" id="telegram_channel"
                                               placeholder="telegram_channel"
                                               value="{{$data ? $data->telegram_channel : old('telegram_channel')}}">
                                        <div class="valid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            Note: This is filed is optional
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <label for="telegram_channel">Telegram group</label>
                                        <input type="text" class="form-control is-valid"
                                               name="telegram_group" id="telegram_group"
                                               placeholder="telegram_group"
                                               value="{{$data ? $data->telegram_group : old('telegram_group')}}">
                                        <div class="valid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            Note: This is filed is optional
                                        </div>
                                    </div>
                                    
<div class="col-sm-6">
    <label for="withdraw_button">Withdraw Button</label>
    <select name="withraw_button"
            id="withdraw_button"
            style="
                display: block;
                width: 100%;
                padding: 0.5rem;
                font-size: 1rem;
                line-height: 1.5;
                margin:3px 0;
                color: #000;
                background-color: #fff;
                background-clip: padding-box;
                border: 1px solid #22c55e; /* Green-400 */
                border-radius: 0.375rem; /* rounded-md */
                transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
            ">
        <option value="on" {{ isset($data) && $data->withraw_button == 'on' ? 'selected' : '' }}>
            Enable
        </option>
        <option value="off" {{ isset($data) && $data->withraw_button == 'off' ? 'selected' : '' }}>
            Disable
        </option>
    </select>
    <div style="color: #16a34a; font-size: 0.875rem; margin-top: 0.25rem;">
        <i class="bx bx-radio-circle"></i>
        Note: Choose to enable or disable the withdraw button
    </div>
</div>

<div class="col-sm-6">
    <label for="refer_limit">Refer Limit</label>
    <input type="number" step="0.01" min="0" class="form-control is-valid"
           name="refer_limit" id="refer_limit"
           placeholder="Enter Registration Bonus Amount"
           value="{{ $data ? $data->refer_limit : old('refer_limit') }}">
    <div class="valid-feedback">
        <i class="bx bx-radio-circle"></i>
        Note: Refer limit
    </div>
</div>

<div class="col-sm-6">
    <label for="registration_bonus">Registration Bonus</label>
    <input type="number" step="0.01" min="0" class="form-control is-valid"
           name="registration_bonus" id="registration_bonus"
           placeholder="Enter Registration Bonus Amount"
           value="{{ $data ? $data->registration_bonus : old('registration_bonus') }}">
    <div class="valid-feedback">
        <i class="bx bx-radio-circle"></i>
        Note: Bonus amount credited during registration
    </div>
</div>

<div class="col-sm-6">
    <label for="refer_commission">Referral Commission</label>
    <input type="number" step="0.01" min="0" class="form-control is-valid"
           name="refer_commission" id="refer_commission"
           placeholder="Enter Referral Commission Amount"
           value="{{ $data ? $data->refer_commission : old('refer_commission') }}">
    <div class="valid-feedback">
        <i class="bx bx-radio-circle"></i>
        Note: Commission amount given for successful referrals
    </div>
</div>

                                    

                                    <div class="col-sm-6">
                                        <label for="daily_sign_amount">Daily sign amount</label>
                                        <input type="text" class="form-control is-valid"
                                               name="daily_sign_amount" id="daily_sign_amount"
                                               placeholder="Daily sign amount"
                                               value="{{$data ? $data->daily_sign_amount : old('daily_sign_amount')}}">
                                        <div class="valid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            Note: This is filed is optional
                                        </div>
                                    </div>
                                    
                                      <div class="col-sm-12">
                                        <label for="notice">notice</label>
                                        <input type="text" class="form-control is-valid"
                                               name="notice" id="notice"
                                               placeholder="type home pop"
                                               value="{{$data ? $data->notice : old('notice')}}">
                                        <div class="valid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            Note: This is filed is optional
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Form Submit Button -->
                    <div class="card">
                        <div class="card-header">
                            <h6 class="card-title">
                                <div class="d-flex justify-content-between">
                                    <div style="margin-top: .7rem !important">
                                        Submit Your Setting Information
                                    </div>
                                    <div>
                                        <div class="form-group mb-0">
                                            <button type="submit" class="btn btn-success"><i
                                                    class="bx bx-plus"></i>{{$data ? 'Update' : 'Submit'}} </button>
                                        </div>
                                    </div>
                                </div>
                            </h6>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <script>
        function showPreview(event) {
            if (event.target.files.length > 0) {
                var src = URL.createObjectURL(event.target.files[0]);
                var preview = document.getElementById("file-ip-1-preview");
                preview.src = src;
                preview.style.display = "block";
            }
        }

        function showPreviewFavicon(event) {
            if (event.target.files.length > 0) {
                var src = URL.createObjectURL(event.target.files[0]);
                var preview = document.getElementById("favicon");
                preview.src = src;
                preview.style.display = "block";
            }
        }
    </script>
@endsection
