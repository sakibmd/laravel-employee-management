@extends('layouts.backend.app')

@section('title', 'Employees')

@push('css')
    <!-- JQuery DataTable Css -->
    <link href="{{ asset('assets/backend/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css') }}" rel="stylesheet">
@endpush


@section('content')

<div class="container-fluid">
    <div class="block-header">
        <a class="btn btn-danger waves-effect" href="{{ URL::previous() }}">
            <span>Back</span>
        </a>
    </div>
    @if (session()->has('success'))
          <div class="alert alert-success m-3" role="alert">
              {{ session()->get('success') }}
          </div>
    @endif

   
    <!-- Exportable Table -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        Category - {{ $category->name }}
                    <span style="font-size: 15px;" class="badge bg-red">{{ $employees->count()  }}</span>
                    </h2>
                    
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Login No</th>
                                    <th>Sms for this month?</th>
                                    <th>Ref</th>
                                    <th>Remark</th>
                                    <th>Bin</th>
                                    <th>Customer Name</th>  {{-- input field bin_name --}}
                                    <th>Contact</th>
                                    <th>Work Month</th>
                                    <th>Work Type</th>
                                    <th>Address</th>
                                    <th>Email</th>
                                    <th>All Info</th>
                                    <th>Added Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Id</th>
                                    <th>Login No</th>
                                    <th>Sms for this month?</th>
                                    <th>Ref</th>
                                    <th>Remark</th>
                                    <th>Bin</th>
                                    <th>Customer Name</th>   {{-- input field bin_name --}}
                                    <th>Contact</th>
                                    <th>Work Month</th>
                                    <th>Work Type</th>
                                    <th>Address</th>
                                    <th>Email</th>
                                    <th>All Info</th>
                                    <th>Added Date</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($employees as $key=>$employee)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $employee->login_no }}</td>
                            <td>
                                @if ($employee->last_sms_date == $now)
                                     <span style="font-size: 15px;" class="label label-success">Done</span>
                                @else
                                <span style="font-size: 15px;" class="label label-danger">Not Given</span>
                                @endif
                            </td>
                            <td>{{ $employee->ref }}</td>
                            <td>{{ $employee->remark }}</td>
                            <td>{{ $employee->bin }}</td>
                            <td>{{ $employee->bin_name }}</td>
                            <td>{{ $employee->contact }}</td>
                            <td>{{ $employee->work_month }}</td>
                            <td>{{ $employee->work_type }}</td>
                            <td>{{ $employee->address }}</td>
                            <td>{{ $employee->email }}</td>
                           
                            <td><a href="{{ route('admin.categorywiseIndividual.show',$employee->id) }}" class="btn btn-info waves-effect">
                                                            Details
                            </a></td>
                           
                            <td>{{ $employee->created_at->toFormattedDateString()  }}</td>
                            <td class="text-center">
                                <a href="{{ route('admin.employee.edit',$employee->id) }}" class="btn btn-info waves-effect">
                                    Edit
                                </a>

                    <button style="margin:5px;" class="btn btn-danger waves-effect" type="button" onclick="deletePost({{ $employee->id }})">
                        Delete
                    </button>

                    <form id="delete-form-{{ $employee->id }}" action="{{ route('admin.employee.destroy',$employee->id) }}" method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')
                        
                    </form>
                    </td>
</tr>
@endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <!-- #END# Exportable Table -->
</div>

@endsection

@push('js')
       <!-- Jquery DataTable Plugin Js -->
       <script src="{{ asset('assets/backend/plugins/jquery-datatable/jquery.dataTables.js') }}"></script>
       <script src="{{ asset('assets/backend/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js') }}"></script>
       <script src="{{ asset('assets/backend/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js') }}"></script>
       <script src="{{ asset('assets/backend/plugins/jquery-datatable/extensions/export/buttons.flash.min.js') }}"></script>
       <script src="{{ asset('assets/backend/plugins/jquery-datatable/extensions/export/jszip.min.js') }}"></script>
       <script src="{{ asset('assets/backend/plugins/jquery-datatable/extensions/export/pdfmake.min.js') }}"></script>
       <script src="{{ asset('assets/backend/plugins/jquery-datatable/extensions/export/vfs_fonts.js') }}"></script>
       <script src="{{ asset('assets/backend/plugins/jquery-datatable/extensions/export/buttons.html5.min.js') }}"></script>
       <script src="{{ asset('assets/backend/plugins/jquery-datatable/extensions/export/buttons.print.min.js') }}"></script>
   
       <!-- Custom Js -->
       <script src="{{ asset('assets/backend/js/pages/tables/jquery-datatable.js') }}"></script>

       <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
       <script type="text/javascript">

            setTimeout(function() {
                $('.alert').fadeOut('fast');
            }, 10000);



       function deletePost(id){
           const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            })
            
            swalWithBootstrapButtons.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    
                    event.preventDefault();
                    document.getElementById('delete-form-'+id).submit();
            
                } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
                ) {
                swalWithBootstrapButtons.fire(
                    'Cancelled',
                    'Your imaginary file is safe :)',
                    'error'
                )
                }
            })
       }	



   
       </script>
@endpush