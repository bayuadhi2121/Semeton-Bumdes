<!-- Molecules/LoginForm.blade.php -->
<div class="card-body">
    <h2 class="card-title">{{ $title }}</h2>
    <form method="POST" action="{{ route('login.post') }}" class="w-full max-w-xs">
        @csrf
        @include('atoms.InputField', ['label' => 'Username', 'type' => 'text', 'placeholder' => 'Type here'])
        @include('atoms.InputField', ['label' => 'Password', 'type' => 'password', 'placeholder' => 'Type here'])
        <div class="card-actions justify-center mt-5">
            <button type="submit" class="btn btn-primary">{{ $buttonText }}</button>
        </div>
    </form>
</div>
