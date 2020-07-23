@extends('layouts.backend.app')

@section('title', 'Author Dashboard')

@push('css')
    
@endpush


@section('content')
 
 <div class="container-fluid">
            <div class="block-header">
                <h1>Employees</h1>
            </div>
  </div> 

@endsection

@push('js')
   <!-- Jquery CountTo Plugin Js -->
<script src="{{ asset('assets/backend/plugins/jquery-countto/jquery.countTo.js') }}"></script>

<!-- Morris Plugin Js -->
<script src="{{ asset('assets/backend/plugins/raphael/raphael.min.js') }}"></script>
<script src="{{ asset('assets/backend/plugins/morrisjs/morris.js') }}"></script>


<script src="{{ asset('assets/backend/js/pages/index.js') }}"></script>
@endpush