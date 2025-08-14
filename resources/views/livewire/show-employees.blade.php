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
            <x-text-input wire:model.live="search">Pesquisar...</x-text-input>
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
        @if ($employees->isEmpty())
            <p>Nenhum funcionario encontrado</p>
        @endif
        <div class="overflow-x-auto">
            <table class="min-w-full border-collapse">
                <thead
                    class="bg-gray-200 border-b-2 border-gray-400 rounded-t-md"
                >
                    <tr>
                        <th class="text-gray-800 text-normal px-4 py-2 whitespace-nowrap">ID</th>
                        <th class="text-gray-800 text-normal px-4 py-2 whitespace-nowrap">Nome</th>
                        <th class="text-gray-800 text-normal px-4 py-2 whitespace-nowrap">Email</th>
                        <th class="text-gray-800 text-normal px-4 py-2 whitespace-nowrap">CPF</th>
                        <th class="text-gray-800 text-normal px-4 py-2 whitespace-nowrap">Matricula</th>
                        <th class="text-gray-800 text-normal px-4 py-2 whitespace-nowrap">Sexo</th>
                        <th class="text-gray-800 text-normal px-4 py-2 whitespace-nowrap">Nascimento</th>
                        <th class="text-gray-800 text-normal px-4 py-2 whitespace-nowrap">Rua</th>
                        <th class="text-gray-800 text-normal px-4 py-2 whitespace-nowrap">Numero</th>
                        <th class="text-gray-800 text-normal px-4 py-2 whitespace-nowrap">Bairro</th>
                        <th class="text-gray-800 text-normal px-4 py-2 whitespace-nowrap">CEP</th>
                        <th class="text-gray-800 text-normal px-4 py-2 whitespace-nowrap">Editar</th>
                        <th class="text-gray-800 text-normal px-4 py-2 whitespace-nowrap">Deletar</th>
                    </tr>
                </thead>
                <tbody class="bg-gray-100 rounded-b-md">
                    @foreach ($employees as $employee)
                        <tr class="border-b-2 border-gray-400 hover:bg-gray-50">
                            <td class="text-gray-600 px-4 py-2 whitespace-nowrap">{{ $employee->id }}</td>
                            <td class="text-gray-600 px-4 py-2 whitespace-nowrap">{{ $employee->name }}</td>
                            <td class="text-gray-600 px-4 py-2 whitespace-nowrap">{{ $employee->email }}</td>
                            <td class="text-gray-600 px-4 py-2 whitespace-nowrap">{{ $employee->cpf }}</td>
                            <td class="text-gray-600 px-4 py-2 whitespace-nowrap">{{ $employee->registration }}</td>
                            <td class="text-gray-600 px-4 py-2 whitespace-nowrap">{{ $employee->gender }}</td>
                            <td class="text-gray-600 px-4 py-2 whitespace-nowrap">{{ $employee->birthday->format('d/m/Y') }}</td>
                            <td class="text-gray-600 px-4 py-2 whitespace-nowrap">{{ $employee->street }}</td>
                            <td class="text-gray-600 px-4 py-2 whitespace-nowrap">{{ $employee->number }}</td>
                            <td class="text-gray-600 px-4 py-2 whitespace-nowrap">{{ $employee->linguee }}</td>
                            <td class="text-gray-600 px-4 py-2 whitespace-nowrap">{{ $employee->cep }}</td>
                            <td class="text-gray-600 px-4 py-2 whitespace-nowrap"><x-css-trash class="m-auto cursor-pointer brightness-135" wire:click="delete({{ $employee->id }})"/></td>
                            <td class="text-gray-600 px-4 py-2 whitespace-nowrap"><x-css-pen class="m-auto cursor-pointer brightness-135" wire:click="modify({{ $employee->id }})"/></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{ $employees->links() }}
    </div>

</div>
