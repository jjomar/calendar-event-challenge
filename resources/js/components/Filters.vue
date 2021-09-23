<template>
    <div class="row">
        <div class="col">
            <label for="event-description" class="form-label">Event</label>
            <div class="input-group">
                <input type="text" class="form-control" id="event-description">
                <span class="input-group-text"></span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <label for="start-date" class="form-label">From</label>
            <input type="date" class="form-control" id="start-date">
        </div>
        <div class="col-sm-6">
            <label for="end-date" class="form-label">To</label>
            <input type="date" class="form-control" id="end-date">
        </div>
    </div>
    <div class="row justify-content-evenly">
        <div class="col-sm-1 form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="monday-cb" value="1">
            <label class="form-check-label" for="monday-cb">Mon</label>
        </div>
        <div class="col-sm-1 form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="tuesday-cb" value="2">
            <label class="form-check-label" for="tuesday-cb">Tue</label>
        </div>
        <div class="col-sm-1 form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="wednesday-cb" value="3">
            <label class="form-check-label" for="wednesday-cb">Wed</label>
        </div>
        <div class="col-sm-1 form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="thursday-cb" value="4">
            <label class="form-check-label" for="thursday-cb">Thu</label>
        </div>
        <div class="col-sm-1 form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="friday-cb" value="5">
            <label class="form-check-label" for="friday-cb">Fri</label>
        </div>
        <div class="col-sm-1 form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="saturday-cb" value="6">
            <label class="form-check-label" for="saturday-cb">Sat</label>
        </div>
        <div class="col-sm-1 form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="sunday-cb" value="7">
            <label class="form-check-label" for="sunday-cb">Sun</label>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            <button type="button" class="btn btn-primary" id="save">Save</button>
        </div>
    </div>
</template>

<script>
export default {
    name: 'Filters',
    data() {
        return {

        }
    },
    methods: {
        saveDates() {

        },
        getDates() {

        }
    }
}
</script>

<style scoped>
    .row {
        margin-bottom: 10px;
    }
</style>