<template>
<jet-form-section @submitted="handleSubmit" class="m-15">
    <template #title>
        <div class="font-bold text-lg">Add a subscriber</div>
    </template>
    <template #description>
        <div>Add lead to your subscription list.</div>
    </template>
    <template #form>

        <div class="col-start-1 col-span-3 sm:grid-col-1">
            <!-- Name -->
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="name" value="Name" />
                <jet-input id="name" type="text" class="mt-1 block w-full" v-model="lead.name" tabindex='1' placeholder="Enter name" disabled />
                <div v-if="$page.errors.name" class="errors">{{$page.errors.name[0]}}</div>
            </div>

            <!--Package -->
            <div class="col-span-6 sm:col-span-4 mt-1">
                <jet-label for="interest_package" value="Interested Package" />
                <select class="border border-blue-100 w-full rounded-lg p-2 mt-1" name="interested_package" id="interested_package" v-model="lead.interested_package" tabindex='2' autofocus>
                    <option value="Weekly">Weekly Plan </option>
                    <option value="Monthly">Monthly Plan </option>
                    <option value="6 Months">Half a Year Plan </option>
                    <option value="Annually">Annual Plan </option>
                </select>
                <div v-if="$page.errors.interested_package" class="errors">{{$page.errors.interested_package[0]}}</div>
            </div>
        </div>

        <div class="col-end-7 col-span-3 sm:grid-row-2">
            <!--Subscription End Date -->
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="sed" value="Subscription End Date" />
                <jet-input id="sed" type="date" class="mt-1 block w-full" v-model="subscriptionEndsDate" tabindex='3' disabled />
            </div>

            <!-- User Payment Amount -->
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="upa" value="Payment Amount" />
                <jet-input id="upa" type="text" class="mt-1 block w-full" v-model="userPaymentAmount" tabindex='4' disabled />
            </div>

        </div>
    </template>
    <template #actions>
        <div class="w-full">
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
import moment from 'moment'
import JetFormSection from './../../Jetstream/FormSection'
import JetButton from './../../Jetstream/Button'
import JetActionMessage from './../../Jetstream/ActionMessage'
import JetLabel from './../../Jetstream/Label'
import JetInput from './../../Jetstream/Input'

export default {
    components: {
        JetFormSection,
        JetButton,
        JetActionMessage,
        JetLabel,
        JetInput,

    },
    props: {
        lead: Object,
    },
    data() {
        return {
            localLead: {
                name: null,
                interested_package: null,
            },
            recentlySuccessful: false,
        }
    },
    created() {
        this.localLead = this.lead;
    },
    methods: {
        handleSubmit() {
            const postData = {
                name: this.localLead.name,
                lead_id: this.lead.id,
                renewal_date: this.subscriptionEndsDate,
                amount: this.userPaymentAmount,
                package: this.localLead.interested_package,
            };
            this.$emit('submitHandler', postData);
        }
    },
    computed: {
        subscriptionEndsDate() {

            //assign values in days to package input values

            //computing subscription end date
            switch (this.lead.interested_package) {
                case 'Weekly':
                    var days = 7;
                    return moment().add(days, 'days').format('YYYY-MM-DD');
                    break;
                case 'Monthly':
                    var days = 30;
                    return moment().add(days, 'days').format('YYYY-MM-DD');
                    break;
                case '6 Months':
                    var days = 180;
                    return moment().add(days, 'days').format('YYYY-MM-DD');
                    break;
                case 'Annually':
                    var days = 360;
                    return moment().add(days, 'days').format('YYYY-MM-DD');
                    break;
                default:
                    return null;
            }

        },
        userPaymentAmount() {
            //assign values in days to package input values

            //computing fees
            switch (this.lead.interested_package) {
                case 'Weekly':
                    return 'NGN ' + 10000;
                    break;
                case 'Monthly':
                    return 'NGN ' + 25000;
                    break;
                case '6 Months':
                    return 'NGN ' + 35000;
                    break;
                case 'Annually':
                    return 'NGN ' + 49000;
                    break;
                default:
                    return null;
            }
        },

    }
}
</script>
