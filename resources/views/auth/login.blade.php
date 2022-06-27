<x-base-layout>
	<div class="min-h-full flex flex-col justify-center py-12 sm:px-6 lg:px-8">
		<div class="sm:mx-auto sm:w-full sm:max-w-md">
{{--			<img class="mx-auto h-12 w-auto" src="https://tailwindui.com/img/logos/workflow-mark-indigo-600.svg"--}}
{{--			     alt="Workflow">--}}
			<h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">Accedi al tuo account</h2>
		</div>

		<div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
			<div class="bg-white py-8 px-4 shadow sm:rounded-lg sm:px-10">
				<form class="space-y-6" method="POST" action="{{ route('login') }}">
					@csrf
					<div>
						<label for="email" class="block text-sm font-medium text-gray-700">Email</label>
						<div class="mt-1">
							<x-input id="email" name="email" type="email" autocomplete="email" required></x-input>
						</div>
					</div>

					<div>
						<label for="password" class="block text-sm font-medium text-gray-700">Password</label>
						<div class="mt-1">
							<x-input id="password" name="password" type="password" autocomplete="current-password"
							         required></x-input>
						</div>
					</div>

					<div class="flex items-center justify-between">
						<div class="flex items-center">
							<input id="remember-me" name="remember-me" type="checkbox"
							       class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
							<label for="remember-me" class="ml-2 block text-sm text-gray-900">Ricordami</label>
						</div>

						{{--						<div class="text-sm">--}}
						{{--							<a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">Password dimenticata?</a>--}}
						{{--						</div>--}}
					</div>

					<div>
						<button type="submit"
						        class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
							Accedi
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</x-base-layout>