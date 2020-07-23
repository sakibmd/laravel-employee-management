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
   <button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#myModal">
    Change Contact Number</button>
    <button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#changeBin">
        Change Bin Number</button>
        <button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#changeEmail">
            Change Email Address</button>

<!-----------------------------------------Start Contact Update------------------------------------------------------------------------>
<!-----------------------------------------Start Contact Update------------------------------------------------------------------------>
<!-----------------------------------------Start Contact Update------------------------------------------------------------------------>
<!-----------------------------------------Start Contact Update------------------------------------------------------------------------>
<!-----------------------------------------Start Contact Update------------------------------------------------------------------------>
<!-----------------------------------------Start Contact Update------------------------------------------------------------------------>

   <!-- Trigger the modal with a button -->
   
    <div class="report-area" style="margin: 60px 20px;">				
        <!-- Modal -->
        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
        
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><strong>Please Enter Your New Number</strong></h4>
                    </div>
                <div class="modal-body">

                    <form action="{{ route('change.contact', $employee->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group form-float">
                            <div class="form-line">									
                                <input required type="tel" value="{{ old('contact') }}" class="form-control" placeholder="type here..." name="contact">									
                            </div>
                        </div>

                        <a class="btn btn-danger waves-effect m-t-15" href="{{ URL::previous() }}">Back</a>
                        <button type="submit" class="btn btn-info m-t-15 waves-effect">Update</button>
                    </form>
                </div>
                
            </div>
        
            </div>
        </div>
    </div>

    <!-----------------------------------------End Contact Update------------------------------------------------------------------------>
    <!-----------------------------------------End Contact Update------------------------------------------------------------------------>
    <!-----------------------------------------End Contact Update------------------------------------------------------------------------>
    <!-----------------------------------------End Contact Update------------------------------------------------------------------------>
    <!-----------------------------------------End Contact Update------------------------------------------------------------------------>
    <!-----------------------------------------End Contact Update------------------------------------------------------------------------>






<!-----------------------------------------Start Bin Update------------------------------------------------------------------------>
<!-----------------------------------------Start Bin Update------------------------------------------------------------------------>
<!-----------------------------------------Start Bin Update------------------------------------------------------------------------>
<!-----------------------------------------Start Bin Update------------------------------------------------------------------------>
<!-----------------------------------------Start Bin Update------------------------------------------------------------------------>
<!-----------------------------------------Start Bin Update------------------------------------------------------------------------>

   <!-- Trigger the modal with a button -->
   
    <div class="report-area" style="margin: 60px 20px;">				
        <!-- Modal -->
        <div id="changeBin" class="modal fade" role="dialog">
            <div class="modal-dialog">
        
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><strong>Please Enter Your New Bin</strong></h4>
                    </div>
                <div class="modal-body">

                    <form action="{{ route('change.bin', $employee->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group form-float">
                            <div class="form-line">									
                                <input required type="tel" value="{{ old('bin') }}" class="form-control" placeholder="type here..." name="bin">									
                            </div>
                        </div>

                        <a class="btn btn-danger waves-effect m-t-15" href="{{ URL::previous() }}">Back</a>
                        <button type="submit" class="btn btn-info m-t-15 waves-effect">Update</button>
                    </form>
                </div>
                
            </div>
        
            </div>
        </div>
    </div>

    <!-----------------------------------------End Bin Update------------------------------------------------------------------------>
    <!-----------------------------------------End Bin Update------------------------------------------------------------------------>
    <!-----------------------------------------End Bin Update------------------------------------------------------------------------>
    <!-----------------------------------------End Bin Update------------------------------------------------------------------------>
    <!-----------------------------------------End Bin Update------------------------------------------------------------------------>
    <!-----------------------------------------End Bin Update------------------------------------------------------------------------>








    <!-----------------------------------------Start Email Update------------------------------------------------------------------------>
    <!-----------------------------------------Start Email Update------------------------------------------------------------------------>
    <!-----------------------------------------Start Email Update------------------------------------------------------------------------>
    <!-----------------------------------------Start Email Update------------------------------------------------------------------------>
    <!-----------------------------------------Start Email Update------------------------------------------------------------------------>
    <!-----------------------------------------Start Email Update------------------------------------------------------------------------>
    <!-----------------------------------------Start Email Update------------------------------------------------------------------------>


   <!-- Trigger the modal with a button -->
    <div class="report-area" style="margin: 60px 20px;">				
        <!-- Modal -->
        <div id="changeEmail" class="modal fade" role="dialog">
            <div class="modal-dialog">
        
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><strong>Please Enter Your New Email</strong></h4>
                    </div>
                <div class="modal-body">

                    <form action="{{ route('change.email', $employee->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group form-float">
                            <div class="form-line">									
                                <input required type="tel" value="{{ old('email') }}" class="form-control" placeholder="type here..." name="email">									
                            </div>
                        </div>

                        <a class="btn btn-danger waves-effect m-t-15" href="{{ URL::previous() }}">Back</a>
                        <button type="submit" class="btn btn-info m-t-15 waves-effect">Update</button>
                    </form>
                </div>
                
            </div>
        
            </div>
        </div>
    </div>

    <!-----------------------------------------End Email Update------------------------------------------------------------------------>
    <!-----------------------------------------End Email Update------------------------------------------------------------------------>
    <!-----------------------------------------End Email Update------------------------------------------------------------------------>
    <!-----------------------------------------End Email Update------------------------------------------------------------------------>
    <!-----------------------------------------End Email Update------------------------------------------------------------------------>



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
                    <th>BIN NAME</th>
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
                    <input type="number" placeholder="type here..."  class="form-control" name="submission_id" value="{{ old('submission_id') }}">
                    </div>
                </div>
                <input type="hidden"  class="form-control" name="bin" value="{{ $employee->bin }}">
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


