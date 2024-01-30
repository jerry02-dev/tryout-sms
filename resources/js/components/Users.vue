<template>
    <div class="container col-lg-12">
        <div class="row mt-5">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Users Table</h3>

                        <div class="card-tools">
                            <router-link to="/create-user" class="nav-link">
                                <button
                                    class="btn btn-success"
                                    data-toggle="modal"
                                    data-target="#addUser"
                                >
                                    Add User
                                    <i class="fas fa-user-plus fa-fw"></i>
                                </button>
                            </router-link>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Date Added</th>
                                <th>Action</th>
                            </tr>

                            <tbody v-if="users.length > 0">
                                <tr v-for="(user, key) in users" :key="key">
                                    <td>{{ user.id }}</td>
                                    <td>{{ user.name }}</td>
                                    <td>{{ user.email }}</td>
                                    <td>{{ user.created_at }}</td>

                                    <td>
                                        <a href="#">
                                            <router-link
                                                :to="{
                                                    name: 'viewUser',
                                                    params: { id: user.id },
                                                }"
                                                class="btn btn-xs btn-default"
                                            >
                                                <i
                                                    class="fa fa-eye text-success"
                                                ></i>
                                            </router-link>
                                        </a>

                                        <a href="#">
                                            <router-link
                                                :to="{
                                                    name: 'editUser',
                                                    params: { id: user.id },
                                                }"
                                                class="btn btn-xs btn-default"
                                            >
                                                <i
                                                    class="fa fa-pencil text-info"
                                                ></i>
                                            </router-link>
                                        </a>

                                        <a href="#">
                                            <i
                                                class="fa fa-trash text-danger"
                                                @click="deleteUser(user.id)"
                                            ></i>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.row -->
    </div>
</template>

<script>
export default {
    name: "users",
    data() {
        return {
            users: {},
        };
    },
    methods: {
        loadUsers() {
            axios.get("api/user").then(({ data }) => (this.users = data.data));
        },
        deleteUser(id) {
            if (confirm("Do you really want to delete?")) {
                axios
                    .delete("/api/user/" + id)
                    .then((response) => {
                        this.loadUsers();
                    })
                    .catch((error) => {
                        console.log(error);
                    });
            }
        },
    },
    mounted() {
        this.loadUsers();
    },
};
</script>
