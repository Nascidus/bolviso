<?php
/**
 * Script de diagnóstico para avaliações do Google.
 * Acesse: https://clinicabelviso.com.br/debug-google-reviews.php
 * REMOVA este arquivo após o diagnóstico por segurança.
 */
header('Content-Type: text/plain; charset=utf-8');
error_reporting(E_ALL);
ini_set('display_errors', 1);

$out = [];
$out[] = "=== Diagnóstico Google Reviews ===\n";

// 1. Carrega .env (mesmo fluxo do index)
$envFile = __DIR__ . '/.env';
$out[] = "1. Arquivo .env: " . $envFile;
$out[] = "   Existe: " . (file_exists($envFile) ? 'SIM' : 'NAO');
$out[] = "   Legível: " . (is_readable($envFile) ? 'SIM' : 'NAO');

if (file_exists($envFile)) {
    $lines = file($envFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        if (strpos(trim($line), '#') === 0) continue;
        if (strpos($line, '=') !== false) {
            list($key, $value) = explode('=', $line, 2);
            $_ENV[trim($key)] = trim($value);
        }
    }
}

// 2. Variáveis
$placeId = $_ENV['GOOGLE_PLACE_ID'] ?? '';
$apiKey = $_ENV['GOOGLE_PLACES_API_KEY'] ?? '';
$out[] = "\n2. Variáveis ENV:";
$out[] = "   GOOGLE_PLACE_ID: " . (empty($placeId) ? 'VAZIO' : substr($placeId, 0, 20) . '...');
$out[] = "   GOOGLE_PLACES_API_KEY: " . (empty($apiKey) ? 'VAZIO' : substr($apiKey, 0, 15) . '...');

if (empty($placeId) || empty($apiKey)) {
    $out[] = "\n*** ERRO: Variáveis não carregadas. Verifique o .env e se conecta.php carrega antes. ***";
    echo implode("\n", $out);
    exit;
}

// 3. cURL
$out[] = "\n3. cURL: " . (function_exists('curl_init') ? 'Disponível' : 'NÃO disponível');

// 4. Chamada à API
$url = 'https://places.googleapis.com/v1/places/' . urlencode($placeId);
$ch = curl_init($url);
curl_setopt_array($ch, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_TIMEOUT => 15,
    CURLOPT_HTTPHEADER => [
        'X-Goog-Api-Key: ' . $apiKey,
        'X-Goog-FieldMask: id,reviews'
    ]
]);
$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
$curlErr = curl_error($ch);
curl_close($ch);

$out[] = "\n4. Resposta da API:";
$out[] = "   HTTP Code: " . $httpCode;
if ($curlErr) {
    $out[] = "   cURL Error: " . $curlErr;
}
if ($response !== false) {
    $data = json_decode($response, true);
    if (isset($data['error'])) {
        $out[] = "   Erro API: " . json_encode($data['error'], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    } elseif (isset($data['reviews'])) {
        $out[] = "   Reviews encontradas: " . count($data['reviews']);
        $out[] = "   OK - API retornou dados.";
    } else {
        $out[] = "   Resposta: " . substr($response, 0, 500);
    }
} else {
    $out[] = "   Resposta vazia ou falha.";
}

$out[] = "\n=== Fim do diagnóstico ===";
echo implode("\n", $out);
