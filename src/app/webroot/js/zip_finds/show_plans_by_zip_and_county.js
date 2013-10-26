Ace.PlanList = {
  init: function() {
    Ace.PlanList.Dialogs.info = Ace.Dialog.create('#AceDialog', 'Information', null);
  },
  Dialogs: {
    info: null
  },
  addToFavorites: function(aPlanID) {
    $.get("/zip_finds/addToFavorites/" + aPlanID, function(aData) {
      $("#AceDialogContent").html(aData);
      Ace.PlanList.Dialogs.info.dialog("open");
    });
  }
};

$(function() {
  Ace.PlanList.init();
});