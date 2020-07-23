@extends('layouts.backend.app')

@section('title', 'Dashboard')

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

<!-- ChartJs -->
<script src="{{ asset('assets/backend/plugins/chartjs/Chart.bundle.js') }}"></script>

<!-- Flot Charts Plugin Js -->
<script src="{{ asset('assets/backend/plugins/flot-charts/jquery.flot.js') }}"></script>
<script src="{{ asset('assets/backend/plugins/flot-charts/jquery.flot.resize.js') }}"></script>
<script src="{{ asset('assets/backend/plugins/flot-charts/jquery.flot.pie.js') }}"></script>
<script src="{{ asset('assets/backend/plugins/flot-charts/jquery.flot.categories.js') }}"></script>
<script src="{{ asset('assets/backend/plugins/flot-charts/jquery.flot.time.js') }}"></script>

<!-- Sparkline Chart Plugin Js -->
<script src="{{ asset('assets/backend/plugins/jquery-sparkline/jquery.sparkline.js') }}"></script>


<script src="{{ asset('assets/backend/js/pages/index.js') }}"></script>
@endpush