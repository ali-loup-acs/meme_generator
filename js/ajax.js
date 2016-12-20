$(document).ready(function(){

function txtWritten(){

  $("#validate").click(function(e)
  {
    e.preventDefault();

    let text = $("#text").val();
    $.ajax({
      url: "index.php?", // Le nom du fichier indiqué dans le formulaire
      type: "POST", // La méthode indiquée dans le formulaire (get ou post)
      data: "text="+text, // Je sérialise les données (j'envoie toutes les valeurs présentes dans le formulaire)
      dataType: 'json',
      success: function(data)
      {
        $('#txtwrit').children().html(data);
      //  print_r(data);
      }
    });
  });
  return false;
  }

  function selectTxt(){

    $("#selectionTxt").click(function(e)
    {
      e.preventDefault();

      let optiontext = $("#txtSelect").val();
      $.ajax({
        url: "index.php?", // Le nom du fichier indiqué dans le formulaire
        type: "POST", // La méthode indiquée dans le formulaire (get ou post)
        data: "optiontext="+optiontext, // Je sérialise les données (j'envoie toutes les valeurs présentes dans le formulaire)
        dataType: 'json',
        success: function(data)
        {
         $('#txtSelect').children().html(data);
        //  print_r(data);
        }
      });
    });
    return false;
    }

});
