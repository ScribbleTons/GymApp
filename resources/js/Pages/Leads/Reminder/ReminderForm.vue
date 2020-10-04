<template>
<jet-form-section @submitted="handleSubmit" class="mt-15 mr-15 mb-2 ml-15">
    <template #title>
        <div class="font-bold text-lg" v-if="addReminder">Leads/Lead details</div>
        <div class="font-bold text-lg" v-else>Reminder /Reminder details</div>
    </template>
    <template #description>
        <div v-if="addReminder">Add a follow up reminder</div>
        <div v-else>Update your follow up reminder</div>
    </template>

    <template #form>
        <div class="mb-1 col-span-7 font-bold text-1xl" v-if="addReminder">
            <h1>Add Reminder</h1>
        </div>
        <div class="mb-1 col-span-7 font-bold text-1xl" v-else>
            <h1>
                View Reminder
            </h1>

            <inertia-link :href="route('reminder.add', {lead:lead})">
                <div class="flex justify-between text-md mt-1 mr-15 float-right">
                    New <img class="ml-4" src="./../../icons/add.svg" width="28px" alt="Add reminder">
                </div>
            </inertia-link>

        </div>
        <div class="col-start-1 col-span-3 sm:grid-row-1">
            <!-- Reminder -->
            <div class="col-span-6 sm:col-span-4 mb-4">
                <jet-label for="reminder" value="Reminder" />
                <jet-input id="reminder" type="text" class="mt-1 block w-full" v-model="reminder.reminder" tabindex='1' placeholder="Enter reminder" required />
                <div v-if="$page.errors.reminder" class="errors">{{$page.errors.reminder[0]}}</div>

            </div>
            <!-- Reminder Date -->
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="reminder_date" value="Reminder Date" />
                <jet-input id="reminder_date" type="date" class="mt-1 block w-full" v-model="reminder.reminder_date" tabindex='2' required />
                <div v-if="$page.errors.reminder_date" class="errors">{{$page.errors.reminder_date[0]}}</div>

            </div>
        </div>

        <!-- Delete Reminder Confirmation Modal -->
        <jet-dialog-modal :show="confirmingReminderDeletion" @close="confirmingReminderDeletion = false" v-if="!addReminder">
            <template #title>
                <h1 class="font-bold text-xl">Delete Reminder</h1>
            </template>

            <template #content>
                Are you sure you want to delete this Reminder? Once your reminder is deleted, all of its resources and data will be permanently deleted.
            </template>

            <template #footer>
                <jet-secondary-button @click.native="confirmingReminderDeletion = false">
                    Nevermind
                </jet-secondary-button>

                <jet-danger-button class="ml-2" @click.native="deleteReminder">
                    Delete Reminder
                </jet-danger-button>
            </template>
        </jet-dialog-modal>
        <!-- End Delete Lead Confirmation Modal -->

    </template>
    <template #actions>
        <div class="w-full">
            <jet-action-message :on="recentlySuccessful" class="float-left mr-3 mt-1" v-if="addReminder">
                Saved.
            </jet-action-message>
            <div class="float-left flex justify-between" v-else>

                <div class="mt-1 mr-5" @click="confirmReminderDeletion">
                    <img src="./../../icons/delete.svg" width="28px" alt="Delete Lead">
                </div>

                <jet-action-message :on="recentlySuccessful" class="mt-2 ml-10 float-right" v-if="!danger">
                    <h2>Updated.</h2>
                </jet-action-message>
                <jet-action-message :on="recentlySuccessful" class="mt-2 ml-10 float-right" v-else>
                    <h2 class="text-red-400">Successfully Deleted.</h2>
                </jet-action-message>
            </div>
            <div class="float-right flex justify-between">
                <inertia-link :href="route('lead.view', {lead:lead})">
                    <div class="mt-1 mr-5 ">
                        <img src="./../../icons/back-arrow.svg" width="28px" alt="Return to list">
                    </div>
                </inertia-link>

                <jet-button class="mt-1 hover:bg-green-600" v-if="addReminder">
                    Save
                </jet-button>
                <jet-button class="mt-1 hover:bg-green-600" v-else>
                    Close
                </jet-button>
            </div>
        </div>

    </template>
</jet-form-section>
</template>

<script>
import JetFormSection from './../../../Jetstream/FormSection'
import JetButton from './../../../Jetstream/Button'
import JetActionMessage from './../../../Jetstream/ActionMessage'
import JetLabel from './../../../Jetstream/Label'
import JetInput from './../../../Jetstream/Input'
import JetDangerButton from './../../../Jetstream/DangerButton'
import JetDialogModal from './../../../Jetstream/DialogModal'
import JetSecondaryButton from './../../../Jetstream/SecondaryButton'
export default {
    components: {
        JetFormSection,
        JetButton,
        JetActionMessage,
        JetLabel,
        JetInput,
        JetDangerButton,
        JetDialogModal,
        JetSecondaryButton,
    },
    props: {
        mainReminder: Object,
        mainLead: Object,
        addReminder: {
            type: Boolean,
            default: true,
        },
    },
    data() {
        return {
            reminder: {
                reminder: null,
                reminder_date: null,
                note: null,
            },
            lead: {},
            danger: false,
            confirmingReminderDeletion: false,
            recentlySuccessful: false,

        }
    },
    created() {
        this.reminder = this.mainReminder;
        this.lead = this.mainLead;
    },
    methods: {
        handleSubmit() {
            this.$emit('reminderSubmit', this.reminder);
            this.recentlySuccessful = true;
        },
        confirmReminderDeletion() {
            this.confirmingReminderDeletion = true;
        },
        deleteReminder() {
            this.$emit('deleteReminder', this.reminder);
        }
    }
}
</script>
