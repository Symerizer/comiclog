<template>
    <div class="input-group">
        <label for="query">Search</label>
        <input class="form-control" v-model="query" id="query" name="query" type="text">
        <p></p>
    </div>
</template>

<script>

    export default{
        data(){
            return{
                query: []
            }
        },

        computed: {


        },

        created: function(){
            this.getResults();
        },

        methods: {
            getResults: function(){
                $.post('/api/search', function(results){
                    console.log(results);
                });
                this.$http.post('/api/search', function(results){
                    console.log(results);
                });
            }
        }
    }

</script>