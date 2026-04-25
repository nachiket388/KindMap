<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>KindMap — Volunteer Dashboard</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Instrument+Serif:ital@0;1&family=DM+Sans:opsz,wght@9..40,300;9..40,400;9..40,500;9..40,600&display=swap" rel="stylesheet">
<link rel='stylesheet' href='../style/style4.css'>
</head>
<body>

<!-- SIDEBAR -->
<aside>
  <div class="sidebar-logo">
    <div class="logo-mark">🌿</div>
    <div class="logo-text">Kind<em>Map</em></div>
  </div>
  <div class="sidebar-user" onclick="showPage('profile',document.querySelector('[data-page=profile]'))">
    <div class="user-av">A</div>
    <div>
      <div class="user-name">Arjun Das</div>
      <div class="user-pts"><span class="pts-shine">⭐ 840 points</span></div>
    </div>
    <div class="rank-badge">#14</div>
  </div>
  <nav>
    <div class="nav-label">Main</div>
    <a class="nav-item active" data-page="browse" onclick="showPage('browse',this)"><span class="nav-icon">🔍</span>Browse tasks<span class="nav-badge">6</span></a>
    <a class="nav-item" data-page="mytasks" onclick="showPage('mytasks',this)"><span class="nav-icon">📋</span>My tasks</a>
    <a class="nav-item" data-page="profile" onclick="showPage('profile',this)"><span class="nav-icon">👤</span>My profile</a>
    <a class="nav-item" data-page="leaderboard" onclick="showPage('leaderboard',this)"><span class="nav-icon">🏆</span>Leaderboard</a>
    <div class="nav-sep"></div>
    <div class="nav-label">Community</div>
    <a class="nav-item" onclick="showPage('browse',document.querySelector('[data-page=browse]'))"><span class="nav-icon">🗺️</span>Impact map</a>
    <a class="nav-item" href="#"><span class="nav-icon">🏅</span>Badges</a>
    <div class="nav-sep"></div>
  </nav>
  <div class="sidebar-bottom">
    <a class="nav-item" href="#"><span class="nav-icon">⚙️</span>Settings</a>
    <a class="nav-item" href="index.html"><span class="nav-icon">🚪</span>Sign out</a>
  </div>
</aside>

