body.on('click', '#addMaterial', function (e) {
    e.preventDefault();
    var id = guid();
    var coppiedTR = $('#master').html();
    var tBody = $('#detailFormula');

    tBody.append('<tr id="' + id + '">' + coppiedTR + '</tr>');

    var thisRow = $('#' + id + '');
    var Option = thisRow.find('#materialList').attr('data-select2-id', 'materialList' + id);
    var select2 = {
        "allowClear": true,
        "theme": "default",
        "width": "100%",
        "placeholder": "Pilih Satuan",
        "language": "en-US"
    };

    thisRow.find('span.select2').remove();
    thisRow.find('input').val('');
    var a = 0;
	console.log('sdd');
    thisRow.find('.materialharga-disp').inputmask(ArrRp);
    thisRow.find('.materialAmmount-disp').inputmask(ArrNumber);
    thisRow.find('option').each(function () {
        $(this).removeAttr('selected');
        $(this).attr('data-select2-id', 'materialList' + id + a);
        a++;
    });
    jQuery.when(thisRow.find('#materialList').select2(select2)).done(initS2Loading('materialList', Option));
});