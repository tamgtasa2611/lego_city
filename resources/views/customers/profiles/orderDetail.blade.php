@vite(["resources/sass/app.scss", "resources/js/app.js"])
<x-layout>
    <div class="container d-flex align-items-center h-80 mt-5  overflow-hidden">
        <div class="border w-20 rounded-start p-3 h-100">
            @include('partials/profile_menu')
        </div>
        <div class="bg-white border w-80 rounded-end p-3 h-100 d-flex flex-column justify-content-between">
            <div class="d-flex justify-content-between">
                <div class="fs-5">
                    Order #{{$order->id}}
                </div>
                <div class="d-flex align-items-center">
                    <span class="me-3">Status:</span>
                    @switch($order->status)
                        @case(0)
                            <span class="text-danger fw-bold">Pending</span>
                            @break
                        @case(1)
                            <span class="text-success fw-bold">Confirmed</span>
                            @break
                        @case(2)
                            <span class="text-primary fw-bold">Delivery</span>
                            @break
                        @case(3)
                            <span class="text-success fw-bold">Completed</span>
                            @break
                        @case(4)
                            <span class="text-danger fw-bold">Cancelled</span>
                            @break
                    @endswitch
                </div>
            </div>
            <hr>
            <div class="d-flex w-100 h-100 flex-column ">
                <div class="flex-fill d-flex justify-content-between mb-3">
                    <div class="w-50 h-100 d-flex flex-column me-3">
                        <div class="w-100 border rounded mb-3 p-3">
                            <div class="d-flex justify-content-between">Date
                                <div>{{$order->date}}</div>
                            </div>
                            <div class="d-flex justify-content-between">Receiver name
                                <div>{{$order->receiver_name}}</div>
                            </div>
                            <div class="d-flex justify-content-between">Receiver phone
                                <div>{{$order->receiver_phone}}</div>
                            </div>
                            <div class="d-flex justify-content-between">Receiver address
                                <div>{{$order->receiver_address}}</div>
                            </div>
                        </div>
                        <div class=" w-100 border rounded p-3">
                            <div class="d-flex justify-content-between">Total items
                                <div>{{$order_item}} items</div>
                            </div>
                            <div class="d-flex justify-content-between">Amount
                                <div>${{$order_amount}}</div>
                            </div>
                            <div class="d-flex justify-content-between">Shipping
                                <div>$10.00</div>
                            </div>
                            <div class="d-flex justify-content-between">Total price
                                <div>${{$order_total}}</div>
                            </div>
                            <div class="d-flex justify-content-between">Payment method
                                <div>Pay on delivery</div>
                            </div>
                        </div>
                    </div>
                    <div class="w-50 border rounded p-3 overflow-y-auto" style="height: 314px">
                        @foreach($order_details as $detail)
                            <div class="d-flex mb-3 ">
                                <div class="border rounded p-3 object-fit-fill
                             overflow-hidden w-25 me-3">
                                    <img src="{{asset('storage/admin/products/'.$detail->image)}}" width="80px"
                                         height="80px">
                                </div>
                                <div class="flex-fill d-flex flex-column justify-content-between">
                                    <div>
                                        {{$detail->name}}
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            ${{$detail->sold_price}}
                                        </div>
                                        <div>
                                            x {{$detail->sold_quantity}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="d-flex w-100 justify-content-between align-items-center">
                    <a href="{{route('customer.orderHistory')}}" class="btn btn-light">
                        Back
                    </a>
                    @if($order->status != 4)
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                            Cancel
                        </button>
                    @endif
                </div>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5 text-danger" id="exampleModalLabel">
                                    Are you sure?
                                </h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                You won't be able to revert this!
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                <a href="{{route('customer.cancelOrder', $order)}}" class="btn btn-danger">Cancel</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
