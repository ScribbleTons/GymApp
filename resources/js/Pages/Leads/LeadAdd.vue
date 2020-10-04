<template>
<jet-app-layout>
    <lead-form :main-lead="lead" @submitHandler="submit"></lead-form>

</jet-app-layout>
</template>

<script>
import JetAppLayout from './../../Layouts/AppLayout'
import LeadForm from './LeadForm'

export default {
    components: {
        JetAppLayout,
        LeadForm,

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
    methods: {
        submit() {
            this.$inertia.post(route('lead.save'), this.lead);
        }
    }
}
</script>
