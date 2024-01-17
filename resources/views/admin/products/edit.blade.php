<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Products
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('products.update', $product->id) }}" method="post" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="mb-5">
                            <div class="mb-3">
                                <label for="" class="form-label">Product name</label>
                                <input type="text" name="name" value="{{ $product->name }}" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Product price</label>
                                <input type="number" name="price" value="{{ $product->price }}" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Description</label>
                                <textarea name="description" class="form-control" cols="30" rows="10">{{ $product->description }}</textarea>
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
                            <div class="row">
                                <div class="col-auto">
                                    <a href="{{ route('products.index') }}" class="btn btn-secondary">Back</a>
                                </div>
                                <div class="col-auto">
                                    <button type="submit" class="btn btn-success">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
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
    </script>
</x-app-layout>
