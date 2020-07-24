@extends('layouts.backend.app')

@section('title', 'Category')

@push('css')
    <!-- JQuery DataTable Css -->
    <link href="{{ asset('assets/backend/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css') }}" rel="stylesheet">
@endpush


@section('content')

<div class="container-fluid">
    <div class="block-header">
        <a class="btn btn-primary waves-effect" href="{{ route('admin.category.create') }}">
            <i class="material-icons">add</i>
            <span>Add New Category</span>
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
                        All Categories
                        <span style="font-size: 15px;" class="badge bg-red">{{ $categories->count()  }}</span>
                    </h2>
                    
                </div>
                <div class="body">
                    
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Total Employee</th>
                                    <th>See List</th>
                                    <th>Created at</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Total Employee</th>
                                    <th>See List</th>
                                    <th>Created at</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($categories as $key=>$category)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td >{{ $category->name }}</td>
                                    <td><span class="badge bg-blue" style="font-size: 16px;">{{ $category->employees->count() }}</span></td>
                                    <td>
                                        <a href="{{ route('admin.category.show',$category->id) }}" class="btn btn-success waves-effect">
                                            See List
                                        </a>
                                    </td>
                                    <td>{{ $category->created_at->diffforhumans() }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.category.edit',$category->id) }}" class="btn btn-info waves-effect">
                                            <i class="material-icons">edit</i>
                                        </a>
                          
                                 <button class="btn btn-danger waves-effect" type="button" onclick="deleteCategory({{ $category->id }})">
                                            <i class="material-icons">delete</i>
                                        </button>
                          
                                        <form id="delete-form-{{ $category->id }}" action="{{ route('admin.category.destroy',$category->id) }}" method="POST" style="display: none;">
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
       function deleteCategory(id){
           const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            })
            
            swalWithBootstrapButtons.fire({
                title: 'Are you sure?',
                text: "Your all employees of this category will be deleted!",
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