<div class="mt-10 p-5 mx-auto sm:w-full sm:max-w-sm">
    <div class="flex">
        <h2 class="text-center font-semibold text-2x text-gray-800 mb-5">Create New User</h2>
    </div>
    @if (session('success'))
        <span class="p-3 m-2 bg-green-500 rounded">{{ session('success') }}</span>
    @endif

    <form wire:submit="createNewUser" action="">
        <label class="mt-3 block text-sm font-medium leading-6 text-gray-900">Name</label>
        <input class="block rounded border border-gray-300 px-3 py-1" wire:model="name" type="text" placeholder="name">
        @error('name')
            <span class="text-red-500 text-xs">{{ $message }}</span>
        @enderror

        <label class="mt-3 block text-sm font-medium leading-6 text-gray-900">Email</label>
        <input class="block rounded border border-gray-300 px-3 py-1" wire:model="email" type="email"
            placeholder="email">
        @error('email')
            <span class="text-red-500 text-xs">{{ $message }}</span>
        @enderror

        <label class="mt-3 block text-sm font-medium leading-6 text-gray-900">Password</label>
        <input class="block rounded border border-gray-300 px-3 py-1" wire:model="password" type="password"
            placeholder="password">
        @error('password')
            <span class="text-red-500 text-xs">{{ $message }}</span>
        @enderror

        <label class="mt-3 block text-sm font-medium leading-6 text-gray-900">Profile Picture</label>
        <input accept="image/png, image/jpeg" type="file" id="image"
            class="block rounded border border-gray-300 px-3 py-1">
        @error('image')
            <span class="text-red-500 text-xs">{{ $message }}</span>
        @enderror

        <button class="block rounded px-3 py-1 mt-2 bg-gray-600 text-white">Create</button>

    </form>

    @foreach ($users as $user)
        <h3>{{ $user->name }}</h3>
    @endforeach

    {{ $users->links() }}
</div>
