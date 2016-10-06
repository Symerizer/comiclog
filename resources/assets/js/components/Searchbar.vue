<template>
    <div class="input-group">
        <label for="query">Search</label>
        <input class="form-control" v-model="query" id="query" name="query" type="text">
        <p>{{ skill }}</p>
    </div>
</template>

<script>

    export default{
        data(){
            return{
                query: 100
            }
        },

        computed: {

            skill: function(){
                if(this.query <= 100){
                    return 'Beginner';
                }else{
                    return 'Advanced';
                }
            }
        }
    }

</script>