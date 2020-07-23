@extends('layouts.frontend.app')

@section('title','Home Page')
    
@push('css')

<style>
  
    
</style>
    
@endpush

@section('content')

                    
<section>
    <div class="container" style="margin-top: 180px;">
        <div class="row">
            <div class="col-md-3"> </div>
            <div class="col-md-6"> 
                <div class="card m-3 p-3">
                    <div class="form">
                      <div class="src-area">
                          <form method="GET" action="{{ route('search') }}">
                              <label>Enter your bin number: </label>
                              <input class="form-control" type="text" placeholder="type here..." name="query"><br>
                              <button type="submit" class="btn btn-info">Show Details</button>
                          </form>
                      </div>
                    </div>
                    <br>
                   
                    
                </div>
            </div>
            <div class="col-md-3"> </div>
        </div>
    </div>
</section>
   



@endsection

