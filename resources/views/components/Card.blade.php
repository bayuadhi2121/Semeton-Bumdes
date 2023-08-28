<!-- Components/Card.blade.php -->
<div class="card w-96 bg-base-100 shadow-xl">
    <figure><img src="{{ $image }}" alt="{{ $alt }}" /></figure>
    {{ $slot }}
</div>
