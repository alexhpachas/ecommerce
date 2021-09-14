<x-app-layout>
    <div class="container py-7">

        <div class=" grid lg:grid-cols-5 gap-5 mb-10 ">

            <a href="{{ route('orders.index') . '?status=1' }}">
                <div
                    class="bg-white max-w-full shadow-lg   mx-auto border-b-4 border-gray-500 rounded-2xl overflow-hidden opacity-75  hover:shadow-2xl transition duration-500 transform hover:scale-105 cursor-pointer">
                    <div class="bg-gray-500  flex h-20  items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="50" height="50"
                            viewBox="0 0 172 172" style=" fill:#000000;">
                            <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt"
                                stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0"
                                font-family="none" font-weight="none" font-size="none" text-anchor="none"
                                style="mix-blend-mode: normal">
                                <path d="M0,172v-172h172v172z" fill="none"></path>
                                <g fill="#ffffff">
                                    <path
                                        d="M70.95,30.96c-1.37062,0 -2.64719,0.20156 -3.87,0.5375c-0.95406,0.25531 -1.935,0.5375 -2.795,0.9675c-0.04031,0.01344 -0.06719,0.08063 -0.1075,0.1075c-0.92719,0.48375 -1.77375,1.08844 -2.58,1.72c-0.04031,0.02688 -0.06719,0.08063 -0.1075,0.1075c-0.79281,0.645 -1.49156,1.29 -2.15,2.0425c-0.02687,0.04031 -0.08062,0.06719 -0.1075,0.1075c-0.69875,0.80625 -1.30344,1.70656 -1.8275,2.58c-1.65281,-0.63156 -3.30562,-0.99437 -4.8375,-1.075c-2.53969,-0.12094 -4.81062,0.43 -6.7725,1.505c-3.91031,2.15 -6.665,5.41531 -9.5675,7.8475c-2.96969,2.48594 -11.85187,9.01656 -19.78,14.7275c-7.92812,5.71094 -14.9425,10.75 -14.9425,10.75c-1.22281,0.59125 -1.97531,1.84094 -1.935,3.19813c0.04031,1.35719 0.87344,2.56656 2.12313,3.07719c1.26312,0.52406 2.70094,0.25531 3.68187,-0.68531c0,0 7.2025,-5.01219 15.1575,-10.75c7.955,-5.73781 16.64906,-12.06687 20.21,-15.05c3.45344,-2.9025 6.11406,-5.84531 8.385,-7.095c1.86781,-1.02125 3.31906,-1.31687 6.02,0c-0.05375,0.47031 -0.1075,0.94063 -0.1075,1.3975v40.9575l-4.73,2.15c-1.26312,0.38969 -2.19031,1.49156 -2.37844,2.795c-0.18813,1.31688 0.40312,2.62031 1.505,3.35938c1.10187,0.72562 2.52625,0.76594 3.66844,0.08062l31.82,-14.62h0.1075c4.52844,-2.41875 9.27188,-4.63594 12.9,-5.375c3.62813,-0.73906 5.44219,-0.43 6.9875,1.6125c1.81406,2.39188 2.23063,5.02563 1.3975,7.955c-0.83312,2.92938 -3.05031,6.11406 -6.88,8.815c-8.02219,5.67063 -20.425,9.89 -20.425,9.89l-0.645,0.215l-0.5375,0.43c-6.38281,5.42875 -10.07812,10.58875 -14.7275,14.0825c-4.64937,3.49375 -10.40062,5.805 -22.2525,5.805h-0.215l-37.41,2.15c-1.89469,0.12094 -3.34594,1.76031 -3.225,3.655c0.12094,1.89469 1.76031,3.34594 3.655,3.225l37.195,-2.15c0.08063,0 0.13438,0 0.215,0c8.78813,-0.02687 15.17094,-1.47812 20.21,-3.7625c0.87344,2.58 2.67406,4.78375 5.4825,5.6975c3.95063,1.27656 7.8475,0.90031 10.965,-0.43c1.38406,-0.59125 2.64719,-1.3975 3.7625,-2.2575c1.08844,2.49938 3.03688,4.8375 6.02,5.9125c3.13094,1.12875 6.24844,1.38406 9.03,0.645c2.78156,-0.73906 5.0525,-2.31125 7.2025,-4.3c0.36281,-0.33594 0.60469,-0.59125 0.86,-0.86c0.72563,0.49719 1.55875,0.83313 2.4725,1.075c4.46125,1.16906 9.675,-0.1075 13.6525,-4.085c3.49375,-3.49375 5.59,-8.85531 6.3425,-16.125h29.9925c1.03469,0 2.02906,-0.12094 3.01,-0.3225c4.86438,-1.00781 8.85531,-4.42094 10.75,-8.9225c0.37625,-0.90031 0.65844,-1.81406 0.86,-2.795c0.20156,-0.98094 0.3225,-1.97531 0.3225,-3.01v-51.815c0,-0.52406 -0.05375,-0.99437 -0.1075,-1.505c-0.17469,-1.51844 -0.55094,-3.01 -1.1825,-4.4075c-0.41656,-0.98094 -0.90031,-1.81406 -1.505,-2.6875c-0.01344,-0.02687 0.01344,-0.08062 0,-0.1075c-2.365,-3.37281 -6.00656,-5.84531 -10.105,-6.665c-1.00781,-0.215 -1.96187,-0.3225 -3.01,-0.3225zM61.92,48.16h103.2v13.76h-103.2zM79.12,113.52h2.365c-0.20156,2.41875 -0.55094,6.06031 -0.9675,8.385c-0.05375,0.28219 -0.06719,0.56438 -0.1075,0.86c-0.18812,0.12094 -0.37625,0.26875 -0.5375,0.43c-1.47812,1.76031 -3.18469,3.225 -4.945,3.9775c-1.76031,0.7525 -3.52062,1.02125 -6.02,0.215c-0.61812,-0.20156 -1.31687,-1.19594 -1.3975,-2.795c4.43438,-3.38625 7.69969,-7.22937 11.61,-11.0725zM88.4725,113.52h12.9c-0.24187,1.59906 -0.45687,3.42656 -0.645,5.2675c-0.22844,2.24406 -0.43,4.93156 0.1075,7.6325c-0.18812,0.25531 -0.26875,0.30906 -0.5375,0.645c-0.56437,0.71219 -1.55875,1.74688 -1.1825,1.3975c-1.67969,1.55875 -3.1175,2.44563 -4.4075,2.795c-1.29,0.34938 -2.64719,0.25531 -4.8375,-0.5375c-1.16906,-0.41656 -1.77375,-1.16906 -2.2575,-2.58c-0.48375,-1.41094 -0.61812,-3.41312 -0.3225,-5.0525c0.59125,-3.25187 1.00781,-7.40406 1.1825,-9.5675zM108.36,113.52h11.7175c-0.69875,5.79156 -2.29781,9.39281 -4.1925,11.2875c-2.55312,2.55313 -4.71656,2.87563 -7.095,2.2575c-0.79281,-0.215 -0.86,-0.40312 -1.1825,-1.8275c-0.3225,-1.42437 -0.3225,-3.655 -0.1075,-5.6975c0.22844,-2.20375 0.56438,-4.34031 0.86,-6.02z">
                                    </path>
                                </g>
                            </g>
                        </svg>
                        <p class="ml-4 text-white uppercase">POR PAGAR</p>
                    </div>
                    <p class="py-6 px-6 text-lg tracking-wide text-center">Tiene {{ $pendiente }} pedidos por pagar
                    </p>

                    {{-- <div class="flex justify-center px-5 mb-2 text-sm ">
                        <button type="button" class="w-full border border-gray-500 text-gray-500 rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:text-white hover:bg-gray-600 focus:outline-none focus:shadow-outline">
                            Details
                        </button>
                    </div> --}}
                </div>
            </a>

            <a href="{{ route('orders.index') . '?status=2' }}">
                <div class="bg-white max-w-full shadow-lg   mx-auto border-b-4 border-green-500 rounded-2xl overflow-hidden opacity-75 hover:shadow-2xl transition duration-500 transform hover:scale-105 cursor-pointer">
                    <div class="bg-green-500  flex h-20  items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="50" height="50"
                            viewBox="0 0 172 172" style=" fill:#000000;">
                            <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt"
                                stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0"
                                font-family="none" font-weight="none" font-size="none" text-anchor="none"
                                style="mix-blend-mode: normal">
                                <path d="M0,172v-172h172v172z" fill="none" stroke="none"></path>
                                <g id="original-icon" fill="#ffffff" stroke="none" opacity="0" visibility="hidden">
                                    <path
                                        d="M24.08,30.96c-9.46,0 -17.2,7.74 -17.2,17.2v75.68c0,9.46 7.74,17.2 17.2,17.2h123.84c9.46,0 17.2,-7.74 17.2,-17.2v-75.68c0,-9.46 -7.74,-17.2 -17.2,-17.2zM24.08,37.84h123.84c5.73781,0 10.32,4.58219 10.32,10.32v6.88h-144.48v-6.88c0,-5.73781 4.58219,-10.32 10.32,-10.32zM13.76,72.24h144.48v51.6c0,5.73781 -4.58219,10.32 -10.32,10.32h-123.84c-5.73781,0 -10.32,-4.58219 -10.32,-10.32zM30.96,82.56v6.88h55.04v-6.88z">
                                    </path>
                                </g>
                                <g id="subtracted-icon" fill="#ffffff" stroke="none">
                                    <path
                                        d="M147.92,30.96c9.46,0 17.2,7.74 17.2,17.2v75.68c0,9.46 -7.74,17.2 -17.2,17.2h-39.92803l6.93022,-6.88h32.99782c5.73781,0 10.32,-4.58219 10.32,-10.32v-51.6h-144.48v51.6c0,5.73781 4.58219,10.32 10.32,10.32h44.17231l6.88,6.88h-51.05231c-9.46,0 -17.2,-7.74 -17.2,-17.2v-75.68c0,-9.46 7.74,-17.2 17.2,-17.2zM13.76,48.16v6.88h144.48v-6.88c0,-5.73781 -4.58219,-10.32 -10.32,-10.32h-123.84c-5.73781,0 -10.32,4.58219 -10.32,10.32zM86,82.56v6.88h-55.04v-6.88z">
                                    </path>
                                </g>
                                <g stroke="none">
                                    <g fill="#ffffff">
                                        <g id="Слой_2" font-family="Inter, sans-serif" font-weight="400" font-size="16"
                                            text-anchor="start" visibility="hidden"></g>
                                        <g id="Android_x5F_4" font-family="Inter, sans-serif" font-weight="400"
                                            font-size="16" text-anchor="start" visibility="hidden"></g>
                                        <g id="Android_x5F_5" font-family="Inter, sans-serif" font-weight="400"
                                            font-size="16" text-anchor="start" visibility="hidden"></g>
                                        <g id="Windows_x5F_8" font-family="Inter, sans-serif" font-weight="400"
                                            font-size="16" text-anchor="start" visibility="hidden"></g>
                                        <g id="Windows_x5F_10" font-family="Inter, sans-serif" font-weight="400"
                                            font-size="16" text-anchor="start" visibility="hidden"></g>
                                        <g id="Color" font-family="Inter, sans-serif" font-weight="400" font-size="16"
                                            text-anchor="start" visibility="hidden"></g>
                                        <g id="IOS" font-family="Inter, sans-serif" font-weight="400" font-size="16"
                                            text-anchor="start" visibility="hidden"></g>
                                        <g id="IOS_copy">
                                            <path
                                                d="M91.68462,148l-25.46923,-25.46923l4.63077,-4.63077l20.83846,20.83846l40.68462,-40.68462l4.63077,4.63077z">
                                            </path>
                                        </g>
                                    </g>
                                    <g fill="#000000" opacity="0">
                                        <g id="IOS" font-family="Inter, sans-serif" font-weight="400" font-size="16"
                                            text-anchor="start" visibility="hidden"></g>
                                        <g id="IOS_copy">
                                            <path
                                                d="M136.83462,93.25769l-4.63077,-4.63077l-4.63077,4.63077l-36.05385,36.05385l-15.87692,-16.20769l-4.96154,-4.63077l-4.63077,4.63077l-4.63077,4.63077l-4.63077,4.63077l4.63077,4.96154l25.46923,25.46923l4.63077,4.63077l4.63077,-4.63077l45.64615,-45.31538l4.63077,-4.96154l-4.63077,-4.63077z">
                                            </path>
                                        </g>
                                    </g>
                                </g>
                                <path d="M66.21538,148v-49.94615h70.78462v49.94615z" id="overlay-drag" fill="#ff0000"
                                    stroke="none" opacity="0"></path>
                            </g>
                        </svg>
                        <p class="ml-4 text-white uppercase">CONFIRMADO</p>
                    </div>
                    <p class="py-6 px-6 text-lg tracking-wide text-center">Tiene {{ $recibido }} pedidos pagados
                    </p>

                    {{-- <div class="flex justify-center px-5 mb-2 text-sm ">
                        <button type="button" class="w-full border border-green-500 text-green-500 rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:text-white hover:bg-green-600 focus:outline-none focus:shadow-outline">
                            Details
                        </button>
                    </div> --}}
                </div>
            </a>

            <a href="{{ route('orders.index') . '?status=3' }}">
                <div
                    class="bg-white max-w-full shadow-lg   mx-auto border-b-4 border-yellow-500 rounded-2xl overflow-hidden opacity-75  hover:shadow-2xl transition duration-500 transform hover:scale-105 cursor-pointer">
                    <div class="bg-yellow-500  flex h-20  items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="50" height="50"
                            viewBox="0 0 172 172" style=" fill:#000000;">
                            <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt"
                                stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0"
                                font-family="none" font-weight="none" font-size="none" text-anchor="none"
                                style="mix-blend-mode: normal">
                                <path d="M0,172v-172h172v172z" fill="none"></path>
                                <g fill="#ffffff">
                                    <path
                                        d="M9.7825,44.72c-5.40187,0 -9.7825,4.39406 -9.7825,9.7825v89.9775c0,5.38844 4.91813,10.32 10.32,10.32h14.0825c1.63938,9.75563 10.105,17.2 20.3175,17.2c10.2125,0 18.67813,-7.44437 20.3175,-17.2h31.82c5.38844,0 9.7825,-4.39406 9.7825,-9.7825v-90.3c0,-5.50937 -4.34031,-9.9975 -9.675,-9.9975zM113.52,68.8v86c1.65281,9.74219 10.4275,17.2 20.64,17.2c10.2125,0 18.67813,-7.45781 20.3175,-17.2h7.2025c5.40188,0 10.32,-4.91812 10.32,-10.32v-33.11c0,-6.92031 -4.98531,-13.98844 -5.59,-14.835l-14.2975,-19.135c-3.27875,-3.95062 -8.42531,-8.6 -14.5125,-8.6zM130.72,86h19.2425l10.965,14.62c1.16906,1.65281 4.1925,6.71875 4.1925,10.75v2.15h-34.4c-3.44,0 -6.88,-3.44 -6.88,-6.88v-13.76c0,-3.80281 3.44,-6.88 6.88,-6.88zM44.72,137.6c7.59219,0 13.76,6.16781 13.76,13.76c0,7.59219 -6.16781,13.76 -13.76,13.76c-7.59219,0 -13.76,-6.16781 -13.76,-13.76c0,-7.59219 6.16781,-13.76 13.76,-13.76zM134.16,137.6c7.59219,0 13.76,6.16781 13.76,13.76c0,7.59219 -6.16781,13.76 -13.76,13.76c-7.59219,0 -13.76,-6.16781 -13.76,-13.76c0,-7.59219 6.16781,-13.76 13.76,-13.76z">
                                    </path>
                                </g>
                            </g>
                        </svg>
                        <p class="ml-4 text-white uppercase">ENVIADO</p>
                    </div>
                    <p class="py-6 px-6 text-lg tracking-wide text-center">Tiene {{ $enviado }} pedidos enviados
                    </p>

                    {{-- <div class="flex justify-center px-5 mb-2 text-sm ">
                        <button type="button" class="w-full border border-yellow-500 text-yellow-500 rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:text-white hover:bg-yellow-600 focus:outline-none focus:shadow-outline">
                            Details
                        </button>
                    </div> --}}
                </div>
            </a>

            <a href="{{ route('orders.index') . '?status=4' }}">
                <div
                    class="bg-white max-w-full shadow-lg   mx-auto border-b-4 border-pink-500 rounded-2xl overflow-hidden opacity-75  hover:shadow-2xl transition duration-500 transform hover:scale-105 cursor-pointer">
                    <div class="bg-pink-500  flex h-20  items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="50" height="50"
                            viewBox="0 0 172 172" style=" fill:#000000;">
                            <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt"
                                stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0"
                                font-family="none" font-weight="none" font-size="none" text-anchor="none"
                                style="mix-blend-mode: normal">
                                <path d="M0,172v-172h172v172z" fill="none"></path>
                                <g fill="#ffffff">
                                    <path
                                        d="M63.64,10.32c-4.74965,0 -8.6,3.85035 -8.6,8.6c0,4.74965 3.85035,8.6 8.6,8.6c4.74965,0 8.6,-3.85035 8.6,-8.6c0,-4.74965 -3.85035,-8.6 -8.6,-8.6zM108.36,10.32c-4.74965,0 -8.6,3.85035 -8.6,8.6c0,4.74965 3.85035,8.6 8.6,8.6c4.74965,0 8.6,-3.85035 8.6,-8.6c0,-4.74965 -3.85035,-8.6 -8.6,-8.6zM117.04735,41.18594c-1.17822,-0.00775 -2.27846,0.588 -2.91594,1.57891c0,0 -11.15123,15.71515 -28.1314,15.71515c-16.98018,0 -28.1314,-15.71515 -28.1314,-15.71515c-0.65265,-0.97448 -1.75678,-1.54933 -2.92938,-1.52516c-1.27422,0.02755 -2.42881,0.75729 -3.00048,1.89641c-0.57167,1.13912 -0.46675,2.50095 0.27267,3.53906c0,0 12.66733,18.68485 33.7886,18.68485c21.12126,0 33.7886,-18.68485 33.7886,-18.68485c0.77164,-1.0408 0.8931,-2.42686 0.31424,-3.58601c-0.57886,-1.15914 -1.75987,-1.89477 -3.05549,-1.90321zM41.33375,50.85422c-0.4253,0.00088 -0.84674,0.08062 -1.24297,0.23515l-20.64,7.60563c-1.03516,0.33242 -1.85228,1.13459 -2.20375,2.16344l-16.72297,26.76078c-0.54672,0.87765 -0.6697,1.95465 -0.33492,2.93295c0.33479,0.97831 1.09184,1.75415 2.06164,2.11283l14.94922,5.50937v39.42563c0.00132,1.44013 0.89948,2.72705 2.25078,3.225l65.36,24.08c0.7676,0.28277 1.61084,0.28277 2.37844,0l65.36,-24.08c1.35131,-0.49795 2.24947,-1.78487 2.25078,-3.225v-39.42563l14.94922,-5.50937c0.9698,-0.35868 1.72685,-1.13452 2.06164,-2.11283c0.33479,-0.97831 0.2118,-2.05531 -0.33492,-2.93295l-16.72969,-26.77422c-0.35365,-1.02219 -1.16743,-1.81855 -2.19703,-2.15c-0.04446,-0.0166 -0.08926,-0.03228 -0.13437,-0.04703l-20.50563,-7.5586c-0.4303,-0.16589 -0.88955,-0.24357 -1.35047,-0.22844c-1.64861,0.0612 -3.0217,1.28405 -3.27268,2.91459c-0.25098,1.63054 0.69082,3.20971 2.24471,3.76385l11.88547,4.38063l-55.41625,20.41828l-55.41625,-20.41828l11.88547,-4.38063c1.57961,-0.55656 2.52892,-2.16976 2.24848,-3.82091c-0.28045,-1.65115 -1.70916,-2.86044 -3.38395,-2.86425zM22.07781,66.1125l58.76891,21.64781v0.00672l-13.47781,21.56047l-58.77562,-21.64781zM149.92219,66.1125l13.48453,21.56719l-58.77562,21.64781l-13.4711,-21.56047zM82.56,97.98625v58.75547l-58.48,-21.54031v-34.49406l43.53078,16.03765c1.52827,0.56252 3.24158,-0.02354 4.10515,-1.40422zM89.44,97.98625l10.84406,17.35453c0.86357,1.38068 2.57689,1.96674 4.10515,1.40422l43.53078,-16.03765v34.49406l-58.48,21.54031z">
                                    </path>
                                </g>
                            </g>
                        </svg>
                        <p class="ml-4 text-white uppercase">ENTREGADO</p>
                    </div>
                    <p class="py-6 px-6 text-lg tracking-wide text-center">Tiene {{ $entregado }} pedidos entregados
                    </p>

                    {{-- <div class="flex justify-center px-5 mb-2 text-sm ">
                        <button type="button" class="w-full border border-pink-500 text-pink-500 rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:text-white hover:bg-pink-600 focus:outline-none focus:shadow-outline">
                            Details
                        </button>
                    </div> --}}
                </div>
            </a>

            <a href="{{ route('orders.index') . '?status=5' }}">
                <div
                    class="bg-white max-w-full shadow-lg   mx-auto border-b-4 border-red-500 rounded-2xl overflow-hidden opacity-75 hover:shadow-2xl transition duration-500 transform hover:scale-105 cursor-pointer">
                    <div class="bg-red-500  flex h-20  items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="50" height="50"
                            viewBox="0 0 172 172" style=" fill:#000000;">
                            <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt"
                                stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0"
                                font-family="none" font-weight="none" font-size="none" text-anchor="none"
                                style="mix-blend-mode: normal">
                                <path d="M0,172v-172h172v172z" fill="none"></path>
                                <g fill="#ffffff">
                                    <path
                                        d="M80.625,5.375c-2.6875,0 -5.10205,1.34375 -6.71875,3.49585l-8.0625,12.62915h-30.90625c-4.56665,0 -8.0625,3.49585 -8.0625,8.0625v16.125c0,4.56665 3.49585,8.0625 8.0625,8.0625h0.26245l9.40625,90.03125c0.80835,6.9917 6.4563,12.09375 13.4375,12.09375h66.6626c6.9812,0 12.62915,-5.10205 13.4375,-12.09375l9.40625,-90.03125h0.26245c4.56665,0 8.0625,-3.49585 8.0625,-8.0625v-16.125c0,-4.56665 -3.49585,-8.0625 -8.0625,-8.0625h-30.90625l-8.32495,-12.62915c-1.34375,-2.1521 -4.03125,-3.49585 -6.71875,-3.49585zM80.88745,10.75h21.23755c0.80835,0 1.6167,0.5354 2.1521,1.0708l6.17285,9.6792h-38.1499l6.17285,-9.6792c0.5354,-0.5354 1.34375,-1.0708 2.41455,-1.0708zM34.9375,26.875h112.875c1.6167,0 2.6875,1.0708 2.6875,2.6875v16.125c0,1.6167 -1.0708,2.6875 -2.6875,2.6875h-112.875c-1.6167,0 -2.6875,-1.0708 -2.6875,-2.6875v-16.125c0,-1.6167 1.0708,-2.6875 2.6875,-2.6875zM43,32.25c-1.6167,0 -2.6875,1.0708 -2.6875,2.6875v5.375c0,1.6167 1.0708,2.6875 2.6875,2.6875c1.6167,0 2.6875,-1.0708 2.6875,-2.6875v-5.375c0,-1.6167 -1.0708,-2.6875 -2.6875,-2.6875zM56.4375,32.25c-1.6167,0 -2.6875,1.0708 -2.6875,2.6875v5.375c0,1.6167 1.0708,2.6875 2.6875,2.6875c1.6167,0 2.6875,-1.0708 2.6875,-2.6875v-5.375c0,-1.6167 -1.0708,-2.6875 -2.6875,-2.6875zM69.875,32.25c-1.6167,0 -2.6875,1.0708 -2.6875,2.6875v5.375c0,1.6167 1.0708,2.6875 2.6875,2.6875c1.6167,0 2.6875,-1.0708 2.6875,-2.6875v-5.375c0,-1.6167 -1.0708,-2.6875 -2.6875,-2.6875zM83.3125,32.25c-1.6167,0 -2.6875,1.0708 -2.6875,2.6875v5.375c0,1.6167 1.0708,2.6875 2.6875,2.6875c1.6167,0 2.6875,-1.0708 2.6875,-2.6875v-5.375c0,-1.6167 -1.0708,-2.6875 -2.6875,-2.6875zM99.4375,32.25c-1.6167,0 -2.6875,1.0708 -2.6875,2.6875v5.375c0,1.6167 1.0708,2.6875 2.6875,2.6875c1.6167,0 2.6875,-1.0708 2.6875,-2.6875v-5.375c0,-1.6167 -1.0708,-2.6875 -2.6875,-2.6875zM112.875,32.25c-1.6167,0 -2.6875,1.0708 -2.6875,2.6875v5.375c0,1.6167 1.0708,2.6875 2.6875,2.6875c1.6167,0 2.6875,-1.0708 2.6875,-2.6875v-5.375c0,-1.6167 -1.0708,-2.6875 -2.6875,-2.6875zM126.3125,32.25c-1.6167,0 -2.6875,1.0708 -2.6875,2.6875v5.375c0,1.6167 1.0708,2.6875 2.6875,2.6875c1.6167,0 2.6875,-1.0708 2.6875,-2.6875v-5.375c0,-1.6167 -1.0708,-2.6875 -2.6875,-2.6875zM139.75,32.25c-1.6167,0 -2.6875,1.0708 -2.6875,2.6875v5.375c0,1.6167 1.0708,2.6875 2.6875,2.6875c1.6167,0 2.6875,-1.0708 2.6875,-2.6875v-5.375c0,-1.6167 -1.0708,-2.6875 -2.6875,-2.6875zM40.57495,53.75h101.6001l-9.40625,89.49585c-0.5459,4.03125 -3.7688,7.25415 -8.0625,7.25415h-66.6626c-4.03125,0 -7.5166,-3.2229 -8.0625,-7.25415zM91.375,67.1875c-1.6167,0 -2.6875,1.0708 -2.6875,2.6875v53.75c0,1.6167 1.0708,2.6875 2.6875,2.6875c1.6167,0 2.6875,-1.0708 2.6875,-2.6875v-53.75c0,-1.6167 -1.0708,-2.6875 -2.6875,-2.6875zM67.1875,67.44995c-1.6167,0 -2.6875,1.34375 -2.42505,2.6875l2.6875,53.75c-0.26245,1.34375 1.0813,2.42505 2.42505,2.42505c1.6167,0 2.6875,-1.34375 2.6875,-2.6875l-2.6875,-53.75c0,-1.6167 -1.34375,-2.6875 -2.6875,-2.42505zM115.82495,67.44995c-1.6062,0 -2.6875,1.0813 -2.6875,2.42505l-2.6875,53.75c-0.26245,1.34375 0.80835,2.6875 2.42505,2.6875c1.6167,0 2.6875,-1.0813 2.6875,-2.42505l2.6875,-53.75c0,-1.6062 -1.0813,-2.6875 -2.42505,-2.6875zM61.8125,139.75c-1.6167,0 -2.6875,1.0708 -2.6875,2.6875c0,1.6167 1.0708,2.6875 2.6875,2.6875h37.625c1.6167,0 2.6875,-1.0708 2.6875,-2.6875c0,-1.6167 -1.0708,-2.6875 -2.6875,-2.6875zM110.1875,139.75c-1.6167,0 -2.6875,1.0708 -2.6875,2.6875c0,1.6167 1.0708,2.6875 2.6875,2.6875h10.75c1.6167,0 2.6875,-1.0708 2.6875,-2.6875c0,-1.6167 -1.0708,-2.6875 -2.6875,-2.6875z">
                                    </path>
                                </g>
                            </g>
                        </svg>

                        <p class="ml-4 text-white uppercase">ANULADO</p>
                    </div>
                    <p class="py-6 px-6 text-lg tracking-wide text-center">Tiene {{ $anulado }} pedidos anulados
                    </p>

                    {{-- <div class="flex justify-center px-5 mb-2 text-sm ">
                        <button type="button" class="w-full border border-red-500 text-red-500 rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:text-white hover:bg-red-600 focus:outline-none focus:shadow-outline">
                            Details
                        </button>
                    </div> --}}
                </div>
            </a>

        </div>

        @if ($orders->count())
            <x-table-responsive class="mt-3">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-200">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Numero de compra
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Fecha de compra
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Estado de compra
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Total
                            </th>

                            <th scope="col" class="relative px-6 py-3">
                                <span class="sr-only">Edit</span>
                            </th>
                            <th scope="col" class="relative px-6 py-3">
                                <span class="sr-only">Edit</span>
                            </th>

                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($orders as $order)
                            <tr class="hover:bg-gray-100">
                                <td class="px-3 py-1 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0">
                                            @switch($order->status)
                                                @case(1)
                                                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" class="w-8 h-8" viewBox="0 0 172 172" style=" fill:#000000;">
                                                        <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1"
                                                            stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10"
                                                            stroke-dasharray="" stroke-dashoffset="0" font-family="none"
                                                            font-weight="none" font-size="none" text-anchor="none"
                                                            style="mix-blend-mode: normal">
                                                            <path d="M0,172v-172h172v172z" fill="none"></path>
                                                            <g fill="#a19e9e">
                                                                <path
                                                                    d="M70.95,30.96c-4.98531,0 -9.04344,2.4725 -11.7175,5.59c-0.69875,0.80625 -1.30344,1.70656 -1.8275,2.58c-1.65281,-0.63156 -3.30562,-0.99437 -4.8375,-1.075c-2.53969,-0.12094 -4.81062,0.43 -6.7725,1.505c-3.91031,2.15 -6.665,5.41531 -9.5675,7.8475c-2.96969,2.48594 -11.85187,9.01656 -19.78,14.7275c-7.92812,5.71094 -14.9425,10.75 -14.9425,10.75c-1.22281,0.59125 -1.97531,1.84094 -1.935,3.19813c0.04031,1.35719 0.87344,2.56656 2.12313,3.07719c1.26312,0.52406 2.70094,0.25531 3.68187,-0.68531c0,0 7.2025,-5.01219 15.1575,-10.75c7.955,-5.73781 16.64906,-12.06687 20.21,-15.05c3.45344,-2.9025 6.11406,-5.84531 8.385,-7.095c1.88125,-1.03469 3.37281,-1.37062 6.1275,0c-0.05375,0.47031 -0.215,0.92719 -0.215,1.3975v40.9575l-4.73,2.15c-1.26312,0.38969 -2.19031,1.49156 -2.37844,2.795c-0.18813,1.31688 0.40312,2.62031 1.505,3.35938c1.10187,0.72562 2.52625,0.76594 3.66844,0.08062l31.82,-14.62h0.1075c4.52844,-2.41875 9.27188,-4.63594 12.9,-5.375c3.62813,-0.73906 5.44219,-0.43 6.9875,1.6125c1.81406,2.39188 2.23063,5.02563 1.3975,7.955c-0.83312,2.92938 -3.05031,6.10063 -6.88,8.815c-8.02219,5.67063 -20.425,9.89 -20.425,9.89l-0.645,0.215l-0.5375,0.43c-6.38281,5.42875 -10.07812,10.58875 -14.7275,14.0825c-4.64937,3.49375 -10.40062,5.805 -22.2525,5.805h-0.215l-37.41,2.15c-1.89469,0.12094 -3.34594,1.76031 -3.225,3.655c0.12094,1.89469 1.76031,3.34594 3.655,3.225l37.195,-2.15c0.08063,0 0.13438,0 0.215,0c8.78813,-0.02687 15.17094,-1.47812 20.21,-3.7625c0.87344,2.58 2.67406,4.78375 5.4825,5.6975c3.95063,1.27656 7.8475,0.90031 10.965,-0.43c1.38406,-0.59125 2.64719,-1.3975 3.7625,-2.2575c1.08844,2.49938 3.03688,4.8375 6.02,5.9125c3.13094,1.12875 6.24844,1.38406 9.03,0.645c2.78156,-0.73906 5.0525,-2.31125 7.2025,-4.3c0.36281,-0.33594 0.60469,-0.59125 0.86,-0.86c0.72563,0.49719 1.55875,0.83313 2.4725,1.075c4.46125,1.16906 9.675,-0.1075 13.6525,-4.085c3.49375,-3.49375 5.59,-8.85531 6.3425,-16.125h29.9925c8.26406,0 14.9425,-6.7725 14.9425,-15.05v-51.815c0,-8.62687 -7.44437,-15.695 -15.91,-15.695zM70.95,37.84h85.14c4.28656,0 9.03,4.58219 9.03,8.815v1.505h-103.2v-1.1825c0,-1.42437 0.92719,-3.99094 2.58,-5.9125c1.65281,-1.92156 3.73563,-3.225 6.45,-3.225zM61.92,61.92h103.2v36.55c0,4.58219 -3.57437,8.17 -8.0625,8.17h-64.93c3.61469,-1.65281 7.60563,-3.62812 11.2875,-6.235c4.87781,-3.45344 8.22375,-7.82062 9.5675,-12.5775c1.34375,-4.75687 0.49719,-9.90344 -2.58,-13.975c-3.35937,-4.43437 -8.9225,-5.20031 -13.8675,-4.1925c-4.87781,0.99438 -9.86312,3.3325 -14.5125,5.805c-0.06719,0.04031 -0.14781,0.06719 -0.215,0.1075l-19.8875,9.1375zM79.12,113.52h2.365c-0.20156,2.41875 -0.55094,6.06031 -0.9675,8.385c-0.05375,0.28219 -0.06719,0.56438 -0.1075,0.86c-0.18812,0.12094 -0.37625,0.26875 -0.5375,0.43c-1.47812,1.76031 -3.18469,3.225 -4.945,3.9775c-1.76031,0.7525 -3.52062,1.02125 -6.02,0.215c-0.61812,-0.20156 -1.31687,-1.19594 -1.3975,-2.795c4.43438,-3.38625 7.69969,-7.22937 11.61,-11.0725zM88.4725,113.52h12.9c-0.24187,1.59906 -0.45687,3.42656 -0.645,5.2675c-0.22844,2.24406 -0.43,4.93156 0.1075,7.6325c-0.18812,0.25531 -0.26875,0.30906 -0.5375,0.645c-0.56437,0.71219 -1.57219,1.74688 -1.1825,1.3975c-1.69312,1.55875 -3.1175,2.44563 -4.4075,2.795c-1.29,0.34938 -2.64719,0.25531 -4.8375,-0.5375c-1.16906,-0.41656 -1.77375,-1.16906 -2.2575,-2.58c-0.48375,-1.41094 -0.61812,-3.41312 -0.3225,-5.0525c0.59125,-3.25187 1.00781,-7.40406 1.1825,-9.5675zM108.36,113.52h11.7175c-0.71219,5.75125 -2.31125,9.40625 -4.1925,11.2875c-2.55312,2.56656 -4.71656,2.87563 -7.095,2.2575c-0.79281,-0.215 -0.86,-0.40312 -1.1825,-1.8275c-0.3225,-1.42437 -0.3225,-3.655 -0.1075,-5.6975c0.22844,-2.20375 0.56438,-4.34031 0.86,-6.02z">
                                                                </path>
                                                            </g>
                                                        </g>
                                                    </svg>

                                                @break
                                                @case(2)
                                                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" class="h-8 w-8"
                                                        viewBox="0 0 172 172" style=" fill:#000000;">
                                                        <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1"
                                                            stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10"
                                                            stroke-dasharray="" stroke-dashoffset="0" font-family="none"
                                                            font-weight="none" font-size="none" text-anchor="none"
                                                            style="mix-blend-mode: normal">
                                                            <path d="M0,172v-172h172v172z" fill="none" stroke="none"></path>
                                                            <g id="original-icon" fill="#54e190" stroke="none" opacity="0"
                                                                visibility="hidden">
                                                                <path
                                                                    d="M24.08,30.96c-9.46,0 -17.2,7.74 -17.2,17.2v75.68c0,9.46 7.74,17.2 17.2,17.2h123.84c9.46,0 17.2,-7.74 17.2,-17.2v-75.68c0,-9.46 -7.74,-17.2 -17.2,-17.2zM24.08,37.84h123.84c5.73781,0 10.32,4.58219 10.32,10.32v6.88h-144.48v-6.88c0,-5.73781 4.58219,-10.32 10.32,-10.32zM13.76,72.24h144.48v51.6c0,5.73781 -4.58219,10.32 -10.32,10.32h-123.84c-5.73781,0 -10.32,-4.58219 -10.32,-10.32zM30.96,82.56v6.88h55.04v-6.88z">
                                                                </path>
                                                            </g>
                                                            <g id="subtracted-icon" fill="#54e190" stroke="none">
                                                                <path
                                                                    d="M147.92,30.96c9.46,0 17.2,7.74 17.2,17.2v75.68c0,9.46 -7.74,17.2 -17.2,17.2h-39.96453l6.93022,-6.88h33.03431c5.73781,0 10.32,-4.58219 10.32,-10.32v-51.6h-144.48v51.6c0,5.73781 4.58219,10.32 10.32,10.32l54.17231,0l6.88,6.88h-61.05231c-9.46,0 -17.2,-7.74 -17.2,-17.2v-75.68c0,-9.46 7.74,-17.2 17.2,-17.2zM13.76,48.16v6.88h144.48v-6.88c0,-5.73781 -4.58219,-10.32 -10.32,-10.32h-123.84c-5.73781,0 -10.32,4.58219 -10.32,10.32zM86,82.56v6.88h-55.04v-6.88z">
                                                                </path>
                                                            </g>
                                                            <g stroke="none">
                                                                <g fill="#54e190">
                                                                    <g id="Слой_2" font-family="Inter, sans-serif"
                                                                        font-weight="400" font-size="16" text-anchor="start"
                                                                        visibility="hidden"></g>
                                                                    <g id="Android_x5F_4" font-family="Inter, sans-serif"
                                                                        font-weight="400" font-size="16" text-anchor="start"
                                                                        visibility="hidden"></g>
                                                                    <g id="Android_x5F_5" font-family="Inter, sans-serif"
                                                                        font-weight="400" font-size="16" text-anchor="start"
                                                                        visibility="hidden"></g>
                                                                    <g id="Windows_x5F_8" font-family="Inter, sans-serif"
                                                                        font-weight="400" font-size="16" text-anchor="start"
                                                                        visibility="hidden"></g>
                                                                    <g id="Windows_x5F_10" font-family="Inter, sans-serif"
                                                                        font-weight="400" font-size="16" text-anchor="start"
                                                                        visibility="hidden"></g>
                                                                    <g id="Color" font-family="Inter, sans-serif"
                                                                        font-weight="400" font-size="16" text-anchor="start"
                                                                        visibility="hidden"></g>
                                                                    <g id="IOS" font-family="Inter, sans-serif"
                                                                        font-weight="400" font-size="16" text-anchor="start"
                                                                        visibility="hidden"></g>
                                                                    <g id="IOS_copy">
                                                                        <path
                                                                            d="M96.68462,143l-25.46923,-25.46923l4.63077,-4.63077l20.83846,20.83846l40.68462,-40.68462l4.63077,4.63077z">
                                                                        </path>
                                                                    </g>
                                                                </g>
                                                                <g fill="#000000" opacity="0">
                                                                    <g id="IOS" font-family="Inter, sans-serif"
                                                                        font-weight="400" font-size="16" text-anchor="start"
                                                                        visibility="hidden"></g>
                                                                    <g id="IOS_copy">
                                                                        <path
                                                                            d="M141.83462,88.25769l-4.63077,-4.63077l-4.63077,4.63077l-36.05385,36.05385l-15.87692,-16.20769l-4.96154,-4.63077l-4.63077,4.63077l-4.63077,4.63077l-4.63077,4.63077l4.63077,4.96154l25.46923,25.46923l4.63077,4.63077l4.63077,-4.63077l45.64615,-45.31538l4.63077,-4.96154l-4.63077,-4.63077z">
                                                                        </path>
                                                                    </g>
                                                                </g>
                                                            </g>
                                                            <path d="M71.21538,143v-49.94615h70.78462v49.94615z"
                                                                id="overlay-drag" fill="#ff0000" stroke="none" opacity="0">
                                                            </path>
                                                        </g>
                                                    </svg>

                                                @break
                                                @case(3)
                                                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" class="w-8 h-8"
                                                        viewBox="0 0 172 172" style=" fill:#000000;">
                                                        <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1"
                                                            stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10"
                                                            stroke-dasharray="" stroke-dashoffset="0" font-family="none"
                                                            font-weight="none" font-size="none" text-anchor="none"
                                                            style="mix-blend-mode: normal">
                                                            <path d="M0,172v-172h172v172z" fill="none"></path>
                                                            <g fill="#eac047">
                                                                <path
                                                                    d="M9.7825,44.72c-5.40187,0 -9.7825,4.39406 -9.7825,9.7825v89.9775c0,5.38844 4.91813,10.32 10.32,10.32h14.0825c1.63938,9.75563 10.105,17.2 20.3175,17.2c10.2125,0 18.67813,-7.44437 20.3175,-17.2h31.82c5.38844,0 9.7825,-4.39406 9.7825,-9.7825v-90.3c0,-5.50937 -4.34031,-9.9975 -9.675,-9.9975zM113.52,68.8v86c1.65281,9.74219 10.4275,17.2 20.64,17.2c10.2125,0 18.67813,-7.45781 20.3175,-17.2h7.2025c5.40188,0 10.32,-4.91812 10.32,-10.32v-33.11c0,-6.92031 -4.98531,-13.98844 -5.59,-14.835l-14.2975,-19.135c-3.27875,-3.95062 -8.42531,-8.6 -14.5125,-8.6zM130.72,86h19.2425l10.965,14.62c1.16906,1.65281 4.1925,6.71875 4.1925,10.75v2.15h-34.4c-3.44,0 -6.88,-3.44 -6.88,-6.88v-13.76c0,-3.80281 3.44,-6.88 6.88,-6.88zM44.72,137.6c7.59219,0 13.76,6.16781 13.76,13.76c0,7.59219 -6.16781,13.76 -13.76,13.76c-7.59219,0 -13.76,-6.16781 -13.76,-13.76c0,-7.59219 6.16781,-13.76 13.76,-13.76zM134.16,137.6c7.59219,0 13.76,6.16781 13.76,13.76c0,7.59219 -6.16781,13.76 -13.76,13.76c-7.59219,0 -13.76,-6.16781 -13.76,-13.76c0,-7.59219 6.16781,-13.76 13.76,-13.76z">
                                                                </path>
                                                            </g>
                                                        </g>
                                                    </svg>

                                                @break
                                                @case(4)
                                                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" class="h-8 w-8"
                                                        viewBox="0 0 172 172" style=" fill:#000000;">
                                                        <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1"
                                                            stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10"
                                                            stroke-dasharray="" stroke-dashoffset="0" font-family="none"
                                                            font-weight="none" font-size="none" text-anchor="none"
                                                            style="mix-blend-mode: normal">
                                                            <path d="M0,172v-172h172v172z" fill="none"></path>
                                                            <g fill="#fc75cb">
                                                                <path
                                                                    d="M63.64,10.32c-4.74965,0 -8.6,3.85035 -8.6,8.6c0,4.74965 3.85035,8.6 8.6,8.6c4.74965,0 8.6,-3.85035 8.6,-8.6c0,-4.74965 -3.85035,-8.6 -8.6,-8.6zM108.36,10.32c-4.74965,0 -8.6,3.85035 -8.6,8.6c0,4.74965 3.85035,8.6 8.6,8.6c4.74965,0 8.6,-3.85035 8.6,-8.6c0,-4.74965 -3.85035,-8.6 -8.6,-8.6zM117.04735,41.18594c-1.17822,-0.00775 -2.27846,0.588 -2.91594,1.57891c0,0 -11.15123,15.71515 -28.1314,15.71515c-16.98018,0 -28.1314,-15.71515 -28.1314,-15.71515c-0.65265,-0.97448 -1.75678,-1.54933 -2.92938,-1.52516c-1.27422,0.02755 -2.42881,0.75729 -3.00048,1.89641c-0.57167,1.13912 -0.46675,2.50095 0.27267,3.53906c0,0 12.66733,18.68485 33.7886,18.68485c21.12126,0 33.7886,-18.68485 33.7886,-18.68485c0.77164,-1.0408 0.8931,-2.42686 0.31424,-3.58601c-0.57886,-1.15914 -1.75987,-1.89477 -3.05549,-1.90321zM41.33375,50.85422c-0.4253,0.00088 -0.84674,0.08062 -1.24297,0.23515l-20.64,7.60563c-1.03516,0.33242 -1.85228,1.13459 -2.20375,2.16344l-16.72297,26.76078c-0.54672,0.87765 -0.6697,1.95465 -0.33492,2.93295c0.33479,0.97831 1.09184,1.75415 2.06164,2.11283l14.94922,5.50937v39.42563c0.00132,1.44013 0.89948,2.72705 2.25078,3.225l65.36,24.08c0.7676,0.28277 1.61084,0.28277 2.37844,0l65.36,-24.08c1.35131,-0.49795 2.24947,-1.78487 2.25078,-3.225v-39.42563l14.94922,-5.50937c0.9698,-0.35868 1.72685,-1.13452 2.06164,-2.11283c0.33479,-0.97831 0.2118,-2.05531 -0.33492,-2.93295l-16.72969,-26.77422c-0.35365,-1.02219 -1.16743,-1.81855 -2.19703,-2.15c-0.04446,-0.0166 -0.08926,-0.03228 -0.13437,-0.04703l-20.50563,-7.5586c-0.4303,-0.16589 -0.88955,-0.24357 -1.35047,-0.22844c-1.64861,0.0612 -3.0217,1.28405 -3.27268,2.91459c-0.25098,1.63054 0.69082,3.20971 2.24471,3.76385l11.88547,4.38063l-55.41625,20.41828l-55.41625,-20.41828l11.88547,-4.38063c1.57961,-0.55656 2.52892,-2.16976 2.24848,-3.82091c-0.28045,-1.65115 -1.70916,-2.86044 -3.38395,-2.86425zM22.07781,66.1125l58.76891,21.64781v0.00672l-13.47781,21.56047l-58.77562,-21.64781zM149.92219,66.1125l13.48453,21.56719l-58.77562,21.64781l-13.4711,-21.56047zM82.56,97.98625v58.75547l-58.48,-21.54031v-34.49406l43.53078,16.03765c1.52827,0.56252 3.24158,-0.02354 4.10515,-1.40422zM89.44,97.98625l10.84406,17.35453c0.86357,1.38068 2.57689,1.96674 4.10515,1.40422l43.53078,-16.03765v34.49406l-58.48,21.54031z">
                                                                </path>
                                                            </g>
                                                        </g>
                                                    </svg>

                                                @break
                                                @case(5)
                                                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" class="h-8 w-8"
                                                        viewBox="0 0 172 172" style=" fill:#000000;">
                                                        <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1"
                                                            stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10"
                                                            stroke-dasharray="" stroke-dashoffset="0" font-family="none"
                                                            font-weight="none" font-size="none" text-anchor="none"
                                                            style="mix-blend-mode: normal">
                                                            <path d="M0,172v-172h172v172z" fill="none"></path>
                                                            <g fill="#e74c3c">
                                                                <path
                                                                    d="M80.625,5.375c-2.6875,0 -5.10205,1.34375 -6.71875,3.49585l-8.0625,12.62915h-30.90625c-4.56665,0 -8.0625,3.49585 -8.0625,8.0625v16.125c0,4.56665 3.49585,8.0625 8.0625,8.0625h0.26245l9.40625,90.03125c0.80835,6.9917 6.4563,12.09375 13.4375,12.09375h66.6626c6.9812,0 12.62915,-5.10205 13.4375,-12.09375l9.40625,-90.03125h0.26245c4.56665,0 8.0625,-3.49585 8.0625,-8.0625v-16.125c0,-4.56665 -3.49585,-8.0625 -8.0625,-8.0625h-30.90625l-8.32495,-12.62915c-1.34375,-2.1521 -4.03125,-3.49585 -6.71875,-3.49585zM80.88745,10.75h21.23755c0.80835,0 1.6167,0.5354 2.1521,1.0708l6.17285,9.6792h-38.1499l6.17285,-9.6792c0.5354,-0.5354 1.34375,-1.0708 2.41455,-1.0708zM34.9375,26.875h112.875c1.6167,0 2.6875,1.0708 2.6875,2.6875v16.125c0,1.6167 -1.0708,2.6875 -2.6875,2.6875h-112.875c-1.6167,0 -2.6875,-1.0708 -2.6875,-2.6875v-16.125c0,-1.6167 1.0708,-2.6875 2.6875,-2.6875zM43,32.25c-1.6167,0 -2.6875,1.0708 -2.6875,2.6875v5.375c0,1.6167 1.0708,2.6875 2.6875,2.6875c1.6167,0 2.6875,-1.0708 2.6875,-2.6875v-5.375c0,-1.6167 -1.0708,-2.6875 -2.6875,-2.6875zM56.4375,32.25c-1.6167,0 -2.6875,1.0708 -2.6875,2.6875v5.375c0,1.6167 1.0708,2.6875 2.6875,2.6875c1.6167,0 2.6875,-1.0708 2.6875,-2.6875v-5.375c0,-1.6167 -1.0708,-2.6875 -2.6875,-2.6875zM69.875,32.25c-1.6167,0 -2.6875,1.0708 -2.6875,2.6875v5.375c0,1.6167 1.0708,2.6875 2.6875,2.6875c1.6167,0 2.6875,-1.0708 2.6875,-2.6875v-5.375c0,-1.6167 -1.0708,-2.6875 -2.6875,-2.6875zM83.3125,32.25c-1.6167,0 -2.6875,1.0708 -2.6875,2.6875v5.375c0,1.6167 1.0708,2.6875 2.6875,2.6875c1.6167,0 2.6875,-1.0708 2.6875,-2.6875v-5.375c0,-1.6167 -1.0708,-2.6875 -2.6875,-2.6875zM99.4375,32.25c-1.6167,0 -2.6875,1.0708 -2.6875,2.6875v5.375c0,1.6167 1.0708,2.6875 2.6875,2.6875c1.6167,0 2.6875,-1.0708 2.6875,-2.6875v-5.375c0,-1.6167 -1.0708,-2.6875 -2.6875,-2.6875zM112.875,32.25c-1.6167,0 -2.6875,1.0708 -2.6875,2.6875v5.375c0,1.6167 1.0708,2.6875 2.6875,2.6875c1.6167,0 2.6875,-1.0708 2.6875,-2.6875v-5.375c0,-1.6167 -1.0708,-2.6875 -2.6875,-2.6875zM126.3125,32.25c-1.6167,0 -2.6875,1.0708 -2.6875,2.6875v5.375c0,1.6167 1.0708,2.6875 2.6875,2.6875c1.6167,0 2.6875,-1.0708 2.6875,-2.6875v-5.375c0,-1.6167 -1.0708,-2.6875 -2.6875,-2.6875zM139.75,32.25c-1.6167,0 -2.6875,1.0708 -2.6875,2.6875v5.375c0,1.6167 1.0708,2.6875 2.6875,2.6875c1.6167,0 2.6875,-1.0708 2.6875,-2.6875v-5.375c0,-1.6167 -1.0708,-2.6875 -2.6875,-2.6875zM40.57495,53.75h101.6001l-9.40625,89.49585c-0.5459,4.03125 -3.7688,7.25415 -8.0625,7.25415h-66.6626c-4.03125,0 -7.5166,-3.2229 -8.0625,-7.25415zM91.375,67.1875c-1.6167,0 -2.6875,1.0708 -2.6875,2.6875v53.75c0,1.6167 1.0708,2.6875 2.6875,2.6875c1.6167,0 2.6875,-1.0708 2.6875,-2.6875v-53.75c0,-1.6167 -1.0708,-2.6875 -2.6875,-2.6875zM67.1875,67.44995c-1.6167,0 -2.6875,1.34375 -2.42505,2.6875l2.6875,53.75c-0.26245,1.34375 1.0813,2.42505 2.42505,2.42505c1.6167,0 2.6875,-1.34375 2.6875,-2.6875l-2.6875,-53.75c0,-1.6167 -1.34375,-2.6875 -2.6875,-2.42505zM115.82495,67.44995c-1.6062,0 -2.6875,1.0813 -2.6875,2.42505l-2.6875,53.75c-0.26245,1.34375 0.80835,2.6875 2.42505,2.6875c1.6167,0 2.6875,-1.0813 2.6875,-2.42505l2.6875,-53.75c0,-1.6062 -1.0813,-2.6875 -2.42505,-2.6875zM61.8125,139.75c-1.6167,0 -2.6875,1.0708 -2.6875,2.6875c0,1.6167 1.0708,2.6875 2.6875,2.6875h37.625c1.6167,0 2.6875,-1.0708 2.6875,-2.6875c0,-1.6167 -1.0708,-2.6875 -2.6875,-2.6875zM110.1875,139.75c-1.6167,0 -2.6875,1.0708 -2.6875,2.6875c0,1.6167 1.0708,2.6875 2.6875,2.6875h10.75c1.6167,0 2.6875,-1.0708 2.6875,-2.6875c0,-1.6167 -1.0708,-2.6875 -2.6875,-2.6875z">
                                                                </path>
                                                            </g>
                                                        </g>
                                                    </svg>

                                                @break
                                                @default

                                            @endswitch
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">
                                                ORDER : {{ $order->id }}
                                            </div>
                                            {{-- <div class="text-sm text-gray-500">
                                                @switch($order->status)
                                                    @case(1)
                                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-500 opacity-75 text-white">
                                                            POR PAGAR
                                                        </span>
                                                        
                                                        @break
                                                    @case(2)
                                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-500 opacity-75 text-white">
                                                            PAGADO
                                                        </span>                                                
                                                        
                                                        @break
                                                    @case(3)
                                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-500 opacity-75 text-black">
                                                            ENVIADO
                                                        </span> 
                                                        
                                                        @break
                                                    @case(4)
                                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-pink-500 opacity-75 text-black">
                                                            ENTREGADO
                                                        </span> 
                                                        
                                                        @break
                                                    @case(5)
                                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-500 opacity-75 text-black">
                                                            ELIMINADO
                                                        </span> 
                                                        
                                                        @break
                                                    @default
                                                        
                                                @endswitch
                                            </div> --}}
                                        </div>
                                    </div>
                                </td>
                                <td class="px-3 py-1 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ $order->created_at->format('d/m/Y') }}</div>
                                    {{-- <div class="text-sm text-gray-500">Optimization</div> --}}
                                </td>
                                <td class="px-3 py-1 whitespace-nowrap">
                                    @switch($order->status)
                                        @case(1)
                                            <span
                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-500 opacity-75 text-white">
                                                POR PAGAR
                                            </span>

                                        @break
                                        @case(2)
                                            <span
                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-500 opacity-75 text-white">
                                                PAGADO
                                            </span>

                                        @break
                                        @case(3)
                                            <span
                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-500 opacity-75 text-black">
                                                ENVIADO
                                            </span>

                                        @break
                                        @case(4)
                                            <span
                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-pink-500 opacity-75 text-white">
                                                ENTREGADO
                                            </span>

                                        @break
                                        @case(5)
                                            <span
                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-500 opacity-75 text-white">
                                                ANULADO
                                            </span>

                                        @break
                                        @default

                                    @endswitch
                                </td>
                                <td class="px-3 py-1 whitespace-nowrap text-sm text-red-500">
                                    S/. {{ $order->total }}
                                </td>
                                <td class="px-3 py-1 whitespace-nowrap text-sm text-red-500">
                                    @if ($order->status == 4 )  
                                        <div class="flex flex-1">
                                            <x-button-enlace href="{{route('orders.qualify',$order)}}" class="ml-auto">
                                                Calificar
                                            </x-button-enlace>
                                        </div>
                                    @endif
                                    
                                </td>
                                <td class="px-3 py-1 whitespace-nowrap text-right text-sm font-medium flex justify-end">
                                    <a href="{{ route('orders.show', $order) }}">
                                        <div class="cursor-pointer w-7 mr-2 border-gray-900 bg-blue-500 text-white border rounded-lg p-1 transform hover:text-white hover:bg-blue-700 hover:scale-110">                                        
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>                                       
                                        </div>
                                    </a>
                                </td>
                            </tr>
                        @endforeach

                        <!-- More people... -->
                    </tbody>
                </table>
               
            </x-table-responsive>
        @else
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-8 rounded relative mt-4" role="alert">
                <strong class="font-bold">Upss!</strong>
                <span class="block sm:inline">No existen regístros de ventas</span>
            </div>
        @endif



        {{-- @if ($orders->count())
            <section class="bg-white shadow-lg rounded-lg px-12 py-8 mt-12 text-gray-700">
                <h1 class="text-2xl mb-4">PEDIDOS RECIENTES</h1>

                <ul>
                    @foreach ($orders as $order)
                        <li>
                            <a class="flex items-center py-2 px-4 hover:bg-gray-100"
                                href="{{ route('orders.show', $order) }}">
                                <span class="w-12 text-center">
                                    @switch($order->status)
                                        @case(1)
                                            <i class="fas fa-business-time text-red-500 opacity-50"></i>
                                        @break
                                        @case(2)
                                            <i class="fas fa-credit-card text-gray-500 opacity-50"></i>
                                        @break
                                        @case(3)
                                            <i class="fas fa-truck text-yellow-500 opacity-50"></i>
                                        @break
                                        @case(4)
                                            <i class="fas fa-check-circle text-pink-500 opacity-50"></i>
                                        @break
                                        @case(5)
                                            <i class="fas fa-times-circle text-green-500 opacity-50"></i>
                                        @break
                                        @default

                                    @endswitch
                                </span>

                                <span>
                                    Orden :
                                    {{ $order->id }}
                                    <br>
                                    {{ $order->created_at->format('d/m/Y') }}
                                </span>

                                <div class="ml-auto ">
                                    <span class="font-bold">
                                        @switch($order->status)
                                            @case(1)
                                                Pendiente
                                            @break
                                            @case(2)
                                                Recibido
                                            @break
                                            @case(3)
                                                Enviado
                                            @break
                                            @case(4)
                                                Entregado
                                            @break
                                            @case(5)
                                                Anulado
                                            @break
                                            @default

                                        @endswitch
                                    </span>

                                    <br>

                                    <span class="text-sm">
                                        S/. {{ $order->total }}
                                    </span>

                                </div>

                                <span class="content-start">
                                    <i class="fas fa-angle-right ml-6"></i>
                                </span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </section>
        @else
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-8 rounded relative mt-4" role="alert">
                <strong class="font-bold">Upss!</strong>
                <span class="block sm:inline">No existen regístros de ventas</span>
            </div>
        @endif --}}

    </div>
</x-app-layout>
