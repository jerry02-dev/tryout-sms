<template>
    <div class="container">
        <template>
            <div class="row">
                <div class="col-12">
                    <div class="col-12 mt-3">
                        <router-link to="/courses" class="">
                            <button type="submit" class="btn btn-primary">
                                Back
                            </button>
                        </router-link>
                    </div>
                    <div class="card mt-3">
                        <div class="card-header">
                            <h4>Edit Course Info</h4>
                        </div>
                        <div class="card-body">
                            <form @submit.prevent="updateCourse">
                                <div class="row">
                                    <div class="col-12 mb-2">
                                        <div class="form-group">
                                            <input
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
                                            <input
                                                v-model="course.description"
                                                type="text"
                                                name="email"
                                                class="form-control"
                                                placeholder=""
                                            />
                                        </div>
                                    </div>

                                    <!-- <div class="col-12 mb-2">
                                        <div class="form-group">
                                            <input
                                                v-model="course.created_by"
                                                type="text"
                                                name="email"
                                                class="form-control"
                                                placeholder=""
                                            />
                                        </div>
                                    </div>

                                    <div class="col-12 mb-2">
                                        <div class="form-group">
                                            <input
                                                v-model="course.created_at"
                                                type="text"
                                                name="email"
                                                class="form-control"
                                                placeholder=""
                                            />
                                        </div>
                                    </div> -->

                                    <div class="col-12">
                                        <button
                                            type="submit"
                                            class="btn btn-success"
                                        >
                                            Save Changes
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </template>
    </div>
</template>
<script>
export default {
    data() {
        return {
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
                    const { title, description, created_by, created_at } =
                        response.data;
                    this.course.title = title;
                    this.course.description = description;
                    this.course.created_by = created_by;
                    this.course.created_at = created_at;
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