<!-- MAIN -->
<main>
  <div class="topbar">
    <div class="topbar-left">
      <div class="topbar-title" id="page-title">Browse tasks</div>
    </div>
    <div class="topbar-right">
      <button class="ai-btn" onclick="toggleChat()">
        <div class="ai-btn-dot"></div>
        Ask AI to match me
      </button>
      <div class="icon-btn notif-dot" title="Notifications">🔔</div>
      <div class="icon-btn" title="Settings">⚙️</div>
    </div>
  </div>

  <div class="content">

    <!-- ══════ BROWSE PAGE ══════ -->
    <div class="page active" id="page-browse">

      <!-- STATS -->
      <div class="stats-row">
        <div class="stat-card">
          <div class="stat-card-icon icon-gold">⭐</div>
          <div class="stat-card-n">840</div>
          <div class="stat-card-l">Points earned</div>
          <div class="stat-card-sub sub-up">↑ 120 this week</div>
        </div>
        <div class="stat-card">
          <div class="stat-card-icon icon-sage">✅</div>
          <div class="stat-card-n">12</div>
          <div class="stat-card-l">Tasks completed</div>
          <div class="stat-card-sub sub-up">2 this month</div>
        </div>
        <div class="stat-card">
          <div class="stat-card-icon icon-clay">⏱️</div>
          <div class="stat-card-n">38h</div>
          <div class="stat-card-l">Hours volunteered</div>
          <div class="stat-card-sub" style="color:rgba(13,17,23,0.4)">All time</div>
        </div>
        <div class="stat-card">
          <div class="stat-card-icon icon-mist">🏙️</div>
          <div class="stat-card-n">#14</div>
          <div class="stat-card-l">City rank</div>
          <div class="stat-card-sub sub-rank">Top 1% in Kolkata</div>
        </div>
      </div>

      <!-- WEEKLY ACTIVITY BAR -->
      <div class="impact-bar-wrap">
        <div class="impact-bar-head">
          <div class="impact-bar-title">This week's activity</div>
          <div class="impact-bar-meta">Apr 13 – Apr 19, 2025 &nbsp;·&nbsp; 7.5 hrs total</div>
        </div>
        <div style="display:flex;gap:0;padding-top:6px">
          <div style="flex:1">
            <div class="week-bars">
              <div class="bar-group"><div class="wbar" style="height:30%"></div><div class="wbar-label">Mon</div></div>
              <div class="bar-group"><div class="wbar" style="height:55%"></div><div class="wbar-label">Tue</div></div>
              <div class="bar-group"><div class="wbar" style="height:20%"></div><div class="wbar-label">Wed</div></div>
              <div class="bar-group"><div class="wbar" style="height:80%"></div><div class="wbar-label">Thu</div></div>
              <div class="bar-group"><div class="wbar" style="height:45%"></div><div class="wbar-label">Fri</div></div>
              <div class="bar-group"><div class="wbar today" style="height:65%"></div><div class="wbar-label" style="color:var(--sage);font-weight:600">Sat</div></div>
              <div class="bar-group"><div class="wbar" style="height:10%"></div><div class="wbar-label">Sun</div></div>
            </div>
          </div>
          <div style="width:160px;padding-left:24px;display:flex;flex-direction:column;justify-content:center;gap:10px;border-left:1px solid var(--border)">
            <div style="font-size:11px;color:rgba(13,17,23,0.4)">Streak</div>
            <div style="font-family:var(--serif);font-size:26px;color:var(--clay)">🔥 5 days</div>
            <div style="font-size:11px;color:rgba(13,17,23,0.35)">Keep going — best is 8!</div>
          </div>
        </div>
      </div>

      <!-- TASKS HEADER -->
      <div class="section-head">
        <div class="section-title">Available tasks</div>
        <div class="filter-row">
          <button class="filter-chip on" onclick="filterChip(this)">All</button>
          <button class="filter-chip" onclick="filterChip(this)">Education</button>
          <button class="filter-chip" onclick="filterChip(this)">Environment</button>
          <button class="filter-chip" onclick="filterChip(this)">Relief</button>
          <button class="filter-chip" onclick="filterChip(this)">Health</button>
          <button class="filter-chip" onclick="filterChip(this)">📍 Near me</button>
        </div>
      </div>

      <!-- TASK GRID -->
      <div class="task-grid">
        <!-- CARD 1 -->
        <div class="task-card" onclick="openCheckin('Flood relief supply sorting','Salt Lake','200')">
          <div class="task-card-top">
            <span class="task-tag tag-u">Urgent</span>
            <button class="task-save" onclick="event.stopPropagation();toggleSave(this)" title="Save">♡</button>
          </div>
          <div class="task-name">Flood relief supply sorting</div>
          <div class="task-org">Red Cross Kolkata Chapter</div>
          <div class="task-meta"><span>📍 Salt Lake</span><span>🕐 3 hrs</span><span>📅 Tomorrow</span></div>
          <div class="task-bar"><div class="task-fill fill-clay" style="width:0" data-w="72"></div></div>
          <div class="task-slots">13 / 18 volunteers</div>
          <div class="task-footer">
            <span class="task-pts">⭐ 200 pts</span>
            <button class="btn-accept" onclick="event.stopPropagation();openCheckin('Flood relief supply sorting','Salt Lake','200')">Accept</button>
          </div>
        </div>

        <!-- CARD 2 -->
        <div class="task-card" onclick="openCheckin('Teach digital literacy to seniors','Park Street','120')">
          <div class="task-card-top">
            <span class="task-tag tag-ai">✦ AI matched</span>
            <button class="task-save" onclick="event.stopPropagation();toggleSave(this)" title="Save">♡</button>
          </div>
          <div class="task-name">Teach digital literacy to seniors</div>
          <div class="task-org">Prayas Foundation</div>
          <div class="task-meta"><span>📍 Park Street</span><span>🕐 2 hrs</span><span>📅 Sat, Apr 19</span></div>
          <div class="task-bar"><div class="task-fill fill-gold" style="width:0" data-w="40"></div></div>
          <div class="task-slots">4 / 10 volunteers</div>
          <div class="ai-match-why">✦ Matched on: Teaching, Bengali</div>
          <div class="task-footer">
            <span class="task-pts">⭐ 120 pts</span>
            <button class="btn-accept" onclick="event.stopPropagation();openCheckin('Teach digital literacy to seniors','Park Street','120')">Accept</button>
          </div>
        </div>

        <!-- CARD 3 -->
        <div class="task-card" onclick="openCheckin('Tree plantation — Rabindra Sarobar','Dhakuria','150')">
          <div class="task-card-top">
            <span class="task-tag tag-o">Open</span>
            <button class="task-save" onclick="event.stopPropagation();toggleSave(this)" title="Save">♡</button>
          </div>
          <div class="task-name">Tree plantation — Rabindra Sarobar</div>
          <div class="task-org">Green Kolkata Initiative</div>
          <div class="task-meta"><span>📍 Dhakuria</span><span>🕐 Half day</span><span>📅 Sun, Apr 20</span></div>
          <div class="task-bar"><div class="task-fill fill-sage" style="width:0" data-w="20"></div></div>
          <div class="task-slots">5 / 25 volunteers</div>
          <div class="task-footer">
            <span class="task-pts">⭐ 150 pts</span>
            <button class="btn-accept" onclick="event.stopPropagation();openCheckin('Tree plantation — Rabindra Sarobar','Dhakuria','150')">Accept</button>
          </div>
        </div>

        <!-- CARD 4 - FILLED -->
        <div class="task-card" style="opacity:0.65">
          <div class="task-card-top">
            <span class="task-tag tag-f">Filled</span>
            <button class="task-save" onclick="event.stopPropagation()" title="Save" style="opacity:0.3;cursor:default">♡</button>
          </div>
          <div class="task-name">Blood donation camp setup</div>
          <div class="task-org">Rotary Club South Kolkata</div>
          <div class="task-meta"><span>📍 Alipore</span><span>🕐 4 hrs</span><span>📅 Mon, Apr 21</span></div>
          <div class="task-bar"><div class="task-fill fill-sage" style="width:0" data-w="100"></div></div>
          <div class="task-slots">20 / 20 volunteers</div>
          <div class="task-footer">
            <span class="task-pts">⭐ 180 pts</span>
            <button class="btn-accept btn-filled" disabled>Full</button>
          </div>
        </div>

        <!-- CARD 5 -->
        <div class="task-card" onclick="openCheckin('After-school tutoring — Maths','Behala','100')">
          <div class="task-card-top">
            <span class="task-tag tag-ai">✦ AI matched</span>
            <button class="task-save" onclick="event.stopPropagation();toggleSave(this)" title="Save">♡</button>
          </div>
          <div class="task-name">After-school tutoring — Maths</div>
          <div class="task-org">Vidya Daan Trust</div>
          <div class="task-meta"><span>📍 Behala</span><span>🕐 1.5 hrs</span><span>📅 Wed, Apr 23</span></div>
          <div class="task-bar"><div class="task-fill fill-gold" style="width:0" data-w="30"></div></div>
          <div class="task-slots">3 / 10 volunteers</div>
          <div class="ai-match-why">✦ Matched on: Teaching, 2km away</div>
          <div class="task-footer">
            <span class="task-pts">⭐ 100 pts</span>
            <button class="btn-accept" onclick="event.stopPropagation();openCheckin('After-school tutoring — Maths','Behala','100')">Accept</button>
          </div>
        </div>

        <!-- CARD 6 -->
        <div class="task-card" onclick="openCheckin('Weekend meal distribution drive','Tollygunge','130')">
          <div class="task-card-top">
            <span class="task-tag tag-o">Open</span>
            <button class="task-save" onclick="event.stopPropagation();toggleSave(this)" title="Save">♡</button>
          </div>
          <div class="task-name">Weekend meal distribution drive</div>
          <div class="task-org">Annapurna Food Bank</div>
          <div class="task-meta"><span>📍 Tollygunge</span><span>🕐 2 hrs</span><span>📅 Sat, Apr 19</span></div>
          <div class="task-bar"><div class="task-fill fill-sage" style="width:0" data-w="55"></div></div>
          <div class="task-slots">11 / 20 volunteers</div>
          <div class="task-footer">
            <span class="task-pts">⭐ 130 pts</span>
            <button class="btn-accept" onclick="event.stopPropagation();openCheckin('Weekend meal distribution drive','Tollygunge','130')">Accept</button>
          </div>
        </div>
      </div>

      <!-- MAP + FEED ROW -->
      <div class="map-strip">
        <div class="map-strip-head">
          <div style="font-family:var(--serif);font-size:15px">Tasks near you — Kolkata</div>
          <div style="font-size:12px;color:rgba(13,17,23,0.4)">5 tasks within 8 km</div>
        </div>
        <div class="map-canvas">
          <div class="map-grid"></div>
          <!-- Roads -->
          <div class="map-road-h" style="top:38%;height:10px"></div>
          <div class="map-road-h" style="top:62%;height:7px"></div>
          <div class="map-road-v" style="left:30%;width:8px"></div>
          <div class="map-road-v" style="left:60%;width:6px"></div>
          <div class="map-road-v" style="left:78%;width:5px"></div>
          <!-- You -->
          <div class="map-you" style="left:42%;top:48%"></div>
          <!-- Pins -->
          <div class="map-pin" style="left:28%;top:36%">
            <svg width="22" height="28" viewBox="0 0 22 28"><path d="M11 0C5 0 0 5 0 11c0 8 11 17 11 17s11-9 11-17C22 5 17 0 11 0z" fill="#c4602a"/><circle cx="11" cy="11" r="5" fill="white"/></svg>
            <div class="map-pin-label">Salt Lake · Flood relief</div>
          </div>
          <div class="map-pin" style="left:56%;top:28%">
            <svg width="22" height="28" viewBox="0 0 22 28"><path d="M11 0C5 0 0 5 0 11c0 8 11 17 11 17s11-9 11-17C22 5 17 0 11 0z" fill="#3d6b4f"/><circle cx="11" cy="11" r="5" fill="white"/></svg>
            <div class="map-pin-label">Park Street · Digital literacy</div>
          </div>
          <div class="map-pin" style="left:38%;top:70%">
            <svg width="22" height="28" viewBox="0 0 22 28"><path d="M11 0C5 0 0 5 0 11c0 8 11 17 11 17s11-9 11-17C22 5 17 0 11 0z" fill="#3d6b4f"/><circle cx="11" cy="11" r="5" fill="white"/></svg>
            <div class="map-pin-label">Dhakuria · Tree plantation</div>
          </div>
          <div class="map-pin" style="left:71%;top:55%">
            <svg width="22" height="28" viewBox="0 0 22 28"><path d="M11 0C5 0 0 5 0 11c0 8 11 17 11 17s11-9 11-17C22 5 17 0 11 0z" fill="#3d6b4f"/><circle cx="11" cy="11" r="5" fill="white"/></svg>
            <div class="map-pin-label">Behala · Maths tutoring</div>
          </div>
          <div class="map-pin" style="left:20%;top:62%">
            <svg width="22" height="28" viewBox="0 0 22 28"><path d="M11 0C5 0 0 5 0 11c0 8 11 17 11 17s11-9 11-17C22 5 17 0 11 0z" fill="#3d6b4f"/><circle cx="11" cy="11" r="5" fill="white"/></svg>
            <div class="map-pin-label">Tollygunge · Meal drive</div>
          </div>
        </div>
        <div class="map-legend">
          <div class="legend-item"><div class="legend-dot" style="background:var(--clay)"></div> Urgent</div>
          <div class="legend-item"><div class="legend-dot" style="background:var(--sage)"></div> Open</div>
          <div class="legend-item"><div class="legend-dot" style="background:var(--clay);opacity:0.5;box-shadow:0 0 0 4px rgba(196,96,42,0.15)"></div> You</div>
        </div>
      </div>

      <!-- FEED + LEADERBOARD -->
      <div class="two-col">
        <div class="feed-card">
          <div class="feed-head">
            <div class="feed-title">Community activity</div>
            <div class="live-dot">Live</div>
          </div>
          <div class="feed-list" id="feedList">
            <div class="feed-item">
              <div class="feed-av" style="background:#4a7d5e">P</div>
              <div class="feed-content">
                <div class="feed-text"><strong>Priya S.</strong> just checked in at the meal distribution drive in Tollygunge<span class="feed-action">+130 pts</span></div>
                <div class="feed-time">2 minutes ago</div>
              </div>
            </div>
            <div class="feed-item">
              <div class="feed-av" style="background:#7c6bb5">R</div>
              <div class="feed-content">
                <div class="feed-text"><strong>Rohit S.</strong> earned the <strong>🌿 Eco Warrior</strong> badge after tree plantation at Rabindra Sarobar</div>
                <div class="feed-time">18 minutes ago</div>
              </div>
            </div>
            <div class="feed-item">
              <div class="feed-av" style="background:#b05e35">M</div>
              <div class="feed-content">
                <div class="feed-text"><strong>Meera B.</strong> completed the flood relief task in Salt Lake<span class="feed-action">+200 pts</span></div>
                <div class="feed-time">34 minutes ago</div>
              </div>
            </div>
            <div class="feed-item">
              <div class="feed-av" style="background:#3d6b4f">T</div>
              <div class="feed-content">
                <div class="feed-text"><strong>Tanisha D.</strong> joined the blood donation camp setup in Alipore — last slot filled!</div>
                <div class="feed-time">1 hour ago</div>
              </div>
            </div>
            <div class="feed-item">
              <div class="feed-av" style="background:#c9922a">A</div>
              <div class="feed-content">
                <div class="feed-text"><strong>You</strong> completed the health awareness camp in Dum Dum<span class="feed-action">+160 pts</span></div>
                <div class="feed-time">Yesterday</div>
              </div>
            </div>
          </div>
        </div>

        <div class="lb-card">
          <div class="lb-head">
            <div style="font-family:var(--serif);font-size:15px">City leaderboard</div>
            <div style="font-size:11px;color:rgba(13,17,23,0.4)">Kolkata · This month</div>
          </div>
          <div class="lb-list">
            <div class="lb-item">
              <div class="lb-rank gold">🥇</div>
              <div class="lb-av" style="background:#4a7d5e">P</div>
              <div class="lb-name">Priya Sharma</div>
              <div class="lb-pts">⭐ 1,420</div>
            </div>
            <div class="lb-item">
              <div class="lb-rank silver">🥈</div>
              <div class="lb-av" style="background:#7c6bb5">R</div>
              <div class="lb-name">Rohit Sen</div>
              <div class="lb-pts">⭐ 1,280</div>
            </div>
            <div class="lb-item">
              <div class="lb-rank bronze">🥉</div>
              <div class="lb-av" style="background:#b05e35">M</div>
              <div class="lb-name">Meera Bose</div>
              <div class="lb-pts">⭐ 1,100</div>
            </div>
            <div class="lb-item">
              <div class="lb-rank">4</div>
              <div class="lb-av" style="background:#3d6b4f">A</div>
              <div class="lb-name">Aniket Roy</div>
              <div class="lb-pts">⭐ 980</div>
            </div>
            <div class="lb-item you">
              <div class="lb-rank" style="color:var(--sage);font-weight:700">14</div>
              <div class="lb-av" style="background:var(--sage)">A</div>
              <div class="lb-name">Arjun Das <span class="lb-you-badge">you</span></div>
              <div class="lb-pts">⭐ 840</div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- ══════ MY TASKS PAGE ══════ -->
    <div class="page" id="page-mytasks">
      <div class="tab-row">
        <button class="tab active" onclick="filterTasks('all',this)">All</button>
        <button class="tab" onclick="filterTasks('upcoming',this)">Upcoming</button>
        <button class="tab" onclick="filterTasks('active',this)">Active</button>
        <button class="tab" onclick="filterTasks('done',this)">Completed</button>
      </div>
      <div class="my-task-list">
        <div class="my-task" data-status="active">
          <div class="my-task-dot dot-active"></div>
          <div class="my-task-info">
            <div class="my-task-name">Weekend meal distribution drive</div>
            <div class="my-task-meta">📍 Tollygunge &nbsp;·&nbsp; Sat Apr 19 &nbsp;·&nbsp; 9:00 AM &nbsp;·&nbsp; Annapurna Food Bank</div>
          </div>
          <span class="my-task-pts">⭐ 130</span>
          <span class="status-pill sp-active">Active</span>
          <button class="btn-checkin" onclick="openCheckin('Weekend meal distribution drive','Tollygunge','130')">Check in</button>
        </div>
        <div class="my-task" data-status="upcoming">
          <div class="my-task-dot dot-upcoming"></div>
          <div class="my-task-info">
            <div class="my-task-name">Teach digital literacy to seniors</div>
            <div class="my-task-meta">📍 Park Street &nbsp;·&nbsp; Sat Apr 19 &nbsp;·&nbsp; 2:00 PM &nbsp;·&nbsp; Prayas Foundation</div>
          </div>
          <span class="my-task-pts">⭐ 120</span>
          <span class="status-pill sp-upcoming">Upcoming</span>
        </div>
        <div class="my-task" data-status="upcoming">
          <div class="my-task-dot dot-upcoming"></div>
          <div class="my-task-info">
            <div class="my-task-name">After-school tutoring — Maths</div>
            <div class="my-task-meta">📍 Behala &nbsp;·&nbsp; Wed Apr 23 &nbsp;·&nbsp; 4:00 PM &nbsp;·&nbsp; Vidya Daan Trust</div>
          </div>
          <span class="my-task-pts">⭐ 100</span>
          <span class="status-pill sp-upcoming">Upcoming</span>
        </div>
        <div class="my-task" data-status="done">
          <div class="my-task-dot dot-done"></div>
          <div class="my-task-info">
            <div class="my-task-name">Community garden cleanup</div>
            <div class="my-task-meta">📍 New Town &nbsp;·&nbsp; Apr 6 &nbsp;·&nbsp; Green Kolkata Initiative</div>
          </div>
          <span class="my-task-pts">⭐ 110</span>
          <span class="status-pill sp-done">Done</span>
        </div>
        <div class="my-task" data-status="done">
          <div class="my-task-dot dot-done"></div>
          <div class="my-task-info">
            <div class="my-task-name">Health awareness camp setup</div>
            <div class="my-task-meta">📍 Dum Dum &nbsp;·&nbsp; Apr 2 &nbsp;·&nbsp; Rotary Club</div>
          </div>
          <span class="my-task-pts">⭐ 160</span>
          <span class="status-pill sp-done">Done</span>
        </div>
        <div class="my-task" data-status="done">
          <div class="my-task-dot dot-done"></div>
          <div class="my-task-info">
            <div class="my-task-name">School stationery distribution</div>
            <div class="my-task-meta">📍 Jadavpur &nbsp;·&nbsp; Mar 28 &nbsp;·&nbsp; Vidya Daan Trust</div>
          </div>
          <span class="my-task-pts">⭐ 90</span>
          <span class="status-pill sp-done">Done</span>
        </div>
      </div>
    </div>

    <!-- ══════ PROFILE PAGE ══════ -->
    <div class="page" id="page-profile">
      <div class="profile-layout">
        <div>
          <div class="profile-card" style="margin-bottom:14px;text-align:center">
            <div class="profile-av-big">A</div>
            <div class="profile-name">Arjun Das</div>
            <div class="profile-loc">📍 Salt Lake, Kolkata</div>
            <div class="profile-stat-row">
              <div><div class="ps-n">840</div><div class="ps-l">Points</div></div>
              <div><div class="ps-n">12</div><div class="ps-l">Tasks</div></div>
              <div><div class="ps-n">38h</div><div class="ps-l">Hours</div></div>
              <div><div class="ps-n">#14</div><div class="ps-l">Rank</div></div>
            </div>
            <div style="font-size:11px;font-weight:600;color:rgba(13,17,23,0.38);text-transform:uppercase;letter-spacing:0.1em;margin-bottom:10px;text-align:left">Skills</div>
            <div class="skill-list">
              <span class="skill-tag">Teaching</span>
              <span class="skill-tag">Web dev</span>
              <span class="skill-tag">Bengali</span>
              <span class="skill-tag">First aid</span>
              <span class="skill-tag">Logistics</span>
            </div>
          </div>
          <div class="profile-card">
            <div style="font-size:13px;font-weight:600;margin-bottom:14px">Badges</div>
            <div class="badge-grid">
              <div class="badge-item earned"><div class="badge-emoji">🌟</div><div class="badge-name">First task</div></div>
              <div class="badge-item earned"><div class="badge-emoji">🔥</div><div class="badge-name">5-day streak</div></div>
              <div class="badge-item earned"><div class="badge-emoji">🌿</div><div class="badge-name">Eco warrior</div></div>
              <div class="badge-item"><div class="badge-emoji">🏅</div><div class="badge-name">15 tasks</div></div>
              <div class="badge-item"><div class="badge-emoji">👑</div><div class="badge-name">Top 10</div></div>
              <div class="badge-item"><div class="badge-emoji">💯</div><div class="badge-name">100 hrs</div></div>
            </div>
          </div>
        </div>
        <div class="profile-card">
          <div style="font-family:var(--serif);font-size:20px;margin-bottom:22px;letter-spacing:-0.01em">Edit profile</div>
          <div class="form-row">
            <div class="form-group"><label class="form-label">First name</label><input class="form-input" value="Arjun"></div>
            <div class="form-group"><label class="form-label">Last name</label><input class="form-input" value="Das"></div>
          </div>
          <div class="form-group"><label class="form-label">Email</label><input class="form-input" value="arjun.das@gmail.com" type="email"></div>
          <div class="form-row">
            <div class="form-group"><label class="form-label">City</label><input class="form-input" value="Kolkata"></div>
            <div class="form-group"><label class="form-label">Neighbourhood</label><input class="form-input" value="Salt Lake"></div>
          </div>
          <div class="form-group"><label class="form-label">Skills</label><input class="form-input" value="Teaching, Web dev, Bengali, First aid, Logistics"></div>
          <div class="form-group"><label class="form-label">Availability</label>
            <select class="form-input">
              <option>Weekends only</option>
              <option selected>Weekends + weekday evenings</option>
              <option>Anytime</option>
              <option>Weekdays only</option>
            </select>
          </div>
          <div class="form-group"><label class="form-label">About me</label>
            <textarea class="form-input">I am a software developer who loves giving back to the community. Passionate about education and the environment across Kolkata.</textarea>
          </div>
          <button class="btn-save" onclick="showToast('Profile saved successfully','')">Save changes</button>
        </div>
      </div>
    </div>

    <!-- ══════ LEADERBOARD PAGE ══════ -->
    <div class="page" id="page-leaderboard">
      <div class="lb-full-card">
        <div class="lb-full-head">
          <div style="font-family:var(--serif);font-size:21px;letter-spacing:-0.01em;margin-bottom:4px">City leaderboard</div>
          <div style="font-size:13px;color:rgba(13,17,23,0.4)">Top volunteers in Kolkata — updated daily</div>
        </div>
        <div id="lbFullList"></div>
      </div>
    </div>

  </div><!-- /content -->
