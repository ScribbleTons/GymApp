<template>
<app-layout>
    <reminder-form :main-reminder="reminder" :main-lead="lead" :addReminder="addReminder" @reminderSubmit="addNote" @deleteReminder="deleteReminder"></reminder-form>
    <reminder-note :reminder="reminder" :lead="lead" :addingNote='addingNote' @strikeCloser="submit"></reminder-note>
</app-layout>
</template>

<script>
import AppLayout from './../../../Layouts/AppLayout'
import ReminderForm from './ReminderForm'
import ReminderNote from './ReminderNote'
export default {
    components: {
        AppLayout,
        ReminderForm,
        ReminderNote,

    },
    props: {
        lead: Object,
        reminder: Object,

    },
    data() {
        return {
            addReminder: false,
            addingNote: false,
        }
    },
    methods: {
        addNote() {
            this.addingNote = true;
        },
        submit(value) {
            const data = {
                id: this.reminder.id,
                reminder: this.reminder.reminder,
                reminder_date: this.reminder.reminder_date,
                note: value.note,
                lead_id: this.reminder.lead_id,
            };

            this.$inertia.put(route('reminder.update'), data)

        },
        deleteReminder() {
            this.$inertia.delete(route('reminder.delete', {
                reminder: this.reminder
            }));
        }
    }
}
</script>
