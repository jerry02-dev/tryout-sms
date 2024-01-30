<template>
    <div class="container">
        <template>
            <div class="row">
                <div class="col-12">
                    <div class="col-12 mt-3">
                        <router-link to="/events" class="">
                            <button type="submit" class="btn btn-primary">
                                Back
                            </button>
                        </router-link>
                    </div>
                    <div class="card mt-3">
                        <div class="card-header">
                            <h4>Add New Event</h4>
                        </div>
                        <div class="card-body">
                            <form @submit.prevent="createEvent">
                                <div class="row">
                                    <input
                                        v-model="form.user_id"
                                        hidden
                                        type="text"
                                        name="title"
                                        class="form-control"
                                        placeholder=""
                                    />
                                    <div class="col-12 mb-2">
                                        <div class="form-group">
                                            <label
                                                for="password"
                                                class="col-form-label"
                                                >Title</label
                                            >
                                            <input
                                                v-model="form.name"
                                                type="text"
                                                name="name"
                                                class="form-control"
                                                placeholder=""
                                                :class="{
                                                    'is-invalid':
                                                        form.errors.has('name'),
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="name"
                                            ></has-error>
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
                                                v-model="form.description"
                                                type="text"
                                                name="description"
                                                class="form-control"
                                                placeholder="Description"
                                                :class="{
                                                    'is-invalid':
                                                        form.errors.has(
                                                            'description'
                                                        ),
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="description"
                                            ></has-error>
                                        </div>
                                    </div>

                                    <div class="col-12 mb-2">
                                        <div class="form-group">
                                            <label
                                                for="password"
                                                class="col-form-label"
                                                >Course</label
                                            >
                                            <select
                                                v-model="form.course"
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
                                            ></has-error>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <button
                                            type="submit"
                                            class="btn btn-success"
                                        >
                                            Create Event
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
            courses: "",
            loggedUser: document
                .querySelector("meta[name='user']")
                .getAttribute("content"),
            form: new Form({
                name: "",
                description: "",
                course: "",
                user_id: document
                    .querySelector("meta[name='user']")
                    .getAttribute("content"),
            }),
        };
    },
    methods: {
        createEvent() {
            this.form
                .post("api/event")
                .then(() => {
                    alert("Successfully Added");
                    this.$router.replace("/events");
                    this.$Progress.finish();
                })
                .catch(() => {});
        },
    },
    mounted() {
        console.log("Component mounted.");
        console.log(this.loggedUser);

        axios
            .get("api/list")
            .then((response) => {
                this.courses = response.data;

                console.log(response.data);
            })
            .catch((error) => {
                console.log(error);
                this.errored = true;
            })
            .finally(() => (this.loading = false));
    },
};
</script>
