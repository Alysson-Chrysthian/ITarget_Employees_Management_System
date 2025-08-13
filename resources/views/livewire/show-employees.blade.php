@push('styles')
    @vite('resources/css/show-employess.css')
@endpush

<div 
    class="
        p-4 flex flex-col gap-4
    "
>

    <div 
        class="flex gap-4"
    >
        <div>
            <form 
                class="flex gap-2"
            >
                <x-text-input>Pesquisar...</x-text-input>
                <x-button-dark><x-css-search/></x-button-dark>
            </form>
        </div>
        <div>
            <x-button-light
                type="button"
                wire:click="create"
            >
                <x-css-add />
            </x-button-light>
        </div>
        <div>
            <x-button-light
                type="button"
            >
                <x-css-file />
            </x-button-light>
        </div>
    </div>

    <div>
        <table>
            <thead 
                class="
                    bg-gray-200 border-b-2 border-gray-400
                    rounded-t-md block
                "
            >
                <th class="text-gray-800 text-normal px-4 py-2">ID</th>
                <th class="text-gray-800 text-normal px-4 py-2">Nome</th>
                <th class="text-gray-800 text-normal px-4 py-2">Email</th>
                <th class="text-gray-800 text-normal px-4 py-2">CPF</th>
                <th class="text-gray-800 text-normal px-4 py-2">Matricula</th>
                <th class="text-gray-800 text-normal px-4 py-2">Sexo</th>
                <th class="text-gray-800 text-normal px-4 py-2">Nascimento</th>
                <th class="text-gray-800 text-normal px-4 py-2">Rua</th>
                <th class="text-gray-800 text-normal px-4 py-2">Numero</th>
                <th class="text-gray-800 text-normal px-4 py-2">Bairro</th>
                <th class="text-gray-800 text-normal px-4 py-2">CEP</th>
            </thead>
            <tbody class="
                bg-gray-100
                rounded-t-md
            ">
                @foreach ($employees as $employee)
                    <tr>
                        <td>{{ $employee->id }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
