@vite(["resources/sass/app.scss", "resources/js/app.js"])
<x-layout>
    <div class="container-fluid p-0">
        <div class="bg-dark position-relative d-flex justify-content-center align-items-center">
            <img src="{{asset('images/home_2.webp')}}" class="w-100 object-fit-contain opacity-75" alt="home">
            <div
                class="position-absolute text-white text-capitalize d-flex justify-content-center align-items-center flex-column">
                <span class="luxury-font fs-1 fade-in fade-bottom">
                    Year of the Dragon
                </span>
                <p class="fade-in fade-bottom">
                    Celebrate Spring Festival with the gift of play
                </p>
            </div>
        </div>
    </div>
    {{--  Products  --}}

    {{--  SHIPPING  --}}
    <div class="container-fluid p-0 mt-5">
        <div class="bg-dark position-relative d-flex justify-content-center align-items-center">
            <img src="{{asset('images/home_1.webp')}}" class="w-100 object-fit-contain opacity-75" alt="">
            <div
                class="position-absolute text-white text-capitalize d-flex justify-content-center align-items-center flex-column">
                <div class="container d-flex justify-content-between fade-in fade-bottom">
                    <div class="w-25 text-center d-flex justify-content-center align-items-center flex-column">
                        <i class="bi bi-truck fs-2 p-2"></i>
                        <div class="text-uppercase">FREE SHIPPING AND RETURNS</div>
                        <p>Safety and easiness guaranteed on your shopping</p>
                    </div>
                    <div class="w-25 text-center d-flex justify-content-center align-items-center flex-column">
                        <i class="bi bi-chat-dots fs-2 p-2"></i>
                        <div class="text-uppercase">ONLINE CLIENT ADVISOR</div>
                        <p>Our Client Advisors will guide you through a personalized shopping experience</p>
                    </div>
                    <div class="w-25 text-center d-flex justify-content-center align-items-center flex-column">
                        <i class="bi bi-gift fs-2 p-2"></i>
                        <div class="text-uppercase">GIFT BOX AVAILABLE</div>
                        <p>Free and customizable gift box for your goods</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts/scroll_to_top')
</x-layout>
<script src="{{asset('frontend/js/home.js')}}"></script>
