<div class="text-center">
    Hello, <br>
    <span class="fs-5">{{$customer->first_name}} {{$customer->last_name}}</span>
</div>
<hr>
<div>
    <div class="list-group list-group-light">
        <a href="{{route('customer.profile')}}"
           class="list-group-item list-group-item-action px-3 border-0 {{request()->routeIs('customer.profile') ? 'active' : ''}}"
           data-mdb-ripple-init
           aria-current="true"> <i class="bi bi-person me-3 text-warning"></i> My profile</a>
        <a href="{{route('customer.orderHistory')}}"
           class="list-group-item list-group-item-action px-3 border-0  {{request()->routeIs('customer.orderHistory') ? 'active' : ''}}"
           data-mdb-ripple-init> <i
                class="bi bi-file-text me-3 text-success"></i> Orders history</a>
        <a href="{{route('customer.pwdEdit')}}"
           class="list-group-item list-group-item-action px-3 border-0 {{request()->routeIs('customer.pwdEdit') ? 'active' : ''}}"
           data-mdb-ripple-init> <i
                class="bi bi-shield-lock me-3 text-primary"></i> Change password</a>
        <a href="{{route('customer.logout')}}" class="list-group-item list-group-item-action px-3 border-0"
           data-mdb-ripple-init> <i
                class="bi bi-box-arrow-left me-3 text-danger"></i> Sign out</a>
    </div>
</div>
