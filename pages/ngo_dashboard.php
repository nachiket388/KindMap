<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>KindMap — NGO Dashboard · Prayas Foundation</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Instrument+Serif:ital@0;1&family=DM+Sans:opsz,wght@9..40,300;9..40,400;9..40,500;9..40,600&display=swap" rel="stylesheet">
<link rel='stylesheet' href='../style/style3.css'>
</head>
<body>

<!-- SIDEBAR -->
<aside>
  <div class="sidebar-logo">
    <div class="logo-mark">🏢</div>
    <div class="logo-text">Kind<em>Map</em></div>
  </div>
  <div class="sidebar-org">
    <div class="org-badge">✓ Verified NGO</div>
    <div class="org-name">Prayas Foundation</div>
    <div class="org-type">Education & Skill Development</div>
  </div>
  <nav>
    <div class="nav-label">Overview</div>
    <a class="nav-item active" data-page="dashboard" onclick="showPage('dashboard',this)"><span class="nav-icon">📊</span>Dashboard</a>
    <a class="nav-item" data-page="post" onclick="showPage('post',this)"><span class="nav-icon">✏️</span>Post a task</a>
    <a class="nav-item" data-page="board" onclick="showPage('board',this)"><span class="nav-icon">🗂️</span>Task board</a>
    <div class="nav-sep"></div>
    <div class="nav-label">People</div>
    <a class="nav-item" data-page="slots" onclick="showPage('slots',this)"><span class="nav-icon">👥</span>Volunteer slots</a>
    <a class="nav-item" data-page="analytics" onclick="showPage('analytics',this)"><span class="nav-icon">📈</span>Analytics</a>
    <div class="nav-sep"></div>
    <div class="nav-label">Intelligence</div>
    <a class="nav-item" data-page="report" onclick="showPage('report',this)"><span class="nav-icon">✦</span>AI weekly report</a>
    <a class="nav-item" data-page="scope" onclick="showPage('scope',this)"><span class="nav-icon">🔭</span>Impact scope</a>
    <div class="nav-sep"></div>
    <a class="nav-item" href="#"><span class="nav-icon">🏠</span>Back to home</a>
  </nav>
  <div class="sidebar-bottom">
    <a class="nav-item" href="#"><span class="nav-icon">⚙️</span>Settings</a>
    <a class="nav-item" href="#"><span class="nav-icon">🚪</span>Sign out</a>
  </div>
</aside>

