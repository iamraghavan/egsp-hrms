@extends('layouts.app')
@section('content')

<div class="page-wrapper compact-wrapper" id="pageWrapper">

    @include('components.h-nav')

    <div class="page-body-wrapper">

        @include('components.v-nav')

        @if(session('success'))
    <div class="alert alert-light-success" role="alert">
        <div class="txt-success">
            {{ session('success') }}
        </div>
    </div>
@endif


    </div>

</div>


@endsection