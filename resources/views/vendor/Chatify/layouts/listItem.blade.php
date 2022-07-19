{{-- -------------------- Saved Messages -------------------- --}}
@if($get == 'saved')
	<table class="messenger-list-item mt-4 m-li-divider" data-contact="{{ Auth::user()->id }}">
		<tr data-action="0">
			{{-- Avatar side --}}
			<td>
				<div class="avatar av-m bg-blue-100 flex items-center justify-center">
					<x-icon name="bookmark" class="w-5 h-5 text-blue-400"></x-icon>
				</div>
			</td>
			{{-- center side --}}
			<td>
				<p data-id="{{ Auth::user()->id }}" data-type="user">Messaggi salvati <span>Tu</span></p>
				<span>Salva i messaggi privati</span>
			</td>
		</tr>
	</table>
@endif

{{-- -------------------- All users/group list -------------------- --}}
@if($get == 'users')
	<table class="messenger-list-item" data-contact="{{ $user->id }}">
		<tr data-action="0">
			{{-- Avatar side --}}
			<td style="position: relative">
				@if($user->active_status)
					<span class="activeStatus"></span>
				@endif
				<div class="avatar av-m"
				     style="background-image: url('{{ $user->avatar }}');">
				</div>
			</td>
			{{-- center side --}}
			<td>
				<p data-id="{{ $user->id }}" data-type="user">
					{{ \App\User::find($user->id)->user_data->name }}
					<span>{{ $lastMessage->created_at->diffForHumans() }}</span></p>
				<span class="flex items-center space-x-1">
            {{-- Last Message user indicator --}}
					{!!
						$lastMessage->from_id == Auth::user()->id
						? '<span class="lastMessageIndicator">Tu:</span>'
						: ''
					!!}
					{{-- Last message body --}}
					@if($lastMessage->attachment == null)
						<span>
							{!!
							strlen($lastMessage->body) > 30
							? trim(substr($lastMessage->body, 0, 30)).'..'
							: $lastMessage->body
						!!}
						</span>
					@else
						<div class="flex items-center space-x-1">
							<x-icon name="paper-clip" class="h-3 w-3"></x-icon>
							<span>Allegato</span>
						</div>
					@endif
        </span>
				{{-- New messages counter --}}
				{!! $unseenCounter > 0 ? "<b>".$unseenCounter."</b>" : '' !!}
			</td>

		</tr>
	</table>
@endif

{{-- -------------------- Search Item -------------------- --}}
@if($get == 'search_item')
	<table class="messenger-list-item" data-contact="{{ $user->id }}">
		<tr data-action="0">
			{{-- Avatar side --}}
			<td>
				<div class="avatar av-m"
				     style="background-image: url('{{ $user->avatar }}');">
				</div>
			</td>
			{{-- center side --}}
			<td>
				<p data-id="{{ $user->id }}" data-type="user">
				{{ \App\User::find($user->id)->user_data->name }}
			</td>
		</tr>
	</table>
@endif

{{-- -------------------- Shared photos Item -------------------- --}}
@if($get == 'sharedPhoto')
	<div class="shared-photo chat-image" style="background-image: url('{{ $image }}')"></div>
@endif


