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
    data() {
        return {
            calendarOptions: {
                plugins: [
                    dayGridPlugin
                ],
                initialView: 'dayGridMonth',
                themeSystem: 'bootstrap',
                allDaySlot: false,
                weekends: true,
                events: [
                    // { title: 'event 1', date: '2021-09-20' },
                    // { title: 'event 2', date: '2021-09-22' }
                ]
            }
        }
  },
}
</script>

<style scoped>

</style>