<title>Edit category information</title>
<x-adminLayout>
    {{--------------- MAIN --------------}}
    <div class="p-3 bg-white rounded-5 shadow-3 mb-3">
        <div class="text-primary">
            <h4 class="fw-bold m-0">Categories Management</h4>
        </div>
    </div>

    <div class="bg-white border rounded-5 shadow-3 overflow-hidden">
        <div
            class="p-3 rounded-top border-bottom">
            <div class="text-primary">
                <i class="bi bi-pencil-square me-2"></i>Edit category
            </div>
        </div>
        {{-- FORM  --}}

        <form method="post" action="{{ route('admin.categories.update', $category) }}" enctype="multipart/form-data"
              class="m-0">
            @csrf
            @method('PUT')
            <!-- name input -->
            <div class=" col-12  col-lg-6">
                <div data-mdb-input-init class="p-3 pb-0 d-flex align-items-center">
                    <label class="w-25 me-3" for="name">Name</label>
                    <input type="text" id="name" name="name" class="form-control"
                           value="{{ $category->name }}" required/>
                </div>
                @if ($errors->has('name'))
                    @foreach ($errors->get('name') as $error)
                        <span class="text-danger fs-7">{{ $error }}</span>
                    @endforeach
                @endif
            </div>

            {{--            image input--}}
            <div class="p-3 col-12 col-lg-6 ">
                <input type="file" class="form-control" id="image" name="image"/>
                @if ($errors->has('image'))
                    @foreach ($errors->get('image') as $error)
                        <span class="text-danger fs-7">{{ $error }}</span>
                    @endforeach
                @endif
            </div>

            <div class="col-12 col-lg-6">
                <div class="p-3 pt-0 w-50">
                    <img
                        src="{{ $category->image != "" ? asset('storage/admin/categories/' . $category->image) : asset('images/noimage.jpg') }}"
                        alt="guest_image"
                        class="img-fluid rounded-9 border">
                </div>
            </div>

            <div class="d-flex justify-content-between justify-content-md-start border-top p-3">
                <a data-mdb-ripple-init href="{{ route('admin.categories') }}"
                   class="btn btn-secondary rounded-9 tran-2 me-3">
                    Back
                </a>
                <!-- Submit button -->
                <button data-mdb-ripple-init type="submit" class="btn btn-primary rounded-9 tran-2">
                    Update
                </button>
            </div>
        </form>

    </div>

</x-adminLayout>
