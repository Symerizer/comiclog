<template>
    <div class="form">
        <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-search fa-fw"></i></span>
                <input class="form-control" placeholder="Enter any Marvel characters' name" v-model="query" @keydown.enter="getResults" id="query" name="query" type="text">
            </div>
            <div class="results-grid">

                <div class="loading-animation" transition="fade" v-show="isLoading">
                    <i class="fa fa-spinner fa-pulse fa-fw"></i>
                    <span class="sr-only">Loading...</span>
                </div>

                <ul v-if="queryResults.length > 0">
                    <li v-for="result in queryResults">
                        {{ result }}
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>

    export default{
        data(){
            return{
                queryResults: "",
                query: "",
                isLoading: false
            }
        },

        methods: {
            getResults: function(){
                if(this.query.length <= 2) {
                    this.queryResults = ["Search term must be more than 2 characters."]
                }
                else{
                    this.isLoading = true;
                    $.post('/api/search', {
                       input: this.query
                    }, function(results){
                        if(results['data'] == ''){
                            this.queryResults = ['No results.'];
                        }else{
                            this.queryResults = results['data'];
                        }
                        this.isLoading = false;
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
    .loading-animation{
        position: absolute;
        right: 50%;
        bottom: 50%;
        font-size: 4.5em;
    }
    .results-grid{

    }
    .fade-transition {
        transition: all .3s ease;
    }

    .fade-enter, .fade-leave {
        opacity: 0;
    }

</style>