<template>
<div class="container-fluid mt--6">
    <div class="row">
        <div class="col-lg-5">
            <div class="card-wrapper">
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header">
                        <h3 class="mb-0">Create New Event</h3>
                    </div>
                    <!-- Card body -->
                    <div class="card-body">
                        <form @submit.prevent="createEvent" autocomplete="false">
                            <div class="form-group ">
                                <label class="form-control-label" for="name">Name</label>
                                <input type="text" class="form-control" id="name" placeholder="Gym workout session - Getting Pumped Up!" v-model="event.name" required />
                                <div class="text-warning" v-for="error in errors.name" v-show="errors.name">
                                    {{error}}
                                </div>
                            </div>
                            <div class="row align-items-center">
                                <div class="col">
                                    <div class="form-group">
                                        <label class="form-control-label">Start date</label>
                                        <DatePicker class="datepicker" name="started_at" v-model="event.started_at" :config="dateOptions" required></DatePicker>
                                        <div class="text-warning" v-for="error in errors.started_at" v-show="errors.started_at">
                                            {{error}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label class="form-control-label">End date</label>
                                        <DatePicker class="datepicker" name="ended_at" v-model="event.ended_at" :config="dateOptions" required></DatePicker>
                                        <div class="text-warning" v-for="error in errors.ended_at" v-show="errors.ended_at">{{errors.ended_at}}
                                            {{error}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="custom-control custom-checkbox mb-3">
                                        <input class="custom-control-input" id="day-sun" value="sunday" type="checkbox" v-model="event.days" />
                                        <label class="custom-control-label" for="day-sun">Sunday</label>
                                    </div>
                                    <div class="custom-control custom-checkbox mb-3">
                                        <input class="custom-control-input" id="day-thu" value="thursday" type="checkbox" v-model="event.days" />
                                        <label class="custom-control-label" for="day-thu">Thursday</label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="custom-control custom-checkbox mb-3">
                                        <input class="custom-control-input" id="day-mon" value="monday" type="checkbox" v-model="event.days" />
                                        <label class="custom-control-label" for="day-mon">Monday</label>
                                    </div>
                                    <div class="custom-control custom-checkbox mb-3">
                                        <input class="custom-control-input" id="day-fri" value="friday" type="checkbox" v-model="event.days" />
                                        <label class="custom-control-label" for="day-fri">Friday</label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="custom-control custom-checkbox mb-3">
                                        <input class="custom-control-input" id="day-tue" value="tuesday" type="checkbox" v-model="event.days" />
                                        <label class="custom-control-label" for="day-tue">Tuesday</label>
                                    </div>
                                    <div class="custom-control custom-checkbox mb-3">
                                        <input class="custom-control-input" id="day-sat" value="saturday" type="checkbox" v-model="event.days" />
                                        <label class="custom-control-label" for="day-sat">Saturday</label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="custom-control custom-checkbox mb-3">
                                        <input class="custom-control-input" id="day-wed" value="wednesday" type="checkbox" v-model="event.days" />
                                        <label class="custom-control-label" for="day-wed">Wednesday</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col text-center">
                                    <button class="btn btn-outline-success" data-toggle="sweet-alert-success" data-sweet-alert="success">
                                        Submit
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-7">
            <Calendar></Calendar>
        </div>
    </div>
</div>
</template>

<script>
import {
    mapGetters
} from 'vuex'

export default {
    name: "Events",
    data() {
        return {
            dateOptions: {
                format: "MM/DD/YYYY"
            },
            errors: {}
        }
    },
    mounted() {
        this.$store.dispatch("latestEventFromDatabase")
    },
    computed: {
        ...mapGetters(['getEvent']),

        event() {
            if (Object.keys(this.$store.state.event).length === 0) {
                return {
                    name: "",
                    stared_at: "",
                    ended_at: "",
                    days: [],
                }
            }

            return this.$store.state.event
        }
    },
    methods: {
        createEvent() {
            this.$store.dispatch("createNewEvent", this.event).then((response) => {
                this.$swal('Success', 'Event has been added!', 'success', 'OK')
                this.errors = {}
            }, (error) => {
                this.errors = error.response.data
                this.$swal('Error', 'Please check errors!', 'error', 'OK')
            })

        }
    }
};
</script>
