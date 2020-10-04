<template>
<app-layout>
    <template #header>
        <manager-dropdown />
    </template>
    <div class="flex flex-col">
        <div class="w-full">
            <subscriber-form :lead="lead" @submitHandler="submit"></subscriber-form>
        </div>
    </div>
</app-layout>
</template>

<script>
import AppLayout from './../../Layouts/AppLayout'
import ManagerDropdown from './../../Custom/ManagerDropdown'
import SubscriberForm from './SubscriberForm'

export default {
    components: {
        AppLayout,
        ManagerDropdown,
        SubscriberForm,
    },
    props: {
        lead: Object,
    },
    data() {
        return {

        }
    },
    methods: {
        submit(valData) {
            this.$inertia.post(route('lead.subscribe.add'), valData);
        }
    }
}
</script>
