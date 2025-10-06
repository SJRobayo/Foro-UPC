<div>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Xifrador de Codi César') }}
        </h2>
    </x-slot> --}}

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight mb-4">
                        {{ __('Xifrador de Codi César') }}
                    </h2>
                    <p class="mb-2">
                        Benvingut al <span class="font-bold text-blue-600 dark:text-blue-400">xifrador en codi
                            César</span>! Aquest és un xifrador molt senzill que desplaça cada lletra de l'alfabet un
                        nombre fix de posicions.
                    </p>
                    <ul class="list-disc list-inside mb-2">
                        <li>Amb un desplaçament de 3, la lletra <span class="font-mono">'A'</span> es converteix en <span
                                class="font-mono">'D'</span>, la <span class="font-mono">'B'</span> en <span
                                class="font-mono">'E'</span>, i així successivament.</li>
                        <li>Pots xifrar i desxifrar missatges fàcilment utilitzant aquest formulari.</li>
                    </ul>
                    <p>
                        Introdueix el text que vols xifrar o desxifrar i fes clic al botó corresponent. El resultat
                        apareixerà a sota.<br>
                        <span class="italic text-green-600 dark:text-green-400">Gaudeix utilitzant el xifrador!</span>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <label for="input1" class="block mb-2">Introdueix la teva cadena de text:</label>
                    <input type="text" id="input1" name="input1" wire:model="inputString"
                        class="w-full mb-4 rounded border-gray-300 dark:bg-gray-700 dark:text-gray-100">
                    <button wire:click="encrypt"
                        class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Xifrar</button>

                    <label for="input2" class="block mb-2 mt-4">Resultat:</label>
                    <p class="w-full rounded border-gray-300 dark:bg-gray-700 dark:text-gray-100 p-2"
                        style="height: 40px;">
                        {{ $outputString }}
                    </p>
                </div>
            </div>
        </div>
    </div>


    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <label for="input1" class="block mb-2">Introdueix la teva cadena de text xifrada:</label>
                    <input type="text" id="input1" name="input1" wire:model="cypherString"
                        class="w-full mb-4 rounded border-gray-300 dark:bg-gray-700 dark:text-gray-100">
                    <button wire:click="decrypt"
                        class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Desxifrar</button>

                    <label for="input2" class="block mb-2 mt-4">Resultat:</label>
                    <p class="w-full rounded border-gray-300 dark:bg-gray-700 dark:text-gray-100 p-2"
                        style="height: 40px;">
                        {{ $decipheredString }}
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight mb-4">
                        {{ __('Xifrador misteriós') }}
                    </h2>
                    <p class="mb-2">
                        A continuació, treballarem amb <span class="font-bold text-blue-600 dark:text-blue-400">xifrador
                            misteriós</span>! El teu repte és descobrir com funciona aquest xifrador.
                        Observa com es transformen les lletres i intenta deduir la regla que s'utilitza per al xifratge
                        i desxifratge.
                    </p>

                    <p>
                        Introdueix el text que vols xifrar o desxifrar i fes clic al botó corresponent. El resultat
                        apareixerà a sota.<br>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <label for="input1" class="block mb-2">Introdueix la teva cadena de text:</label>
                    <input type="text" id="input1" name="input1" wire:model="fibonacciInputString"
                        class="w-full mb-4 rounded border-gray-300 dark:bg-gray-700 dark:text-gray-100">
                    @error('fibonacciInputString')
                        <div class="text-red-600 mb-2">{{ $message }}</div>
                    @enderror
                    <button wire:click="fibonacciEncrypt"
                        class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Xifrar</button>

                    <label for="input2" class="block mb-2 mt-4">Resultat:</label>
                    <p class="w-full rounded border-gray-300 dark:bg-gray-700 dark:text-gray-100 p-2 min-h-[40px]">
                        {{ $fibonacciOutputString }}
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <label for="input1" class="block mb-2">Introdueix la teva cadena xifrada:</label>
                    <input type="text" id="input1" name="input1" wire:model="fibonacciEncryptedString"
                        class="w-full mb-4 rounded border-gray-300 dark:bg-gray-700 dark:text-gray-100">
                    @error('fibonacciEncryptedString')
                        <div class="text-red-600 mb-2">{{ $message }}</div>
                    @enderror

                    <button wire:click="fibonacciDecrypt"
                        class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Desxifrar</button>

                    <label for="input2" class="block mb-2 mt-4">Resultat:</label>
                    <p class="w-full rounded border-gray-300 dark:bg-gray-700 dark:text-gray-100 p-2"
                        style="height: 40px;">
                        {{ $fibonacciDecipheredString }}
                    </p>
                </div>
            </div>
        </div>
    </div>

</div>
