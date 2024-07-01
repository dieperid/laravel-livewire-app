<div>
    <h2>{{ $username }}</h2>

    <h1>{{ $title }}</h1>

    <p>{{ 'Users : ' . count($users) }}</p>

    <button wire:click="createNewUser">
        Create New User
    </button>
</div>
