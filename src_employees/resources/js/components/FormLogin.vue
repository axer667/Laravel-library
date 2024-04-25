<template>
    <form @submit.prevent="onSubmit($event)">
        <input type="text" v-model="user.email" placeholder="email" />
        <input type="text" v-model="user.password" placeholder="password" />
        <button type="submit">
            ok
        </button>
    </form>
</template>
<script>
import api from '../api/auth.js';
export  default {
    data() {
        return {
            user: {
                email: '',
                password: ''
            },
        }
    },

    methods: {
        onSubmit($event) {
            api.login(this.user)
                .then((response) => {
                    console.log(response.data);
                    if (response.data.authorisation.token) {
                        localStorage.setItem('userEmployee', JSON.stringify({'token': response.data.authorisation.token}))
                    }
                })
                .catch((e) => {
                    console.log(e.response.data.message);
                })
        }
    }
}
</script>
