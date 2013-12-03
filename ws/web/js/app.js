function AddUserCtrl($scope, $http){
    $scope.codice_utente = null; // inizializzazione variabile per codice utente
    $scope.checkCodice = false;
    // Controllo codice Dipendente
  	$scope.ControlloCodice = function(codice){
      if(codice)
      // Richiesta HTTP per inserimento presenza in base al codice
      $http({method:'POST', 
             url: "/ws/web/checkcodice",
             data:{"cod_utente":codice}}).
      success(function(data, status) {
        if(data.stato == 1)
          $scope.checkCodice = true;
        else
          $scope.checkCodice = false;

        console.log($scope.checkCodice );
      }).
      error(function(data, status) {
        console.log('errore: '+status);
        $scope.checkCodice = true;
      });
      
  	};
}
