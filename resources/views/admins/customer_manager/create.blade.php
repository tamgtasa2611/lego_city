@vite(["resources/sass/app.scss", "resources/js/app.js"])
<body style="background-color: #f2f7fe">
<div id="content" class="">
    <div class="wrapper d-flex align-items-stretch">
        <div style="width: 620px"></div>
        <div class="position-fixed" style="height: 100%">

            @include("layouts/navbar_adminMenu");

        </div>

        <!--  content  -->
        <div class="justify-content-center mt-5" style="width: 620px">
            <h4 class="fs-1 text-center">Add a new customer</h4>
            <form method="post" action="{{route('customer.store')}}" enctype="multipart/form-data">
                <div class="card-body bg-white rounded-4 p-5 shadow-lg m-5">
                    <h2 class="card-title font-monospace">Registration Form</h2>
                    <form>
                    @csrf
                        <div class="row justify-content-between w-75 pl-5">
                            <div class="col-4">
                                <div class="input-group">
                                    <label class="col-form-label text-dark font-monospace">First Name</label>
                                    <input class="rounded-3 input--style-4 px-3" type="text" name="first_name">
                                    @if($errors->has('first_name'))
                                        {{ $errors->first('first_name') }}
                                    @endif
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="input-group">
                                    <label class="col-form-label text-dark font-monospace">Last Name</label>
                                    <input class="rounded-3 input--style-4 px-3" type="text" name="last_name">
                                    @if($errors->has('last_name'))
                                        {{ $errors->first('last_name') }}
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-between w-75">
                            <div class="col-4">
                                <div class="input-group">
                                    <label class="col-form-label text-dark font-monospace">Email</label>
                                    <input class="rounded-3 input--style-4 px-3" type="email" name="email">
                                    @if($errors->has('email'))
                                        {{ $errors->first('email') }}
                                    @endif
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="input-group">
                                    <label class="col-form-label text-dark font-monospace">Password</label>
                                    <input class="rounded-3 input--style-4 px-3" type="text" name="password">
                                    @if($errors->has('password'))
                                        {{ $errors->first('password') }}
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-between w-75">
                            <div class="col-4">
                                <div class="input-group">
                                    <label class="col-form-label text-dark font-monospace">Phone</label>
                                    <input class="rounded-3 input--style-4 px-3" type="number" name="phone_number">
                                    @if($errors->has('phone_number'))
                                        {{ $errors->first('phone_number') }}
                                    @endif
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="input-group">
                                    <label class="col-form-label text-dark font-monospace">Address</label>
                                    <input class="rounded-3 input--style-4 px-3" type="text" name="address">
                                    @if($errors->has('address'))
                                        {{ $errors->first('address') }}
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-between w-75">
                            <div class="col-4">
                                <div class="input-group d-flex">
                                    <label class="col-form-label text-dark font-monospace">status</label>
                                    <div style="display: inline-block" class="d-flex">
                                        <input class="form-check-input" type="radio" name="status"
                                               value="1">
                                        Active
                                        <input class="form-check-input" type="radio" name="status"
                                               value="2">
                                        Locked
                                        <input class="form-check-input" type="radio" name="status"
                                               value="3">
                                        Banned
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="row justify-content-between w-100 mt-4">
                        <div class="col-4">
                            <div class="d-flex">
                                <a class="btn btn-primary nice-box-shadow font-monospace" href="{{route('admin.customer')}}">Back</a>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="mr-5">
                                <button class="btn btn-primary nice-box-shadow font-monospace">ADD</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</body>

