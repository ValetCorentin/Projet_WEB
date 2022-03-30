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
  for (var i = 0; i < 2 ; i++){
    document.getElementsByClassName('student_form_properties')[i].disabled = false;
  }
  training_center_box.style.display = "inline";
}

function hide_training_center(){
  for (var i = 0; i < 2 ; i++){
    document.getElementsByClassName('student_form_properties')[i].disabled = true;
  }
  training_center_box.style.display = "none";
}

document.getElementById("Profil_type_Input").onclick = function () {
  if (document.getElementById("Profil_type_Input").value == "Delegate") {

    hide_training_center();
    show_rights();

  }  else {

    hide_rights();
    show_training_center();

  }
};
