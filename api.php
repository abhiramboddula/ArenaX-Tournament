<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    exit(0);
}

$dataFile = 'participants.json';

function loadParticipants() {
    global $dataFile;
    if (file_exists($dataFile)) {
        return json_decode(file_get_contents($dataFile), true) ?: [];
    }
    return [];
}

function saveParticipants($participants) {
    global $dataFile;
    file_put_contents($dataFile, json_encode($participants, JSON_PRETTY_PRINT));
}

$method = $_SERVER['REQUEST_METHOD'];
$path = $_SERVER['REQUEST_URI'];

if ($method == 'POST' && strpos($path, '/api/participants/register') !== false) {
    $input = json_decode(file_get_contents('php://input'), true);
    $participants = loadParticipants();
    
    // Check if email already exists
    foreach ($participants as $p) {
        if ($p['email'] === $input['email']) {
            http_response_code(400);
            echo json_encode(['error' => 'Email already registered!']);
            exit;
        }
    }
    
    $participant = [
        'id' => time(),
        'name' => $input['name'],
        'email' => $input['email'],
        'game' => $input['game'],
        'ign' => $input['ign'],
        'phone' => $input['phone'],
        'skillLevel' => $input['skillLevel'],
        'score' => 0,
        'status' => 'registered',
        'createdAt' => date('c')
    ];
    
    $participants[] = $participant;
    saveParticipants($participants);
    
    echo json_encode(['message' => 'Registration successful!']);
}

elseif ($method == 'GET' && strpos($path, '/api/participants/leaderboard') !== false) {
    $participants = loadParticipants();
    usort($participants, function($a, $b) {
        return $b['score'] - $a['score'];
    });
    echo json_encode($participants);
}

elseif ($method == 'GET' && strpos($path, '/api/participants') !== false) {
    echo json_encode(loadParticipants());
}

elseif ($method == 'PUT' && preg_match('/\/api\/participants\/update-score\/(\d+)/', $path, $matches)) {
    $id = $matches[1];
    $input = json_decode(file_get_contents('php://input'), true);
    $participants = loadParticipants();
    
    foreach ($participants as &$p) {
        if ($p['id'] == $id) {
            $p['score'] = $input['score'];
            saveParticipants($participants);
            echo json_encode(['message' => 'Score updated successfully', 'participant' => $p]);
            exit;
        }
    }
    
    http_response_code(404);
    echo json_encode(['error' => 'Participant not found']);
}

elseif ($method == 'DELETE' && preg_match('/\/api\/participants\/(\d+)/', $path, $matches)) {
    $id = $matches[1];
    $participants = loadParticipants();
    $participants = array_filter($participants, function($p) use ($id) {
        return $p['id'] != $id;
    });
    saveParticipants(array_values($participants));
    echo json_encode(['message' => 'Participant deleted successfully']);
}

else {
    http_response_code(404);
    echo json_encode(['error' => 'Not found']);
}
?>
