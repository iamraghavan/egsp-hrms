@extends('layouts.app')

@section('content')

<section class="page_404">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-10 text-center">
                <div class="four_zero_four_bg">
                    <img src="https://cdn.dribbble.com/users/285475/screenshots/2083086/dribbble_1.gif" alt="404 Image" class="img-fluid">
                    <h1 class="text-center" style="
                    margin-top: -6rem;
                ">404</h1>
                </div>
                <div class="contant_box_404">
                    <h3 class="h2">Looks like you're lost</h3>
                    <p>The page you are looking for is not available!</p>
                    <a href="/" class="btn btn-success">Go to Home</a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
