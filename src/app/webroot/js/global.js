var Ace = {
  Ajax : {
    post : function($aFormID) {
      var lForm = $($aFormID);
      if (lForm == null)
        return;

      return $.post(lForm.attr('action'), lForm.serialize());
    }
  }
}
$(function() {
  
  $("#opener").click(function() {
    Ace.Ajax.post('#ZipFindViewForm').done(function(aData) {
      $("tblCountries").innerHTML(aData);
      $("#dialog").dialog({
    autoOpen : false,
    title : 'Select your country',
    width : 'auto',
    position : 'center',
    resizeable : true,
    modal : true,
    draggable : true,
    closeOnEscape : true,
    closeText : 'close',
    show : {
      effect : "blind",
      duration : 1000
    },
    hide : {
      effect : "explode",
      duration : 1000
    }
  });
      $("#dialog").dialog("open");
    });
  });
});