@extends('layouts.backend.app')

@section('title', 'Add Employees')

@push('css')
<link href="{{ asset('assets/backend/plugins/bootstrap-select/css/bootstrap-select.css') }}" rel="stylesheet" />
@endpush


@section('content')

{{-- @if ($errors->any())
<div class="alert alert-danger m-3">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif --}}

    <div class="container-fluid">

        <form action="{{ route('subadmin.employee.store') }}" method="POST">
            @csrf
    
        <!-- Vertical Layout | With Floating Label -->
        
        <div class="row clearfix">
            <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            ADD NEW EMPLOYEE
                        </h2>
                    </div>
                    @if ($errors->any())
                        <div class="alert alert-danger m-3">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="body">
                        
                            <div class="form-group form-float">
                                <div class="form-line">
                                <input type="text" id="title" class="form-control" name="login_no" value="{{ old('login_no') }}">
                                    <label class="form-label">Login No</label>
                                </div>
                            </div>

                            <div class="form-group form-float">
                                <div class="form-line">
                                <input type="text" id="title" class="form-control" name="ref" value="{{ old('ref') }}">
                                    <label class="form-label">Ref</label>
                                </div>
                            </div>

                            <div class="form-group form-float">
                                <div class="form-line">
                                <input type="text" id="title" class="form-control" name="remark" value="{{ old('remark') }}">
                                    <label class="form-label">Remark</label>
                                </div>
                            </div>

                            <div class="form-group form-float">
                                <div class="form-line">
                                <input type="text" id="title" class="form-control" name="bin" value="{{ old('bin') }}">
                                    <label class="form-label">Bin</label>
                                </div>
                            </div>

                            <div class="form-group form-float">
                                <div class="form-line">
                                <input type="text" id="title" class="form-control" name="bin_name" value="{{ old('bin_name') }}">
                                    <label class="form-label">Bin Name</label>
                                </div>
                            </div>

                            <div class="form-group form-float">
                                <div class="form-line">
                                <input type="tel" id="title" class="form-control" name="contact" value="{{ old('contact') }}">
                                    <label class="form-label">Contact</label>
                                </div>
                            </div>

                            <div class="form-group form-float">
                                <div class="form-line">
                                <input type="text" id="title" class="form-control" name="work_month" value="{{ old('work_month') }}">
                                    <label class="form-label">Work Month</label>
                                </div>
                            </div>

                            <div class="form-group form-float">
                                <div class="form-line">
                                <input type="text" id="title" class="form-control" name="work_type" value="{{ old('work_type') }}">
                                    <label class="form-label">Work Type</label>
                                </div>
                            </div>

                            <div class="form-group form-float">
                                <div class="form-line">
                                <input type="text" id="title" class="form-control" name="address" value="{{ old('address') }}">
                                    <label class="form-label">Address</label>
                                </div>
                            </div>

                            <div class="form-group form-float">
                                <div class="form-line">
                                <input type="email" id="title" class="form-control" name="email" value="{{ old('email') }}">
                                    <label class="form-label">Email</label>
                                </div>
                            </div>

                           

                            <a class="btn btn-danger waves-effect m-t-15" href="{{ route('subadmin.employee.index') }}">Back</a>
                            <button type="submit" class="btn btn-primary m-t-15 waves-effect">Submit</button>

                    </div>
                </div>
            </div>
          
        </div>

    
    </form>
    </div>

@endsection

@push('js')
    <!-- Select Plugin Js -->
    <script src="{{ asset('assets/backend/plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>
    <!-- TinyMCE -->
    <script src="{{ asset('assets/backend/plugins/tinymce/tinymce.js') }}"></script>
   
   <script type="text/javascript">
   $(function () {
   
    //TinyMCE
    tinymce.init({
        selector: "textarea#tinymce",
        theme: "modern",
        height: 300,
        plugins: [
            'advlist autolink lists link image charmap print preview hr anchor pagebreak',
            'searchreplace wordcount visualblocks visualchars code fullscreen',
            'insertdatetime media nonbreaking save table contextmenu directionality',
            'emoticons template paste textcolor colorpicker textpattern imagetools'
        ],
        toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
        toolbar2: 'print preview media | forecolor backcolor emoticons',
        image_advtab: true
    });
    tinymce.suffix = ".min";
    tinyMCE.baseURL = "{{ asset('assets/backend/plugins/tinymce') }}";
});


 </script>


@endpush