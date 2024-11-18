<?php
function showAlert($type, $title, $message) {
    echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
    echo "<script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: '$type',
                title: '$title',
                text: '$message'
            });
        });
    </script>";
}
?>
