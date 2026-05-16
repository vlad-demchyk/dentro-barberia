<?php
// Root point for API (Routing for all routes)
// TODO: Implement routing logic
header('Content-Type: application/json');
// Example route
if ($_SERVER['REQUEST_URI'] === '/api/barbers') {
    echo json_encode(['barbers' => []]);
}
?>