<nav aria-label="Sidebar" class="mt-5">
	<div class="px-2 space-y-1">
		@foreach ($routes as $route)
			@isset($route['permission'])
				@canany($route['permission'])
					<x-navigation-link :route="$route" />
				@endcanany
			@else
				<x-navigation-link :route="$route" />
			@endisset
		@endforeach
	</div>
</nav>