<link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://unpkg.com/bs-brain@2.0.4/utilities/bsb-overlay/bsb-overlay.css">
<link rel="stylesheet" href="https://unpkg.com/bs-brain@2.0.4/utilities/background/background.css">
<link rel="stylesheet" href="https://unpkg.com/bs-brain@2.0.4/utilities/margin/margin.css">
<link rel="stylesheet" href="https://unpkg.com/bs-brain@2.0.4/utilities/padding/padding.css">

<style>
    .head-text {
        font-size: 34px;
        font-weight: 700;
    }

    .top-section,
    #contact_us {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 30px;
        /* height: 300px; */
        /* background-color: #f5f5f5; */
    }

    .top-section img {
        width: 600px;
    }

    .section_text {
        display: flex;
        flex-direction: column;
        padding: 100px 40px;
    }

    .sub-text {
        font-size: 18px;
        font-weight: 400;
        margin-top: 10px;
    }

    /* From Uiverse.io by ErzenXz */
    .input {
        width: 100%;
        max-width: 70%;
        height: 45px;
        padding: 12px;
        border-radius: 8px !important;
        border: 1.5px solid lightgrey;
        outline: none;
        transition: all 0.3s cubic-bezier(0.19, 1, 0.22, 1);
        box-shadow: 0px 0px 20px -18px;
    }

    .input:hover {
        border: 2px solid lightgrey;
        box-shadow: 0px 0px 20px -17px;
    }

    .input:active {
        transform: scale(0.95);
    }

    .input:focus {
        border: 2px solid grey;
    }

    .form {
        display: flex;
        justify-content: center;
        gap: 10px;
        /* margin-top: 30px; */
    }

    .cta {
        background: rgb(87, 87, 87) !important;
        color: white;
        /* padding: 10px 20px; */
        height: 45px;
        display: flex;
        justify-content: center;
        align-items: center;
        width: 30%;
        font-weight: 700;
        border-radius: 8px;
    }

    /* From Uiverse.io by alexruix */
    .card {
        width: calc(100% / 4 - 20px);
        height: max-content !important;
        padding: .8em;
        background: #f5f5f5;
        position: relative;
        overflow: visible;
        /* box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24); */
    }

    .card-img {
        background-color: #ffcaa6;
        height: 40%;
        width: 100%;
        border-radius: .5rem;
        transition: .3s ease;
        aspect-ratio: 16/9;
    }

    .card-info {
        padding-top: 15px;
    }

    svg {
        width: 20px;
        height: 20px;
    }

    .card-footer {
        width: 100%;
        display: flex;
        justify-content: space-between;
        padding: 0 !important;
        align-items: center;
        padding-top: 10px !important;
        border-top: 1px solid #ddd;
    }

    /*Text*/
    .text-title {
        font-weight: 900;
        font-size: 1.2em;
        line-height: 1.5;
    }

    .text-body {
        font-size: .9em;
        padding-bottom: 10px;
    }

    /*Button*/
    .card-button {
        border: 1px solid #252525;
        display: flex;
        padding: .3em;
        cursor: pointer;
        border-radius: 50px;
        transition: .3s ease-in-out;
    }

    /*Hover*/
    .card-img:hover {
        /* transform: translateY(-25%); */
        box-shadow: rgba(226, 196, 63, 0.25) 0px 13px 47px -5px, rgba(180, 71, 71, 0.3) 0px 8px 16px -8px;
    }

    .card-button:hover {
        border: 1px solid #ffcaa6;
        background-color: #ffcaa6;
    }

    .courses {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        padding: 60px 0;
    }

    .card-footer {
        background: transparent !important;
    }

    .text-body {
        /* height: 0px; */
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }
</style>

