<template>
    <div class="card">
        <div class="card-header">
            Add Products...
        </div>
        <div class="card-body">
            <form @submit.prevent="onSubmit">
                <input type="text" class="form-control" v-model="form.title"><br>
                <textarea class="form-control" rows="4" v-model="form.description"></textarea><br>
                <button class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                form: new Form({
                    title: '',
                    description: ''
                })
            }
        },

        methods: {
            onSubmit() {
                this.form
                    .post('products')
                    .then(status => this.$emit('completed', status))
                    // .then( (status) => {
	                //     console.log(status)
                    // })
            }
        }
    }
</script>
