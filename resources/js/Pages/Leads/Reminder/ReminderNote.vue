<template>
<!-- Delete Reminder Note Confirmation Modal -->
<jet-dialog-modal :show="addingNote" @close="addingNote = false">
    <template #title>
        <h1 class="font-bold text-xl">Add a note</h1>
    </template>

    <template #content>

        <div class="mt-4">
            <textarea name="note" id="note" class="mt-1 block w-3/4 border border-green-200 focus:bg-gray-300" v-model="note" placeholder="Add note ..." required></textarea>
            <div v-if="$page.errors.note" class="mt-2 errors">{{$page.errors.note[0]}}</div>
        </div>
    </template>

    <template #footer>
        <jet-secondary-button @click.native="addingNote = false">
            Nevermind
        </jet-secondary-button>

        <jet-secondary-button class="ml-2 bg-red-500" @click.native="updateReminder">
            Close
        </jet-secondary-button>
    </template>
</jet-dialog-modal>
</template>

<script>
import JetDialogModal from './../../../Jetstream/DialogModal'
import JetSecondaryButton from './../../../Jetstream/SecondaryButton'
import JetInput from './../../../Jetstream/Input'

export default {

    components: {
        JetDialogModal,
        JetSecondaryButton,
        JetInput,
    },
    props: {
        addingNote: false,
        lead: Object,
        reminder: Object,
    },
    data() {
        return {

            note: null

        }

    },

    methods: {
        updateReminder() {
            const postData = {
                reminder_id: this.reminder.id,
                note: this.note,
            };
            this.$emit('strikeCloser', postData)
        }
    }

}
</script>
