<template>
    Информация о пользователе:
    <div v-if="loaded">
        Имя: {{user.name}} <br/>
        E-mail: {{user.email}}
    </div>
    <div v-else>
        Идет загрузка...
    </div>
</template>
<script>
import api from '../api/auth.js';
export  default {
    data() {
        return {
            loaded: false,
            user: {
                name: null,
                email: null
            }
        }
    },

    methods: {
        getAuthData() {
            api.user()
                .then((response) => {
                    console.log(response.data);
                    this.loaded = true;
                    this.user.name = response.data.name;
                    this.user.email = response.data.email;
                })
                .catch((e) => {
                    console.log(e.response.data.message);
                })
        }
    },

    mounted() {
        this.getAuthData();
    }
}
</script>
