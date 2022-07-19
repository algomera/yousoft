<div class="messenger-sendCard flex items-center">
    <form id="message-form" method="POST" action="{{ route('send.message') }}" enctype="multipart/form-data">
        @csrf
        <label class="flex items-center justify-center">
            <x-icon name="paper-clip" class="h-6 w-6"></x-icon>
            <input disabled='disabled' type="file" class="upload-attachment" name="file" accept=".{{implode(', .',config('chatify.attachments.allowed_images'))}}, .{{implode(', .',config('chatify.attachments.allowed_files'))}}" />
        </label>
        <textarea readonly='readonly' name="message" class="m-send app-scroll" placeholder="Scrivi un messaggio.."></textarea>
        <button disabled='disabled'>
            <x-icon name="paper-plane" class="h-6 w-6"></x-icon>
        </button>
    </form>
</div>
