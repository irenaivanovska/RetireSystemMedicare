Ace.PlanList = {
  init: function() {
    Ace.PlanList.Dialogs.info = Ace.Dialog.create('#AceDialog', 'Information', {
      buttons: {
        "Close": function() {
          $(this).dialog("close");
        }
      }
    });
    Ace.PlanList.Dialogs.filter = Ace.Dialog.create('#FilterPlansDialog', 'Filter Plans', null);
    $('#btnFilterPlans').click(function(e) {
      Ace.PlanList.Dialogs.filter.dialog("open");
    });
    
    $('#btnUpdatePlanFilter').click(function(e) {
      alert('Here goes the plan filters.');
    });
  },
  Dialogs: {
    info: null,
    filter: null
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