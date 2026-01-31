<?php
/**
 * Busca avaliações do Google Meu Negócio via Places API (New).
 * Usa cache de 6 horas para reduzir requisições à API.
 *
 * Requer no .env:
 *   GOOGLE_PLACE_ID=ChIJ9a5kHKPxXpMRPg6YLtknXw0
 *   GOOGLE_PLACES_API_KEY=sua_api_key
 *
 * @return array Lista de reviews com: author_name, text, rating, relative_time
 */
function get_google_reviews() {
	$placeId = $_ENV['GOOGLE_PLACE_ID'] ?? '';
	$apiKey = $_ENV['GOOGLE_PLACES_API_KEY'] ?? '';
	if (empty($placeId) || empty($apiKey)) {
		return [];
	}

	$cacheFile = sys_get_temp_dir() . '/bolviso_google_reviews_v2_' . md5($placeId) . '.json';
	$cacheTtl = 6 * 3600; // 6 horas
	if (file_exists($cacheFile) && (time() - filemtime($cacheFile)) < $cacheTtl) {
		$cached = @file_get_contents($cacheFile);
		if ($cached !== false) {
			$data = json_decode($cached, true);
			if (is_array($data)) {
				return $data;
			}
		}
	}

	$url = 'https://places.googleapis.com/v1/places/' . urlencode($placeId);
	$ch = curl_init($url);
	curl_setopt_array($ch, [
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_TIMEOUT => 10,
		CURLOPT_HTTPHEADER => [
			'X-Goog-Api-Key: ' . $apiKey,
			'X-Goog-FieldMask: id,displayName,rating,userRatingCount,reviews'
		]
	]);
	$response = curl_exec($ch);
	$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
	curl_close($ch);

	if ($httpCode !== 200 || $response === false) {
		return [];
	}

	$data = json_decode($response, true);
	$reviews = $data['reviews'] ?? [];
	$out = [];
	foreach ($reviews as $r) {
		$author = '';
		if (!empty($r['authorAttribution']['displayName'])) {
			$author = $r['authorAttribution']['displayName'];
		}
		$text = '';
		if (!empty($r['text']['text'])) {
			$text = $r['text']['text'];
		}
		$rating = isset($r['rating']) ? (int) $r['rating'] : 0;
		$relativeTime = $r['relativePublishTimeDescription'] ?? '';
		$publishTime = $r['publishTime'] ?? '';
		$out[] = [
			'author_name' => $author,
			'text' => $text,
			'rating' => $rating,
			'relative_time' => $relativeTime,
			'publish_time' => $publishTime
		];
	}

	// Ordena pelas mais recentes primeiro (publishTime em ISO 8601)
	usort($out, function ($a, $b) {
		$tsA = strtotime($a['publish_time'] ?? '0');
		$tsB = strtotime($b['publish_time'] ?? '0');
		return $tsB - $tsA; // descendente (mais recente primeiro)
	});

	if (!empty($out)) {
		@file_put_contents($cacheFile, json_encode($out, JSON_UNESCAPED_UNICODE));
	}
	return $out;
}
