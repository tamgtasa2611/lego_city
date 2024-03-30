@vite(["resources/sass/app.scss", "resources/js/app.js"])
<title>Edit Customer</title>
<body style="background-color: #303036">
<div id="content" class="">
    <div class="wrapper d-flex align-items-stretch">
        <div style="width: 620px"></div>
        <div class="position-fixed rounded-left" style="height: 100%">
            @include('layouts/navbar_adminMenu')
        </div>

        <!--  content  -->
        <div class="justify-content-center mt-5" style="width: 620px">
            <h4 class="fs-1 text-white text-center">Edit Customer #{{$customer->id}}</h4>
            <form method="post" action="{{ route('customer.update', $customer) }}" enctype="multipart/form-data">
                <div class="card-body bg-white rounded-4 p-5 shadow-lg m-5">
                    <h2 class="card-title font-monospace">Edit Form</h2>
                    <form>
                        @csrf
                        @method('PUT')
                        <div class="row justify-content-between w-75 pl-5">
                            <div class="col-4">
                                <div class="input-group">
                                    <label class="col-form-label text-dark font-monospace">First Name</label>
                                    <input class="rounded-3 px-3" type="text" name="first_name"
                                           pattern="[A-Za-z]+"
                                           value="{{$customer->first_name}}">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="input-group">
                                    <label class="col-form-label text-dark font-monospace">Last Name</label>
                                    <input class="rounded-3 input--style-4 px-3" type="text" name="last_name"
                                           pattern="[A-Za-z]+"
                                           value="{{$customer->last_name}}">
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-between w-75">
                            <div class="col-4">
                                <div class="input-group">
                                    <label class="col-form-label text-dark font-monospace">Email</label>
                                    <input class="rounded-3 input--style-4 px-3" type="email" name="email" required
                                           value="{{$customer->email}}">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="input-group">
                                    <label class="col-form-label text-dark font-monospace">Password</label>
                                    <input class="rounded-3 input--style-4 px-3" type="text" name="password" required
                                           value="{{$customer->password}}">
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-between w-75">
                            <div class="col-4">
                                <div class="input-group">
                                    <label class="col-form-label text-dark font-monospace">Phone</label>
                                    <input class="rounded-3 input--style-4 px-3" type="number" pattern="0-9"
                                           name="phone_number" required
                                           value="{{$customer->phone_number}}">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="input-group">
                                    <label class="col-form-label text-dark font-monospace">Address</label>
                                    <input class="rounded-3 input--style-4 px-3" type="text" name="address" required
                                           value="{{$customer->address}}">
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="row justify-content-between w-100 mt-4">
                        <div class="col-4">
                            <div class="d-flex">
                                <a class="btn btn-primary nice-box-shadow font-monospace"
                                   href="{{route('admin.customer')}}">Back</a>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="mr-5">
                                <button class="btn btn-primary nice-box-shadow font-monospace">UPDATE</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</body>

