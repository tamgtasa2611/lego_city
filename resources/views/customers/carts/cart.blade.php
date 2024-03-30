@vite(['resources/sass/app.scss', 'resources/js/app.js'])
<x-layout>
    <div id="cartParent">
        <div id="myCart"
             class="container d-flex align-items-center justify-content-between mt-5 min-vh-80 overflow-hidden">
            {{--        cart --}}
            <div class="w-70 d-flex justify-content-between flex-column">
                <div class="mb-3 border bg-white w-100 rounded d-flex align-items-center justify-content-center fs-5">
                    <div class="m-3">My shopping cart</div>
                </div>
                <div class="border bg-white w-100 rounded overflow-hidden">
                    {{--                top --}}
                    <div class="d-flex border-bottom align-items-center justify-content-center text-center">
                        <div class="w-50 p-2 px-3 text-start">Product</div>
                        <div class="w-10 p-2">Unit price</div>
                        <div class="w-10 p-2">Quantity</div>
                        <div class="w-10 p-2">Total price</div>
                        <div class="w-10 p-2">Action</div>
                    </div>
                    {{--                main cart --}}
                    <div>
                        @if (\Illuminate\Support\Facades\Session::get('cart') != null)
                            @foreach (\Illuminate\Support\Facades\Session::get('cart') as $product_id => $product)
                                <form class="m-0"
                                      action="{{ route('customer.products.updateCartQuantity', $product_id) }}">
                                    <div
                                        class="d-flex border-bottom align-items-center justify-content-center text-center">
                                        <div class="w-50 p-2 d-flex align-items-center">
                                            <div class="border rounded w-25 overflow-hidden">
                                                <a href="/product/{{ $product_id }}"
                                                   class="overflow-hidden ratio ratio-16x9 d-flex align-items-center justify-content-center">
                                                    <img src="{{ asset('storage/admin/products/'.$product['image'])}}"
                                                         class="w-100">
                                                </a>
                                            </div>
                                            <div class="w-75 text-start ps-3">
                                                <a href="/product/{{ $product_id }}"
                                                   class="text-decoration-none text-dark">
                                                    {{ $product['product_name'] }}
                                                </a>
                                            </div>
                                        </div>
                                        <div class="w-10 p-2 text-success">
                                            ${{ $product['price'] }}
                                        </div>
                                        <div class="w-10 p-2">
                                            <input type="number" name="buy_quantity" min="1"
                                                   value="{{ $product['quantity'] }}" class="form-control rounded-5"
                                                   onchange="this.form.submit()">
                                            @php
                                                $total_items[$product_id] = $product['quantity'];
                                            @endphp
                                        </div>
                                        <div class="w-10 p-2 text-success">
                                            ${{ $product['price'] * $product['quantity'] }}
                                            @php
                                                $amount[$product_id] = $product['price'] * $product['quantity'];
                                            @endphp
                                        </div>
                                        <div class="w-10 p-2">
                                            <a href="{{ route('customer.products.deleteFromCart', $product_id) }}"
                                               class="text-danger p-2 text-decoration-none">
                                                Remove
                                            </a>
                                        </div>
                                    </div>
                                </form>
                            @endforeach
                        @else
                            <div class="d-flex align-items-center justify-content-center flex-column min-vh-50">

                                Your cart is empty

                            </div>
                        @endif
                    </div>
                    {{--                bottom --}}
                    <div class="d-flex align-items-center justify-content-between text-center">
                        <div class="p-2 px-3 text-start">
                            <a href="{{ route('customer.product') }}"
                               class="text-decoration-none d-flex align-items-center">
                                <i class="bi bi-arrow-left me-2"></i>
                                Back to store
                            </a>
                        </div>
                        <div class="p-2 px-3">
                            <a href="{{ route('customer.products.deleteAllFromCart') }}"
                               class="text-danger text-decoration-none d-flex align-items-center">
                                Delete cart
                                <i class="bi bi-trash-fill ms-2"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            {{--        order summary --}}
            <div class="border w-25 bg-white rounded h-100">
                <div class="border-bottom w-100 d-flex align-items-center justify-content-center fs-5">
                    <div class="m-3">Order summary</div>
                </div>
                <div class="w-100 p-3">
                    <div class="mb-3">
                        <div class="mb-3 d-flex justify-content-between">
                            <div>
                                Total items
                            </div>
                            <div>
                                @if (\Illuminate\Support\Facades\Session::get('cart') != null)
                                    {{ array_sum($total_items) }}
                                @else
                                    0
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 d-flex justify-content-between">
                            <div>
                                Amount
                            </div>
                            <div class="text-success">
                                @if (\Illuminate\Support\Facades\Session::get('cart') != null)
                                    ${{ array_sum($amount) }}
                                @else
                                    $0
                                @endif
                            </div>
                        </div>
                    </div>
                    @if (\Illuminate\Support\Facades\Session::get('cart') != null)
                        <div class="d-flex align-items-center justify-content-center">
                            <a class="btn btn-primary rounded-5" href="{{ route('checkout') }}">
                                Continue to checkout
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

</x-layout>
<script src="{{ asset('frontend/js/product.js') }}"></script>
