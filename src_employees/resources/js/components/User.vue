<template>
    Информация о пользователе:
    <div v-if="loaded">
        Имя: {{user.name}} <br/>
        E-mail: {{user.email}}

        <div class="dashboard-books dashboard-books_all">
            Все книги, выданные на руки ({{books.booksAll.length}}):
            <div class="list">
                <Leasing v-bind:books="books.booksAll"></Leasing>
            </div>
        </div>
        <div class="dashboard-books dashboard-books_returned">
            Книги, вернувшиеся вовремя ({{books.booksReturned.length}}):
            <div class="list">
                <Leasing v-bind:books="books.booksReturned"></Leasing>
            </div>
        </div>
        <div class="dashboard-books dashboard-books_need_to_returned">
            Книги, подлежащие возврату ({{books.booksNeedToReturned.length}}):
            <div class="list">
                <Leasing v-bind:books="books.booksNeedToReturned"></Leasing>
            </div>
        </div>
        <div class="dashboard-books dashboard-books_need_to_returned_immediately">
            Книги, подлежащие скорому возврату ({{books.booksNeedToReturnedImmediately.length}}):
            <div class="list">
                <Leasing v-bind:books="books.booksNeedToReturnedImmediately"></Leasing>
            </div>
        </div>
        <div class="dashboard-books dashboard-books_overdue">
            Книги, дата возврата которых просрочена ({{books.booksOverdue.length}}):
            <div class="list">
                <Leasing v-bind:books="books.booksOverdue"></Leasing>
            </div>
        </div>
        <div class="dashboard-books dashboard-books_overdue_but_returned">
            Книги, вернувшиеся после установленной даты возврата ({{books.booksOverdueButReturned.length}}):
            <div class="list">
                <Leasing v-bind:books="books.booksOverdueButReturned"></Leasing>
            </div>
        </div>
    </div>
    <div v-else>
        Идет загрузка...
    </div>
</template>
<script>
import api from '../api/auth.js';
import apiLibrarian from '../api/librarian.js';
import Leasing from "./dashboards/Leasing.vue";
export  default {
    components: {Leasing},
    data() {
        return {
            loaded: false,
            user: {
                name: null,
                email: null
            },
            books: {
                booksAll: [],
                booksReturned: [],
                booksNeedToReturned: [],
                booksNeedToReturnedImmediately: [],
                booksOverdue: [],
                booksOverdueButReturned: []
            },
        }
    },

    methods: {
        getLeasing() {
            apiLibrarian.leasing()
                .then((response) => {
                    console.log(response.data);
                    this.books = response.data;
                })
        },

        refreshToken() {
            api.refresh()
                .then((response) => {
                    console.log(response.data);
                    if (response.data.authorisation.token) {
                        localStorage.setItem('userEmployee', JSON.stringify({'token': response.data.authorisation.token}))
                        console.log('token refreshed');
                    }
                })
                .catch((e) => {
                    console.log(e.response.data.message);
                    if (e.response.status === 500 && e.response.data.message == "Token has expired and can no longer be refreshed") {
                        console.log("Relogin, please");
                    }
                    console.log('token not refreshed');
                })
        },

        getAuthData() {
            api.user()
                .then((response) => {
                    console.log(response.data);
                    this.loaded = true;
                    this.user.name = response.data.name;
                    this.user.email = response.data.email;
                    this.getLeasing();
                })
                .catch((e) => {
                    console.log(e.response.data.message);
                    if (e.response.status === 401 && e.response.data.message === "Token has expired") {
                        this.refreshToken();
                    }
                })
        }
    },

    mounted() {
        this.getAuthData();
    }
}
</script>
