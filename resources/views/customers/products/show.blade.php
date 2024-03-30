@vite(['resources/sass/app.scss', 'resources/js/app.js'])
<x-layout>
    <div class="container mt-5">
        {{-- alert --}}
        <div class="mt-5" id="alertDiv">
            @if (session('success'))
                @include('partials.flashMsgSuccessCenter')
            @endif
            @if (session('failed'))
                @include('partials.flashMsgFailCenter')
            @endif
        </div>
        {{--        main--}}
        <div class="bg-white shadow-3 h-75 rounded-5 d-flex justify-content-center align-items-center">
            {{--       IMG --}}
            <div class="w-50 d-flex align-items-center justify-content-center h-100 overflow-hidden">
                <img src="{{ asset('storage/admin/products/'.$product->image) }}" alt="product_image" class="h-75">
            </div>
            {{--        MAIN --}}
            <div class="w-50 h-100 p-3 d-flex flex-column justify-content-center">
                <div>
                    {{--            HEADING --}}
                    <div class="w-100 d-flex justify-content-between align-items-center mb-3">
                        <div class="fs-4 fw-bold text-capitalize w-75">{{ $product->name }}</div>
                        <div class="d-flex">
                            <div class="badge badge-warning rounded-pill">{{ $product->category->name }}</div>
                            <div class="badge badge-success rounded-pill ms-3">{{ $product->age->name }}</div>
                            <div class="badge badge-light rounded-pill ms-3">{{ $product->brand->name }}</div>
                        </div>
                    </div>
                    <hr>
                    {{--            BODY --}}
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="fs-5 fw-bold text-success">
                            ${{ $product->price }}
                        </div>
                        <div>
                            {{$product->quantity}} left in stock
                        </div>
                    </div>
                    <div class="mb-3">
                        <p class="text-justify overflow-y-auto">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore
                            et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
                            nisi
                            ut
                            aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit
                            esse
                            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt
                            in
                            culpa qui officia deserunt mollit anim id est laborum.
                        </p>
                    </div>
                </div>
                <hr>
                {{-- BUTTON --}}
                <form action="" class="d-flex justify-content-between align-items-center w-100 m-0">
                    <div class="d-flex align-items-center w-25">
                        <a href="{{ route('customer.product') }}"
                           class="btn btn-tertiary d-flex align-items-center">
                            <i class="bi bi-arrow-left me-2"></i>
                            Back
                        </a>
                    </div>
                    <div class="w-75 d-flex justify-content-end">
                        <a class="btn btn-secondary rounded-9"
                           href="{{route('customer.products.addToCartAjax', $product->id)}}">
                            <i class="p-2 bi bi-cart"></i>
                            <span class="pe-2">Add to cart</span>
                        </a>
                        <a class="btn btn-primary rounded-9 ms-3"
                           href="{{ route('customer.products.addToCart', $product->id) }}">
                            <i class="p-2 bi bi-bag"></i>
                            <span class="pe-2">Buy now</span>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>
<script src="{{ asset('frontend/js/product.js') }}"></script>
