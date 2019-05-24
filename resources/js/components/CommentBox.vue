<template>
        <div class="create-comment" v-bind:class="{ show: uiSettings.displayAddCommentBox }">
            <div class="alert alert-danger" v-if="error">
                <div class="row">
                    <div class="col-md-12 text-center">
                        {{ error }}
                    </div>
                </div>
            </div>
            <form @submit="comment">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="content">Commenting as <strong>{{username}}</strong></label>
                        </div>
                    </div>
                    <div class="col-md-6 text-right">
                        <div class="toolbar">
                            <button type="submit" v-on:click.prevent="comment()" class="btn btn-primary btn-sm">Comment</button>
                            <button class="btn btn-secondary btn-sm" v-on:click.prevent="toggleShow()">Close</button>
                        </div>
                    </div>
                </div>  
                <div class="row">
                    <div class="col-md-12">
                        <summernote
                            name="editor"
                            :model="content"
                            v-on:change="value => { content = value }"
                            :config="config"
                            content="content"
                        />
                    </div>
                </div> 
            </form>
        
        </div>
</template>
<script>

import summernote from './Summernote';
import {mapGetters, mapActions } from 'vuex';

export default {
    name: "comment-box",
    props: ['username', 'itemid', 'type'],
    data(){
        return {
            show: true,
            error: '',
            content: '',
            config: {
                height: 200,
                toolbar: [
                    // [groupName, [list of button]]
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['font', ['strikethrough', 'superscript', 'subscript']],
                    //['fontsize', ['fontsize']],
                    //['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['insert', ['gxcode']], // plugin config: summernote-ext-codewrapper
                ],
            }
        }
    },
    computed: {
        ...mapGetters(["uiSettings"])
    },
    methods: {
        ...mapActions(['toggleDisplayCommentBox']),
        toggleShow(){
            this.toggleDisplayCommentBox();
        },
        comment: function(){
            var ajax_url = '/comment/' + this.type + '/' + this.itemid;
            var data = {
                content: this.content
            }
            axios.post(ajax_url, data)
            .then(response => {
                console.log(response);
                this.toggleDisplayCommentBox();
                
            })
            .catch(function (error) {
                console.log(error);
                error = error;
            });
        },
    },
    components: {
        summernote
    }
    
}
</script>
