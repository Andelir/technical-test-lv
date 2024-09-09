import Vue from 'vue';
import Vuex from 'vuex';
import TaskList from './components/TaskList.vue';
import store from './store';
import axios from 'axios';
import Swal from 'sweetalert2';


Vue.use(Vuex);
// Configuración global de Axios
axios.defaults.baseURL = 'http://127.0.0.1:8000'; // Cambia esto a tu URL base si es necesario
axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
axios.interceptors.response.use(function (response) {
    if (response.data.message) {
        Swal.fire({
            position: "top-end",
            icon: 'success',
            title: response.data.message,
            showConfirmButton: false,
            color: 'white',
            background: 'green',
            toast: true,
            timer: 3000
        });
    }
    return response;
  }, function (error) {
    if (error.response) {
        if (error.response.data.message) {
            Swal.fire({
                position: "top-end",
                icon: 'error',
                title: error.response.data.message,
                showConfirmButton: false,
                color: 'white',
                background: 'red',
                toast: true,
                timer: 3000
            });
        } else {
            Swal.fire({
                position: "top-end",
                icon: 'error',
                title: 'Internal server error',
                showConfirmButton: false,
                color: 'white',
                background: 'red',
                toast: true,
                timer: 3000
            });
        }
    }
    return Promise.reject(error);
  });
const app = new Vue({
    el: '#app',
    store, // Agrega el store a la instancia de Vue
    components: { TaskList },
});
