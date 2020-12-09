<template>
<jet-app-layout class="justify-center">
    <template #header>
        <manager-dropdown />
    </template>
    <div class="grid grid-col-3 mt-5">
        <h1 class="text-2xl font-extrabold ml-10 mb-6">
            Subscribers
        </h1>
    </div>

    <div class="w-2/3 ml-5">
        <form :action="route('subscriber.list')" method="get" class="inline-block flex">
            <jet-input type="text" placeholder="Search by name or email" name="search" />
            <div class="ml-2">
                <select class="w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow subscribering-tight focus:outline-none focus:shadow-outline" name="package">
                    <option value="0" selected>All</option>
                    <option value="Weekly">Weekly Plan </option>
                    <option value="Monthly">Monthly Plan </option>
                    <option value="6 Months">Half a Year Plan </option>
                    <option value="Annually">Annual Plan </option>
                </select>
            </div>

            <jet-button class="bg-green-600 p-2 ml-2">Filter</jet-button>
            <a :href="route('subscriber.list')" class="ml-2 mt-2">Reset</a>
        </form>

    </div>
    <table class="table-auto bg-white shadow-md mx-5 w-full overflow-x-scroll lg:w-5/6  mt-1">
        <thead class="mr-4 ">
            <tr>
                <th class="border px-4 py-2">Id</th>
                <th class="border px-4 p-2">Name</th>
                <th class="border px-4 py-2">Email</th>
                <th class="border px-4 py-2">Phone number</th>
                <th class="border px-4 py-2">Age</th>
                <th class="border px-4 py-2">Package</th>
                <th class="border px-4 py-2">Added On</th>

            </tr>
        </thead>

        <tr v-for="subscriber in subscribers" :key="subscriber.id" class="mr-4 shadow-xs">
            <td class="border px-4 py-2">{{subscriber.id}}</td>
            <td class="border px-4 py-2 underline">{{subscriber.name}}</td>
            <td class="border px-4 py-2">{{subscriber.email}}</td>
            <td class="border px-4 py-2">{{subscriber.phone}}</td>
            <td class="border px-4 py-2">{{subscriber.age}}</td>
            <td class="border px-4 py-2">{{subscriber.package}}</td>
            <td class="border px-4 py-2">{{timestamp(subscriber.created_at)}}</td>

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
    props: ['subscribers'],
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
