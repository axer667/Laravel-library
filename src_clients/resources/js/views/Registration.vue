<template>
    <form @submit.prevent="onSubmit($event)">
        <input type="text" v-model="user.name" placeholder="name" />
        <input type="text" v-model="user.email" placeholder="email" />
        <input type="text" v-model="user.password" placeholder="password" />
        <input type="text" v-model="user.password_confirmation" placeholder="confirm_password" />
        <button type="submit">
            ok
        </button>
    </form>
</template>
<script>
import api from '../api/auth.js';
export default {
    data() {
        return {
            user: {
                name: '',
                email: '',
                password: '',
                password_confirmation: ''
            },
        }
    },

    methods: {
        onSubmit($event) {
            api.register(this.user)
                .then((response) => {
                    console.log(response);
                })
                .catch((e) => {
                    console.log(e.response.data.message);
                })
        }
    }
}
</script>
