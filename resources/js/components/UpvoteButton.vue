<template>
    <button class="btn btn-outline-primary btn-sm" 
        v-bind:class="{ active: voted }" 
        v-on:click="upvote" 
        v-tooltip:bottom="tooltipText">{{ votedCount }} Upvote</button>
</template>
<script>
export default {
    name: 'upvote-button',
    props: ['did-vote', 'type', 'id', 'voteCount'],
    data: function () {
        return {
          voted: this.didVote,
          objectType: this.type,
          objectId: this.id,
          votedCount: this.voteCount,
          tooltip: this.tooltipText
        }
    },
    methods: {
        upvote: function(){
            var ajax_url = '/upvote/' + this.objectType + '/' + this.objectId;
            axios.post(ajax_url)
            .then(response => {
                this.voted = !this.voted;
                console.log(response);
                if(response.data.action == 'added'){
                    this.votedCount = parseInt(this.votedCount) + 1;
                }else{
                    this.votedCount = parseInt(this.votedCount) - 1;
                }
            })

            .catch(function (error) {
                console.log(error);
            });
        },
        tooltipText: function() {
            if(this.voted == false){
                 return 'Add Vote'
            }else{
                 return 'Remove Vote'
            } 
         }
    }
}
</script>
