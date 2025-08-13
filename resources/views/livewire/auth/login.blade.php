<div class="
    flex flex-col
    gap-4 justify-center items-center
    h-full
">

    <h1>Login</h1>

    <form 
        class="
            flex flex-col
            gap-4 w-full max-w-[350px]
            mx-8
        "
        wire:submit="login"
    >
        @if (!$errors->isEmpty())
            <p class="text-red-500">Credenciais invalidas</p>
        @endif

        <x-text-input name="name" wire:model="name">Nome</x-text-input>
        <x-text-input name="password" wire:model="password">Senha</x-text-input>
        
        <x-button-dark 
            wire:target="login"
        >Login</x-button-dark>
    </form>

</div>
