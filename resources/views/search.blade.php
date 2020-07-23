@extends('layouts.frontend.app')

@section('title')
    {{ $result }}
@endsection
  
    

@section('content')
    
	<div class="container text-center mt-4">
		<h1 style="color:whitesmoke" class="title display-table-cell"><b>Result For "{{ $query }}"</b></h1>
	</div><!-- slider -->

	
		<div class="container">

			<div class="row">
                
                <div class="col-md-3"></div>
            <div class="col-md-6"><div class="card m-3 p-3">
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
        </div>
           <div class="col-md-3"></div>

            </div><!-- row -->
            

		</div><!-- container -->
	


@endsection



