<?php

$filename = 'results.txt';

// Funzione per salvare i risultati in un file
function saveResult($numero1, $numero2, $operatore, $risultato) {
    global $filename;

    $line = "Numero1: $numero1, Numero2: $numero2, Operatore: $operatore, Risultato: $risultato, Data: " . date("Y-m-d H:i:s") . "\n";

    // Salva il risultato in un file di testo
    file_put_contents($filename, $line, FILE_APPEND);
}

// Esempio di utilizzo all'interno del tuo script
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numero1 = isset($_POST['numero1']) ? (float)$_POST['numero1'] : 0;
    $numero2 = isset($_POST['numero2']) ? (float)$_POST['numero2'] : 0;
    $operatore = isset($_POST['operatore']) ? $_POST['operatore'] : '';

    $risultato = '';
    if ($operatore == 'somma') {
        $risultato = $numero1 + $numero2;
    } elseif ($operatore == 'sottrazione') {
        $risultato = $numero1 - $numero2;
    } elseif ($operatore == 'moltiplicazione') {
        $risultato = $numero1 * $numero2;
    } elseif ($operatore == 'divisione') {
        if ($numero2 != 0) {
            $risultato = $numero1 / $numero2;
        } else {
            $risultato = 'Impossibile dividere per zero';
        }
    } else {
        $risultato = 'Operatore non valido';
    }

    // Salvare i risultati nel file
    saveResult($numero1, $numero2, $operatore, $risultato);

    echo "<h3>Risultato: $risultato</h3>";
    echo "<p>I dati sono stati salvati correttamente in un file.</p>";
}
?>
