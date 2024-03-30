@vite(["resources/sass/app.scss", "resources/js/app.js"])
<x-layout>
    <div class="container d-flex align-items-center mt-5 h-80 overflow-hidden">
        <div class="border w-20 rounded-start p-3 h-100">
            @include('layouts/profile_menu')
        </div>
        <div class="bg-white border w-80 rounded-end p-3 h-100">
            <div class="fs-5">
                My profile
            </div>
            <div>
                Manage profile information to secure your account
            </div>
            <hr>
            <div>
                <form method="post" action="{{route('customer.profileUpdate')}}" enctype="multipart/form-data"
                      class="row g-3">
                    @csrf
                    @method('PUT')
                    <div class="col-md-6">
                        <label for="first_name" class="form-label">First name</label>
                        <input type="text" class="form-control" id="first_name"
                               name="first_name"
                               value="{{$customer->first_name}}">
                    </div>
                    <div class="col-md-6">
                        <label for="last_name" class="form-label">Last name</label>
                        <input type="text" class="form-control" id="last_name"
                               name="last_name"
                               value="{{$customer->last_name}}">
                    </div>

                    <div class="col-md-6">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email"
                               name="email"
                               value="{{$customer->email}}">
                    </div>
                    <div class="col-md-6">
                        <label for="phone_number" class="form-label">Phone number</label>
                        <input type="number" class="form-control" id="phone_number"
                               name="phone_number"
                               value="{{$customer->phone_number}}">
                    </div>

                    <div class="col-12">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control" id="address"
                               name="address"
                               value="{{$customer->address}}">
                    </div>

                    <div class="col-12">
                        <button type="submit" class="btn btn-primary rounded-5 px-4">Save</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</x-layout>
