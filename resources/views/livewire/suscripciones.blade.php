<div>
    <div class="flex flex-col items-center justify-center min-h-screen p-10 text-gray-700 bg-gray-100 md:p-20">
        <h2 class="text-2xl font-medium">Suscribete</h2>
        @vite('resources/css/app.css')
        <!-- Component Start -->
        <div class="flex flex-wrap items-center justify-center w-full max-w-4xl mt-8">
            <div class="flex flex-col flex-grow mt-8 overflow-hidden bg-white rounded-lg shadow-lg">
                <div class="flex flex-col items-center p-10 bg-blue-300">
                    <span class="font-semibold">Prueba Gratis</span>
                    <div class="flex items-center">
                        <span class="text-3xl">$</span>
                        <span class="text-5xl font-bold">0</span>
                        <span class="text-2xl text-gray-500">/Bs</span>
                    </div>
                </div>
                <div class="p-10">
                    <ul>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 text-green-600 fill-current" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="ml-2">Planificacion MRP</span>
                        </li>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 text-green-600 fill-current" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="ml-2">Calculos</span>
                        </li>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 text-green-600 fill-current" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="ml-2">Inventario</span>
                        </li>
                    </ul>
                </div>
                <div class="flex px-10 pb-10 justfy-center">
                    <button class="flex items-center justify-center w-full h-12 px-6 text-sm uppercase bg-gray-200 rounded-lg">EMPIEZA AHORA</button>
                </div>
            </div>

            <!-- Tile 2 -->
            <div
                class="z-10 flex flex-col flex-grow mt-8 overflow-hidden transform bg-white rounded-lg shadow-lg md:scale-110">
                <div class="flex flex-col items-center p-10 bg-blue-300">
                    <span class="font-semibold">Basico</span>
                    <div class="flex items-center">
                        <span class="text-3xl">$</span>
                        <span class="text-6xl font-bold">50</span>
                        <span class="text-2xl text-gray-500">/Bs</span>
                    </div>
                </div>
                <div class="p-10">
                    <ul>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 text-green-600 fill-current" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="ml-2 italic">Planificacion MRP</span>
                        </li>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 text-green-600 fill-current" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="ml-2">Operaciones</span>
                        </li>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 text-green-600 fill-current" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="ml-2">Informes</span>
                        </li>
                    </ul>
                </div>
                <div class="flex px-10 pb-10 justfy-center">
                    <button
                        class="flex items-center justify-center w-full h-12 px-6 text-sm uppercase bg-gray-200 rounded-lg">COMPRA AHORA</button>
                </div>
            </div>

            <!-- Tile 3 -->
            <div class="flex flex-col flex-grow overflow-hidden bg-white rounded-lg shadow-lg mt-19">
                <div class="flex flex-col items-center p-10 bg-blue-300">
                    <span class="font-semibold">Premiun</span>
                    <div class="flex items-center">
                        <span class="text-3xl">$</span>
                        <span class="text-5xl font-bold">99</span>
                        <span class="text-2xl text-gray-500">/Bs</span>
                    </div>
                </div>
                <div class="p-10">
                    <ul>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 text-green-600 fill-current" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="ml-2 italic">Backud</span>
                        </li>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 text-green-600 fill-current" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="ml-2">Interfas movil</span>
                        </li>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 text-green-600 fill-current" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="ml-2">Recomendaciones</span>
                        </li>
                    </ul>
                </div>
                <div class="flex px-10 pb-10 justfy-center">
                    <button
                        class="flex items-center justify-center w-full h-12 px-6 text-sm uppercase bg-gray-200 rounded-lg">COMPRAR AHORA</button>
                </div>
            </div>
        </div>
        <!-- Component End  -->

    </div>
</div>
