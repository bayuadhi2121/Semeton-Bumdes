<!-- Atoms/InputField.blade.php -->
<div class="form-control w-full max-w-xs">
    <label class="label">
        <span class="label-text">{{ $label }}</span>
    </label>
    <input type="{{ $type }}" placeholder="{{ $placeholder }}" name="{{$name}}" class="input input-bordered w-full max-w-xs" />
</div>