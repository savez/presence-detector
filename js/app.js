function DipendentiCtrl($scope, $http){
    $scope.codice_utente = null; // inizializzazione variabile per codice utente

  	$scope.RegistraUtente = function(codice){

      // Richiesta HTTP per inserimento presenza in base al codice
      $http({method:'POST', 
             url: "http://presenze.nuovairide.it/ws/web/insdipendente",
             data:{"cod_utente":codice}}).
      success(function(data, status) {
        $scope.risultato = angular.copy({stato:data.stato,messaggio:data.messaggio});
      }).
      error(function(data, status) {
        console.log('errore: '+status);
        $scope.risultato = angular.copy({stato:3,messaggio:data});
      });
  	};
  	
    // Pulisci dati per nuovo inserimento
  	$scope.resetta = function() {
      $scope.risultato = '';
      $scope.codice_utente = null;
    };

    // evento per recupero dati da tastiera virtuale!
    $scope.insCifra = function(cifra) {
      if($scope.codice_utente == null){
        $scope.codice_utente = cifra;
      }else{
        $scope.codice_utente = $scope.codice_utente +""+ cifra;
      }
      
    };
}
