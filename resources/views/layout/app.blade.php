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
    @yield("content")

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