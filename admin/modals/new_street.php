<!-- add new_street modal -->
<div class="modal fade" id="new_street" tabindex="-1" role="dialog" aria-labelledby="#new_street" aria-hiden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h3 class="modal-title text-center" id="edit_vehacle">Register New Street</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-white">&times;</span>
                </button>
            </div>
            <form action="register_street_action.php" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" name="street_name" placeholder="Enter street name" class="form-control">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="new_street" class="btn btn-primary">Register Street</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>