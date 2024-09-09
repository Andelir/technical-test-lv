import Vue from 'vue';
import Vuex from 'vuex';
import axios from 'axios'; // Asegúrate de tener axios instalado

Vue.use(Vuex);

export default new Vuex.Store({
    state: {
        tasks: [] // Estado inicial para las tareas
    },
    mutations: {
        SET_TASKS(state, tasks) {
            state.tasks = tasks; // Guardamos las tareas en el estado
        },
        ADD_TASK(state, task) {
            state.tasks.push(task);
        },
        UPDATE_TASK(state, updatedTask) {
            const index = state.tasks.findIndex(t => t.id === updatedTask.id);
            if (index !== -1) {
                Vue.set(state.tasks, index, updatedTask);
            }
        },
        DELETE_TASK(state, taskId) {
            state.tasks = state.tasks.filter(t => t.id !== taskId);
        }
    },
    actions: {
        addTask({ commit }, task) {
            return axios.post('/tasks', task)
                .then(response => {
                    const { data: newTask } = response.data;
                    commit('ADD_TASK', newTask);
                    return response;
                })
                .catch(error => {
                    console.error('Error add task:', error);
                    throw error;
                });
        },
        updateTask({ commit }, task) {
            axios.put(`/tasks/${task.id}`, task)
                .then(response => {
                    const { data: updatedTask } = response.data;
                    commit('UPDATE_TASK', updatedTask);
                })
                .catch(error => {
                    console.error("Error updating task:", error);
                });
        },
        deleteTask({ commit }, taskId) {
            axios.delete(`/tasks/${taskId}`)
                .then(() => {
                    commit('DELETE_TASK', taskId);
                })
                .catch(error => {
                    console.error("Error deleting task:", error);
                });
        },
        fetchTasks({ commit }) {
            axios.get('/tasks') // Hacemos la petición GET a la ruta
                .then(response => {
                    const { data: tasks } = response.data;
                    commit('SET_TASKS', tasks); // Commit de la mutación para guardar las tareas
                })
                .catch(error => {
                    console.error("Error fetching tasks:", error);
                });
        },
    },
    getters: {
        tasks: state => state.tasks
    }
});
