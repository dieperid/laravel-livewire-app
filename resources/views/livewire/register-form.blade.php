<div class="mt-10 p-5 mx-auto sm:w-full sm:max-w-sm">
    @if (session('success'))
        <span class="p-3 m-2 bg-green-500 rounded">{{ session('success') }}</span>
    @endif

    <form wire:submit="createAccount" action="" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        <div class="flex">
            <h1 class="text-center font-semibold text-2x text-gray-800 mb-4">Create New Account</h1>
        </div>
        <label class="block text-gray-700 text-sm font-bold mb-2">Name</label>
        <input
            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
            wire:model="name" type="text" placeholder="name">
        @error('name')
            <span class="text-red-500 text-xs italic">{{ $message }}</span>
        @enderror

        <label class="mt-3 block text-gray-700 text-sm font-bold mb-2">Email</label>
        <input
            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
            wire:model="email" type="email" placeholder="email">
        @error('email')
            <span class="text-red-500 text-xs italic">{{ $message }}</span>
        @enderror

        <label class="mt-3 block text-gray-700 text-sm font-bold mb-2">Password</label>
        <input
            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
            wire:model="password" type="password" placeholder="password">
        @error('password')
            <span class="text-red-500 text-xs italic">{{ $message }}</span>
        @enderror

        <label class="mt-3 block text-gray-700 text-sm font-bold mb-2">Profile Picture</label>
        <input wire:model="image" accept="image/png, image/jpeg" type="file" id="image"
            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        @error('image')
            <span class="text-red-500 text-xs italic">{{ $message }}</span>
        @enderror

        {{-- Preview of the image under the image field --}}
        @if ($image)
            <img class="rounded w-10 h-10 mt-3 block" src="{{ $image->temporaryUrl() }}" alt="Image Preview">
        @endif

        {{-- Loading state for image file --}}
        <div wire:loading wire:target="image">
            <span class="text-green-500">Uploading...</span>
        </div>

        <div wire:loading.delay wire:target="createAccount">
            <span class="text-green-500">Sending...</span>
        </div>

        <div>
            <button wire:loading.attr="disabled"
                class="mt-3 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline bg-gray-600">Create</button>
        </div>
    </form>

    @foreach ($users as $user)
        <h3>{{ $user->name }}</h3>
    @endforeach

    {{ $users->links() }}
</div>
