<?php
$title = 'Admin Panel - Add_Jewellery Page';
include_once("header.php");

?>
<div class="container-fluid pt-4 px-1">
    <div class="form-con row justify-content-center align-items-center mx-0">
        <div class="col-lg-10 col-md-8 glass-box">
            <h3>ADD JEWELLERY PRODUCT CARD</h3>
            <form action="JewelleryDB.php" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
                <div class="form-group">
                    <label for="JewelleryTitle">Jewellery Title</label>
                    <input type="text" name="JewelleryTitle" id="JewelleryTitle" class="form-control" required>
                    <div class="invalid-feedback">
                        Please choose a Jewellery Title.
                    </div>
                </div>
                <div class="form-group">
                    <label for="JewelleryDesc">Jewellery Description</label>
                    <textarea type="text" name="JewelleryDesc" id="JewelleryDesc" class="form-control" required></textarea>
                    <div class="invalid-feedback">
                        Please choose a Jewellery Description.
                    </div>
                </div>
                <div class="form-group">
                    <label for="JewelleryCategory">Jewellery Category</label>
                    <input type="text" name="JewelleryCategory" id="JewelleryCategory" class="form-control" required>
                    <div class="invalid-feedback">
                        Please choose a Jewellery Category.
                    </div>
                </div>
                <div class="form-group">
                    <label for="JewelleryPrice">Jewellery Price</label>
                    <input type="number" name="JewelleryPrice" id="JewelleryPrice" class="form-control" required>
                    <div class="invalid-feedback">
                        Please choose a Jewellery Price.
                    </div>
                </div>
                <div class="form-group">
                    <label for="CosPrice">Jewellery Tier</label>
                    <input type="text" name="JewelleryTier" id="CosPrice" class="form-control" required>
                    <div class="invalid-feedback">
                        Please choose a Cosmetic Tier.
                    </div>
                </div>
                <div class="form-group">
                    <label for="CosPrice">Jewellery Quantity</label>
                    <input type="number" name="Quantity" id="CosPrice" class="form-control" required>
                    <div class="invalid-feedback">
                        Please choose a Cosmetic Quantity.
                    </div>
                </div>
                <div class="form-group">
                    <label for="JewelleryImage">Jewellery Image</label>
                    <input type="file" name="JewelleryImage" id="JewelleryImage" class="form-control" required accept="image/*" onchange="previewImage(event)">
                    <div class="invalid-feedback">
                        Please choose a Jewellery Image.
                    </div>
                    <div id="imagePreviewContainer" class="image-preview mt-3" style="display: none;">
                        <img id="imagePreview" alt="Image Preview">
                    </div>
                </div>

                <input type="submit" class="btn" value="Save Jewellery Card">
            </form>
            <?php if (isset($_GET['successmsg'])): ?>
                <div id="flash-msg" class=" mt-3 alert alert-success" role="alert">
                    <?php echo $_GET['successmsg']; ?>
                </div>
            <?php elseif (isset($_GET['errormsg'])): ?>
                <div id="flash-msg" class=" mt-3 alert alert-danger" role="alert">
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

    setTimeout(function() {
        const flashMsg = document.getElementById('flash-msg');
        if (flashMsg) {
            flashMsg.style.transition = "opacity 0.5s ease";
            flashMsg.style.opacity = 0;
            setTimeout(() => flashMsg.remove(), 500);
        }
    }, 5000);
</script>



<?php include_once("footer.php");
