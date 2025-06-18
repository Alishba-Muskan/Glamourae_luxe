<?php
$title = 'Admin Panel - Add_Jewellery Page';
include_once("header.php");

?>
<div class="container-fluid pt-4 px-1">
    <div class="form-con row justify-content-center align-items-center mx-0">
        <div class="col-lg-10 col-md-8 glass-box">
            <h3>ADD JEWELLERY PRODUCT CARD</h3>
            <form action="JewelleryDB.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="JewelleryTitle">Jewellery Title</label>
                    <input type="text" name="JewelleryTitle" id="JewelleryTitle" class="form-control">
                </div>
                <div class="form-group">
                    <label for="JewelleryDesc">Jewellery Desc</label>
                    <textarea type="text" name="JewelleryDesc" id="JewelleryDesc" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label for="JewelleryCategory">Jewellery Category</label>
                    <input type="text" name="JewelleryCategory" id="JewelleryCategory" class="form-control">
                </div>
                <div class="form-group">
                    <label for="JewelleryPrice">Jewellery Price</label>
                    <input type="number" name="JewelleryPrice" id="JewelleryPrice" class="form-control">
                </div>
                <div class="form-group">
                    <label for="JewelleryImage">Jewellery Image</label>
                    <input type="file" name="JewelleryImage" id="JewelleryImage" class="form-control" accept="image/*" onchange="previewImage(event)">
                    <div id="imagePreviewContainer" class="image-preview mt-3" style="display: none;">
                        <img id="imagePreview" alt="Image Preview">
                    </div>
                </div>

                <input type="submit" class="btn" value="Save Jewellery Card">
            </form>
        </div>
    </div>
</div>



<?php include_once("footer.php");