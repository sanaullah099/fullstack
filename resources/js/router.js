import Home from './components/Home.vue';
import Example from './components/Example.vue';
import Test from './components/Sana.vue';
import about from './components/about.vue';
import contactDetail from './components/contactDetail.vue';
import book from './components/book.vue';
import author from './components/author.vue';
import authoradd from './components/authoradd.vue';
export const routes = [
    { path: '/', component: Home, name: 'Home' },
    { path: '/example', component: Example, name: 'Example' },
    { path: '/test', component: Test, name: 'Sana' },
    { path: '/about', component: about, name: 'about'},
    { path: '/contactDetail/:id', component:contactDetail, name:'contactDetail'},
    { path: '/book', component: book, name: 'book' },
    { path: '/author', component: author, name: 'author'},
    { path: '/authoradd', component: authoradd, name:'authoradd'}

];