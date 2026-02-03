@extends('admin.partials.master')
@section('admin_content')
    <section id="dashboard-ecommerce">
        <div class="row">
            <div class="col-12">
                <form action="{{route('admin.category.insert')}}" method="POST" enctype="multipart/form-data">@csrf
                    <input type="hidden" name="id" value="{{$data ? $data->id : ''}}">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">
                                <div class="d-flex justify-content-between">
                                    <div>{{$data ? 'Update' : 'Create New'}} Package Category</div>
                                    <div>
                                        <a href="{{route('admin.category.index')}}" class="btn btn-primary btn-sm"> <i
                                                class="bx bx-left-arrow"></i> Category List</a>
                                    </div>
                                </div>
                            </h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="name">Package Category Name</label>
                                        <input type="text" class="form-control is-valid"
                                               name="name" id="name"
                                               placeholder="Name" value="{{$data ? $data->name : ''}}" required>
                                        <div class="valid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            Note: This is filed is required
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
                                        Submit Your Package Information
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
