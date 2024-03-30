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
                <form method="post" action="{{route('customer.pwdUpdate')}}" enctype="multipart/form-data"
                      class="row g-3">
                    @csrf
                    @method('PUT')
                    <div class="col-md-6">
                        <label for="new_pwd" class="form-label">New password</label>
                        <input type="text" class="form-control" id="new_pwd"
                               name="new_pwd">
                    </div>
                    <div class="col-md-6"></div>

                    <div class="col-md-6">
                        <label for="new_pwd2" class="form-label">Re-enter new password</label>
                        <input type="text" class="form-control" id="new_pwd2"
                               name="new_pwd2" value="">
                    </div>
                    <div class="col-md-6"></div>

                    <div class="col-12">
                        <button type="submit" class="btn btn-primary rounded-5 px-4">Save</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</x-layout>
