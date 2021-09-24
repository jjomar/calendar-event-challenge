<template>
    <div class="row">
        <div class="col">
            <Header />
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <Filters @save-events="handleSaveEvents" />
        </div>
        <div class="col-sm-8">
            <Calendar :eventsProps="events"/>
        </div>
    </div>
    <Toasts :toastList="toastList" />
</template>

<script>
import Header from '../components/Header.vue';
import Filters from '../components/Filters.vue';
import Calendar from '../components/Calendar.vue';
import Toasts from '../components/Toasts.vue';

export default {
    name: 'Home',
    components: {
        Header,
        Filters,
        Calendar,
        Toasts
    },
    data() {
        return {
            events: [],
            toastList: []
        }
    },
    beforeMount() {
        this.getEvents();
    },
    methods: {
        getEvents() {
            fetch('/api/get')
            .then(response => response.json())
            .then(data => {
                this.events = data;
            });
        },
        handleSaveEvents(data) {
            if (data.result) {
                this.events = data.eventList;

                return this.toastList.push({
                    result: data.result,
                    message: 'Event successfully saved!'
                });
            }
            return this.toastList.push({
                result: data.result,
                message: data.messages.join('<br>')
            });
        }
    }
}
</script>