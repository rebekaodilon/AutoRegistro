<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Empresas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="text-right">
                    <a href="{{ route('empresas.create') }}" type="button" class="text-white bg-gradient-to-r from-cyan-500 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Cadastrar</a>
                </div>
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    CNPJ
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Razao Social
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Endereço
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Telefone
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    E-mail
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Veículos
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Ação
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($empresas->count() == 0)
                                <tr class="text-center bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white" colspan="7">
                                        Nenhuma empresa cadastrada
                                    </th>
                                </tr>
                            @endif
                            @foreach($empresas as $empresa)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $empresa->cnpj }}
                                    </th>
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $empresa->razao_social }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $empresa->endereco }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $empresa->telefone }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $empresa->email }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <a href="/veiculos/{{ $empresa->id }}" type="button" class="text-green-700 hover:text-white border border-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-green-500 dark:text-green-500 dark:hover:text-white dark:hover:bg-green-600 dark:focus:ring-green-800">Veículos</a>
                                    </td>
                                    <td class="px-6 py-4">
                                        <a href="empresas/{{ $empresa->id }}/edit" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Editar</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>



            </div>
        </div>
    </div>
</x-app-layout>
