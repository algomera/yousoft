{{-- -------------------- The default card (white) -------------------- --}}
@if($viewType == 'default')
	@if($from_id != $to_id)
		<div class="message-card" data-id="{{ $id }}">
			<p>{!! ($message == null && $attachment != null && @$attachment[2] != 'file') ? $attachment[1] : nl2br($message) !!}
				<sub title="{{ $fullTime }}">{{ $time }}</sub>
				{{-- If attachment is a file --}}
				@if(@$attachment[2] == 'file')
					<a href="{{ route(config('chatify.attachments.download_route_name'), ['fileName'=>$attachment[0]]) }}"
					   class="flex items-center space-x-1">
						<x-icon name="paper-clip" class="h-3 w-3"></x-icon>
						<span>{{$attachment[1]}}</span>
					</a>
				@endif
			</p>
			{{-- If attachment is an image --}}
			@if(@$attachment[2] == 'image')
				<div class="image-file chat-image"
				     style="width: 250px; height: 150px;background-image: url('{{ Chatify::getAttachmentUrl($attachment[0]) }}')">
				</div>
			@endif
		</div>
	@endif
@endif

{{-- -------------------- Sender card (owner) -------------------- --}}
@if($viewType == 'sender')
	<div class="message-card mc-sender" title="{{ $fullTime }}" data-id="{{ $id }}">
		<div class="flex items-center flex-row-reverse justify-end">
			<x-icon name="trash" class="w-4 h-4 text-red-500 chatify-hover-delete-btn mr-2" data-id="{{ $id }}"></x-icon>
			<p>
				<span class="text-sm">{!! ($message == null && $attachment != null && @$attachment[2] != 'file') ? $attachment[1] : nl2br($message) !!}</span>
				<sub title="{{ $fullTime }}" class="message-time">
					<span class="fas fa-{{ $seen > 0 ? 'check-double' : 'check' }} seen"></span> {{ $time }}</sub>
				{{-- If attachment is a file --}}
				@if(@$attachment[2] == 'file')
					<a href="{{ route(config('chatify.attachments.download_route_name'), ['fileName'=>$attachment[0]]) }}"
					   class="flex items-center space-x-1">
						<x-icon name="paper-clip" class="h-3 w-3"></x-icon>
						<span>{{$attachment[1]}}</span>
					</a>
				@endif
			</p>
		</div>
		{{-- If attachment is an image --}}
		@if(@$attachment[2] == 'image')
			<div class="image-file chat-image"
			     style="margin-top:10px;width: 250px; height: 150px;background-image: url('{{ Chatify::getAttachmentUrl($attachment[0]) }}')">
			</div>
		@endif
	</div>
@endif
