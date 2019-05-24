<template>
    <textarea name="editor"
    :model="content"
    v-on:change="value => { content = value }"></textarea>
</template>
<script>
export default {
    name: 'summernote',
    props: ['name', 'config', 'content'],
    mounted(){
        let vm = this;
        let config = this.config;

        config.callbacks = {
            onInit: function () {
                $(vm.$el).summernote("code", vm.model);
            },
            onChange: function () {
                vm.$emit('change', $(vm.$el).summernote('code'));
            },
            onBlur: function () {
                vm.$emit('change', $(vm.$el).summernote('code'));
            }
        };
        $(this.$el).summernote(config);
    }
}
</script>
