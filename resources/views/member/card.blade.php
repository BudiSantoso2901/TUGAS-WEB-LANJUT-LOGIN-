@extends('_layouts.app')
@section('content')
<section class="py-5">
    <div class="container" style="border-radius: 20px;">
        <div class="row may-5">
            <div class="col-md-6 mt-md-0 mt-4">
                <p>SELEMAT KAMU! telah menjadi member <br>berikut kartu member anda:</p>
                <div class="card">
                    <div class="card-header d-flex justify-content-start">
                        <img src="{{ asset("assets/images/3.jpg") }}" class="img-fluid" width="100" >
                        <p class="mb-0 ms-3 d-flex align-items-center" style="letter-spacing: 1px">
                        KARTU Member
                    </p>
                </div>
                <div class="card-body">
                    <h2><b>{{ Auth::user()->name }}</b></h2>
                    <p class="text-secondary mb-0"> {{ Auth::user()->email }}</p>
                    <hr class="text-secondary">
                    <small class="text-secondary mb-0">bergabung sejak <b>{{ Auth::user()->created_at }}</b></small>
                </div>
            </div>
        </div>
    </div>
    </div>

</section>
@endsection