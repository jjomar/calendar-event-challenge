<template>
    <div class="row">
        <div class="col-sm-12">
            <FullCalendar :options="calendarOptions" />
        </div>
    </div>
</template>

<script>
import FullCalendar from '@fullcalendar/vue3'
import dayGridPlugin from '@fullcalendar/daygrid'

export default {
    name: 'Calendar',
    components: {
        FullCalendar
    },
    props: {
        eventsProps: Array
    },
    data() {
        return {
            calendarOptions: {
                plugins: [
                    dayGridPlugin
                ],
                initialView: 'dayGridMonth',
                themeSystem: 'bootstrap',
                weekends: true,
                events: this.eventsProps
            }
        }
  },
}
</script>

<style scoped>

</style>