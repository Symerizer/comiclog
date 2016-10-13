<template>
    <div class="form">
        <div class="form-group">
            <span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
            <input class="form-control" placeholder="Enter any Marvel characters' name" v-model="query" @keydown.enter="getResults" id="query" name="query" type="text">
                <ul v-if="queryResults.length > 0">
                    <li v-for="result in queryResults">
                        {{ result }}
                    </li>
                </ul>
            <p v-else>No results</p>
        </div>
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
                if(this.query.length <= 2) {
                    this.queryResults = ["Search term must be more than 2 characters."]
                }
                else{
                    $.post('/api/search', {
                       input: this.query
                    }, function(results){
                        this.queryResults = results['data'];
                    }.bind(this));
                }
                /*this.$http.post('/api/search', ['the'], function(results){
                    console.log(results['data']);
                });*/
            }
        }
    }

</script>

<style scoped>
    ul{
        list-style: none;
        padding-left: 0;
    }
    .form{
        margin-top: 22px;
    }
    li{
        font-size: 1.5em;
    }



</style>