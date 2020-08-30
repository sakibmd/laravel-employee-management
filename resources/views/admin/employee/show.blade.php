@extends('layouts.backend.app')

@section('title', 'Employee Info')

@push('css')
<link href="{{ asset('assets/backend/plugins/bootstrap-select/css/bootstrap-select.css') }}" rel="stylesheet" />
<style>
    .table{
        border-color:black; 
    }
</style>
@endpush


@section('content')

    <div class="container-fluid">
        @if ($errors->any())
                <div class="alert alert-danger" id="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
        @endif

        @if (session()->has('success'))
                <div class="alert alert-success" id="alert" role="alert">
                    {{ session()->get('success') }}
                </div>
        @endif

        @if (session()->has('warning'))
                <div class="alert alert-warning" id="alert" role="alert">
                    {{ session()->get('warning') }}
                </div>
        @endif

                 
   <a href="{{ route('admin.employee.index') }}" class="btn btn-danger wave-effect" >BACK</a>
 
        <div class="row">
            <h4>Details:-</h4>
            <br>
           <div class="col-md-4">
            <table class="table table-bordered">
                <tr>
                    <th>Login No</th>
                    <td>{{ $employee->login_no }}</td>
                </tr>
                <tr>
                    <th> Category Name</th>
                    <td>{{ $employee->category->name }}</td>
                </tr>
                <tr>
                    <th>Ref</th>
                    <td>{{ $employee->ref }}</td>
                </tr>
                <tr>
                    <th>Remark</th>
                    <td>{{ $employee->remark }}</td>
                </tr>
                <tr>
                    <th>BIN</th>
                    <td>{{ $employee->bin }}</td>
                </tr>
                <tr>
                    <th>Customer Name</th>
                    <td>{{ $employee->bin_name }}</td>
                </tr>
                <tr>
                    <th>Contact</th>
                    <td>{{ $employee->contact }}</td>
                    
                </tr>
                <tr>
                    <th>Work Month</th>
                    <td>{{ $employee->work_month }}</td>
                </tr>
                <tr>
                    <th>Work Type</th>
                    <td>{{ $employee->work_type }}</td>
                </tr>
                <tr>
                    <th>Address</th>
                    <td>{{ $employee->address }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ $employee->email }}</td>
                </tr>
            </table>
           </div>

           <div class="col-md-6">
            <form action="{{ route('submissionid.record.store') }}" method="POST" style="border: 4px solid chocolate;padding:25px; border-radius: 15px;">
                @csrf
                <h5>Send Submission Id</h5>
                <div class="form-group form-float">
                    <div class="form-line">
                    <input type="text" placeholder="type here..."  class="form-control" name="submission_id" value="{{ old('submission_id') }}">
                    </div>
                </div>
                <input type="hidden"  class="form-control" name="id" value="{{ $employee->id }}">
                <button type="submit" class="btn btn-primary  waves-effect">Submit</button>
            </form>
           </div>
            
        </div>

    </div>

@endsection


<script>
    setTimeout(function() {
         $('#alert').fadeOut('fast');
    }, 5000);
</script>


