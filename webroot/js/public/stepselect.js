$(document).ready(function () {
  var navListItems = $('div.setup-panel div a'),
  allWells = $('.setup-content'),
  allNextBtn = $('.nextBtn'),
  allPrevBtn = $('.prevBtn');

  allWells.hide();

  navListItems.click(function (event) { 
	  event.preventDefault();
      nextprev($(this));
});

  
  allPrevBtn.click(function(){
      var curStep = $(this).closest(".setup-content"),
      curStepBtn = curStep.attr("id"),
      prevStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().prev().children("a");

      prevStepWizard.removeAttr('disabled');
      nextprev(prevStepWizard);
});

  allNextBtn.click(function(){
      var check = $(this).attr("btnpid");if(check!=undefined){if($("input[name='pid']").val()==""){alert("Please search/register a patient first.");return;}}
      var curStep = $(this).closest(".setup-content"),
      curStepBtn = curStep.attr("id"),
      nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
      curInputs = curStep.find("input[type='text'],input[type='url']"),
      isValid = true;

      $(".form-group").removeClass("has-error");
      for(var i=0; i<curInputs.length; i++){
          if (!curInputs[i].validity.valid){
              isValid = false;
              $(curInputs[i]).closest(".form-group").addClass("has-error");
      }
  }

  if (isValid)
  {
            //nextStepWizard.addClass("btn-primary")
            nextStepWizard.removeAttr('disabled');
            nextprev(nextStepWizard);
            
      }
});

  $('form').each(function() {
        $(this).find('input').keypress(function(e) {
            // Enter pressed?
            if(e.which == 10 || e.which == 13) {
                e.preventDefault();
          }
    });
  });



  $step = $('div.setup-panel div a.btn-primary');
  nextprev($step);

  function nextprev($step)
  {
      if($step.attr("disabled")!="disabled")
      {
        var $target = $($step.attr('href')),$item = $step;                          
        navListItems.removeClass('btn-primary').addClass('btn-default');
        $item.removeClass('btn-default').addClass('btn-primary');
        allWells.hide();
        $target.show();
        $target.find('input:eq(0)').focus();
  }
}

});