<template>
    <div class="input-group">
        <label for="query">Search</label>
        <input class="form-control" v-model="query" @keydown.enter="getResults" id="query" name="query" type="text">
            <ul>
                <li v-for="result in queryResults">
                    {{ result }}
                </li>
            </ul>
    </div>
</template>

<script>

    export default{
        data(){
            return{
                queryResults: "",
                query: ""
            }
        },

        methods: {
            getResults: function(){
                if(this.query.length >= 2){
                    $.post('/api/search', {
                       input: this.query
                    }, function(results){
                        this.queryResults = results;
                    }.bind(this));
                }
                /*this.$http.post('/api/search', function(results){
                    console.log(results);
                });*/
            }
        }
    }

</script>

<style>
    ul{
        list-style: none;
    }



</style>