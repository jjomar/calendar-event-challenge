<template>
    <div class="toast-container position-fixed top-0 end-0 p-3">
        <div v-for="(toast, index) in toastList" :key="index" :toast-number="index" class="toast fade show" role="alert" aria-live="assertive" aria-atomic="true">
            <div :class="[toast.result ? successClass : errorClass, 'toast-header']">
                <strong class="me-auto">Calendar</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                <span v-html="toast.message"></span>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'Toasts',
    props: {
        toastList: Array
    },
    data() {
        return {
            successClass: 'bg-success text-light',
            errorClass: 'bg-danger text-light'
        }
    },
    watch: {
        toastList: {
            handler(newVal) {
                (function () {
                    //last created element by the time of execution
                    let lastElementAdded = newVal.length - 1;

                    setTimeout(() => {
                        new bootstrap.Toast(document.querySelector('div[toast-number="' + lastElementAdded + '"]')).hide();
                    }, 5000)
                })()
            },
            deep: true
        }
    }
}
</script>

<style scoped>
div.toast-container {
    z-index: 9999;
}
</style>