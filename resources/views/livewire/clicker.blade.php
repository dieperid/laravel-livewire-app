<div>
    <form class="p-5" wire:submit="createNewUser" action="">
        <input class="block rounded border border-gray-300 px-3 py-1" wire:model="name" type="text" placeholder="name">
        @error('name')
            <span class="text-red-500 text-xs">{{ $message }}</span>
        @enderror

        <input class="block rounded border border-gray-300 px-3 py-1 mt-2" wire:model="email" type="email"
            placeholder="email">
        @error('email')
            <span class="text-red-500 text-xs">{{ $message }}</span>
        @enderror

        <input class="block rounded border border-gray-300 px-3 py-1 mt-2"wire:model="password" type="password"
            placeholder="password">
        @error('password')
            <span class="text-red-500 text-xs">{{ $message }}</span>
        @enderror

        <button class="block rounded px-3 py-1 mt-2 bg-gray-600 text-white">Create</button>
    </form>

    @foreach ($users as $user)
        <h3>{{ $user->name }}</h3>
    @endforeach
</div>
