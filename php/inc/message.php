<?php if (isset($_GET['message'])): ?>
    <div class="alert alert-success text-center">
        <?php echo $_GET['message']; ?>
    </div>
<?php endif; ?>