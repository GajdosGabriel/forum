<template>
    <div class="col-md-8">
        <div class="panel panel-default">
            <div class="panel-heading"><h4>Nový komentár</h4></div>
            <div class="panel-body">
                <div class="form-group">
                    <textarea v-model="body" rows="5" required placeholder="Pridať komentár" class="form-control"></textarea>
                </div>

                <div class="form-group">
                    <button @click="addReply" class="btn btn-primary" type="submit">Uložiť</button>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        props: ['endpoint'],
        data: function() {
            return {
                body: ''


            }
        },

        methods: {
            addReply: function() {
              axios.post(this.endpoint, { body: this.body })
                .then(({data}) => {
                    this.body = '';
                            this.$emit('created', data);
                        });
                    }
        }
    }
</script>

<style>
    .fade-enter-active, .fade-leave-active {
        transition: opacity .5s
    }
    .fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
        opacity: 0
    }
</style>