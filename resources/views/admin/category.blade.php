@extends("layout.admin-layout")

@section("content")

<div class="p-4 d-flex flex-column gap-4 bg-white rounded-4 w-75">
    <div class="d-flex justify-content-between align-items-end">
        <div class="">
            <h4>Category</h3>
                <h6>Page to manage product categories in this store</h6>
        </div>
        <div class="">
            <button class="btn btn-dark" type="button" data-bs-toggle="modal" data-bs-target="#formCreate"><i class="fa-solid fa-plus"></i> Add Category</button>
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
                    <th class="text-secondary fw-normal">Total Product</th>
                    <th class="text-secondary fw-normal">Created At</th>
                    <th class="text-secondary fw-normal">Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                $no = 1;
                @endphp
                @forelse ($categories as $category)

                <tr class="align-middle">
                    <td>{{ $no++ }}</td>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->products_count }}</td>
                    <td>{{ $category->created_at }}</td>
                    <td>
                        <button
                            data-id="{{ $category->id }}"
                            data-name="{{ $category->name }}"
                            data-bs-toggle="modal"
                            data-bs-target="#formUpdate"
                            class="btn btn-outline-dark btn-sm update">Update</button>
                        <a href="{{ route("category.delete", $category->id) }}" class="btn btn-dark btn-sm">Delete</a>
                    </td>
                </tr>

                @empty

                <tr>
                    <td colspan="8" class="text-center">
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
                <h3>Create Category</h3>
                <button class="btn btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <form action="{{ route("category.create") }}" method="POST" id="formCreateCategory">
                    @csrf
                    <div class="row">
                        <div class="py-2 col-12">
                            <label for="category" class="form-label">Name Category</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="add product category">
                        </div>
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button class="btn btn-outline-dark" data-bs-dismiss="modal"><i class="fa-solid fa-x"></i> Close</button>
                <button class="btn btn-dark" form="formCreateCategory"><i class="fa-solid fa-floppy-disk"></i> Save Category</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="formUpdate">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Update Category</h3>
                <button class="btn btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <form action="" method="POST" id="formUpdateCategory">
                    @csrf
                    <div class="row">
                        <div class="py-2 col-12">
                            <label for="nameUpdate" class="form-label">Name Category</label>
                            <input type="text" name="name" id="nameUpdate" class="form-control" placeholder="add product category">
                        </div>
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button class="btn btn-outline-dark" data-bs-dismiss="modal"><i class="fa-solid fa-x"></i> Close</button>
                <button class="btn btn-dark" form="formUpdateCategory"><i class="fa-solid fa-floppy-disk"></i> Save Category</button>
            </div>
        </div>
    </div>
</div>

<script>
    document.querySelectorAll(".update").forEach(button => {
        button.addEventListener("click", () => {
            let action = "{{ route('category.update', ':id') }}"
            action = action.replace(":id", button.getAttribute("data-id"))

            document.getElementById("formUpdateCategory").action = action
            document.getElementById("nameUpdate").value = button.getAttribute("data-name")
        })
    })
</script>

@endsection