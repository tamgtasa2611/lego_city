@vite(["resources/sass/app.scss", "resources/js/app.js"])
<x-layout>
    <div class="container h-90 mt-5 d-flex justify-content-center align-items-center">
        <form method="post" action="{{route('customer.registerProcess')}}" enctype="multipart/form-data"
              class="border bg-white p-3 rounded m-0">
            @csrf
            <div class="my-4 text-center">
                <h1 class="h1">Register</h1>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="first_name" class="form-label">First name</label>
                    <input type="text" name="first_name" class="form-control" id="first_name"
                           value="{{old('first_name')}}">
                    @if($errors->has('first_name'))
                        {{ $errors->first('first_name') }}
                    @endif
                </div>

                <div class=" col-md-6 mb-3">
                    <label for="last_name" class="form-label">Last name</label>
                    <input type="text" name="last_name" class="form-control" id="last_name"
                           value="{{old('last_name')}}">
                    @if($errors->has('last_name'))
                        {{ $errors->first('last_name') }}
                    @endif
                </div>
            </div>

            <div class=" row">
                <div class="col-md-6 mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control" id="email" value="{{old('email')}}">
                    @if($errors->has('email'))
                        {{ $errors->first('email') }}
                    @endif
                </div>

                <div class="col-md-6 mb-3">
                    <label for="phone_number" class="form-label">Phone number</label>
                    <input type="number" name="phone_number" class="form-control" id="phone_number"
                           value="{{old('phone_number')}}">
                    @if($errors->has('phone_number'))
                        {{ $errors->first('phone_number') }}
                    @endif
                </div>
            </div>

            <div class=" row">
                <div class="col-md-6 mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="text" name="password" class="form-control" id="password"
                           value="{{old('password')}}">
                    @if($errors->has('password'))
                        {{ $errors->first('password') }}
                    @endif
                </div>

                <div class="col-md-6 mb-3">
                    <label for="password_2" class="form-label">Re-enter password</label>
                    <input type="text" name="password_2" class="form-control" id="password_2"
                           value="{{old('password_2')}}">
                    @if($errors->has('password_2'))
                        {{ $errors->first('password_2') }}
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 mb-3">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" name="address" class="form-control" id="address" value="{{old('address')}}">
                    @if($errors->has('address'))
                        {{ $errors->first('address') }}
                    @endif
                </div>
            </div>

            <input class="hidden invisible opacity-0" type="hidden"
                   name="status" value="1" readonly>

            <div class="mb-3 d-flex justify-content-center align-items-center">
                <button class="btn btn-primary rounded-5 px-4">Register</button>
            </div>

            <div class="form-text d-flex justify-content-between align-items-center">
                <div class="me-5">
                    <a href="{{route('customer.forgotPassword')}}">Forgot password</a>
                </div>
                <div>
                    Already have an account? Login <a href="{{route('customer.login')}}">here</a>
                </div>
            </div>


        </form>
    </div>
</x-layout>
