@props(['value', 'required' => false])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm mb-1 text-gray-700']) }}>
	<span>{{ $value ?? $slot }} @if ($required)*@endif</span>
</label>
