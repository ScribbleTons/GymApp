<template>
<app-layout>
    <reminder-form :main-reminder="reminder" :main-lead="lead" @reminderSubmit="submit"></reminder-form>
</app-layout>
</template>

<script>
import AppLayout from './../../../Layouts/AppLayout'
import ReminderForm from './ReminderForm'

export default {
    components: {
        AppLayout,
        ReminderForm
    },
    props: {
        lead: Object,
    },
    data() {
        return {
            reminder: {
                reminder: null,
                reminder_date: null,
                note: null,
            },

        }
    },
    methods: {
        submit() {
            const postData = {
                reminder: this.reminder.reminder,
                reminder_date: this.reminder.reminder_date,
                lead_id: this.lead.id,

            };
            this.$inertia.post(route('reminder.save', postData))
        }
    }

}
</script>
