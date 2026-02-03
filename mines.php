<?php
session_start();

// Database configuration
define('DB_HOST', 'localhost');
define('DB_USER', 'zewinsbs_chiken');
define('DB_PASS', 'zewinsbs_chiken');
define('DB_NAME', 'zewinsbs_chiken');

// Connect to database
try {
    $db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if ($db->connect_error) {
        throw new Exception("Connection failed: " . $db->connect_error);
    }
} catch (Exception $e) {
    die("Database connection error: " . $e->getMessage());
}

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// Function to get fresh balance from DB
function getFreshBalance($db, $user_id) {
    $q = $db->prepare("SELECT balance FROM users WHERE id = ?");
    $q->bind_param("i", $user_id);
    $q->execute();
    $res = $q->get_result()->fetch_assoc();
    return floatval($res['balance']);
}

// Initial user data for first page load
$user_balance = getFreshBalance($db, $user_id);

// --- GAME LOGIC API ---
if (isset($_POST['action'])) {
    header('Content-Type: application/json');
    $action = $_POST['action'];

    if ($action === 'place_bet') {
        $amount = floatval($_POST['amount']);
        $mines_count = intval($_POST['mines_count']);
        $grid_size = intval($_POST['grid_size']);
        $current_db_balance = getFreshBalance($db, $user_id);

        if ($amount <= 0 || $amount > $current_db_balance) {
            echo json_encode(['success' => false, 'error' => 'Insufficient Balance!']);
            exit();
        }

        // Deduct balance in DB
        $db->query("UPDATE users SET balance = balance - $amount WHERE id = $user_id");
        $new_bal = getFreshBalance($db, $user_id);

        // Setup Mines
        $mines = [];
        while (count($mines) < $mines_count) {
            $pos = rand(0, ($grid_size * $grid_size) - 1);
            if (!in_array($pos, $mines)) $mines[] = $pos;
        }

        $_SESSION['mines_game'] = [
            'amount' => $amount,
            'mines_count' => $mines_count,
            'grid_size' => $grid_size,
            'mines' => $mines,
            'revealed_tiles' => []
        ];

        echo json_encode(['success' => true, 'new_balance' => $new_bal]);
        exit();
    }

    if ($action === 'reveal_tile') {
        if (!isset($_SESSION['mines_game'])) exit();
        $tile_index = intval($_POST['tile_index']);
        $game = &$_SESSION['mines_game'];

        if (in_array($tile_index, $game['mines'])) {
            unset($_SESSION['mines_game']);
            echo json_encode(['success' => true, 'is_mine' => true, 'new_balance' => getFreshBalance($db, $user_id)]);
            exit();
        }

        if (!in_array($tile_index, $game['revealed_tiles'])) {
            $game['revealed_tiles'][] = $tile_index;
        }

        $total = $game['grid_size'] * $game['grid_size'];
        $safe = $total - $game['mines_count'];
        $rev = count($game['revealed_tiles']);
        
        $multiplier = 1;
        for($i=0; $i<$rev; $i++) { $multiplier *= ($total - $i) / ($safe - $i); }

        echo json_encode(['success' => true, 'is_mine' => false, 'multiplier' => round($multiplier, 2)]);
        exit();
    }

    if ($action === 'cashout') {
        if (!isset($_SESSION['mines_game'])) exit();
        $game = $_SESSION['mines_game'];
        $total = $game['grid_size'] * $game['grid_size'];
        $safe = $total - $game['mines_count'];
        $rev = count($game['revealed_tiles']);

        $multiplier = 1;
        for($i=0; $i<$rev; $i++) { $multiplier *= ($total - $i) / ($safe - $i); }

        $win = $game['amount'] * $multiplier;
        $db->query("UPDATE users SET balance = balance + $win WHERE id = $user_id");
        unset($_SESSION['mines_game']);

        echo json_encode(['success' => true, 'win_amount' => $win, 'new_balance' => getFreshBalance($db, $user_id)]);
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mines Pro - Balance Fixed</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        body { background: #0f172a; color: #fff; font-family: sans-serif; margin: 0; padding: 20px; text-align: center; }
        .game-container { max-width: 450px; margin: 0 auto; background: #1e293b; padding: 20px; border-radius: 20px; border: 1px solid #334155; }
        .balance-card { background: linear-gradient(135deg, #3b82f6, #2563eb); padding: 15px; border-radius: 12px; margin-bottom: 20px; box-shadow: 0 4px 15px rgba(0,0,0,0.3); }
        .grid { display: grid; grid-template-columns: repeat(5, 1fr); gap: 8px; margin: 20px 0; }
        .tile { aspect-ratio: 1; background: #334155; border-radius: 8px; cursor: pointer; display: flex; align-items: center; justify-content: center; font-size: 1.2rem; transition: 0.2s; border: 1px solid #475569; }
        .tile.revealed { background: #10b981; border-color: #059669; }
        .tile.mine { background: #ef4444; border-color: #b91c1c; animation: shake 0.3s; }
        .btn { width: 100%; padding: 14px; border: none; border-radius: 10px; font-weight: bold; cursor: pointer; font-size: 1rem; transition: 0.3s; }
        #placeBetBtn { background: #10b981; color: white; }
        #cashoutBtn { background: #f59e0b; color: white; }
        input, select { width: 100%; padding: 12px; margin: 8px 0; border-radius: 8px; border: 1px solid #475569; background: #0f172a; color: white; box-sizing: border-box; }
        @keyframes shake { 0%, 100% {transform:translateX(0)} 25% {transform:translateX(-5px)} 75% {transform:translateX(5px)} }
    </style>
</head>
<body>

<div class="game-container">
    <div class="balance-card">
        <div style="font-size: 0.9rem; opacity: 0.8;">Your Balance</div>
        <div style="font-size: 1.6rem; font-weight: bold;">₹<span id="userBalance"><?= number_format($user_balance, 2, '.', '') ?></span></div>
    </div>
    
    <div id="multiplierDisplay" style="font-weight: bold; color: #10b981; font-size: 1.4rem; margin-bottom: 10px;">1.00x</div>
    
    <div class="grid" id="mineGrid"></div>

    <div id="controls">
        <div id="setup">
            <input type="number" id="betInput" value="10" placeholder="Bet Amount">
            <select id="minesSelect">
                <?php for($i=1; $i<=24; $i++) echo "<option value='$i'>$i Mines</option>"; ?>
            </select>
        </div>
        <div id="actionArea" style="margin-top: 15px;">
            <button class="btn" id="placeBetBtn">START GAME</button>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    let gameActive = false;
    const gridSize = 5;

    function initGrid() {
        let h = '';
        for(let i=0; i<25; i++) h += `<div class="tile" data-index="${i}"></div>`;
        $('#mineGrid').html(h);
    }
    initGrid();

    function resetGame() {
        gameActive = false;
        $('#betInput, #minesSelect').prop('disabled', false);
        $('#actionArea').html('<button class="btn" id="placeBetBtn">START GAME</button>');
        $('#multiplierDisplay').text('1.00x');
        initGrid();
    }

    // Place Bet
    $(document).on('click', '#placeBetBtn', function() {
        const amt = $('#betInput').val();
        const m = $('#minesSelect').val();
        
        $.post('mines.php', { action:'place_bet', amount:amt, mines_count:m, grid_size:gridSize }, function(r) {
            if(r.success) {
                gameActive = true;
                $('#userBalance').text(parseFloat(r.new_balance).toFixed(2));
                $('#betInput, #minesSelect').prop('disabled', true);
                $('#actionArea').html('<button class="btn" id="cashoutBtn">CASHOUT (1.00x)</button>');
            } else { alert(r.error); }
        });
    });

    // Reveal Tile
    $(document).on('click', '.tile', function() {
        if(!gameActive || $(this).hasClass('revealed')) return;
        const t = $(this);
        $.post('mines.php', { action:'reveal_tile', tile_index:t.data('index') }, function(r) {
            if(r.success) {
                if(r.is_mine) {
                    t.addClass('mine').html('<i class="fas fa-bomb"></i>');
                    gameActive = false;
                    setTimeout(() => { 
                        alert('Game Over! Bomb Hit.'); 
                        $('#userBalance').text(parseFloat(r.new_balance).toFixed(2));
                        resetGame(); 
                    }, 800);
                } else {
                    t.addClass('revealed').html('<i class="fas fa-gem"></i>');
                    $('#multiplierDisplay').text(r.multiplier + 'x');
                    $('#cashoutBtn').text('CASHOUT (' + r.multiplier + 'x)');
                }
            }
        });
    });

    // Cashout
    $(document).on('click', '#cashoutBtn', function() {
        $.post('mines.php', { action:'cashout' }, function(r) {
            if(r.success) {
                $('#userBalance').text(parseFloat(r.new_balance).toFixed(2));
                alert('Congratulations! You won ₹' + r.win_amount.toFixed(2));
                resetGame();
            }
        });
    });
});
</script>
</body>
</html>