<template>
<app-layout>
    <template #header>

        <manager-dropdown />

    </template>

    <div class="px-20 mt-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <reminder-list :reminders="reminders"></reminder-list>

        </div>
    </div>

</app-layout>
</template>

<script>
import AppLayout from './../../Layouts/AppLayout'
import ManagerDropdown from './../../Custom/ManagerDropdown'
import ReminderList from './ReminderList'

export default {
    components: {
        AppLayout,
        ManagerDropdown,
        ReminderList,

    },
    props: ['user', 'reminders'],
    methods: {

    }
}
</script>
