@php
$theme = Config::get('app.theme');
@endphp
@extends($theme . '.layouts.master')

@section('content')
<script>
    $( function() {
    $( "#datepicker" ).datepicker();
    }
    );
</script>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    WELCOME TO MEMBER BOARD!
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
