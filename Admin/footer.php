<div class="container-fluid pt-4 px-4">
    <div class="bg-secondary rounded-top p-4">
        <div class="row">
            <div class="col-12 col-sm-6 text-center text-sm-start">
                &copy; <a href="#">Glamouraé Luxe</a>, All Right Reserved.
            </div>
            <div class="col-12 col-sm-6 text-center text-sm-end">
                Designed By <a href="https://htmlcodex.com">Jenny's & Maria</a>
                <br>Distributed By: <a href="https://themewagon.com" target="_blank">Glamouraé Luxe</a>
            </div>
        </div>
    </div>
</div>
</div>
<a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
</div>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="js/main.js"></script>
<script src="./assets/lib/chart/chart.min.js"></script>
<script src="./assets/lib/easing/easing.min.js"></script>
<script src="./assets/lib/waypoints/waypoints.min.js"></script>
<script src="./assets/lib/owlcarousel/owl.carousel.min.js"></script>
<script src="./assets/lib/tempusdominus/js/moment.min.js"></script>
<script src="./assets/lib/tempusdominus/js/moment-timezone.min.js"></script>
<script src="./assets/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>
<script src="https://cdn.datatables.net/2.3.2/js/dataTables.js"></script>


<!-- Template Javascript -->
<script src="./assets/js/main.js"></script>
<script>
    function previewImage(event) {
        const input = event.target;
        const previewContainer = document.getElementById('imagePreviewContainer');
        const previewImage = document.getElementById('imagePreview');

        if (input.files && input.files[0]) {
            const reader = new FileReader();

            reader.onload = function(e) {
                previewImage.src = e.target.result;
                previewContainer.style.display = 'block';
            };

            reader.readAsDataURL(input.files[0]);
        }
    }


    $(document).ready( function () {
    $('#myTable').DataTable();
} );

</script>

</body>

</html>