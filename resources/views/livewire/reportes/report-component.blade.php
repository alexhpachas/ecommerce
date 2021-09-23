<div class="container py-7">

    <div class="order-1 grid lg:grid-cols-5 md:grid-cols-3 gap-5 mb-10 ">

        {{-- REPORTE DE  VENTAS --}}
        <a>
            <div
                class="bg-white max-w-full shadow-lg   mx-auto border-b-4 border-gray-500 rounded-2xl overflow-hidden opacity-75  hover:shadow-2xl transition duration-500 transform hover:scale-105 cursor-pointer">
                <div class="bg-gray-500  flex h-20 items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                        width="50" height="50"
                        viewBox="0 0 172 172"
                        style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M26.875,37.625c-2.967,0 -5.375,2.408 -5.375,5.375c0,2.967 2.408,5.375 5.375,5.375h11.92578l4.03125,16.125h92.31982l-10.25659,37.625h-55.02026v10.75h48.375h6.63477c4.84825,0 9.09282,-3.24977 10.37207,-7.92602l13.9729,-51.19898h-98.00977l-1.99463,-7.97852c-1.19325,-4.78375 -5.49031,-8.14648 -10.42456,-8.14648zM118.25,112.875c-8.84171,0 -16.125,7.28329 -16.125,16.125c0,8.84171 7.28329,16.125 16.125,16.125c8.84171,0 16.125,-7.28329 16.125,-16.125c0,-8.84171 -7.28329,-16.125 -16.125,-16.125zM69.875,112.875c-8.84171,0 -16.125,7.28329 -16.125,16.125c0,8.84171 7.28329,16.125 16.125,16.125c8.84171,0 16.125,-7.28329 16.125,-16.125c0,-8.84171 -7.28329,-16.125 -16.125,-16.125zM32.25,75.25v10.75h43v-10.75zM32.25,96.75v10.75h26.875v-10.75zM69.875,123.625c3.03704,0 5.375,2.33796 5.375,5.375c0,3.03704 -2.33796,5.375 -5.375,5.375c-3.03704,0 -5.375,-2.33796 -5.375,-5.375c0,-3.03704 2.33796,-5.375 5.375,-5.375zM118.25,123.625c3.03704,0 5.375,2.33796 5.375,5.375c0,3.03704 -2.33796,5.375 -5.375,5.375c-3.03704,0 -5.375,-2.33796 -5.375,-5.375c0,-3.03704 2.33796,-5.375 5.375,-5.375z"></path></g></g>
                    </svg>
                    <p class="ml-4 text-white uppercase text-sm">REPORTE DE VENTAS</p>
                </div>
                {{-- <p class="py-6 px-6 text-lg tracking-wide text-center">REPORTES DE VENTAS
                </p> --}}

                <div class="flex justify-center px-5 mb-2 text-sm ">
                    <button wire:click="openVentas" type="button"
                        class="w-full border border-gray-500 text-gray-500 rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:text-white hover:bg-gray-600 focus:outline-none focus:shadow-outline">
                        Ver Ahora
                    </button>
                </div>
            </div>
        </a>        

        <a>
            <div
                class="bg-white max-w-full shadow-lg   mx-auto border-b-4 border-green-500 rounded-2xl overflow-hidden opacity-75 hover:shadow-2xl transition duration-500 transform hover:scale-105 cursor-pointer">
                <div class=" bg-green-500  flex h-20 items-center text-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                        width="50" height="50"
                        viewBox="0 0 172 172"
                        style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M86,14.33333c-39.51676,0 -71.66667,32.14993 -71.66667,71.66667c0,39.51673 32.1499,71.66667 71.66667,71.66667c39.51676,0 71.66667,-32.14993 71.66667,-71.66667c0,-39.51673 -32.1499,-71.66667 -71.66667,-71.66667zM86,25.08333c33.70704,0 60.91667,27.20965 60.91667,60.91667c0,33.70702 -27.20963,60.91667 -60.91667,60.91667c-33.70704,0 -60.91667,-27.20965 -60.91667,-60.91667c0,-33.70702 27.20963,-60.91667 60.91667,-60.91667zM84.12435,39.33968c-2.96578,0.04633 -5.33356,2.48614 -5.29101,5.45198v4.12923c-10.00542,1.38317 -17.91667,9.69379 -17.91667,20.05827c0,11.31553 9.28864,20.60417 20.60417,20.60417h7.16667c6.49334,0 11.64583,5.15249 11.64583,11.64583c0,6.49334 -5.15249,11.64583 -11.64583,11.64583h-8.0625c-4.22024,0 -7.67212,-2.8543 -8.67139,-6.69076c-0.44044,-1.90569 -1.88123,-3.42176 -3.76204,-3.9586c-1.88081,-0.53685 -3.90479,-0.00974 -5.28481,1.37633c-1.38002,1.38607 -1.89828,3.41233 -1.35322,5.29077c2.05927,7.90613 8.98921,13.64933 17.27979,14.43132v3.88428c-0.02741,1.93842 0.99102,3.74144 2.66532,4.71865c1.6743,0.97721 3.74507,0.97721 5.41937,0c1.6743,-0.97721 2.69273,-2.78023 2.66532,-4.71865v-3.7653c11.8716,-0.50144 21.5,-10.22605 21.5,-22.21387c0,-12.30482 -10.09101,-22.39583 -22.39583,-22.39583h-7.16667c-5.50464,0 -9.85417,-4.34953 -9.85417,-9.85417c0,-5.50464 4.34953,-9.85417 9.85417,-9.85417h1.80566c0.57703,0.09479 1.16565,0.09479 1.74268,0h2.72249c4.18943,0 7.62487,2.81932 8.65039,6.61377c0.50102,1.85439 1.95342,3.30055 3.80994,3.7936c1.85653,0.49305 3.83506,-0.04194 5.19014,-1.4034c1.35507,-1.36146 1.88076,-3.34248 1.37899,-5.19667c-2.11402,-7.82188 -9.00693,-13.4811 -17.23779,-14.25635v-3.88428c0.02085,-1.45347 -0.54782,-2.85342 -1.57635,-3.88062c-1.02852,-1.0272 -2.4292,-1.59408 -3.88264,-1.57136z"></path></g></g>
                    </svg>
                    <p class=" text-white uppercase text-sm">COSTO POR ENVÍO</p>
                </div>
                {{-- <p class="py-6 px-6 text-lg tracking-wide text-center">REPORTES PRODUCTOS --}}
                </p>

                <div class="flex justify-center px-5 mb-2 text-sm ">
                    <button wire:click="openCities" type="button"
                        class="w-full border border-green-500 text-green-500 rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:text-white hover:bg-green-600 focus:outline-none focus:shadow-outline">
                        Ver Ahora
                    </button>
                </div>
            </div>
        </a>

        <a>
            <div
                class="bg-white max-w-full shadow-lg   mx-auto border-b-4 border-yellow-500 rounded-2xl overflow-hidden opacity-75  hover:shadow-2xl transition duration-500 transform hover:scale-105 cursor-pointer">
                <div class="bg-yellow-500  flex h-20  items-center text-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                        width="50" height="50"
                        viewBox="0 0 172 172"
                        style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M99.6525,4.1925c-0.645,0.12094 -1.23625,0.41656 -1.72,0.86l-14.5125,12.47l-4.945,-5.4825c-0.67187,-0.77937 -1.66625,-1.20937 -2.6875,-1.1825c-0.86,0.06719 -1.66625,0.44344 -2.2575,1.075l-8.6,8.7075h-11.7175c-0.1075,0 -0.215,0 -0.3225,0c-0.1075,0 -0.215,0 -0.3225,0c-0.55094,0.12094 -1.075,0.37625 -1.505,0.7525l-34.9375,26.875l-0.215,0.1075c-0.04031,0.04031 -0.06719,0.06719 -0.1075,0.1075c-0.04031,0 -0.06719,0 -0.1075,0c-0.14781,0.06719 -0.29562,0.13438 -0.43,0.215c-0.04031,0.04031 -0.06719,0.06719 -0.1075,0.1075c-0.08062,0.06719 -0.14781,0.13438 -0.215,0.215c-0.12094,0.09406 -0.22844,0.20156 -0.3225,0.3225c-0.12094,0.13438 -0.22844,0.28219 -0.3225,0.43c-0.04031,0.06719 -0.08062,0.14781 -0.1075,0.215c-0.04031,0.04031 -0.06719,0.06719 -0.1075,0.1075c-0.08062,0.17469 -0.16125,0.34938 -0.215,0.5375l-13.545,26.9825c-0.67188,1.33031 -0.41656,2.92938 0.63156,3.99094c1.06156,1.04813 2.66062,1.30344 3.99094,0.63156l8.815,-4.4075v70.09c0,1.89469 1.54531,3.44 3.44,3.44h103.2c0.04031,0 0.06719,0 0.1075,0c0.215,-0.01344 0.43,-0.05375 0.645,-0.1075c0.1075,-0.02687 0.215,-0.06719 0.3225,-0.1075c0.86,-0.25531 1.59906,-0.83312 2.0425,-1.6125l27.09,-33.8625c0.48375,-0.60469 0.7525,-1.37062 0.7525,-2.15v-32.895l19.6725,-19.6725c1.08844,-1.14219 1.26313,-2.86219 0.43,-4.1925l-19.995,-33.325c-0.02687,-0.1075 -0.06719,-0.215 -0.1075,-0.3225c-0.14781,-0.48375 -0.41656,-0.91375 -0.7525,-1.29c-0.02687,-0.06719 -0.06719,-0.14781 -0.1075,-0.215c-0.04031,0 -0.06719,0 -0.1075,0c-0.02687,-0.06719 -0.06719,-0.14781 -0.1075,-0.215c-0.04031,0 -0.06719,0 -0.1075,0c-0.06719,-0.04031 -0.14781,-0.08062 -0.215,-0.1075c0,-0.04031 0,-0.06719 0,-0.1075c-0.04031,0 -0.06719,0 -0.1075,0c-0.17469,-0.12094 -0.34937,-0.22844 -0.5375,-0.3225c-0.04031,0 -0.06719,0 -0.1075,0c-0.06719,-0.04031 -0.14781,-0.08062 -0.215,-0.1075c-0.04031,0 -0.06719,0 -0.1075,0c-0.06719,-0.04031 -0.14781,-0.08062 -0.215,-0.1075c-0.04031,0 -0.06719,0 -0.1075,0c-0.06719,0 -0.14781,0 -0.215,0c-0.04031,0 -0.06719,0 -0.1075,0c-0.06719,0 -0.14781,0 -0.215,0c-0.04031,0 -0.06719,0 -0.1075,0h-0.215c-0.06719,0 -0.14781,0 -0.215,0h-30.4225l-14.405,-15.265c-0.60469,-0.69875 -1.45125,-1.11531 -2.365,-1.1825c-0.215,-0.02687 -0.43,-0.02687 -0.645,0zM99.975,12.3625l26.5525,28.165l-7.6325,7.6325h-8.2775c-0.09406,-0.12094 -0.20156,-0.22844 -0.3225,-0.3225l-22.36,-25.155zM75.7875,19.35l25.6925,28.81h-53.8575zM54.2875,27.52h3.9775l-20.3175,20.64h-10.6425zM123.5175,27.52h16.0175l-8.2775,8.2775zM147.275,29.67l16.985,28.165l-22.575,22.575l-16.985,-28.165zM20.64,55.04h96.32v89.44h-96.32v-71.81c0.01344,-0.14781 0.01344,-0.28219 0,-0.43zM123.84,63.855l14.2975,23.865c0.52406,0.91375 1.45125,1.54531 2.49938,1.69313c1.04812,0.14781 2.10969,-0.20156 2.87562,-0.94063l0.9675,-0.9675v24.8325l-20.64,25.8zM13.76,66.22v3.87l-2.58,1.29zM50.6325,68.8c-1.89469,0.26875 -3.225,2.02906 -2.95625,3.92375c0.26875,1.89469 2.02906,3.225 3.92375,2.95625h34.4c1.23625,0.01344 2.39188,-0.63156 3.02344,-1.70656c0.61813,-1.075 0.61813,-2.39187 0,-3.46687c-0.63156,-1.075 -1.78719,-1.72 -3.02344,-1.70656h-34.4c-0.1075,0 -0.215,0 -0.3225,0c-0.1075,0 -0.215,0 -0.3225,0c-0.1075,0 -0.215,0 -0.3225,0z"></path></g></g>
                    </svg>                   
                    <p class="ml-4 text-white text-sm uppercase">STOCK PRODUCTO</p>
                </div>
                {{-- <p class="py-6 px-6 text-lg tracking-wide text-center">REPORTES DE CLIENTES --}}
                </p>

                <div class="flex justify-center px-5 mb-2 text-sm ">
                    <button wire:click="openProductos" type="button"
                        class="w-full border border-yellow-500 text-yellow-500 rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:text-white hover:bg-yellow-600 focus:outline-none focus:shadow-outline">
                        Ver Ahora
                    </button>
                </div>
            </div>
        </a>

        <a>
            <div
                class="bg-white max-w-full shadow-lg   mx-auto border-b-4 border-pink-500 rounded-2xl overflow-hidden opacity-75  hover:shadow-2xl transition duration-500 transform hover:scale-105 cursor-pointer">
                <div class="bg-pink-500  flex h-20  items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="50" height="50" viewBox="0 0 172 172"
                        style=" fill:#000000;">
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
                    <p class=" text-white text-sm uppercase">PRODUCTOS VENDIDOS</p>
                </div>
                {{-- <p class="py-6 px-6 text-lg tracking-wide text-center">Tiene  pedidos entregados --}}
                </p>

                <div class="flex justify-center px-5 mb-2 text-sm ">
                    <button wire:click="openProductosVendidos" type="button"
                        class="w-full border border-pink-500 text-pink-500 rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:text-white hover:bg-pink-600 focus:outline-none focus:shadow-outline">
                        Ver Ahora
                    </button>
                </div>
            </div>
        </a>

        <a>
            <div
                class="bg-white max-w-full shadow-lg   mx-auto border-b-4 border-purple-500 rounded-2xl overflow-hidden opacity-75  hover:shadow-2xl transition duration-500 transform hover:scale-105 cursor-pointer">
                <div class="bg-purple-500  flex h-20  items-center justify-center">
                    <svg class="text-center" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="50" height="50"
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
                    <p class="sm:ml-4 text-white text-sm uppercase">VENTAS POR ENVIAR</p>
                </div>
                {{-- <p class="py-6 px-6 text-lg tracking-wide text-center">Tiene  pedidos entregados --}}
                </p>

                <div class="flex justify-center px-5 mb-2 text-sm ">
                    <button wire:click="openVentaEnvios" type="button"
                        class="w-full border border-purple-500 text-purple-500 rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:text-white hover:bg-purple-600 focus:outline-none focus:shadow-outline">
                        Ver Ahora
                    </button>
                </div>
            </div>
        </a>
    </div>

    <div class="">

        {{-- CABECERA VENTAS --}}
        <div class="card lg:w-full sm:order-2 {{ $this->openVenta == false ? 'hidden' : '' }}">
            <div class="card-header bg-gray-400 border text-white px-4 py-2">
                <p class="ml-3 mt-1 mb-1"> GENERAR REPORTES DE VENTAS</p></span>
            </div>

            <div class="card-body mb-4 ">
                <div class="container  lg:flex border-2 bg-white">

                    <div class="flex items-center lg:py-2">
                        <x-jet-label class="" value="Fecha Inicio :" />
                        <input wire:model="fechaInicio" type="date" class="form-control w-full">
                    </div>

                    <div class="flex items-center py-2 lg:ml-14">
                        <x-jet-label class="" value="Fecha Fin :" />

                        <input wire:model="fechaFin" type="date" class="form-control ml-3 w-full">
                    </div>

                    <div class="flex items-center py-2 ml-auto gap-4">

                        @can('admin.reports.excel')                                                    
                            @if (isset($ordenes))
                                <a href="{{ route('admin.ventasE.index') . '?fechaInicio=' . $this->fechaInicio . '&' . 'fechaFin=' . $this->fechaFin }}"
                                    target="_blank">
                                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="39" height="39"
                                        viewBox="0 0 172 172" style=" fill:#000000;">
                                        <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1"
                                            stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10"
                                            stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none"
                                            font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                                            <path d="M0,172v-172h172v172z" fill="none"></path>
                                            <g>
                                                <path
                                                    d="M146.91667,35.83333h-57.33333v100.33333h57.33333c1.98158,0 3.58333,-1.60175 3.58333,-3.58333v-93.16667c0,-1.98158 -1.60175,-3.58333 -3.58333,-3.58333z"
                                                    fill="#4caf50"></path>
                                                <path
                                                    d="M114.66667,53.75h25.08333v10.75h-25.08333zM114.66667,89.58333h25.08333v10.75h-25.08333zM114.66667,107.5h25.08333v10.75h-25.08333zM114.66667,71.66667h25.08333v10.75h-25.08333zM89.58333,53.75h17.91667v10.75h-17.91667zM89.58333,89.58333h17.91667v10.75h-17.91667zM89.58333,107.5h17.91667v10.75h-17.91667zM89.58333,71.66667h17.91667v10.75h-17.91667z"
                                                    fill="#ffffff"></path>
                                                <path d="M96.75,150.5l-75.25,-14.33333v-100.33333l75.25,-14.33333z"
                                                    fill="#2e7d32"></path>
                                                <path
                                                    d="M68.54558,111.08333l-8.63942,-16.34358c-0.32967,-0.61275 -0.6665,-1.73075 -1.01767,-3.36117h-0.13258c-0.16483,0.77042 -0.55183,1.93858 -1.161,3.50808l-8.67525,16.19667h-13.46258l15.98883,-25.08692l-14.63075,-25.07975h13.74925l7.17025,15.03567c0.559,1.18608 1.06067,2.59792 1.505,4.22475h0.14333c0.2795,-0.97108 0.80267,-2.43667 1.57308,-4.37167l7.9765,-14.88875h12.59542l-15.04642,24.86475l15.46567,25.29475h-13.40167z"
                                                    fill="#ffffff"></path>
                                            </g>
                                        </g>
                                    </svg>
                                </a>
                            @endif
                        @endcan

                        @can('admin.reports.pdf')                                                    
                            @if (isset($ordenes))
                                <a href="{{ route('admin.ventas.index') . '?fechaInicio=' . $this->fechaInicio . '&' . 'fechaFin=' . $this->fechaFin }}"
                                    target="_blank">
                                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="30" height="30"
                                        viewBox="0 0 226 226" style=" fill:#000000;">
                                        <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1"
                                            stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10"
                                            stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none"
                                            font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                                            <path d="M0,226v-226h226v226z" fill="none"></path>
                                            <g fill="#e74c3c">
                                                <path
                                                    d="M27.12,0v226h171.76v-160.07156l-65.92844,-65.92844zM36.16,9.04h90.4v63.28h63.28v144.64h-153.68zM135.6,15.43156l47.84844,47.84844h-47.84844zM78.27016,110.70469c-3.61953,0 -6.99188,0.38844 -9.605,1.00641v51.00891h8.13953v-20.21641c0.77688,0.08828 1.46547,0.08828 2.31297,0.08828c4.37875,0 9.37547,-1.76562 12.44766,-5.38516c2.38359,-2.77203 3.84906,-6.30328 3.84906,-11.51187c0,-4.46703 -1.39484,-8.45734 -4.16688,-11.07047c-3.07219,-2.91328 -7.52156,-3.91969 -12.97734,-3.91969zM111.00484,110.70469c-3.53125,0 -6.83297,0.38844 -9.21656,1.00641v50.85c1.85391,0.30016 4.69656,0.52969 7.53922,0.52969c6.67406,0 11.75906,-1.67734 15.20203,-5.22625c3.91969,-3.83141 6.69172,-10.82328 6.69172,-21.96437c0,-10.38188 -2.61312,-17.12656 -6.85063,-20.905c-3.07219,-2.84266 -7.38031,-4.29047 -13.36578,-4.29047zM137.89531,110.93422v51.78578h8.22781v-22.35281h12.21812v-6.83297h-12.21812v-15.44922h13.06563v-7.15078zM112.31141,117.30812c7.15078,0 10.43484,6.76234 10.43484,18.52141c0,15.74938 -5.13797,20.51656 -10.82328,20.51656c-0.52969,0 -1.30656,0 -1.99516,-0.15891v-38.64953c0.68859,-0.14125 1.53609,-0.22953 2.38359,-0.22953zM79.64734,117.37875c5.52641,0 7.52156,4.07859 7.52156,8.91641c0,5.91484 -2.98391,9.605 -8.35141,9.605c-0.8475,0 -1.39484,0 -2.01281,-0.15891v-17.97406c0.68859,-0.22953 1.695,-0.38844 2.84266,-0.38844z">
                                                </path>
                                            </g>
                                        </g>
                                    </svg>
                                </a>
                            @endif
                        @endcan
                        
                        @can('admin.reports.create')                                                    
                            <x-jet-danger-button class="ml-auto text-white" wire:click="getVentas" wire:loading.attr="disabled"
                                wire:target="getVentas">
                                VER REPORTE
                            </x-jet-danger-button>
                        @endcan
                    </div>
                </div>
            </div>
        </div>

        @if (isset($orders))
            <div wire:loading wire:target="getVentas"
                class="text-center mb-4 bg-green-100 border border-green-500 text-green-700 px-4 py-3 rounded relative w-full">
                <strong class="font-bold">!Procesando Datos!</strong>
                <span class="block sm:inline">Por favor espere...!</span>
            </div>
        @endif

        @if (isset($ordenes))
            <x-table-responsive class="mt-3">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Compra
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Cant:
                            </th>

                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Cliente
                            </th>

                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Celular
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
                                Envío
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Costo-Envío
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                SubTotal
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Total
                            </th>

                            <th scope="col" class="relative px-6 py-3">
                                <span class="sr-only"></span>
                            </th>

                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($ordenes as $order)
                            <tr class="hover:bg-gray-100 hover:text-red-500 cursor-pointer">
                                <td class="px-6 py-2 whitespace-nowrap">
                                    <div class="flex items-center">

                                        <div class="">
                                            <div class=" text-sm
                                                font-medium">
                                                ORDER : {{ $order->id }}
                                            </div>

                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-2 whitespace-nowrap uppercase">
                                    <div class="text-sm">{{ $order->cant_total }}</div>
                                </td>

                                <td class="px-6 py-2 whitespace-nowrap uppercase">
                                    <div class="text-sm">{{ $order->user->name }}</div>
                                </td>

                                <td class="px-6 py-2 whitespace-nowrap">
                                    <div class="text-sm">{{ $order->phone }}</div>
                                </td>

                                <td class="px-6 py-2 whitespace-nowrap">
                                    <div class="text-sm">{{ $order->created_at->format('d/m/Y') }}</div>
                                </td>
                                <td class="px-6 py-2 whitespace-nowrap">
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
                                        @case(6)
                                            <span
                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-purple-500 opacity-75 text-white">
                                                RESERVADO
                                            </span>

                                        @break
                                        @default

                                    @endswitch
                                </td>
                                <td class="px-6 py-2 whitespace-nowrap">
                                    <div class="text-sm">
                                        @switch($order->envio_type)
                                            @case(1)
                                                <span>NO</span>
                                            @break
                                            @case(2)
                                                <span class="text-red-600 font-semibold">SI</span>
                                            @break
                                            @default

                                        @endswitch
                                    </div>
                                </td>
                                <td class="px-6 py-2 whitespace-nowrap">
                                    <div class="text-sm">S/. {{ $order->shipping_cost }}</div>
                                </td>
                                <td class="px-6 py-2 whitespace-nowrap">
                                    <div class="text-sm">S/.{{ $order->total - $order->shipping_cost }}</div>
                                </td>
                                <td class="px-6 py-2 whitespace-nowrap text-sm text-red-500">
                                    S/. {{ $order->total }}
                                </td>
                                <td class="px-6 py-2 whitespace-nowrap text-right text-sm font-medium flex justify-end">
                                    @can('admin.orders.show')
                                        <a href="{{ route('admin.orders.show', $order) }}">
                                            <div
                                                class="cursor-pointer w-7  border-gray-900 bg-blue-500 text-white border rounded-lg p-1 transform hover:text-white hover:bg-blue-700 hover:scale-110">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                </svg>

                                            </div>
                                        </a>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </x-table-responsive>
        @endif        
    

        {{-- CABECERA CUIDAD --}}
        <div class="card w-full {{ $this->openCity == false ? 'hidden' : '' }}">
            <div class="card-header bg-green-300 border text-white px-4 py-2">
                <p class="ml-3 mt-1 mb-1">REPORTES COSTOS DE ENVÍO POR CUIDAD</p></span>
            </div>

            <div class="card-body mb-4 ">
                <div class="container lg:flex border-2 bg-white items-center">
                    <div class="flex mt-1">
                        <x-jet-label class="flex mt-3">
                            DEPARTAMENTO
                        </x-jet-label>

                        <select wire:model="department_id" class=" flex form-control w-full ml-2 lg:ml-4">
                            <option value="">Todas</option>
                            @foreach ($departments as $departmen)
                                <option value="{{ $departmen->id }}">{{ $departmen->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="flex items-center py-3 lg:ml-auto gap-4">

                        @can('admin.reports.excel')                                                
                            @if (isset($ciudades))
                                <a href="{{ route('admin.costoE.index') . '?department_id=' . $this->department_id }}"
                                    target="_blank">
                                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="39" height="39"
                                        viewBox="0 0 172 172" style=" fill:#000000;">
                                        <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt"
                                            stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0"
                                            font-family="none" font-weight="none" font-size="none" text-anchor="none"
                                            style="mix-blend-mode: normal">
                                            <path d="M0,172v-172h172v172z" fill="none"></path>
                                            <g>
                                                <path
                                                    d="M146.91667,35.83333h-57.33333v100.33333h57.33333c1.98158,0 3.58333,-1.60175 3.58333,-3.58333v-93.16667c0,-1.98158 -1.60175,-3.58333 -3.58333,-3.58333z"
                                                    fill="#4caf50"></path>
                                                <path
                                                    d="M114.66667,53.75h25.08333v10.75h-25.08333zM114.66667,89.58333h25.08333v10.75h-25.08333zM114.66667,107.5h25.08333v10.75h-25.08333zM114.66667,71.66667h25.08333v10.75h-25.08333zM89.58333,53.75h17.91667v10.75h-17.91667zM89.58333,89.58333h17.91667v10.75h-17.91667zM89.58333,107.5h17.91667v10.75h-17.91667zM89.58333,71.66667h17.91667v10.75h-17.91667z"
                                                    fill="#ffffff"></path>
                                                <path d="M96.75,150.5l-75.25,-14.33333v-100.33333l75.25,-14.33333z" fill="#2e7d32">
                                                </path>
                                                <path
                                                    d="M68.54558,111.08333l-8.63942,-16.34358c-0.32967,-0.61275 -0.6665,-1.73075 -1.01767,-3.36117h-0.13258c-0.16483,0.77042 -0.55183,1.93858 -1.161,3.50808l-8.67525,16.19667h-13.46258l15.98883,-25.08692l-14.63075,-25.07975h13.74925l7.17025,15.03567c0.559,1.18608 1.06067,2.59792 1.505,4.22475h0.14333c0.2795,-0.97108 0.80267,-2.43667 1.57308,-4.37167l7.9765,-14.88875h12.59542l-15.04642,24.86475l15.46567,25.29475h-13.40167z"
                                                    fill="#ffffff"></path>
                                            </g>
                                        </g>
                                    </svg>
                                </a>
                            @endif
                        @endcan

                        @can('admin.reports.pdf')                                                
                            @if (isset($ciudades))
                                <a href="{{ route('admin.costo.index') . '?department_id=' . $this->department_id }}"
                                    target="_blank">
                                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="30" height="30"
                                        viewBox="0 0 226 226" style=" fill:#000000;">
                                        <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt"
                                            stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0"
                                            font-family="none" font-weight="none" font-size="none" text-anchor="none"
                                            style="mix-blend-mode: normal">
                                            <path d="M0,226v-226h226v226z" fill="none"></path>
                                            <g fill="#e74c3c">
                                                <path
                                                    d="M27.12,0v226h171.76v-160.07156l-65.92844,-65.92844zM36.16,9.04h90.4v63.28h63.28v144.64h-153.68zM135.6,15.43156l47.84844,47.84844h-47.84844zM78.27016,110.70469c-3.61953,0 -6.99188,0.38844 -9.605,1.00641v51.00891h8.13953v-20.21641c0.77688,0.08828 1.46547,0.08828 2.31297,0.08828c4.37875,0 9.37547,-1.76562 12.44766,-5.38516c2.38359,-2.77203 3.84906,-6.30328 3.84906,-11.51187c0,-4.46703 -1.39484,-8.45734 -4.16688,-11.07047c-3.07219,-2.91328 -7.52156,-3.91969 -12.97734,-3.91969zM111.00484,110.70469c-3.53125,0 -6.83297,0.38844 -9.21656,1.00641v50.85c1.85391,0.30016 4.69656,0.52969 7.53922,0.52969c6.67406,0 11.75906,-1.67734 15.20203,-5.22625c3.91969,-3.83141 6.69172,-10.82328 6.69172,-21.96437c0,-10.38188 -2.61312,-17.12656 -6.85063,-20.905c-3.07219,-2.84266 -7.38031,-4.29047 -13.36578,-4.29047zM137.89531,110.93422v51.78578h8.22781v-22.35281h12.21812v-6.83297h-12.21812v-15.44922h13.06563v-7.15078zM112.31141,117.30812c7.15078,0 10.43484,6.76234 10.43484,18.52141c0,15.74938 -5.13797,20.51656 -10.82328,20.51656c-0.52969,0 -1.30656,0 -1.99516,-0.15891v-38.64953c0.68859,-0.14125 1.53609,-0.22953 2.38359,-0.22953zM79.64734,117.37875c5.52641,0 7.52156,4.07859 7.52156,8.91641c0,5.91484 -2.98391,9.605 -8.35141,9.605c-0.8475,0 -1.39484,0 -2.01281,-0.15891v-17.97406c0.68859,-0.22953 1.695,-0.38844 2.84266,-0.38844z">
                                                </path>
                                            </g>
                                        </g>
                                    </svg>
                                </a>
                            @endif
                        @endcan

                        @can('admin.reports.create')                                                    
                            <x-jet-danger-button class="lg:ml-2 ml-auto text-white" wire:click="getCities" wire:loading.attr="disabled" wire:target="getCities">
                                VER REPORTE
                            </x-jet-danger-button>
                        @endcan
                    </div>
                </div>
            </div>
        </div>

        @if (isset($cities))
            <div wire:loading wire:target="getCities"
                class="text-center mb-4 bg-green-100 border border-green-500 text-green-700 px-4 py-3 rounded relative w-full">
                <strong class="font-bold">!Procesando Datos!</strong>
                <span class="block sm:inline">Por favor espere...!</span>
            </div>
        @endif

        @if (isset($ciudades))
            <x-table-responsive class="mt-3">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Codigo
                            </th>

                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Nombre del departamento
                            </th>

                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Cuidad
                            </th>

                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Costo de envío
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($ciudades as $ciudade)
                            <tr class="hover:bg-gray-100 hover:text-red-500 cursor-pointer">
                                <td class="px-6 py-2 whitespace-nowrap">
                                    <div class="flex items-center">

                                        <div class="ml-4">
                                            <div class="text-sm font-medium ">
                                                {{ $ciudade->id }}
                                            </div>

                                        </div>
                                    </div>
                                </td>

                                <td class="px-6 py-2 whitespace-nowrap uppercase">
                                    <div class="text-sm ">
                                        @php
                                            $departamento = \App\Models\Department::find($ciudade->department_id);
                                        @endphp
                                        {{ $departamento->name }}
                                </td>

                                <td class="px-6 py-2 whitespace-nowrap uppercase">
                                    <div class="text-sm ">
                                        {{ $ciudade->name }}
                                    </div>
                                </td>

                                <td class="px-6 py-2 whitespace-nowrap uppercase">
                                    <div class="text-sm font-bold text-red-600">S/. {{ $ciudade->cost }}</div>
                                </td>

                            </tr>
                        @endforeach

                        <!-- More people... -->
                    </tbody>
                </table>
            </x-table-responsive>
        @endif        


        {{-- CABECERA PRODUCTOS --}}
        <div class="card w-full {{ $this->openProducto == false ? 'hidden' : '' }}">
            <div class="card-header bg-yellow-300 border text-white px-4 py-2">
                <p class="ml-3 mt-1 mb-1 font-bold">REPORTES STOCK POR PRODUCTO</p></span>
            </div>

            <div class="card-body mb-4 ">
                <div class="lg:container lg:flex border-2 bg-white">
                    <div class="grid grid-cols-2 lg:grid-cols-4">

                        <div class="flex items-center ml-1 py-2">
                            {{-- <x-jet-label class="" value=" Filtrar por :" /> --}}
                            <select wire:model="category_id" class="form-control w-full lg:ml-2">
                                <option value="">Toda Categoría</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="flex items-center py-2 ml-1 mr-1 lg:ml-4">
                            <select wire:model="subcategory_id" class="form-control w-full lg:ml-2">
                                <option class="text-sm" value="">Toda Subcategorías</option>
                                @foreach ($subcategories as $subcategory)
                                    <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="flex items-center ml-1 py-2">
                            <select wire:model="brand_id" class="form-control w-full  lg:ml-2">
                                <option value="">Toda Marcas</option>
                                @foreach ($brands as $brand)
                                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                @endforeach
                            </select>

                        </div>                                           

                        @can('admin.reports.create')                                                    
                            <div class="flex items-center ml-1 mr-1 py-2">
                                <x-jet-danger-button class="w-full lg:ml-4" wire:click="getStockAgotado" wire:loading.attr="disabled"
                                    wire:target="getStockAgotado">
                                    AGOTADOS
                                </x-jet-danger-button>
                            </div>
                        @endcan
                    </div>

                    <div class="flex items-center py-2 ml-auto gap-4">
                        @can('admin.reports.excel')                                                    
                            @if (isset($productosAgotados))
                                <a href="{{ route('admin.stockagotadoE.index') . '?category_id=' . $this->category_id . '&' . 'subcategory_id=' . $this->subcategory_id . '&' . 'brand_id=' . $this->brand_id }}"
                                    target="_blank">
                                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="39" height="39"
                                        viewBox="0 0 172 172" style=" fill:#000000;">
                                        <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt"
                                            stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0"
                                            font-family="none" font-weight="none" font-size="none" text-anchor="none"
                                            style="mix-blend-mode: normal">
                                            <path d="M0,172v-172h172v172z" fill="none"></path>
                                            <g>
                                                <path
                                                    d="M146.91667,35.83333h-57.33333v100.33333h57.33333c1.98158,0 3.58333,-1.60175 3.58333,-3.58333v-93.16667c0,-1.98158 -1.60175,-3.58333 -3.58333,-3.58333z"
                                                    fill="#4caf50"></path>
                                                <path
                                                    d="M114.66667,53.75h25.08333v10.75h-25.08333zM114.66667,89.58333h25.08333v10.75h-25.08333zM114.66667,107.5h25.08333v10.75h-25.08333zM114.66667,71.66667h25.08333v10.75h-25.08333zM89.58333,53.75h17.91667v10.75h-17.91667zM89.58333,89.58333h17.91667v10.75h-17.91667zM89.58333,107.5h17.91667v10.75h-17.91667zM89.58333,71.66667h17.91667v10.75h-17.91667z"
                                                    fill="#ffffff"></path>
                                                <path d="M96.75,150.5l-75.25,-14.33333v-100.33333l75.25,-14.33333z" fill="#2e7d32">
                                                </path>
                                                <path
                                                    d="M68.54558,111.08333l-8.63942,-16.34358c-0.32967,-0.61275 -0.6665,-1.73075 -1.01767,-3.36117h-0.13258c-0.16483,0.77042 -0.55183,1.93858 -1.161,3.50808l-8.67525,16.19667h-13.46258l15.98883,-25.08692l-14.63075,-25.07975h13.74925l7.17025,15.03567c0.559,1.18608 1.06067,2.59792 1.505,4.22475h0.14333c0.2795,-0.97108 0.80267,-2.43667 1.57308,-4.37167l7.9765,-14.88875h12.59542l-15.04642,24.86475l15.46567,25.29475h-13.40167z"
                                                    fill="#ffffff"></path>
                                            </g>
                                        </g>
                                    </svg>
                                </a>
                            @endif
                        @endcan

                        @can('admin.reports.excel')                                                    
                            @if (isset($productos))
                                <a href="{{ route('admin.stockE.index') . '?category_id=' . $this->category_id . '&' . 'subcategory_id=' . $this->subcategory_id . '&' . 'brand_id=' . $this->brand_id }}"
                                    target="_blank">
                                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="39" height="39"
                                        viewBox="0 0 172 172" style=" fill:#000000;">
                                        <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt"
                                            stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0"
                                            font-family="none" font-weight="none" font-size="none" text-anchor="none"
                                            style="mix-blend-mode: normal">
                                            <path d="M0,172v-172h172v172z" fill="none"></path>
                                            <g>
                                                <path
                                                    d="M146.91667,35.83333h-57.33333v100.33333h57.33333c1.98158,0 3.58333,-1.60175 3.58333,-3.58333v-93.16667c0,-1.98158 -1.60175,-3.58333 -3.58333,-3.58333z"
                                                    fill="#4caf50"></path>
                                                <path
                                                    d="M114.66667,53.75h25.08333v10.75h-25.08333zM114.66667,89.58333h25.08333v10.75h-25.08333zM114.66667,107.5h25.08333v10.75h-25.08333zM114.66667,71.66667h25.08333v10.75h-25.08333zM89.58333,53.75h17.91667v10.75h-17.91667zM89.58333,89.58333h17.91667v10.75h-17.91667zM89.58333,107.5h17.91667v10.75h-17.91667zM89.58333,71.66667h17.91667v10.75h-17.91667z"
                                                    fill="#ffffff"></path>
                                                <path d="M96.75,150.5l-75.25,-14.33333v-100.33333l75.25,-14.33333z" fill="#2e7d32">
                                                </path>
                                                <path
                                                    d="M68.54558,111.08333l-8.63942,-16.34358c-0.32967,-0.61275 -0.6665,-1.73075 -1.01767,-3.36117h-0.13258c-0.16483,0.77042 -0.55183,1.93858 -1.161,3.50808l-8.67525,16.19667h-13.46258l15.98883,-25.08692l-14.63075,-25.07975h13.74925l7.17025,15.03567c0.559,1.18608 1.06067,2.59792 1.505,4.22475h0.14333c0.2795,-0.97108 0.80267,-2.43667 1.57308,-4.37167l7.9765,-14.88875h12.59542l-15.04642,24.86475l15.46567,25.29475h-13.40167z"
                                                    fill="#ffffff"></path>
                                            </g>
                                        </g>
                                    </svg>
                                </a>
                            @endif
                        @endcan

                        @can('admin.reports.pdf')                                                    
                            @if (isset($productosAgotados))
                                <a href="{{ route('admin.agotado.index') . '?category_id=' . $this->category_id . '&' . 'subcategory_id=' . $this->subcategory_id . '&' . 'brand_id=' . $this->brand_id }}"
                                    target="_blank">
                                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="30" height="30"
                                        viewBox="0 0 226 226" style=" fill:#000000;">
                                        <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt"
                                            stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0"
                                            font-family="none" font-weight="none" font-size="none" text-anchor="none"
                                            style="mix-blend-mode: normal">
                                            <path d="M0,226v-226h226v226z" fill="none"></path>
                                            <g fill="#e74c3c">
                                                <path
                                                    d="M27.12,0v226h171.76v-160.07156l-65.92844,-65.92844zM36.16,9.04h90.4v63.28h63.28v144.64h-153.68zM135.6,15.43156l47.84844,47.84844h-47.84844zM78.27016,110.70469c-3.61953,0 -6.99188,0.38844 -9.605,1.00641v51.00891h8.13953v-20.21641c0.77688,0.08828 1.46547,0.08828 2.31297,0.08828c4.37875,0 9.37547,-1.76562 12.44766,-5.38516c2.38359,-2.77203 3.84906,-6.30328 3.84906,-11.51187c0,-4.46703 -1.39484,-8.45734 -4.16688,-11.07047c-3.07219,-2.91328 -7.52156,-3.91969 -12.97734,-3.91969zM111.00484,110.70469c-3.53125,0 -6.83297,0.38844 -9.21656,1.00641v50.85c1.85391,0.30016 4.69656,0.52969 7.53922,0.52969c6.67406,0 11.75906,-1.67734 15.20203,-5.22625c3.91969,-3.83141 6.69172,-10.82328 6.69172,-21.96437c0,-10.38188 -2.61312,-17.12656 -6.85063,-20.905c-3.07219,-2.84266 -7.38031,-4.29047 -13.36578,-4.29047zM137.89531,110.93422v51.78578h8.22781v-22.35281h12.21812v-6.83297h-12.21812v-15.44922h13.06563v-7.15078zM112.31141,117.30812c7.15078,0 10.43484,6.76234 10.43484,18.52141c0,15.74938 -5.13797,20.51656 -10.82328,20.51656c-0.52969,0 -1.30656,0 -1.99516,-0.15891v-38.64953c0.68859,-0.14125 1.53609,-0.22953 2.38359,-0.22953zM79.64734,117.37875c5.52641,0 7.52156,4.07859 7.52156,8.91641c0,5.91484 -2.98391,9.605 -8.35141,9.605c-0.8475,0 -1.39484,0 -2.01281,-0.15891v-17.97406c0.68859,-0.22953 1.695,-0.38844 2.84266,-0.38844z">
                                                </path>
                                            </g>
                                        </g>
                                    </svg>
                                </a>
                            @endif
                        @endcan

                        @can('admin.reports.pdf')                                                    
                            @if (isset($productos))
                                <a href="{{ route('admin.export.index') . '?category_id=' . $this->category_id . '&' . 'subcategory_id=' . $this->subcategory_id . '&' . 'brand_id=' . $this->brand_id }}"
                                    target="_blank">
                                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="30" height="30"
                                        viewBox="0 0 226 226" style=" fill:#000000;">
                                        <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt"
                                            stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0"
                                            font-family="none" font-weight="none" font-size="none" text-anchor="none"
                                            style="mix-blend-mode: normal">
                                            <path d="M0,226v-226h226v226z" fill="none"></path>
                                            <g fill="#e74c3c">
                                                <path
                                                    d="M27.12,0v226h171.76v-160.07156l-65.92844,-65.92844zM36.16,9.04h90.4v63.28h63.28v144.64h-153.68zM135.6,15.43156l47.84844,47.84844h-47.84844zM78.27016,110.70469c-3.61953,0 -6.99188,0.38844 -9.605,1.00641v51.00891h8.13953v-20.21641c0.77688,0.08828 1.46547,0.08828 2.31297,0.08828c4.37875,0 9.37547,-1.76562 12.44766,-5.38516c2.38359,-2.77203 3.84906,-6.30328 3.84906,-11.51187c0,-4.46703 -1.39484,-8.45734 -4.16688,-11.07047c-3.07219,-2.91328 -7.52156,-3.91969 -12.97734,-3.91969zM111.00484,110.70469c-3.53125,0 -6.83297,0.38844 -9.21656,1.00641v50.85c1.85391,0.30016 4.69656,0.52969 7.53922,0.52969c6.67406,0 11.75906,-1.67734 15.20203,-5.22625c3.91969,-3.83141 6.69172,-10.82328 6.69172,-21.96437c0,-10.38188 -2.61312,-17.12656 -6.85063,-20.905c-3.07219,-2.84266 -7.38031,-4.29047 -13.36578,-4.29047zM137.89531,110.93422v51.78578h8.22781v-22.35281h12.21812v-6.83297h-12.21812v-15.44922h13.06563v-7.15078zM112.31141,117.30812c7.15078,0 10.43484,6.76234 10.43484,18.52141c0,15.74938 -5.13797,20.51656 -10.82328,20.51656c-0.52969,0 -1.30656,0 -1.99516,-0.15891v-38.64953c0.68859,-0.14125 1.53609,-0.22953 2.38359,-0.22953zM79.64734,117.37875c5.52641,0 7.52156,4.07859 7.52156,8.91641c0,5.91484 -2.98391,9.605 -8.35141,9.605c-0.8475,0 -1.39484,0 -2.01281,-0.15891v-17.97406c0.68859,-0.22953 1.695,-0.38844 2.84266,-0.38844z">
                                                </path>
                                            </g>
                                        </g>
                                    </svg>
                                </a>
                            @endif
                        @endcan

                        @can('admin.reports.create')                                                    
                            <x-jet-danger-button class="ml-auto mr-1 text-white lg:mr-8" wire:click="getProducts" wire:loading.attr="disabled" wire:target="getProducts">
                                VER REPORTE
                            </x-jet-danger-button>
                        @endcan
                    </div>
                </div>
            </div>
        </div>

        @if (isset($products))
            <div wire:loading wire:target="getProducts"
                class="text-center mb-4 bg-green-100 border border-green-500 text-green-700 px-4 py-3 rounded relative w-full">
                <strong class="font-bold">!Procesando Datos!</strong>
                <span class="block sm:inline">Por favor espere...!</span>
            </div>
        @endif

        @if (isset($productos))
            <div class="px-6 py-4">
                <x-jet-input wire:model="search" class="w-full " type="text" placeholder="Ingrese el nombre del producto que quiere buscar" />
            </div>
            <x-table-responsive class="mt-3">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="py-3 px-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Codigo
                            </th>

                            <th scope="col" class="py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                producto
                            </th>

                            <th scope="col" class="py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Publicado
                            </th>

                            <th scope="col" class="py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Categoria
                            </th>

                            <th scope="col" class="py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Subcategoria
                            </th>

                            <th scope="col" class="py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Marca
                            </th>

                            <th scope="col" class="py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Talla
                            </th>

                            <th scope="col" class="py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Color
                            </th>

                            <th scope="col" class="py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Stock
                            </th>

                            <th scope="col" class="py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Precio
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($productos as $producto)                                    
                            @if ($producto->sizes->count())
                                @foreach ($producto->sizes as $size)
                                    @if ($size->colors->count())
                                        @foreach ($size->colors as $color)
                                            <tr
                                                class="hover:bg-gray-100 hover:cursor-pointer hover:text-red-600 {{ $color->pivot->quantity <= $this->minimoStock ? 'text-red-600 font-bold' : '' }}">
                                                <td class="py-2 whitespace-nowrap">
                                                    <div class="text-sm ml-2">
                                                        {{ $producto->id }}
                                                    </div>
                                                </td>

                                                <td class="py-2 whitespace-nowrap uppercase">
                                                    <div class="text-sm">
                                                        {{ $producto->name }}
                                                    </div>
                                                </td>

                                                <td class="py-2 whitespace-nowrap uppercase">
                                                    <div class="text-sm">
                                                        @switch($producto->status)
                                                            @case(1)
                                                                <span class="text-red-500 font-bold">NO</span>
                                                            @break
                                                            @case(2)
                                                                <span class="text-green-600 font-bold">SI</span>
                                                            @break
                                                            @default

                                                        @endswitch
                                                    </div>
                                                </td>

                                                <td class="py-2 whitespace-nowrap uppercase">
                                                    <div class="text-sm">
                                                        {{ $producto->subcategory->category->name }}
                                                    </div>
                                                </td>

                                                <td class="py-2 whitespace-nowrap uppercase">
                                                    <div class="text-sm">
                                                        {{ $producto->subcategory->name }}
                                                    </div>
                                                </td>

                                                <td class="py-2 whitespace-nowrap uppercase">
                                                    <div class="text-sm">
                                                        {{ $producto->brand->name }}
                                                    </div>
                                                </td>
                                                <td class="py-2 whitespace-nowrap uppercase">
                                                    <div class="text-sm">
                                                        {{ $size->name }}
                                                    </div>
                                                </td>
                                                <td class="py-2 whitespace-nowrap uppercase">
                                                    <div class="text-sm">
                                                        {{ __($color->name) }}
                                                    </div>
                                                </td>

                                                <td class="py-2 whitespace-nowrap uppercase">
                                                    <div class="text-sm">
                                                        <span>
                                                            {{ $color->pivot->quantity }}
                                                        </span>

                                                    </div>
                                                </td>

                                                <td class="py-2 whitespace-nowrap uppercase">
                                                    <div class="text-sm text-red-600">S/. {{ $producto->price }}</div>
                                                </td>

                                            </tr>
                                        @endforeach
                                    @endif
                                @endforeach
                            @endif

                            @if ($producto->colors->count())
                                @foreach ($producto->colors as $item)
                                    <tr
                                        class="hover:bg-gray-100 hover:cursor-pointer hover:text-red-600 {{ $item->pivot->quantity <= $this->minimoStock ? 'text-red-600 font-bold' : '' }}">
                                        <td class="py-2 whitespace-nowrap">
                                            <div class="text-sm ml-2">
                                                {{ $producto->id }}
                                            </div>
                                        </td>

                                        <td class="py-2 whitespace-nowrap uppercase">
                                            <div class="text-sm">
                                                {{ $producto->name }}
                                            </div>
                                        </td>

                                        <td class="py-2 whitespace-nowrap uppercase">
                                            <div class="text-sm">
                                                @switch($producto->status)
                                                    @case(1)
                                                        <span class="text-red-500 font-bold">NO</span>
                                                    @break
                                                    @case(2)
                                                        <span class="text-green-600 font-bold">SI</span>
                                                    @break
                                                    @default

                                                @endswitch
                                            </div>
                                        </td>

                                        <td class="py-2 whitespace-nowrap uppercase">
                                            <div class="text-sm">
                                                {{ $producto->subcategory->category->name }}
                                            </div>
                                        </td>

                                        <td class="py-2 whitespace-nowrap uppercase">
                                            <div class="text-sm">
                                                {{ $producto->subcategory->name }}
                                            </div>
                                        </td>

                                        <td class="py-2 whitespace-nowrap uppercase">
                                            <div class="text-sm">
                                                {{ $producto->brand->name }}
                                            </div>
                                        </td>
                                        <td class="py-2 whitespace-nowrap uppercase">
                                            <div class="text-sm">

                                            </div>
                                        </td>
                                        <td class="py-2 whitespace-nowrap uppercase">
                                            <div class="text-sm">
                                                {{ __($item->name) }}
                                            </div>
                                        </td>

                                        <td class="py-2 whitespace-nowrap uppercase">
                                            <div class="text-sm">
                                                <span>
                                                    {{ $item->pivot->quantity }}
                                                </span>

                                            </div>
                                        </td>

                                        <td class="py-2 whitespace-nowrap uppercase">
                                            <div class="text-sm text-red-600">S/. {{ $producto->price }}</div>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif

                            @if ($producto->quantity != null)
                                <tr
                                    class="hover:bg-gray-100 hover:cursor-pointer hover:text-red-600 {{ $producto->quantity <= $this->minimoStock ? 'text-red-600 font-bold' : '' }}">
                                    <td class="py-2 whitespace-nowrap">
                                        <div class="text-sm ml-2">
                                            {{ $producto->id }}
                                        </div>
                                    </td>

                                    <td class="py-2 whitespace-nowrap uppercase">
                                        <div class="text-sm">
                                            {{ $producto->name }}
                                        </div>
                                    </td>

                                    <td class="py-2 whitespace-nowrap uppercase">
                                        <div class="text-sm">
                                            @switch($producto->status)
                                                @case(1)
                                                    <span class="text-red-500 font-bold">NO</span>
                                                @break
                                                @case(2)
                                                    <span class="text-green-600 font-bold">SI</span>
                                                @break
                                                @default

                                            @endswitch
                                        </div>
                                    </td>

                                    <td class="py-2 whitespace-nowrap uppercase">
                                        <div class="text-sm">
                                            {{ $producto->subcategory->category->name }}
                                        </div>
                                    </td>

                                    <td class="py-2 whitespace-nowrap uppercase">
                                        <div class="text-sm">
                                            {{ $producto->subcategory->name }}
                                        </div>
                                    </td>

                                    <td class="py-2 whitespace-nowrap uppercase">
                                        <div class="text-sm">
                                            {{ $producto->brand->name }}
                                        </div>
                                    </td>
                                    <td class="py-2 whitespace-nowrap uppercase">
                                        <div class="text-sm">

                                        </div>
                                    </td>
                                    <td class="py-2 whitespace-nowrap uppercase">
                                        <div class="text-sm">

                                        </div>
                                    </td>

                                    <td class="py-2 whitespace-nowrap uppercase">
                                        <div class="text-sm">
                                            <span>
                                                {{ $producto->quantity }}
                                            </span>

                                        </div>
                                    </td>

                                    <td class="py-2 whitespace-nowrap uppercase">
                                        <div class="text-sm text-red-600">S/. {{ $producto->price }}</div>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </x-table-responsive>
        @endif        

        
        {{-- STOCK AGOTADO --}}
        @if (isset($productsAgotado))
            <div wire:loading wire:target="getStockAgotado"
                class="text-center mb-4 bg-green-100 border border-green-500 text-green-700 px-4 py-3 rounded relative w-full">
                <strong class="font-bold">!Procesando Datos!</strong>
                <span class="block sm:inline">Por favor espere...!</span>
            </div>
        @endif

        @if (isset($productosAgotados))

            <div class="px-6 py-4 flex">
                <x-jet-input wire:model="searchStock" class="w-full " type="text"
                    placeholder="Ingrese el nombre del producto que quiere buscar" />
            </div>

            <x-table-responsive class="mt-3">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="py-3 px-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Codigo
                            </th>

                            <th scope="col" class="py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                producto
                            </th>

                            <th scope="col" class="py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Publicado
                            </th>

                            <th scope="col" class="py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Categoria
                            </th>

                            <th scope="col" class="py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Subcategoria
                            </th>

                            <th scope="col" class="py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Marca
                            </th>

                            <th scope="col" class="py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Talla
                            </th>

                            <th scope="col" class="py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Color
                            </th>

                            <th scope="col" class="py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Stock
                            </th>

                            <th scope="col" class="py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Precio
                            </th>
                        </tr>
                    </thead>

                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($productosAgotados as $producto)
                            @if ($producto->sizes->count())
                                @foreach ($producto->sizes as $size)
                                    @if ($size->colors->count())
                                        @foreach ($size->colors as $color)
                                            @if ($color->pivot->quantity <= $this->minimoStock)
                                                <tr
                                                    class="hover:bg-gray-100 hover:cursor-pointer hover:text-red-600 {{ $color->pivot->quantity <= $this->minimoStock ? 'text-red-600 font-bold' : '' }}">
                                                    <td class="py-2 whitespace-nowrap">
                                                        <div class="text-sm ml-2">
                                                            {{ $producto->id }}
                                                        </div>
                                                    </td>

                                                    <td class="py-2 whitespace-nowrap uppercase">
                                                        <div class="text-sm">
                                                            {{ $producto->name }}
                                                        </div>
                                                    </td>

                                                    <td class="py-2 whitespace-nowrap uppercase">
                                                        <div class="text-sm">
                                                            @switch($producto->status)
                                                                @case(1)
                                                                    <span class="text-red-500 font-bold">NO</span>
                                                                @break
                                                                @case(2)
                                                                    <span class="text-green-600 font-bold">SI</span>
                                                                @break
                                                                @default

                                                            @endswitch
                                                        </div>
                                                    </td>

                                                    <td class="py-2 whitespace-nowrap uppercase">
                                                        <div class="text-sm">
                                                            {{ $producto->subcategory->category->name }}
                                                        </div>
                                                    </td>

                                                    <td class="py-2 whitespace-nowrap uppercase">
                                                        <div class="text-sm">
                                                            {{ $producto->subcategory->name }}
                                                        </div>
                                                    </td>

                                                    <td class="py-2 whitespace-nowrap uppercase">
                                                        <div class="text-sm">
                                                            {{ $producto->brand->name }}
                                                        </div>
                                                    </td>
                                                    <td class="py-2 whitespace-nowrap uppercase">
                                                        <div class="text-sm">
                                                            {{ $size->name }}
                                                        </div>
                                                    </td>
                                                    <td class="py-2 whitespace-nowrap uppercase">
                                                        <div class="text-sm">
                                                            {{ __($color->name) }}
                                                        </div>
                                                    </td>

                                                    <td class="py-2 whitespace-nowrap uppercase">
                                                        <div class="text-sm">
                                                            <span>
                                                                {{ $color->pivot->quantity }}
                                                            </span>

                                                        </div>
                                                    </td>

                                                    <td class="py-2 whitespace-nowrap uppercase">
                                                        <div class="text-sm text-red-600">S/. {{ $producto->price }}</div>
                                                    </td>

                                                </tr>
                                            @endif
                                        @endforeach
                                    @endif
                                @endforeach
                            @endif

                            @if ($producto->colors->count())
                                @foreach ($producto->colors as $item)
                                    @if ($item->pivot->quantity <= $this->minimoStock)
                                        <tr
                                            class="hover:bg-gray-100 hover:cursor-pointer hover:text-red-600 {{ $item->pivot->quantity <= $this->minimoStock ? 'text-red-600 font-bold' : '' }}">
                                            <td class="py-2 whitespace-nowrap">
                                                <div class="text-sm ml-2">
                                                    {{ $producto->id }}
                                                </div>
                                            </td>

                                            <td class="py-2 whitespace-nowrap uppercase">
                                                <div class="text-sm">
                                                    {{ $producto->name }}
                                                </div>
                                            </td>

                                            <td class="py-2 whitespace-nowrap uppercase">
                                                <div class="text-sm">
                                                    @switch($producto->status)
                                                        @case(1)
                                                            <span class="text-red-500 font-bold">NO</span>
                                                        @break
                                                        @case(2)
                                                            <span class="text-green-600 font-bold">SI</span>
                                                        @break
                                                        @default

                                                    @endswitch
                                                </div>
                                            </td>

                                            <td class="py-2 whitespace-nowrap uppercase">
                                                <div class="text-sm">
                                                    {{ $producto->subcategory->category->name }}
                                                </div>
                                            </td>

                                            <td class="py-2 whitespace-nowrap uppercase">
                                                <div class="text-sm">
                                                    {{ $producto->subcategory->name }}
                                                </div>
                                            </td>

                                            <td class="py-2 whitespace-nowrap uppercase">
                                                <div class="text-sm">
                                                    {{ $producto->brand->name }}
                                                </div>
                                            </td>
                                            <td class="py-2 whitespace-nowrap uppercase">
                                                <div class="text-sm">

                                                </div>
                                            </td>
                                            <td class="py-2 whitespace-nowrap uppercase">
                                                <div class="text-sm">
                                                    {{ __($item->name) }}
                                                </div>
                                            </td>

                                            <td class="py-2 whitespace-nowrap uppercase">
                                                <div class="text-sm">
                                                    <span>
                                                        {{ $item->pivot->quantity }}
                                                    </span>

                                                </div>
                                            </td>

                                            <td class="py-2 whitespace-nowrap uppercase">
                                                <div class="text-sm text-red-600">S/. {{ $producto->price }}</div>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            @endif

                            @if ($producto->quantity != null)
                                @if ($producto->quantity <= $this->minimoStock)
                                    <tr
                                        class="hover:bg-gray-100 hover:cursor-pointer hover:text-red-600 {{ $producto->quantity <= $this->minimoStock ? 'text-red-600 font-bold' : '' }}">
                                        <td class="py-2 whitespace-nowrap">
                                            <div class="text-sm ml-2">
                                                {{ $producto->id }}
                                            </div>
                                        </td>

                                        <td class="py-2 whitespace-nowrap uppercase">
                                            <div class="text-sm">
                                                {{ $producto->name }}
                                            </div>
                                        </td>

                                        <td class="py-2 whitespace-nowrap uppercase">
                                            <div class="text-sm">
                                                @switch($producto->status)
                                                    @case(1)
                                                        <span class="text-red-500 font-bold">NO</span>
                                                    @break
                                                    @case(2)
                                                        <span class="text-green-600 font-bold">SI</span>
                                                    @break
                                                    @default

                                                @endswitch
                                            </div>
                                        </td>

                                        <td class="py-2 whitespace-nowrap uppercase">
                                            <div class="text-sm">
                                                {{ $producto->subcategory->category->name }}
                                            </div>
                                        </td>

                                        <td class="py-2 whitespace-nowrap uppercase">
                                            <div class="text-sm">
                                                {{ $producto->subcategory->name }}
                                            </div>
                                        </td>

                                        <td class="py-2 whitespace-nowrap uppercase">
                                            <div class="text-sm">
                                                {{ $producto->brand->name }}
                                            </div>
                                        </td>
                                        <td class="py-2 whitespace-nowrap uppercase">
                                            <div class="text-sm">

                                            </div>
                                        </td>
                                        <td class="py-2 whitespace-nowrap uppercase">
                                            <div class="text-sm">

                                            </div>
                                        </td>

                                        <td class="py-2 whitespace-nowrap uppercase">
                                            <div class="text-sm">
                                                <span>
                                                    {{ $producto->quantity }}
                                                </span>

                                            </div>
                                        </td>

                                        <td class="py-2 whitespace-nowrap uppercase">
                                            <div class="text-sm text-red-600">S/. {{ $producto->price }}</div>
                                        </td>
                                    </tr>
                                @endif
                            @endif

                        @endforeach

                    </tbody>
                </table>
            </x-table-responsive>
        @endif



        {{-- CABECERA VENDIDOS --}}
        <div class="card w-full {{ $this->openProductoVendido == false ? 'hidden' : '' }}">
            <div class="card-header bg-pink-500 border text-white px-4 py-2">
                <p class="ml-3 mt-1 mb-1">REPORTES DE PRODUCTOS VENDIDOS</p></span>
            </div>

            <div class="card-body mb-4 ">
                <div class="container  lg:flex border-2 bg-white">

                    <div class="flex items-center py-2">
                        <x-jet-label class="" value=" Fecha Inicio :" />
                        <input wire:model="fechaInicio" type="date" class="form-control w-full">
                    </div>

                    <div class="flex items-center py-2 lg:ml-14">
                        <x-jet-label class="" value=" Fecha Fin :" />

                        <input wire:model="fechaFin" type="date" class="form-control ml-3 w-full">
                    </div>

                    <div class="flex items-center py-2 ml-auto gap-4">

                        @can('admin.reports.excel')                                                    
                            @if (isset($ventas))
                                <a href="{{ route('admin.vendidosE.index') . '?fechaInicio=' . $this->fechaInicio . '&' . 'fechaFin=' . $this->fechaFin }}"
                                    target="_blank">
                                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="39" height="39"
                                        viewBox="0 0 172 172" style=" fill:#000000;">
                                        <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt"
                                            stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0"
                                            font-family="none" font-weight="none" font-size="none" text-anchor="none"
                                            style="mix-blend-mode: normal">
                                            <path d="M0,172v-172h172v172z" fill="none"></path>
                                            <g>
                                                <path
                                                    d="M146.91667,35.83333h-57.33333v100.33333h57.33333c1.98158,0 3.58333,-1.60175 3.58333,-3.58333v-93.16667c0,-1.98158 -1.60175,-3.58333 -3.58333,-3.58333z"
                                                    fill="#4caf50"></path>
                                                <path
                                                    d="M114.66667,53.75h25.08333v10.75h-25.08333zM114.66667,89.58333h25.08333v10.75h-25.08333zM114.66667,107.5h25.08333v10.75h-25.08333zM114.66667,71.66667h25.08333v10.75h-25.08333zM89.58333,53.75h17.91667v10.75h-17.91667zM89.58333,89.58333h17.91667v10.75h-17.91667zM89.58333,107.5h17.91667v10.75h-17.91667zM89.58333,71.66667h17.91667v10.75h-17.91667z"
                                                    fill="#ffffff"></path>
                                                <path d="M96.75,150.5l-75.25,-14.33333v-100.33333l75.25,-14.33333z" fill="#2e7d32">
                                                </path>
                                                <path
                                                    d="M68.54558,111.08333l-8.63942,-16.34358c-0.32967,-0.61275 -0.6665,-1.73075 -1.01767,-3.36117h-0.13258c-0.16483,0.77042 -0.55183,1.93858 -1.161,3.50808l-8.67525,16.19667h-13.46258l15.98883,-25.08692l-14.63075,-25.07975h13.74925l7.17025,15.03567c0.559,1.18608 1.06067,2.59792 1.505,4.22475h0.14333c0.2795,-0.97108 0.80267,-2.43667 1.57308,-4.37167l7.9765,-14.88875h12.59542l-15.04642,24.86475l15.46567,25.29475h-13.40167z"
                                                    fill="#ffffff"></path>
                                            </g>
                                        </g>
                                    </svg>
                                </a>
                            @endif
                        @endcan

                        @can('admin.reports.pdf')                                                    
                            @if (isset($ventas))
                                <a href="{{ route('admin.vendidos.index') . '?fechaInicio=' . $this->fechaInicio . '&' . 'fechaFin=' . $this->fechaFin }}"
                                    target="_blank">
                                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="30" height="30"
                                        viewBox="0 0 226 226" style=" fill:#000000;">
                                        <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt"
                                            stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0"
                                            font-family="none" font-weight="none" font-size="none" text-anchor="none"
                                            style="mix-blend-mode: normal">
                                            <path d="M0,226v-226h226v226z" fill="none"></path>
                                            <g fill="#e74c3c">
                                                <path
                                                    d="M27.12,0v226h171.76v-160.07156l-65.92844,-65.92844zM36.16,9.04h90.4v63.28h63.28v144.64h-153.68zM135.6,15.43156l47.84844,47.84844h-47.84844zM78.27016,110.70469c-3.61953,0 -6.99188,0.38844 -9.605,1.00641v51.00891h8.13953v-20.21641c0.77688,0.08828 1.46547,0.08828 2.31297,0.08828c4.37875,0 9.37547,-1.76562 12.44766,-5.38516c2.38359,-2.77203 3.84906,-6.30328 3.84906,-11.51187c0,-4.46703 -1.39484,-8.45734 -4.16688,-11.07047c-3.07219,-2.91328 -7.52156,-3.91969 -12.97734,-3.91969zM111.00484,110.70469c-3.53125,0 -6.83297,0.38844 -9.21656,1.00641v50.85c1.85391,0.30016 4.69656,0.52969 7.53922,0.52969c6.67406,0 11.75906,-1.67734 15.20203,-5.22625c3.91969,-3.83141 6.69172,-10.82328 6.69172,-21.96437c0,-10.38188 -2.61312,-17.12656 -6.85063,-20.905c-3.07219,-2.84266 -7.38031,-4.29047 -13.36578,-4.29047zM137.89531,110.93422v51.78578h8.22781v-22.35281h12.21812v-6.83297h-12.21812v-15.44922h13.06563v-7.15078zM112.31141,117.30812c7.15078,0 10.43484,6.76234 10.43484,18.52141c0,15.74938 -5.13797,20.51656 -10.82328,20.51656c-0.52969,0 -1.30656,0 -1.99516,-0.15891v-38.64953c0.68859,-0.14125 1.53609,-0.22953 2.38359,-0.22953zM79.64734,117.37875c5.52641,0 7.52156,4.07859 7.52156,8.91641c0,5.91484 -2.98391,9.605 -8.35141,9.605c-0.8475,0 -1.39484,0 -2.01281,-0.15891v-17.97406c0.68859,-0.22953 1.695,-0.38844 2.84266,-0.38844z">
                                                </path>
                                            </g>
                                        </g>
                                    </svg>
                                </a>
                            @endif
                        @endcan

                        @can('admin.reports.create')                                                    
                            <x-jet-danger-button class="ml-auto text-white" wire:click="getProductosVendidos" wire:loading.attr="disabled"
                                wire:target="getProductosVendidos">
                                VER REPORTE
                            </x-jet-danger-button>
                        @endcan
                    </div>
                </div>
            </div>
        </div>

        @if (isset($ventasProductos))
            <div wire:loading wire:target="getProductosVendidos"
                class="text-center mb-4 bg-green-100 border border-green-500 text-green-700 px-4 py-3 rounded relative w-full">
                <strong class="font-bold">!Procesando Datos!</strong>
                <span class="block sm:inline">Por favor espere...!</span>
            </div>
        @endif

        @if (isset($ventas))
            <x-table-responsive>
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Fecha de Compra
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Codigo venta
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Cliente
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Producto
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Envío
                            </th>

                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Precio
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Cantidad
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                SubTotal
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Costo Envío
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Total
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Color
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Talla
                            </th>

                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($ventas as $venta)
                            @php
                                $contenido_venta = json_decode($venta->content);
                            @endphp
                            @foreach ($contenido_venta as $contenido)
                                <tr class="hover:bg-gray-100 hover:text-red-500 cursor-pointer uppercase">
                                    <td class="px-6 py-2 whitespace-nowrap text-sm ">
                                        <p>{{ $venta->created_at->format('d/m/Y') }}</p>
                                    </td>
                                    <td class="px-6 py-2 whitespace-nowrap">
                                        <div class="flex items-center">
                                            {{-- <div class="flex-shrink-0 h-10 w-10">
                                    <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=256&h=256&q=60" alt="">
                                    </div> --}}
                                            <div class="">
                                    <div class=" text-sm ">
                                        <p>ORDER-{{ $venta->id }}</p>
                                    </div>                      
                                    </div>
                                </div>
                                </td>
                                <td class="  px-6 py-2 whitespace-nowrap">
                                                <div class="text-sm ">{{ $venta->user->name }}</div>
                                    </td>
                                    <td class="px-6 py-2 whitespace-nowrap">
                                        <div class="text-sm ">{{ $contenido->name }}</div>
                                    </td>
                                    <td class="px-6 py-2 whitespace-nowrap">
                                        @switch($venta->envio_type)
                                            @case(1)
                                                <span>NO</span>
                                            @break
                                            @case(2)
                                                <span>SI</span>
                                            @break
                                            @default

                                        @endswitch

                                    </td>
                                    <td class="px-6 py-2 whitespace-nowrap">
                                        <div class="text-sm ">S/. {{ $contenido->price }}</div>
                                    </td>
                                    <td class="px-6 py-2 whitespace-nowrap">
                                        <div class="text-sm ">{{ $contenido->qty }}</div>
                                    </td>
                                    <td class="px-6 py-2 whitespace-nowrap">
                                        <div class="text-sm ">S/. {{ $contenido->qty * $contenido->price }}</div>
                                    </td>

                                    <td class="px-6 py-2 whitespace-nowrap">
                                        <div class="text-sm ">S/. {{ $venta->shipping_cost }}</div>
                                    </td>
                                    <td class="px-6 py-2 whitespace-nowrap">
                                        <div class="text-sm text-green-600 font-bold ">S/.
                                            {{ $venta->shipping_cost + $contenido->qty * $contenido->price }}</div>
                                    </td>
                                    <td class="px-6 py-2 whitespace-nowrap">
                                        @if (isset($contenido->options->color))
                                            <p>{{ __($contenido->options->color) }}</p>
                                        @endif
                                    </td>
                                    <td class="px-6 py-2 whitespace-nowrap text-sm ">
                                        @if (isset($contenido->options->size))
                                            <p>{{ $contenido->options->size }}</p>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
            </x-table-responsive>
        @endif
        

        {{-- CABECERA VENTAS POR ENVIAR --}}
        <div class="card w-full {{ $this->openVentaEnvio == false ? 'hidden' : '' }}">
            <div class="card-header bg-purple-400 border text-white px-4 py-2">
                <p class="ml-3 mt-1 mb-1"> GENERAR REPORTES DE VENTAS POR ENVIAR</p></span>
            </div>

            <div class="card-body mb-4 ">
                <div class="container  lg:flex border-2 bg-white">

                    <div class="flex items-center py-2">
                        <x-jet-label class="" value="Fecha Inicio :" />
                        <input wire:model="fechaInicio" type="date" class="form-control w-full">
                    </div>

                    <div class="flex items-center py-2 lg:ml-14">
                        <x-jet-label class="" value="Fecha Fin :" />

                        <input wire:model="fechaFin" type="date" class="form-control ml-3 w-full">
                    </div>

                    <div class="flex items-center py-2 ml-auto gap-4">
                        @can('admin.reports.excel')                                                    
                            @if (isset($ventasEnvios))
                                <a href="{{ route('admin.ventasporenviarE.index') . '?fechaInicio=' . $this->fechaInicio . '&' . 'fechaFin=' . $this->fechaFin }}"
                                    target="_blank">
                                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="39" height="39"
                                        viewBox="0 0 172 172" style=" fill:#000000;">
                                        <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt"
                                            stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0"
                                            font-family="none" font-weight="none" font-size="none" text-anchor="none"
                                            style="mix-blend-mode: normal">
                                            <path d="M0,172v-172h172v172z" fill="none"></path>
                                            <g>
                                                <path
                                                    d="M146.91667,35.83333h-57.33333v100.33333h57.33333c1.98158,0 3.58333,-1.60175 3.58333,-3.58333v-93.16667c0,-1.98158 -1.60175,-3.58333 -3.58333,-3.58333z"
                                                    fill="#4caf50"></path>
                                                <path
                                                    d="M114.66667,53.75h25.08333v10.75h-25.08333zM114.66667,89.58333h25.08333v10.75h-25.08333zM114.66667,107.5h25.08333v10.75h-25.08333zM114.66667,71.66667h25.08333v10.75h-25.08333zM89.58333,53.75h17.91667v10.75h-17.91667zM89.58333,89.58333h17.91667v10.75h-17.91667zM89.58333,107.5h17.91667v10.75h-17.91667zM89.58333,71.66667h17.91667v10.75h-17.91667z"
                                                    fill="#ffffff"></path>
                                                <path d="M96.75,150.5l-75.25,-14.33333v-100.33333l75.25,-14.33333z" fill="#2e7d32">
                                                </path>
                                                <path
                                                    d="M68.54558,111.08333l-8.63942,-16.34358c-0.32967,-0.61275 -0.6665,-1.73075 -1.01767,-3.36117h-0.13258c-0.16483,0.77042 -0.55183,1.93858 -1.161,3.50808l-8.67525,16.19667h-13.46258l15.98883,-25.08692l-14.63075,-25.07975h13.74925l7.17025,15.03567c0.559,1.18608 1.06067,2.59792 1.505,4.22475h0.14333c0.2795,-0.97108 0.80267,-2.43667 1.57308,-4.37167l7.9765,-14.88875h12.59542l-15.04642,24.86475l15.46567,25.29475h-13.40167z"
                                                    fill="#ffffff"></path>
                                            </g>
                                        </g>
                                    </svg>
                                </a>
                            @endif
                        @endcan

                        @can('admin.reports.pdf')                                                    
                            @if (isset($ventasEnvios))
                                <a href="{{ route('admin.ventasporenviar.index') . '?fechaInicio=' . $this->fechaInicio . '&' . 'fechaFin=' . $this->fechaFin }}"
                                    target="_blank">
                                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="30" height="30"
                                        viewBox="0 0 226 226" style=" fill:#000000;">
                                        <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt"
                                            stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0"
                                            font-family="none" font-weight="none" font-size="none" text-anchor="none"
                                            style="mix-blend-mode: normal">
                                            <path d="M0,226v-226h226v226z" fill="none"></path>
                                            <g fill="#e74c3c">
                                                <path
                                                    d="M27.12,0v226h171.76v-160.07156l-65.92844,-65.92844zM36.16,9.04h90.4v63.28h63.28v144.64h-153.68zM135.6,15.43156l47.84844,47.84844h-47.84844zM78.27016,110.70469c-3.61953,0 -6.99188,0.38844 -9.605,1.00641v51.00891h8.13953v-20.21641c0.77688,0.08828 1.46547,0.08828 2.31297,0.08828c4.37875,0 9.37547,-1.76562 12.44766,-5.38516c2.38359,-2.77203 3.84906,-6.30328 3.84906,-11.51187c0,-4.46703 -1.39484,-8.45734 -4.16688,-11.07047c-3.07219,-2.91328 -7.52156,-3.91969 -12.97734,-3.91969zM111.00484,110.70469c-3.53125,0 -6.83297,0.38844 -9.21656,1.00641v50.85c1.85391,0.30016 4.69656,0.52969 7.53922,0.52969c6.67406,0 11.75906,-1.67734 15.20203,-5.22625c3.91969,-3.83141 6.69172,-10.82328 6.69172,-21.96437c0,-10.38188 -2.61312,-17.12656 -6.85063,-20.905c-3.07219,-2.84266 -7.38031,-4.29047 -13.36578,-4.29047zM137.89531,110.93422v51.78578h8.22781v-22.35281h12.21812v-6.83297h-12.21812v-15.44922h13.06563v-7.15078zM112.31141,117.30812c7.15078,0 10.43484,6.76234 10.43484,18.52141c0,15.74938 -5.13797,20.51656 -10.82328,20.51656c-0.52969,0 -1.30656,0 -1.99516,-0.15891v-38.64953c0.68859,-0.14125 1.53609,-0.22953 2.38359,-0.22953zM79.64734,117.37875c5.52641,0 7.52156,4.07859 7.52156,8.91641c0,5.91484 -2.98391,9.605 -8.35141,9.605c-0.8475,0 -1.39484,0 -2.01281,-0.15891v-17.97406c0.68859,-0.22953 1.695,-0.38844 2.84266,-0.38844z">
                                                </path>
                                            </g>
                                        </g>
                                    </svg>
                                </a>
                            @endif
                        @endcan

                        @can('admin.reports.create')                                                    
                            <x-jet-danger-button class="ml-auto text-white" wire:click="getVentasEnvio" wire:loading.attr="disabled"
                                wire:target="getVentasEnvio">
                                VER REPORTE
                            </x-jet-danger-button>
                        @endcan
                    </div>
                </div>
            </div>
        </div>

        @if (isset($ventasEnvio))
            <div wire:loading wire:target="getVentasEnvio"
                class="text-center mb-4 bg-green-100 border border-green-500 text-green-700 px-4 py-3 rounded relative w-full">
                <strong class="font-bold">!Procesando Datos!</strong>
                <span class="block sm:inline">Por favor espere...!</span>
            </div>
        @endif

        @if (isset($ventasEnvios))
            <x-table-responsive class="mt-3">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Compra
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Cant:
                            </th>

                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Cliente
                            </th>

                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Contacto
                            </th>

                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Celular
                            </th>

                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Fecha de compra
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Departamento
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Cuidad
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Distrito
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Dirección
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Referencia
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Estado de compra
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Envío
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Costo-Envío
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                SubTotal
                            </th>
                            {{-- <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    IGV
                                </th> --}}
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Total
                            </th>

                            <th scope="col" class="relative px-6 py-3">
                                <span class="sr-only"></span>
                            </th>

                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($ventasEnvios as $ventasEnvio)
                            @php
                                $direccionEnvio = json_decode($ventasEnvio->envio);
                            @endphp
                            <tr class="hover:bg-gray-100 hover:text-red-500 cursor-pointer">
                                <td class="px-6 py-2 whitespace-nowrap">
                                    <div class="flex items-center">

                                        <div class="">
                                                <div class=" text-sm
                                            font-medium">
                                            ORDER : {{ $ventasEnvio->id }}
                                        </div>

                                    </div>
                                    </div>
                                </td>
                                <td class="px-6 py-2 whitespace-nowrap uppercase">
                                    <div class="text-sm">{{ $ventasEnvio->cant_total }}</div>
                                </td>

                                <td class="px-6 py-2 whitespace-nowrap uppercase">
                                    <div class="text-sm">{{ $ventasEnvio->user->name }}</div>
                                </td>
                                <td class="px-6 py-2 whitespace-nowrap uppercase">
                                    <div class="text-sm">{{ $ventasEnvio->contact }}</div>
                                </td>

                                <td class="px-6 py-2 whitespace-nowrap">
                                    <div class="text-sm">{{ $ventasEnvio->phone }}</div>
                                </td>

                                <td class="px-6 py-2 whitespace-nowrap">
                                    <div class="text-sm">{{ $ventasEnvio->created_at->format('d/m/Y') }}</div>
                                </td>

                                <td class="px-6 py-2 whitespace-nowrap uppercase">
                                    @if (isset($direccionEnvio->department))
                                        <div class="text-sm">{{ $direccionEnvio->department }}</div>
                                    @endif
                                </td>

                                <td class="px-6 py-2 whitespace-nowrap uppercase">
                                    @if (isset($direccionEnvio->city))
                                        <div class="text-sm">{{ $direccionEnvio->city }}</div>
                                    @endif
                                </td>

                                <td class="px-6 py-2 whitespace-nowrap uppercase">
                                    @if (isset($direccionEnvio->district))
                                        <div class="text-sm">{{ $direccionEnvio->district }}</div>
                                    @endif
                                </td>

                                <td class="px-6 py-2 whitespace-nowrap uppercase">
                                    @if (isset($direccionEnvio->address))
                                        <div class="text-sm">{{ $direccionEnvio->address }}</div>
                                    @endif
                                </td>

                                <td class="px-6 py-2 whitespace-nowrap uppercase">
                                    @if (isset($direccionEnvio->references))
                                        <div class="text-sm">{{ $direccionEnvio->references }}</div>
                                    @endif
                                </td>

                                <td class="px-6 py-2 whitespace-nowrap">
                                    @switch($ventasEnvio->status)
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
                                        @case(6)
                                            <span
                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-purple-500 opacity-75 text-white">
                                                RESERVADO
                                            </span>

                                        @break
                                        @default

                                    @endswitch
                                </td>
                                <td class="px-6 py-2 whitespace-nowrap">
                                    <div class="text-sm">
                                        @switch($ventasEnvio->envio_type)
                                            @case(1)
                                                <span>NO</span>
                                            @break
                                            @case(2)
                                                <span class="text-red-600 font-semibold">SI</span>
                                            @break
                                            @default

                                        @endswitch
                                    </div>
                                </td>
                                <td class="px-6 py-2 whitespace-nowrap">
                                    <div class="text-sm">S/. {{ $ventasEnvio->shipping_cost }}</div>
                                </td>
                                <td class="px-6 py-2 whitespace-nowrap">
                                    <div class="text-sm">S/.{{ $ventasEnvio->total - $ventasEnvio->shipping_cost }}
                                    </div>
                                </td>
                                {{-- <td class="px-6 py-2 whitespace-nowrap">
                                        <div class="text-sm">S/.{{ ($ventasEnvio->total - $ventasEnvio->shipping_cost -($ventasEnvio->total - $ventasEnvio->shipping_cost)/1.18)}}</div>
                                    </td> --}}
                                <td class="px-6 py-2 whitespace-nowrap text-sm text-red-500">
                                    S/. {{ $ventasEnvio->total }}
                                </td>
                                <td class="px-6 py-2 whitespace-nowrap text-right text-sm font-medium flex justify-end">
                                    @can('admin.orders.show')
                                        <a href="{{ route('admin.orders.show', $ventasEnvio) }}">
                                            <div
                                                class="cursor-pointer w-7  border-gray-900 bg-blue-500 text-white border rounded-lg p-1 transform hover:text-white hover:bg-blue-700 hover:scale-110">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                </svg>

                                            </div>
                                        </a>
                                    @endcan
                                </td>
                            </tr>

                        @endforeach

                        <!-- More people... -->
                    </tbody>
                </table>
            </x-table-responsive>
        @endif
        
    </div>
</div>
