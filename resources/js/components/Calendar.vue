<template>
<!-- Fullcalendar -->
<div class="card card-calendar">
    <!-- Card header -->
    <div class="card-header">
        <!-- Title -->
        <h5 class="h3 mb-0">My Events</h5>
    </div>
    <!-- Card body -->
    <div class="card-body p-0">
        <full-calendar ref="calendar" :config="configOptions" :events="getEventDates"></full-calendar>
    </div>
</div>
</template>

<script>
import {
    mapGetters
} from 'vuex'

export default {
    computed: {
        ...mapGetters(['getEvent']),

        configOptions() {
            return {
                defaultView: "month",
                editable: false,
            }
        },

        getEventDates() {
            return this.getEvent.dates
        },
    },
}
</script>
