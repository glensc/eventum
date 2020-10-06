<template>
    <div class="container">
        <markdown-editor :options="options"></markdown-editor>
    </div>
</template>

<script>
import Vue from 'vue';
import Editor from 'v-markdown-editor'

Vue.use(Editor);

export default {
    data() {
        return {
            // default options, see more options at: https://codemirror.net/doc/manual.html#config
            options: {
                // lineNumbers: true,
                // styleActiveLine: true,
                // styleSelectedText: true,
                // lineWrapping: true,
                // indentWithTabs: true,
                // tabSize: 2,
                // indentUnit: 2
            }
        }
    }
}
</script>
