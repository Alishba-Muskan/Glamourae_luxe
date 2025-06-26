<?php
$title = 'Admin Panel - Add_Cosmetic Page';
include_once("header.php");


?>


<div class="container-fluid pt-4 px-1">
    <div class="form-con row justify-content-center align-items-center mx-0">
        <div class="col-lg-10 col-md-8 glass-box">
            <h3>ADD COSMETICS PRODUCT CARD</h3>
            <form action="CosmeticDB.php" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
                <div class="form-group">
                    <label for="CosTitle">Cosmetic Title</label>
                    <input type="text" name="CosTitle" id="CosTitle" class="form-control" required>
                    <div class="invalid-feedback">
                        Please choose a Cosmetic Title.
                    </div>
                </div>
                <div class="form-group">
                    <label for="CosDesc">Cosmetic Descrition</label>
                    <textarea type="text" name="CosDesc" id="CosDesc" class="form-control" required></textarea>
                    <div class="invalid-feedback">
                        Please choose a Cosmetic Description.
                    </div>
                </div>
                <div class="form-group">
                    <label for="CosCategory">Cosmetic Category</label>
                    <input type="text" name="CosCategory" id="CosCategory" class="form-control" required>
                    <div class="invalid-feedback">
                        Please choose a Cosmetic Category.
                    </div>
                </div>
                <div class="form-group">
                    <label for="CosPrice">Cosmetic Price</label>
                    <input type="number" name="CosPrice" id="CosPrice" class="form-control" required>
                    <div class="invalid-feedback">
                        Please choose a Cosmetic Price.
                    </div>
                </div>
                 <div class="form-group">
                    <label for="CosPrice">Cosmetic Tier</label>
                    <input type="number" name="CosTier" id="CosPrice" class="form-control" required>
                    <div class="invalid-feedback">
                        Please choose a Cosmetic Tier.
                    </div>
                </div>
                <div class="form-group">
                    <label for="CosImage">Cosmetic Image</label>
                    <input type="file" name="CosImage" id="CosImage" class="form-control" required accept="image/*" onchange="previewImage(event)">
                    <div class="invalid-feedback">
                        Please choose a Cosmetic Image.
                    </div>
                    <div id="imagePreviewContainer" class="image-preview mt-3" style="display: none;">
                        <img id="imagePreview" alt="Image Preview">
                    </div>
                </div>
                <input type="submit" class="btn" value="Save Cosmetic Card">
            </form>
            <?php if (isset($_GET['successmsg'])): ?>
                <div class=" mt-3 alert alert-success" role="alert">
                    <?php echo $_GET['successmsg']; ?>
                </div>
            <?php elseif (isset($_GET['errormsg'])): ?>
                <div class=" mt-3 alert alert-danger" role="alert">
                    <?php echo $_GET['errormsg']; ?>
                </div>
            <?php endif ?>
        </div>
    </div>
</div>

<script>
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            var forms = document.getElementsByClassName('needs-validation');
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
</script>

<?php include_once("footer.php"); ?>