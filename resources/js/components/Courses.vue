<template>
    <div class="container col-lg-12">
        <div class="row mt-5">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Courses Table</h3>

                        <div class="card-tools">
                            <router-link to="/create-course" class="nav-link">
                                <button
                                    class="btn btn-success"
                                    data-toggle="modal"
                                    data-target="#addUser"
                                >
                                    Add Course
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
                                <th>Title</th>
                                <th>Description</th>
                                <th>Created By</th>
                                <th>Date Added</th>
                                <th>Action</th>
                            </tr>

                            <tbody v-if="courses.length > 0">
                                <tr v-for="(course, key) in courses" :key="key">
                                    <td>{{ course.id }}</td>
                                    <td>{{ course.title }}</td>
                                    <td>{{ course.description }}</td>
                                    <td>{{ course.user.name }}</td>
                                    <td>{{ course.created_at }}</td>

                                    <td>
                                        <a href="#">
                                            <router-link
                                                :to="{
                                                    name: 'viewCourse',
                                                    params: { id: course.id },
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
                                                    name: 'editCourse',
                                                    params: { id: course.id },
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
                                                @click="deleteCourse(course.id)"
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
    name: "courses",
    data() {
        return {
            courses: {},
        };
    },
    methods: {
        loadCourses() {
            axios
                .get("api/course")
                .then(({ data }) => (this.courses = data.data));
        },
        deleteCourse(id) {
            if (confirm("Do you really want to delete?")) {
                axios
                    .delete("/api/course/" + id)
                    .then((response) => {
                        this.loadCourses();
                    })
                    .catch((error) => {
                        console.log(error);
                    });
            }
        },
    },
    mounted() {
        this.loadCourses();
    },
};
</script>