</main>

<!-- CHECK-IN MODAL -->
<div class="modal-overlay" id="modal" onclick="if(event.target===this)closeCheckin()">
  <div class="modal">
    <div class="modal-icon">📍</div>
    <div class="modal-title">Confirm check-in</div>
    <div class="modal-sub">You're about to join this task. Your location will be verified on arrival.</div>
    <div class="modal-task-pill">
      <span>📌</span>
      <div>
        <div style="font-weight:600;font-size:13px" id="modalTaskName">Meal distribution drive</div>
        <div style="font-size:11px;opacity:0.7;margin-top:1px" id="modalTaskLoc">Tollygunge</div>
      </div>
      <span style="margin-left:auto;font-size:12px;color:var(--gold);font-weight:600" id="modalTaskPts">⭐ 130 pts</span>
    </div>
    <button class="checkin-btn" onclick="confirmCheckin()">✓ Check in now</button>
    <button class="modal-close" onclick="closeCheckin()">Cancel</button>
  </div>
</div>

<!-- TOAST -->
<div class="toast" id="toast">
  <span class="toast-icon" id="toastIcon">✅</span>
  <span id="toastMsg">Checked in successfully!</span>
  <span class="toast-pts" id="toastPts">+130 pts</span>
</div>

<!-- AI CHAT -->
<div class="chat-overlay" style="pointer-events:none">
  <div class="chat-panel" id="chatPanel">
    <div class="chat-head">
      <div class="chat-av">✦</div>
      <div>
        <div class="chat-name">KindMap AI</div>
        <div class="chat-status">Online · always here</div>
      </div>
      <button class="chat-close" onclick="toggleChat()">✕</button>
    </div>
    <div class="chat-msgs" id="chatMsgs">
      <div class="msg msg-ai">Hi Arjun! 👋 I've looked at your skills and schedule. Want me to find the best tasks for you this weekend?</div>
      <div class="msg-suggestion" onclick="sendChatMsg('Yes, find me tasks for Saturday morning')">🔍 Find tasks for Saturday morning</div>
      <div class="msg-suggestion" onclick="sendChatMsg('Show me education tasks near Salt Lake')">📚 Education tasks near me</div>
      <div class="msg-suggestion" onclick="sendChatMsg('What tasks match my Teaching skill?')">✦ Match my Teaching skill</div>
    </div>
    <div class="chat-input-row">
      <input class="chat-input" id="chatInput" placeholder="Ask me anything…" onkeydown="if(event.key==='Enter')sendChatMsg()">
      <button class="chat-send" onclick="sendChatMsg()">↑</button>
    </div>
  </div>
</div>
<script src="../script/vol_dash.js"></script>
</body>
</html>