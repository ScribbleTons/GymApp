<template>
<jet-app-layout>
    <template #header>
        <manager-dropdown />
    </template>

    <lead-form :main-lead="leadProp" @submitHandler="submit" @deleteLead="deleteLead"></lead-form>

    <!-- Reminder Field -->
    <div class="mt-2 bg-gray-200 mr-15 ml-10 shadow-md mb-10">
        <div class="card" v-if="lead.reminder.length > 0">
            <div class="text-1xl text-black font-bold p-4">
                Lead reminders
                <inertia-link :href="route('reminder.add', {lead:lead})">
                    <div class="mt-1 float-right mr-10">
                        <img src="./../icons/add.svg" width="28px" alt="Add reminder">
                    </div>
                </inertia-link>

            </div>
            <div class="text-lg p-2 bg-white">
                <table class="table-auto bg-white shadow-md m-5" style="width: -webkit-fill-available;">
                    <tr v-for="reminder in lead.reminder" :key="reminder.id" class="mr-4 shadow-xs">
                        <td class="px-4 py-2">{{reminder.reminder}}</td>
                        <td class="px-4 py-2">{{reminder.reminder_date}}</td>
                        <td class="px-4 py-2"><strong class="font-bold text-blue-800">{{reminder.status}}</strong></td>
                        <td class="px-4 py-2">
                            <inertia-link :href="route('reminder.view', {lead:lead, reminder:reminder})">></inertia-link>
                        </td>

                    </tr>
                </table>
            </div>
        </div>
        <div class=" flex flex-col" v-else>
            <div class="text-1xl text-black font-bold p-4">Lead reminders</div>
            <div class="text-lg bg-white ">
                <inertia-link :href="route('reminder.add', {lead:lead})">
                    <jet-button class="m-2 bg-green-600 rounded-lg p-8 mb-4">
                        Add New Reminder
                    </jet-button>
                </inertia-link>
            </div>
        </div>

    </div>

</jet-app-layout>
</template>

<script>
import JetAppLayout from './../../Layouts/AppLayout'
import LeadForm from './LeadForm'
import ManagerDropdown from './../../Custom/ManagerDropdown'
import JetButton from './../../Jetstream/Button'

export default {
    components: {
        JetAppLayout,
        LeadForm,
        ManagerDropdown,
        JetButton,

    },
    props: {
        leadProp: Object,
    },
    data() {
        return {

            lead: {
                name: '',
                email: '',
                phone: '',
                dob: '',
                interested_package: '',
            },

        }

    },
    created() {
        this.lead = this.leadProp;
    },
    methods: {
        submit() {
            this.$inertia.put('/leads/update', this.lead);
        },
        deleteLead() {
            this.$inertia.delete(route('lead.delete', this.lead));

        },

    }
}
</script>
