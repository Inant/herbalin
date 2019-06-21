$(document).ready(function() {
  $('.selectTwo').select2();
  

  let base_url = 'http://localhost/herbalin/';

  $('#id_pasien').change(function () {
    $.ajax({
      type: "post",
      url: base_url + '/antrian/getDataPasien/'+$(this).val(),      
      dataType: "JSON",
      success: function (response) {
        $('#alamat').val(response[0].alamat);
        $('#tgl_lahir').val(response[0].tgl_lahir);
      }
    });
  });

  var rowTindakan = 0;
  $('#addTindakan').click(function () { 
    rowTindakan++;
    $('#tindakan').append(`
      <div class="col-10 mb-2" id="row`+rowTindakan+`">
        <select name="id_pelayanan[]" id="id_pelayanan`+rowTindakan+`" class="form-control selectDua">
          <option value="">--Pilih Tindakan--</option>
        </select>
      </div>
      <div class="col-1" id="btn`+rowTindakan+`">
        <button id="`+rowTindakan+`" type="button" class="btn btn-danger btn-sm removeTindakan" > &nbsp;<i class="fa fa-minus-circle"></i></button>
      </div>
    `);
    $.ajax({
      type: "POST",
      url: base_url + 'pemeriksaan/getPelayanan',
      dataType: "json",
      success: function (response) {
        $.each(response, function (index, value) { 
          // console.log(value.id_pelayanan + " " + value.nama);
          $('#id_pelayanan'+  rowTindakan).append(`
            <option value=`+value.id_pelayanan+`>`+value.nama+`</option>
          `);
        });
      }
    });

    $('.selectDua').select2();
  });

  $(document).on('click', '.removeTindakan', function () {
    var btn_id = $(this).attr('id');
    $('#row'+btn_id+'').remove();
    $('#btn'+btn_id+'').remove();
  });

  var rowDiagnosa = 0;
  $('#addDiagnosa').click(function () { 
    rowDiagnosa++;
    $('#diagnosa').append(`
      <div class="col-10 mb-2" id="diagnosaRow`+rowDiagnosa+`">
        <select name="id_diagnosa[]" id="id_diagnosa`+rowDiagnosa+`" class="form-control selectDua">
          <option value="">--Pilih Diagnosa--</option>
        </select>
      </div>
      <div class="col-1" id="diagnosaBtn`+rowDiagnosa+`">
        <button id="`+rowDiagnosa+`" type="button" class="btn btn-danger btn-sm removeDiagnosa" > &nbsp;<i class="fa fa-minus-circle"></i></button>
      </div>
    `);
    $.ajax({
      type: "POST",
      url: base_url + 'pemeriksaan/getDiagnosa',
      dataType: "json",
      success: function (response) {
        $.each(response, function (index, value) { 
          // console.log(value.id_diagnosa + " " + value.nama);
          $('#id_diagnosa'+  rowDiagnosa).append(`
            <option value=`+value.id_diagnosa+`>`+value.nama+`</option>
          `);
        });
      }
    });

    $('.selectDua').select2();
    
  });

  $(document).on('click', '.removeDiagnosa', function () {
    var btn_id = $(this).attr('id');
    $('#diagnosaRow'+btn_id+'').remove();
    $('#diagnosaBtn'+btn_id+'').remove();
  });

  var rowObat = 0;
  $('#addObat').click(function () { 
    // e.preventDefault();
    // console.log($('#obat').children());
    // var children=$('#rowObat').children();

    // children.each(function(idx, val){
      // $(this).css('left',idx*120+'px');
      // console.log($('#rowObat').children());
    // });
    rowObat++;
    $('#rowObat').append(`
      <div class="col-3 mb-3" id="obatRow`+rowObat+`">
        <label for="">Obat</label>
        <select name="id_obat[]" id="id_obat`+rowObat+`" class="form-control selectDua">
          <option value="">-- Pilih Obat --</option>
        </select>
      </div>
      <div class="col-3 mb-3" id="satuanRow`+rowObat+`">
        <label for="">Satuan</label>
        <input type="text" name="satuan[]" id="satuan`+rowObat+`" class="form-control" readonly>
      </div>
      <div class="col-2 mb-3" id="jumlahRow`+rowObat+`">
        <label for="">Jumlah</label>
        <input type="number" name="jumlah[]" id="jumlah`+rowObat+`" class="form-control">
      </div>
      <div class="col-3 mb-3" id="dosisRow`+rowObat+`">
        <label for="">Dosis</label>
        <div class="row">
          <div class="col-5">
            <input type="number" name="dosis1[]" id="dosis1`+rowObat+`" class="form-control">
          </div>
          X
          <div class="col-5">
            <input type="number" name="dosis2[]" id="dosis2`+rowObat+`" class="form-control">
          </div>
        </div>
      </div>
      <div class="col-1" id="obatBtn`+rowObat+`">
        <button id="`+rowObat+`" type="button" class="btn btn-danger btn-sm removeObat" style="margin-top:31px" > &nbsp;<i class="fa fa-minus-circle"></i></button>
      </div>
      `
    );
    $.ajax({
      type: "POST",
      url: base_url + 'pemeriksaan/getObat',
      dataType: "json",
      success: function (response) {
        $.each(response, function (index, value) { 
          // console.log(value.id_diagnosa + " " + value.nama);
          $('#id_obat'+  rowObat).append(`
            <option value=`+value.id_obat+`>`+value.nama+`</option>
          `);
        });
      }
    });

    $('#id_obat'+rowObat).change(function () {
      $.ajax({
        type: "POST",
        url: base_url+'pemeriksaan/getSatuanObat/'+$('#id_obat'+rowObat).val(),
        dataType: "json",
        success: function (response) {
          // console.log( response[0].satuan);
          $('#satuan'+rowObat).val(response[0].satuan);
        }
      });
    });

    $('.selectDua').select2();
  });

  $(document).on('click', '.removeObat', function () {
    var btn_id = $(this).attr('id');
    $('#obatRow'+btn_id+'').remove();
    $('#satuanRow'+btn_id+'').remove();
    $('#jumlahRow'+btn_id+'').remove();
    $('#dosisRow'+btn_id+'').remove();
    $('#obatBtn'+btn_id+'').remove();
  });

  var stockObat = 0;
  $('#id_obat').change(function () {
    $.ajax({
      type: "POST",
      url: base_url+'pemeriksaan/getSatuanObat/'+$('#id_obat').val(),
      dataType: "json",
      success: function (response) {
        // console.log( response[0].satuan);
        $('#satuan').val(response[0].satuan);
        stockObat = parseInt(response[0].stock, 10);
        console.log(stockObat);
      }
    });
  });

  // function cekStock(el) {
  //   alert('Jumlah obat melebihi sisa stock obat.')
  //   el.preventDefault();
  // }
  $(document).on("submit", "form", function(e){
    var jumlah = parseInt($('#jumlah').val(), 10);
    if (jumlah > stockObat) {
      alert('Jumlah obat melebihi sisa stock obat.')
      e.preventDefault();
    }else{
      $(e).unbind('submit');
    }
  });
});