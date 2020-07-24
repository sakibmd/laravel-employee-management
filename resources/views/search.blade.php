@extends('layouts.frontend.app')

@section('title')
    {{ $query }}
@endsection
  
    <style>
       .my-custom-scrollbar {
            position: relative;
            height: 370px;
            overflow: auto;
        }
        .table-wrapper-scroll-y {
            display: block;
        }
        thead{
            position: sticky; top: 0;
        }    
</style>

@section('content')
    
	<div class="container text-center mt-4">
		<h1 style="color:rgb(94, 87, 87)" class="title display-table-cell"><b>Result For "{{ $query }}"</b></h1>
	</div><!-- slider -->

	
		<div class="container">

			<div class="row mt-4">
                
               
            {{-- <div class="col-md-6">
                <div class="card m-3 p-3">
                    @if ($result->count() > 0 )
                                
                                
                        @foreach ($result as $item)
                        <table class="table table-bordered ">
                            <tr>
                                <th>Login No</th>
                                <td>{{ $item->login_no }}</td>
                            </tr>
                            <tr>
                                <th>Ref</th>
                                <td>{{ $item->ref }}</td>
                            </tr>
                            <tr>
                                <th>Remark</th>
                                <td>{{ $item->remark }}</td>
                            </tr>
                            <tr>
                                <th>BIN</th>
                                <td>{{ $item->bin }}</td>
                            </tr>
                        
                            <tr>
                                <th>Contact</th>
                                <td>{{ $item->contact }}</td>
                            </tr>
                            <tr>
                                <th>Work Month</th>
                                <td>{{ $item->work_month }}</td>
                            </tr>
                            
                            <tr>
                                <th>Address</th>
                                <td>{{ $item->address }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{ $item->email }}</td>
                            </tr>
                        </table>
                        @endforeach
                                
                        
                        @else 

                        <div class="">
                            No Result. Please Enter Correct Bin
                        </div>

                    @endif
                </div>
            </div> --}}

            <div class="col-md-2"></div>
            <div class="col-md-8">
                    @if ($record->count() > 0 )
                                
                            <div class="table-responsive table-wrapper-scroll-y my-custom-scrollbar">
                                <table class="table table-bordered table-dark table-hover table-striped">
                                  <thead class="bg-danger">
                                    <tr>
                                        <th>Date <small style="font-weight: bold; color:rgb(226, 226, 226)">(day-month-year)</small></th>
                                        <th>Submission Id</th>
                                    </tr>
                                  </thead>
                                   <tbody>
                                        @foreach ($record as $item)
                                        <tr>
                                            <td>{{ $item->created_at->format('d-m-Y') }}</td>
                                            <td>{{ $item->submission_id }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{-- <div class="panel-heading" style="display:flex; justify-content:center;align-items:center;">
                                    {{$record->links()}}
                                </div> --}}
                              </div>
                    
                        @else 

                        <div class="">
                            No Result. Please Enter Correct Bin or Contact
                        </div>

                    @endif
            </div>
           <div class="col-md-2"></div>

            </div><!-- row -->
            

		</div><!-- container -->
	


@endsection



