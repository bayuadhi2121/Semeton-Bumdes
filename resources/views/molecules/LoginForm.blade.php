<!-- Molecules/LoginForm.blade.php -->
<div class="card-body">
    <h2 class="card-title">{{ $title }}</h2>
    @include('atoms.InputField', ['label' => 'Username', 'type' => 'text', 'placeholder' => 'Type here'])
    @include('atoms.InputField', ['label' => 'Password', 'type' => 'password', 'placeholder' => 'Type here'])
    <div class="card-actions justify-center">
        <button class="btn btn-primary">{{ $buttonText }}</button>
    </div>
</div>

