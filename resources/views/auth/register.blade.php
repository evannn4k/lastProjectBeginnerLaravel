@extends("layout.app")

@section("content")

<div class="bg-primary-subtle bg-gradient">
    <div class="container">
        <div class="row vh-100 align-items-center">
            <div class="col-md-4 offset-md-4">
                <div class="bg-white border p-4 shadow rounded-4 d-flex flex-column">
                    <form action="{{ route("register.process") }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <h4 class="text-center">Register</h4>
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old("name") }}">
                            @error("name")
                            <div class="fs-6 form-text text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ old("email") }}">
                            @error("email")
                            <div class="fs-6 form-text text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" value="{{ old("password") }}">
                            @error("password")
                            <div class="fs-6 form-text text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="confirmPassword" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" value="{{ old("confirmPassword") }}">
                            @error("confirmPassword")
                            <div class="fs-6 form-text text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Register</button>
                    </form>
                    <div class="py-2 w-100 text-center">
                        <label>Already have an account? Please <a href="{{ route("login") }}">Login</a>.</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection