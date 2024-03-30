<title>Edit product information</title>
<x-adminLayout>
    {{--------------- MAIN --------------}}
    <div class="p-3 bg-white rounded-5 shadow-3 mb-3">
        <div class="text-primary">
            <h4 class="fw-bold m-0">Products Management</h4>
        </div>
    </div>

    <div class="bg-white border rounded-5 shadow-3 overflow-hidden">
        <div
            class="p-3 rounded-top border-bottom">
            <div class="text-primary">
                <i class="bi bi-pencil-square me-2"></i>Edit product
            </div>
        </div>
        {{-- FORM  --}}

        <form method="post" action="{{ route('admin.products.update', $product) }}" enctype="multipart/form-data"
              class="m-0">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-12 col-lg-6">
                    <!-- name input -->
                    <div data-mdb-input-init class="p-3 pb-0 d-flex align-items-center justify-content-between">
                        <label class="w-25" for="name">Product name</label>
                        <input type="text" id="name" name="name" class=" form-control"
                               value="{{ $product->name }}"
                               required/>

                    </div>
                    @if ($errors->has('name'))
                        @foreach ($errors->get('name') as $error)
                            <span class="text-danger fs-7">{{ $error }}</span>
                        @endforeach
                    @endif
                    <!-- price input -->
                    <div data-mdb-input-init class="p-3 pb-0 d-flex align-items-center justify-content-between">
                        <label class="w-25" for="price">Price</label>
                        <input type="number" id="price" name="price" class="form-control"
                               value="{{ $product->price }}"
                               required/>

                    </div>
                    @if ($errors->has('price'))
                        @foreach ($errors->get('price') as $error)
                            <span class="text-danger fs-7">{{ $error }}</span>
                        @endforeach
                    @endif
                    <!-- quantity input -->
                    <div data-mdb-input-init class="p-3 pb-0 d-flex align-items-center justify-content-between">
                        <label class="w-25" for="quantity">Quantity</label>
                        <input type="text" id="quantity" name="quantity" class="form-control"
                               value="{{ $product->quantity }}"
                               required/>

                    </div>
                    @if ($errors->has('quantity'))
                        @foreach ($errors->get('quantity') as $error)
                            <span class="text-danger fs-7">{{ $error }}</span>
                        @endforeach
                    @endif
                    <!-- description input -->
                    <div data-mdb-input-init class="p-3 pb-0 d-flex align-items-center justify-content-between">
                        <label class="w-25" for="description">Description</label>
                        <input type="text" id="description" name="description" class=" form-control"
                               value="{{ $product->description }}"
                               required/>

                    </div>
                    @if ($errors->has('description'))
                        @foreach ($errors->get('description') as $error)
                            <span class="text-danger fs-7">{{ $error }}</span>
                        @endforeach
                    @endif
                </div>

                <div class="col-12 col-lg-6">
                    <!-- brand input -->
                    <div data-mdb-input-init class="p-3 pb-0 d-flex align-items-center">
                        <label class="me-3 w-25" for="brand">Brand</label>
                        <select name="brand_id" id="brand" class="form-select" required>
                            @foreach($brands as $brand)
                                <option
                                    value="{{$brand->id}}" {{$product->brand_id == $brand->id ? 'selected' : ''}}>{{$brand->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    @if ($errors->has('brand'))
                        @foreach ($errors->get('brand') as $error)
                            <span class="text-danger fs-7">{{ $error }}</span>
                        @endforeach
                    @endif

                    <!-- product input -->
                    <div data-mdb-input-init class="p-3 pb-0 d-flex align-items-center">
                        <label class="me-3 w-25" for="category">Category</label>
                        <select name="category_id" id="category" class="form-select" required>
                            @foreach($categories as $category)
                                <option
                                    value="{{$category->id}}"{{$product->category_id == $category->id ? 'selected' : ''}}>{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    @if ($errors->has('category'))
                        @foreach ($errors->get('category') as $error)
                            <span class="text-danger fs-7">{{ $error }}</span>
                        @endforeach
                    @endif

                    <!-- age input -->
                    <div data-mdb-input-init class="p-3 pb-0 d-flex align-items-center">
                        <label class="me-3 w-25" for="age">Age</label>
                        <select name="age_id" id="age" class="form-select" required>
                            @foreach($ages as $age)
                                <option
                                    value="{{$age->id}}"{{$product->age_id == $age->id ? 'selected' : ''}}>{{$age->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    @if ($errors->has('age'))
                        @foreach ($errors->get('age') as $error)
                            <span class="text-danger fs-7">{{ $error }}</span>
                        @endforeach
                    @endif

                    <div class="p-3">
                        {{--            image input--}}
                        <input type="file" class="form-control" id="image" name="image"/>
                        @if ($errors->has('image'))
                            @foreach ($errors->get('image') as $error)
                                <span class="text-danger fs-7">{{ $error }}</span>
                            @endforeach
                        @endif
                    </div>
                    <div class="col-12 col-lg-6 col-xl-4">
                        <div class="p-3 pt-0 w-100">
                            Current image
                            <img
                                src="{{ $product->image != "" ? asset('storage/admin/products/' . $product->image) : asset('images/noimage.jpg') }}"
                                alt="product_img"
                                class="img-fluid rounded-5 border">
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-between justify-content-md-start border-top p-3">
                <a data-mdb-ripple-init href="{{ route('admin.products') }}"
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
