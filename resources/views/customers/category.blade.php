<title>Category</title>
<x-layout>
    <section id="login-section" class="m-nav">
        <div class="container d-flex justify-content-center flex-column">
            <div class="badge badge-primary my-3 mx-auto">
                <h1 class="display-6 m-0 fw-bold">Lego Categories</h1>
            </div>
            <div class="w-100 d-flex align-items-center justify-content-center hero-section">
                <div class="bg-white p-3 rounded-5 border shadow-sm col-12">
                    <div class="row m-1 g-3 justify-content-between">
                        @foreach($categories as $category)
                            <div class="col-3 p-0 m-2 rounded-5 border shadow-3-strong">
                                <div class="overflow-hidden" style="height: 160px">
                                    <img class="object-fit-contain w-100 rounded-5"
                                         src="{{asset('storage/admin/categories/'.$category->image)}}" alt="">

                                </div>
                                <div class="p-3 d-flex justify-content-between align-items-center">
                                    <h6 class="fw-bold">{{$category->name}}</h6>
                                    <a href="{{route('customer.product')}}">{{$category->category_quantity}}
                                        products</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layout>
