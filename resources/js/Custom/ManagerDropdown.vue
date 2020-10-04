<template>
<jet-dropdown align="left" width="48">
    <template #trigger>
        <div class="block px-4 py-2 text-sm text-gray-400">
            Manage
        </div>
    </template>
    <template #content>
        <!-- Manage Lead -->
        <div class="block px-4 py-2 text-xs text-gray-400">
            Manage Lead
        </div>
        <!-- Lead link -->
        <div>
            <jet-dropdown-link :href="route('lead.list')">
                Leads
            </jet-dropdown-link>
            <div class="border-t border-gray-100"></div>
            <!-- Subscriber link -->
            <jet-dropdown-link :href="route('subscriber.list')">
                Subscribers
            </jet-dropdown-link>
        </div>
    </template>

</jet-dropdown>
</template>

<script>
import JetDropdownLink from './../Jetstream/DropdownLink'
import JetDropdown from './../Jetstream/Dropdown'
export default {
    name: 'ManagerDropdown',
    components: {
        JetDropdown,
        JetDropdownLink,
    }
}
</script>
