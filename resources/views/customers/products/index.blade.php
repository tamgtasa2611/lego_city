@vite(['resources/sass/app.scss', 'resources/js/app.js'])
<x-layout>
    {{-- alert --}}
    <div id="alertDiv" class="position-absolute start-0 end-0 w-100 text-center tran-2">
        @if (session('success'))
            @include('partials.flashMsgSuccessCenter')
        @endif
        @if (session('failed'))
            @include('partials.flashMsgFailCenter')
        @endif
    </div>
    <div class="d-flex justify-content-center align-items-center py-4">
        <h2 class="m-0 text-primary fw-bold badge badge-primary rounded-pill fs-2">
            {{ $search != '' ? 'Search results for "' . $search . '"' : 'All Products' }}
        </h2>
    </div>
    <div class="d-flex justify-content-center">
        <div class="container">
            <div class="bg-white shadow-3 py-3 rounded-5 border overflow-hidden">
                <div class="w-100 d-flex justify-content-between align-items-center border-bottom pb-3">
                    {{--                filter --}}
                    <form action="" class="d-flex m-0 px-3 justify-content-start align-items-center w-50">
                        <div class="d-flex justify-content-between">
                            {{--              price --}}
                            <div class="dropdown">
                                <button class="dropdown-toggle d-flex align-items-center rounded-9 btn btn-tertiary"
                                        type="button" id="price_filter" data-mdb-dropdown-init data-mdb-ripple-init
                                        data-mdb-auto-close="outside" aria-expanded="false">
                                    <div>
                                        Price
                                    </div>
                                </button>
                                <ul class="dropdown-menu border shadow-3 " aria-labelledby="price_filter">
                                    <li>
                                        <a class="dropdown-item p-2" href="#" role="button">
                                            <input type="number" class="form-control" name="price_1" id="price_1"
                                                   step="0.01" value="{{ $f_price_1 != 0 ? $f_price_1 : '' }}"
                                                   min="0" placeholder="Start price">
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item p-2" href="#" role="button">
                                            <input type="number" class="form-control" name="price_2" id="price_2"
                                                   step="0.01" value="{{ $f_price_2 != 9999 ? $f_price_2 : '' }}"
                                                   min="0" placeholder="End price">
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            {{--              brand --}}
                            <div class="dropdown">
                                <button
                                    class="dropdown-toggle d-flex align-items-center rounded-9 btn btn-tertiary ms-3"
                                    type="button" id="brand_filter" data-mdb-dropdown-init data-mdb-ripple-init
                                    data-mdb-auto-close="outside" aria-expanded="false">
                                    <div>
                                        Brand
                                    </div>
                                </button>

                                <ul class="dropdown-menu border shadow-3 " aria-labelledby="brand_filter">
                                    @foreach ($brands as $brand)
                                        <li>
                                            <a class="dropdown-item p-2" href="#" role="button">
                                                <div class="form-check">
                                                    <input class="form-check-input h-pointer" type="checkbox"
                                                           name="brand[]" id="brand_{{ $brand->id }}"
                                                           value="{{ $brand->id }}"
                                                        {{ in_array($brand->id, $f_brand) ? 'checked' : '' }}>
                                                    <label class="form-check-label h-pointer w-100"
                                                           for="brand_{{ $brand->id }}">
                                                        {{ $brand->name }}
                                                    </label>
                                                </div>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            {{--              category --}}
                            <div class="dropdown">
                                <button
                                    class="dropdown-toggle d-flex align-items-center rounded-9 btn btn-tertiary ms-3"
                                    type="button" id="category_filter" data-mdb-dropdown-init data-mdb-ripple-init
                                    data-mdb-auto-close="outside" aria-expanded="false">
                                    <div>
                                        Category
                                    </div>
                                </button>
                                <ul class="dropdown-menu border shadow-3 " aria-labelledby="category_filter">
                                    @foreach ($categories as $category)
                                        <li>
                                            <a class="dropdown-item p-2" href="#" role="button">
                                                <div class="form-check">
                                                    <input class="form-check-input h-pointer" type="checkbox"
                                                           name="category[]" id="category_{{ $category->id }}"
                                                           value="{{ $category->id }}"
                                                        {{ in_array($category->id, $f_category) ? 'checked' : '' }}>
                                                    <label class="form-check-label w-100 h-pointer"
                                                           for="category_{{ $category->id }}">
                                                        {{ $category->name }}
                                                    </label>
                                                </div>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            {{--              Age --}}
                            <div class="dropdown">
                                <button
                                    class="dropdown-toggle d-flex align-items-center rounded-9 btn btn-tertiary ms-3"
                                    type="button" id="age_filter" data-mdb-dropdown-init data-mdb-ripple-init
                                    data-mdb-auto-close="outside" aria-expanded="false">
                                    <div>
                                        Age
                                    </div>
                                </button>
                                <ul class="dropdown-menu border shadow-3 " aria-labelledby="age_filter">
                                    @foreach ($ages as $age)
                                        <li>
                                            <a class="dropdown-item p-2" href="#" role="button">
                                                <div class="form-check">
                                                    <input class="form-check-input h-pointer" type="checkbox"
                                                           name="age[]" id="age_{{ $age->id }}"
                                                           value="{{ $age->id }}"
                                                        {{ in_array($age->id, $f_age) ? 'checked' : '' }}>
                                                    <label class="form-check-label w-100 h-pointer"
                                                           for="age_{{ $age->id }}">
                                                        {{ $age->name }}
                                                    </label>
                                                </div>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>

                            <button class="btn btn-light rounded ms-3"><i class="bi bi-funnel"></i></button>

                            <a class="btn btn-light rounded ms-3 d-flex align-items-center"
                               href="{{ route('customer.product') }}">
                                <i class="bi bi-arrow-clockwise"></i></a>
                        </div>
                    </form>
                    {{-- SORTING --}}
                    <form action="" class="w-25 m-0 d-flex align-items-center justify-content-end">
                        {{--                select --}}
                        <label for="sorting" class="px-3">
                            Sort by
                        </label>
                        <select class="form-select rounded w-auto" aria-label="sorting" id="sorting"
                                name="sorting" onchange="this.form.submit()">
                            <option value="default" {{ $sorting == 'default' ? 'selected' : '' }}>Default
                            </option>
                            <option value="newest" {{ $sorting == 'newest' ? 'selected' : '' }}>Newest
                            </option>
                            <option value="bestseller" {{ $sorting == 'bestseller' ? 'selected' : '' }}>
                                Bestseller
                            </option>
                            <option value="low_to_high" {{ $sorting == 'low_to_high' ? 'selected' : '' }}>
                                Price: Low to High
                            </option>
                            <option value="high_to_low" {{ $sorting == 'high_to_low' ? 'selected' : '' }}>
                                Price: High to Low
                            </option>
                        </select>

                        {{--                lay giay tri search --}}
                        <input type="hidden" class="invisible" name="search" value="{{ $search }}">
                        {{--                lay gia tri filter      --}}
                        <input type="hidden" class="invisible" name="price_1" value="{{ $f_price_1 }}">
                        <input type="hidden" class="invisible" name="price_2" value="{{ $f_price_2 }}">
                        @foreach ($f_brand as $brand_value)
                            <input type="hidden" class="invisible" name="brand[]"
                                   value="{{ is_array($brand_value) ? implode($brand_value) : $brand_value }}">
                        @endforeach
                        @foreach ($f_category as $category_value)
                            <input type="hidden" class="invisible" name="category[]"
                                   value="{{ is_array($category_value) ? implode($category_value) : $category_value }}">
                        @endforeach
                        @foreach ($f_age as $age_value)
                            <input type="hidden" class="invisible" name="age[]"
                                   value="{{ is_array($age_value) ? implode($age_value) : $age_value }}">
                        @endforeach
                    </form>
                    {{-- SEARCH --}}
                    <form action="" class="w-25 px-3 m-0 d-flex align-items-center">
                        {{--                        search --}}
                        <div class="input-group">
                            <div class="form-outline" data-mdb-input-init>
                                <input type="search" id="search" class="form-control" name="search"
                                       value="{{ $search }}"/>
                                <label class="form-label" for="search">Search</label>
                            </div>
                            <button type="submit" class="btn btn-primary" data-mdb-ripple-init>
                                <i class="bi bi-search"></i>
                            </button>
                        </div>

                        {{--                lay gia tri filter      --}}
                        <input type="hidden" class="invisible" name="price_1" value="{{ $f_price_1 }}">
                        <input type="hidden" class="invisible" name="price_2" value="{{ $f_price_2 }}">
                        @foreach ($f_brand as $brand_value)
                            <input type="hidden" class="invisible" name="brand[]"
                                   value="{{ is_array($brand_value) ? implode($brand_value) : $brand_value }}">
                        @endforeach
                        @foreach ($f_category as $category_value)
                            <input type="hidden" class="invisible" name="category[]"
                                   value="{{ is_array($category_value) ? implode($category_value) : $category_value }}">
                        @endforeach
                        @foreach ($f_age as $age_value)
                            <input type="hidden" class="invisible" name="age[]"
                                   value="{{ is_array($age_value) ? implode($age_value) : $age_value }}">
                        @endforeach
                    </form>
                </div>
                {{--        MAIN --}}
                <div class="d-flex mt-3">
                    {{-- PRODUCT --}}
                    <div class="w-100">
                        {{--                PRODUCT LIST --}}
                        <div class="container">
                            <div class="row h-auto row-cols-4">
                                @foreach ($products as $product)
                                    <div class="col h-100 pb-3 pt-0">
                                        <div class="border shadow-3 rounded-5">
                                            <a href="{{ route('customer.product.detail', $product->id) }}">
                                                <div
                                                    class="overflow-hidden d-flex align-items-center justify-content-center bg-light-subtle rounded-5 overflow-hidden hover-zoom"
                                                    style="height: 160px">
                                                    <img src="{{ asset('storage/admin/products/'.$product->image) }}"
                                                         alt=""
                                                         class="w-100 tran-2">
                                                </div>
                                            </a>
                                            <div class="p-3">
                                                <div class="fw-bold mb-3 text-truncate w-100">
                                                    <a href="{{ route('customer.product.detail', $product->id) }}"
                                                       class="text-reset">
                                                        {{ $product->name }}
                                                    </a>
                                                </div>
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="text-success">${{ $product->price }}</div>
                                                    <div>
                                                        @auth('customer')
                                                            <a href="#"
                                                               class="btn btn-primary tran-2 rounded-9 addToCartAjax"
                                                               data-id={{$product->id}}>
                                                                Add to cart
                                                            </a>
                                                        @endauth
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        {{--                    pagination --}}
                        <div class="p-3 pb-0 border-top">
                            {{ $products->onEachSide(2)->links() }}
                        </div>
                    </div>
                    {{-- END PRODUCT --}}
                </div>
            </div>
        </div>
    </div>
</x-layout>
<script src="{{ asset('frontend/js/product.js') }}"></script>
