
@if (session()->has('success'))
    <div x-data="{show: true}" x-init="setTimeout(()=> show = false, 3000)
         "x-show="show"
         class="alert alert-success position-absolute" role="alert"
         style="top: 1%; right: 30%; box-shadow: 1px 1px green; height: 60px; animation: fadeOut 5s;">
        <p>
            {{session('success')}}
        </p>
    </div>
@endif
