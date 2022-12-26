<x-app>

    <a href="{{route('users.create')}}"  
        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
        Adicionar um novo cliente
    </a>

    <div class="mt-7">
        @if (Session::has('success'))
            <x-alerts>
                {{Session::get('success')}}
            </x-alerts>
        @endif
    </div>

    @if (count($listClients) == 0)
        <div class="w-full shadow-2xl sm:rounded-lg mt-7 bg-gray-900">
            <p class="px-8 py-8 text-white">
                Nenhum registro cadastrado em nosso sistema!
            </p>
        </div>   
    @else
        <table class="mt-7 sm:rounded-lg w-5/6 text-sm text-left 
                text-gray-500 dark:text-gray-400 shadow-2xl 
                bg-gray-900">
            <thead class="text-xs text-white uppercase dark:text-gray-400">
                <tr>
                    <th scope="col" class="py-3 px-6">
                        Identificação
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Nome
                    </th>
                    <th scope="col" class="py-3 px-6">
                        E-mail
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Telefone fixo (opcional)
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Telefone celular
                    </th>
                    <th scope="col">

                    </th>
                    <th scope="col">
                    
                    </th>
                </tr>
            </thead>
            <tbody>                
                @foreach ($listClients as $list)    
                    <tr class="hover:bg-gray-700">
                        <td class="py-4 px-6">
                            {{$list->id}}
                        </td>
                        <td class="py-4 px-6">
                            {{$list->name}}
                        </td>
                        <td class="py-4 px-6">
                            {{$list->email}}
                        </td>
                        <td class="py-4 px-6">
                            {{$list->telephone}}
                        </td>
                        <td class="py-4 px-6">
                            {{$list->cellphone}}
                        </td>
                        <td>
                            <a href="#">
                                <img style="width: 25px;" src="{{url('/img/edit.svg')}}" alt="">
                            </a>
                        </td>
                        <td>
                            <form action="{{route('users.destroy', $list->id)}}" method="POST">
                                @method('DELETE')
                                @csrf                                 
                                <button onclick="return confirm('Tem certeza que deseja excluir cliente?')">
                                    <img style="width: 25px;" src="{{url('/img/trash.svg')}}" alt="">
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</x-app>

