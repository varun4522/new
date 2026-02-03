// Authentication and User Management
let currentUser = null;
let userBalance = LOGIN;

// Check if user is logged in on page load
async function checkAuth() {
    try {
        const response = await fetch('api/user.php');
        const data = await response.json();
        
        if (data.success) {
            currentUser = data.user;
            userBalance = parseFloat(currentUser.balance);
            updateUserInterface();
            // Dispatch event for other scripts
            document.dispatchEvent(new CustomEvent('user-authenticated'));
            return true;
        } else {
            // Redirect to login page
            window.location.href = 'login.html';
            return false;
        }
    } catch (error) {
        console.error('Auth check failed:', error);
        window.location.href = 'login.html';
        return false;
    }
}

// Update UI with user data
function updateUserInterface() {
    if (currentUser) {
        // Update balance display
        const balanceElement = document.getElementById('balanceValue');
        if (balanceElement) {
            balanceElement.textContent = userBalance.toFixed(2);
        }
        
        // Update avatar
        const avatarElement = document.getElementById('selectedAvatar');
        if (avatarElement && currentUser.avatar) {
            avatarElement.src = currentUser.avatar;
        }
        
        // Update username in menu
        const usernameElements = document.querySelectorAll('.text-white.font-medium.whitespace-nowrap');
        usernameElements.forEach(el => {
            if (el.textContent === 'Player Name') {
                el.textContent = currentUser.username;
            }
        });
    }
}

// Update balance after game actions
async function updateBalance(newBalance) {
    try {
        const response = await fetch('api/update_balance.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ balance: newBalance })
        });
        
        const data = await response.json();
        
        if (data.success) {
            userBalance = newBalance;
            updateUserInterface();
            return true;
        } else {
            console.error('Failed to update balance:', data.error);
            return false;
        }
    } catch (error) {
        console.error('Balance update failed:', error);
        return false;
    }
}

// Save bet result to database
async function saveBetResult(betData) {
    try {
        const response = await fetch('api/save_bet.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(betData)
        });
        
        const data = await response.json();
        return data.success;
    } catch (error) {
        console.error('Failed to save bet:', error);
        return false;
    }
}

// Add logout function
function logout() {
    fetch('api/logout.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' }
    })
    .then(r => r.json())
    .then(data => {
        if (data.success) {
            window.location.href = 'login.html';
        } else {
            console.error('Logout failed:', data.error);
        }
    })
    .catch(err => {
        console.error('Logout error:', err);
        // Force redirect anyway
        window.location.href = 'login.html';
    });
}

// Initialize authentication on page load
document.addEventListener('DOMContentLoaded', async () => {
    const isAuthenticated = await checkAuth();
    if (isAuthenticated) {
        // Add logout functionality to logout link
        const logoutLinks = document.querySelectorAll('a[href], button');
        logoutLinks.forEach(link => {
            try {
                const href = link.getAttribute('href');
                if (href && href.replace(/\?.*$/, '').endsWith('logout.php')) {
                    link.addEventListener('click', (e) => {
                        e.preventDefault();
                        logout();
                    });
                }
            } catch (err) {
                // ignore
            }
        });
    }
});

// Also globally intercept any click on logout.php anchors (for pages that don't include this script inline)
document.addEventListener('click', function(e) {
    const target = e.target.closest && e.target.closest('a[href]');
    if (!target) return;
    const href = target.getAttribute('href');
    if (href && href.replace(/\?.*$/, '').endsWith('logout.php')) {
        e.preventDefault();
        logout();
    }
});

// Override the original balance update functions
const originalUpdateBalanceDisplay = window.updateBalanceDisplay;
window.updateBalanceDisplay = function() {
    if (originalUpdateBalanceDisplay) {
        originalUpdateBalanceDisplay();
    }
    updateUserInterface();
};

// Override the original setBetAmount function
const originalSetBetAmount = window.setBetAmount;
window.setBetAmount = function(val) {
    const amount = Math.max(10, Math.min(userBalance, parseInt(val) || 10));
    if (originalSetBetAmount) {
        originalSetBetAmount(amount);
    } else {
        const betInput = document.getElementById('betInput');
        if (betInput) {
            betInput.value = amount;
        }
    }
}; 