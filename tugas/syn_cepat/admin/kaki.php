<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
  window.jQuery || document.write('<script src="../js/jquery.slim.min.js"><\/script>')
</script>
<script src="../js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
<script src="../js/dashboard.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

<script>
  $(document).ready(function() {
    $('#myTable').DataTable();
  });

  function ambilHarga() {
    var idLayanan = $("#pilihLayanan").val();
    $.ajax({
      type: 'GET',
      url: 'view/add/ambil-harga.php',
      data: 'id=' + idLayanan,
      success: function(html) {
        $("#hargaTotal").val(html)
        $("#text").attr('disabled', 'true')
      }
    })
  }
</script>

<script>
  $(document).ready(function() {
    var readURL = function(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
          $('.avatar').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
      }
    }
    $(".file-upload").on('change', function() {
      readURL(this);
    });
  });
</script>