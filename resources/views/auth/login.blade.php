@extends("layout.app")

@section("content")

<div class="bg-primary-subtle bg-gradient">
    <div class="container">
        <div class="row vh-100 align-items-center">
            <div class="col-md-4 offset-md-4">
                <div class="bg-white border p-4 shadow rounded-4 d-flex flex-column">
                    <form action="{{ route("auth") }}" method="POST">
                        @csrf
                        @error("loginFailed")
                        <div class="mb-3">
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        </div>
                        @enderror
                        <div class="mb-3">
                            <h4 class="text-center">Login</h4>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="email" name="email">
                            @error("email")
                            <div class="fs-6 form-text text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password">
                            @error("password")
                            <div class="fs-6 form-text text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="showPassword">
                            <label class="form-check-label" for="showPassword">Show password</label>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Login</button>
                    </form>
                    <div class="py-2 w-100 text-center">
                        <label>Don't have an account? Please <a href="{{ route("register") }}">Register</a>.</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById("showPassword").addEventListener("change", () => {
        let password = document.getElementById("password")
        password.type = (password.getAttribute("type") == "password") ? "text" : "password"
    })
</script>

@endsection