<template>
<jet-form-section @submitted="handleSubmit" class="m-15">
    <template #title>
        <div class="font-bold text-lg" v-if="lead.id">Lead Form/Details</div>
        <div class="font-bold text-lg" v-else>Lead Form</div>

    </template>
    <template #description>
        <div v-if="lead.id">Update a profile for a customer</div>
        <div v-else>Create a profile for a customer</div>
    </template>
    <template #form>

        <div class="col-start-1 col-span-3 sm:grid-row-1">
            <!-- Name -->
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="name" value="Name" />
                <jet-input id="name" type="text" class="mt-1 block w-full" v-model="lead.name" tabindex='1' placeholder="Enter name" required />
                <div v-if="$page.errors.name" class="errors">{{$page.errors.name[0]}}</div>

            </div><!-- Phone -->
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="phone" value="Phone" />
                <jet-input id="phone" type="text" class="mt-1 block w-full" v-model="lead.phone" tabindex='3' placeholder="Enter phone" required />
                <div v-if="$page.errors.phone" class="errors">{{$page.errors.phone[0]}}</div>

            </div>
            <!--Package -->
            <div class="col-span-6 sm:col-span-4 mt-1">
                <jet-label for="interest_package" value="Interested Package" />
                <select class="border border-blue-100 w-full rounded-lg p-2 mt-1" name="interested_package" id="interested_package" v-model="lead.interested_package" tabindex='4' autofocus>
                    <option value="Weekly">Weekly Plan &#8358; 10,000</option>
                    <option value="Monthly">Monthly Plan &#8358; 25,000</option>
                    <option value="6 Months">Half a Year Plan &#8358; 35,000</option>
                    <option value="Annually">Annual Plan &#8358; 49,000</option>
                </select>
                <div v-if="$page.errors.interested_package" class="errors">{{$page.errors.interested_package[0]}}</div>

            </div>
        </div>
        <div class="col-end-7 col-span-3 sm:grid-row-2">
            <!--Email -->
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="email" value="Email" />
                <jet-input id="email" type="text" class="mt-1 block w-full" v-model="lead.email" tabindex='2' placeholder="Enter email" required />
                <div v-if="$page.errors.email" class="errors">{{$page.errors.email[0]}}</div>

            </div>

            <!-- Date of Birth -->
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="dob" value="Date of Birth" />
                <jet-input id="dob" type="date" class="mt-1 block w-full" v-model="lead.dob" tabindex='4' required />
                <div v-if="$page.errors.dob" class="errors">{{$page.errors.dob[0]}}</div>

            </div>
            <!--Age -->
            <div v-if="lead.id">
                <jet-label for="age" value="Age" />
                <jet-input id="age" type="text" class="mt-1 block w-full" v-model="lead.age" tabindex='2' disabled />
                <div v-if="$page.errors.age" class="errors">{{$page.errors.age[0]}}</div>

            </div>

            <div class="col-span-6 sm:col-span-4" v-if="lead.id">
                <inertia-link :href="route('lead.subscribe', lead)">
                    <div class="float-right mt-2 text-green-600 underline">Make a Subscriber</div>
                </inertia-link>
            </div>
        </div>

        <!-- Delete Lead Confirmation Modal -->
        <jet-dialog-modal :show="confirmingLeadDeletion" :closeable="closeable" @close="confirmingLeadDeletion = false">
            <template #title>
                <h1 class="font-bold text-xl">Delete Lead</h1>
            </template>

            <template #content>
                Are you sure you want to delete this lead? Once your lead is deleted, all of its resources and data will be permanently deleted.
            </template>

            <template #footer>
                <jet-secondary-button @click.native="confirmingLeadDeletion = false">
                    Nevermind
                </jet-secondary-button>

                <jet-danger-button class="ml-2" @click.native="deleteLead">
                    Delete Lead
                </jet-danger-button>
            </template>
        </jet-dialog-modal>
        <!-- End Delete Lead Confirmation Modal -->

    </template>
    <template #actions>
        <div class="w-full" v-if="lead.id">
            <div class="float-left flex justify-between">
                <div class="mt-1 mr-5" @click="confirmLeadDeletion">
                    <img src="./../icons/delete.svg" width="28px" alt="Delete Lead">
                </div>

                <jet-action-message :on="recentlySuccessful" class="mt-2 ml-15 float-right" v-if="!danger">
                    <h2>Updated.</h2>
                </jet-action-message>
                <jet-action-message :on="recentlySuccessful" class="mt-2 ml-10 float-right" v-else>
                    <h2 class="text-red-400">Successfully Deleted.</h2>
                </jet-action-message>

            </div>
            <div class="float-right flex justify-between">
                <inertia-link :href="route('lead.list')">
                    <div class="mt-1">
                        <img src="./../icons/back-arrow.svg" width="28px" alt="Return to list">
                    </div>
                </inertia-link>
                <jet-button class="mt-1 hover:bg-green-600 ml-5">
                    Update
                </jet-button>
            </div>
        </div>

        <div class="w-full" v-else>
            <jet-action-message :on="recentlySuccessful" class="mr-3 float-left">
                Saved.
            </jet-action-message>
            <div class="float-right flex justify-between">
                <inertia-link :href="route('lead.list')">
                    <div class="mt-1 mr-5">
                        <img src="./../icons/back-arrow.svg" width="28px" alt="Return to list">
                    </div>
                </inertia-link>
                <jet-button class="mt-1">
                    Save
                </jet-button>
            </div>
        </div>

    </template>
</jet-form-section>
</template>

<script>
import JetFormSection from './../../Jetstream/FormSection'
import JetButton from './../../Jetstream/Button'
import JetInput from './../../Jetstream/Input'
import JetInputError from './../../Jetstream/InputError'
import JetLabel from './../../Jetstream/Label'
import JetActionMessage from './../../Jetstream/ActionMessage'
import JetDangerButton from './../../Jetstream/DangerButton'
import JetDialogModal from './../../Jetstream/DialogModal'
import JetSecondaryButton from './../../Jetstream/SecondaryButton'

export default {
    components: {
        JetFormSection,
        JetButton,
        JetInput,
        JetInputError,
        JetLabel,
        JetActionMessage,
        JetDangerButton,
        JetDialogModal,
        JetSecondaryButton,
    },
    props: {
        mainLead: Object,

    },
    data() {
        return {
            lead: {

                name: null,
                email: null,
                phone: null,
                dob: null,
                interested_package: null,
            },
            recentlySuccessful: false,
            confirmingLeadDeletion: false,
            closeable: false,
            danger: false,
        }
    },
    created() {
        this.lead = this.mainLead
    },
    methods: {
        handleSubmit() {
            this.$emit('submitHandler', this.lead);
            this.recentlySuccessful = true;
        },
        confirmLeadDeletion() {
            this.confirmingLeadDeletion = true;
            this.closeable = true;
            setTimeout(250);
        },
        deleteLead() {
            this.$emit('deleteLead');
            this.recentlySuccessful = true;
            this.danger = true;
        }
    }

}
</script>
