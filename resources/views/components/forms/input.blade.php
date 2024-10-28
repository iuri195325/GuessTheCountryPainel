@props(['name', 'type'])

<input name="{{ $name }}" type={{ $type }}  {{ $attributes }}> 
<div class="w-100">
    @error($name) <label class="text-danger">{{ $message }}</label> @enderror
</div>
