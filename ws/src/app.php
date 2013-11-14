<?php 
use Symfony\Component\HttpFoundation\Request; // Per le richieste HTTP

$app = require __DIR__.'/bootstrap.php';

$app->before(function (Request $request) {
    if (0 === strpos($request->headers->get('Content-Type'), 'application/json')) {
        $data = json_decode($request->getContent(), true);
        if (null === $data) {
            return new Response('{"message":"Problems parsing JSON"}', 400);
        }
        $request->request->replace(is_array($data) ? $data : array());
    }
});


// Inserimento dipendente (HTTP REQUEST ajax)
$app->post('/insdipendente', function(Request $request) use ($app){
	$return = array('stato'=>3,'messaggio'=>'pre registrazione');
	/* 
	 * In base al codice utnete verifico se non c'è già un record inserito per la data odierna.
	 * Se c'è allora segno la presenza come USCITA altrimenti è un'ENTRATA
	 * Se codice è errato lo segnalo con un messagio di alert
	 */
	$cod_utente = $request->request->get('cod_utente');
	$result_codUser = $app['db.utente']->checkCodUser($cod_utente);
	if(count($result_codUser) >= 1){ // codice verificato inserisco i dati
		try{
			$result_insert_check = $app['db.orario']->checkInsertByUtenteAndDay($cod_utente,date("Y-m-d"));
			$type = (count($result_insert_check) <= 0) ? 'entrata' : 'uscita';
			$app['db.orario']->insert(array('id_utente'=>$cod_utente,
												 'giorno' => date("Y-m-d"),
												 'orario' => date("H:i:s"),
												 'tipologia' => $type));
			$return = array('stato'=>0,'messaggio' => 'Inserita presenza con CODICE: '.$cod_utente.' ORA: '.date("H:i"));
		}catch(Exception $e){
			$return = array('stato'=>3,'messaggio' => $e);
		}
	}else{
		$return = array('stato'=>1,'messaggio' => 'Il codice inserito &egrave; : '.$cod_utente);
	}
	return $app->json($return);
});

// EXCEL Orari
$app->get('/excelorari/{m}', function($m,Request $request) use ($app){
	if($app['session']->get('isAuthenticated') == false && $request-> getPathInfo() != '/')
		return $app->redirect($request->getBasePath().'/');


	$dati = $app['db.utente']->allUser();

	// create new PDF document
	$pdf = new MYTCPDF();
	$pdf->_data = new StdClass();
	$mktime = mktime( 0, 0, 0, $m, 1, date("Y")); 
    setlocale('LC_ALL', 'it_IT');
	$ng = date("t",$mktime);
	$mktime_foo = null;
	foreach ($dati as $item){
		$ita_mese = $app['mapping_mese_string'][strtolower(date("F",$mktime))];
		$pdf->AddPage();	
		$pdf->Ln(10);
		$pdf->SetFont('times', 'BI', 20);
        $pdf->Write(0, $item['nome']." ".$item['cognome'], '', 0, 'C', true, 0, false, false, 0);
		$pdf->SetFont('times', '', 16);
		$pdf->Write(0, "Anno: ".date("Y")." - Mese: ".$ita_mese, '', 0, 'C', true, 0, false, false, 0);
		$pdf->Ln(10);
		for($i = 1; $i <= $ng; $i++){
			$pdf->SetTextColor(0);
			$foo = date("w",mktime( 0, 0, 0, $m, $i, date("Y")));
			if($foo != 0 && $foo != 6){
				$giorni = $app['db.orario']->allByUserAndDay($item['codice'],$i,$m,date("Y"));
				if(count($giorni) > 0){
					foreach ($giorni as $row) {
						$pdf->SetFont('times', '', 10);
						$pdf->Write(0, $row['dataformat']."\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t"
											.$row['orario']."\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t".strtoupper($row['nota']), '', 0, 'L', true, 0, false, false, 0);
						$pdf->Ln(1);
					}
				}else{
					$data = $i.'/'.$m.'/'.date("Y");
					$pdf->SetFont('times', '', 10);
					$pdf->Write(0, $data."\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t Assenza", '', 0, 'L', true, 0, false, false, 0);
					$pdf->Ln(1);
				}
				$pdf->Ln(1);
			}else{
				$data = $i.'/'.$m.'/'.date("Y");
				$pdf->SetFont('times', 'I', 10);
				$pdf->SetTextColor(185);
				$pdf->Write(0, $data, '', 0, 'L', true, 0, false, false, 0);
				$pdf->Ln(1);
			}
		}
	}
	$pdf->Output('orari_utenti.pdf', 'D');

	return false;
})->bind('excelorari');


