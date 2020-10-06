<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        <input type="text" v-model="userId" placeholder="user id">
                        <input type="text" v-model="message" placeholder="message">
                        <button type="button" v-on:click.prevent="pingUser">Ping</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: [
            'id'
        ],
        data() {
            return {
                userId: null,
                message: ''
            }
        },
        mounted() {
            console.log('Component mounted.')

            let channel = Echo.private('user.' + this.id);
            channel.listen('.UserEvent', function (data) {
                alert(data.message);
            });
        },
        methods: {
            pingUser() {
                window.axios.post('/ping', { id: this.userId, message: this.message });
            }
        }
    }
</script>
