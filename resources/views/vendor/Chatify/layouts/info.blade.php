{{-- user info and avatar --}}
<div class="avatar av-l chatify-d-flex"></div>
<p class="info-name">{{ config('chatify.name') }}</p>
<div class="messenger-infoView-btns">
    <a href="#" class="danger delete-conversation !inline-flex items-center justify-center space-x-1">
        <x-icon name="trash" class="h-4 w-4"></x-icon>
        <span>Cancella conversazione</span>
    </a>
</div>
{{-- shared photos --}}
<div class="messenger-infoView-shared">
    <p class="messenger-title">File condivisi</p>
    <div class="shared-photos-list"></div>
</div>
