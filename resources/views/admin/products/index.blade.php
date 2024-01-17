<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Products
            </h2>
            <button class="btn btn-info text-light" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Add Product
            </button>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col" class="text-center"></th>
                                <th scope="col">Last</th>
                                <th scope="col">Handle</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $i => $product)
                                <tr>
                                    <th scope="row">{{ $i + 1 }}</th>
                                    <td class="text-center">
                                        <img class="text-center" src="{{ url($product->image) }}" width="100"
                                            alt="">
                                    </td>
                                    <td>{{ $product->name }}</td>
                                    <td>Rp {{ $product->price }}</td>
                                    <td>
                                        <div class="row">
                                            <div class="col-auto">
                                                <a href="{{ route('products.edit', $product->id) }}"
                                                    class="btn btn-warning">Edit</a>
                                            </div>
                                            <div class="col-auto">
                                                <button type="button" onclick="deleteProduct({{ $product->id }})" class="btn btn-danger">Delete</button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" tabindex="-1" id="exampleModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="" class="form-label">Product name</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Product price</label>
                            <input type="number" name="price" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Description</label>
                            <textarea name="description" class="form-control" cols="30" rows="10"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Image</label>
                            <input type="file" name="image" id="input-file" class="form-control">
                        </div>
                        <div class="text-center">
                            <img id="newavatar" class="text-center" style="display: none" width="200"
                                alt="Upload Foto">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        $('#input-file').change(function() {
            const file = this.files[0];

            if (file) {
                let reader = new FileReader();
                reader.onload = function(event) {
                    console.log(event.target.result);
                    $('#newavatar').css('display', 'block');
                    $('#newavatar').attr('src', event.target.result);
                }
                reader.readAsDataURL(file);
            }
        });

        function deleteProduct(id) {
            Swal.fire({
                title: 'Are you sure?',
                icon: 'info',
                confirmButtonText: 'Yes!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: `/admin/products/${id}`,
                        type: 'delete',
                        // method: 'delete',
                        success: function(data) {
                            if (data.status === 'ok') {
                                Swal.fire(
                                    'Success!',
                                    'Success remove product!',
                                    'success'
                                ).then(() => window.location.reload())
                            } else {
                                Swal.fire(
                                    'Sorry!',
                                    'Data somethink when wrong',
                                    'info'
                                ).then(() => window.location.reload())
                            }
                        }
                    })
                }
            })
        }
    </script>
</x-app-layout>
