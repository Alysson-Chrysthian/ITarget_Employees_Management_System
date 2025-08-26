<div class="p-4 max-w-[500px] m-auto">

    <h1>Atualizar funcionario</h1>

    <p class="text-green-500">{{ session('message') }}</p>

    <form class="flex flex-col gap-4 max-w-[500px] m-auto" wire:submit="update">
        <div class="flex flex-col gap-2">
            <div>
                <label>Nome</label>
                <x-text-input wire:model="employee_attr.name">Nome</x-text-input>
                @error('employee_attr.name')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label>Email</label>
                <x-text-input wire:model="employee_attr.email">Email</x-text-input>
                @error('employee_attr.email')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div
                class="
                    flex justify-between 
                    flex-wrap gap-2 items-center
                "
            >
                <div class="grow">
                    <label>Data de nascimento</label>
                    <x-date-input wire:model="employee_attr.birthday" />
                    @error('employee_attr.birthday')
                        <p class="text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label>Sexo</label>
                    <div
                        class="flex flex-row gap-4"
                    >
                        <x-radio-input wire:model="employee_attr.gender" name="gender" value="m">Masculino</x-radio-input>
                        <x-radio-input wire:model="employee_attr.gender" name="gender" value="f">Feminino</x-radio-input>
                    </div>
                    @error('employee_attr.gender')
                        <p class="text-red-500">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div>
                <label>CPF</label>
                <x-text-input wire:model="employee_attr.cpf" data-inputmask="'mask': '999.999.999-99'" name="cpf">CPF</x-text-input>
                @error('employee_attr.cpf')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label>Matricula</label>
                <x-text-input wire:model="employee_attr.registration">Matricula</x-text-input>
                @error('employee_attr.registration')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div
                class="
                    flex flex-col 
                    gap-2
                "
            >
                <div class="flex justify-between gap-2">
                    <div class="grow">
                        <label>Rua</label>
                        <x-text-input wire:model="employee_attr.street">Rua</x-text-input>
                        @error('employee_attr.street')
                            <p class="text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label>Numero</label>
                        <x-text-input wire:model="employee_attr.number">Numero</x-text-input>
                        @error('employee_attr.number')
                            <p class="text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="flex flex-row-reverse justify-between gap-2">
                    <div>
                        <label>Bairro</label>
                        <x-text-input wire:model="employee_attr.linguee" id="linguee_input">Bairro</x-text-input>
                        @error('employee_attr.linguee')
                            <p class="text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div  class="grow">
                        <label>CEP</label>
                        <x-text-input wire:model="employee_attr.cep" data-inputmask="'mask': '99999-999'" id="input_cep">CEP</x-text-input>
                        @error('employee_attr.cep')
                            <p class="text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <div>
            <x-button-dark wire:target="update">Atualizar funcionario</x-button-dark>
        </div>
        <div>
            <x-button-light type="button" wire:click="index">Retornar</x-button-light>
        </div>
    </form>
</div>

@push('scripts')
    @script
        <script>
            const cep_input = document.getElementById('input_cep');
            
            cep_input.addEventListener('focusout', (e) => {
                $wire.dispatch('cep-input-filled');
            });
        </script>
    @endscript
@endpush