<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-6">
                <form>
                    <div class="form-group row border-bottom">
                        <div class="col-sm-3">ID</div>
                        <div class="col-sm-9" id="id">{{ task.id }}</div>
                    </div>
                    <div class="form-group row border-bottom">
                        <div class="col-sm-3">Title</div>
                        <div class="col-sm-9" id="title">{{ task.title }}</div>
                    </div>
                    <div class="form-group row border-bottom">
                        <div class="col-sm-3">Content</div>
                        <div class="col-sm-9" id="content"><span v-html="task.content"></span></div>
                    </div>
                    <div class="form-group row border-bottom">
                        <div class="col-sm-3">Person In Charge</div>
                        <div class="col-sm-9" id="person-in-charge">{{ task.person_in_charge }}</div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            taskId: String
        },
        data: function () {
            return {
                task: {}
            }
        },
        methods: {
            getTask() {
                axios.get('/api/tasks/' + this.taskId)
                    .then((res) => {
                        this.task = res.data;
                    });
            }
        },
        mounted() {
            this.getTask();
        }
    }
</script>
