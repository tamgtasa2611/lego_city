@vite(["resources/sass/app.scss", "resources/js/app.js"])
<title>Edit Customer's Status</title>
<body style="background-color: #303036">
<div id="content" class="">
    <div class="wrapper d-flex align-items-stretch">
        <div style="width: 620px"></div>
        <div class="position-fixed rounded-left" style="height: 100%">
            @include('layouts/navbar_adminMenu')
        </div>

        <!--  content  -->
        <div class="justify-content-center mt-5" style="width: 620px">
            <h4 class="fs-1 text-white text-center">Edit Customer's Status</h4>
            <form method="post" action="{{ route('customer.editStatus', $customer) }}" enctype="multipart/form-data">
                <div class="card-body bg-white rounded-4 p-5 shadow-lg m-5">
                    <h2 class="card-title font-monospace">Edit Status Form</h2>
                    <hr>
                    <form>
                        @csrf
                        @method('PUT')
                        <div class="row justify-content-between w-100 pl-5">
                            <div>
                                <h3>Name: {{$customer->first_name}} {{$customer->last_name}}</h3>
                            </div>
                        </div>
                        <div class="row justify-content-between w-100 pl-5">
                            <div>
                                <h3>Email: {{$customer->email}}</h3>
                            </div>
                        </div>
                        <div class="row justify-content-between w-100 pl-5">
                            <div>
                                <h3>Phone: {{$customer->phone_number}}</h3>
                            </div>
                        </div>
                        <div class="row justify-content-between w-100 pl-5">
                            <div>
                                <h3>Address: {{$customer->address}}</h3>
                            </div>
                        </div>
                        <div class="row justify-content-between w-100 pl-5">
                            <form>
                                <label class="fs-5">Update Customer's Status</label>
                                <div class="input-group w-75">
                                    <select name="status" class="form-select">
                                        <option value="status">
                                            @if($customer->status == 1) Active @endif
                                            @if($customer->status == 2) Locked @endif
                                            @if($customer->status == 3) Banned @endif
                                        </option>

                                        <option class="form-check-input" type="radio" name="status"
                                                value="1" {{Request::get('status') == 'Active' ? 'selected':''}}>
                                            Active
                                        </option>
                                        <option class="form-check-input" type="radio" name="status"
                                                value="2" {{Request::get('status') == 'Locked' ? 'selected':''}}>
                                            Locked
                                        </option>
                                        <option class="form-check-input" type="radio" name="status"
                                                value="3" {{Request::get('status') == 'Banned' ? 'selected':''}}>
                                            Banned
                                        </option>
                                    </select>
                                    <button type="submit" class="btn btn-primary nice-box-shadow font-monospace">UPDATE</button>
                                </div>
                            </form>
                        </div>
                    </form>
                    <div class="row justify-content-between w-100 mt-4">
                        <div class="col-4">
                            <div class="d-flex">
                                <a class="btn btn-primary nice-box-shadow font-monospace"
                                   href="{{route('admin.customer')}}">Back</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</body>

