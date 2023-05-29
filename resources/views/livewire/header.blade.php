<!DOCTYPE html>
<html>

<head>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Nunito+Sans&family=Raleway:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
        crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/brands.min.css"
        integrity="sha512-apX8rFN/KxJW8rniQbkvzrshQ3KvyEH+4szT3Sno5svdr6E/CP0QE862yEeLBMUnCqLko8QaugGkzvWS7uNfFQ=="
        crossorigin="anonymous" />
    <script src="https://cdn.tailwindcss.com/3.1.6"></script>
    <meta charSet="UTF-8" />
</head>

<body>
    <div
        class="bg-white pt-6 pr-4 pb-6 pl-4 mr-auto ml-auto flex flex-col items-center max-w-screen-2xl relative
    lg:flex-row lg:py-15 xl:py-20 md:px-8">
        <div
            class="flex justify-center items-center w-full h-full lg:w-1/2 lg:justify-end lg:bottom-0 lg:left-0
      lg:items-center">
            <img src="https://images.unsplash.com/photo-1470290282174-30ea78123183?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=735&q=80"
                class="object-contain object-top btn- w-full h-auto lg:w-auto
        lg:h-full" />
        </div>
        <div class="mr-auto ml-auto flex justify-end relative max-w-xl xl:pr-32 lg:max-w-screen-xl">
            <div class="mb-16 lg:pr-5 lg:max-w-lg lg:mb-0">
                <div class="mb-6 max-w-xl">
                    <p
                        class="inline-block pt-1 pr-3 pb-1 pl-3 mb-4 text-pink-200 bg-pink-500 rounded-2xl uppercase text-xs
            font-semibold tracking-wider">
                        Amazing Deals</p>
                    <div
                        class="text-3xl font-bold tracking-tight text-gray-900 max-w-lg sm:text-4xl sm:leading-none mb-6">
                        <p class="text-gray-900 text-3xl font-bold tracking-tight sm:text-4xl sm:leading-none">Flights
                            to take</p>
                        <p
                            class="inline-block text-gray-900 text-3xl font-bold tracking-tight mr-2 sm:text-4xl
              sm:leading-none">
                            you</p>
                        <p
                            class="inline-block text-blue-700 text-3xl font-bold tracking-tight sm:text-4xl
              sm:leading-none">
                            anywhere</p>
                    </div>
                    <p class="text-gray-700 text-base md:text-lg">Trip Builder lets you find great deals of flights,
                        easing the process of letting you plan your dream trip!</p>
                </div>
                <div class="flex items-center mt-4 mr-0 mb-0 ml-0">
                    <button
                        class="transition duration-200 hover:bg-blue-900 focus:shadow-outline focus:outline-none bg-blue-700
            text-white inline-flex font-semibold tracking-wide text-medium h-12 rounded-md shadow-md items-center
            justify-center pr-6 pl-6 mr-6"><a
                            href="{{ route('search') }}">Plan your trip</a></button>
                </div>
            </div>
        </div>
    </div>
    <script>
        const btn = document.querySelector(".mobile-menu-button");
        const menu = document.querySelector(".mobile-menu");
        btn.addEventListener("click", () => {
            menu.classList.toggle("hidden");
        });
    </script>


</body>

</html>
