<template>
    <div>
        <!-- The Modal -->
        <div class="modal fade" id="myModal">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <form @submit.prevent="onUpdate">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Modal Heading</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            <div class="col-xs-12 form-group">
                                <label class="control-label">Title</label>
                                <input type="text" class="form-control" :value="product.title" @input="form.title = $event.target.value">
                            </div>
                            <div class="col-xs-12 form-group">
                                <label class="control-label">Description</label>
                                <input type="text" class="form-control" :value="product.description" @input="form.description = $event.target.value" >
                            </div>
                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button class="btn btn-success">Update</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {

        props: [
            'product'
        ],
        data() {
            return {

                form: new Form({
                    title: '',
                    description: ''
                })
            }
        },

        methods: {
            onUpdate(value) {

                this.form.patch('products/' + this.product.id)
                $('#myModal').modal('hide')
            }
        },


    }
</script>
