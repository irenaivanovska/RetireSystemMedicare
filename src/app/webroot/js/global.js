var Ace = {
  Ajax: {
    post: function($aFormID) {
      var lForm = $($aFormID);
      if (lForm == null) {
        return;
      }
      return $.post(lForm.attr('action'), lForm.serialize());
    }
  },
  Dialog: {
    create: function(aId, aTitle, aAttributes) {
      var lInitialAttrs = {
        autoOpen : false,
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
        },
        dialogClass: 'medi-dialog'
      }
      if (aAttributes) {
        for(var lKey in aAttributes) {
          var lItem = aAttributes[lKey];
          if (lItem == null) continue;
          if (typeof lItem === 'function') continue;
          lInitialAttrs[lKey] = lItem;
        }
      }
      lInitialAttrs['title'] = aTitle;
      var lDialog = $(aId).dialog(lInitialAttrs);
      lDialog.parents(".ui-dialog:first").find(".ui-widget-header").removeClass("ui-widget-header").addClass("medi-dialog-title");
      return lDialog;
    }
  }
}
$(function() {
  Ace.Dialog.create('#dialog', 'Select your county', null);
  $("#opener").click(function() {
    Ace.Ajax.post('#ZipFindViewForm').done(function(aData) {
      $("#tblCountries").html(aData);
      $("#dialog").dialog("open");
    });
  }); 
});