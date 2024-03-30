<title>Brands management</title>
<x-adminLayout>
    <div class="p-3 bg-white rounded-5 shadow-3 mb-3">
        <div class="text-primary">
            <h4 class="fw-bold m-0">Brands Management</h4>
        </div>
    </div>
    {{--------------- MAIN --------------}}
    <div class="bg-white border rounded-5 shadow-3 overflow-hidden">
        <div
            class="p-3 d-flex flex-column flex-md-row justify-content-between rounded-top border-bottom">
            <div class="text-primary mb-3 mb-md-0">
                <i class="bi bi-table me-2"></i>Brands Datatable
            </div>
            {{-- Button  --}}
            <div class="d-flex align-items-center justify-content-start justify-content-md-end">
                <a href="{{ route('admin.brands.create') }}"
                   class="d-flex align-items-center me-3">
                    <i class="me-2 bi bi-plus-circle"></i>Add new brand
                </a>
            </div>
        </div>
        <div class="p-3 bg-white rounded-bottom text-muted">
            @if (count($brands) != 0)
                <table
                    class="tran-3 table table-sm table-bordered  align-middle mb-0 bg-white border w-100"
                    id="dataTable">
                    <thead>
                    <tr>
                        <th class="align-middle text-center">ID</th>
                        <th class="align-middle text-center">Name</th>
                        <th class="align-middle text-center">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($brands as $brand)
                        <tr>
                            <td class="text-center">
                                {{ $brand->id }}
                            </td>
                            <td class="text-center text-break">
                                {{ $brand->name }}
                            </td>
                            <td>
                                <div class="d-flex align-items-center justify-content-center">
                                    <a href="{{ route('admin.brands.edit', $brand) }}"
                                       class="btn btn-tertiary me-3">
                                        Edit
                                    </a>
                                    <a class="btn btn-tertiary text-danger dlt-btn"
                                       data-mdb-ripple-init
                                       data-mdb-modal-init href="#deleteModal"
                                       data-id={{$brand->id}}>
                                        Delete
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <!-- DeleteModal -->
                <div class="modal slideUp" id="deleteModal" tabindex="-1"
                     aria-labelledby="deleteModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title text-danger" id="deleteModalLabel">
                                    <i class="bi bi-x-circle me-2"></i>Are you sure?
                                </h5>
                                <button type="button" class="btn-close" data-mdb-ripple-init
                                        data-mdb-dismiss="modal"
                                        aria-label="Close"></button>
                            </div>
                            <div class="modal-body">You won't be able to revert this!</div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light rounded-9"
                                        data-mdb-ripple-init
                                        data-mdb-dismiss="modal">Cancel
                                </button>
                                <form method="post"
                                      action="{{ route('admin.brands.destroy') }}">
                                    @csrf
                                    @method('DELETE')
                                    <input id="id" name="id" hidden class="visually-hidden"
                                           value="">
                                    <button class="btn btn-danger rounded-9" data-mdb-ripple-init>
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
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
                    targets: 2,
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
