@extends("layout.admin-layout")

@section("content")

<div class="p-4 d-flex flex-column gap-4 bg-white rounded-4">
    <div class="d-flex justify-content-between align-items-end">
        <div class="">
            <h4>Product</h3>
                <h6>manage products in this store</h6>
        </div>
        <div class="">
            <button class="btn btn-dark" type="button" data-bs-toggle="modal" data-bs-target="#formCreate"><i class="fa-solid fa-plus"></i> Add Product</button>
        </div>
    </div>
    <div class="w-full border d-flex flex-column rounded-4 align-items-center">
        <div class="p-3 w-100 d-flex align-items-center justify-content-between">
            <div class="d-flex gap-3">
                <button class="btn btn-outline d-flex gap-2 align-items-center"> <i class="fa-solid fa-list"></i> Filter</button>
                <button class="btn btn-outline d-flex gap-2 align-items-center">All Status <i class="fa-solid fa-angle-down"></i></button>
            </div>
            <form action="" class="d-flex gap-2">
                <input type="text" name="search" placeholder="Search..." class="form-control">
                <button class="btn btn-dark"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
        </div>

        <table class="table table-hover fs-6">
            <thead class="table-light">
                <tr>
                    <th class="text-secondary fw-normal"></th>
                    <th class="text-secondary fw-normal">Image</th>
                    <th class="text-secondary fw-normal">Id Number</th>
                    <th class="text-secondary fw-normal">Name</th>
                    <th class="text-secondary fw-normal">Status</th>
                    <th class="text-secondary fw-normal">Price</th>
                    <th class="text-secondary fw-normal">Stock</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $product)

                <tr class="align-middle fw-medium" data-bs-toggle="collapse" data-bs-target="#detail{{ $product->id }}" role="button">
                    <td width="50px" class="text-center">
                        <input class="mx-auto" type="checkbox">
                    </td>
                    <td><img src="{{ asset("storage/images/product/$product->image") }}" alt="" height="35px" class="rounded-2 border"></td>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>
                        <label class="badge text-bg-{{ ($product->status == "Active") ? "primary" :(($product->status == "Out Of Stock") ? "danger" : (($product->status == "Draft") ? "warning" : (($product->status == "Discontinued") ? "secondary" : "" ))) }}">{{ $product->status }}</label>
                    </td>
                    <td>{{ Number::currency($product->price, "IDR") }}</td>
                    <td>{{ $product->stock }}</td>
                    <td width="50px">
                        <label>
                            <i class="fa-solid fa-angle-down"></i>
                        </label>
                    </td>
                </tr>

                <tr class="p-0 m-0">
                    <td colspan="8" class="p-0 m-0">
                        <div class="collapse" id="detail{{ $product->id }}">
                            <div class="container-fluid">
                                <div class="w-100 row">
                                    <div class="col-md-3 p-3">
                                        <div class="w-100 d-flex justify-content-center align-items-center">
                                            <img src="{{ asset("storage/images/product/$product->image") }}" alt="" class="img-fluid rounded-4 border" style="object-fit: contain;">
                                        </div>
                                    </div>

                                    <div class="col-md-3 p-3">
                                        <div class="w-100 d-flex flex-column">
                                            <div class="my-1">
                                                <label class="text-tertairy">Name Product</label>
                                                <p class="fw-medium">{{ $product->name }}</p>
                                            </div>
                                            <div class="my-1">
                                                <label class="text-tertairy">Category</label>
                                                <p class="fw-medium">{{ $product->category->name }}</p>
                                            </div>
                                            <div class="my-1">
                                                <label class="text-tertairy">Color</label>
                                                <p class="fw-medium">{{ $product->color }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 p-3">
                                        <div class="w-100 d-flex flex-column">
                                            <div class="my-1">
                                                <label class="text-tertairy">Price</label>
                                                <p class="fw-medium">{{ Number::currency($product->price, "IDR") }}</p>
                                            </div>
                                            <div class="my-1">
                                                <label class="text-tertairy">Stock</label>
                                                <p class="fw-medium">{{ $product->stock }}</p>
                                            </div>
                                            <div class="my-1">
                                                <label class="text-tertairy">Release Year</label>
                                                <p class="fw-medium">{{ $product->release_year }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 p-3">
                                        <div class="w-100 h-100 d-flex flex-column justify-content-between">
                                            <div class="d-flex flex-column">
                                                <div class="my-1">
                                                    <label class="text-tertairy">Status</label>
                                                    <br>
                                                    <p class="badge text-bg-{{ ($product->status == "Active") ? "primary" :(($product->status == "Out Of Stock") ? "danger" : (($product->status == "Draft") ? "warning" : (($product->status == "Discontinued") ? "secondary" : "" ))) }}">{{ $product->status }}</p>
                                                </div>
                                                <div class="my-1">
                                                    <label class="text-tertairy">Made In</label>
                                                    <p class="fw-medium">{{ $product->made_in }}</p>
                                                </div>
                                            </div>
                                            <div class="w-full d-flex justify-content-end gap-2">
                                                <a href="" class="btn btn-outline-dark">update</a>
                                                <a href="" class="btn btn-dark">delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">Create Product</h2>
                <button class="btn btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <form action="{{ route("product.create") }}" method="post" enctype="multipart/form-data" id="formCreateProduct">
                    @csrf
                    <div class="row">
                        <div class="py-2 col-12">
                            <label for="name" class="form-label">Name Product</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="add product name">
                        </div>
                        <div class="py-2 col-9">
                            <label for="price" class="form-label">Price Product</label>
                            <input type="number" name="price" id="price" class="form-control" placeholder="0">
                        </div>
                        <div class="py-2 col-3">
                            <label for="stock" class="form-label">Stock</label>
                            <input type="number" name="stock" id="stock" class="form-control" placeholder="0">
                        </div>
                        <div class="py-2 col-12">
                            <label for="category_id" class="form-label">Category Product</label>
                            <select name="category_id" id="category_id" class="form-select">
                                <option disabled selected>select category</option>
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="py-2 col-6">
                            <label for="release_year" class="form-label">Release Year</label>
                            <input type="number" min="1900" max="2100" name="release_year" id="release_year" class="form-control" placeholder="0">
                        </div>
                        <div class="py-2 col-6">
                            <label for="color" class="form-label">Color</label>
                            <input type="text" name="color" id="color" class="form-control" placeholder="color product">
                        </div>
                        <div class="py-2 col-6">
                            <label for="made_in" class="form-label">Made In</label>
                            <input type="text" name="made_in" id="made_in" class="form-control" placeholder="made in">
                        </div>
                        <div class="py-2 col-6">
                            <label for="status" class="form-label">Status</label>
                            <select name="status" id="status" class="form-select">
                                <option value="Active">Active</option>
                                <option value="Draft">Draft</option>
                                <option value="Discontinued">Discontinued</option>
                                <option value="Out Of Stock">Out Of Stock</option>
                            </select>
                        </div>
                        <div class="py-2 col-12">
                            <label for="image" class="form-label">Image</label>    
                            <input type="file" name="image" id="image" class="form-control">
                        </div>
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button class="btn btn-outline-dark" data-bs-dismiss="modal"><i class="fa-solid fa-x"></i> Close</button>
                <button class="btn btn-dark" form="formCreateProduct"><i class="fa-solid fa-floppy-disk"></i> Save Product</button>
            </div>
        </div>
    </div>
</div>

@endsection