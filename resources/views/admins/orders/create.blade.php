<title>Add new age</title>
<x-adminLayout>
    {{--------------- MAIN --------------}}
    <div class="p-3 bg-white rounded-5 shadow-3 mb-3">
        <div class="text-primary">
            <h4 class="fw-bold m-0">Ages Management</h4>
        </div>
    </div>

    <div class="bg-white border rounded-5 shadow-3 overflow-hidden">
        <div
            class="p-3 rounded-top border-bottom">
            <div class="text-primary">
                <i class="bi bi-plus-circle me-2"></i>Add new age
            </div>
        </div>
        {{-- FORM  --}}

        <form method="post" action="{{ route('admin.ages.store') }}" enctype="multipart/form-data"
              class="m-0">
            @csrf
            <!-- name input -->
            <div class="p-3 col-12  col-lg-6 col-xl-4">
                <div data-mdb-input-init class="form-outline">
                    <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}"
                           required/>
                    <label class="form-label" for="name">Age name</label>
                </div>
                @if ($errors->has('name'))
                    @foreach ($errors->get('name') as $error)
                        <span class="text-danger fs-7">{{ $error }}</span>
                    @endforeach
                @endif
            </div>

            <!-- description input -->
            <div class="p-3 col-12  col-lg-6 col-xl-4">
                <div data-mdb-input-init class="form-outline">
                    <textarea name="description" class="form-control">{{ old('name') }}</textarea>
                    <label class="form-label" for="description">Description</label>
                </div>
                @if ($errors->has('description'))
                    @foreach ($errors->get('description') as $error)
                        <span class="text-danger fs-7">{{ $error }}</span>
                    @endforeach
                @endif
            </div>

            <div class="d-flex justify-content-between justify-content-md-start border-top p-3">
                <a data-mdb-ripple-init href="{{ route('admin.ages') }}"
                   class="btn btn-secondary rounded-9 tran-2 me-3">
                    Back
                </a>
                <!-- Submit button -->
                <button data-mdb-ripple-init type="submit" class="btn btn-primary rounded-9 tran-2">
                    Save
                </button>
            </div>
        </form>
    </div>
</x-adminLayout>