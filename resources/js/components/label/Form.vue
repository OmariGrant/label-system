<template>
    <form @submit.prevent="submit">
        <!--input csrf-->
        <input type="hidden" name="_token" :value="csrf">

        <div class="form-group">
            <label for="Name">Name</label>
            <input type="text" class="form-control" name="Name" id="Name" v-model="labelInput.Name" />
        </div>
        <div class="form-group">
            <label for="Slug">Slug</label>
            <input type="text" class="form-control" name="Slug" id="Slug"  v-model="labelInput.Slug" />
        </div>
        <div class="form-group">
            <label for="Path">Path</label>
            <input type="text" class="form-control" name="Path" id="Path"  v-model="labelInput.Path" />
        </div>
        <div class="form-group">
            <label for="text-colour">Text Colour</label>
            <input type="text" class="form-control" name="text-colour" id="text-colour"  v-model="labelInput.TextColour" />
        </div>
        <div class="form-group">
            <label for="BG-colour">Background Colour</label>
            <input type="text" class="form-control" name="BG-colour" id="BG-colour"  v-model="labelInput.BGColour" />
        </div>

        <button type="submit" class="btn btn-primary">Add Label</button>
    </form>
</template>

<script>
    export default {
        name: "Form",
        data() {
            return {
                labelInput: {},
                errors: {},
                //get csrf from blade view
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            }
        },
        methods: {
            submit() {
                this.errors = {};
                axios.post('/labels', this.labelInput).then(response => {
                    alert('Label added');
                    console.log(response);
                }).catch(error => {
                    if (error.response.status === 422) {
                        this.errors = error.response.data.errors || {};
                    }
                    console.log(this.errors);
                    if (this.errors.Path !== undefined)
                    {
                        console.log(this.errors.Path[0]);
                        alert(this.errors.Path[0] + 'Please try a new Path.');
                    }

                });
            },
        },
    }
</script>

<style scoped>

</style>