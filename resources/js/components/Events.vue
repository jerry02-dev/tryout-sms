<template>
    <div class="container col-lg-12">
        <div class="row mt-5">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Events Table</h3>

                        <div class="card-tools">
                            <router-link to="/create-event" class="nav-link">
                                <button
                                    class="btn btn-success"
                                    data-toggle="modal"
                                    data-target="#addUser"
                                >
                                    Add Event
                                    <i class="fas fa-plus fa-fw"></i>
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
                                <th>Description</th>
                                <th>Course</th>
                                <th>Created By</th>
                                <th>Date Added</th>
                                <th>Action</th>
                            </tr>

                            <tbody v-if="events.length > 0">
                                <tr v-for="(event, key) in events" :key="key">
                                    <td>{{ event.id }}</td>
                                    <td>{{ event.name }}</td>
                                    <td>{{ event.description }}</td>
                                    <td>{{ event.course.title }}</td>
                                    <td>{{ event.user.name }}</td>
                                    <td>{{ event.created_at }}</td>

                                    <td>
                                        <a href="#">
                                            <router-link
                                                :to="{
                                                    name: 'viewEvent',
                                                    params: { id: event.id },
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
                                                    name: 'editEvent',
                                                    params: { id: event.id },
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
                                                @click="deleteEvent(event.id)"
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
    name: "events",
    data() {
        return {
            events: {},
        };
    },
    methods: {
        loadEvents() {
            axios
                .get("api/event")
                .then(({ data }) => (this.events = data.data));
        },
        deleteEvent(id) {
            if (confirm("Do you really want to delete?")) {
                axios
                    .delete("/api/event/" + id)
                    .then((response) => {
                        this.loadEvents();
                    })
                    .catch((error) => {
                        console.log(error);
                    });
            }
        },
    },
    mounted() {
        this.loadEvents();
    },
};
</script>
