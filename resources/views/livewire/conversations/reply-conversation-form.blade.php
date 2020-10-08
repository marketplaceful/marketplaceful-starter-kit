<form x-data="conversationReplyState()" wire:submit.prevent="reply">
    <div>
        <textarea rows="3" class="w-full form-textarea" wire:model="body" x-on:keydown.enter="submit" placeholder="Type your reply"></textarea>
    </div>

    <button type="submit" x-ref="submit" class="sr-only">Send</button>
</form>

<script>
    function conversationReplyState() {
        return {
            submit () {
                this.$refs.submit.click()
            }
        }
    }
</script>
