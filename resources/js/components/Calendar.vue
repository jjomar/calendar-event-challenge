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
    watch: {
        eventsProps(newVal) {
            return this.calendarOptions.events = newVal;
        }
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
                eventDidMount: function(info) {
                    info.el.setAttribute('data-bs-toggle', 'tooltip');
                    info.el.setAttribute('data-bs-placement', 'top');
                    info.el.setAttribute('title', info.event.title);

                    new bootstrap.Tooltip(info.el);
                },
                events: this.eventsProps
            }
        }
  },
}
</script>