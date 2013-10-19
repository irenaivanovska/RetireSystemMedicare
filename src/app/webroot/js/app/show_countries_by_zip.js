$(function() {
  $('#btnEnterDrugs').click(function() {
    Ace.Ajax.post("#DrugsEnterDrugsForm").done(function(aData) {
      $("#tblCountries").html(aData);
    });
  });
});