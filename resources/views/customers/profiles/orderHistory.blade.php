@vite(["resources/sass/app.scss", "resources/js/app.js"])
<x-layout>
    <div class="container d-flex align-items-center h-80 mt-5  overflow-hidden">
        <div class="border w-20 rounded-start p-3 h-100">
            @include('partials/profile_menu')
        </div>
        <div class="bg-white border w-80 rounded-end p-3 h-100 d-flex flex-column justify-content-between">
            <div>
                <div class="fs-5">
                    Orders history
                </div>
                <div>
                    Manage your order details
                </div>
                <hr>
            </div>
            <div class="d-flex w-100 h-100 flex-column">
                @foreach($orders as $order)
                    <div
                        class="w-100 h-50 d-flex justify-content-between align-items-center border rounded bg-light mb-3 p-3">
                        <div class="h-100 w-75 d-flex flex-column justify-content-center">
                            <div class="fw-bold fst-italic">
                                @switch($order->status)
                                    @case(0)
                                        <span class="text-danger">Pending</span>
                                        @break
                                    @case(1)
                                        <span class="text-success">Confirmed</span>
                                        @break
                                    @case(2)
                                        <span class="text-primary">Delivery</span>
                                        @break
                                    @case(3)
                                        <span class="text-success">Completed</span>
                                        @break
                                    @case(4)
                                        <span class="text-danger">Cancelled</span>
                                        @break
                                @endswitch
                            </div>
                            <div>
                                Order number: {{$order->id}}
                            </div>
                            <div>
                                @php
                                    $hour = substr($order->date, 10);
                                    $day = substr($order->date, 8, 2);
                                    $month = substr($order->date, 5, 2);
                                    $year = substr($order->date, 0, 4);
                                    $orderDate = $hour . ' - ' . $month . ' ' . $day . ', ' . $year;
                                @endphp
                                Order date: {{$orderDate}}
                            </div>
                            <div>
                                Payment method: Pay on delivery
                            </div>
                        </div>
                        <div class="h-100 w-25 d-flex align-items-center justify-content-end">
                            <a href="{{route('customer.orderDetail', $order)}}" class="btn btn-primary">
                                View order
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
            <div>
                <hr class="mt-0">
                <div class="d-flex justify-content-between align-items-center">
                    {{$orders->onEachSide(2)->links()}}
                </div>
            </div>
        </div>
    </div>
</x-layout>
