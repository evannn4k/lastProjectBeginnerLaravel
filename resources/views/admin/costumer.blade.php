@extends("layout.admin-layout")

@section("content")

<div class="p-4 d-flex flex-column gap-4 bg-white rounded-4">
    <div class="d-flex justify-content-between align-items-end">
        <div class="">
            <h4>Costumer</h3>
                <h6>page for managing customer data</h6>
        </div>
        <div class="">
            <button class="btn btn-dark" type="button" data-bs-toggle="modal" data-bs-target="#formCreate"><i class="fa-solid fa-plus"></i> Add Costumer</button>
        </div>
    </div>
    <div class="w-full border d-flex flex-column rounded-4 align-items-center">
        <div class="p-3 w-100 d-flex">
            <form action="" class="d-flex gap-2">
                <input type="text" name="search" placeholder="Search..." class="form-control">
                <button class="btn btn-dark"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
        </div>

        <table class="table table-hover fs-6">
            <thead class="table-light">
                <tr>
                    <th class="text-secondary fw-normal" width="50px">No</th>
                    <th class="text-secondary fw-normal">Id Number</th>
                    <th class="text-secondary fw-normal">Name</th>
                    <th class="text-secondary fw-normal">Email</th>
                    <th class="text-secondary fw-normal">Gender</th>
                    <th class="text-secondary fw-normal">Total Payment</th>
                    <th class="text-secondary fw-normal">Total Order</th>
                    <th class="text-secondary fw-normal">Created At</th>
                    <th class="text-secondary fw-normal">Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                $no = 1;
                @endphp
                @forelse ($costumers as $costumer)

                <tr class="align-middle">
                    <td>{{ $no++ }}</td>
                    <td>{{ $costumer->id }}</td>
                    <td>{{ $costumer->name }}</td>
                    <td>{{ $costumer->email }}</td>
                    <td>{{ $costumer->gender }}</td>
                    <td>1</td>
                    <td>1</td>
                    <td>{{ $costumer->created_at }}</td>
                    <td>
                        <button
                            data-id="{{ $costumer->id }}"
                            data-name="{{ $costumer->name }}"
                            data-email="{{ $costumer->email }}"
                            data-gender="{{ $costumer->gender }}"
                            data-bs-toggle="modal"
                            data-bs-target="#formUpdate"
                            class="btn btn-outline-dark btn-sm update">Update</button>
                        <a href="{{ route("costumer.delete", parameters: $costumer->id) }}" class="btn btn-dark btn-sm">Delete</a>
                    </td>
                </tr>

                @empty

                <tr>
                    <td colspan="9" class="text-center">
                        <h6>empty data</h6>
                    </td>
                </tr>

                @endforelse
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="formCreate">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Create Costumer</h3>
                <button class="btn btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <form action="{{ route("costumer.create") }}" method="POST" id="formCreateCostumer">
                    @csrf
                    <div class="row">
                        <div class="py-2 col-12">
                            <label for="name" class="form-label">Name Costumer</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="add costumer name">
                        </div>
                        <div class="py-2 col-12">
                            <label for="email" class="form-label">Email Costumer</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="add costumer email">
                        </div>
                        <div class="py-2 col-12 d-flex flex-column">
                            <label for="name" class="form-label">Select Gender</label>
                            <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                <input type="radio" class="btn-check" name="gender" id="male" autocomplete="off" value="male" checked>
                                <label class="btn btn-outline-dark" for="male">Male</label>

                                <input type="radio" class="btn-check" name="gender" id="female" autocomplete="off" value="female">
                                <label class="btn btn-outline-dark" for="female">Female</label>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button class="btn btn-outline-dark" data-bs-dismiss="modal"><i class="fa-solid fa-x"></i> Close</button>
                <button class="btn btn-dark" form="formCreateCostumer"><i class="fa-solid fa-floppy-disk"></i> Save Category</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="formUpdate">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Update Costumer</h3>
                <button class="btn btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <form method="POST" id="formUpdateCostumer">
                    @csrf
                    <div class="row">
                        <div class="py-2 col-12">
                            <label for="nameUpdate" class="form-label">Name Costumer</label>
                            <input type="text" name="name" id="nameUpdate" class="form-control" placeholder="add costumer name">
                        </div>
                        <div class="py-2 col-12">
                            <label for="emailUpdate" class="form-label">Email Costumer</label>
                            <input type="email" name="email" id="emailUpdate" class="form-control" placeholder="add costumer email">
                        </div>
                        <div class="py-2 col-12 d-flex flex-column">
                            <label class="form-label">Select Gender</label>
                            <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                <input type="radio" class="btn-check" name="gender" id="maleUpdate" autocomplete="off" value="male" checked>
                                <label class="btn btn-outline-dark" for="maleUpdate">Male</label>

                                <input type="radio" class="btn-check" name="gender" id="femaleUpdate" autocomplete="off" value="female">
                                <label class="btn btn-outline-dark" for="femaleUpdate">Female</label>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button class="btn btn-outline-dark" data-bs-dismiss="modal"><i class="fa-solid fa-x"></i> Close</button>
                <button class="btn btn-dark" form="formUpdateCostumer"><i class="fa-solid fa-floppy-disk"></i> Save Category</button>
            </div>
        </div>
    </div>
</div>

<script>

document.querySelectorAll(".update").forEach(button => {
    button.addEventListener("click", function () {
        let action = "{{ route('costumer.update', ':id') }}"
        action = action.replace(":id", button.getAttribute("data-id"))

        document.getElementById("formUpdateCostumer").action = action
        document.getElementById("nameUpdate").value = button.getAttribute("data-name")
        document.getElementById("emailUpdate").value = button.getAttribute("data-email")
        if(button.getAttribute("data-gender") == "male") {
            document.getElementById("maleUpdate").checked = true
        } else if(button.getAttribute("data-gender") == "female") {
            document.getElementById("femaleUpdate").checked = true
        }
    })
})

</script>

@endsection