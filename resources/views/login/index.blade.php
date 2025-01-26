@extends('main')

@section('content')
    <div class="row justify-content-center text-center">
        <div class="col-md-6">
            <div class="card mt-5">
                <div class="card-body">
                    <form action="{{ route('submit') }}" method="post">
                        @if (session('berhasil'))
                            <p class="alert alert-success">{{ session('berhasil') }}</p>
                        @endif
                        @if (session('gagal'))
                            <p class="alert alert-danger">{{ session('gagal') }}</p>
                        @endif
                        @csrf
                        <h1>Login</h1>
                        <input type="text" name="email" class="form-control mt-2" placeholder="Email" required>
                        <input type="password" name="password" class="form-control mt-2" placeholder="password" required>
                        <button class="btn btn-primary mt-2">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
