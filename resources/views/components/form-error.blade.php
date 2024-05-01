@props(['name'])
@error($name)
    <div {{ $attributes->merge(['class' => 'text-red-500 text-xs']) }}>{{ $message }}</div>
@enderror
