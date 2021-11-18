<template>
    <div>
        <div>
            <button type="button" class="btn btn-info" @click="addNew">
                Add
                <span class="glyphicon glyphicon-plus"></span>
            </button>
        </div>

        <div v-for="(input, index) in inputs" v-bind:key="index">
            <div class="form-group">
                <label>Enter Co Author Name</label>
                <input
                    type="text"
                    name="author_name[]"
                    placeholder="Author Name"
                    class="form-control"
                    v-model="input.text"
                />
            </div>
        </div>

        <div>
            <button type="button" class="btn btn-danger" @click="removeNew">
                Remove
                <span class="glyphicon glyphicon-remove"></span>
            </button>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            inputs: []
        };
    },
    methods: {
        addNew() {
            this.inputs.push({ text: "" });
        },
        removeNew(index) {
            this.inputs.splice(index, 1);
        }
    }
};
</script>