$app->get('/singlepdf/{id}', function($id,Request $request) use ($app){
	if($app['session']->get('isAuthenticated') == false && $request-> getPathInfo() != '/')
		return $app->redirect($request->getBasePath().'/');

	$dati = $app['db.utente']->singleUser($id);
	$m = date("m");
	// create new PDF document
	$pdf = new MYTCPDF();
	$pdf->_data = new StdClass();
	$mktime = mktime( 0, 0, 0, $m, 1, date("Y")); 
    setlocale('LC_ALL', 'it_IT');
	$ng = date("t",$mktime);
	foreach ($dati as $item){
		$ita_mese = $app['mapping_mese_string'][strtolower(date("F",$mktime))];
		$pdf->AddPage();	
		$pdf->Ln(10);
		$pdf->SetFont('times', 'BI', 20);
        $pdf->Write(0, $item['nome']." ".$item['cognome'], '', 0, 'C', true, 0, false, false, 0);
		$pdf->SetFont('times', '', 16);
		$pdf->Write(0, "Anno: ".date("Y")." - Mese: ".$ita_mese, '', 0, 'C', true, 0, false, false, 0);
		$pdf->Ln(10);
		for($i = 1; $i <= $ng; $i++){
			$pdf->SetTextColor(0);
			$foo = date("w",mktime( 0, 0, 0, $m, $i, date("Y")));
			if($foo != 0 && $foo != 6){
				$giorni = $app['db.orario']->allByUserAndDay($item['codice'],$i,$m,date("Y"));
				if(count($giorni) > 0){
					foreach ($giorni as $row) {
						$pdf->SetFont('times', '', 10);
						$pdf->Write(0, $row['dataformat']."\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t"
											.$row['orario']."\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t".strtoupper($row['nota']), '', 0, 'L', true, 0, false, false, 0);
						$pdf->Ln(1);
					}
				}else{
					$data = $i.'/'.$m.'/'.date("Y");
					$pdf->SetFont('times', '', 10);
					$pdf->Write(0, $data."\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t Assenza", '', 0, 'L', true, 0, false, false, 0);
					$pdf->Ln(1);
				}
				$pdf->Ln(1);
			}else{
				$data = $i.'/'.$m.'/'.date("Y");
				$pdf->SetFont('times', 'I', 10);
				$pdf->SetTextColor(185);
				$pdf->Write(0, $data, '', 0, 'L', true, 0, false, false, 0);
				$pdf->Ln(1);
			}
		}
	}

	$pdf->Write(0, "Anno: ".date("Y")." - Mese: ".$ita_mese, '', 0, 'C', true, 0, false, false, 0);

	$pdf->Output('orari_'.$id.'.pdf', 'D');

	return false;
})->bind('singlepdf');


// HOME
$app->match('/', function(Request $request) use ($app){
	if ($request->getMethod() == 'POST') {
    	// Verifico nel DB user e password
    	$result = $app['db.accesso']->checkCredential($request->get('username'),$request->get('password'));
    	
    	if(count($result) > 0){
    		// Se è corretto salvo in sessione
    		$app['session']->set('user', array('username' => $request->get('username'),
    										   'nome' => $result[0]['nome'],
    										   'ruolo' => $result[0]['ruolo']));
       		$app['session']->set('isAuthenticated', true);
    		
    		return $app->redirect($request->getBasePath().'/opzioni');
    	}
    }
    return $app['twig']->render('index.html.twig',array());
})->bind('home');

// OPZIONI
$app->match('/opzioni/', function(Request $request) use ($app){
	if($app['session']->get('isAuthenticated') == false && $request-> getPathInfo() != '/')
		return $app->redirect($request->getBasePath().'/');

	$u = $app['session']->get('user');
	$users = $app['db.utente']->allUserAndInsert();
    return $app['twig']->render('opzioni.html.twig',array('mese' => date("m"),
    														'utente_loggato'=>$u['nome'],
    														'users'=>$users));
})->bind('opzioni');

// LOGOUT
$app->match('/logout', function(Request $request) use ($app){
	$app['session']->remove('user');
	$app['session']->set('isAuthenticated', false);
	return $app->redirect($request->getBasePath().'/');
})->bind('logout');


