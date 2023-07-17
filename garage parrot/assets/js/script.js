/* PopUP admin */

console.log('Partie réservé au développeur du site !');

document.getElementById('modifyAdmin').onclick = function() {
    $('#adminModal').modal('show');
};

document.getElementById('modifyEmployes').onclick = function() {
    $('#employesModal').modal('show');
};

document.getElementById('modifyVehicules').onclick = function() {
  $('#vehiculeModal').modal('show');
};

function showPopup() {
  $('#carDetailsModal').modal('show');
}

  function showCarDetails(nom, annee, kilometrage, prix, image) {
    var carDetails =
                     "Nom : " + nom + "<br>" +
                     "Année : " + annee + "<br>" +
                     "Kilométrage : " + kilometrage + " km<br>" +
                     "Prix : " + prix + " €";
    document.getElementById('carDetailsModalLabel').innerHTML = nom + " - Détails du véhicule";
    document.getElementById('carDetails').innerHTML = carDetails;
    document.getElementById('carImage').src = image;
    $('#carDetailsModal').modal('show');
  }
  
function addHoraires()
{
  $('#horaires').modal('show');
}