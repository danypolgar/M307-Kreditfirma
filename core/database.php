<?php
/**
 * Stellt eine Verbindung zur Datenbank her und gibt die
 * Datenbankverbindung als PDO zurück.
 *
 * @return PDO
 */
function connectToDatabase()
{
    try {
        if ($_SERVER["SERVER_NAME"] == 'web.kurse.ict-bz.ch') {
            $pdo = new PDO(
                'mysql:host=localhost;dbname=kurseictbz_30716',
                'kurseictbz_30716',
                'db_307_pw_16'
            );
        } else {
            $pdo = new PDO('mysql:host=127.0.0.1;dbname=credit_company', 'root', '', [
                'mysql:host=localhost;dbname=credit_company',
                'root',
                ''
            ]);
        }
    } catch (PDOException $e) {
        die('Keine Verbindung zur Datenbank möglich: ' . $e->getMessage());
    }
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}