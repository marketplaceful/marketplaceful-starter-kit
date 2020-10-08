<form wire:submit.prevent="createConversation">
    <x-mkt-label for="body" value="Message" />
    <x-mkt-textarea id="body" rows="3" class="mt-1 block w-full" wire:model.defer="state.body" placeholder="Type your message" />
    <x-mkt-input-error for="description" class="mt-2" />

    <div class="mt-4">
        <x-mkt-button>
            Start conversation
        </x-mkt-button>
    </div>
</form>
