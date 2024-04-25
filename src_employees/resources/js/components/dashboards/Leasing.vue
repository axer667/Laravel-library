<template>
    <div v-if="books && books.length > 0" class="list-books" v-for="book in books">
        <p> Идентификатор: {{book.id}} </p>
        <p> Название книги: {{book.book_title}} </p>
        <p> Сотрудник, выдавший книгу: {{book.librarian_name}} </p>
        <p> Имя клиента: {{book.client_name}} </p>
        <p> Дата выдачи: {{book.date_of_issue}} </p>
        <p> Дата возврата: {{book.expected_date_of_return}} </p>
        <p> Фактическая дата возврата: {{book.actual_date_of_return ? book.actual_date_of_return : 'отсутствует'}}</p>
    </div>
    <div v-else>
        Нет таких книг
    </div>
</template>
<script>
export  default {
    props: ['books'],
}
</script>