<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> --}}

    <div class="container">

        @if (Route::is('dashboard'))
            <section class="top-section">
                <div class="section_text">
                    <span class="head-text">Master New Skills, Unlock New Opportunities – Learn, Grow, and
                        Succeed!</span>
                    <span class="sub-text">Explore innovative <strong style="color: #543ae3">courses</strong> that
                        prepare
                        you
                        for the future.</span>

                    <div class="form mt-6">
                        <input placeholder="Enter you mobile number" type="text" name="text" class="input">
                        <div class="cta">Submit</div>
                    </div>
                </div>
                <img src="https://staticlearn.shine.com/l/m/images/blog/mobile/best_it_courses.webp" alt="">
            </section>
        @endif

        @if (!Route::is('getCart'))
            <section id="courses" class="mt-4">
                <span class="head-text text-center w-100 d-flex justify-center">Courses</span>

                <div class="courses">

                    @if ($courses)
                        @foreach ($courses as $course)
                            <div class="card">
                                <img class="card-img" src={{ $course->image_path }}
                                    onclick="window.location.href='{{ route('course', ['course_id' => $course->id]) }}';" />
                                <div class="card-info">
                                    <p class="text-title"> {{ $course->title }} </p>
                                    <p class="text-body"> {{ $course->description }} </p>

                                </div>
                                <div class="card-footer">
                                    <span class="text-title">Rs. {{ $course->price }}</span>

                                    @if ($course->is_cart)
                                        <div class="" role="alert">
                                            added to cart
                                        </div>
                                    @else
                                        @if (session('success'))
                                            @php
                                                $courseId = session('course_id');
                                                settype($courseId, 'integer');
                                                // dd(gettype($courseId), $course->id)
                                            @endphp
                                            @if ($courseId === $course->id && session('success'))
                                                <div class="" role="alert">
                                                    {{ session('success') }}
                                                </div>
                                            @else
                                                <a class="card-button" href="{{ url('/add-to-cart/' . $course->id) }}">
                                                    <svg class="svg-icon" viewBox="0 0 20 20">
                                                        <path
                                                            d="M17.72,5.011H8.026c-0.271,0-0.49,0.219-0.49,0.489c0,0.271,0.219,0.489,0.49,0.489h8.962l-1.979,4.773H6.763L4.935,5.343C4.926,5.316,4.897,5.309,4.884,5.286c-0.011-0.024,0-0.051-0.017-0.074C4.833,5.166,4.025,4.081,2.33,3.908C2.068,3.883,1.822,4.075,1.795,4.344C1.767,4.612,1.962,4.853,2.231,4.88c1.143,0.118,1.703,0.738,1.808,0.866l1.91,5.661c0.066,0.199,0.252,0.333,0.463,0.333h8.924c0.116,0,0.22-0.053,0.308-0.128c0.027-0.023,0.042-0.048,0.063-0.076c0.026-0.034,0.063-0.058,0.08-0.099l2.384-5.75c0.062-0.151,0.046-0.323-0.045-0.458C18.036,5.092,17.883,5.011,17.72,5.011z">
                                                        </path>
                                                        <path
                                                            d="M8.251,12.386c-1.023,0-1.856,0.834-1.856,1.856s0.833,1.853,1.856,1.853c1.021,0,1.853-0.83,1.853-1.853S9.273,12.386,8.251,12.386z M8.251,15.116c-0.484,0-0.877-0.393-0.877-0.874c0-0.484,0.394-0.878,0.877-0.878c0.482,0,0.875,0.394,0.875,0.878C9.126,14.724,8.733,15.116,8.251,15.116z">
                                                        </path>
                                                        <path
                                                            d="M13.972,12.386c-1.022,0-1.855,0.834-1.855,1.856s0.833,1.853,1.855,1.853s1.854-0.83,1.854-1.853S14.994,12.386,13.972,12.386z M13.972,15.116c-0.484,0-0.878-0.393-0.878-0.874c0-0.484,0.394-0.878,0.878-0.878c0.482,0,0.875,0.394,0.875,0.878C14.847,14.724,14.454,15.116,13.972,15.116z">
                                                        </path>
                                                    </svg>
                                                </a>
                                            @endif

                                            {{-- {{dd($courseId === $course->id)}} --}}
                                        @else
                                            <a class="card-button" href="{{ url('/add-to-cart/' . $course->id) }}">
                                                <svg class="svg-icon" viewBox="0 0 20 20">
                                                    <path
                                                        d="M17.72,5.011H8.026c-0.271,0-0.49,0.219-0.49,0.489c0,0.271,0.219,0.489,0.49,0.489h8.962l-1.979,4.773H6.763L4.935,5.343C4.926,5.316,4.897,5.309,4.884,5.286c-0.011-0.024,0-0.051-0.017-0.074C4.833,5.166,4.025,4.081,2.33,3.908C2.068,3.883,1.822,4.075,1.795,4.344C1.767,4.612,1.962,4.853,2.231,4.88c1.143,0.118,1.703,0.738,1.808,0.866l1.91,5.661c0.066,0.199,0.252,0.333,0.463,0.333h8.924c0.116,0,0.22-0.053,0.308-0.128c0.027-0.023,0.042-0.048,0.063-0.076c0.026-0.034,0.063-0.058,0.08-0.099l2.384-5.75c0.062-0.151,0.046-0.323-0.045-0.458C18.036,5.092,17.883,5.011,17.72,5.011z">
                                                    </path>
                                                    <path
                                                        d="M8.251,12.386c-1.023,0-1.856,0.834-1.856,1.856s0.833,1.853,1.856,1.853c1.021,0,1.853-0.83,1.853-1.853S9.273,12.386,8.251,12.386z M8.251,15.116c-0.484,0-0.877-0.393-0.877-0.874c0-0.484,0.394-0.878,0.877-0.878c0.482,0,0.875,0.394,0.875,0.878C9.126,14.724,8.733,15.116,8.251,15.116z">
                                                    </path>
                                                    <path
                                                        d="M13.972,12.386c-1.022,0-1.855,0.834-1.855,1.856s0.833,1.853,1.855,1.853s1.854-0.83,1.854-1.853S14.994,12.386,13.972,12.386z M13.972,15.116c-0.484,0-0.878-0.393-0.878-0.874c0-0.484,0.394-0.878,0.878-0.878c0.482,0,0.875,0.394,0.875,0.878C14.847,14.724,14.454,15.116,13.972,15.116z">
                                                    </path>
                                                </svg>
                                            </a>
                                        @endif
                                    @endif



                                </div>
                            </div>
                        @endforeach
                    @endif

                </div>

                {{-- </div> --}}

            </section>
        @else
            <section id="courses" class="mt-4">
                <span class="head-text text-center w-100 d-flex justify-center">Your Cart</span>

                <div class="courses">

                    {{-- {{dd(count($cart))}} --}}
                    @if (count($cart) > 0)
                        @foreach ($cart as $cartItem)
                            <div class="card d-flex flex-row p-0 border-0 w-100">
                                <img class="card-img" src={{ $cartItem->image_path }} data-id={{ $cartItem->id }}
                                    style="width : 300px" />
                                <div class="card-info mx-4" style="width:70%">
                                    <p class="text-title"> {{ $cartItem->course_name }} </p>
                                    <p class="text-body"> {{ $cartItem->description }} </p>
                                    <div class="card-footer">
                                        <span class="text-title">Rs. {{ $cartItem->price }}</span>
                                    </div>
                                </div>

                                <a class="cross text-xl" href="{{ url('/remove-cart/' . $cartItem->id) }}">
                                    x
                                </a>
                            </div>
                        @endforeach


                        <div class="total_price w-100 d-flex flex-column align-items-end justify-center">

                            @php
                                $total_price = 0; // Initialize the total price
                                foreach ($cart as $key => $value) {
                                    $total_price += $value->price; // Add the price of each course to the total
                                }
                                // echo $total_price; // Output the total price
                            @endphp
                            <span class="text-title" style="width: 30% ; text-align: center">Total Price: Rs.
                                {{ $total_price }}</span>
                            <div class="cta">Checkout</div>
                        </div>
                    @else
                        <div class="" role="alert">
                            Your cart is empty.
                        </div>
                    @endif

                </div>

    </div>

    </section>
    @endif



    @if (Route::is('dashboard'))

        <!-- Contact 6 - Bootstrap Brain Component -->
        <section class="py-3 py-md-5 py-xl-8 ">
            <div class="container">
                <div class="row justify-content-md-center">
                    <div class="col-12 col-md-10 col-lg-8 col-xl-7 col-xxl-6">
                        <h2 class="mb-4 display-5 text-center">Contact us</h2>
                        <p class="text-secondary mb-5 text-center lead fs-4">Our team is available to provide prompt
                            and
                            helpful responses to all inquiries. You can reach us via phone, email, or by filling out
                            the
                            contact form below.</p>
                        <hr class="w-50 mx-auto mb-5 mb-xl-9 border-dark-subtle">
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class=" w-100 p-0 card border border-dark rounded shadow-sm overflow-hidden">
                            <div class="card-body p-0">
                                <div class="row gy-3 gy-md-4 gy-lg-0">
                                    <div class="col-12 col-lg-6 bsb-overlay background-position-center background-size-cover"
                                        style="--bsb-overlay-opacity: 0.7; background-image: url('./assets/img/contact-img-1.webp');">
                                        <div class="row align-items-lg-center justify-content-center h-100">
                                            <div class="col-11 col-xl-10">
                                                <div class="contact-info-wrapper py-4 py-xl-5">
                                                    <h2 class="h1 mb-3 text-light">Get in touch</h2>
                                                    <p class="lead fs-4 text-light opacity-75 mb-4 mb-xxl-5">We're
                                                        always on the lookout to work with new clients. If you're
                                                        interested in working with us, please get in touch in one of
                                                        the
                                                        following ways.</p>
                                                    <div class="d-flex mb-4 mb-xxl-5">
                                                        <div class="me-4 text-primary">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="32"
                                                                height="32" fill="currentColor" class="bi bi-geo"
                                                                viewBox="0 0 16 16">
                                                                <path fill-rule="evenodd"
                                                                    d="M8 1a3 3 0 1 0 0 6 3 3 0 0 0 0-6zM4 4a4 4 0 1 1 4.5 3.969V13.5a.5.5 0 0 1-1 0V7.97A4 4 0 0 1 4 3.999zm2.493 8.574a.5.5 0 0 1-.411.575c-.712.118-1.28.295-1.655.493a1.319 1.319 0 0 0-.37.265.301.301 0 0 0-.057.09V14l.002.008a.147.147 0 0 0 .016.033.617.617 0 0 0 .145.15c.165.13.435.27.813.395.751.25 1.82.414 3.024.414s2.273-.163 3.024-.414c.378-.126.648-.265.813-.395a.619.619 0 0 0 .146-.15.148.148 0 0 0 .015-.033L12 14v-.004a.301.301 0 0 0-.057-.09 1.318 1.318 0 0 0-.37-.264c-.376-.198-.943-.375-1.655-.493a.5.5 0 1 1 .164-.986c.77.127 1.452.328 1.957.594C12.5 13 13 13.4 13 14c0 .426-.26.752-.544.977-.29.228-.68.413-1.116.558-.878.293-2.059.465-3.34.465-1.281 0-2.462-.172-3.34-.465-.436-.145-.826-.33-1.116-.558C3.26 14.752 3 14.426 3 14c0-.599.5-1 .961-1.243.505-.266 1.187-.467 1.957-.594a.5.5 0 0 1 .575.411z" />
                                                            </svg>
                                                        </div>
                                                        <div>
                                                            <h4 class="mb-3 text-light">Address</h4>
                                                            <address class="mb-0 text-light opacity-75">Gurugram,
                                                                Haryana , India</address>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-4 mb-xxl-5">
                                                        <div class="col-12 col-xxl-6">
                                                            <div class="d-flex mb-4 mb-xxl-0">
                                                                <div class="me-4 text-primary">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        width="32" height="32"
                                                                        fill="currentColor"
                                                                        class="bi bi-telephone-outbound"
                                                                        viewBox="0 0 16 16">
                                                                        <path
                                                                            d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511zM11 .5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0V1.707l-4.146 4.147a.5.5 0 0 1-.708-.708L14.293 1H11.5a.5.5 0 0 1-.5-.5z" />
                                                                    </svg>
                                                                </div>
                                                                <div>
                                                                    <h4 class="mb-3 text-light">Phone</h4>
                                                                    <p class="mb-0">
                                                                        <a class="link-light link-opacity-75 link-opacity-100-hover text-decoration-none"
                                                                            href="tel:+15057922430">1234567890</a>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-xxl-6">
                                                            <div class="d-flex mb-0">
                                                                <div class="me-4 text-primary">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        width="32" height="32"
                                                                        fill="currentColor" class="bi bi-envelope-at"
                                                                        viewBox="0 0 16 16">
                                                                        <path
                                                                            d="M2 2a2 2 0 0 0-2 2v8.01A2 2 0 0 0 2 14h5.5a.5.5 0 0 0 0-1H2a1 1 0 0 1-.966-.741l5.64-3.471L8 9.583l7-4.2V8.5a.5.5 0 0 0 1 0V4a2 2 0 0 0-2-2H2Zm3.708 6.208L1 11.105V5.383l4.708 2.825ZM1 4.217V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v.217l-7 4.2-7-4.2Z" />
                                                                        <path
                                                                            d="M14.247 14.269c1.01 0 1.587-.857 1.587-2.025v-.21C15.834 10.43 14.64 9 12.52 9h-.035C10.42 9 9 10.36 9 12.432v.214C9 14.82 10.438 16 12.358 16h.044c.594 0 1.018-.074 1.237-.175v-.73c-.245.11-.673.18-1.18.18h-.044c-1.334 0-2.571-.788-2.571-2.655v-.157c0-1.657 1.058-2.724 2.64-2.724h.04c1.535 0 2.484 1.05 2.484 2.326v.118c0 .975-.324 1.39-.639 1.39-.232 0-.41-.148-.41-.42v-2.19h-.906v.569h-.03c-.084-.298-.368-.63-.954-.63-.778 0-1.259.555-1.259 1.4v.528c0 .892.49 1.434 1.26 1.434.471 0 .896-.227 1.014-.643h.043c.118.42.617.648 1.12.648Zm-2.453-1.588v-.227c0-.546.227-.791.573-.791.297 0 .572.192.572.708v.367c0 .573-.253.744-.564.744-.354 0-.581-.215-.581-.8Z" />
                                                                    </svg>
                                                                </div>
                                                                <div>
                                                                    <h4 class="mb-3 text-light">E-Mail</h4>
                                                                    <p class="mb-0">
                                                                        <a class="link-light link-opacity-75 link-opacity-100-hover text-decoration-none"
                                                                            href="mailto:demo@yourdomain.com">demo@yourdomain.com</a>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex">
                                                        <div class="me-4 text-primary">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="32"
                                                                height="32" fill="currentColor"
                                                                class="bi bi-alarm" viewBox="0 0 16 16">
                                                                <path
                                                                    d="M8.5 5.5a.5.5 0 0 0-1 0v3.362l-1.429 2.38a.5.5 0 1 0 .858.515l1.5-2.5A.5.5 0 0 0 8.5 9V5.5z" />
                                                                <path
                                                                    d="M6.5 0a.5.5 0 0 0 0 1H7v1.07a7.001 7.001 0 0 0-3.273 12.474l-.602.602a.5.5 0 0 0 .707.708l.746-.746A6.97 6.97 0 0 0 8 16a6.97 6.97 0 0 0 3.422-.892l.746.746a.5.5 0 0 0 .707-.708l-.601-.602A7.001 7.001 0 0 0 9 2.07V1h.5a.5.5 0 0 0 0-1h-3zm1.038 3.018a6.093 6.093 0 0 1 .924 0 6 6 0 1 1-.924 0zM0 3.5c0 .753.333 1.429.86 1.887A8.035 8.035 0 0 1 4.387 1.86 2.5 2.5 0 0 0 0 3.5zM13.5 1c-.753 0-1.429.333-1.887.86a8.035 8.035 0 0 1 3.527 3.527A2.5 2.5 0 0 0 13.5 1z" />
                                                            </svg>
                                                        </div>
                                                        <div>
                                                            <h4 class="mb-3 text-light">Opening Hours</h4>
                                                            <div class="d-flex mb-1">
                                                                <p class="text-light fw-bold mb-0 me-5">Mon - Fri
                                                                </p>
                                                                <p class="text-light opacity-75 mb-0">9am - 5pm</p>
                                                            </div>
                                                            <div class="d-flex">
                                                                <p class="text-light fw-bold mb-0 me-5">Sat - Sun
                                                                </p>
                                                                <p class="text-light opacity-75 mb-0">9am - 2pm</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <div class="row align-items-lg-center h-100">
                                            <div class="col-12">
                                                <form action="{{ route('contact') }}" method="POST">
                                                    @csrf
                                                    <div class="row gy-4 gy-xl-5 p-4 p-xl-5">
                                                        <div class="col-12">
                                                            <label for="fullname" class="form-label">Full Name
                                                                <span class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" id="name"
                                                                name="name" value="" required>
                                                        </div>
                                                        <div class="col-12 col-md-6">
                                                            <label for="email" class="form-label">Email <span
                                                                    class="text-danger">*</span></label>
                                                            <div class="input-group">
                                                                <span class="input-group-text">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        width="16" height="16"
                                                                        fill="currentColor" class="bi bi-envelope"
                                                                        viewBox="0 0 16 16">
                                                                        <path
                                                                            d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z" />
                                                                    </svg>
                                                                </span>
                                                                <input type="email" class="form-control"
                                                                    id="email" name="email" value=""
                                                                    required>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-md-6">
                                                            <label for="phone" class="form-label">Phone
                                                                Number</label>
                                                            <div class="input-group">
                                                                <span class="input-group-text">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        width="16" height="16"
                                                                        fill="currentColor" class="bi bi-telephone"
                                                                        viewBox="0 0 16 16">
                                                                        <path
                                                                            d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
                                                                    </svg>
                                                                </span>
                                                                <input type="tel" class="form-control"
                                                                    id="phone" name="phone" value="">
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <label for="subject" class="form-label">Subject <span
                                                                    class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" id="subject"
                                                                name="subject" value="" required>
                                                        </div>
                                                        <div class="col-12">
                                                            <label for="message" class="form-label">Message <span
                                                                    class="text-danger">*</span></label>
                                                            <textarea class="form-control" id="message" name="message" rows="3" required></textarea>
                                                        </div>

                                                        @if (session('success'))
                                                            <div class="alert alert-success alert-dismissible fade show"
                                                                role="alert">
                                                                {{ session('success') }}
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="alert"
                                                                    aria-label="Close"></button>
                                                            </div>
                                                        @else
                                                            <div class="col-12">
                                                                <div class="d-grid">
                                                                    <button class="btn btn-primary btn-lg"
                                                                        type="submit">Send Message</button>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    @endif

    </div>

    <!-- Footer -->
    <footer class="text-center text-lg-start bg-body-tertiary text-muted">
        <!-- Section: Social media -->
        <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
            <!-- Left -->
            <div class="me-5 d-none d-lg-block">
                {{-- <span>Get connected with us on social networks:</span> --}}
            </div>
            <!-- Left -->

            <!-- Right -->
            <div>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-google"></i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-linkedin"></i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-github"></i>
                </a>
            </div>
            <!-- Right -->
        </section>
        <!-- Section: Social media -->

        <!-- Section: Links  -->
        <section class="">
            <div class="container text-center text-md-start mt-5">
                <!-- Grid row -->
                <div class="row mt-3">
                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                        <!-- Content -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            <i class="fas fa-gem me-3"></i>Company name
                        </h6>
                        <p>
                            Here you can use rows and columns to organize your footer content. Lorem ipsum
                            dolor sit amet, consectetur adipisicing elit.
                        </p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            Products
                        </h6>
                        <p>
                            <a href="#!" class="text-reset">Angular</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">React</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">Vue</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">Laravel</a>
                        </p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            Useful links
                        </h6>
                        <p>
                            <a href="#!" class="text-reset">Pricing</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">Settings</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">Orders</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">Help</a>
                        </p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
                        <p><i class="fas fa-home me-3"></i> New York, NY 10012, US</p>
                        <p>
                            <i class="fas fa-envelope me-3"></i>
                            info@example.com
                        </p>
                        <p><i class="fas fa-phone me-3"></i> + 01 234 567 88</p>
                        <p><i class="fas fa-print me-3"></i> + 01 234 567 89</p>
                    </div>
                    <!-- Grid column -->
                </div>
                <!-- Grid row -->
            </div>
        </section>
        <!-- Section: Links  -->

        <!-- Copyright -->
        <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
            © 2024 Copyright:
            <a class="text-reset fw-bold" href="https://mdbootstrap.com/">MDBootstrap.com</a>
        </div>
        <!-- Copyright -->
    </footer>
    <!-- Footer -->
</x-app-layout>
