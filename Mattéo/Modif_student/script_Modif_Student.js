// API logs + city/region finding with ZIP_code search

var link_API ="https://geo.api.gouv.fr/communes?fields=codesPostaux,nom,region";
var xhr = new XMLHttpRequest();
xhr.open("GET", link_API, true);

xhr.onload = function () {
  if (xhr.status == 200) {
    console.clear();
    var API_results = JSON.parse(xhr.response);
    
    // Create an auto-completion from Zip_code info in France
    $("#ZIP_Code_Input").keyup(function () {
      if ($.trim($("#ZIP_Code_Input").val()).length >= 3) {
        var ResultsLength = $("#ZIP_Code_Input").val().length;
        var html = "";
        $('#City_Input').val('');
        for (let i = 0; i < API_results.length; i++) {
          var API_result = API_results[i].codesPostaux[0];

          if ($("#ZIP_Code_Input").val() == API_result.substring(0, ResultsLength)) {

            $('#Region_Input').val(API_results[i].region.nom);
            html += '<option value="' + API_results[i].nom + '">';
            $('#City_list').html(html);

          }else{}
        }
      }else {

        $('#City_Input').val('');
        $('#Region_Input').val('');

      }
    });
  }
};

xhr.send();