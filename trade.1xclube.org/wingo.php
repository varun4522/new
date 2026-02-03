
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <title>Win Go - 30 Second</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <style>
        .loading-curtain {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            background-color: #ffffff;
            z-index: 99999;
            opacity: 1;
            transition: opacity 0.25s ease-out;
            pointer-events: none;
        }
        :root {
            --primary-color: #8459ff;
            --light-gradient: linear-gradient(90deg, #8459ff, #6ea8f4);
            --primary-bg: #f0f2f5;
            --header-bg: #3a3a47;
            --green: #28c76f;
            --violet: #8459ff; 
            --red: #ea5455;
            --orange: #ff9f43;
            --blue: #00cfe8;
            --text-dark: #3e4555;
            --text-light: #fff;
            --text-muted: #6e6b7b;
            --current-bet-color: var(--primary-color);
        }
        body { margin: 0; font-family: 'Poppins', sans-serif; background-color: var(--primary-bg); color: var(--text-dark); -webkit-tap-highlight-color: transparent; font-size: 13px; }
        .container { max-width: 480px; margin: auto; background-color: #fff; min-height: 100vh; }
        
        .new-header { 
            background-color: var(--primary-color); 
            color: white; 
            display: flex; 
            justify-content: space-between; 
            align-items: center; 
            padding: 12px 15px; 
            height: 56px; 
            box-sizing: border-box;
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .header-left, .header-right { display: flex; align-items: center; flex: 1; }
        .header-center { 
            flex: 2; 
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100%;
        }
        .header-right { 
            justify-content: flex-end; 
        }
        .header-right img.header-icon {
            margin-left: 20px;
        }
        
        .header-logo-img {
            height: 34px; 
            width: auto;
        }

        .header-icon { width: 24px; height: 24px; cursor: pointer; } 

        .wallet-card { background: var(--light-gradient); margin: 10px; padding: 15px; border-radius: 15px; color: var(--text-light); box-shadow: 0 4px 15px rgba(132, 89, 255, 0.3); text-align: center; }
        .wallet-balance-container { display: flex; justify-content: center; align-items: center; gap: 8px; }
        .wallet-balance { font-size: 22px; font-weight: 700; } .wallet-balance .currency { font-size: 18px; margin-right: 4px; }
        .refresh-icon { width: 16px; height: 16px; cursor: pointer; fill: #fff; }
        .wallet-card small { display: block; margin-top: 4px; font-size: 11px; }
        .wallet-card .wallet-actions { display: flex; gap: 10px; margin-top: 12px; }
        .wallet-actions button { flex: 1; padding: 9px; border: none; border-radius: 20px; font-size: 13px; font-weight: 600; cursor: pointer; }
        .btn-withdraw { background-color: rgba(255,255,255,0.9); color: var(--primary-color); }
        .btn-deposit { background-color: var(--green); color: var(--text-light); }
        .number-grid { display: grid; grid-template-columns: repeat(5, 1fr); gap: 8px; margin-top: 15px; padding: 0 10px; }
        .number-image { max-width: 100%; height: auto; cursor: pointer; transition: transform 0.2s; } .number-image:active { transform: scale(0.95); }
        .game-ticket { background-image: url('/img/wingologo.png'); background-size: 100% 100%; margin: 10px; padding: 10px 15px; height: 95px; box-sizing: border-box; display: flex; justify-content: space-between; align-items: center; color: var(--text-light); }
        .ticket-left { display: flex; flex-direction: column; justify-content: space-between; height: 100%; padding-bottom: 5px; }
        .how-to-play-btn { display: flex; align-items: center; gap: 4px; background-color: rgba(255, 255, 255, 0.2); border: 1px solid rgba(255, 255, 255, 0.5); border-radius: 20px; padding: 3px 8px; font-size: 11px; cursor: pointer; color: #fff; }
        .how-to-play-btn svg { width: 12px; height: 12px; fill: #fff; }
        .previous-results { display: flex; gap: 5px; margin-top: auto; align-items: center; flex-wrap: nowrap; }
        .result-image { width: 22px; height: 22px; border-radius: 50%; box-shadow: 0 1px 4px rgba(0,0,0,0.2); border: 1.5px solid rgba(255,255,255,0.4); flex-shrink: 0; }
        .ticket-right { text-align: right; display: flex; flex-direction: column; justify-content: space-between; align-items: flex-end; height: 100%; padding-bottom: 5px; }
        .time-remaining { font-size: 12px; margin-bottom: 4px; }
        #countdown { display: flex; gap: 2px; font-size: 26px; font-weight: 700; }
        #countdown span { background-color: #fff; color: var(--text-dark); padding: 2px 5px; border-radius: 3px; min-width: 16px; text-align: center; }
        .ticket-period { font-size: 12px; margin-top: auto; letter-spacing: 0.5px; }
        .betting-area { padding: 0 15px; position: relative; }
        .color-bet-actions { display: flex; gap: 10px; margin-top: 15px; }
        .color-bet-actions button { flex: 1; padding: 10px; border: none; border-radius: 8px; font-size: 14px; font-weight: 700; color: #fff; cursor: pointer; transition: all 0.15s ease-out; text-shadow: 0 1px 2px rgba(0,0,0,0.2); }
        .color-bet-actions button:active { transform: translateY(2px); box-shadow: none !important; }
        .big-small-bar { display: flex; gap: 10px; margin-top: 15px; }
        .big-small-bar button { flex: 1; font-size: 14px; font-weight: 700; padding: 10px; border: none; border-radius: 8px; cursor: pointer; color: #fff; transition: all 0.15s ease-out; text-shadow: 0 1px 2px rgba(0,0,0,0.2); }
        .big-small-bar button:active { transform: translateY(2px); box-shadow: none !important; }
        .btn-green { background-color: var(--green); box-shadow: 0 4px 0 #1b8e4f; }
        .btn-violet { background-color: var(--violet); box-shadow: 0 4px 0 #6d33b4; }
        .btn-red { background-color: var(--red); box-shadow: 0 4px 0 #b83f3f; }
        .btn-big { background-color: var(--orange); box-shadow: 0 4px 0 #c87627; }
        .btn-small { background-color: var(--blue); box-shadow: 0 4px 0 #009cb4; }
        .history-section { margin: 20px 0; background-color: #fff; }
        .history-tabs { display: flex; justify-content: space-between; gap: 10px; padding: 15px; border-bottom: none; }
        .history-tabs button { flex-grow: 1; border: 1px solid #f0f0f0; background: #ffffff; color: #5e6278; border-radius: 10px; padding: 10px 8px; font-weight: 600; font-size: 13px; cursor: pointer; border-bottom: 1px solid #f0f0f0; transition: all 0.2s; }
        .history-tabs button.active { background: var(--primary-color); color: #ffffff; border-color: var(--primary-color); }
        .history-content { display: none; padding: 0 15px 15px; } .history-content.active { display: block; }
        .history-table { width: 100%; text-align: center; border-collapse: separate; border-spacing: 0; }
        .history-table th { padding: 12px 8px; font-size: 13px; background-color: var(--primary-color); color: #ffffff; font-weight: 600; border-bottom: none; }
        .history-table th:first-child { border-radius: 8px 0 0 8px; }
        .history-table th:last-child { border-radius: 0 8px 8px 0; }
        .history-table td { padding: 10px 8px; border-bottom: 1px solid #f0f2f5; font-size: 12px; vertical-align: middle; }
        .history-table .color-dots { display: flex; justify-content: center; align-items: center; gap: 4px; }
        .history-table .color-dot { height: 10px; width: 10px; border-radius: 50%; }
        .chart-container { padding: 5px; }
        .stats-table-wrapper { overflow-x: auto; margin: 10px 0 15px 0; border-radius: 5px; border: 1px solid #eee; -webkit-overflow-scrolling: touch; }
        .stats-table { width: 100%; min-width: 600px; border-collapse: collapse; text-align: center; font-size: 11px; background: #fff; border: none; }
        .stats-table thead td { padding: 8px 0; font-weight: 500; }
        .stats-table tbody tr:not(:last-child) td { border-bottom: 1px solid #f0f2f5; }
        .stats-table tbody tr td:first-child { text-align: left; padding-left: 10px; font-weight: 500; font-size: 12px; color: var(--text-muted); }
        .stats-table td { padding: 4px 0; }
        .stats-table .winning-number { display: inline-block; width: 18px; height: 18px; line-height: 18px; border-radius: 50%; border: 1.5px solid #ccc; font-weight: 600; font-size: 12px; color: #888; }
        .chart-list-header { background: var(--primary-color); color: #fff; padding: 8px 10px; margin-top: 15px; display: flex; justify-content: space-between; font-weight: 600; border-radius: 5px 5px 0 0; font-size: 13px; }
        .chart-list-header > div:first-child { flex: 0 0 35%; text-align: left; }
        .chart-list-header > div:last-child { flex: 1; text-align: center; padding-right: 32px; }
        .chart-trend-container { position: relative; background: #fff; border: 1px solid #f0f2f5; border-top: none; border-radius: 0 0 5px 5px; }
        .chart-row-item { display: flex; align-items: center; padding: 8px 5px; border-bottom: 1px solid #f0f2f5; position: relative; }
        .chart-row-item:last-child { border-bottom: none; }
        .chart-period { flex: 0 0 35%; font-size: 11px; color: var(--text-muted); text-align: left; padding-left: 5px; z-index: 2; }
        .number-list { flex: 1; display: flex; justify-content: space-around; position: relative; z-index: 2; }
        .number-circle { width: 22px; height: 22px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 12px; color: #aaa; border: 1px solid #ddd; background-color: #fff; }
        .number-circle.active-number { color: #fff; border-width: 1.5px; box-shadow: 0 2px 4px rgba(0,0,0,0.2); font-weight: 700; }
        .num-red { background-color: var(--red); border-color: #c94647; }
        .num-green { background-color: var(--green); border-color: #23a85b; }
        .num-violet { background: linear-gradient(135deg, var(--violet) 0%, var(--red) 100%); border-color: #a430ac; }
        .num-violet.green { background: linear-gradient(135deg, var(--violet) 0%, var(--green) 100%); }
        .big-small-tag { z-index: 2; flex-shrink: 0; width: 22px; height: 22px; border-radius: 4px; display: flex; align-items: center; justify-content: center; color: #fff; font-weight: 600; font-size: 11px; margin-left: 10px; }
        .tag-big { background-color: var(--orange); } .tag-small { background-color: var(--blue); }
        #chart-svg-lines { position: absolute; top: 0; left: 0; width: 100%; height: 100%; pointer-events: none; z-index: 1; }
        .chart-pagination { display: flex; justify-content: center; align-items: center; gap: 20px; padding: 25px 0 10px 0; }
        .chart-pagination span { margin: 0 5px; padding: 0; color: #888; font-size: 14px; }
        .chart-pagination a { text-decoration: none; font-weight: 600; font-size: 20px; padding: 8px; border-radius: 8px; line-height: 1; display:flex; align-items:center; justify-content:center; width: 34px; height: 34px; box-sizing: border-box; }
        .chart-pagination a:first-of-type { background: #f0f2f5; color: #c8c8c8; }
        .chart-pagination a:last-of-type { background: var(--primary-color); color: #fff; }
        .chart-pagination a.disabled, .chart-pagination a:first-of-type.disabled { background-color: #f0f2f5; color: #eaeaeb; cursor: not-allowed; pointer-events: none; }
        .chart-pagination a:last-of-type.disabled { background: #d3c5ff; color: #f8f7ff; cursor: not-allowed; pointer-events: none; }
        #my_history .history-table thead { display: none; }
        .my-history-row td { padding: 12px 5px; border-bottom: 1px solid #f0f2f5; vertical-align: middle; }
        .my-history-row:last-child td { border-bottom: none; }
        .history-cell-icon { width: 60px; }
        .bet-icon { width: 45px; height: 45px; border-radius: 10px; display: flex; align-items: center; justify-content: center; color: #fff; font-weight: 700; font-size: 14px; text-transform: capitalize; }
        .bet-icon-number { font-size: 20px; background-color: var(--green); }
        .bet-icon-small { background-color: var(--blue); text-transform: lowercase; }
        .bet-icon-big { background-color: var(--orange); text-transform: lowercase; }
        .bet-icon-green { background-color: var(--green); }
        .bet-icon-red { background-color: var(--red); }
        .bet-icon-violet { background-color: var(--violet); }
        .history-cell-details { text-align: left; padding-left: 10px !important; }
        .history-period { font-size: 14px; font-weight: 500; color: var(--text-dark); }
        .history-date { font-size: 11px; color: var(--text-muted); }
        .history-cell-result { text-align: right; }
        .status-badge { padding: 3px 12px; border: 1.5px solid; border-radius: 15px; font-size: 12px; display: inline-block; font-weight: 500; margin-bottom: 5px; }
        .status-succeed { color: var(--green); border-color: var(--green); background-color: #eaf8f1; }
        .status-failed { color: var(--red); border-color: var(--red); background-color: #fdefed; }
        .result-amount { font-weight: 700; font-size: 14px; }
        .amount-win { color: var(--green); }
        .amount-loss { color: var(--red); }
        .my-history-summary-row {
            cursor: pointer;
            transition: background-color: 0.2s;
        }
        .my-history-summary-row:hover {
            background-color: #f9f9f9;
        }
        .my-history-details-row {
            display: none;
        }
        .my-history-details-row td {
            padding: 0 !important;
            border-bottom: 1px solid #e0e0e0;
        }
        .my-history-summary-row + .my-history-details-row td {
            border-top: none;
        }
        .details-content-wrapper {
            padding: 15px;
            background-color: #fdfdfd;
        }
        .detail-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 9px 0;
            font-size: 13px;
            border-bottom: 1px solid #f0f2f5;
        }
        .detail-row:last-child {
            border-bottom: none;
        }
        .detail-row span:first-child {
            color: var(--text-muted);
        }
        .detail-row span:last-child {
            font-weight: 500;
            color: var(--text-dark);
            display: flex;
            gap: 8px;
            align-items: center;
        }
       
        /* --- বেট মডাল CSS অপরিবর্তিত --- */
        .bet-modal-overlay{display:none;position:fixed;top:0;left:0;width:100%;height:100%;background:rgba(0,0,0,0.5);z-index:1000}
        .bet-modal{position:fixed;bottom:-100%;left:50%;transform:translateX(-50%);width:100%;max-width:480px;background:#f0f2f5;border-radius:20px 20px 0 0;box-sizing:border-box;transition:bottom .3s ease-in-out;overflow:hidden;--current-bet-color: var(--primary-color);}
        .bet-modal.show{bottom:0}
        
        .bet-modal-header{
            padding: 12px 15px 22px; 
            background: var(--current-bet-color);
            color: #fff;
            text-align: center;
            border-top-left-radius: 20px;
            border-top-right-radius: 20px;
            clip-path: polygon(0 0, 100% 0, 100% calc(100% - 15px), 50% 100%, 0 calc(100% - 15px));
        }
        .bet-modal-header h3{margin:0;font-size:15px;font-weight:600;margin-bottom:8px;}
        .bet-modal-header .bet-selection{background-color:rgba(255,255,255,1);color:var(--text-dark);border-radius:8px;padding:6px 40px;font-size:13px;font-weight:500;display:inline-block;}
        .bet-modal-header .bet-selection span{font-weight:700;}

        .bet-modal-body{padding:15px 15px 8px;}
        .bet-options-row{display:flex;justify-content:space-between;align-items:center;margin-bottom:12px;}
        .bet-options-row .label{font-weight:500;font-size:13px;color:var(--text-muted);flex-shrink:0;margin-right:10px;}
        .bet-options-row .controls{display:flex;gap:6px;align-items:center;flex-grow: 1;justify-content: flex-end;}
        .bet-options-row .controls button{border:1px solid #ccc;background:#fff;border-radius:6px;padding:4px 8px;font-size:12px;font-weight:500;cursor:pointer;line-height:1.4;}
        
        .controls.combined-quantity-multiplier { display: flex; flex-wrap: wrap; gap: 8px; justify-content: flex-end; }
        .multiplier-controls { display: flex; gap: 6px; }

        .bet-options-row .controls button.active{background:var(--current-bet-color);color:#fff;border-color:var(--current-bet-color);}
        .quantity-control{display:flex;align-items:center;border:1px solid #ccc;border-radius:8px;background:#fff;}
        .quantity-control button{width:34px;height:34px;background:transparent;border:none;font-size:22px;color:var(--text-dark);border-radius:8px;}
        .quantity-control input{width:40px;text-align:center;border:none;font-size:14px;font-weight:600;padding:0;background:transparent;-moz-appearance: textfield;}
        .quantity-control input::-webkit-outer-spin-button,.quantity-control input::-webkit-inner-spin-button{-webkit-appearance:none;margin:0}
        
        .bet-agreement{display:flex;align-items:center;justify-content:center;margin-top: 15px; margin-bottom:8px;font-size:11px;}
        .bet-agreement .check-icon{width:14px;height:14px;border-radius:50%;background-color:var(--green);color:white;display:flex;align-items:center;justify-content:center;margin-right:5px;font-size:8px;cursor:pointer;flex-shrink:0;}
        .bet-agreement label{margin-right:4px; cursor:pointer;}
        .bet-agreement a{color:var(--red);text-decoration:none;font-weight:500;}

        .bet-modal-actions{display:flex;gap:10px;padding:8px;background:#fff;border-top:1px solid #e0e0e0;}
        .bet-modal-actions button{flex:1;padding:10px;border:none;border-radius:8px;font-size:14px;font-weight:600;cursor:pointer;}
        #cancelBet{background:#e0e0e0;color:var(--text-dark);flex:0 0 90px;}
        #confirmBet{background:var(--current-bet-color);color:#fff;}
        #confirmBet:disabled{background-color:#ccc;cursor:not-allowed;}
        
        #toast-notification{visibility:hidden;position:fixed;bottom:30px;left:50%;transform:translateX(-50%);background-color:#333;color:#fff;padding:12px 20px;border-radius:25px;z-index:4000;font-size:14px;white-space:nowrap}#toast-notification.show{visibility:visible;animation:fadein .5s,fadeout .5s 2.5s}@keyframes fadein{from{bottom:0;opacity:0}to{bottom:30px;opacity:1}}@keyframes fadeout{from{bottom:30px;opacity:1}to{bottom:0;opacity:0}}.final-countdown-overlay{display:none;position:absolute;top:0;left:0;right:0;bottom:0;background:rgba(255,255,255,0.95);z-index:10;justify-content:center;align-items:center;flex-direction:column;gap:10px}.final-countdown-timer{display:flex;gap:10px}.final-countdown-timer div{font-size:100px;font-weight:700;color:var(--primary-color);background-color:#fff;padding:10px 20px;border-radius:15px;box-shadow:0 5px 15px rgba(0,0,0,0.1);animation:pulse 1s infinite}.loading-text{font-size:18px;font-weight:600;color:var(--text-dark)}@keyframes pulse{0%{transform:scale(1)}50%{transform:scale(1.05)}100%{transform:scale(1)}}.result-popup-overlay{position:fixed;top:0;left:0;width:100%;height:100%;background:rgba(0,0,0,0.6);backdrop-filter:blur(8px);z-index:99999;display:none;justify-content:center;align-items:center;padding:15px;box-sizing:border-box;opacity:0;transition:opacity .3s ease-out}.result-popup-overlay.show{display:flex;opacity:1}.result-popup-card{width:100%;max-width:330px;border-radius:25px;background-color:#fff;box-shadow:0 15px 40px rgba(0,0,0,0.15);position:relative;transform:scale(.8) translateY(20px);opacity:0;transition:transform .4s cubic-bezier(.18,.89,.32,1.28),opacity .3s;max-height:95vh;display:flex;flex-direction:column;overflow:hidden}.result-popup-overlay.show .result-popup-card{transform:scale(1) translateY(0);opacity:1}.result-popup-header{position:relative;padding:20px 20px 30px 20px;border-radius:25px 25px 0 0;color:#fff;text-align:center;overflow:hidden}.header-wave{position:absolute;bottom:-2px;left:0;width:100%}.result-popup-header.win{background:linear-gradient(45deg,#ff9a8b 0%,#ff6a88 100%)}.result-popup-header.loss{background:linear-gradient(45deg,#a8c0ff,#3f2b96)}.popup-icon{width:60px;height:60px;margin:0 auto 10px;animation:icon-pulse 1s ease-out}@keyframes icon-pulse{from{transform:scale(.5);opacity:0}to{transform:scale(1);opacity:1}}.popup-icon svg{filter:drop-shadow(0 4px 8px rgba(0,0,0,.3))}.popup-status-title{font-size:28px;font-weight:800;margin:0;text-shadow:0 2px 4px rgba(0,0,0,.2)}.popup-amount{font-size:18px;font-weight:500}.result-popup-body{padding:20px;background-color:#f8faff;border-radius:0 0 25px 25px;overflow-y:auto}.result-label{color:var(--text-muted);font-size:13px;text-align:center;margin-bottom:12px;font-weight:500}.result-details{display:flex;justify-content:space-around;align-items:center;background-color:#fff;padding:15px;border-radius:15px;box-shadow:0 4px 15px rgba(220,225,240,.7)}.detail-item{display:flex;flex-direction:column;align-items:center}.detail-item span:first-child{font-size:12px;color:var(--text-muted)}.detail-item span:last-child{font-size:16px;font-weight:700;color:var(--text-dark)}.result-tags{display:flex;justify-content:center;gap:8px;margin-top:18px;flex-wrap:wrap}.result-tag{padding:5px 12px;border-radius:20px;font-size:12px;font-weight:600;color:#fff;box-shadow:0 2px 5px rgba(0,0,0,.1)}.tag-number{width:30px;height:30px;border-radius:50%;display:flex;justify-content:center;align-items:center;padding:0;color:var(--text-dark);background-color:#fff;font-size:14px}.result-popup-close-btn{width:100%;margin-top:25px;padding:12px;border:none;border-radius:12px;font-weight:600;font-size:15px;cursor:pointer;transition:transform .2s,box-shadow .2s;color:#fff}.result-popup-close-btn:hover{transform:translateY(-2px);box-shadow:0 6px 20px rgba(0,0,0,.15)}.close-win-btn{background:linear-gradient(45deg,#fe8c00,#f83600)}.close-loss-btn{background:linear-gradient(45deg,#37ecba,#72afd3)}.confetti-container{position:absolute;top:0;left:0;width:100%;height:100%;overflow:hidden;pointer-events:none;z-index:1}.confetti{position:absolute;width:8px;height:16px;background:#f00;opacity:0;animation:confetti-fall 3s ease-out forwards}.confetti.red{background-color:#e57373}.confetti.green{background-color:#81c784}.confetti.blue{background-color:#64b5f6}.confetti.yellow{background-color:#fff176}.confetti.violet{background-color:#ba68c8}@keyframes confetti-fall{0%{transform:translateY(-100px) rotate(0deg);opacity:1}100%{transform:translateY(500px) rotate(720deg);opacity:0}}
        @media (max-width: 480px) { #countdown{font-size:24px;} .time-remaining{font-size:11px;} .previous-results{gap:4px;} .result-image{width:22px;height:22px;} .number-circle { width: 18px; height: 18px; font-size: 10px; border-width: 1px; line-height: 18px; } .number-circle.active-number { border-width: 1.5px; font-weight: 600; } .big-small-tag { width: 18px; height: 18px; font-size: 10px; margin-left: 8px; } .chart-list-header > div:last-child { padding-right: 26px; } }
    </style>
</head>
<body>
    <div id="loadingCurtain" class="loading-curtain"></div>
    <div class="container">
        <header class="new-header">
            <div class="header-left"> 
                <svg class="header-icon" onclick="history.back()" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" style="fill:white;"><path d="M15.41 7.41L14 6l-6 6 6 6 1.41-1.41L10.83 12z"/></svg> 
            </div>
            <div class="header-center">
                <img src="https://chiken-road.sbs/images/REG.jpg" alt="Logo" class="header-logo-img">
            </div>
            <div class="header-right"> 
                <a href="support.php">
                    <img src="https://norextop.org/assets/png/kefu-b361c42f.png" alt="Rules" class="header-icon">
                </a> 
                <img src="https://norextop.org/assets/png/voice-62dbf38c.png" alt="History" class="header-icon"> 
            </div>
        </header>
        <main>
                   <div class="game-ticket">
                <div class="ticket-left"> <button class="how-to-play-btn"> <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M14 2H6c-1.1 0-1.99.9-1.99 2L4 20c0 1.1.89 2 1.99 2H18c1.1 0 2-.9 2-2V8l-6-6zM6 20V4h7v5h5v11H6z"></path></svg> How to play </button>
                    <div class="previous-results"><img src='https://norextop.org/assets/png/n8-d4d951a4.png' class='result-image' alt='8'><img src='https://norextop.org/assets/png/n5-49d0e9c5.png' class='result-image' alt='5'><img src='https://norextop.org/assets/png/n0-30bd92d1.png' class='result-image' alt='0'><img src='https://norextop.org/assets/png/n9-a20f6f42.png' class='result-image' alt='9'><img src='https://norextop.org/assets/png/n4-cb84933b.png' class='result-image' alt='4'></div>
                </div>
                <div class="ticket-right"> <div> <div class="time-remaining">Time remaining</div> <div id="countdown"><span>00</span>:<span>00</span></div> </div> <div class="ticket-period">202508012037</div> </div> </div>
            <div class="betting-area"> <div class="color-bet-actions"> <button class="btn-green bet-btn" data-bet-type="Green" data-color="var(--green)">Green</button> <button class="btn-violet bet-btn" data-bet-type="Violet" data-color="var(--violet)">Violet</button> <button class="btn-red bet-btn" data-bet-type="Red" data-color="var(--red)">Red</button> </div> <div class="number-grid"> <img src="https://norextop.org/assets/png/n0-30bd92d1.png" class="number-image bet-btn" data-bet-type="0"> <img src="https://norextop.org/assets/png/n1-dfccbff5.png" class="number-image bet-btn" data-bet-type="1"> <img src="https://norextop.org/assets/png/n2-c2913607.png" class="number-image bet-btn" data-bet-type="2"> <img src="https://norextop.org/assets/png/n3-f92c313f.png" class="number-image bet-btn" data-bet-type="3"> <img src="https://norextop.org/assets/png/n4-cb84933b.png" class="number-image bet-btn" data-bet-type="4"> <img src="https://norextop.org/assets/png/n5-49d0e9c5.png" class="number-image bet-btn" data-bet-type="5"> <img src="https://norextop.org/assets/png/n6-a56e0b9a.png" class="number-image bet-btn" data-bet-type="6"> <img src="https://norextop.org/assets/png/n7-5961a17f.png" class="number-image bet-btn" data-bet-type="7"> <img src="https://norextop.org/assets/png/n8-d4d951a4.png" class="number-image bet-btn" data-bet-type="8"> <img src="https://norextop.org/assets/png/n9-a20f6f42.png" class="number-image bet-btn" data-bet-type="9"> </div> <div class="big-small-bar"> <button class="btn-big bet-btn" data-bet-type="Big" data-color="var(--orange)">Big</button> <button class="btn-small bet-btn" data-bet-type="Small" data-color="var(--blue)">Small</button> </div> <div class="final-countdown-overlay" id="finalCountdownOverlay"> <div class="final-countdown-timer" id="finalCountdownTimer"></div> <div class="loading-text" id="loadingText"></div> </div> </div>
            <div class="history-section" id="historySection">
                <div class="history-tabs"> 
                    <button class="history-tab-btn" data-tab="game_history">Game history</button> 
                    <button class="history-tab-btn" data-tab="chart">Chart</button> 
                  
                </div>
                <div id="game_history" class="history-content">
                    <table class="history-table"> <thead><tr><th>Period</th><th>Number</th><th>Big/Small</th><th>Color</th></tr></thead> <tbody>
                        <tr><td>202508012036</td><td style='font-weight:700; font-size:16px; color:var(--red);'>8</td><td>Big</td><td><div class='color-dots'><span class='color-dot' style='background:var(--red);'></span></div></td></tr><tr><td>202508012035</td><td style='font-weight:700; font-size:16px; color:var(--violet);'>5</td><td>Big</td><td><div class='color-dots'><span class='color-dot' style='background:var(--violet);'></span><span class='color-dot' style='background:var(--green);'></span></div></td></tr><tr><td>202508012034</td><td style='font-weight:700; font-size:16px; color:var(--violet);'>0</td><td>Small</td><td><div class='color-dots'><span class='color-dot' style='background:var(--violet);'></span><span class='color-dot' style='background:var(--red);'></span></div></td></tr><tr><td>202508012033</td><td style='font-weight:700; font-size:16px; color:var(--green);'>9</td><td>Big</td><td><div class='color-dots'><span class='color-dot' style='background:var(--green);'></span></div></td></tr><tr><td>202508012032</td><td style='font-weight:700; font-size:16px; color:var(--red);'>4</td><td>Small</td><td><div class='color-dots'><span class='color-dot' style='background:var(--red);'></span></div></td></tr><tr><td>202508012031</td><td style='font-weight:700; font-size:16px; color:var(--green);'>9</td><td>Big</td><td><div class='color-dots'><span class='color-dot' style='background:var(--green);'></span></div></td></tr><tr><td>202508012030</td><td style='font-weight:700; font-size:16px; color:var(--red);'>2</td><td>Small</td><td><div class='color-dots'><span class='color-dot' style='background:var(--red);'></span></div></td></tr><tr><td>202508012029</td><td style='font-weight:700; font-size:16px; color:var(--green);'>3</td><td>Small</td><td><div class='color-dots'><span class='color-dot' style='background:var(--green);'></span></div></td></tr><tr><td>202508012028</td><td style='font-weight:700; font-size:16px; color:var(--violet);'>5</td><td>Big</td><td><div class='color-dots'><span class='color-dot' style='background:var(--violet);'></span><span class='color-dot' style='background:var(--green);'></span></div></td></tr><tr><td>202508012027</td><td style='font-weight:700; font-size:16px; color:var(--green);'>7</td><td>Big</td><td><div class='color-dots'><span class='color-dot' style='background:var(--green);'></span></div></td></tr>                    </tbody> </table>
                                         <div class="chart-pagination">
                                                <a href="?_t=1754067513177&gh_page=1" class="disabled"><</a>
                        <span>1 / 208</span>
                                                <a href="?_t=1754067513177&gh_page=2" class="">></a>
                    </div>
                                    </div>
                <div id="chart" class="history-content">
                    <div class="chart-container">
                        <div class="stats-table-wrapper">
                            <table class="stats-table">
                               <thead><tr>
                                    <td style="width:130px">Statistic (last 100 Periods)</td>
                                    <td><span class='winning-number'>0</span></td><td><span class='winning-number'>1</span></td><td><span class='winning-number'>2</span></td><td><span class='winning-number'>3</span></td><td><span class='winning-number'>4</span></td><td><span class='winning-number'>5</span></td><td><span class='winning-number'>6</span></td><td><span class='winning-number'>7</span></td><td><span class='winning-number'>8</span></td><td><span class='winning-number'>9</span></td>                                </tr></thead>
                                <tbody>
                                    <tr><td>Missing</td><td>2</td><td>10</td><td>6</td><td>7</td><td>4</td><td>1</td><td>22</td><td>9</td><td>0</td><td>3</td></tr>
                                    <tr><td>Avg missing</td><td>13</td><td>5</td><td>12</td><td>19</td><td>13</td><td>17</td><td>14</td><td>10</td><td>19</td><td>9</td></tr>
                                    <tr><td>Frequency</td><td>9</td><td>12</td><td>10</td><td>10</td><td>9</td><td>9</td><td>10</td><td>9</td><td>14</td><td>8</td></tr>
                                    <tr><td>Max consecutive</td><td>1</td><td>3</td><td>4</td><td>2</td><td>4</td><td>4</td><td>1</td><td>3</td><td>1</td><td>1</td></tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="chart-list-header"><div>Period</div><div>Number</div></div>
                        <div class="chart-trend-container">
                             <svg id="chart-svg-lines"></svg>
                                                        <div class="chart-row-item">
                                <div class="chart-period">202508012036</div>
                                <div class="number-list">
                                    <div class="number-circle" data-num="0">0</div><div class="number-circle" data-num="1">1</div><div class="number-circle" data-num="2">2</div><div class="number-circle" data-num="3">3</div><div class="number-circle" data-num="4">4</div><div class="number-circle" data-num="5">5</div><div class="number-circle" data-num="6">6</div><div class="number-circle" data-num="7">7</div><div class="number-circle active-number num-red" data-num="8">8</div><div class="number-circle" data-num="9">9</div>                                </div>
                                <div class="big-small-tag tag-big">B</div>
                            </div>
                                                        <div class="chart-row-item">
                                <div class="chart-period">202508012035</div>
                                <div class="number-list">
                                    <div class="number-circle" data-num="0">0</div><div class="number-circle" data-num="1">1</div><div class="number-circle" data-num="2">2</div><div class="number-circle" data-num="3">3</div><div class="number-circle" data-num="4">4</div><div class="number-circle active-number num-violet green" data-num="5">5</div><div class="number-circle" data-num="6">6</div><div class="number-circle" data-num="7">7</div><div class="number-circle" data-num="8">8</div><div class="number-circle" data-num="9">9</div>                                </div>
                                <div class="big-small-tag tag-big">B</div>
                            </div>
                                                        <div class="chart-row-item">
                                <div class="chart-period">202508012034</div>
                                <div class="number-list">
                                    <div class="number-circle active-number num-violet" data-num="0">0</div><div class="number-circle" data-num="1">1</div><div class="number-circle" data-num="2">2</div><div class="number-circle" data-num="3">3</div><div class="number-circle" data-num="4">4</div><div class="number-circle" data-num="5">5</div><div class="number-circle" data-num="6">6</div><div class="number-circle" data-num="7">7</div><div class="number-circle" data-num="8">8</div><div class="number-circle" data-num="9">9</div>                                </div>
                                <div class="big-small-tag tag-small">S</div>
                            </div>
                                                        <div class="chart-row-item">
                                <div class="chart-period">202508012033</div>
                                <div class="number-list">
                                    <div class="number-circle" data-num="0">0</div><div class="number-circle" data-num="1">1</div><div class="number-circle" data-num="2">2</div><div class="number-circle" data-num="3">3</div><div class="number-circle" data-num="4">4</div><div class="number-circle" data-num="5">5</div><div class="number-circle" data-num="6">6</div><div class="number-circle" data-num="7">7</div><div class="number-circle" data-num="8">8</div><div class="number-circle active-number num-green" data-num="9">9</div>                                </div>
                                <div class="big-small-tag tag-big">B</div>
                            </div>
                                                        <div class="chart-row-item">
                                <div class="chart-period">202508012032</div>
                                <div class="number-list">
                                    <div class="number-circle" data-num="0">0</div><div class="number-circle" data-num="1">1</div><div class="number-circle" data-num="2">2</div><div class="number-circle" data-num="3">3</div><div class="number-circle active-number num-red" data-num="4">4</div><div class="number-circle" data-num="5">5</div><div class="number-circle" data-num="6">6</div><div class="number-circle" data-num="7">7</div><div class="number-circle" data-num="8">8</div><div class="number-circle" data-num="9">9</div>                                </div>
                                <div class="big-small-tag tag-small">S</div>
                            </div>
                                                        <div class="chart-row-item">
                                <div class="chart-period">202508012031</div>
                                <div class="number-list">
                                    <div class="number-circle" data-num="0">0</div><div class="number-circle" data-num="1">1</div><div class="number-circle" data-num="2">2</div><div class="number-circle" data-num="3">3</div><div class="number-circle" data-num="4">4</div><div class="number-circle" data-num="5">5</div><div class="number-circle" data-num="6">6</div><div class="number-circle" data-num="7">7</div><div class="number-circle" data-num="8">8</div><div class="number-circle active-number num-green" data-num="9">9</div>                                </div>
                                <div class="big-small-tag tag-big">B</div>
                            </div>
                                                        <div class="chart-row-item">
                                <div class="chart-period">202508012030</div>
                                <div class="number-list">
                                    <div class="number-circle" data-num="0">0</div><div class="number-circle" data-num="1">1</div><div class="number-circle active-number num-red" data-num="2">2</div><div class="number-circle" data-num="3">3</div><div class="number-circle" data-num="4">4</div><div class="number-circle" data-num="5">5</div><div class="number-circle" data-num="6">6</div><div class="number-circle" data-num="7">7</div><div class="number-circle" data-num="8">8</div><div class="number-circle" data-num="9">9</div>                                </div>
                                <div class="big-small-tag tag-small">S</div>
                            </div>
                                                        <div class="chart-row-item">
                                <div class="chart-period">202508012029</div>
                                <div class="number-list">
                                    <div class="number-circle" data-num="0">0</div><div class="number-circle" data-num="1">1</div><div class="number-circle" data-num="2">2</div><div class="number-circle active-number num-green" data-num="3">3</div><div class="number-circle" data-num="4">4</div><div class="number-circle" data-num="5">5</div><div class="number-circle" data-num="6">6</div><div class="number-circle" data-num="7">7</div><div class="number-circle" data-num="8">8</div><div class="number-circle" data-num="9">9</div>                                </div>
                                <div class="big-small-tag tag-small">S</div>
                            </div>
                                                        <div class="chart-row-item">
                                <div class="chart-period">202508012028</div>
                                <div class="number-list">
                                    <div class="number-circle" data-num="0">0</div><div class="number-circle" data-num="1">1</div><div class="number-circle" data-num="2">2</div><div class="number-circle" data-num="3">3</div><div class="number-circle" data-num="4">4</div><div class="number-circle active-number num-violet green" data-num="5">5</div><div class="number-circle" data-num="6">6</div><div class="number-circle" data-num="7">7</div><div class="number-circle" data-num="8">8</div><div class="number-circle" data-num="9">9</div>                                </div>
                                <div class="big-small-tag tag-big">B</div>
                            </div>
                                                        <div class="chart-row-item">
                                <div class="chart-period">202508012027</div>
                                <div class="number-list">
                                    <div class="number-circle" data-num="0">0</div><div class="number-circle" data-num="1">1</div><div class="number-circle" data-num="2">2</div><div class="number-circle" data-num="3">3</div><div class="number-circle" data-num="4">4</div><div class="number-circle" data-num="5">5</div><div class="number-circle" data-num="6">6</div><div class="number-circle active-number num-green" data-num="7">7</div><div class="number-circle" data-num="8">8</div><div class="number-circle" data-num="9">9</div>                                </div>
                                <div class="big-small-tag tag-big">B</div>
                            </div>
                                                    </div>
                                                <div class="chart-pagination">
                                                        <a href="?_t=1754067513177&page=1" class="disabled"><</a>
                            <span>1 / 208</span>
                                                        <a href="?_t=1754067513177&page=2" class="">></a>
                        </div>
                                            </div>
                </div>
                <div id="my_history" class="history-content">
                    <table class="history-table my-history-table">
                        <tbody>
                        <tr class="my-history-summary-row"><td class="history-cell-icon"><div class="bet-icon bet-icon-big">Big</div></td><td class="history-cell-details">  <div class="history-period">202507301211</div>  <div class="history-date">2025-07-30 16:05:36</div></td><td class="history-cell-result">  <div class="status-badge status-failed">Failed</div>  <div class="result-amount amount-loss">-৳100.00</div></td></tr><tr class="my-history-details-row"><td colspan="3"><div class="details-content-wrapper"><div class="detail-row"><span>Period</span><span>202507301211</span></div><div class="detail-row"><span>Purchase amount</span><span style="color:var(--text-dark);">৳100.00</span></div><div class="detail-row"><span>Quantity</span><span>1</span></div><div class="detail-row"><span>Amount after tax</span><span style="color:var(--red);">৳98.00</span></div><div class="detail-row"><span>Tax</span><span style="color:var(--red);">৳2.00</span></div><div class="detail-row"><span>Result</span><span><span style="color:var(--green);">3</span><span style="color:var(--green);">Green</span><span style="color:var(--blue);">Small</span></span></div><div class="detail-row"><span>Select</span><span>Big</span></div><div class="detail-row"><span>Status</span><span style="color:var(--red)">Loss</span></div><div class="detail-row"><span>Win/lose</span><span style="color:var(--red); font-weight:700;">-৳100.00</span></div><div class="detail-row"><span>Order time</span><span>2025-07-30 16:05:36</span></div></div></td></tr><tr class="my-history-summary-row"><td class="history-cell-icon"><div class="bet-icon bet-icon-big">Big</div></td><td class="history-cell-details">  <div class="history-period">202507272281</div>  <div class="history-date">2025-07-28 01:00:36</div></td><td class="history-cell-result">  <div class="status-badge status-failed">Failed</div>  <div class="result-amount amount-loss">-৳10.00</div></td></tr><tr class="my-history-details-row"><td colspan="3"><div class="details-content-wrapper"><div class="detail-row"><span>Period</span><span>202507272281</span></div><div class="detail-row"><span>Purchase amount</span><span style="color:var(--text-dark);">৳10.00</span></div><div class="detail-row"><span>Quantity</span><span>1</span></div><div class="detail-row"><span>Amount after tax</span><span style="color:var(--red);">৳9.80</span></div><div class="detail-row"><span>Tax</span><span style="color:var(--red);">৳0.20</span></div><div class="detail-row"><span>Result</span><span><span style="color:var(--red);">2</span><span style="color:var(--red);">Red</span><span style="color:var(--blue);">Small</span></span></div><div class="detail-row"><span>Select</span><span>Big</span></div><div class="detail-row"><span>Status</span><span style="color:var(--red)">Loss</span></div><div class="detail-row"><span>Win/lose</span><span style="color:var(--red); font-weight:700;">-৳10.00</span></div><div class="detail-row"><span>Order time</span><span>2025-07-28 01:00:36</span></div></div></td></tr><tr class="my-history-summary-row"><td class="history-cell-icon"><div class="bet-icon bet-icon-big">Big</div></td><td class="history-cell-details">  <div class="history-period">202507272135</div>  <div class="history-date">2025-07-27 23:47:32</div></td><td class="history-cell-result">  <div class="status-badge status-failed">Failed</div>  <div class="result-amount amount-loss">-৳10.00</div></td></tr><tr class="my-history-details-row"><td colspan="3"><div class="details-content-wrapper"><div class="detail-row"><span>Period</span><span>202507272135</span></div><div class="detail-row"><span>Purchase amount</span><span style="color:var(--text-dark);">৳10.00</span></div><div class="detail-row"><span>Quantity</span><span>1</span></div><div class="detail-row"><span>Amount after tax</span><span style="color:var(--red);">৳9.80</span></div><div class="detail-row"><span>Tax</span><span style="color:var(--red);">৳0.20</span></div><div class="detail-row"><span>Result</span><span><span style="color:var(--green);">3</span><span style="color:var(--green);">Green</span><span style="color:var(--blue);">Small</span></span></div><div class="detail-row"><span>Select</span><span>Big</span></div><div class="detail-row"><span>Status</span><span style="color:var(--red)">Loss</span></div><div class="detail-row"><span>Win/lose</span><span style="color:var(--red); font-weight:700;">-৳10.00</span></div><div class="detail-row"><span>Order time</span><span>2025-07-27 23:47:32</span></div></div></td></tr><tr class="my-history-summary-row"><td class="history-cell-icon"><div class="bet-icon bet-icon-big">Big</div></td><td class="history-cell-details">  <div class="history-period">202507271943</div>  <div class="history-date">2025-07-27 22:11:36</div></td><td class="history-cell-result">  <div class="status-badge status-succeed">Succeed</div>  <div class="result-amount amount-win">+৳19.60</div></td></tr><tr class="my-history-details-row"><td colspan="3"><div class="details-content-wrapper"><div class="detail-row"><span>Period</span><span>202507271943</span></div><div class="detail-row"><span>Purchase amount</span><span style="color:var(--text-dark);">৳10.00</span></div><div class="detail-row"><span>Quantity</span><span>1</span></div><div class="detail-row"><span>Amount after tax</span><span style="color:var(--red);">৳9.80</span></div><div class="detail-row"><span>Tax</span><span style="color:var(--red);">৳0.20</span></div><div class="detail-row"><span>Result</span><span><span style="color:var(--green);">7</span><span style="color:var(--green);">Green</span><span style="color:var(--orange);">Big</span></span></div><div class="detail-row"><span>Select</span><span>Big</span></div><div class="detail-row"><span>Status</span><span style="color:var(--green)">Win</span></div><div class="detail-row"><span>Win/lose</span><span style="color:var(--green); font-weight:700;">+৳19.60</span></div><div class="detail-row"><span>Order time</span><span>2025-07-27 22:11:36</span></div></div></td></tr><tr class="my-history-summary-row"><td class="history-cell-icon"><div class="bet-icon bet-icon-big">Big</div></td><td class="history-cell-details">  <div class="history-period">202507271918</div>  <div class="history-date">2025-07-27 21:59:06</div></td><td class="history-cell-result">  <div class="status-badge status-failed">Failed</div>  <div class="result-amount amount-loss">-৳50.00</div></td></tr><tr class="my-history-details-row"><td colspan="3"><div class="details-content-wrapper"><div class="detail-row"><span>Period</span><span>202507271918</span></div><div class="detail-row"><span>Purchase amount</span><span style="color:var(--text-dark);">৳50.00</span></div><div class="detail-row"><span>Quantity</span><span>1</span></div><div class="detail-row"><span>Amount after tax</span><span style="color:var(--red);">৳49.00</span></div><div class="detail-row"><span>Tax</span><span style="color:var(--red);">৳1.00</span></div><div class="detail-row"><span>Result</span><span><span style="color:var(--violet);">0</span><span style="color:var(--violet);">Violet</span><span style="color:var(--red);">Red</span><span style="color:var(--blue);">Small</span></span></div><div class="detail-row"><span>Select</span><span>Big</span></div><div class="detail-row"><span>Status</span><span style="color:var(--red)">Loss</span></div><div class="detail-row"><span>Win/lose</span><span style="color:var(--red); font-weight:700;">-৳50.00</span></div><div class="detail-row"><span>Order time</span><span>2025-07-27 21:59:06</span></div></div></td></tr><tr class="my-history-summary-row"><td class="history-cell-icon"><div class="bet-icon bet-icon-small">Small</div></td><td class="history-cell-details">  <div class="history-period">202507271917</div>  <div class="history-date">2025-07-27 21:58:48</div></td><td class="history-cell-result">  <div class="status-badge status-failed">Failed</div>  <div class="result-amount amount-loss">-৳100.00</div></td></tr><tr class="my-history-details-row"><td colspan="3"><div class="details-content-wrapper"><div class="detail-row"><span>Period</span><span>202507271917</span></div><div class="detail-row"><span>Purchase amount</span><span style="color:var(--text-dark);">৳100.00</span></div><div class="detail-row"><span>Quantity</span><span>1</span></div><div class="detail-row"><span>Amount after tax</span><span style="color:var(--red);">৳98.00</span></div><div class="detail-row"><span>Tax</span><span style="color:var(--red);">৳2.00</span></div><div class="detail-row"><span>Result</span><span><span style="color:var(--green);">9</span><span style="color:var(--green);">Green</span><span style="color:var(--orange);">Big</span></span></div><div class="detail-row"><span>Select</span><span>Small</span></div><div class="detail-row"><span>Status</span><span style="color:var(--red)">Loss</span></div><div class="detail-row"><span>Win/lose</span><span style="color:var(--red); font-weight:700;">-৳100.00</span></div><div class="detail-row"><span>Order time</span><span>2025-07-27 21:58:48</span></div></div></td></tr><tr class="my-history-summary-row"><td class="history-cell-icon"><div class="bet-icon bet-icon-big">Big</div></td><td class="history-cell-details">  <div class="history-period">202507271916</div>  <div class="history-date">2025-07-27 21:58:05</div></td><td class="history-cell-result">  <div class="status-badge status-succeed">Succeed</div>  <div class="result-amount amount-win">+৳19.60</div></td></tr><tr class="my-history-details-row"><td colspan="3"><div class="details-content-wrapper"><div class="detail-row"><span>Period</span><span>202507271916</span></div><div class="detail-row"><span>Purchase amount</span><span style="color:var(--text-dark);">৳10.00</span></div><div class="detail-row"><span>Quantity</span><span>1</span></div><div class="detail-row"><span>Amount after tax</span><span style="color:var(--red);">৳9.80</span></div><div class="detail-row"><span>Tax</span><span style="color:var(--red);">৳0.20</span></div><div class="detail-row"><span>Result</span><span><span style="color:var(--green);">9</span><span style="color:var(--green);">Green</span><span style="color:var(--orange);">Big</span></span></div><div class="detail-row"><span>Select</span><span>Big</span></div><div class="detail-row"><span>Status</span><span style="color:var(--green)">Win</span></div><div class="detail-row"><span>Win/lose</span><span style="color:var(--green); font-weight:700;">+৳19.60</span></div><div class="detail-row"><span>Order time</span><span>2025-07-27 21:58:05</span></div></div></td></tr><tr class="my-history-summary-row"><td class="history-cell-icon"><div class="bet-icon bet-icon-red">Red</div></td><td class="history-cell-details">  <div class="history-period">202507271908</div>  <div class="history-date">2025-07-27 21:54:12</div></td><td class="history-cell-result">  <div class="status-badge status-failed">Failed</div>  <div class="result-amount amount-loss">-৳50.00</div></td></tr><tr class="my-history-details-row"><td colspan="3"><div class="details-content-wrapper"><div class="detail-row"><span>Period</span><span>202507271908</span></div><div class="detail-row"><span>Purchase amount</span><span style="color:var(--text-dark);">৳50.00</span></div><div class="detail-row"><span>Quantity</span><span>1</span></div><div class="detail-row"><span>Amount after tax</span><span style="color:var(--red);">৳49.00</span></div><div class="detail-row"><span>Tax</span><span style="color:var(--red);">৳1.00</span></div><div class="detail-row"><span>Result</span><span><span style="color:var(--green);">3</span><span style="color:var(--green);">Green</span><span style="color:var(--blue);">Small</span></span></div><div class="detail-row"><span>Select</span><span>Red</span></div><div class="detail-row"><span>Status</span><span style="color:var(--red)">Loss</span></div><div class="detail-row"><span>Win/lose</span><span style="color:var(--red); font-weight:700;">-৳50.00</span></div><div class="detail-row"><span>Order time</span><span>2025-07-27 21:54:12</span></div></div></td></tr><tr class="my-history-summary-row"><td class="history-cell-icon"><div class="bet-icon bet-icon-green">Green</div></td><td class="history-cell-details">  <div class="history-period">202507271907</div>  <div class="history-date">2025-07-27 21:53:40</div></td><td class="history-cell-result">  <div class="status-badge status-failed">Failed</div>  <div class="result-amount amount-loss">-৳50.00</div></td></tr><tr class="my-history-details-row"><td colspan="3"><div class="details-content-wrapper"><div class="detail-row"><span>Period</span><span>202507271907</span></div><div class="detail-row"><span>Purchase amount</span><span style="color:var(--text-dark);">৳50.00</span></div><div class="detail-row"><span>Quantity</span><span>1</span></div><div class="detail-row"><span>Amount after tax</span><span style="color:var(--red);">৳49.00</span></div><div class="detail-row"><span>Tax</span><span style="color:var(--red);">৳1.00</span></div><div class="detail-row"><span>Result</span><span><span style="color:var(--red);">6</span><span style="color:var(--red);">Red</span><span style="color:var(--orange);">Big</span></span></div><div class="detail-row"><span>Select</span><span>Green</span></div><div class="detail-row"><span>Status</span><span style="color:var(--red)">Loss</span></div><div class="detail-row"><span>Win/lose</span><span style="color:var(--red); font-weight:700;">-৳50.00</span></div><div class="detail-row"><span>Order time</span><span>2025-07-27 21:53:40</span></div></div></td></tr><tr class="my-history-summary-row"><td class="history-cell-icon"><div class="bet-icon bet-icon-big">Big</div></td><td class="history-cell-details">  <div class="history-period">202507271906</div>  <div class="history-date">2025-07-27 21:53:06</div></td><td class="history-cell-result">  <div class="status-badge status-failed">Failed</div>  <div class="result-amount amount-loss">-৳50.00</div></td></tr><tr class="my-history-details-row"><td colspan="3"><div class="details-content-wrapper"><div class="detail-row"><span>Period</span><span>202507271906</span></div><div class="detail-row"><span>Purchase amount</span><span style="color:var(--text-dark);">৳50.00</span></div><div class="detail-row"><span>Quantity</span><span>1</span></div><div class="detail-row"><span>Amount after tax</span><span style="color:var(--red);">৳49.00</span></div><div class="detail-row"><span>Tax</span><span style="color:var(--red);">৳1.00</span></div><div class="detail-row"><span>Result</span><span><span style="color:var(--red);">2</span><span style="color:var(--red);">Red</span><span style="color:var(--blue);">Small</span></span></div><div class="detail-row"><span>Select</span><span>Big</span></div><div class="detail-row"><span>Status</span><span style="color:var(--red)">Loss</span></div><div class="detail-row"><span>Win/lose</span><span style="color:var(--red); font-weight:700;">-৳50.00</span></div><div class="detail-row"><span>Order time</span><span>2025-07-27 21:53:06</span></div></div></td></tr>                        </tbody> 
                    </table>
                                        <div class="chart-pagination">
                                                <a href="?_t=1754067513177&my_page=1" class="disabled"><</a>
                        <span>1 / 3</span>
                                                <a href="?_t=1754067513177&my_page=2" class="">></a>
                    </div>
                                    </div>
            </div>
        </main>
    </div>

    <!-- বেট মডাল HTML -->
    <div class="bet-modal-overlay" id="betModalOverlay">
        <div class="bet-modal" id="betModal">
            <div class="bet-modal-header">
                <h3>Win Go 30sec</h3>
                <div class="bet-selection">Select <span id="betModalSelectionText"></span></div>
            </div>
            <div class="bet-modal-body">
                <div class="bet-options-row">
                    <div class="label">Balance</div>
                    <div class="controls" id="balanceButtons">
                        <button data-value="1">1</button>
                        <button data-value="100">100</button>
                        <button data-value="1000">1000</button>
                        <button data-value="10000">10000</button>
                    </div>
                </div>
                <div class="bet-options-row">
                    <div class="label">Quantity</div>
                    <div class="controls combined-quantity-multiplier">
                         <div class="quantity-control">
                            <button id="quantityMinus">-</button>
                            <input type="number" id="quantityInput" value="1" min="1">
                            <button id="quantityPlus">+</button>
                        </div>
                        <div class="multiplier-controls">
                            <button data-multiplier="1">X1</button>
                            <button data-multiplier="5">X5</button>
                            <button data-multiplier="10">X10</button>
                            <button data-multiplier="20">X20</button>
                         </div>
                    </div>
                </div>

                <div class="bet-agreement">
                     <div class="check-icon" id="agreeIcon">✓</div>
                    <label id="agreeLabel">I agree</label>
                    <a href="#">⟨Pre-sale rules⟩</a>
                </div>
            </div>
            <div class="bet-modal-actions">
                <button id="cancelBet">Cancel</button>
                <button id="confirmBet">Total amount ৳1.00</button>
            </div>
        </div>
    </div>
    
    <div class="result-popup-overlay" id="resultPopupOverlay"> <div class="result-popup-card" id="resultPopupCard"> <div class="confetti-container" id="confettiContainer"></div> <div class="result-popup-header" id="resultPopupHeader"> <div class="popup-icon" id="popupIcon"></div> <h2 class="popup-status-title" id="popupStatusTitle"></h2> <p class="popup-amount" id="popupAmount"></p> <svg class="header-wave" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"> <path fill="#ffffff" fill-opacity="0.3" d="M0,224L48,229.3C96,235,192,245,288,250.7C384,256,480,256,576,234.7C672,213,768,171,864,165.3C960,160,1056,192,1152,197.3C1248,203,1344,181,1392,170.7L1440,160L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path> <path fill="#ffffff" fill-opacity="1" d="M0,288L48,272C96,256,192,224,288,218.7C384,213,480,235,576,245.3C672,256,768,256,864,240C960,224,1056,192,1152,186.7C1248,181,1344,203,1392,213.3L1440,224L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path> </svg> </div> <div class="result-popup-body"> <p class="result-label">Result Details</p> <div class="result-details"> <div class="detail-item"> <span>Period</span> <span id="popupPeriod"></span> </div> <div class="detail-item"> <span>Number</span> <span id="popupNumber"></span> </div> </div> <div class="result-tags" id="popupTags"></div> <button class="result-popup-close-btn" id="resultPopupCloseBtn">Continue</button> </div> </div> </div>
    <div id="toast-notification"></div>

<script>
$(document).ready(function() {
    const countdownTickSound = new Audio('/sounds/countdown-tick.mp3');
    countdownTickSound.preload = 'auto';
    const timesUpSound = new Audio('/sounds/times-up.mp3');
    timesUpSound.preload = 'auto';
    
    // --- পরিবর্তন শুরু: স্বয়ংক্রিয় রিলোড বাস্তবায়ন ---
    const shouldAutoReload = false;
    
    // showToast ফাংশনটি আগে সংজ্ঞায়িত করা হয়েছে, তাই আমরা এটি এখানে ব্যবহার করতে পারি।
    function showToast(message) { 
        $("#toast-notification").text(message).addClass("show").delay(3000).queue(function(next){ 
            $(this).removeClass("show"); 
            next(); 
        }); 
    }

    if (shouldAutoReload) {
        // ব্যবহারকারীকে জানানো হচ্ছে যে ফলাফল প্রসেস করা হচ্ছে।
        showToast('Result processing... Reloading shortly.');
        
        // ২.৫ সেকেন্ড পরে পেজটি রিলোড করার জন্য টাইমার সেট করা হচ্ছে।
        setTimeout(function() {
            const url = new URL(window.location.href);
            // ক্যাশ এড়াতে ইউআরএলে একটি টাইমস্ট্যাম্প যোগ করা হচ্ছে।
            url.searchParams.set('_t', new Date().getTime()); 
            window.location.href = url.toString();
        }, 2500); // ২.৫ সেকেন্ড বিলম্ব
    }


    // পরিবর্তিত সেশন স্টোরেজ কী
    $(window).on('beforeunload', function() {
        sessionStorage.setItem('wingo30sec_scrollPos', window.scrollY);
    });
    const lastTab = sessionStorage.getItem('wingo30sec_lastTab');
    const scrollPos = sessionStorage.getItem('wingo30sec_scrollPos');

    $('.history-tab-btn').removeClass('active');
    $('.history-content').removeClass('active');
    if (lastTab && $(`[data-tab="${lastTab}"]`).length) {
        $(`[data-tab="${lastTab}"]`).addClass('active');
        $('#' + lastTab).addClass('active');
    } else {
        $('[data-tab="game_history"]').addClass('active');
        $('#game_history').addClass('active');
    }
    if (scrollPos) { window.scrollTo(0, parseInt(scrollPos, 10)); }
    if ($('#chart').is('.active')) { setTimeout(drawChartLines, 50); }
    $('#loadingCurtain').css('opacity', '0');
    
    $('.history-tab-btn').on('click', function() {
        if ($(this).hasClass('active')) return;
        const tabId = $(this).data('tab');
        $('.history-tab-btn').removeClass('active');
        $(this).addClass('active');
        $('.history-content').removeClass('active');
        $('#' + tabId).addClass('active');
        // পরিবর্তিত সেশন স্টোরেজ কী
        sessionStorage.setItem('wingo30sec_lastTab', tabId);
        if (tabId === 'chart') { setTimeout(drawChartLines, 50); }
    });

    $('#my_history').on('click', '.my-history-summary-row', function() {
        var currentDetails = $(this).next('.my-history-details-row');
        $('.my-history-details-row').not(currentDetails).slideUp('fast');
        currentDetails.slideToggle('fast');
    });

    let betAmount=1,quantity=1,currentBetType="",currentBetColor="";
    let countdownInterval;
    let isReloading=!1;
    let isAgreed = true; 
    const paddingLength = 4;

    function launchConfetti(){const c=$("#confettiContainer");c.empty();const co=["red","green","blue","yellow","violet"];for(let i=0;i<50;i++){const cf=$("<div></div>").addClass("confetti "+co[Math.floor(Math.random()*co.length)]);cf.css({left:Math.random()*100+"%",animationDelay:Math.random()*2+"s",transform:`rotate(${Math.random()*360}deg)`});c.append(cf)}}
    function showResultPopup(s,a,wN,p){const o=$("#resultPopupOverlay"),h=$("#resultPopupHeader"),i=$("#popupIcon"),t=$("#popupStatusTitle"),x=$("#popupAmount"),b=$("#resultPopupCloseBtn"),wI=`<svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 24 24" fill="none" stroke="#FFD700" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 8V21M12 8H8C6.89543 8 6 8.89543 6 10V18C6 19.1046 6.89543 20 8 20H12M12 8H16C17.1046 8 18 8.89543 18 10V18C18 19.1046 17.1046 20 16 20H12M6 14H4M18 14H20M12 2L15 5L12 8L9 5L12 2Z"/></svg>`,lI=`<svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6L6 18M6 6l12 12"/></svg>`;$("#popupPeriod").text(p);$("#popupNumber").text(wN);if(s==="win"){h.removeClass("loss").addClass("win");i.html(wI);t.text("Congratulations!");x.text(`You Won ৳${parseFloat(a).toFixed(2)}`);b.removeClass("close-win-btn").addClass("close-win-btn");setTimeout(launchConfetti,100)}else{h.removeClass("win").addClass("loss");i.html(lI);t.text("Better Luck Next Time");x.text(`You Lost ৳${parseFloat(a).toFixed(2)}`);b.removeClass("close-win-btn").addClass("close-loss-btn");$("#confettiContainer").empty()}const tc=$("#popupTags");tc.empty();let wNI=parseInt(wN,10);const nt=$("<div></div>").addClass("result-tag tag-number").text(wNI);let th="";if($.inArray(wNI, [1, 3, 5, 7, 9]) !== -1){th+=`<div class="result-tag" style="background-color: var(--green);">Green</div>`}if($.inArray(wNI, [0, 2, 4, 6, 8]) !== -1){th+=`<div class="result-tag" style="background-color: var(--red);">Red</div>`}if($.inArray(wNI, [0, 5]) !== -1){th+=`<div class="result-tag" style="background-color: var(--violet);">Violet</div>`;}th+=wNI>=5?`<div class="result-tag" style="background-color: var(--orange);">Big</div>`:`<div class="result-tag" style="background-color: var(--blue);">Small</div>`;tc.html(th).prepend(nt);o.addClass("show")}
    function hideResultPopup(){$("#resultPopupOverlay").removeClass("show")}
    $("#resultPopupOverlay").on("click",function(e){if($(e.target).is(this)){hideResultPopup()}});$("#resultPopupCloseBtn").on("click",hideResultPopup);
    
        
    function runCountdown() { 
        if (isReloading || shouldAutoReload) return; // স্বয়ংক্রিয় রিলোড চলাকালীন কাউন্টডাউন রিলোড বন্ধ রাখুন
        const slotDuration = 30; 
        const serverTime = Math.floor(Date.now() / 1000); 
        let distance = slotDuration - (serverTime % slotDuration); 
        distance = distance % slotDuration; 
        const minutes = Math.floor(distance / 60); 
        const seconds = distance % 60; 
        const minStr = ('0' + minutes).slice(-2); 
        const secStr = ('0' + seconds).slice(-2); 
        $('#countdown').html('<span>' + minStr[0] + '</span><span>' + minStr[1] + '</span><span style="background:none;color:#fff;padding:0 2px;">:</span><span>' + secStr[0] + '</span><span>' + secStr[1] + '</span>'); 
        const now = new Date(serverTime * 1000);
        const year = now.getUTCFullYear();
        const month = String(now.getUTCMonth() + 1).padStart(2, '0');
        const day = String(now.getUTCDate()).padStart(2, '0');
        const datePart = `${year}${month}${day}`;
        const secondsIntoDay = (now.getUTCHours() * 3600) + (now.getUTCMinutes() * 60) + now.getUTCSeconds();
        const slotOfTheDay = Math.floor(secondsIntoDay / slotDuration);
        const calculatedPeriodId = datePart + String(slotOfTheDay).padStart(paddingLength, '0');
        $('.ticket-period').text(calculatedPeriodId);
        
        if (distance > 5) { 
            $('.bet-btn').prop('disabled', false).css('cursor', 'pointer'); 
            $('#finalCountdownOverlay').fadeOut(200); 
        } else { 
            $('.bet-btn').prop('disabled', true).css('cursor', 'not-allowed'); 
            if (!$('#finalCountdownOverlay').is(':visible')) { 
                $('#finalCountdownOverlay').css('display', 'flex').hide().fadeIn(200); 
            } 

            if (distance >= 1 && distance <= 5) {
                countdownTickSound.currentTime = 0; 
                countdownTickSound.play().catch(e => console.error("Sound play failed:", e));
            } else if (distance === 0) { 
                timesUpSound.currentTime = 0;
                timesUpSound.play().catch(e => console.error("Sound play failed:", e)); 
            }
            
            if (distance === 0) {
                if (!isReloading) { 
                    isReloading = true; 
                    clearInterval(countdownInterval);
                    setTimeout(() => {
                        const url = new URL(window.location.href);
                        url.searchParams.set('_t', new Date().getTime()); 
                        window.location.href = url.toString();
                    }, 2000); 
                } 
            } else { 
                const secRemStr = ('0' + distance).slice(-2); 
                $('#finalCountdownTimer').html(`<div>${secRemStr[0]}</div><div>${secRemStr[1]}</div>`);
                $('#loadingText').text(''); 
            } 
        } 
    }
    countdownInterval = setInterval(runCountdown, 1000); 
    runCountdown();

    $('.bet-btn').on('click', function() { 
        if ($(this).is(':disabled')) return; 
        
        betAmount = 1; 
        quantity = 1; 
        isAgreed = true;
        $('#balanceButtons button').removeClass('active').first().addClass('active');
        $('.multiplier-controls button').removeClass('active').first().addClass('active');
        $('#quantityInput').val(1);
        $('#agreeIcon').css('background-color', 'var(--green)');
        $('#confirmBet').prop('disabled', false);


        currentBetType = $(this).data('bet-type'); 
        currentBetColor = $(this).data('color') || 'var(--primary-color)';
        
        $('#betModal').get(0).style.setProperty('--current-bet-color', currentBetColor);
        
        $('#betModalSelectionText').text(currentBetType);
        $('#betModalOverlay').fadeIn(200); 
        $('#betModal').addClass('show'); 
        updateTotal(); 
    });

    function closeModal() { $('#betModal').removeClass('show'); $('#betModalOverlay').fadeOut(300); }
    $('#cancelBet, #betModalOverlay').on('click', function(e) { if(e.target.id === 'cancelBet' || $(e.target).is('#betModalOverlay')) { closeModal(); } });
    
    $('#balanceButtons button').on('click', function() {
        $(this).addClass('active').siblings().removeClass('active');
        betAmount = parseInt($(this).data('value'));
        updateTotal();
    });
    
    $('.multiplier-controls button').on('click', function() {
        $('.multiplier-controls button').removeClass('active');
        $(this).addClass('active')
        let multiplier = parseInt($(this).data('multiplier'));
        $('#quantityInput').val(multiplier);
        quantity = multiplier;
        updateTotal();
    });

    $('#quantityPlus').on('click', () => updateQuantity(1));
    $('#quantityMinus').on('click', () => updateQuantity(-1));

    function updateQuantity(change) {
        let currentVal = parseInt($('#quantityInput').val()) || 1;
        let newVal = currentVal + change;
        if (newVal < 1) newVal = 1;
        $('#quantityInput').val(newVal);
        quantity = newVal;
        $('.multiplier-controls button').removeClass('active');
        $(`.multiplier-controls button[data-multiplier="${newVal}"]`).addClass('active');
        updateTotal();
    }
    
    $('#quantityInput').on('input', function() {
        quantity = parseInt($(this).val()) || 1;
        if(quantity < 1) {
            quantity = 1;
            $(this).val(1);
        }
        $('.multiplier-controls button').removeClass('active');
        $(`.multiplier-controls button[data-multiplier="${quantity}"]`).addClass('active');
        updateTotal();
    });

    $('#agreeLabel, #agreeIcon').on('click', function() {
        isAgreed = !isAgreed;
        $('#confirmBet').prop('disabled', !isAgreed);
        $('#agreeIcon').css('background-color', isAgreed ? 'var(--green)' : '#ccc');
    });

    function updateTotal() { 
        let total = betAmount * quantity; 
        $('#confirmBet').text('Total amount ৳' + total.toFixed(2));
    }
    
    $('#confirmBet').on('click', function() { 
        if(!isAgreed) return;
        let totalAmount = betAmount * quantity; 
        const btn = $(this).prop('disabled', true).text('Processing...');
        const periodForBet = $('.ticket-period').text(); 
        $.post(window.location.href, { 
            action: 'place_bet', 
            period: periodForBet,
            ans: currentBetType, 
            amount: totalAmount 
        }).done(response => { 
            if (response.success) { 
                showToast(response.message); 
                $('#balancetop').text('Updating...'); 
                setTimeout(() => window.location.reload(), 800); 
            } else { 
                showToast('Error: ' + (response.message || 'Unknown error.')); 
                btn.prop('disabled', false); 
                updateTotal(); 
            } 
        }).fail(() => { 
            showToast('An unknown network error occurred.'); 
            btn.prop('disabled', false); 
            updateTotal(); 
        }).always(() => closeModal()); 
    });

    function drawChartLines() {
        const svg = document.getElementById('chart-svg-lines'); const container = document.querySelector('.chart-trend-container');
        if (!svg || !container) return; svg.innerHTML = '';
        const activeNumbers = $(container).find('.active-number');
        if (activeNumbers.length < 2) return;
        svg.setAttribute('viewBox', `0 0 ${container.offsetWidth} ${container.offsetHeight}`);
        activeNumbers.each(function(index) {
            if (index > 0) {
                const circle = this; const prevCircle = activeNumbers[index - 1];
                const containerRect = container.getBoundingClientRect(); const circleRect = circle.getBoundingClientRect(); const prevRect = prevCircle.getBoundingClientRect();
                const currentPoint = { x: circleRect.left - containerRect.left + (circleRect.width / 2), y: circleRect.top - containerRect.top + (circleRect.height / 2), num: $(circle).data('num') };
                const previousPoint = { x: prevRect.left - containerRect.left + (prevRect.width / 2), y: prevRect.top - containerRect.top + (prevRect.height / 2), num: $(prevCircle).data('num') };
                const line = document.createElementNS('http://www.w3.org/2000/svg', 'line');
                line.setAttribute('x1', previousPoint.x); line.setAttribute('y1', previousPoint.y);
                line.setAttribute('x2', currentPoint.x); line.setAttribute('y2', currentPoint.y);
                line.setAttribute('stroke', 'var(--red)'); line.setAttribute('stroke-linecap', 'round');
                if (previousPoint.num === currentPoint.num) { line.setAttribute('stroke-width', '2'); } 
                else { line.setAttribute('stroke-width', '1.5'); line.setAttribute('stroke-dasharray', '3 3'); }
                svg.appendChild(line);
            }
        });
    }
    
    if ($('#chart').is('.active')) { drawChartLines(); }
    $(window).on('resize', function() { if ($('#chart').is('.active')) { drawChartLines(); } });
});
</script>

</body>
</html>
<!-- Premium GV-Style Bottom Navigation (Large Icons) -->
<style>
  .gv-bottom-nav {
    position: fixed;
    bottom: 0;
    left: 0;
    width: 100%;
    background: rgba(17, 24, 39, 0.95);
    backdrop-filter: blur(12px);
    display: flex;
    justify-content: space-around;
    align-items: center;
    padding: 12px 0;
    z-index: 1000;
    box-shadow: 0 -5px 15px rgba(0, 0, 0, 0.6);
    border-top-left-radius: 16px;
    border-top-right-radius: 16px;
  }
  .gv-bottom-nav a {
    flex: 1;
    text-align: center;
    font-size: 13px;
    color: #aaa;
    text-decoration: none;
    transition: all 0.3s ease;
  }
  .gv-bottom-nav a .icon-wrap {
    background: rgba(129, 140, 248, 0.08);
    width: 48px;
    height: 48px;
    margin: 0 auto 6px;
    border-radius: 16px;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
  }
  .gv-bottom-nav a .icon-wrap i {
    font-size: 20px;
    transition: transform 0.3s ease, color 0.3s ease;
  }
  .gv-bottom-nav a:hover .icon-wrap {
    background: rgba(129, 140, 248, 0.2);
    transform: scale(1.1);
  }
  .gv-bottom-nav a.active {
    color: #a78bfa;
    font-weight: 600;
  }
  .gv-bottom-nav a.active .icon-wrap {
    background: #a78bfa20;
    animation: pulseGlow 1.8s infinite;
  }
  .gv-bottom-nav a.active .icon-wrap i {
    color: #a78bfa;
  }

  @keyframes pulseGlow {
    0%, 100% {
      box-shadow: 0 0 5px #a78bfa, 0 0 10px #a78bfa;
    }
    50% {
      box-shadow: 0 0 15px #c084fc, 0 0 25px #c084fc;
    }
  }
</style>

<div class="gv-bottom-nav">
  <a href="index.php" class="<?= basename($_SERVER['PHP_SELF']) == 'index.php' ? 'active' : '' ?>">
    <div class="icon-wrap"><i class="fas fa-home"></i></div>
    Main
  </a>
  <a href="deposit.html" class="<?= basename($_SERVER['PHP_SELF']) == 'deposit.html' ? 'active' : '' ?>">
    <div class="icon-wrap"><i class="fas fa-arrow-down"></i></div>
    Deposit
  </a>
    <a href="refer.php" class="<?= basename($_SERVER['PHP_SELF']) == 'refer.php' ? 'active' : '' ?>">
    <div class="icon-wrap"><i class="fas fa-bullhorn"></i></div>
    Promotion
  </a>
  <a href="withdraw.html" class="<?= basename($_SERVER['PHP_SELF']) == 'withdraw.html' ? 'active' : '' ?>">
    <div class="icon-wrap"><i class="fas fa-arrow-up"></i></div>
    Withdraw
  </a>
  <a href="main.php" class="<?= basename($_SERVER['PHP_SELF']) == 'main.php' ? 'active' : '' ?>">
    <div class="icon-wrap"><i class="fas fa-gamepad"></i></div>
    Games
  </a>
</div>

<script src="assets/js/shared_bottom_nav.js"></script>

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
