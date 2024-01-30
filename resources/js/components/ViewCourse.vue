<template>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="col-12 mt-3">
                    <router-link to="/courses" class="">
                        <button type="submit" class="btn btn-primary">
                            Back
                        </button>
                    </router-link>
                </div>

                <div class="container">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="card mt-3">
                                <div class="card-header">
                                    <h4>View Course Info</h4>
                                </div>
                                <div class="card-body">
                                    <form @submit.prevent="updateCourse">
                                        <div class="row">
                                            <div class="col-12 mb-2">
                                                <div class="form-group">
                                                    <label
                                                        for="password"
                                                        class="col-form-label"
                                                        >Title</label
                                                    >
                                                    <input
                                                        readonly
                                                        v-model="course.title"
                                                        type="text"
                                                        name="name"
                                                        class="form-control"
                                                        placeholder=""
                                                    />
                                                </div>
                                            </div>

                                            <div class="col-12 mb-2">
                                                <div class="form-group">
                                                    <label
                                                        for="password"
                                                        class="col-form-label"
                                                        >Description</label
                                                    >
                                                    <input
                                                        readonly
                                                        v-model="
                                                            course.description
                                                        "
                                                        type="text"
                                                        name="email"
                                                        class="form-control"
                                                        placeholder=""
                                                    />
                                                </div>
                                            </div>

                                            <div class="col-12 mb-2">
                                                <div class="form-group">
                                                    <label
                                                        for="password"
                                                        class="col-form-label"
                                                        >Created by</label
                                                    >
                                                    <input
                                                        readonly
                                                        v-model="
                                                            course.created_by
                                                        "
                                                        type="text"
                                                        name="email"
                                                        class="form-control"
                                                        placeholder=""
                                                    />
                                                </div>
                                            </div>

                                            <div class="col-12 mb-2">
                                                <div class="form-group">
                                                    <label
                                                        for="password"
                                                        class="col-form-label"
                                                        >Date Created</label
                                                    >
                                                    <input
                                                        readonly
                                                        v-model="
                                                            course.created_at
                                                        "
                                                        type="text"
                                                        name="email"
                                                        class="form-control"
                                                        placeholder=""
                                                    />
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="card mt-3">
                                <div class="card-header">
                                    <h4>Course's Events</h4>
                                </div>
                                <div class="card-body">
                                    <table class="table table-hover">
                                        <tr style="background-color: #d3d3d3">
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Date Added</th>
                                        </tr>
                                        <tbody v-if="events.length > 0">
                                            <tr
                                                v-for="(event, key) in events"
                                                :key="key"
                                            >
                                                <td>{{ event.id }}</td>
                                                <td>{{ event.name }}</td>
                                                <td>{{ event.description }}</td>
                                                <td>{{ event.created_at }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div
                                        class="col-lg-12 text-center text-danger mt-3"
                                        v-if="events.length == 0"
                                    >
                                        No Data
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            events: "",
            course: {
                title: "",
                description: "",
                _method: "patch",
            },
        };
    },
    mounted() {
        this.showCourse();
    },
    methods: {
        showCourse() {
            axios
                .get(`/api/course/${this.$route.params.id}`)
                .then((response) => {
                    const {
                        title,
                        description,
                        created_by,
                        created_at,
                        events,
                    } = response.data;
                    this.course.title = title;
                    this.course.description = description;
                    this.course.created_by = created_by;
                    this.course.created_at = created_at;
                    this.events = events;
                })
                .catch(() => {
                    this.$Progress.fail();
                });
        },
        updateCourse() {
            axios
                .post(`/api/course/${this.$route.params.id}`, this.course)
                .then((response) => {
                    alert("Successfully Updated");
                    this.$router.replace("/courses");
                })
                .catch((error) => {
                    console.log(error);
                });
        },
    },
};
</script>