<main>
  <div class="topbar">
    <div class="topbar-left">
      <div class="topbar-title" id="page-title">Dashboard</div>
    </div>
    <div class="topbar-right">
      <button class="btn btn-clay btn-sm" onclick="showPage('post',document.querySelector('[data-page=post]'))">+ New task</button>
      <div class="icon-btn notif-dot">🔔</div>
      <div class="icon-btn">⚙️</div>
    </div>
  </div>

  <div class="content">

    <!-- ════════ DASHBOARD ════════ -->
    <div class="page active" id="page-dashboard">

      <div class="stats-row">
        <div class="stat-card">
          <div class="stat-card-icon ic-clay">📋</div>
          <div class="stat-n">24</div><div class="stat-l">Tasks posted</div>
          <div class="stat-sub sub-clay">↑ 3 this week</div>
        </div>
        <div class="stat-card">
          <div class="stat-card-icon ic-sage">👥</div>
          <div class="stat-n">187</div><div class="stat-l">Volunteers engaged</div>
          <div class="stat-sub sub-up">↑ 22 this month</div>
        </div>
        <div class="stat-card">
          <div class="stat-card-icon ic-gold">⏱️</div>
          <div class="stat-n">342h</div><div class="stat-l">Hours contributed</div>
          <div class="stat-sub sub-muted">All time</div>
        </div>
        <div class="stat-card">
          <div class="stat-card-icon ic-mist">⭐</div>
          <div class="stat-n">4.8</div><div class="stat-l">Avg volunteer rating</div>
          <div class="stat-sub sub-up">Based on 56 reviews</div>
        </div>
      </div>

      <!-- QUICK ACTIONS -->
      <div class="quick-strip">
        <div class="quick-strip-title">Quick actions</div>
        <button class="qa-btn primary" onclick="showPage('post',document.querySelector('[data-page=post]'))">✏️ Post task</button>
        <button class="qa-btn" onclick="showPage('slots',document.querySelector('[data-page=slots]'))">✅ Mark check-ins</button>
        <button class="qa-btn" onclick="showPage('report',document.querySelector('[data-page=report]'))">✦ Generate AI report</button>
        <button class="qa-btn" onclick="showPage('analytics',document.querySelector('[data-page=analytics]'))">📈 View analytics</button>
        <button class="qa-btn" onclick="showToast('📤 Report shared to your email')">📤 Share last report</button>
      </div>

      <!-- ACTIVE TASK FILL PROGRESS -->
      <div class="checkin-progress">
        <div class="cp-head">
          <div>
            <div style="font-family:var(--serif);font-size:15px">Live task fill rate</div>
            <div style="font-size:12px;color:rgba(13,17,23,.4);margin-top:2px">5 active tasks across Kolkata right now</div>
          </div>
          <div style="font-size:12px;color:var(--sage);font-weight:500;display:flex;align-items:center;gap:5px"><span style="width:7px;height:7px;border-radius:50%;background:var(--sage);display:inline-block;animation:pulse 1.5s infinite"></span>Live</div>
        </div>
        <div style="display:flex;flex-direction:column;gap:10px">
          <div>
            <div style="display:flex;justify-content:space-between;font-size:12.5px;margin-bottom:5px"><span style="font-weight:500">Flood relief supply sorting</span><span style="color:rgba(13,17,23,.4)">13 / 18 <span style="color:var(--clay);font-weight:600">72%</span></span></div>
            <div class="cp-bar-outer"><div class="cp-bar-inner" style="width:0" data-w="72"></div></div>
          </div>
          <div>
            <div style="display:flex;justify-content:space-between;font-size:12.5px;margin-bottom:5px"><span style="font-weight:500">Digital literacy for seniors</span><span style="color:rgba(13,17,23,.4)">4 / 10 <span style="color:var(--gold);font-weight:600">40%</span></span></div>
            <div class="cp-bar-outer"><div class="cp-bar-inner" style="width:0;background:linear-gradient(90deg,var(--gold),var(--gold-l))" data-w="40"></div></div>
          </div>
          <div>
            <div style="display:flex;justify-content:space-between;font-size:12.5px;margin-bottom:5px"><span style="font-weight:500">Weekend meal distribution</span><span style="color:rgba(13,17,23,.4)">11 / 20 <span style="color:var(--sage);font-weight:600">55%</span></span></div>
            <div class="cp-bar-outer"><div class="cp-bar-inner" style="width:0" data-w="55"></div></div>
          </div>
        </div>
      </div>

      <div class="section-head">
        <div class="section-title">Task board</div>
        <button class="btn btn-ghost btn-sm" onclick="showPage('board',document.querySelector('[data-page=board]'))">View all →</button>
      </div>

      <div class="kanban">
        <div class="kanban-col">
          <div class="kanban-col-head"><span class="kanban-col-title">Open for applications</span><span class="kanban-count cnt-open">3</span></div>
          <div class="k-card" onclick="showPage('slots',document.querySelector('[data-page=slots]'))">
            <span class="k-tag ktag-u">Urgent</span>
            <div class="k-title">Flood relief supply sorting</div>
            <div class="k-meta"><span>📍 Salt Lake</span><span>📅 Tomorrow</span><span>🕐 3 hrs</span></div>
            <div class="k-prog"><div class="k-prog-fill" style="width:0" data-w="72"></div></div>
            <div class="k-footer"><span class="k-slots">13 / 18 slots filled</span><span class="k-act">Manage slots →</span></div>
          </div>
          <div class="k-card">
            <span class="k-tag ktag-o">Open</span>
            <div class="k-title">Weekend meal distribution</div>
            <div class="k-meta"><span>📍 Tollygunge</span><span>📅 Sat Apr 19</span></div>
            <div class="k-prog"><div class="k-prog-fill" style="width:0;background:var(--sage)" data-w="55"></div></div>
            <div class="k-footer"><span class="k-slots">11 / 20 slots filled</span><span class="k-act">Manage →</span></div>
          </div>
          <div class="k-card">
            <span class="k-tag ktag-o">Open</span>
            <div class="k-title">Tree plantation drive</div>
            <div class="k-meta"><span>📍 Dhakuria</span><span>📅 Sun Apr 20</span></div>
            <div class="k-prog"><div class="k-prog-fill" style="width:0;background:var(--sage)" data-w="20"></div></div>
            <div class="k-footer"><span class="k-slots">5 / 25 slots filled</span><span class="k-act">Manage →</span></div>
          </div>
        </div>
        <div class="kanban-col">
          <div class="kanban-col-head"><span class="kanban-col-title">In progress today</span><span class="kanban-count cnt-prog">2</span></div>
          <div class="k-card">
            <span class="k-tag ktag-a">Active now</span>
            <div class="k-title">Digital literacy for seniors</div>
            <div class="k-meta"><span>📍 Park Street</span><span>⏱️ Started 2:00 PM</span></div>
            <div class="k-prog"><div class="k-prog-fill" style="width:0;background:var(--gold)" data-w="40"></div></div>
            <div class="k-footer"><span class="k-slots">4 / 10 checked in</span><span class="k-act" onclick="showPage('slots',document.querySelector('[data-page=slots]'))">Check ins →</span></div>
          </div>
          <div class="k-card">
            <span class="k-tag ktag-a">Active now</span>
            <div class="k-title">After-school maths tutoring</div>
            <div class="k-meta"><span>📍 Behala</span><span>⏱️ Started 4:00 PM</span></div>
            <div class="k-prog"><div class="k-prog-fill" style="width:0;background:var(--gold)" data-w="80"></div></div>
            <div class="k-footer"><span class="k-slots">8 / 10 checked in</span><span class="k-act">Check ins →</span></div>
          </div>
        </div>
        <div class="kanban-col">
          <div class="kanban-col-head"><span class="kanban-col-title">Completed</span><span class="kanban-count cnt-done">19</span></div>
          <div class="k-card">
            <div class="k-title">Health awareness camp setup</div>
            <div class="k-meta"><span>📍 Dum Dum</span><span>📅 Apr 6</span></div>
            <div class="k-footer"><span class="k-slots" style="color:var(--sage)">✓ 20 / 20 completed</span><button class="btn btn-ghost btn-sm" style="padding:4px 12px;font-size:11px" onclick="showPage('report',document.querySelector('[data-page=report]'))">Report</button></div>
          </div>
          <div class="k-card">
            <div class="k-title">School stationery distribution</div>
            <div class="k-meta"><span>📍 Jadavpur</span><span>📅 Mar 28</span></div>
            <div class="k-footer"><span class="k-slots" style="color:var(--sage)">✓ 15 / 15 completed</span><button class="btn btn-ghost btn-sm" style="padding:4px 12px;font-size:11px">Report</button></div>
          </div>
          <div class="k-card">
            <div class="k-title">Park clean-up drive</div>
            <div class="k-meta"><span>📍 Ballygunge</span><span>📅 Mar 21</span></div>
            <div class="k-footer"><span class="k-slots" style="color:var(--sage)">✓ 12 / 12 completed</span><button class="btn btn-ghost btn-sm" style="padding:4px 12px;font-size:11px">Report</button></div>
          </div>
        </div>
      </div>
    </div>

    <!-- ════════ POST A TASK ════════ -->
    <div class="page" id="page-post">
      <div class="form-card" id="postForm">
        <div style="font-family:var(--serif);font-size:22px;margin-bottom:4px">Post a new task</div>
        <div style="font-size:13.5px;color:rgba(13,17,23,.45);margin-bottom:26px">Volunteers across Kolkata will see this — make it clear and compelling.</div>

        <div class="form-group">
          <label class="form-label">Task title</label>
          <input class="form-input" id="taskTitle" placeholder="e.g. Weekend meal distribution drive at Tollygunge" oninput="updatePreview()">
        </div>

        <div class="form-group">
          <label class="form-label">Description</label>
          <div class="ai-bar">
            <span class="ai-icon">✦</span>
            <div class="ai-text"><strong style="color:var(--purple)">AI writing assistant</strong> — enter a title above, then generate a compelling description automatically.</div>
            <button class="ai-generate-btn" onclick="simulateAI()">Generate with AI</button>
          </div>
          <div class="ai-loading" id="ai-load">
            <div class="dot-loader"><span></span><span></span><span></span></div>
            Writing your task description…
          </div>
          <textarea class="form-input" id="desc-area" placeholder="Describe what volunteers will be doing, what to bring, and the impact they'll make…" rows="4"></textarea>
        </div>

        <div class="form-row">
          <div class="form-group">
            <label class="form-label">Category</label>
            <select class="form-input" id="taskCat" onchange="updatePreview()">
              <option>Education</option><option>Environment</option><option>Relief</option>
              <option>Health</option><option>Food & Nutrition</option><option>Animal Welfare</option>
            </select>
          </div>
          <div class="form-group">
            <label class="form-label">Urgency level</label>
            <div class="urgency-row">
              <div class="urgency-opt on" onclick="setUrgency(this,'Normal')">Normal</div>
              <div class="urgency-opt" onclick="setUrgency(this,'High')">High</div>
              <div class="urgency-opt" onclick="setUrgency(this,'Urgent')">🔴 Urgent</div>
            </div>
          </div>
        </div>

        <div class="form-row">
          <div class="form-group">
            <label class="form-label">Volunteer slots needed</label>
            <input class="form-input" type="number" value="15" min="1" id="taskSlots" oninput="updatePreview()">
          </div>
          <div class="form-group">
            <label class="form-label">Points to award per volunteer</label>
            <input class="form-input" type="number" value="120" min="50" max="500" id="taskPts" oninput="updatePreview()">
          </div>
        </div>

        <div class="form-row">
          <div class="form-group">
            <label class="form-label">Date</label>
            <input class="form-input" type="date" id="taskDate">
          </div>
          <div class="form-group">
            <label class="form-label">Duration</label>
            <select class="form-input">
              <option>1 hour</option><option>2 hours</option><option selected>3 hours</option>
              <option>Half day</option><option>Full day</option>
            </select>
          </div>
        </div>

        <div class="form-group">
          <label class="form-label">Location / address</label>
          <input class="form-input" placeholder="e.g. 45 Lake Road, Tollygunge, Kolkata 700033">
        </div>

        <div class="form-group">
          <label class="form-label">Skills required (select all that apply)</label>
          <div class="chips-wrap">
            <span class="chip" onclick="toggleChip(this)">No skills needed</span>
            <span class="chip on" onclick="toggleChip(this)">Teaching</span>
            <span class="chip" onclick="toggleChip(this)">First aid</span>
            <span class="chip" onclick="toggleChip(this)">Driving</span>
            <span class="chip" onclick="toggleChip(this)">Logistics</span>
            <span class="chip" onclick="toggleChip(this)">Bengali / Hindi</span>
            <span class="chip" onclick="toggleChip(this)">IT / Tech</span>
            <span class="chip" onclick="toggleChip(this)">Cooking</span>
            <span class="chip" onclick="toggleChip(this)">Photography</span>
          </div>
        </div>

        <!-- AI IMPACT PREVIEW -->
        <div class="impact-preview show" id="impactPreview">
          <div class="ip-title">✦ Estimated reach if posted now</div>
          <div class="ip-stats">
            <div class="ip-stat"><div class="ip-n" id="prevVols">~42</div><div class="ip-l">Eligible volunteers notified</div></div>
            <div class="ip-stat"><div class="ip-n" id="prevFill">~8h</div><div class="ip-l">Est. time to fill slots</div></div>
            <div class="ip-stat"><div class="ip-n" id="prevPts">1,800</div><div class="ip-l">Total points awarded</div></div>
            <div class="ip-stat"><div class="ip-n" id="prevMatch">94%</div><div class="ip-l">AI match confidence</div></div>
          </div>
        </div>

        <div style="display:flex;gap:12px;margin-top:6px">
          <button class="btn btn-clay" onclick="submitTask()">Post task →</button>
          <button class="btn btn-ghost">Save draft</button>
        </div>
      </div>

      <!-- SUCCESS STATE -->
      <div class="post-success" id="postSuccess">
        <div class="ps-icon">🎉</div>
        <div class="ps-title">Task is live!</div>
        <div class="ps-sub">Your task has been published. KindMap is notifying matched volunteers across Kolkata right now.</div>
        <div style="display:flex;gap:12px;justify-content:center">
          <button class="btn btn-clay" onclick="resetPost()">Post another task</button>
          <button class="btn btn-ghost" onclick="showPage('board',document.querySelector('[data-page=board]'))">View task board</button>
        </div>
      </div>
    </div>

    <!-- ════════ TASK BOARD ════════ -->
    <div class="page" id="page-board">
      <div class="section-head" style="margin-bottom:18px">
        <div style="display:flex;gap:8px">
          <button class="chip on" onclick="toggleChip(this)">All</button>
          <button class="chip" onclick="toggleChip(this)">Open</button>
          <button class="chip" onclick="toggleChip(this)">Active</button>
          <button class="chip" onclick="toggleChip(this)">Completed</button>
        </div>
        <button class="btn btn-clay btn-sm" onclick="showPage('post',document.querySelector('[data-page=post]'))">+ New task</button>
      </div>
      <div class="kanban">
        <div class="kanban-col">
          <div class="kanban-col-head"><span class="kanban-col-title">Open</span><span class="kanban-count cnt-open">3</span></div>
          <div class="k-card"><span class="k-tag ktag-u">Urgent</span><div class="k-title">Flood relief supply sorting</div><div class="k-meta"><span>📍 Salt Lake</span><span>📅 Tomorrow</span><span>🕐 3 hrs</span></div><div class="k-prog"><div class="k-prog-fill" style="width:0" data-w="72"></div></div><div class="k-footer"><span class="k-slots">13 / 18</span><span class="k-act" onclick="openEditModal()">Edit →</span></div></div>
          <div class="k-card"><span class="k-tag ktag-o">Open</span><div class="k-title">Weekend meal distribution</div><div class="k-meta"><span>📍 Tollygunge</span><span>📅 Sat</span><span>🕐 2 hrs</span></div><div class="k-prog"><div class="k-prog-fill" style="width:0;background:var(--sage)" data-w="55"></div></div><div class="k-footer"><span class="k-slots">11 / 20</span><span class="k-act" onclick="openEditModal()">Edit →</span></div></div>
          <div class="k-card"><span class="k-tag ktag-o">Open</span><div class="k-title">Tree plantation drive</div><div class="k-meta"><span>📍 Dhakuria</span><span>📅 Sun</span><span>🕐 Half day</span></div><div class="k-prog"><div class="k-prog-fill" style="width:0;background:var(--sage)" data-w="20"></div></div><div class="k-footer"><span class="k-slots">5 / 25</span><span class="k-act" onclick="openEditModal()">Edit →</span></div></div>
        </div>
        <div class="kanban-col">
          <div class="kanban-col-head"><span class="kanban-col-title">In progress</span><span class="kanban-count cnt-prog">2</span></div>
          <div class="k-card"><span class="k-tag ktag-a">Active</span><div class="k-title">Digital literacy for seniors</div><div class="k-meta"><span>📍 Park Street</span><span>📅 Today</span><span>🕐 2 hrs</span></div><div class="k-prog"><div class="k-prog-fill" style="width:0;background:var(--gold)" data-w="40"></div></div><div class="k-footer"><span class="k-slots">4 / 10</span><span class="k-act" onclick="showPage('slots',document.querySelector('[data-page=slots]'))">View slots →</span></div></div>
          <div class="k-card"><span class="k-tag ktag-a">Active</span><div class="k-title">After-school maths tutoring</div><div class="k-meta"><span>📍 Behala</span><span>📅 Today</span><span>🕐 1.5 hrs</span></div><div class="k-prog"><div class="k-prog-fill" style="width:0;background:var(--gold)" data-w="80"></div></div><div class="k-footer"><span class="k-slots">8 / 10</span><span class="k-act">View slots →</span></div></div>
        </div>
        <div class="kanban-col">
          <div class="kanban-col-head"><span class="kanban-col-title">Completed</span><span class="kanban-count cnt-done">19</span></div>
          <div class="k-card"><div class="k-title">Health awareness camp setup</div><div class="k-meta"><span>📍 Dum Dum</span><span>📅 Apr 6</span></div><div class="k-footer"><span class="k-slots" style="color:var(--sage)">✓ 20 / 20</span><button class="btn btn-ghost btn-sm" style="padding:4px 10px;font-size:10px">Report</button></div></div>
          <div class="k-card"><div class="k-title">School stationery distribution</div><div class="k-meta"><span>📍 Jadavpur</span><span>📅 Mar 28</span></div><div class="k-footer"><span class="k-slots" style="color:var(--sage)">✓ 15 / 15</span><button class="btn btn-ghost btn-sm" style="padding:4px 10px;font-size:10px">Report</button></div></div>
          <div class="k-card"><div class="k-title">Park clean-up drive</div><div class="k-meta"><span>📍 Ballygunge</span><span>📅 Mar 21</span></div><div class="k-footer"><span class="k-slots" style="color:var(--sage)">✓ 12 / 12</span><button class="btn btn-ghost btn-sm" style="padding:4px 10px;font-size:10px">Report</button></div></div>
        </div>
      </div>
    </div>

    <!-- ════════ VOLUNTEER SLOTS ════════ -->
    <div class="page" id="page-slots">
      <div class="section-head">
        <div>
          <div class="section-title">Volunteer slots</div>
          <div style="font-size:13px;color:rgba(13,17,23,.42);margin-top:3px">Flood relief supply sorting · Salt Lake · Tomorrow, 9:00 AM</div>
        </div>
        <div style="display:flex;gap:10px;align-items:center">
          <select class="form-input" style="width:auto;font-size:13px;padding:9px 14px" onchange="showToast('📋 Switched task view')">
            <option>Flood relief supply sorting</option>
            <option>Digital literacy for seniors</option>
            <option>Weekend meal distribution</option>
            <option>After-school maths tutoring</option>
          </select>
          <button class="btn btn-clay btn-sm" onclick="showToast('📧 Reminder sent to 3 pending volunteers')">Send reminders</button>
        </div>
      </div>

      <div class="slots-summary">
        <div class="ss-item"><div class="ss-n" style="color:var(--sage)">13</div><div class="ss-l">Confirmed</div></div>
        <div class="ss-item"><div class="ss-n" style="color:var(--gold)">3</div><div class="ss-l">Pending</div></div>
        <div class="ss-item"><div class="ss-n" style="color:rgba(13,17,23,.35)">2</div><div class="ss-l">Marked done</div></div>
        <div class="ss-item"><div class="ss-n">18</div><div class="ss-l">Total slots</div></div>
        <div class="ss-item" style="flex:2">
          <div style="display:flex;justify-content:space-between;font-size:11.5px;margin-bottom:6px"><span>Fill rate</span><span style="color:var(--clay);font-weight:600">72%</span></div>
          <div class="cp-bar-outer" style="height:6px"><div class="cp-bar-inner" style="width:0" data-w="72"></div></div>
        </div>
      </div>

      <div class="slots-controls">
        <input class="slots-search" placeholder="Search volunteers…" oninput="filterSlots(this.value)">
        <select class="form-input" style="width:auto;font-size:13px;padding:9px 14px">
          <option>All statuses</option><option>Confirmed</option><option>Pending</option><option>Done</option>
        </select>
        <button class="btn btn-sage btn-sm" onclick="markAllPresent()">✓ Mark all present</button>
        <button class="btn btn-ghost btn-sm" onclick="showToast('📥 Exported to CSV')">Export CSV</button>
      </div>

      <div class="slots-table-wrap">
        <table>
          <thead><tr><th>Volunteer</th><th>Skills</th><th>Check-in time</th><th>Status</th><th>Action</th></tr></thead>
          <tbody id="slots-body"></tbody>
        </table>
      </div>
    </div>

    <!-- ════════ ANALYTICS ════════ -->
    <div class="page" id="page-analytics">
      <div class="analytics-grid">
        <div class="chart-card">
          <div class="chart-title">Volunteer sign-ups</div>
          <div class="chart-sub">Last 7 weeks</div>
          <div class="bar-chart" id="barChart"></div>
          <div class="bc-labels" id="barLabels"></div>
        </div>
        <div class="chart-card">
          <div class="chart-title">Task categories</div>
          <div class="chart-sub">By volunteer hours this month</div>
          <div class="donut-wrap">
            <svg class="donut-svg" width="110" height="110" viewBox="0 0 110 110">
              <circle cx="55" cy="55" r="38" fill="none" stroke="#eae6de" stroke-width="18"/>
              <circle cx="55" cy="55" r="38" fill="none" stroke="#3d6b4f" stroke-width="18" stroke-dasharray="95 144" stroke-dashoffset="0" stroke-linecap="round"/>
              <circle cx="55" cy="55" r="38" fill="none" stroke="#c4602a" stroke-width="18" stroke-dasharray="50 189" stroke-dashoffset="-95" stroke-linecap="round"/>
              <circle cx="55" cy="55" r="38" fill="none" stroke="#c9a84c" stroke-width="18" stroke-dasharray="35 204" stroke-dashoffset="-145" stroke-linecap="round"/>
              <circle cx="55" cy="55" r="38" fill="none" stroke="#c8ddd0" stroke-width="18" stroke-dasharray="59 180" stroke-dashoffset="-180" stroke-linecap="round"/>
              <text x="55" y="51" text-anchor="middle" font-size="14" font-family="Instrument Serif,Georgia,serif" fill="#0d1117">342h</text>
              <text x="55" y="64" text-anchor="middle" font-size="9" fill="rgba(13,17,23,.45)" font-family="DM Sans,sans-serif">total</text>
            </svg>
            <div class="donut-legend">
              <div class="dl-item"><div class="dl-dot" style="background:var(--sage)"></div><div class="dl-label">Education</div><div class="dl-val">127h</div></div>
              <div class="dl-item"><div class="dl-dot" style="background:var(--clay)"></div><div class="dl-label">Relief</div><div class="dl-val">68h</div></div>
              <div class="dl-item"><div class="dl-dot" style="background:var(--gold)"></div><div class="dl-label">Environment</div><div class="dl-val">47h</div></div>
              <div class="dl-item"><div class="dl-dot" style="background:var(--sage-l)"></div><div class="dl-label">Health & Other</div><div class="dl-val">100h</div></div>
            </div>
          </div>
        </div>
        <div class="chart-card">
          <div class="chart-title">Top volunteer neighbourhoods</div>
          <div class="chart-sub">Where your best volunteers live</div>
          <div style="display:flex;flex-direction:column;gap:10px;margin-top:4px">
            <div>
              <div style="display:flex;justify-content:space-between;font-size:12.5px;margin-bottom:5px"><span style="font-weight:500">Salt Lake</span><span style="color:rgba(13,17,23,.4)">34 volunteers</span></div>
              <div class="cp-bar-outer"><div class="cp-bar-inner" style="width:0" data-w="90"></div></div>
            </div>
            <div>
              <div style="display:flex;justify-content:space-between;font-size:12.5px;margin-bottom:5px"><span style="font-weight:500">Tollygunge</span><span style="color:rgba(13,17,23,.4)">28 volunteers</span></div>
              <div class="cp-bar-outer"><div class="cp-bar-inner" style="width:0;background:linear-gradient(90deg,var(--clay),var(--clay-l))" data-w="74"></div></div>
            </div>
            <div>
              <div style="display:flex;justify-content:space-between;font-size:12.5px;margin-bottom:5px"><span style="font-weight:500">Park Street</span><span style="color:rgba(13,17,23,.4)">21 volunteers</span></div>
              <div class="cp-bar-outer"><div class="cp-bar-inner" style="width:0;background:linear-gradient(90deg,var(--gold),var(--gold-l))" data-w="55"></div></div>
            </div>
            <div>
              <div style="display:flex;justify-content:space-between;font-size:12.5px;margin-bottom:5px"><span style="font-weight:500">Jadavpur / Behala</span><span style="color:rgba(13,17,23,.4)">18 volunteers</span></div>
              <div class="cp-bar-outer"><div class="cp-bar-inner" style="width:0;background:linear-gradient(90deg,var(--sage-l),#e8f2ec)" data-w="47"></div></div>
            </div>
          </div>
        </div>
        <div class="chart-card">
          <div class="chart-title">Recent activity</div>
          <div class="chart-sub">Task & volunteer events</div>
          <div class="timeline">
            <div class="tl-item"><div class="tl-dot" style="background:var(--sage-pale)">✅</div><div class="tl-content"><div class="tl-title">Health camp — 20 volunteers completed</div><div class="tl-meta">Dum Dum · 160 pts each awarded</div><div class="tl-time">Apr 6, 3:30 PM</div></div></div>
            <div class="tl-item"><div class="tl-dot" style="background:var(--clay-l)">📢</div><div class="tl-content"><div class="tl-title">Flood relief task posted — 13 signups in 6h</div><div class="tl-meta">Fastest fill rate this org has seen</div><div class="tl-time">Apr 7, 9:00 AM</div></div></div>
            <div class="tl-item"><div class="tl-dot" style="background:var(--gold-l)">⭐</div><div class="tl-content"><div class="tl-title">New 5-star review from Arjun Das</div><div class="tl-meta">"Amazing coordination, well-organised task."</div><div class="tl-time">Apr 7, 5:12 PM</div></div></div>
            <div class="tl-item" style="padding-bottom:0"><div class="tl-dot" style="background:var(--purple-l)">✦</div><div class="tl-content"><div class="tl-title">AI weekly report generated</div><div class="tl-meta">4 key insights · Shared to team email</div><div class="tl-time">Apr 8, 8:00 AM</div></div></div>
          </div>
        </div>
      </div>
    </div>

    <!-- ════════ AI WEEKLY REPORT ════════ -->
    <div class="page" id="page-report">
      <div class="report-generate-strip" id="reportGenStrip">
        <div class="rg-icon">✦</div>
        <div class="rg-text">
          <h4>AI-powered weekly report</h4>
          <p>Claude analyses your volunteer data, task completion rates, and community trends to generate a personalised impact brief.</p>
        </div>
        <button class="rg-btn" onclick="generateReport()">Generate this week's report →</button>
      </div>

      <div class="report-card" id="reportCard" style="display:none">
        <div class="report-header">
          <div>
            <div class="report-title">Weekly impact report</div>
            <div class="report-period">Apr 12 – Apr 18, 2026 · Prayas Foundation</div>
          </div>
          <span class="report-tag">✦ Generated by Claude AI</span>
        </div>
        <div class="report-stats">
          <div class="rstat"><div class="rstat-n">5</div><div class="rstat-l">Active tasks</div></div>
          <div class="rstat"><div class="rstat-n">48</div><div class="rstat-l">Volunteers deployed</div></div>
          <div class="rstat"><div class="rstat-n">94h</div><div class="rstat-l">Hours contributed</div></div>
          <div class="rstat"><div class="rstat-n">4.8★</div><div class="rstat-l">Avg satisfaction</div></div>
        </div>
        <div class="report-section">
          <div class="rs-title">Summary</div>
          <div class="rs-body" id="reportSummary"></div>
        </div>
        <div class="report-section">
          <div class="rs-title">AI insights</div>
          <div id="reportInsights"></div>
        </div>
        <div class="report-section">
          <div class="rs-title">Top volunteers this week</div>
          <div id="report-vols"></div>
        </div>
        <div style="display:flex;gap:12px;margin-top:22px;padding-top:20px;border-top:1px solid var(--border)">
          <button class="btn btn-clay" onclick="showToast('📥 PDF downloaded')">Download PDF</button>
          <button class="btn btn-ghost" onclick="showToast('📤 Report shared to team email')">Share report</button>
          <button class="btn btn-ghost" onclick="showPage('report',document.querySelector('[data-page=report]'));document.getElementById('reportCard').style.display='none';document.getElementById('reportGenStrip').style.display='flex'">Regenerate</button>
        </div>
      </div>
    </div>

    <!-- ════════ IMPACT SCOPE ════════ -->
    <div class="page" id="page-scope">
      <div style="font-family:var(--serif);font-size:22px;margin-bottom:6px">KindMap — platform scope & vision</div>
      <div style="font-size:14px;color:rgba(13,17,23,.45);margin-bottom:22px">How KindMap works as a two-sided marketplace connecting NGOs and volunteers.</div>

      <div class="scope-strip">
        <div class="scope-badge active"><span class="sb-icon">🌐</span>Two-sided platform</div>
        <div class="scope-badge"><span class="sb-icon">✦</span>AI-powered matching</div>
        <div class="scope-badge"><span class="sb-icon">🏅</span>Gamified volunteering</div>
        <div class="scope-badge"><span class="sb-icon">📊</span>Real-time analytics</div>
        <div class="scope-badge"><span class="sb-icon">🗺️</span>Geo-aware tasks</div>
        <div class="scope-badge"><span class="sb-icon">📋</span>Verified NGOs only</div>
      </div>

      <div style="display:grid;grid-template-columns:1fr 1fr;gap:14px;margin-bottom:22px">
        <div class="chart-card" style="border-top:3px solid var(--clay)">
          <div style="font-size:12px;font-weight:600;color:var(--clay);text-transform:uppercase;letter-spacing:.08em;margin-bottom:12px">NGO side — what Prayas Foundation gets</div>
          <div class="timeline">
            <div class="tl-item"><div class="tl-dot" style="background:var(--clay-l)">✏️</div><div class="tl-content"><div class="tl-title">Post micro-tasks in under 2 minutes</div><div class="tl-meta">AI helps write descriptions, estimate volunteer need, set point values</div></div></div>
            <div class="tl-item"><div class="tl-dot" style="background:var(--clay-l)">👥</div><div class="tl-content"><div class="tl-title">Matched volunteers — not random applicants</div><div class="tl-meta">AI surfaces volunteers by skill, location, availability, and past performance</div></div></div>
            <div class="tl-item"><div class="tl-dot" style="background:var(--clay-l)">✅</div><div class="tl-content"><div class="tl-title">GPS-verified check-ins</div><div class="tl-meta">No-show tracking, real-time slot management, automated reminders</div></div></div>
            <div class="tl-item" style="padding-bottom:0"><div class="tl-dot" style="background:var(--clay-l)">✦</div><div class="tl-content"><div class="tl-title">Weekly AI report — no manual work</div><div class="tl-meta">Claude generates impact summaries, donor-ready reports, and actionable insights</div></div></div>
          </div>
        </div>
        <div class="chart-card" style="border-top:3px solid var(--sage)">
          <div style="font-size:12px;font-weight:600;color:var(--sage);text-transform:uppercase;letter-spacing:.08em;margin-bottom:12px">Volunteer side — what Arjun gets</div>
          <div class="timeline">
            <div class="tl-item"><div class="tl-dot" style="background:var(--sage-pale)">🔍</div><div class="tl-content"><div class="tl-title">AI-matched task recommendations</div><div class="tl-meta">Tasks filtered by your skills, neighbourhood, and free hours — no searching needed</div></div></div>
            <div class="tl-item"><div class="tl-dot" style="background:var(--sage-pale)">🏅</div><div class="tl-content"><div class="tl-title">Points, badges, and city rankings</div><div class="tl-meta">Every hour translates to visible recognition — leaderboards, digital certificates</div></div></div>
            <div class="tl-item"><div class="tl-dot" style="background:var(--sage-pale)">📱</div><div class="tl-content"><div class="tl-title">One-tap check-in via GPS</div><div class="tl-meta">Arrive, tap check-in, earn points — no forms, no paperwork</div></div></div>
            <div class="tl-item" style="padding-bottom:0"><div class="tl-dot" style="background:var(--sage-pale)">🗺️</div><div class="tl-content"><div class="tl-title">Impact map — see your city change</div><div class="tl-meta">Every completed task lights up on the Kolkata heatmap with real volunteer density</div></div></div>
          </div>
        </div>
      </div>

      <div class="chart-card" style="max-width:100%;margin-bottom:14px">
        <div class="chart-title" style="margin-bottom:4px">The flywheel — how KindMap grows</div>
        <div style="font-size:13px;color:rgba(13,17,23,.45);margin-bottom:20px">Each side makes the other more valuable over time</div>
        <div style="display:grid;grid-template-columns:repeat(5,1fr);align-items:center;gap:0;text-align:center">
          <div style="background:var(--clay-pale);border:1.5px solid var(--clay-l);border-radius:14px;padding:16px 10px">
            <div style="font-size:24px;margin-bottom:8px">🏢</div>
            <div style="font-size:12.5px;font-weight:600;margin-bottom:4px">NGO posts task</div>
            <div style="font-size:11px;color:rgba(13,17,23,.45)">AI helps write & estimate reach</div>
          </div>
          <div style="font-size:20px;color:rgba(13,17,23,.25);font-weight:300">→</div>
          <div style="background:var(--purple-l);border:1.5px solid rgba(109,40,217,.15);border-radius:14px;padding:16px 10px">
            <div style="font-size:24px;margin-bottom:8px">✦</div>
            <div style="font-size:12.5px;font-weight:600;margin-bottom:4px">AI matches volunteers</div>
            <div style="font-size:11px;color:rgba(13,17,23,.45)">By skills, location & history</div>
          </div>
          <div style="font-size:20px;color:rgba(13,17,23,.25);font-weight:300">→</div>
          <div style="background:var(--sage-pale);border:1.5px solid var(--sage-l);border-radius:14px;padding:16px 10px">
            <div style="font-size:24px;margin-bottom:8px">🙋</div>
            <div style="font-size:12.5px;font-weight:600;margin-bottom:4px">Volunteer shows up</div>
            <div style="font-size:11px;color:rgba(13,17,23,.45)">GPS check-in, earns points</div>
          </div>
        </div>
        <div style="display:grid;grid-template-columns:repeat(3,1fr);gap:14px;margin-top:14px">
          <div style="background:var(--gold-l);border:1.5px solid rgba(201,168,76,.3);border-radius:14px;padding:16px;text-align:center">
            <div style="font-size:20px;margin-bottom:6px">🏅</div>
            <div style="font-size:12.5px;font-weight:600;margin-bottom:3px">Volunteer earns recognition</div>
            <div style="font-size:11px;color:rgba(13,17,23,.45)">Badges, leaderboard rank, certificate</div>
          </div>
          <div style="background:var(--mist);border:1.5px solid var(--border);border-radius:14px;padding:16px;text-align:center">
            <div style="font-size:20px;margin-bottom:6px">📊</div>
            <div style="font-size:12.5px;font-weight:600;margin-bottom:3px">NGO gets AI impact report</div>
            <div style="font-size:11px;color:rgba(13,17,23,.45)">Donor-ready, auto-generated weekly</div>
          </div>
          <div style="background:var(--sage-pale);border:1.5px solid var(--sage-l);border-radius:14px;padding:16px;text-align:center">
            <div style="font-size:20px;margin-bottom:6px">🔄</div>
            <div style="font-size:12.5px;font-weight:600;margin-bottom:3px">Both sides return</div>
            <div style="font-size:11px;color:rgba(13,17,23,.45)">Better data → better matches over time</div>
          </div>
        </div>
      </div>
    </div>

  </div>
</main>

<!-- EDIT TASK MODAL -->
<div class="modal-overlay" id="editModal" onclick="if(event.target===this)closeEditModal()">
  <div class="modal">
    <div class="modal-title">Edit task details</div>
    <div class="modal-sub">Updating a live task will notify all signed-up volunteers automatically.</div>
    <div class="form-group"><label class="form-label">Task title</label><input class="form-input" value="Flood relief supply sorting"></div>
    <div class="form-row">
      <div class="form-group"><label class="form-label">Slots</label><input class="form-input" type="number" value="18"></div>
      <div class="form-group"><label class="form-label">Points</label><input class="form-input" type="number" value="200"></div>
    </div>
    <div style="display:flex;gap:10px;margin-top:4px">
      <button class="btn btn-clay" style="flex:1" onclick="closeEditModal();showToast('✅ Task updated — volunteers notified')">Save changes</button>
      <button class="btn btn-ghost" onclick="closeEditModal()">Cancel</button>
    </div>
  </div>
</div>

<!-- TOAST -->
<div class="toast" id="toast">
  <span id="toastMsg">Done!</span>
</div>
<script src="../script/ngo_dash.js"></script>
</body>
</html>