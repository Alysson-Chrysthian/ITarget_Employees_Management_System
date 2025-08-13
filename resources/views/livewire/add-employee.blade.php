<div class="p-4 max-w-[500px] m-auto">
    <h1>Cadastrar funcionario</h1>

    <p class="text-green-500">{{ session('message') }}</p>

    <form class="flex flex-col gap-4 max-w-[500px] m-auto" wire:submit="store">
        <div class="flex flex-col gap-2">
            <div>
                <label>Nome</label>
                <x-text-input wire:model="name">Nome</x-text-input>
                @error('name')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label>Email</label>
                <x-text-input wire:model="email">Email</x-text-input>
                @error('email')
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
                    <x-date-input wire:model="birthday" />
                    @error('birthday')
                        <p class="text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label>Sexo</label>
                    <div
                        class="flex flex-row gap-4"
                    >
                        <x-radio-input wire:model="gender" name="gender" value="m">Masculino</x-radio-input>
                        <x-radio-input wire:model="gender" name="gender" value="f">Feminino</x-radio-input>
                    </div>
                    @error('gender')
                        <p class="text-red-500">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div>
                <label>CPF</label>
                <x-text-input wire:model="cpf" name="cpf">CPF</x-text-input>
                @error('cpf')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label>Matricula</label>
                <x-text-input wire:model="registration">Matricula</x-text-input>
                @error('registration')
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
                        <x-text-input wire:model="street">Rua</x-text-input>
                        @error('street')
                            <p class="text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label>Numero</label>
                        <x-text-input wire:model="number">Numero</x-text-input>
                        @error('number')
                            <p class="text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="flex justify-between gap-2">
                    <div class="grow">
                        <label>Bairro</label>
                        <x-text-input wire:model="linguee">Bairro</x-text-input>
                        @error('linguee')
                            <p class="text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label>CEP</label>
                        <x-text-input wire:model="cep">CEP</x-text-input>
                        @error('cep')
                            <p class="text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <div>
            <x-button-dark wire:target="store">Cadastrar funcionario</x-button-dark>
        </div>
        <div>
            <x-button-light type="button" wire:click="index">Retornar</x-button-light>
        </div>
    </form>
</div>
