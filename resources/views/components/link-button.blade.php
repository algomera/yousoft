<a {{ $attributes->merge(['class' => 'inline-block sm:inline-flex items-center w-full sm:w-auto px-4 py-2 rounded-md font-semibold text-center text-xs text-gray-600 uppercase tracking-widest cursor-pointer hover:bg-gray-100 active:bg-gray-100 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition']) }}>
	{{ $slot }}
</a>