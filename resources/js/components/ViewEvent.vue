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
                                    <h4>View Event Info</h4>
                                </div>
                                <div class="card-body">
                                    <form @submit.prevent="updateCourse">
                                        <div class="row">
                                            <div class="col-12 mb-2">
                                                <div class="form-group">
                                                    <input
                                                        readonly
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
                                                        readonly
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
                                                    <input
                                                        readonly
                                                        v-model="event.course"
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
                                                        readonly
                                                        v-model="
                                                            event.created_by
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
                                                    <input
                                                        readonly
                                                        v-model="
                                                            event.created_at
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
            event: {
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
        updateCourse() {
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
