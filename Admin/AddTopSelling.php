<?php
$title = 'Admin Panel - Add_TopSelling Product';
include_once("header.php");
?>

<div class="container-fluid pt-4 px-1">
    <div class="form-con row justify-content-center align-items-center mx-0">
        <div class="col-lg-10 col-md-8 glass-box">
            <h3>ADD TOP SELLING PRODUCT CARD</h3>
            <form action="TopSellingDB.php" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
                <div class="form-group">
                    <label for="TopSellingTitle">Product Title</label>
                    <input type="text" name="TopSellingTitle" id="TopSellingTitle" class="form-control" required>
                    <div class="invalid-feedback">
                        Please enter a product title.
                    </div>
                </div>
                <div class="form-group">
                    <label for="TopSellingDesc">Product Description</label>
                    <textarea name="TopSellingDesc" id="TopSellingDesc" class="form-control" required></textarea>
                    <div class="invalid-feedback">
                        Please enter a product description.
                    </div>
                </div>
                <div class="form-group">
                    <label for="TopSellingCategory">Product Category</label>
                    <input type="text" name="TopSellingCategory" id="TopSellingCategory" class="form-control" required>
                    <div class="invalid-feedback">
                        Please enter a product category.
                    </div>
                </div>
                <div class="form-group">
                    <label for="TopSellingPrice">Product Price</label>
                    <input type="number" name="TopSellingPrice" id="TopSellingPrice" class="form-control" required>
                    <div class="invalid-feedback">
                        Please enter a product price.
                    </div>
                </div>
                <div class="form-group">
                    <label for="TopSellingTier">Product Tier</label>
                    <input type="text" name="TopSellingTier" id="TopSellingTier" class="form-control" required>
                    <div class="invalid-feedback">
                        Please enter a product tier.
                    </div>
                </div>
                <div class="form-group">
                    <label for="TopSellingQuantity">Product Quantity</label>
                    <input type="number" name="TopSellingQuantity" id="TopSellingQuantity" class="form-control" required>
                    <div class="invalid-feedback">
                        Please enter a product quantity.
                    </div>
                </div>
                <div class="form-group">
                    <label for="TopSellingImage">Product Image</label>
                    <input type="file" name="TopSellingImage" id="TopSellingImage" class="form-control" required accept="image/*" onchange="previewImage(event)">
                    <div class="invalid-feedback">
                        Please choose a product image.
                    </div>
                    <div id="imagePreviewContainer" class="image-preview mt-3" style="display: none;">
                        <img id="imagePreview" alt="Image Preview" style="max-width: 200px; max-height: 200px;">
                    </div>
                </div>
                <input type="submit" class="btn btn-primary" value="Save Top Selling Product">
            </form>

            <?php if (isset($_GET['successmsg'])): ?>
                <div id="flash-msg" class="mt-3 alert alert-success" role="alert">
                    <?= $_GET['successmsg']; ?>
                </div>
            <?php elseif (isset($_GET['errormsg'])): ?>
                <div class="mt-3 alert alert-danger" role="alert">
                    <?= $_GET['errormsg']; ?>
                </div>
            <?php endif ?>
        </div>
    </div>
</div>

<script>
    (function () {
        'use strict';
        window.addEventListener('load', function () {
            const forms = document.getElementsByClassName('needs-validation');
            Array.prototype.forEach.call(forms, function (form) {
                form.addEventListener('submit', function (event) {
                    if (!form.checkValidity()) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();

    setTimeout(function () {
        const flashMsg = document.getElementById('flash-msg');
        if (flashMsg) {
            flashMsg.style.transition = "opacity 0.5s ease";
            flashMsg.style.opacity = 0;
            setTimeout(() => flashMsg.remove(), 500);
        }
    }, 5000);

    function previewImage(event) {
        const preview = document.getElementById('imagePreview');
        const container = document.getElementById('imagePreviewContainer');
        preview.src = URL.createObjectURL(event.target.files[0]);
        container.style.display = 'block';
    }
</script>

<?php include_once("footer.php"); ?>
