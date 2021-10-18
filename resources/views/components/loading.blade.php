<div>
    <style>
        .loader-dots div {
            animation-timing-function: cubic-bezier(0, 1, 1, 0);
        }

        .loader-dots div:nth-child(1) {
            left: 8px;
            animation: loader-dots1 0.6s infinite;
        }

        .loader-dots div:nth-child(2) {
            left: 8px;
            animation: loader-dots2 0.6s infinite;
        }

        .loader-dots div:nth-child(3) {
            left: 32px;
            animation: loader-dots2 0.6s infinite;
        }

        .loader-dots div:nth-child(4) {
            left: 56px;
            animation: loader-dots3 0.6s infinite;
        }

        @keyframes loader-dots1 {
            0% {
                transform: scale(0);
            }

            100% {
                transform: scale(1);
            }
        }

        @keyframes loader-dots3 {
            0% {
                transform: scale(1);
            }

            100% {
                transform: scale(0);
            }
        }

        @keyframes loader-dots2 {
            0% {
                transform: translate(0, 0);
            }

            100% {
                transform: translate(24px, 0);
            }
        }

    </style>

    <div class="bg-white border-2  py-2 px-5 rounded-lg flex items-center flex-col">
        <div class="loader-dots block relative w-20 h-5 mt-2">
            <div class="absolute top-0 mt-1 w-3 h-3 rounded-full bg-blue-500"></div>
            <div class="absolute top-0 mt-1 w-3 h-3 rounded-full bg-pink-500"></div>
            <div class="absolute top-0 mt-1 w-3 h-3 rounded-full bg-yellow-200"></div>
            <div class="absolute top-0 mt-1 w-3 h-3 rounded-full bg-yellow-200"></div>                                                
        </div>
        <div class="text-red-500 text-xs font-light mt-2 text-center ">
            Cargando, por favor espere..!!!
        </div>
    </div>
</div>