// VISUALIZZATORE PRESENZE
$app->get('/viewpresenze/{id}/{m}', function($id,$m,Request $request) use ($app){
	if($app['session']->get('isAuthenticated') == false && $request-> getPathInfo() != '/')
		return $app->redirect($request->getBasePath().'/');

	$mese_string = array(
	'1'=>'Gennaio',
	'2'=>'Febbraio',
	'3'=>'Marzo',
	'4'=>'Aprile',
	'5'=>'Maggio',
	'6'=>'Giugno',
	'7'=>'Luglio',
	'8'=>'Agosto',
	'9'=>'Settembre',
	'10'=>'Ottobre',
	'11'=>'Novembre',
	'12'=>'Dicembre'
	);
	
	$u = $app['session']->get('user');
	$mese = ($m != null)? $m : date("m");
	$n = $app['db.utente']->singleUser($id);
	$presenze = $app['db.orario']->getPresenzeByUserAndMonth($id,$mese);

	return $app['twig']->render('viewpresenze.html.twig',array('utente_loggato'=>$u['nome'],
    														   'presenze'=>$presenze,
    														   'mese'=>$mese_string[$mese],
    														   'mese_n'=>$mese,
    														   'id'=>$id,
    														   'nome_utente'=>$n[0]['cognome'].' '.$n[0]['nome']));
})->bind('viewpresenze');


// Modifica inserimento presenza
$app->post('/modifica', function(Request $request) use ($app){
	if($app['session']->get('isAuthenticated') == false && $request->getPathInfo() != '/')
		return $app->redirect($request->getBasePath().'/');

	$ido = $request->request->get('id_orario');
	$ora = $request->request->get('ora');
	$nota = $request->request->get('nota');
	$idu = $request->request->get('id_utente');
	$m = $request->request->get('mese');

	$u = $app['session']->get('user');

	$app['db.orario']->update(array('orario'=>$ora,
									'nota' => $nota,
									'datatime_modifica'=>date("Y-m-d H:i:s"),
									'utente_modifica'=>$u['nome']),array('id_orario'=>$ido));
	return $app->redirect($request->getBasePath().'/viewpresenze/'.$idu.'/'.$m);
})->bind('modifica');

// Cancella utente
$app->get('/deleteutente/{id}', function($id,Request $request) use ($app){
	if($app['session']->get('isAuthenticated') == false && $request->getPathInfo() != '/')
		return $app->redirect($request->getBasePath().'/');

	$app['db.utente']->delete(array('codice'=>$id));

	return $app->redirect($request->getBasePath().'/opzioni');
})->bind('deleteutente');

// Cancella presenza utente
$app->get('/deletepresenzautente/{id}/{idu}/{m}', function($id,$idu,$m,Request $request) use ($app){
	if($app['session']->get('isAuthenticated') == false && $request->getPathInfo() != '/')
		return $app->redirect($request->getBasePath().'/');

	$app['db.orario']->delete(array('id_orario'=>$id));

	return $app->redirect($request->getBasePath().'/viewpresenze/'.$idu.'/'.$m);
})->bind('deletepresenzautente');


// Aggiungi inserimento presenza
$app->post('/aggiungi', function(Request $request) use ($app){
	if($app['session']->get('isAuthenticated') == false && $request->getPathInfo() != '/')
		return $app->redirect($request->getBasePath().'/');

	$nota = $request->request->get('nota');
	$idu = $request->request->get('id_utente');
	$m = $request->request->get('mese');
	$g = $request->request->get('giorno');
	$t = $request->request->get('tipologia');
	$n = $request->request->get('nota');

	$o = null;
	if($t != 'vario'){
		$o = ($t == 'entrata') ? $request->request->get('ora_entrata') : $request->request->get('ora_uscita');
	}

	/* 
	 * In base al codice utnete verifico se non c'è già un record inserito per la data odierna.
	 * Se c'è allora segno la presenza come USCITA altrimenti è un'ENTRATA
	 * Se codice è errato lo segnalo con un messagio di alert
	 */
	try{

		$app['db.orario']->insert(array('id_utente'=>$idu,
										'giorno' => $g,
										'orario' => $o,
										'nota' => $n,
										'tipologia' => $t));
	}catch(Exception $e){
		echo $e;
		die;
	}

	return $app->redirect($request->getBasePath().'/viewpresenze/'.$idu.'/'.$m);
})->bind('aggiungi');

return $app;