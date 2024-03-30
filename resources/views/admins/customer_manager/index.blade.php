@vite(["resources/sass/app.scss", "resources/js/app.js"])
<title>Customer Manager</title>
<body style="background-color: #f2f7fe">
<div id="content" class="">
    <div class="wrapper d-flex align-items-stretch">
        <div style="width: 520px"></div>
        <div class="position-fixed rounded-left" style="height: 100%">
            @include('layouts/navbar_adminMenu')
        </div>

        <!--  content  -->

        <div class="content-container mt-5 ">
            <div class="d-flex mx-auto mt-5">
                <h1 class="me-sm-5">Customer list</h1>
                <nav style="width: 520px"></nav>

                <form class="d-flex search-form mb-0" action="{{route('admin.customer')}}">
                    <div class="input-group input-group-sm">
                        <input class="form-control" name="search" type="text" placeholder="Type to search...">
                        <button class="btn btn-outline-secondary" type="submit">
                            <i class="bi bi-search"></i>
                        </button>
                    </div>
                </form>
            </div>
            <section>
                <div class="h-100">
                    <div class="d-flex align-items-center h-100">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-12 row-gap-xxl-5">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table
                                                    class="table table-borderless text-white mb-0 text-center align-middle">
                                                    <thead>
                                                    <tr>
                                                        <th scope="col">ID</th>
                                                        <th scope="col">FIRST NAME</th>
                                                        <th scope="col">LAST NAME</th>
                                                        <th scope="col">EMAIL</th>
                                                        <th scope="col">PHONE</th>
                                                        <th scope="col">ADDRESS</th>
                                                        <th scope="col">STATUS</th>
                                                        <th scope="col">ACTION</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @if($customers->count() > 0)
                                                    @foreach ($customers as $customer)
                                                        <tr style="background-color: #000000" class="">
                                                            <td> {{$customer->id}} </td>
                                                            <td> {{$customer->first_name}} </td>
                                                            <td> {{$customer->last_name}} </td>
                                                            <td> {{$customer->email}} </td>
                                                            <td> {{$customer->phone_number}} </td>
                                                            <td> {{$customer->address}} </td>
                                                            <td>
                                                                @switch($customer->status)
                                                                    @case(1)
                                                                        <button class="btn btn-success"><a
                                                                                href="{{route('customer.editStatus', $customer)}}"
                                                                                class="link-light nav-link">Active</a>
                                                                        </button>
                                                                        @break
                                                                    @case(2)
                                                                        <button class="btn btn-warning"><a
                                                                                href="{{route('customer.editStatus', $customer)}}"
                                                                                class="link-light nav-link">Locked</a>
                                                                        </button>
                                                                        @break
                                                                    @case(3)
                                                                        <button class="btn btn-danger"><a
                                                                                href="{{route('customer.editStatus', $customer)}}"
                                                                                class="link-light nav-link">Banned</a>
                                                                        </button>
                                                                        @break
                                                                @endswitch

                                                            </td>
                                                            <td class="d-flex justify-content-center py-sm-3">
                                                                <div>
                                                                    <button type="button" class="btn btn-primary">
                                                                        <a href="{{route('customer.edit', $customer) }}"
                                                                           class="nav-link bi-pencil"
                                                                           style="text-decoration: none">Edit</a>
                                                                    </button>
                                                                </div>

                                                                <div>
                                                                    <button
                                                                        class="btn bg-danger border-danger-subtle text-white"
                                                                        data-bs-toggle="modal" wire:click="setDeleteId({{$customer->id}})"
                                                                        data-bs-target="#deleteModal">
                                                                        Delete
                                                                    </button>
                                                                </div>
                                                            </td>
                                                        </tr>

                                                        <!--                              end modal-->
                                                    @endforeach
                                                    @else
                                                    </tbody>
                                                </table>
                                                <p class="text-center fs-3 mt-5 ">
                                                    No Customers found!
                                                </p>
                                                @endif
                                                <div style="display: flex" class="justify-content-between">
                                                    <button type="button"
                                                            class="btn btn-primary nice-box-shadow h-75 mt-3">
                                                        <a href="{{route('customer.create')}}" class="text-white"
                                                           style="text-decoration: none">Add a customer</a>
                                                    </button>
                                                    <div class="pt-3">
                                                        {{$customers->onEachSide(3)->links()}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        {{--        Delete Modal--}}
        {{--        Modal--}}
        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Delete Customer ?</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">Close</button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to delete this customer??
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                        <form method="post" action="{{route('customer.destroy', $customers)}}">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger border-danger-subtle">Yes, Delete!</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--  js close button modal  -->
    @push('script')
        <script>
            window.addEventListener('hide:delete-modal', function () {
                $('#deleteModal').modal('hide');
            });
        </script>
    @endpush
    <script src="//unpkg.com/alpinejs" defer></script>
</div>
</body>

<x-flash-message/>


