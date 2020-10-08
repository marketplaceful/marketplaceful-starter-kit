<form wire:submit.prevent="createListing">
    <div>
        <textarea class="form-textarea w-full mb-2" id="body" rows="3" wire:model="body"></textarea>
        <button type="submit" class="block w-full text-center bg-gray-800 hover:bg-gray-700 text-white px-3 py-2 rounded">Start conversation</button>
    </div>
</form>
