<template>
<jet-app-layout class="justify-center">
    <template #header>
        <manager-dropdown />
    </template>
    <div class="grid grid-col-3 mt-5">
        <h1 class="text-2xl font-extrabold ml-10">
            Leads
        </h1>

        <inertia-link :href="route('lead.create')" class="col-end-2 ">
            <jet-button class="bg-green-500 rounded-lg p-2 text-white float-right mr-5">
                Create New Lead
            </jet-button>
        </inertia-link>

    </div>

    <div class="w-2/3 ml-5">
        <form :action="route('lead.list')" method="get" class="inline-block flex">
            <jet-input type="text" placeholder="Search by name or email" name="search" />
            <div class="ml-2">
                <select class="w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline" name="package">
                    <option value="0" selected>All</option>
                    <option value="Weekly">Weekly Plan </option>
                    <option value="Monthly">Monthly Plan </option>
                    <option value="6 Months">Half a Year Plan </option>
                    <option value="Annually">Annual Plan </option>
                </select>
            </div>

            <jet-button class="bg-green-600 p-2 ml-2">Filter</jet-button>
            <a :href="route('lead.list')" class="ml-2 mt-2">Reset</a>
        </form>

    </div>
    <table class="table-auto bg-white shadow-md ml-5 mr-5 mt-1" style="width: -webkit-fill-available;">
        <thead class="mr-4 ">
            <tr>
                <th class="border px-4 py-2">Id</th>
                <th class="border px-4 p-2">Name</th>
                <th class="border px-4 py-2">Email</th>
                <th class="border px-4 py-2">Phone number</th>
                <th class="border px-4 py-2">Age</th>
                <th class="border px-4 py-2">Package</th>
                <th class="border px-4 py-2">Added On</th>
                <th class="border px-4 py-2"></th>
            </tr>
        </thead>

        <tr v-for="lead in leads" :key="lead.id" class="mr-4 shadow-xs">
            <td class="border px-4 py-2">{{lead.id}}</td>
            <td class="border px-4 py-2 underline">
                <inertia-link :href="route('lead.view', {lead:lead})">
                    {{lead.name}}
                </inertia-link>
            </td>
            <td class="border px-4 py-2">{{lead.email}}</td>
            <td class="border px-4 py-2">{{lead.phone}}</td>
            <td class="border px-4 py-2">{{lead.age}}</td>
            <td class="border px-4 py-2">{{lead.interested_package}}</td>
            <td class="border px-4 py-2">{{timestamp(lead.created_at)}}</td>
            <td class="border px-4 py-2">
                <inertia-link :href="route('lead.view', {lead:lead})"> > </inertia-link>
            </td>

        </tr>
    </table>

</jet-app-layout>
</template>

<script>
import moment from 'moment'
import JetAppLayout from './../../Layouts/AppLayout'
import JetButton from './../../Jetstream/Button'
import ManagerDropdown from './../../Custom/ManagerDropdown'
import JetInput from './../../Jetstream/Input'
export default {
    components: {
        JetAppLayout,
        ManagerDropdown,
        JetButton,
        JetInput

    },
    props: ['leads'],
    data() {
        return {

        }
    },
    methods: {

        timestamp(value) {
            var Xval = moment(value).format('LL');
            return Xval;
        }

    }
}
</script>
