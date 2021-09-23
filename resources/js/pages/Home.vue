<template>
    <div class="row">
        <div class="col">
            <Header />
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <Filters />
        </div>
        <div class="col-sm-8">
            <Calendar :eventsProps="this.events"/>
        </div>
    </div>
</template>

<script>
import Header from '../components/Header.vue';
import Filters from '../components/Filters.vue';
import Calendar from '../components/Calendar.vue';

export default {
    name: 'Home',
    components: {
        Header,
        Filters,
        Calendar
    },
    data() {
        return {
            events: [
                { title: 'event 1', date: '2021-09-20' },
                { title: 'event 2', date: '2021-09-22' }
            ]
        }
    },
    methods: {
        getEvents() {
            
        }
    }
}
</script>