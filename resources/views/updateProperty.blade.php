<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Property Create
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('property.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Name</label>
                                    <div class="form-icon position-relative">
                                        <i data-feather="book" class="fea icon-sm icons"></i>
                                        <input name="name" id="name" class="form-control ps-5"
                                            placeholder="Your subject :" value="{{ $data->name }}">
                                    </div>
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Price</label>
                                    <div class="form-icon position-relative">
                                        <i data-feather="airplay" class="fea icon-sm icons"></i>
                                        <input name="price" id="price" type="number" class="form-control ps-5"
                                            placeholder="Your subject :" value="{{ $data->price }}">
                                    </div>
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Image</label>
                                    <div class="form-icon position-relative">
                                        <input name="image" id="image" type="file" class="form-control ps-5"
                                            onchange="previewImage(event)">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <img id="preview" src="{{ asset('storage/images/' . $data->image) }}" alt="Preview"
                                    style="max-width: 200px; max-height: 200px;">
                            </div>
                        </div>
                        <!--end row-->
                        <div class="row">
                            <div class="col-sm-12">
                                <button class="btn btn-primary" type="submit">Update</button>
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('preview');
                output.src = reader.result;
                output.style.display = 'block';
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
</x-app-layout>
