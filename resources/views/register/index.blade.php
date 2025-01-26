@extends('main')

@section('content')
    <div class="row justify-content-center text-center">
        <div class="col-md-6">
            <div class="card mt-5">
                <div class="card-body">
                    <form action="{{ route('store') }}" method="post">
                        @if (session()->has("berhasil"))
                        <div class="alert alert-success" role="alert">
                            {{ session('berhasil') }}
                          </div>
                        @endif
                        @if (session()->has('gagal'))
                            <div class="alert alert-danger" role="alert">
                                {{session('gagal')}}
                            </div>
                        @endif
                        @csrf
                        <h1>Register</h1>
                        <input type="text" name="username" class="form-control mt-2" placeholder="Username" required>
                        <input type="text" name="email" class="form-control mt-2" placeholder="Email" required>
                        <input type="password" name="password" class="form-control mt-2" placeholder="password" required>
                        <button class="btn btn-primary mt-2">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
