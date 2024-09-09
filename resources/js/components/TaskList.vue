<template>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Task List</h1>
        <ul class="list-group mb-4">
            <li v-for="task in tasks" :key="task.id"
                class="list-group-item d-flex justify-content-between align-items-center">
                <div>
                    <h5 class="mb-1">{{ task.title }}</h5>
                    <p class="mb-1">{{ task.description }}</p>
                    <small class="text-muted">Assigned to: {{ task.user.name }}</small>
                </div>
                <div v-if="task.completed">
                    <span>Completed ✅</span>
                </div>
                <div v-else>
                    <button class="btn btn-success btn-sm mr-2" @click="completeTask(task.id)">Complete</button>
                    <button class="btn btn-danger btn-sm" @click="deleteTask(task.id)">Delete</button>
                </div>
            </li>
        </ul>
        <form @submit.prevent="addTask" ref="formTask" :class="styleForm" novalidate>
            <div class="form-group">
                <label for="taskTitle">Task title</label>
                <input v-model="newTask.title" id="taskTitle" class="form-control" type="text"
                    placeholder="Read book design patterns" required>
                <div class="invalid-feedback">
                    Task title is required
                </div>
            </div>
            <div class="form-group">
                <label for="description">Task description</label>
                <input v-model="newTask.description" id="description" type="text" class="form-control"
                    placeholder="Read book every day" required>
                <div class="invalid-feedback">
                    Task description is required
                </div>
            </div>
            <div class="form-group">
                <label for="email">
                    Assigned user email
                    <a>View users</a>
                </label>
                <input v-model="newTask.user" type="email" id="email" class="form-control"
                    placeholder="johndoe@mail.com" autocomplete="email" required>
                <div class="invalid-feedback">
                    Assigned user email is required
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Add Task</button>
        </form>
    </div>
</template>

<script>
import { mapState, mapActions } from 'vuex';

export default {
    data() {
        return {
            newTask: {
                title: '',
                description: '',
                user: ''
            },
            styleForm: 'card card-body',
        };
    },
    computed: {
        ...mapState(['tasks']) // Simplificado para mapState
    },
    methods: {
        ...mapActions(['fetchTasks', 'deleteTask']),
        addTask() {
            const form = this.$refs.formTask;
            if (form.checkValidity()) {
                this.styleForm = 'card card-body';
                this.$store.dispatch('addTask', this.newTask).then(() => {
                        this.newTask.title = '';
                        this.newTask.description = '';
                        this.newTask.user = '';
                }).catch(error => {
                    console.error(error);
                });
            } else {
                this.styleForm = this.styleForm + ' was-validated';
            }
        },
        completeTask(taskId) {
            this.$store.dispatch('updateTask', {
                id: taskId,
                completed: 1,
            }).then((response) => {
                console.log(response, 'adsfasdf');
            }).catch(error => {
                console.error('Error completing task:', error);
            });
        },
    },
    mounted() {
        this.fetchTasks();
    }
};
</script>
