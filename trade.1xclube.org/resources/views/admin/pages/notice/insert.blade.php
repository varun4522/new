@extends('admin.partials.master')
@section('admin_content')
    <section id="dashboard-ecommerce">
        <div class="row">
            <div class="col-12">
                <form action="{{route('admin.notice.insert')}}" method="POST" enctype="multipart/form-data">@csrf
                    <input type="hidden" name="id" value="{{$data ? $data->id : ''}}">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">
                                <div class="d-flex justify-content-between">
                                    <div>{{$data ? 'Update' : 'Create New'}} Notice</div>
                                    <div>
                                        <a href="{{route('admin.notice.index')}}" class="btn btn-primary btn-sm"> <i
                                                class="bx bx-left-arrow"></i> Notice List</a>
                                    </div>
                                </div>
                            </h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="notice_type">Notice type <small>(suggested -> Warning, danger, information, successful, unknown)</small> </label>
                                        <input type="text" class="form-control is-valid"
                                               name="notice_type" id="notice_type"
                                               placeholder="notice type" value="{{$data ? $data->notice_type : old('notice_type')}}" required>
                                        <div class="valid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            Note: This is filed is required
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="notice_title">notice_title</label>
                                        <input type="text" class="form-control is-valid"
                                               name="notice_title" id="notice_title"
                                               placeholder="notice title" value="{{$data ? $data->notice_title : old('notice_title')}}" required>
                                        <div class="valid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            Note: This is filed is required
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="notice_desc">Notice description</label>
                                        <input type="text" class="form-control is-valid"
                                               name="notice_desc" id="notice_desc"
                                               placeholder="notice desc" value="{{$data ? $data->notice_desc : old('notice_desc')}}" required>
                                        <div class="valid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            Note: This is filed is required
                                        </div>
                                    </div>

                                    @if($data)

                                        <div class="col-sm-6">
                                            <label for="status">Status</label>
                                            <select name="status" class="form-control" id="status">
                                                <option value="active" @if($data->status == 'active') selected @endif>Active</option>
                                                <option value="inactive" @if($data->status == 'inactive') selected @endif>In-Active</option>
                                            </select>
                                            <div class="valid-feedback">
                                                <i class="bx bx-radio-circle"></i>
                                                Note: This is filed is required
                                            </div>
                                        </div>

                                        @endif

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
                                        Submit Your Notice Information
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
        function showPreview(event){
            if(event.target.files.length > 0){
                var src = URL.createObjectURL(event.target.files[0]);
                var preview = document.getElementById("file-ip-1-preview");
                preview.src = src;
                preview.style.display = "block";
            }
        }
        function calculateHour(_this){
            document.getElementById('hours').value = _this.value * 24
        }
    </script>
@endsection
