function handleD(val) {
  var lot = document.getElementsByName("lot-number")[0];
  var batiment = document.getElementsByName("batiment-number")[0];
  var commerce = document.getElementsByName("designation-number")[0];
  if (val == "") {
    lot.disabled = true;
    lot.style.display = "block";
    batiment.disabled = true;
    batiment.style.display = "none";
    commerce.disabled = true;
    commerce.style.display = "none";
  } else if (val == "terrains") {
    lot.disabled = false;
    lot.style.display = "block";
    batiment.disabled = true;
    batiment.style.display = "none";
    commerce.disabled = true;
    commerce.style.display = "none";
    document.getElementsByClassName("img")[0].style.borderColor = "#e40343";
    document.getElementsByClassName("img")[1].style.borderColor = "#c0c0c0";
    document.getElementsByClassName("img")[2].style.borderColor = "#c0c0c0";
    document.getElementById("terrains").checked = true;
    document.getElementById("batiment").checked = false;
    document.getElementById("commerce").checked = false;
  } else if (val == "batiment") {
    batiment.disabled = false;
    batiment.style.display = "block";
    lot.disabled = true;
    lot.style.display = "none";
    commerce.disabled = true;
    commerce.style.display = "none";
    document.getElementsByClassName("img")[0].style.borderColor = "#c0c0c0";
    document.getElementsByClassName("img")[1].style.borderColor = "#e40343";
    document.getElementsByClassName("img")[2].style.borderColor = "#c0c0c0";
    document.getElementById("batiment").checked = true;
    document.getElementById("terrains").checked = false;
    document.getElementById("commerce").checked = false;
  } else if (val == "commerce") {
    commerce.disabled = false;
    commerce.style.display = "block";
    batiment.disabled = true;
    batiment.style.display = "none";
    lot.disabled = true;
    lot.style.display = "none";
    document.getElementsByClassName("img")[0].style.borderColor = "#c0c0c0";
    document.getElementsByClassName("img")[1].style.borderColor = "#c0c0c0";
    document.getElementsByClassName("img")[2].style.borderColor = "#e40343";
    document.getElementById("commerce").checked = true;
    document.getElementById("terrains").checked = false;
    document.getElementById("batiment").checked = false;
  }
}

function handleT() {
  var time = document.getElementById("rent").value;
  var timeInput = document.getElementById("number");
  if (time == "jours") {
    timeInput.placeholder = "entrez jours";
  } else if (time == "mois") {
    timeInput.placeholder = "entrez mois";
  } else if (time == "année") {
    timeInput.placeholder = "entrez années";
  }
}

function delE() {
  document.getElementById("errMsg").style.display = "none";
}
