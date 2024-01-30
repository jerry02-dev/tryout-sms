<template>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="col-12 mt-3">
                    <router-link to="/events" class="">
                        <button type="submit" class="btn btn-primary">
                            Back
                        </button>
                    </router-link>
                </div>

                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card mt-3">
                                <div class="card-header">
                                    <h4>Edit Event Info</h4>
                                </div>
                                <div class="card-body">
                                    <form @submit.prevent="updateEvent">
                                        <div class="row">
                                            <div class="col-12 mb-2">
                                                <div class="form-group">
                                                    <input
                                                        v-model="event.name"
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
                                                        v-model="
                                                            event.description
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
                                                    <!-- <select
                                                        v-model="event.course"
                                                        class="form-control"
                                                    >
                                                        <option
                                                            value=""
                                                            disabled
                                                            selected
                                                        >
                                                            Please select course
                                                        </option>
                                                        <option
                                                            v-for="course in courses"
                                                            v-bind:value="{
                                                                id: course.id,
                                                                text: course.title,
                                                            }"
                                                        >
                                                            {{ course.title }}
                                                        </option>
                                                    </select>
                                                    <has-error
                                                        :form="form"
                                                        field="course"
                                                    ></has-error> -->
                                                </div>
                                            </div>

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
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            courses: "",
            event: {
                title: "",
                description: "",
                course: "",
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
                .get(`/api/event/${this.$route.params.id}`)
                .then((response) => {
                    const {
                        name,
                        description,
                        course,
                        created_by,
                        created_at,
                    } = response.data;
                    this.event.name = name;
                    this.event.description = description;
                    this.event.course = course;
                    this.event.created_by = created_by;
                    this.event.created_at = created_at;
                })
                .catch(() => {
                    this.$Progress.fail();
                });
        },
        updateEvent() {
            axios
                .post(`/api/event/${this.$route.params.id}`, this.event)
                .then((response) => {
                    alert("Successfully Updated");
                    this.$router.replace("/events");
                })
                .catch((error) => {
                    console.log(error);
                });
        },
    },
};
</script>
