<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css', 'resources/js/app.js')
    <title>Document</title>
</head>
<body>
    @extends('layout')

    @section('content')
    <div class="subpage-hero" style="background-image: url('{{ Vite::asset('resources/images/subpage-bg.png') }}')">
        <div class="max-w-[1400px] h-full mx-auto flex flex-col items-center justify-center">
            <h1 class="text-[55px] font-[700] text-white">Contact</h1>
        </div>
    </div>
    <div class="w-full h-auto">
        <div class="max-w-[1400px] h-full p-[1rem] md:p-[2rem] lg:p-[4rem] bg-white rounded-[25px] -mt-[4rem] mx-auto flex-col md:flex-row flex gap-[2rem]">
            <div class="w-[100%] md:w-[30%] h-full">
                <div class="w-full h-auto p-[1rem] border-[1px] border-[#f1f1f1] rounded-[10px]">
                    <div class="flex items-center gap-[1rem]">
                        <svg width="20px" height="20px" viewBox="-3 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            
                            <title>pin_rounded_circle [#619]</title>
                            <desc>Created with Sketch.</desc>
                            <defs>

                        </defs>
                            <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g id="Dribbble-Light-Preview" transform="translate(-423.000000, -5439.000000)" fill="#000000">
                                    <g id="icons" transform="translate(56.000000, 160.000000)">
                                        <path d="M376,5286.219 C376,5287.324 375.105,5288.219 374,5288.219 C372.895,5288.219 372,5287.324 372,5286.219 C372,5285.114 372.895,5284.219 374,5284.219 C375.105,5284.219 376,5285.114 376,5286.219 M374,5297 C372.178,5297 369,5290.01 369,5286 C369,5283.243 371.243,5281 374,5281 C376.757,5281 379,5283.243 379,5286 C379,5290.01 375.822,5297 374,5297 M374,5279 C370.134,5279 367,5282.134 367,5286 C367,5289.866 370.134,5299 374,5299 C377.866,5299 381,5289.866 381,5286 C381,5282.134 377.866,5279 374,5279" id="pin_rounded_circle-[#619]">

                        </path>
                                    </g>
                                </g>
                            </g>
                        </svg>
                        <p class="text-[16px] font-[600]">Keppelseweg 412, 7009AE Doetinchem</p>
                    </div>
                    <div class="flex items-center gap-[1rem]">
                    <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10.0376 5.31617L10.6866 6.4791C11.2723 7.52858 11.0372 8.90532 10.1147 9.8278C10.1147 9.8278 10.1147 9.8278 10.1147 9.8278C10.1146 9.82792 8.99588 10.9468 11.0245 12.9755C13.0525 15.0035 14.1714 13.8861 14.1722 13.8853C14.1722 13.8853 14.1722 13.8853 14.1722 13.8853C15.0947 12.9628 16.4714 12.7277 17.5209 13.3134L18.6838 13.9624C20.2686 14.8468 20.4557 17.0692 19.0628 18.4622C18.2258 19.2992 17.2004 19.9505 16.0669 19.9934C14.1588 20.0658 10.9183 19.5829 7.6677 16.3323C4.41713 13.0817 3.93421 9.84122 4.00655 7.93309C4.04952 6.7996 4.7008 5.77423 5.53781 4.93723C6.93076 3.54428 9.15317 3.73144 10.0376 5.31617Z" fill="#000"/>
                    </svg>
                        <p class="text-[16px] font-[600]">+31 (0) 6 11 22 33 44</p>
                    </div>
                    <div class="flex items-center gap-[1rem]">
                    <svg width="20px" height="20px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <title/>
                    <g id="Complete">
                    <g id="mail">
                    <g>
                    <polyline fill="none" points="4 8.2 12 14.1 20 8.2" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                    <rect fill="none" height="14" rx="2" ry="2" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" width="18" x="3" y="6.5"/>
                    </g>
                    </g>
                    </g>
                    </svg>
                        <p class="text-[16px] font-[600]">info@legolanddoetinchem.nl</p>
                    </div>
                </div>
                <img src="{{ Vite::asset('resources/images/google-maps.png') }}" class="w-full h-auto mt-[2rem]">
            </div>
            <div class="w-[100%] md:w-[70%] h-full">
                <form action="/contact/verzenden" method="POST">
                    @csrf
                    <p class="mb-[0.5rem] font-[600]">Uw naam</p>
                    <input type="text" name="naam" class="w-full h-auto p-[1rem] border-[1px] border-[#f1f1f1] rounded-[5px]" placeholder="Typ hier uw voornaam en achternaam..." required>
                    <p class="mt-[2rem] mb-[0.5rem] font-[600]">E-mailadres</p>
                    <input type="text" name="email" class="w-full h-auto p-[1rem] border-[1px] border-[#f1f1f1] rounded-[5px]" placeholder="bijv: uwnaam@gmail.com" required>
                    <p class="mt-[2rem] mb-[0.5rem] font-[600]">Onderwerp</p>
                    <input type="text" name="onderwerp" class="w-full h-auto p-[1rem] border-[1px] border-[#f1f1f1] rounded-[5px]" placeholder="Wat is het onderwerp van uw vraag?" required>
                    <p class="mt-[2rem] mb-[0.5rem] font-[600]">Bericht</p>
                    <textarea name="bericht" class="w-full p-[1rem] border-[1px] border-[#f1f1f1] rounded-[5px] h-[100px]" placeholder="Vertel ons zo duidelijk mogelijk wat er aan de hand is..." required></textarea>
                    <input type="submit" name="bestellen" class="w-full h-auto py-[1rem] bg-red-500 text-white flex items-center justify-center rounded-[10px] mt-[2rem]">
                </form>
            </div>
        </div>
    </div>
    @endsection
</body>
</html>