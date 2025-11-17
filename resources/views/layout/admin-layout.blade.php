<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>vstore</title>
    <link rel="shortcut icon" href="{{ asset("assets/images/logo.png") }}" type="image/x-icon">

    <!-- bootstrap -->
    <link rel="stylesheet" href="{{ asset("assets/bootstrap/css/bootstrap.min.css") }}">

    <!-- fontawesone -->
    <link rel="stylesheet" href="{{ asset("assets/fontawesome/css/all.min.css") }}">

</head>

<body>
    <style>
        *,
        html {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            overflow: hidden;
        }

        nav {
            overflow-y: auto;
            flex-shrink: 0;
            width: 280px;
        }

        main {
            overflow-y: auto;
            flex-grow: 1;
        }

        .btn-non-active {
            font-size: 1.125rem;
            color: #00000075;
        }

        .btn-non-active:hover {
            background-color: #00000010;
        }

        .btn-active {
            font-size: 1.1rem;
            color: black;
        }

        .btn-active:hover {
            background-color: #00000010;
        }

        h6 {
            color: #00000075;
        }

        .btn-outline {
            outline: 1px solid rgba(224, 224, 224, 1);
        }

        .btn-outline:active {
            outline: 1px solid rgba(180, 180, 180, 1);
        }
    </style>
    @yield("css")

    <div class="d-flex vh-100">
        <nav class="d-flex flex-column justify-content-between">
            <div class="">
                <div class="p-4 d-flex align-items-center gap-3 border-bottom">
                    <img src="{{ asset("assets/images/logo.png") }}" alt="" width="50px">
                    <h4 class="m-0">VanStore</h4>
                </div>
                <div class="d-flex flex-column gap-4 p-4">
                    <div class="d-flex flex-column gap-2">
                        <div class="mx-2">
                            <h6>Navigation</h6>
                        </div>
                        <a href="{{ route("dashboard") }}" class="d-flex align-items-center text-start btn fw-medium w-full {{ (request()->routeIs("dashboard") ? "btn-active" : "btn-non-active") }}">
                            <div style="width: 30px"><i class="fa-solid fa-house"></i></div>
                            <label>Dashboard</label>
                        </a>
                        <a href="{{ route("costumer") }}" class="d-flex align-items-center text-start btn fw-medium w-full {{ (request()->routeIs("costumer") ? "btn-active" : "btn-non-active") }}">
                            <div style="width: 30px"><i class="fa-solid fa-user-group"></i></div>
                            <label>Costumers</label>
                        </a>
                        <a href="{{ route("admin") }}" class="d-flex align-items-center text-start btn fw-medium w-full {{ (request()->routeIs("admin") ? "btn-active" : "btn-non-active") }}">
                            <div style="width: 30px"><i class="fa-solid fa-user-tie"></i></div>
                            <label>Admin</label>
                        </a>
                    </div>
                    <div class="d-flex flex-column gap-2">
                        <div class="mx-2">
                            <h6>Product</h6>
                        </div>
                        <a href="{{ route("product") }}" class="d-flex align-items-center text-start btn fw-medium w-full {{ (request()->routeIs("product") ? "btn-active" : "btn-non-active") }}">
                            <div style="width: 30px"><i class="fa-solid fa-box-open"></i></div>
                            <label>Product</label>
                        </a>
                        <a href="{{ route("category") }}" class="d-flex align-items-center text-start btn fw-medium w-full {{ (request()->routeIs("category") ? "btn-active" : "btn-non-active") }}">
                            <div style="width: 30px"><i class="fa-solid fa-layer-group"></i></div>
                            <label>Category</label>
                        </a>
                    </div>
                    <div class="d-flex flex-column gap-2">
                        <div class="mx-2">
                            <h6>Order</h6>
                        </div>
                        <a href="{{ route("order") }}" class="d-flex align-items-center text-start btn fw-medium w-full {{ (request()->routeIs("order") ? "btn-active" : "btn-non-active") }}">
                            <div style="width: 30px"><i class="fa-solid fa-cart-plus"></i></div>
                            <label>Create Order</label>
                        </a>
                        <a href="{{ route("history") }}" class="d-flex align-items-center text-start btn fw-medium w-full {{ (request()->routeIs("history") ? "btn-active" : "btn-non-active") }}">
                            <div style="width: 30px"><i class="fa-solid fa-clock-rotate-left"></i></div>
                            <label>History Order</label>
                        </a>
                    </div>
                </div>
            </div>

            <div class="p-4 border-top">
                <a href="" class="btn btn-outline-danger"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
            </div>
        </nav>
        <main class="p-4 bg-secondary bg-opacity-10">
            @yield("content")
        </main>
    </div>

    @yield("js")


    <script src="{{ asset("assets/bootstrap/js/bootstrap.bundle.min.js") }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if(session("success"))
    <script>
        Swal.fire({
            title: "Success!",
            icon: "success",
            text: "{{ session('success') }}",
            draggable: true
        });
    </script>
    @endif
</body>

</html>