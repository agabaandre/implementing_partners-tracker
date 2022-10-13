<!--  Extra Large modal example -->

<div class="modal fade" id="create-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myExtraLargeModalLabel"><?php echo $title; ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php echo form_open_multipart(base_url($action), array('id' => $label, 'class' => $label)); ?>

            <div class="modal-body">
                <input type="hidden" name="id" id="id" class="newform">
                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label class="form-label" for="name"><?php echo $label; ?></label>
                            <input type="text" placeholder="Enter <?php echo $label; ?>" class="form-control newform" id="name" name="<?php echo $field; ?>" required>
                        </div>
                    </div>

                    <!-- <div  class="col-md-4"> -->
                    <!-- </div> -->
                </div>

            </div>
            <div class="modal-footer">
                <button class="btn btn-danger" data-dismiss="modal" type="button">Cancel</button>
                <button class="btn btn-primary" type="submit">Save Record</button>
            </div>

            </form>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>