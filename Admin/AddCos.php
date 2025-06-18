<?php
$title = 'Admin Panel - Add_Cosmetic Page';
include_once("header.php");
?>


<div class="container-fluid pt-4 px-1">
    <div class="form-con row justify-content-center align-items-center mx-0">
        <div class="col-lg-10 col-md-8 glass-box">
            <h3>ADD COSMETICS PRODUCT CARD</h3>
            <form action="CosmeticDB.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="CosTitle">Cosmetic Title</label>
                    <input type="text" name="CosTitle" id="CosTitle" class="form-control">
                </div>
                <div class="form-group">
                    <label for="CosDesc">Cosmetic Desc</label>
                    <textarea type="text" name="CosDesc" id="CosDesc" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label for="CosCategory">Cosmetic Category</label>
                    <input type="text" name="CosCategory" id="CosCategory" class="form-control">
                </div>
                <div class="form-group">
                    <label for="CosPrice">Cosmetic Price</label>
                    <input type="number" name="CosPrice" id="CosPrice" class="form-control">
                </div>
                <div class="form-group">
                    <label for="CosImage">Cosmetic Image</label>
                    <input type="file" name="CosImage" id="CosImage" class="form-control" accept="image/*" onchange="previewImage(event)">
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



<?php include_once("footer.php"); ?>