<div>
    <x-card class="p-4 space-y-0">
        <div class="space-y-3">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-lg leading-6 font-medium text-gray-900">Cartella</h3>
                    @if($folder->files->count())
                        <p class="mt-1 max-w-2xl text-sm text-gray-500">N. documenti nella cartella: <span
                                    class="font-semibold">{{ $folder->files->count() }}</span></p>
                    @endif
                </div>
                <x-button
                        wire:click="$emit('openModal', 'folder-file-management.add-document', {{ json_encode([$folder->id]) }})"
                        prepend="plus" iconColor="text-white">Aggiungi
                </x-button>
            </div>
        </div>
        <div class="border-t border-gray-200 px-4 !mt-2">
            <ul role="list" class="divide-y divide-gray-200">
                @forelse($folder->files as $i => $file)
                    <li class="py-4 flex w-full" wire:key="{{ $loop->index }}">
                        <div class="flex items-center justify-center text-sm bg-gray-50 border border-gray-200 font-semibold h-8 w-8 rounded-full">
                            {{ $i + 1 }}
                        </div>
                        <div class="ml-3 w-full">
                            <p class="text-sm text-gray-500 font-semibold italic">{{ $file->title }}</p>
                            <div class="flex items-center justify-between mt-1 flex-wrap">
                                <p class="text-sm text-gray-500">
                                    <span class="font-bold">Data creazione:</span>
                                    <span>{{ $file->created_at->format('d/m/Y') }}</span>
                                </p>
                                <div class="flex items-center space-x-3">
                                    <x-icon name="download" wire:click="download({{ $file->id }})"
                                            class="text-indigo-500 w-4 h-4 cursor-pointer"></x-icon>
                                    <x-icon name="trash" wire:click="delete({{ $file->id }})"
                                            class="text-red-500 w-4 h-4 cursor-pointer"></x-icon>
                                </div>
                            </div>
                        </div>
                    </li>
                @empty
                    <li class="text-center py-4 text-sm text-gray-500">
                        Nessun file inserito
                    </li>
                @endforelse
            </ul>
        </div>
    </x-card>

</div>