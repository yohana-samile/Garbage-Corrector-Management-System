<?php if(isset($_SESSION['success'])): ?>
        <div class="alert alert-success">
            <strong>Successful</strong> : <?php echo htmlentities( $_SESSION['success']); ?>
        </div>
<?php endif; unset($_SESSION['success']) ?>

<?php if(isset($_SESSION['fail'])): ?>
    <div class="alert alert-danger">
        <strong>failed</strong> : <?php echo htmlentities($_SESSION['fail']); ?>
    </div>
<?php endif; unset($_SESSION['fail']) ?>

<?php if(isset($_SESSION['warning'])): ?>
    <div class="alert alert-warning">
        <strong>Warning</strong> : <?php echo htmlentities($_SESSION['warning']); ?>
    </div>
<?php endif; unset($_SESSION['warning']) ?>