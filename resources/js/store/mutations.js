let mutations = {
    ADD_TODO(state, todo) {
        state.todos.unshift(todo)
    },
    toggleDisplayCommentBox(state) {
      state.uiSettings.displayAddCommentBox = !state.uiSettings.displayAddCommentBox;
    }
}
export default mutations