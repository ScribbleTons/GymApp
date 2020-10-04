<template>
<div class="grid grid-row-2 gap-2 bg-green-600 shadow-md w-1/3 items-center">
    <div class="row-start-1 px-4 font-bold text-xl bg-white max-w-full p-2">Reminders List</div>
    <div class="row-start-2 px-4" v-if="reminders.length > 0">
        <ul class="mb-2 ">
            <li v-for="reminder in reminders" :key="reminder.id" class="bg-gray-50 w-full border-r-10 shadow-md p-4 mb-2 hover:bg-blue-200">
                <inertia-link :href="route('reminder.view', {lead:reminder.lead, reminder:reminder})">
                    <strong>{{reminder.lead.name}}</strong>
                    <br>
                    <div class="text-sm text-gray-300 mt-2">Reminder</div>
                    {{reminder.reminder}}
                </inertia-link>
            </li>
        </ul>
    </div>
    <div class="row-start-2 px-4 text-green-600" v-else>No reminder for today :)</div>

</div>
</template>

<script>
export default {
    props: {
        reminders: Array,
    }
}
</script>
