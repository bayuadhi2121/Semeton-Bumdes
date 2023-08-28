<!-- Molecules/LoginForm.blade.php -->
<div class="card-body">
    <h2 class="card-title">{{ $title }}</h2>
    <form method="POST" action="{{ route('authenticate') }}" class="w-full max-w-xs">
        @csrf
        @include('atoms.InputField', ['label' => 'Username', 'type' => 'text', 'placeholder' => 'Type here','name'=>'username'])
        @include('atoms.InputField', ['label' => 'Password', 'type' => 'password', 'placeholder' => 'Type here','name'=>'password'])
        <div class="card-actions justify-center mt-5">
            <button type="submit" class="btn btn-primary">{{ $buttonText }}</button>
        </div>
    </form>
</div>