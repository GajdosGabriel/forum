<template>
    <div class="container">
        <div class="col-md-8">
            <div class="panel panel-default">

                <div v-if="show" class="panel-heading"><textarea class="form-control" v-model="title">{{ title}}</textarea></div>
                <div v-else  class="panel-heading"><h2>{{ title }}</h2></div>

                <div v-if="show" class="panel-body">
                    <textarea class="form-control" v-model="body" required></textarea>
                </div>

                <div v-else class="panel-body" v-html="body">
                    {{ data.body }}
                </div>

                <div @click="show= true" v-show="!show" class="btn btn-link btn-xs">edit</div>
                <div @click="show= false" v-show="show" class="btn btn-link btn-xs">zrušiť</div>
                <div @click="update" v-show="show" class="btn btn-link btn-xs">uložiť</div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['data'],
        data: function() {
            return {
                show: false,
                body: this.data.body,
                title: this.data.title

            }
        },

        computed: {

        },

        methods: {
            update: function() {
                axios.patch('/threads/' + this.data.title, {
                    body: this.body,
                    title: this.title
                });

                this.show = false;

            }
        }
    }
</script>