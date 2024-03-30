@vite(["resources/sass/app.scss", "resources/js/app.js"])
<x-layout>
    <div class="container d-flex align-items-center justify-content-between px-0 mt-5 min-vh-80 overflow-hidden">
        {{--   cart --}}
        <div class="border w-45 bg-white rounded h-100">
            @foreach(\Illuminate\Support\Facades\Session::get('cart') as $product_id => $product)
                <div class="w-100 d-flex border-bottom align-items-center justify-content-center text-center">
                    <div class="w-75 p-3 d-flex align-items-center">
                        <div class="border rounded w-25 overflow-hidden">
                            <a href="/product/{{$product_id}}"
                               class="overflow-hidden ratio ratio-16x9 d-flex align-items-center justify-content-center">
                                <img src="{{asset('storage/admin/products/'.$product['image'])}}"
                                     class="img-fluid">
                            </a>
                        </div>
                        <div class="w-75 text-start ps-3">
                            <a href="/product/{{$product_id}}"
                               class="text-decoration-none text-dark">
                                {{$product['product_name']}}
                            </a>
                            <div class="text-secondary fst-italic">
                                x {{$product['quantity']}}
                            </div>
                        </div>
                    </div>
                    <div class="w-25 p-3 text-success text-end">
                        ${{$product['price']}}
                    </div>

                    @php
                        $total_items[$product_id] = $product['quantity'];
                        $amount[$product_id] = $product['price'] * $product['quantity'];
                    @endphp
                </div>
            @endforeach
        </div>

        {{--    PAY --}}
        <div class="w-50 d-flex justify-content-between flex-column">
            <div class="border bg-white w-100 rounded overflow-hidden">
                <form action="" method="post" class="p-3">
                    @csrf
                    <div class="text-center fw-bold fs-5 mb-3">
                        Receiver information
                    </div>
                    <div class="mb-3 input-group justify-content-between">
                        <div class="w-50">
                            <label for="receiver_name" class="form-label">Receiver name</label>
                            <input type="text" class="form-control" name="receiver_name" id="receiver_name"
                                   value="{{$customer->first_name . ' ' . $customer->last_name}}">
                        </div>
                        <div class="w-45">
                            <label for="receiver_phone" class="form-label">Receiver phone</label>
                            <input type="text" class="form-control" name="receiver_phone" id="receiver_phone"
                                   value="{{$customer->phone_number}}">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="receiver_address" class="form-label">Receiver address</label>
                        <input type="text" class="form-control" name="receiver_address" id="receiver_address"
                               value="{{$customer->address}}">
                    </div>
                    <div class="d-flex justify-content-end mb-1">
                        <div>
                            Total items: {{array_sum($total_items)}}
                        </div>
                    </div>
                    <div class="d-flex justify-content-end mb-1">
                        <div>
                            Amount: ${{array_sum($amount)}}
                        </div>
                    </div>
                    <div class="d-flex justify-content-end mb-1">
                        <div>
                            Shipping: Free
                        </div>
                    </div>
                    <div class="d-flex justify-content-end mb-1">
                        <div class="fw-bold fs-5">
                            Total: ${{array_sum($amount)}}
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <button class="btn btn-primary rounded-5" style="transition: all 0.2s ease-in-out">
                            Pay on delivery
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>
