$(document).ready(function() {
  $('.selectTwo').select2();
  let base_url = 'http://localhost/herbalin';
  $('#id_pasien').change(function () {
    $.ajax({
      type: "post",
      url: base_url + '/antrian/getDataPasien/'+$(this).val(),      
      dataType: "JSON",
      success: function (response) {
        $('#alamat').val(response[0].alamat);
        $('#tgl_lahir').val(response[0].tgl_lahir);
        // console.log(response);
      }
    });
  });
});