<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css', 'resources/js/app.js')
    <title>Document test</title>
    <script src="//unpkg.com/alpinejs" defer></script>
</head>
<body>
<header class="w-full h-auto absolute top-0 z-[999] py-[2rem]">
    <div class="max-w-[1400px] mx-auto h-full flex items-center justify-between px-[1rem]">
        <a href="/">
            <img src="{{ Vite::asset('resources/images/logo-legoland.png') }}" class="max-w-[150px]">
        </a>
        <ul class="hidden lg:flex gap-[2rem] items-center text-white">
            <li><a href="/attracties">Attracties</a></li>
            <li><a href="/openingstijden">Openingstijden</a></li>
            <li><a href="/tickets">Tickets</a></li>
            <li><a href="/contact">Contact</a></li>
            <li><a href="/accommodaties">Accommodaties</a></li>
            @auth
            <li><a href="/dashboard">Dashboard</a></li>
            @endauth
            @auth
            <li><a href="/register">Register</a></li>
            @endauth
            @guest
                <p><a href="/login">login</a></p>
            @endguest
        </ul>
        <div class="lg:hidden flex hover:cursor-pointer" id="hamburger-icon">
            <svg width="40px" height="40px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M5 6.5H19V8H5V6.5Z" fill="#fff"/>
            <path d="M5 16.5H19V18H5V16.5Z" fill="#fff"/>
            <path d="M5 11.5H19V13H5V11.5Z" fill="#fff"/>
            </svg>
        </div>
    </div>
</header>
<div class="w-full h-screen fixed z-[999] bg-red-600 hidden" id="mobile-menu">
    <div class="max-w-[1400px] mx-auto h-auto flex items-center justify-between px-[1rem] py-[2rem]">
        <a href="/">
            <img src="{{ Vite::asset('resources/images/logo-legoland.png') }}" class="max-w-[150px]">
        </a>
        <div class="lg:hidden flex hover:cursor-pointer" id="close-icon">
            <svg width="40px" height="40px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M10.9393 12L6.9696 15.9697L8.03026 17.0304L12 13.0607L15.9697 17.0304L17.0304 15.9697L13.0607 12L17.0303 8.03039L15.9696 6.96973L12 10.9393L8.03038 6.96973L6.96972 8.03039L10.9393 12Z" fill="#fff"/>
            </svg>
        </div>
    </div>
    <ul class="flex flex-col gap-[2rem] items-center text-white text-center mt-[3rem]">
        <li><a href="/attracties">Attracties</a></li>
        <li><a href="/openingstijden">Openingstijden</a></li>
        <li><a href="/tickets">Tickets</a></li>
        <li><a href="/contact">Contact</a></li>
    </ul>
</div>
@yield('content')
<div class="w-full h-auto py-[4rem] bg-[#282828]">
    <div class="max-w-[1400px] h-full mx-auto flex gap-[5rem]">
        <div class="w-[25%] h-full">
            <img src="{{ Vite::asset('resources/images/logo-legoland.png') }}" class="max-w-[150px] mb-[1rem]">
            <p class="leading-[2] opacity-75 text-white">Stap binnen in de betoverende wereld van Legoland, waar fantasie tot leven komt! Ontdek eindeloos plezier, spannende attracties en unieke ervaringen voor het hele gezin.</p>
        </div>
        <div class="w-[75%] h-full"></div>
    </div>
</div>
<script>
// Elementen selecteren
const mobileMenu = document.getElementById("mobile-menu");
const hamburgerIcon = document.getElementById("hamburger-icon");
const closeIcon = document.getElementById("close-icon");
// Functie om het mobiele menu te toggle
function toggleMobileMenu() {
    mobileMenu.classList.toggle("hidden");
}

// Klikgebeurtenis toevoegen aan het hamburger-icoon
hamburgerIcon.addEventListener("click", function() {
    console.log("test");
    toggleMobileMenu();
});

// Klikgebeurtenis toevoegen aan het sluit-icoon
closeIcon.addEventListener("click", function() {
    toggleMobileMenu();
});
</script>
</body>
</html>