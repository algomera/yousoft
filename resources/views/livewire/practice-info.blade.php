<div class="fixed bottom-0 left-0 right-0 lg:left-[280px] border-t bg-white flex px-4 py-3">
	<div class="w-full flex justify-between items-center">
		<div class="flex flex-col items-center space-y-1 lg:space-y-0 lg:space-x-2 lg:flex-row">
			<span class="text-[9px] lg:text-sm text-blue-400">N° Pratiche in lista</span>
			<div class="border-2 border-blue-300 px-4 w-32 text-center">
				<span class="text-sm font-bold">{{$practices->count()}}</span>
			</div>
		</div>
		<div class="flex space-x-2 text-center lg:space-x-6">
			<div class="flex flex-col items-center space-y-1 lg:space-y-0 space-x-2 lg:flex-row">
				<span class="text-[9px] lg:text-sm text-blue-400">Importo SAL €</span>
				<div class="border-2 border-blue-300 px-4 w-32 text-center">
					<span class="text-sm font-bold">{{ Money::format($practices->sum('import_sal')) }}</span>
				</div>
			</div>
			<div class="flex flex-col items-center space-y-1 lg:space-y-0 lg:space-x-2 lg:flex-row">
				<span class="text-[9px] lg:text-sm text-blue-400">Importo SAL stimato €</span>
				<div class="border-2 border-blue-300 px-4 w-32 text-center">
					<span class="text-sm font-bold">{{ Money::format($practices->sum('import')) }}</span>
				</div>
			</div>
		</div>
	</div>
</div>