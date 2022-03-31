



// Display functions
function enable_checkboxes() {
  for (var i = 0; i < 26; i++) {
    document.getElementsByClassName("delegate_rights_checkboxes")[
      i
    ].disabled = false;
  }
}

function disable_checkboxes() {
  for (var i = 0; i < 26; i++) {
    document.getElementsByClassName("delegate_rights_checkboxes")[
      i
    ].disabled = true;
  }
}

function show_rights() {
  enable_checkboxes();
  document.getElementById("Delegate_rights").style.display = "inline";
}

function hide_rights() {
  disable_checkboxes();
  document.getElementById("Delegate_rights").style.display = "none";
}

const training_center_box = document.getElementById("Training_center_box");
function show_training_center() {
  for (var i = 0; i < 2; i++) {
    document.getElementsByClassName("student_form_properties")[
      i
    ].disabled = false;
  }
  training_center_box.style.display = "inline";
}

function hide_training_center() {
  for (var i = 0; i < 2; i++) {
    document.getElementsByClassName("student_form_properties")[
      i
    ].disabled = true;
  }
  training_center_box.style.display = "none";
}

document.getElementById("Profil_type_Input").onclick = function () {
  if (document.getElementById("Profil_type_Input").value == "Delegate") {
    hide_training_center();
    show_rights();
  } else {
    hide_rights();
    show_training_center();
  }
};




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