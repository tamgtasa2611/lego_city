<title>Orders management</title>
<x-adminLayout>
    <div class="p-3 bg-white rounded-5 shadow-3 mb-3">
        <div class="text-primary">
            <h4 class="fw-bold m-0">Orders Management</h4>
        </div>
    </div>
    {{--------------- MAIN --------------}}
    <div class="bg-white border rounded-5 shadow-3 overflow-hidden">
        <div
            class="p-3 d-flex flex-column flex-md-row justify-content-between rounded-top border-bottom">
            <div class="text-primary mb-3 mb-md-0">
                <i class="bi bi-table me-2"></i>Orders Datatable
            </div>
            {{-- Button  --}}
            <div class="d-flex align-items-center justify-content-start justify-content-md-end">
                <a href="{{ route('admin.orders.create') }}"
                   class="d-flex align-items-center me-3">
                    <i class="me-2 bi bi-plus-circle"></i>Add new order
                </a>
            </div>
        </div>
        <div class="p-3 bg-white rounded-bottom text-muted">
            @if (count($orders) != 0)
                <table
                    class="tran-3 table table-sm table-bordered  align-middle mb-0 bg-white border w-100"
                    id="dataTable">
                    <thead>
                    <tr>
                        <th class="align-middle text-center">ID</th>
                        <th class="align-middle text-center">Order Date</th>
                        <th class="text-center text-center">Total Price</th>
                        <th class="text-center text-center">Status</th>
                        <th class="text-center text-center">Customer</th>
                        <th class="text-center text-center">Admin</th>
                        <th class="align-middle text-center">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td class="text-center">
                                {{ $order->id }}
                            </td>
                            <td class="text-center">
                                {{ $order->date }}
                            </td>
                            <td class="text-center">
                                {{ $order->date }}
                            </td>
                            <td class="text-center">
                                @switch( $order->status )
                                    @case(0)
                                        <div class="badge badge-danger">
                                            Pending
                                        </div>
                                        @break
                                    @case(1)
                                        <div class="badge badge-warning">
                                            Confirmed
                                        </div>
                                        @break
                                    @case(2)
                                        <div class="badge badge-primary">
                                            Delivering
                                        </div>
                                        @break
                                    @case(3)
                                        <div class="badge badge-success">
                                            Completed
                                        </div>
                                        @break
                                    @case(4)
                                        <div class="badge badge-danger">
                                            Cancelled
                                        </div>
                                        @break
                                @endswitch
                            </td>
                            <td class="text-center">
                                {{ $order->customer->first_name . ' ' .  $order->customer->last_name}}
                            </td>
                            <td class="text-center text-break">
                                {{ $order->admin_id }}
                            </td>
                            <td>
                                <div class="d-flex align-items-center justify-content-center">
                                    <a href="{{ route('admin.orders.edit', $order) }}"
                                       class="btn btn-tertiary">
                                        View
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                No results
            @endif
        </div>
    </div>
</x-adminLayout>
<script>
    $(document).ready(function () {
        $("#dataTable").DataTable({
            columnDefs: [
                {
                    orderable: false,
                    targets: 6,
                },
            ],
            pagingType: "full_numbers",
            layout: {
                topEnd: {
                    search: {
                        text: "",
                        placeholder: "Type to search...",
                    },
                },
                bottomEnd: {
                    paging: {
                        numbers: 3,
                    },
                },
            },
        });
    });
</script>
